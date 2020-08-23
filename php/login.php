<?php
// start session
session_start();

if (isset($_POST['email'])  && isset($_POST['password'])) {
    // get global connection variable
    global $conn;

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
        $pdo = $conn->prepare("SELECT * FROM USERS WHERE email=? and password=?");
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
             // redirect to user module
            header("location:user.php"); 
        } else {
            echo "Invalid Credentials, try again!";
        }
    }
}
