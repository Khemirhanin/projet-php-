<?php 
session_start();

include("components/header.php") ;
$repository = new userRepository();
if(isset($_GET['user_id'])){
    $user = $repository->findById($_GET['user_id']);
    if(empty($user))
    {
        header("Location: index.php");
        exit;
    }
    
}

?>
<link rel="stylesheet" href="css/register.css">
<div class="py-5">
    <div class="container">
        <div class="row" id="form">
            <div class="col-md-12" >
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Update Now</h3>
                        <?php 
                    if(isset($_SESSION['status']))
                    {?>
                   <!--Display the alert message-->
                    <div class="alert" style="height:10px;">
                    <?php 
                
                        echo "<div class='alert alert-" . $_SESSION['alert_type'] . "' role='alert'>
                            " . $_SESSION['status'] . "
                        </div>";
                        unset($_SESSION['status']);}
                    ?>
                    </div>
                    <!-- the place holders will be the old information of the user -->
                    <div class="card-body">
                        <form action="updateProfileProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="<?=$user->UserName?>">

                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <div class="form-check" >
                                    <input type="radio" name="gender" value="male" class="form-check-input" id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="gender" value="female" class="form-check-input" id="female" >
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Email Adress</label>
                                <input type="text" name="email" class="form-control"  placeholder="<?=$user->Email?>" >
                                
                            </div>
                            <div class="form-group">
                                <label for="">Old Password</label>
                                <input type="password" name="old_password" class="form-control" required>
                    
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" name="new_password" class="form-control">
                    
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" >                              
                            </div>
                            
                            <div class="form-group">
                                <button type="submit"name="update_btn" class="btn btn-primary">Update Now</button>
                            </div>
                        </form>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>
</div>
<?php include("components/footer.php") ?>
