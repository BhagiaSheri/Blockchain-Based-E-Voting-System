<?php
// start session
session_start();

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['start-date-schedule'] ) && isset($_POST['end-date-schedule'] ) && isset($_POST['start-time-schedule']) && isset($_POST['end-time-schedule'] ) )
     {
         // get global connection variable
        global $conn;

          //   connect, if not connected to DB
        if ($conn == null)
        include_once("../config/connection.php");

        //   get entered values
        $startDate = $_POST['start-date-schedule'];
        $endDate = $_POST['end-date-schedule'];
        $startTime = $_POST['start-time-schedule'].":00";
        $endTime = $_POST['end-time-schedule'].":00";

        echo $startDate."\n".$endDate."\n".$startTime."\n".$endTime;
        $pdo = $conn->prepare("INSERT INTO vote_timing (start_date, end_date, start_time, end_time ) VALUES(?,?,?,?) ");
        $pdo->bindValue(1, $startDate);
        $pdo->bindValue(2, $endDate);
        $pdo->bindValue(3, $startTime);
        $pdo->bindValue(4, $endTime);
    
        $result = $pdo->execute();
    
    if($result)
    {
        // echo "Vote Time Set!";
       header("location:schedule-vote.php");
    }
    else
        echo "Vote Time Not Set!";


     }
     else
     echo "Please! enter all required fields";
}
else
echo "Session Expired, Login Again!";
?>