<?php include_once("session.php");

include_once("config.php");

$user_id = $_SESSION["ID"];


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iJournal - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    
</head>
<body>
  
    <div class=" container-fluid">
        <div class="row white-bg">
            <div class="col-3"><h1 class="fw-500"><span class="primary-color">i</span>Journal</h1></div>
            <div class="col-9 d-flex justify-content-end">
                <div class="dropdown m-2">
                    <button class="btn btn-primary-color dropdown-toggle white-text-color" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <img src="" alt=""> -->
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" href=<?php echo "notes.php?ID=".$user_id;?>>New Note</a>
                        <a class="dropdown-item"  href=<?php echo "profile.php?ID=".$user_id;?>>Profile</a>
                        <a href="logout.php" class="dropdown-item">Log out</a>
                    </div>
                </div>
            </div>
        </div>
   

        <div class="col-12 col-sm-10 mx-auto">
           
            <div class="card rounded-bottom" style="height:600px;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-5">Set Up Profile!</h5>

                     <?php  
                        $msg = ''; 
                       
                                                                    
                        $user_id = trim($_SESSION["ID"]);

                        $user = "SELECT * FROM users WHERE ID = '$user_id'";
                        $result = mysqli_query($config,$user);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                        $count = mysqli_num_rows($result);

                        //UPDATE USER

                        if(isset($_POST['update_user'])){
                            $user_name = $_POST["name"];
                            $email = $_POST["email"];
                            $new_pass = sha1($_POST["new_pass"]);
                            $confirm_password = sha1($_POST['confirm_pass']);
                            if($user_name == null || $new_pass == null ){
                                $edit_user = "Update users set  Email = '$email' where ID = $user_id ";
                           
                                if($confirm_password==$new_pass){
                                    $result_edit = mysqli_query($config,$edit_user ) or die(mysqli_error($config));
                                    $msg = "<p class='fs-14 alert-text-color mb-0 alert alert-success text-center rounded-0 border-0' role='alert'>Password changed successfully</p>";
                                
                                }else if($confirm_password!=$new_pass){
                                    $msg = "<p class='fs-14 alert-text-color mb-0 alert alert-warning text-center rounded-0 border-0' role='alert'>confrim password does not match new password</p>";
                                
                                }
                            }else{
                                $edit_user = "Update users set Username = '$user_name', Email = '$email' , Password = '$new_pass' where ID = $user_id ";
                          
                            
                                if($confirm_password==$new_pass){
                                    $result_edit = mysqli_query($config,$edit_user ) or die(mysqli_error($config));
                                    $msg = "<p class='fs-14 alert-text-color mb-0 alert alert-success text-center rounded-0 border-0' role='alert'>Password changed successfully</p>";
                                
                                }else if($confirm_password!=$new_pass){
                                    $msg = "<p class='fs-14 alert-text-color mb-0 alert alert-warning text-center rounded-0 border-0' role='alert'>confrim password does not match new password</p>";
                                
                                }

                            }
                        }


                        ?>
                    <form method="post" action="">
                        <?php echo $msg;  ?>
                        <div class="row mx-auto justify-content-center">
            
                            <div class="form-group row">
                                <label for="email" class="col-12 col-sm-3">Email</label>
                                <div class="col-12 col-sm-9">
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $row['Email']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto justify-content-center">
                            <div class="form-group row">
                                <label for="name" class="col-12 col-sm-3">Name</label>
                                <div class="col-12 col-sm-9">
                                    <input type="name" class="form-control" id="name" name="name" >
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto justify-content-center">
                            <div class="col-12 col-sm-6  mt-3">
                                <p class="black-text-color fw-500 fs-18">Change Password</p>
                            </div>
                        </div>
                        <!-- <div class="row mx-auto justify-content-center mt-2">
                            <div class="form-group col-6">
                                <label for="current_password" class="label" >Current Password:</label>
                                <input type="password"  class="form-control form" name="current_pass" aria-describedby="current_password" >
                            </div>
                        </div> -->
                        <div class="row mx-auto justify-content-center">
                            <div class="form-group col-12 col-sm-6 ">
                                <label for="new_password" class="label">New Password:</label>
                                <input type="password"  class="form-control form password_policy_input" required name="new_pass" aria-describedby="new_password" >
                            </div>
                        </div>
                        <div class="row mx-auto justify-content-center">
                            <div class="form-group col-12 col-sm-6 ">
                                <label for="confirm_password" class="label">Confirm Password:</label>
                                <input type="password"  class="form-control form" name="confirm_pass" required aria-describedby="confirm_password" >
                            </div>
                        </div>
                            
                        <div class="row mx-auto justify-content-center">
                            <div class="col-12 col-sm-6 d-flex justify-content-end">
                                <button class="btn px-5 btn-primary-color white-text-color" type="submit" name="update_user"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                   

                </div>
            </div>

        </div>
        <footer class="row footer_p">
               
            <div class="col-12 w-100 white-bg">
                <p class="text-center primary-color">Copyrights 2018 AKINTOMIDE OLUWADAMILOLA</p>
            </div>
        </footer>
    </div>
    
    <script src="js/main.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
