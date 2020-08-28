<!-- include web3j file reference for results-->
<script src="../../smart-contract/node_modules/web3/dist/web3.min.js"></script>

<?php
//set connection and query string global variable
global $conn, $stm;
if ($conn == null) {
    include_once("../config/connection.php");
}

// only allow admin to update user status
session_start();
if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {

    $status = $_GET['status']; //get the current status
    $user_id = $_GET['uid']; // get the user id

    // update voter status in DB
    if ($status) {
        // if user is active, then de-active user
        $stm = $conn->prepare("UPDATE users SET is_active=0 WHERE id=?");
    } else {
        // if user is de-active, then active user 
        $stm = $conn->prepare("UPDATE users SET is_active=1 WHERE id=?");
    }

    // bind the user-id with query string
    $stm->bindParam(1, $user_id);
    $row = $stm->execute(); // execute the query

    // if successful then authorize
    // user in smart contract
    if ($row) {
        // smart contract deployed address file
        // this address needs to be change on each deployment
        include_once("../../smart-contract/smart-contract-config.php");
?>
        <!-- smart contract scripting -->
        <script>
            let user_id = <?php echo json_encode($user_id); ?>; //user id from DB
            let user_status = <?php echo json_encode($status); ?>; //user status from DB

            // confirm data is in integer form
            user_id = parseInt(user_id);
            user_status = parseInt(user_status);

            console.log(user_id);
            console.log(user_status);

            let voters = []; //list of voters
            let voter_index = 0; //for clicked voter index
            let voter_status = false; //for clicked voter status

            authorizeVoter(); //update voter status into blockchain

            // get id and current status of all voters from blockchain
            async function authorizeVoter() {
                for (let i = 0; i < contra.getNumVoter(); i++) {
                    const response = await contra.voters(i);
                    voters.push({
                        'uid': parseInt(response[0]),
                        'status': response[2]
                    });
                }

                // get the index and current status of clicked voter
                voters.forEach(function(voter, index) {
                    if (voter.uid == user_id) {
                        voter_index = index;
                        voter_status = voter.status;
                        console.log("voter status: " + voter.status);
                        console.log("index: " + voter_index);
                    }
                });

                // de-activate voter status in blockchain, if active
                if (voter_status && user_status) {
                    const result = await contra.deActivateVoter(voter_index, {
                        from: web3.eth.accounts[0],
                        gas: 3000000
                    });
                    console.log(result);
                }
                // activate voter status in blockchain, if de-active
                else if (!voter_status && !user_status) {
                    const result = await contra.authorize(voter_index, {
                        from: web3.eth.accounts[0],
                        gas: 3000000
                    });
                    console.log(result);
                }
                // re-direct admin to the same page
                window.location.replace("manage-users.php");
            }
        </script>

<?php
    } else {
        echo "<br>Can't update Status!" . $conn->error;
    }
}

?>