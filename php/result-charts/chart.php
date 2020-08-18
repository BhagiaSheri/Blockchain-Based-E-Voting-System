<?php

//setting header to json
header('Content-Type: application/json');

//set conection to DB in case of null
global $conn;
if ($conn == null) {
    include_once("../config/connection.php");
}

//query to get all the data from the candidate table.
$stm = $conn->prepare("SELECT name, no_of_votes from CANDIDATES where is_deleted =0");

//execute the query.
$stm->execute();

// json array to store the candidates info
$data = array();

//loop through the returned data.
while ($row = $stm->fetch()) {
    $data[] = array(
        'name' => $row['name'],
        'no_of_votes' => $row['no_of_votes']
    );
}

//now print the data in JSON format
print json_encode($data);
