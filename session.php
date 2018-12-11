<?php

//check if user is in session if not then lead to login page
session_start();
if(!empty($_GET["ID"])){
$_SESSION["ID"] = $_GET["ID"];
// if( header() == "login.php"  && isset($_SESSION["ID"])){
//     $user_id = $_SESSION["ID"];
//     header("location:notes.php?ID=".$user_id);
// }
}
if(!isset($_SESSION["ID"])){
    header("location:login.php");
}



?>