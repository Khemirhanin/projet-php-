<?php 
$page_title="Registration Form";
include("includes/header.php") ;
include("includes/navbar.php");
?>
<div class="py-5">
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-6" >
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration form</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <input type="text" name="gender" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Email Adress</label>
                                <input type="text" name="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                    
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">                              
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


<?php include("includes/footer.php") ?>