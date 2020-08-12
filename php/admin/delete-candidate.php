<?php
// start session
session_start();

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['delete-candidate-id']) )
    {
        $id = $_POST['delete-candidate-id'];

         // get global connection variable
        global $conn;

        //connect, if not connected to DB
        if ($conn == null){
        include_once("../config/connection.php");
        }

        $pdo = $conn->prepare("UPDATE CANDIDATES SET is_deleted = ? WHERE c_id=?");
        $pdo->bindValue(1, 1);
        $pdo->bindValue(2, $id);

        $result = $pdo->execute();
        
        if($result)
        {
            // echo "Candidate Registered!";
            header("location:manage-candidates.php");
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