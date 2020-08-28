<?php
session_start();

$distinctCandidates = array();
global $conn;

if ($conn == null)
    include_once("config/connection.php");

// check active status
$stm = $conn->prepare("SELECT is_active,is_deleted from users where id=?");
$stm->bindValue(1, $_POST["user_id"]);
$stm->execute();
$active = $stm->fetch();

// if user is active -> eligible to cast voe
if ($active["is_active"] == 1 && $active["is_deleted"] == 0) {

    $stm = $conn->prepare("SELECT DISTINCT(designation) from CANDIDATES");
    $stm->execute();

    // fetch data by designation
    while ($row = $stm->fetch()) {
        array_push($distinctCandidates, $row['designation']);
    }
    echo '
    <div class="container-fluid">
                   <h1 align="center" class="py-4">Candidates Up For Election</h1>
                   <div class="mt-4 pb-4">
    ';

    foreach ($distinctCandidates as $candidate) {
        $stm = $conn->prepare("SELECT * from CANDIDATES where designation=? and is_deleted=0");
        $stm->bindValue(1, $candidate);
        $stm->execute();


        echo '
       <h3 class="subtitle" > ' . $candidate . ' List</h3>
       <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4">
       ';

        while ($row = $stm->fetch()) {
            echo '
           <div class="col-5">
               <div class="card card-block">
                   <div class="row no-gutters">
                       <div class="col-sm-5">
                           <img class="card-img" src="data:' . $row['imgtype'] . ';base64,' . base64_encode($row['profile']) . '"/>
                        </div>
                       <div class="col-sm-7 d-flex flex-column justify-content-center">
                           <div class="card-body d-flex flex-column justify-content-center">
                           <h4 class="card-title">' . $row['name'] . '</h4>
                           <p class="card-text">' . $row['designation'] . '</p>
                ';

            //    if user have casted vote to any of them thn not able to caste vote again
            $casted = 0;
            if (isset($_POST["votingData"])) {
                foreach ($_POST["votingData"] as $d) {
                    if ($row['c_id'] == $d) {
                        $casted = 1;
                    }
                }
            }
            if ($casted == 1) {
                echo '<a  class="badge badge-pill "  style="font-size:20px; background-color:#e91d36">Vote Casted</a> ';
            } else {
                //    if user have casted vote to any of the fatched designation
                //  thn not able to caste vote again to any candididate of same designation

                $castedDesignation = 0;
                if (isset($_POST["candiDsignations"])) {
                    foreach ($_POST["candiDsignations"] as $d) {
                        if ($row['designation'] == $d) {
                            $castedDesignation = 1;
                        }
                    }
                }


                if ($castedDesignation == 0) {
                    // to store candidate index
                    $candiIndex = "";
                    $candiDesig = "";

                    // map candidate id with smart contract index
                    for ($i = 0; $i < sizeof($_POST["candidateData"]); $i++) {
                        if ($row['c_id'] == $_POST["candidateData"][$i][0]) {
                            $candiIndex = $i;
                            $candiDesig = $_POST["candidateData"][$i][2];
                        }
                    }


                    // check if voting is already ended, thn don't allow vote
                    if (!isset($_SESSION['vote-end']) && $_SESSION['vote-end'] != "true") {
                        echo '
                                <a class="caste-vote btn btn-success ' . $_POST["userIndex"] . '" name="' . $candiDesig . '" id="' . $candiIndex . '" >Cast Vote</a>                
                                                ';
                    }
                    // else{
                    //     echo'
                    //         <a class="caste-vote btn btn-success '.$_POST["userIndex"].'" name="'.$candiDesig.'" id="' . $candiIndex . '" >Cast Vote</a>                
                    //                         ';
                    // }
                }
            }
            echo '                   
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           ';
        }
        echo "</div>
       
       ";
    }
} else {
    echo '
<center>
<div class="col align-middle " style="margin-top:30px; width: fit-content;">
<div class="card card-block ">
<div class="card-body d-flex flex-column justify-content-center" >
   <h4 class="card-title"> Hey ' . $_POST['user_name'] . ' !</h4>
   <h4 class="card-text" style="color:#e91d36">You are not approved yet to caste vote, Please wait for your approval from admin!</h4>
   <h4 class="card-text"  style="color:#e91d36">Thank You for your patience!</h4>
</div>

</div>
</div>
</center>
   ';
}

// }
// else{

?>