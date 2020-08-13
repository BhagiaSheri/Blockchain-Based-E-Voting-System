<?php
// start session
session_start();

if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

    // check if all entered values
    if( isset($_POST['id']) )
    {
        $id = $_POST['id'];

         // get global connection variable
        global $conn;

        //connect, if not connected to DB
        if ($conn == null){
        include_once("../config/connection.php");
        }

        $stm = $conn->prepare("SELECT * from CANDIDATES where c_id=?");
        $stm->bindValue(1,$id);
        $result = $stm->execute();

        if($result)
        {
                $row = $stm->fetch();
                $jsonArray = array
                (
                    'c_id'=> $id 
                ,   'name' => $row['name'] 
                ,   'email' => $row['email']
                ,   'contact' => $row['contact_no']
                ,   'age' => $row['age'] 
                ,   'designation' => $row['designation']
                ,   'profile' => '<img  alt="Profile Picture" id="edit-candidate-profile-imgTag" src= "data:'. $row["imgtype"] .';base64,'.base64_encode($row["profile"]).'"height="100" width="100" "/>
                                 <div class="mt-3 profile_container"> <input type="file" name="edit-candidate-pic" id="edit-candidate-pic" class="file_btn" accept="image/*"  /></div>'
                ,   'imgtype' => $row['imgtype']   
                );
                echo (json_encode($jsonArray));
        }
        else 
     echo "resut not true!";
     }
}
else
echo "Session Expired, Login Again!";
