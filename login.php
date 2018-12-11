<?php  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iJournal - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    
</head>
<?php
include_once("config.php");

    $msg = '';
    if(isset($_POST['login-submit'])){
        $email = $_POST["email"];
        $password =sha1($_POST["password"]);
        
        $login = "SELECT ID FROM users WHERE Email = '$email' and Password = '$password' ";
        $result = mysqli_query($config,$login);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $user_id = trim($row["ID"]);
        $count = mysqli_num_rows($result);
        
        if($count == 1){
            header("location:notes.php?ID=$user_id");
           
        }else{
            $msg = "<p class='fs-14 alert-text-color mb-0 alert alert-warning text-center rounded-0 border-0' role='alert'>error!</p>";
            // header("location:login.php");
            
        }
    
    }
?>
<body>
    <header>
    <h1 class="fw-500  text-center"><span class="white-text-color">i</span>Journal</h1>
    </header>
    <div class="container">
        <div class="col-12">
           
            <div class="card mx-auto my-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center" id="heading-text">Login</h5>
                   
                    <form method="post" action="" >
                    <?php  echo $msg; ?>
                        <div class="form-group">
                            <label for="email" class="fs-12">Email</label>
                            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="Password" class="fs-12">Password</label>
                            <input type="password" required class="form-control" name="password" id="Password" >
                        </div>
                        <div class="row no-gutters text-center">
                            <div class="form-check col-6 text-center">
                                <input type="checkbox" class="form-check-input" id="remember-me">
                                <label class="form-check-label fs-12" for="remember-me">Remember me</label>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-color white-text-color" name="login-submit"> login </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-2">
                        <div class="col-6">
                            <a href="login.php" class="card-link fs-14" id="login">Open my journal</a>
                        </div>

                        <div class="col-6">
                            <a href="index.php" class="card-link fs-14  float-right" id="signup">Sign-up</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

  
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>