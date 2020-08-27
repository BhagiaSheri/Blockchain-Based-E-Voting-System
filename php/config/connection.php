<?php

//Database Connection
$dbhost="localhost";
$dbname="blockchain_e_vote";
$dbuser="root";
$dbpass="03012220690";

try{
    $conn=new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    // echo "Connection Suucessfull!!!";
}
catch(PDOException $ex){
    $ex->getMessage();
}
?>