<!-- user-sign-up PHP code -->
<?php

$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: bhagiasheri24@gmail.com";

if ($_POST) {
    global $conn;

    if ($conn == null) {
        include_once("config/connection.php");

        if (isset($_POST["signup"])) {

            $name = $_POST['uname'];
            $email = $_POST['uemail'];
            $pno = $_POST['uphone-no'];
            $dob = $_POST['udob'];
            $pass = $_POST['upass'];
            $cpass = $_POST['uconfirm_pass'];
            $pic = file_get_contents($_FILES['profile-pic']['tmp_name']);
            $pictype = $_FILES['profile-pic']['type'];

            if ($pass === $cpass) {

                $pass = md5($pass);
                $age = date("Y") - substr($dob, 0, 4);

                // echo $name.",".$email.",".$pno.",".$age.",".$pass.",".$cpass.",".$pictype;

                $stm = $conn->prepare("INSERT into users (name,email,contact_no,age,password,profile,imgtype) values(?,?,?,?,?,?,?)");
                $stm->bindParam(1, $name);
                $stm->bindParam(2, $email);
                $stm->bindParam(3, $pno);
                $stm->bindParam(4, $age);
                $stm->bindParam(5, $pass);
                $stm->bindParam(6, $pic);
                $stm->bindParam(7, $pictype);
                $row = $stm->execute();
                if ($row) {
                    echo "<br>Registration Successfull!!!";

                    if (mail($email, $subject, $body, $headers)) {
                        echo ("Email successfully sent to $to_email...");
                    } else {
                        echo ("Email sending failed...");
                    }
                    session_start();
                    if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {
                        header("Location: admin/manage-users.php");
                    } else {
                        header("Location: ../login.php");
                    }
                } else {
                    echo "<br>Registration Not Successfull!! ";
                }
            } else {
                echo "<br>Password does not Matched!!!";
            }
        }
    }
}
?>