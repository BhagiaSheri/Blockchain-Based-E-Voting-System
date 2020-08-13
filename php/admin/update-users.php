<!-- user-sign-up PHP code -->
<?php

if ($_POST) {
    global $conn, $stm;

    if ($conn == null) {
        include_once("../config/connection.php");
    }
    session_start();
    if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {

        if (isset($_POST["edit"])) {
            $uid = $_POST['user-id'];
            $name = $_POST['uname'];
            $email = $_POST['uemail'];
            $pno = $_POST['uphone-no'];
            $age = $_POST['uage'];

            if ($name != "" && $email != "" && $pno != "" && $age != "") {

                if (empty($_FILES['user-profile']['tmp_name'])) {
                    $stm = $conn->prepare("UPDATE users SET name=?, email=? , contact_no=?, age=? WHERE id=?");
                    $stm->bindParam(5, $uid);
                } else {

                    $pic = file_get_contents($_FILES['user-profile']['tmp_name']);
                    $pictype = $_FILES['user-profile']['type'];

                    $stm = $conn->prepare("UPDATE users SET name=?, email=? , contact_no=?, age=?, profile=?, imgtype=? WHERE id=?");

                    $stm->bindParam(5, $pic);
                    $stm->bindParam(6, $pictype);
                    $stm->bindParam(7, $uid);
                }

                $stm->bindParam(1, $name);
                $stm->bindParam(2, $email);
                $stm->bindParam(3, $pno);
                $stm->bindParam(4, $age);
                $row = $stm->execute();

                if ($row) {
                    echo "alert('User Updated Sucessfully!')";
                    header("Location: manage-users.php");
                }
            } else {
                echo "<br>User is not Updated Successfull!! " . $conn->error;
            }
        } else {
            echo "alert('All Fields are required!')";
        }
    }
}

?>