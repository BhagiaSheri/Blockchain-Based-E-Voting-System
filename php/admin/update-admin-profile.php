<?php
// start session
session_start();
$msg="";

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['edit-id-profile'] ) && isset($_POST['edit-admin-name'] ) && isset($_POST['edit-admin-password'] )
     && isset($_POST['edit-admin-confirm-password'] ) )
     {

        if( $_POST['edit-admin-password'] == $_POST['edit-admin-confirm-password'] )
        {
            // get global connection variable
            global $conn;

             //   connect, if not connected to DB
             if ($conn == null)
            include_once("../config/connection.php");

            //   get entered values
            $id = $_POST['edit-id-profile'];
            $name = $_POST['edit-admin-name'];
            $password = $_POST['edit-admin-password'];
            $confirmPassword = $_POST['edit-admin-confirm-password'];
        
            $pdo = $conn->prepare("UPDATE admin SET full_name=?, password=? where id=?");
            $pdo->bindValue(1, $name);
            $pdo->bindValue(2, $password);
            $pdo->bindValue(3, $id);
            $result = $pdo->execute();
        
            if($result)
            {
                $_SESSION['user_name'] = $name;
               $msg = "Admin profille Updated";
                header("location:manage-candidates.php");
            }
            else
            $msg =  "ERROR! Not Updated!";
        }else 
        $msg =  "Password does not mattch";
    }
     else
     $msg =  "Please! enter all required fields";
}
else
$msg =  "Session Expired, Login Again!";
echo $msg;
?>
