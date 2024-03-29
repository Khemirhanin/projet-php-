<?php
require_once('components/autoload.php');
$repository = new userRepository();
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $query = $repository->findByEmail($email);

    if(!empty($query)){
        $realPassword=$query->Password;
        $verify_pass=password_verify($password,$realPassword);
        if($verify_pass==1)
        {
            setcookie('user_id',$query->Id,time()+60*60*24*30,'/');
            $_SESSION['alert_type']="success"; // Add 
            header('location:index.php');
            exit;
        }
        else{
            $_SESSION['status'] = "Wrong password";
            $_SESSION['alert_type']="danger";
            header('location:login.php');
            exit;

        }
    }else{
        $_SESSION['status'] = "Email Does not  Exist";
        $_SESSION['alert_type']="danger";
        header('location:login.php');
        exit;

    }
   
 }
 ?>