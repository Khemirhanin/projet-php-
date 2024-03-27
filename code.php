<?php
session_start();
require_once 'dbcon.php';
require_once 'autoload.php';
$con = ConnexionBD::getInstance();
var_dump($con);

if(isset($_POST['register_btn'])){
    if(!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $_SESSION['status'] = "Email is required";
        header('Location: register.php');
        exit();
    }
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $con->prepare("SELECT email FROM users WHERE email=? LIMIT 1");
    $stmt->bindParam(1, $email);
    $stmt->execute();

    if($stmt->rowCount() > 0)
    {
        $_SESSION['status'] = "Email Already Exists";
        header('Location: register.php');
    }
    else{
        $stmt = $con->prepare("INSERT INTO users (Email,UserName,Password,Gender,Confirm) VALUES (?, ?, ?, ?, 0)");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $hashedPassword);
        $stmt->bindParam(4, $gender);
        $query_run = $stmt->execute();

        if($query_run){
            $_SESSION['status'] = "Registration Successful, Please Verify Your Email Address";
            header('Location:register.php');
        }
        else{
            $_SESSION['status'] = "Registration Failed";
            header('Location:register.php');
        }
    }
}
?>