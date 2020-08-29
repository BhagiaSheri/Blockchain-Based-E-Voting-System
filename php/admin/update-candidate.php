<?php
// start session
session_start();

// variables to track updates at blockchain
$updates="";
$id=0;

$name="";
$designation="";


if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['edit-candidate-name'] ) && isset($_POST['edit-candidate-email'] ) && isset($_POST['edit-candidate-contact'] )
     && isset($_POST['edit-candidate-age'] ) && isset($_POST['edit-candidate-designation']) )
     {
         // get global connection variable
        global $conn;

    //   connect, if not connected to DB
        if ($conn == null)
        include_once("../config/connection.php");

    //   get entered values
        $id = $_POST['edit-candidate-id'];
        $name = $_POST['edit-candidate-name'];
        $email = $_POST['edit-candidate-email'];
        $contact = $_POST['edit-candidate-contact'];
        $age = $_POST['edit-candidate-age'];
        $designation = $_POST['edit-candidate-designation'];

        if( empty($_FILES['edit-candidate-pic']['tmp_name']) )
        {           
            $pdo = $conn->prepare("UPDATE CANDIDATES SET name=?, email=?, contact_no=?, age=?, designation=? where c_id=?");
            $pdo->bindValue(1, $name);
            $pdo->bindValue(2, $email);
            $pdo->bindValue(3, $contact);
            $pdo->bindValue(4, $age);
            $pdo->bindValue(5, $designation);
            $pdo->bindValue(6, $id);
        }
        else{

             $profile = file_get_contents($_FILES['edit-candidate-pic']['tmp_name']);
            $imgType = $_FILES['edit-candidate-pic']['type'];
            $pdo = $conn->prepare("UPDATE CANDIDATES SET name=?, email=?, contact_no=?, age=?, designation=?, profile=?, imgtype=? where c_id=?");

            $pdo->bindValue(1, $name);
            $pdo->bindValue(2, $email);
            $pdo->bindValue(3, $contact);
            $pdo->bindValue(4, $age);
            $pdo->bindValue(5, $designation);
            $pdo->bindValue(6, $profile);
            $pdo->bindValue(7, $imgType);
            $pdo->bindValue(8, $id);
            
            }
            

            $result = $pdo->execute();
        
            if($result)
            {
                $updates = "Candidate Updated";
            }
            else
                $updates = "ERROR! Not Updated!";
    }
     else
        $updates = "Please! enter all required fields";
}
else
    $updates = "Session Expired, Login Again!";
?>
<!-- web3 -->
<script src="../../smart-contract/node_modules/web3/dist/web3.min.js"></script>

<?php 
// include smart contract config
include_once("../../smart-contract/smart-contract-config.php");
?>

<script>
    // get data
     let msg = <?php  echo json_encode($updates) ?>;
     let id = <?php  echo json_encode($id) ?>;
     let name = <?php  echo json_encode($name) ?>;
     let desig = <?php  echo json_encode($designation) ?>;
    // alert("db id "+id);

    userIndex="";
    if(msg == "Candidate Updated"){
        // update candidate details
         updateCandidate(id);
    }
    // function to update candidate details on blockchain
    async function updateCandidate(user_id){
        // console.log("l:"+contra.getNumCandidate());

         // interate through all voters data
         for (let i = 0; i < contra.getNumCandidate(); i++) {
                const data = await contra.candidates(i);
                // get index of logged In user
                // console.log(data[0].c[0]);
                console.log("i "+i+" uid"+user_id);

                if (data[0].c[0] == user_id) {
                    userIndex = i;
                    const data = await contra.editCandidate(parseInt(i), name, desig);
                    // redirect to the page again
                    window.location.replace("manage-candidates.php");

                    
                }
                else{
                    console.log("index not found");
                }
            }
    // alert("u index "+userIndex);

    }
            
</script>