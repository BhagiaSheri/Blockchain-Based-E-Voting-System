<?php
// start session
session_start();

// ge data for admin
if (isset($_SESSION['role'])  && $_SESSION['role'] == 'admin' ) {

        $id = $_SESSION['user_id'];

         // get global connection variable
        global $conn;

        //connect, if not connected to DB
        if ($conn == null){
        include_once("config/connection.php");
        }

        $stm = $conn->prepare("SELECT full_name, password from admin where id=?");
        $stm->bindValue(1,$id);
        $result = $stm->execute();

        if($result)
        {
                $row = $stm->fetch();
                $jsonArray = array
                (
                    'id'=> $id 
                    ,'role'=> 'admin'
                ,   'name' => $row['full_name'] 
                ,   'password' => $row['password']
                );
                echo (json_encode($jsonArray));
        }
        else 
     echo "resut not true!";
     
}
// get data for user
else if (isset($_SESSION['role'])  && $_SESSION['role'] == 'user' )
{
    $id = $_SESSION['user_id'];

    // get global connection variable
   global $conn;

   //connect, if not connected to DB
   if ($conn == null){
   include_once("config/connection.php");
   }

   $stm = $conn->prepare("SELECT name,contact_no,age, password, profile, imgtype from admin where id=?");
   $stm->bindValue(1,$id);
   $result = $stm->execute();

   if($result)
   {
           $row = $stm->fetch();
           $jsonArray = array
           (
               'id'=> $id 
               ,'role'=> 'user'
           ,   'name' => $row['name'] 
           ,   'password' => $row['password']
           ,   'profile' => '<img  alt="Profile Picture" id="edit-candidate-profile-imgTag" src= "data:'. $row["imgtype"] .';base64,'.base64_encode($row["profile"]).'"height="100" width="100" "/>
                                 <div class="mt-3 profile_container"> <input type="file" name="edit-candidate-pic" id="edit-candidate-pic" class="file_btn" accept="image/*"  /></div>'
                ,   'imgtype' => $row['imgtype'] 
           );
           echo (json_encode($jsonArray));

   }
   else 
echo "resut not true!";

}
else
echo "Session Expired, Login Again!";
