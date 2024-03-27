<?php 
$page_title="Login Form";
include("includes/header.php") ;
include("includes/navbar.php");
?>
<div class="py-5">
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-6" >
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="">Email Adress</label>
                                <input type="text" name="Email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                    
                            </div>                 
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Login Now</button>
                            </div>
                        </form>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>