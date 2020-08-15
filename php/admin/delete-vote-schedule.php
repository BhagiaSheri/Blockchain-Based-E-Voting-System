<?php
// start session
session_start();

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['delete-schedule-id']) )
    {
        $id = $_POST['delete-schedule-id'];

        // get global connection variable
        global $conn;

        //connect, if not connected to DB
        if ($conn == null){
        include_once("../config/connection.php");
        }

        $pdo = $conn->prepare("DELETE FROM vote_timing WHERE t_id=?");
        $pdo->bindValue(1, $id);

        $result = $pdo->execute();
        
        if($result)
        {
            // echo "";
            header("location:schedule-vote.php");
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