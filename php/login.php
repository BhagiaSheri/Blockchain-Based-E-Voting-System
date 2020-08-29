<?php
// start session
session_start();

if (isset($_POST['email'])  && isset($_POST['password'])) {
    // get global connection variable
    global $conn;
    // for alert 
    $msg = "";

    //   if no connected to DB, connect
    if ($conn == null)
        include_once("config/connection.php");

    //   get entered values
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // check if admin is logged in -> redirect to admin module
    // get data from admin table to validate
    $pdo = $conn->prepare("SELECT * FROM ADMIN WHERE email=? and password=?");
    $pdo->bindValue(1, $email);
    $pdo->bindValue(2, $pass);
    $pdo->execute();
    // fetch the data as associative array 
    $row = $pdo->fetch(PDO::FETCH_ASSOC);

    // validate user
    if ($row['email'] == $email &&  $row['password'] == $pass) {

        // Create Session Variables
        $_SESSION['role'] = 'admin';
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['full_name'];

        //    Redirect to admin module
        header("location:../php/admin/admin.php");
    } else {
        //hashed function
        $pass = md5($pass);

        // get data from users table to validate
        $pdo = $conn->prepare("SELECT * FROM USERS WHERE email=? and password=? and is_deleted=0 ");
        $pdo->bindValue(1, $email);
        $pdo->bindValue(2, $pass);
        $pdo->execute();
        // fetch the data as associative array 
        $row = $pdo->fetch(PDO::FETCH_ASSOC);

        // validate user
        if ($row['email'] == $email &&  $row['password'] == $pass) {
            // echo "Welcome!";  
            // Create Session Variables
            $_SESSION['role'] = 'user';
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            $_SESSION['user_vote_casting_status'] = $row['is_active'];


            // // check the vote timing
            $pdo = $conn->prepare("SELECT * FROM vote_timing");
            $pdo->execute();
            // fetch the data as associative array 
            $row = $pdo->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // voting schedule
                $v_startDate = $row["start_date"];
                $v_endDate = $row["end_date"];
                $v_startTime = $row["start_time"];
                $v_endTime = $row["end_time"];

                // current date & time
                date_default_timezone_set('Asia/Karachi');
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:00", time());

                // echo "db ".$v_startDate . " " . $v_endDate . " " . $v_startTime . " " . $v_endTime . " \n ";
                // echo $currentDate . "  current " . ($currentTime);

                // echo " TIME start  ".strtotime($v_startTime)." end".strtotime($v_endTime)." current ".strtotime($currentTime);


                if ($currentDate < $v_startDate) {
                    $msg = "Voting not started";
                    session_destroy(); //destroy the session
                } else if ($currentDate >= $v_startDate && $currentDate <= $v_endDate) {
                    $msg = "with in date";

                    // voting condition of one day satisfies
                    if ($currentDate >= $v_startDate && strtotime($currentTime) >= strtotime($v_startTime)  && strtotime($currentTime) <= strtotime($v_endTime)) {
                        $msg = "VOTE NOW 1";
                        $_SESSION['vote-end'] = false;
                         // redirect to user module
                        header("location:user.php");
                    }else
                    if ($currentDate != $v_endDate){
                        // voting condition of more than one day satisfies
                    if (  ($currentDate >= $v_startDate && strtotime($currentTime) >= strtotime($v_startTime) ) &&  $currentDate <= $v_endDate && strtotime($currentTime) ) {
                        $msg = "VOTE NOW >1";
                        $_SESSION['vote-end'] = false;
                         // redirect to user module
                        header("location:user.php"); 
                    }
                    }                        
                    
                    // voting on same date but process not started
                    else if (strtotime($currentTime) < strtotime($v_startTime)) {
                        $msg = "Voting not started";
                        session_destroy(); //destroy the session
                    }
                    // voting on same date but process time ended
                    else if ($currentDate == $v_endDate) {
                        if(strtotime($currentTime) > strtotime($v_endTime))
                        {
                            $msg = "Voting ended";
                            $_SESSION['vote-end'] = true;
                        }
    
                    }
                     else{
                        $msg = "Voting ended";
                        $_SESSION['vote-end'] = true;
                     }
                }
                if ($currentDate > $v_endDate) {
                    $msg = "Voting ended";
                    $_SESSION['vote-end'] = true;
                }        
            }

        } else {
            echo "Invalid Credentials, try again!";
        }
    }
}
?>  
    <!-- for sweet alert  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- alert code -->
<script>
    let msg = <?php  echo json_encode($msg) ?>;
    alert(msg);
    let alrtTitle = "";
    
    if (msg == "Voting not started") {
        alrtTitle = "Hey Voter! Voting is not started yet. Caste your vote from " +
            <?php echo json_encode($v_startDate) ?> + " at " + <?php echo json_encode($v_startTime) ?> +
            " to " + <?php echo json_encode($v_endDate) ?> + " at " + <?php echo json_encode($v_endTime) ?>;
            $(function() {
                 //a function that waits for the DOM to be ready
            // alert(alrtTitle);
        swal({
        type: "success",
        title: "Voting not started",
        icon: "warning",
        text: alrtTitle,
        }).then((response) => {
            window.location.replace("../index.php");
            });
        });

    } else 
    if (msg == "Voting ended") {
        alrtTitle = "Hey! Voting process ended but you can still see the election statistics";
            window.location.replace("user.php");
    }

    

</script>