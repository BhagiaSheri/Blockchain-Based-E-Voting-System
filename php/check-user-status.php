<?php
 global $conn;
if ($conn == null)
include_once("config/connection.php");

// check active status
$stm = $conn->prepare("SELECT is_active from users where id=?");
$stm->bindValue(1, $_POST["user_id"]);
$stm->execute();
$active = $stm->fetch();
if ($active["is_active"] == 0) {
    echo '
    <center>
    <div class="col align-middle " style="margin-top:30px; width: fit-content;">
    <div class="card card-block ">
    <div class="card-body d-flex flex-column justify-content-center">
       <h4 class="card-title"> Hey ' . $_POST['user_name'] . ' !</h4>
       <h6 class="card-text" style="color:#e91d36">You are not approved yet to caste vote, Please wait for your approval from admin!</h6>
       <h6 class="card-text"  style="color:#e91d36">Thank You for your patience!</h6>
    </div>
    
    </div>
    </div>
    </center>
       ';
}
?>