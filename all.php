<?php
include_once("session.php");
include_once("config.php");

//SIGN UP 
if(isset($_POST['signup-submit'])){
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);
    $signup = "insert into users(Email,Password) values ('$email','$password') ";
    $select = "select * from users";
    $result_select = mysqli_query($config,$select) or die(mysqli_error($config));
    $row = mysqli_fetch_array($result_select,mysqli_assoc);

    if($email != $row["Email"]){
    $result = mysqli_query($config,$signup) or die(mysqli_error($config));
    $msg = "<p class='fs-14 alert-text-color mb-0 alert alert-warning text-center d-none rounded-0 border-0' role='alert'>Sign up successful!</p>";
    header("location:login.php");

    }else{
        $msg = "<div class='alert alert-warning text-center d-none rounded-0 border-0' role='alert'>
        <p class='fs-14 alert-text-color mb-0'>This user already exists!</p>
        
        </div>";
    }

}

$user_id = $_SESSION["ID"];

//UPDATE NOTE




 
?>
