<?php
// start session
session_start();

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['edit-start-date-schedule'] ) && isset($_POST['edit-end-date-schedule'] ) && isset($_POST['edit-start-time-schedule'] )
     && isset($_POST['edit-end-time-schedule'] ) && isset($_POST['edit-id-schedule']) )
     {
         // get global connection variable
        global $conn;

    //   connect, if not connected to DB
        if ($conn == null)
        include_once("../config/connection.php");

    //   get entered values
        $id = $_POST['edit-id-schedule'];
        $start_date = $_POST['edit-start-date-schedule'];
        $end_date = $_POST['edit-end-date-schedule'];
        $start_time = $_POST['edit-start-time-schedule'];
        $end_time = $_POST['edit-end-time-schedule'];

        // set format of time acc; to database
        if(strlen($start_time)<6)
        {
            echo "start legth <6 \n";
            $start_time = $start_time.":00";

        }
        if(strlen($end_time)<6)
        {
            $end_time = $end_time.":00";
            echo "start legth <6 \n";

        }

        // echo $start_date."\n". $end_date."\n".$start_time."\n".$end_time."\n".$id."\n";
      
        $pdo = $conn->prepare("UPDATE vote_timing SET start_date=?, end_date=?, start_time=?, end_time=? where t_id=?");

            $pdo->bindValue(1, trim($start_date));
            $pdo->bindValue(2, trim($end_date));
            $pdo->bindValue(3, trim($start_time));
            $pdo->bindValue(4, trim($end_time));
            $pdo->bindValue(5, $id);         

            $result = $pdo->execute();
        
            if($result>0)
            {
                echo "Vote Schedule Updated ".$result;
                header("location:schedule-vote.php");    
            }
            else
                echo "ERROR! Not Updated!";
    }
     else
        echo "Please! enter all required fields";
}
else
    echo "Session Expired, Login Again!";
