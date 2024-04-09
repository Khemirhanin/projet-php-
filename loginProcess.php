<?php
require_once('components/autoload.php');
$repository = new userRepository();
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    //always sanitize the data before using it in the query to prevent SQL injection
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $query = $repository->findByEmail($email);
    //if the email exists then we can proceed to check the password 
    if(!empty($query)){
        //real password is the password stored in the database
        $realPassword=$query->Password;
        //verify the password using the password_verify function
        $verify_pass=password_verify($password,$realPassword);
        if($verify_pass==1)
        {   $bdd = ConnexionBD::getInstance();
            //if the user is connected then his status will be set to 1 which means he is currently connected
            $requete = "UPDATE users SET Status = 1 WHERE Email = :email";
            $req = $bdd->prepare($requete);
            $req->execute(array(
            'email' => $email
            ));
            //check is the user is the admin if it's the case he will be redirected to the admin environment
            if($email=="benameureya953@gmail.com")
            {
                //the admin will have a cookie with the name admin_id in which the admin's id is stored
                setcookie('admin_id',$query->Id,time()+60*60*24*30,'/');
                header('location:statistics.php');
                
                exit;
            }
            else{
           //the user will have a cookie with the name user_id in which the user's id is stored
            $_SESSION['alert_type']="success"; // Add
            setcookie('user_id',$query->Id,time()+60*60*24*30,'/');
            header('location:index.php');
            exit;}
        }
        else{
            //in case the password is wrong we will display an alert message
            $_SESSION['status'] = "Wrong password";
            $_SESSION['alert_type']="danger";
            header('location:login.php');
            exit;

        }
    }else{
        //in case the email does not exist we will display an alert message
        $_SESSION['status'] = "Email Does not  Exist";
        $_SESSION['alert_type']="danger";
        header('location:login.php');
        exit;

    }
   
 }
 ?>