<?php
// start session
session_start();

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
                echo "Candidate Updated";
                header("location:manage-candidates.php");
            }
            else
                echo "ERROR! Not Updated!";
    }
     else
        echo "Please! enter all required fields";
}
else
    echo "Session Expired, Login Again!";
