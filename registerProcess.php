<?php 

require_once('components/autoload.php');
$repository = new userRepository();
session_start();
if(isset($_POST['register_btn'])){
    
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $gender = $_POST['gender'];
    if ($gender === 'female') {
        $gender = 1;
    } else {
        $gender = 0;
    }

    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedPassword = filter_var($hashedPassword, FILTER_SANITIZE_STRING);
    $c_pass = password_verify($_POST['confirm_password'], $hashedPassword);
    $stmt = $repository->findByEmail($email);
    if($c_pass == 1){
        if(!empty($stmt))
        {
            $_SESSION['status'] = "Email Already Exists";
            $_SESSION['alert_type']="danger";

            header('Location: register.php');
        }
        else{

            $bool=$repository->insert(['Email'=>$email,'UserName'=>$name,'Password'=>$hashedPassword,'Gender'=>$gender,'Status'=>0 ,'nbPost'=>0]);	

            if($bool){
                $_SESSION['status'] = "Registration Successful, Please Login Now";
                $_SESSION['alert_type']="success";

                header('Location:register.php');
            }
            else{
                $_SESSION['status'] = "Registration Failed";
                $_SESSION['alert_type']="danger";
                header('Location:register.php');
            }
        }
}
else{
    $_SESSION['status'] = "password don't match!"  ;
    $_SESSION['alert_type']="danger";

    header('Location: register.php');

}
}
?>