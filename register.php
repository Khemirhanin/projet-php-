<?php 
session_start();

include("components/header.php") ;

?>

<link rel="stylesheet" href="css/register.css">
<div class="py-5">
    <div class="container">
        <div class="row" id="form">
            <div class="col-md-12" >
                <div class="card shadow">
                    <div class="card-header">
                        <h2>Register Now</h2>
                        <?php 
                    if(isset($_SESSION['status']))
                    //if the session status is set then we can display the alert message in case he user has been redirected to the register page
                    {?>
                   
                    <div class="alert">
                    <?php 
                        echo "<div class='alert alert-" . $_SESSION['alert_type'] . "' role='alert'>
                            " . $_SESSION['status'] . "
                        </div>";
                        unset($_SESSION['status']);}
                    ?>
                    </div>
                    <div class="card-body">
                        <form action="registerProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <div class="form-check" >
                                    <input type="radio" name="gender" value="male" class="form-check-input" id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="gender" value="female" class="form-check-input" id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Email Adress</label>
                                <input type="text" name="email" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                    
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>                              
                            </div>
                            
                            <div class="form-group">
                                <button type="submit"name="register_btn" class="btn btn-primary">Register Now</button>
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
