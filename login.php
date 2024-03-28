<?php 
session_start();
include("components/header.php") ;

?>
<link rel="stylesheet" href="css/login.css">

<div style="margin:100px;"class="py-5">
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-6 mx-auto custom-width" >
                <div class="card shadow border-dark"> <!-- Added border-dark class -->
                    <div class="card-header" style="border: 1px solid black;"> <!-- Removed border style -->
                        <h3>Login Now</h3>
                        <?php 
                    if(isset($_SESSION['status']))
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
                    <form action="loginProcess.php" method="POST">
                            <div class="form-group">
                                <label for="">Email Adress</label> <!-- Removed border style -->
                                <input type="text" name="email" class="form-control" style="border: 1px solid black;" required> <!-- Added border style -->
                                
                            </div>
                            <div class="form-group">
                                <label for="">Password</label> <!-- Removed border style -->
                                <input type="password" name="password" class="form-control" style="border: 1px solid black;" required> <!-- Added border style -->
                    
                            </div>                 
                            <div class="form-group">
                                <button name ="submit" type="submit" class="btn btn-primary">Login Now</button>
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