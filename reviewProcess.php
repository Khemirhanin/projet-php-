<?php
    require_once('components/autoload.php');
    
    //if the user isn't logged in go to login page
    if(!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }  
    if(isset($_GET['recipe'])){
        $recipeId = (int)$_GET['recipe'];
    }else{
        $recipeId = '';
        header('location:recipes.php');
    }
    $repository = new ReviewRepository();
    $user = (int)$_SESSION['user_id'];
    $title = $_POST["title"];
    $rate = $_POST["rate"];
    $message = $_POST["message"];
    $review = $repository->findReview($user, $recipeId);
    if(!$review){
        $repository->insertReview($title,$message,$rate,$user,$recipeId);
    }
    else{
        $repository->updateReview($title,$message,$rate, $review->Id);
    }
    header("Location:recipes_details.php?recipe="."{$recipeId}");
    