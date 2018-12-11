<?php 
include_once("session.php");

include_once("config.php");
    $user_id = $_SESSION["ID"];

?>
<!DOCTYPE html>

<?php 

 
    //CREATE NEW NOTE
    if(isset($_POST['save_note'])){
        $note_name = $_POST["note-name"];
        $note = $_POST["note-text"];
       
    $create_note = "insert into notes(name,note,user_id) values ('$note_name','$note','$user_id')";
    
    $result = mysqli_query($config,$create_note);
    }
    //END OF CREATE NEW NOTE QUERY


    //VIEW NEW NOTE
    $view_notes = "select * from notes where user_id = '$user_id'";    
    $result = mysqli_query($config,$view_notes);
    $count = mysqli_num_rows($result);
    //END OF VIEW NOTE QUERY
  
    
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iJournal - Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    
</head>

<body>
   <div class="container-fluid">
    <header class="row white-bg">
       
        <div class="col-3"><h1 class="fw-500"><span class="primary-color">i</span>Journal</h1></div>
        <div class="col-9 d-flex justify-content-end">
            <div class="dropdown m-2">
                <button class="btn btn-primary-color dropdown-toggle white-text-color"  type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    </header>
            
    <div class="row con">
    
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 white-bg">
            <div class="h-100 custom-border-top white-bg">
                
                <div class="row">
                    <div class="col-12">
                        
                        <div class="form-group mt-2">
                            <form method="post"  action="">
                                <input class="form-control my-1" id="search" name="search-name" placeholder="looking for a note.. ">
                                <button type="submit" class="btn" name="search_note" id="search_note" >Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-6"> 
                        <button class="btn btn-primary-color white-text-color">Download</button>
                    </div> -->
                    <div class="col-6 d-flex align-items-center"> 
                        <a href=<?php echo "notes.php?ID=".$user_id;?> class="fs-14 underline" id="new-note"><i class="fas fa-plus underline"></i> New Note</a>
                    </div>
                </div>
                <?php 
                            if(isset($_POST['search_note'])){
                                $name = $_POST["search-name"];
                            
                            $search_note = "select * from notes where name like '%$name%' and  user_id = $user_id";
                            $result_search = mysqli_query($config,$search_note) or die(mysqli_error($config));
                            
                            $row = mysqli_fetch_array($result_search,MYSQLI_ASSOC);
                            // if($name == null){echo "no results";}
                            if (mysqli_num_rows($result_search)> 0) {
                           
                        ?>
                <div class="row m-2 mt-3 border p-2" id="searched">
                    <p class="mb-1 fw-500 fs-14">SEARCHED ITEM </p>
                    <div class="col-8">
                        <p class="mb-0"><?php echo $row["created_at"]; ?></p>
                        <p><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="col-2">
                        <a  href=<?php echo "notes.php?ID=".$user_id."&note_id=".$row['ID'] ;?>  class="edit_link"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <div class="col-2">
                        <a href="#" data-toggle="modal" data-target="#delete-note" ><span class="red-text-color">&#10006;</span></a>
                    </div>

                </div>
                            <?php }else {echo "no results";}} ?>
                            <?php  
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC) ){   ?>
                <div class="row m-2 mt-3 border-bottom" id="all">
                    <div class="col-8">
                        <p class="mb-0"><?php echo $row["created_at"]; ?></p>
                        <p><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="col-2">
                        <a  href=<?php echo "notes.php?ID=".$user_id."&note_id=".$row['ID'] ;?>  class="edit_link"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <div class="col-2">
                    <?php
            
        
                        if(isset($_POST["delete_note"])){

                            $note_id_del = $_POST["note_id_del"];
                            $delete_note = "Delete from notes where ID = $note_id_del and user_id = $user_id";
                            
                            $result_delete = mysqli_query($config,$delete_note) or die(mysqli_error($config));
                                
                        }
                        ?>
                        <form action="" method="post">
                            <input type="text" name="note_id_del" hidden value="<?php echo $row["ID"];?>">
                            <button type="submit" name="delete_note" class="btn btn-danger" data-toggle="cscs_number" data-placement="top" title="Careful once deleted cannot be retrieved for now!"><span class="white-text-color">&#10006;</span></button>
                        </form>
                        
                    </div>

                </div>
                <?php  } ?>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-9 mt-1">
            <div class="alert alert-success text-center rounded-0 border-0" id="alert" role="alert">
                <p class="fs-14 alert-text-color mb-0">Welcome to your journal!   <a data-dismiss="alert" class="float-right">x</a></p>
                
            </div>
           
                <!-- <div class=" py-2 my-2 rounded"> -->
                    <?php
                    if(!empty($_GET["note_id"])){
                        $note_id = trim($_GET["note_id"]);
                        $view_note = "select * from notes where ID = '$note_id'";
                        $result_vnote = mysqli_query($config,$view_note);
                        $one_note = mysqli_fetch_array($result_vnote,MYSQLI_ASSOC);
                        $count_note_row = mysqli_num_rows($result_vnote);
                        
                        if(isset($_POST['update_note'])){
                            $note_id = $_GET["note_id"];
                            $note_name = $_POST["note-name"];
                            $note = $_POST["note-text"];
                        
                        $edit_note = "Update notes set name = '$note_name', note = '$note' where user_id = $user_id and ID = $note_id";
                        $result_edit = mysqli_query($config,$edit_note ) or die(mysqli_error($config));
                        
                        }

                        if($count_note_row == 1){
                    ?>
                     <form method="post" action="">
                    <input type="text" class="form-control d-flex justify-content-center my-2 col-6 border-0 border-bottom" value=" <?php echo $one_note["name"]?>" name="note-name">
                    <p class="white-text-color mx-2" id="date"><?php echo $one_note["created_at"]?></p>
                    <div class="card">
                        <div class="card-body" id="card-body">
                            <textarea id="note-text" required type="text" rows='10' cols="10" name="note-text" class="form-control">
                            <?php echo $one_note["note"]?>
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end my-2">
                            <!-- <button type="submit" class="btn yellow-bg fw-500" id="save" name="save_note">Save</button> -->
                            <button type="submit" class="btn btn-primary-color white-text-color fw-500 " id="update" name="update_note">Update</button>
                        </div>
                    </div>
                    </form>
                        <?php }} else {?>
                    <form method="post" action="">
                    <input type="text" class="form-control d-flex justify-content-center my-2 col-6 border-0 border-bottom" value="New Note" name="note-name">
                    <p class="white-text-color mx-2" id="date"></p>
                    <div class="card">
                        <div class="card-body" id="card-body">
                            <textarea id="note-text" type="text" rows='10' cols="10" name="note-text" class="form-control">
                          
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end my-2">
                            <button type="submit" class="btn btn-primary-color white-text-color fw-500" id="save" name="save_note">Save</button>
                            <!-- <button type="submit" class="btn yellow-bg fw-500 d-none" id="update" name="update_note">Update</button> -->
                        </div>
                    </div>
                    <?php }?>


                   
                <!-- </div> -->
            </form>
            <footer class="row">
               
                <div class="col-12 w-100 white-bg">
                        <p class="text-center primary-color">Copyrights 2018 AKINTOMIDE OLUWADAMILOLA</p>
                </div>
            </footer>
        </div>
        
    </div>
       
    
</div>
    
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
                 
   
</html>

