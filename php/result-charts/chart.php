<?php

//setting header to json
header('Content-Type: application/json');

//database
DEFINE('DB_USER' , 'root');	//Username
DEFINE('DB_PASS' , "11228");	//Userpassword	
DEFINE('DB_NAME' , 'blockchain_e_vote');	//Database Name
DEFINE('DB_HOST' , 'localhost');	//Host

//getConnection
$mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$mysqli){
    die("Connection Failed!... ".$mysqli->error);
}

//   if no connected to DB, connect
// if ($conn == null)
// include_once("../config/connection.php");

//query to get all the data from the candidate table.
$query=sprintf("SELECT name, no_of_votes from candidates where is_deleted =0");
//execute the query.

$result=$mysqli->query($query);
// $stm->execute();
// $result = $stm->fetch();

//loop through the returned data.
$data=array();
foreach($result as $row){
    $data[]=$row;
}

//now print the data in JSON format
print json_encode($data);
