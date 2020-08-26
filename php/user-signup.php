<!-- user-sign-up PHP code -->
<?php

if ($_POST) {

    //get connection global variable
    global $conn;
    if ($conn == null) {
        // include connection file
        include_once("config/connection.php");

        // if signup form is set
        if (isset($_POST["signup"])) {

            // get fields of form input 
            $name = $_POST['uname'];
            $email = $_POST['uemail'];
            $pno = $_POST['uphone-no'];
            $dob = $_POST['udob'];
            $pass = $_POST['upass'];
            $cpass = $_POST['uconfirm_pass'];

            // for profile picture name and extention
            // type from FILES global variable
            $pic = file_get_contents($_FILES['profile-pic']['tmp_name']);
            $pictype = $_FILES['profile-pic']['type'];

            // condition both entered passwords are same
            if ($pass === $cpass) {

                // To convert passord into hash value
                $pass = md5($pass);

                // age calculation from entered date of birth
                $age = date("Y") - substr($dob, 0, 4);

                // echo $name.",".$email.",".$pno.",".$age.",".$pass.",".$cpass.",".$pictype;

                // insert users data in DB
                $stm = $conn->prepare("INSERT into users (name,email,contact_no,age,password,profile,imgtype) values(?,?,?,?,?,?,?)");
                $stm->bindParam(1, $name);
                $stm->bindParam(2, $email);
                $stm->bindParam(3, $pno);
                $stm->bindParam(4, $age);
                $stm->bindParam(5, $pass);
                $stm->bindParam(6, $pic);
                $stm->bindParam(7, $pictype);
                $row = $stm->execute();
                if ($row) {

                    $get_stm = $conn->prepare("SELECT id, name from users where email=?");
                    $get_stm->bindParam(1, $email);
                    $get_stm->execute();

                    while($row = $get_stm->fetch()) {
                        echo $row['id']."-".$row['name'];
                        $uid = $row['id'];
                        $uname = $row['name'];
                    
?>

<!-- include web3j file reference for results-->
<script src="../smart-contract/node_modules/web3/dist/web3.min.js"></script>

<!-- smart contract deployed address file -->
<?php
include_once("../smart-contract/smart-contract-config.php");
?>


<script>

let user_id = <?php echo json_encode($uid); ?>;
let user_name = <?php echo json_encode($uname); ?>;

console.log(user_id);
console.log(user_name);

user_id = parseInt(user_id);

console.log(user_id);
console.log(user_name);

addVoter(); //get no. of votes of candidates

// fetching no. of candidates from smart contract
async function addVoter() {
    let n = 'bhagiasheri';
        const response = await contra.addVoter(1, n, {from: web3.eth.accounts[1], gas:3000000});
       
    console.log(response);
}
</script>

<?php
}
                    echo "<br>Registration Successfull!!!".$uid." - ".$uname;

                    // // start session
                    // session_start();
                    // // is admin creating user - check login condition
                    // if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {
                    //     //redirect at manage-user page on sucessfull user creation
                    //     header("Location: admin/manage-users.php");
                    // } else {
                    //     // redirect to login page when user signup
                    //     header("Location: ../login.php");
                    // }
                } else {
                    echo "<br>Registration Not Successfull!! ";
                }
            } else {
                echo "<br>Password does not Matched!!!";
            }
        }
    }
        else{
            echo "<br>Password does not Matched!!!";
        }
    }  
?>