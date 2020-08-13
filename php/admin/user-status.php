<?php

global $conn, $stm;
if ($conn == null) {
    include_once("../config/connection.php");
}

session_start();
if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {

    $status = $_GET['status'];
    $user_id = $_GET['uid'];

    if ($status) {
        $stm = $conn->prepare("UPDATE users SET is_active=0 WHERE id=?");
    } else {
        $stm = $conn->prepare("UPDATE users SET is_active=1 WHERE id=?");
    }
    $stm->bindParam(1, $user_id);
    $row = $stm->execute();
    if ($row) {
        header("Location: manage-users.php");
    } else {
        echo "<br>Can't update Status!" . $conn->error;
    }
}

?>