<?php
// start session
session_start();

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['create-candidate-name'] ) && isset($_POST['create-candidate-email'] ) && isset($_POST['create-candidate-contact'] )
     && isset($_POST['create-candidate-dob'] ) && isset($_POST['create-candidate-designation']) && isset($_FILES['create-candidate-pic'] ) )
     {
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
    
    if($result)
    {
        // echo "Candidate Registered!";
       header("location:manage-candidates.php");
    }
    else
        echo "Not Registered!";


     }
     else
     echo "Please! enter all required fields";
}
else
echo "Session Expired, Login Again!";
?>