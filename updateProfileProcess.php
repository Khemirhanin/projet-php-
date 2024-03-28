<?php 
require_once('components/autoload.php');
$repository = new userRepository();
session_start();

if(isset($_POST['update_btn'])) {
    $user = $repository->findById($_COOKIE['user_id']);

    if(isset($_POST['old_password']) && !empty($_POST['old_password'])) {
        $old_pass = $_POST['old_password']; // Plain-text old password entered by the user
        $real_old_password = $user->Password; // Hashed old password retrieved from the database

        if(password_verify($old_pass, $real_old_password)) {
            // Old password is correct 
            $updatedData = ['Id' => $_COOKIE['user_id']];

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = $_POST['name'];
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                $updatedData['UserName'] = $name;
            }

            if(isset($_POST['Email']) && !empty($_POST['Email'])) {
                $email = $_POST['Email'];
                $email = filter_var($email, FILTER_SANITIZE_STRING);
                
                // Check if email already exists
                $existingUser = $repository->findByEmail($email);
                if(!empty($existingUser) && $existingUser->Id !== $_COOKIE['user_id']) {
                    $_SESSION['status'] = "Email Already Exists";
                    $_SESSION['alert_type'] = "danger";
                    header('Location: updateProfile.php');
                    exit;
                } else {
                    $updatedData['Email'] = $email;
                }
            }

            if(isset($_POST['new_password']) && !empty($_POST['new_password'])) {
                $password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
                if($password === $confirm_password) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $updatedData['Password'] = $hashedPassword;
                } else {
                    $_SESSION['status'] = "Passwords don't match!";
                    $_SESSION['alert_type'] = "danger";
                    header('Location: updateProfile.php');
                    exit;
                }
            }

            if(isset($_POST['gender']) && ($_POST['gender'] === 'male' || $_POST['gender'] === 'female')) {
                $gender = $_POST['gender'] === 'female' ? 1 : 0;
                $updatedData['Gender'] = $gender;
            }

            if(!empty($updatedData)) {
                $repository->updateUser($updatedData);
                $_SESSION['status'] = "Profile Updated Successfully";  
                $_SESSION['alert_type'] = "success";
                header('Location: updateProfile.php');
                exit;
            } else {
                $_SESSION['status'] = "No updates were made.";
                $_SESSION['alert_type'] = "danger";
                header('Location: updateProfile.php');
                exit;
            }
        }
        else {
            // Old password is incorrect
            $_SESSION['status'] = "Old Password is incorrect";
            $_SESSION['alert_type'] = "danger";
            header('Location: updateProfile.php');
            exit;
        }
    } else {
        // Old password field is empty
        $_SESSION['status'] = "Please enter your old password.";
        $_SESSION['alert_type'] = "danger";
        header('Location: updateProfile.php');
        exit;
    }
} else {
    // No update button clicked
    $_SESSION['status'] = "No updates were made.";
    $_SESSION['alert_type'] = "danger";
    header('Location: updateProfile.php');
    exit;
}
?>
