<!-- web3 -->
<script src="../../smart-contract/node_modules/web3/dist/web3.min.js"></script>

<?php
// start session
session_start();

// include smart contrtact instance
include_once("../../smart-contract/smart-contract-config.php");     
    
if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin') {

    // check if all entered values
    if (
        isset($_POST['create-candidate-name']) && isset($_POST['create-candidate-email']) && isset($_POST['create-candidate-contact'])
        && isset($_POST['create-candidate-dob']) && isset($_POST['create-candidate-designation']) && isset($_FILES['create-candidate-pic'])
    ) {
        // get global connection variable
        global $conn;

        //   connect, if not connected to DB
        if ($conn == null)
            include_once("../config/connection.php");

        //   get entered values
        $name = $_POST['create-candidate-name'];
        $email = $_POST['create-candidate-email'];
        $contact = $_POST['create-candidate-contact'];
        $dob = $_POST['create-candidate-dob'];
        $designation = $_POST['create-candidate-designation'];
        $profile = file_get_contents($_FILES['create-candidate-pic']['tmp_name']);
        $imgType = $_FILES['create-candidate-pic']['type'];

        // calculate  age
        $age = date("Y") - substr($dob, 0, 4);
        //   echo "all values entered ". $name." ,". $imgType.",".$age;

        $pdo = $conn->prepare("INSERT INTO CANDIDATES (name, email, contact_no, age, designation, profile, imgtype) VALUES(?,?,?,?,?,?,?) ");
        $pdo->bindValue(1, $name);
        $pdo->bindValue(2, $email);
        $pdo->bindValue(3, $contact);
        $pdo->bindValue(4, $age);
        $pdo->bindValue(5, $designation);
        $pdo->bindValue(6, $profile);
        $pdo->bindValue(7, $imgType);

        $result = $pdo->execute();

        if ($result) {
            // $c_id = $conn->lastInsertId();

            $c_id = 0;
            $c_name = "";
            $c_designation = "";

            $get_stm = $conn->prepare("SELECT c_id, name, designation from candidates where email=?");
            $get_stm->bindParam(1, $email);
            $get_stm->execute();

            if ($get_stm) {
                $row = $get_stm->fetch();
                // echo $row['id'] . "-" . $row['name'];
                $c_id = $row['c_id'];
                $c_name = $row['name'];
                $c_designation =  $row['designation'];
            }
         
        } else
            echo "Not Registered!";
    } else
        echo "Please! enter all required fields";
} else
    echo "Session Expired, Login Again!";
?>
<script>
 let c_id = <?php  echo json_encode($c_id) ?>;
 let c_name = <?php  echo json_encode($c_name) ?>;
 let c_desig = <?php  echo json_encode($c_designation) ?>; 
//  alert(c_id+" "+c_name+" " +c_desig);

//  call  function to resgister candidate 
 addCandidate( parseInt(c_id), c_name, c_desig );

// function to resgister candidate in blockchain
 async function addCandidate(id, name, desig){
    // alert("in add candi");
        const candidatesResponse = await contra.addCandidate(id,name+"", desig+"", { from: web3.eth.accounts[0], gas: 3000000 });
        console.log(candidatesResponse);
        // redirect to the age again
        window.location.replace("manage-candidates.php");
 }

</script>