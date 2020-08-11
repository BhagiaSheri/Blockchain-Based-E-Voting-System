<?php
session_start(); //to ensure you are using same session
if( isset($_SESSION['user_id']) ){
session_destroy(); //destroy the session
echo 'logout';
}
?>