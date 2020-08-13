<?php
// start session
session_start();

if (isset($_SESSION['user_name'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['delete-user-id']) )
    {
        $id = $_POST['delete-user-id'];

        // get global connection variable
        global $conn;

        //connect, if not connected to DB
        if ($conn == null){
        include_once("../config/connection.php");
        }

        $pdo = $conn->prepare("UPDATE users SET is_deleted = ? WHERE id=?");
        $pdo->bindValue(1, 1);
        $pdo->bindValue(2, $id);

        $result = $pdo->execute();
        
        if($result)
        {
            // echo "Candidate Registered!";
            header("location:manage-users.php");
        }
    else
        echo "Not Deleted!";
     }
     else
     echo "Delete ID not set!";
}
else
echo "Session Expired, Login Again!";
?>