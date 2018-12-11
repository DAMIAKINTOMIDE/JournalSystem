<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iJournal - Sign-Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    
</head>
<body>
    <header>
        <img src="files/" alt="logo">
    </header>
    <div class="container">
        <div class="col-12">
           
            <div class="card mx-auto my-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center" id="heading-text">Create a Journal today!</h5>
                    <?php $msg ?>
                    <form method="post" action="all.php">
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
                                <button type="submit" class="btn btn-primary-color white-text-color" name="signup-submit"> Join </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-2">
                        <div class="col-6">
                            <a href="login.php" class="card-link fs-14" id="login">Open my journal</a>
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