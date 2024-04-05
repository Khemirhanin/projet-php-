<?php
    require_once('components/autoload.php');
    //if the user isn't logged in go to login page
    if(!isset($_COOKIE['user_id'])) {
        header("Location: login.php");
        exit;
    }  
    // Check if recipe ID is set in the URL
    if(isset($_GET['recipe'])){
        $recipeId = (int)$_GET['recipe'];
    }else{
        // If recipe ID is not set, redirect to recipes.php
        $recipeId = '';
        header('location:recipes.php');
    }
    
    $repository = new ReviewRepository();
    // Get the user ID from the cookie
    $user = (int)$_COOKIE['user_id'];
    // Retrieve data from POST parameters
    $title = $_POST["title"];
    $rate = $_POST["rate"];
    $message = $_POST["message"];

    // Find existing review for the user and recipe
    $review = $repository->findReview($user, $recipeId);
    // If review doesn't exist, insert a new review, otherwise update the existing review
    if(!$review){
        $repository->insertReview($title,$message,$rate,$user,$recipeId);
    }
    else{
        $repository->updateReview($title,$message,$rate, $review->Id);
    }
    // Redirect the user back to the reviewed recipe's page
    header("Location:recipes_details.php?recipe="."{$recipeId}");
    