<?php 
    require_once('components/header.php');
    $repository = new RecipeRepository();

    // Check if both recipe ID and request parameters are set
    if(isset($_GET['recipe']) && isset($_POST["request"])){
         $recipeId = (int)$_GET['recipe'];
    }else{
        $recipeId = '';
        header('location:recipeRequests.php');
    }
    // If either recipe ID or request parameter is missing, redirect to recipeRequests.php
    $reply = $_POST["request"];
    if($reply == "accept"){
        $repository->acceptRecipe($recipeId);
    }
    else if($reply == "delete"){
        $repository->deleteRecipe($recipeId);
    }
    else{
         // If the request is neither accept nor delete, display an error message
        echo"invalid action";
    }
    // Redirect the admin back to recipeRequests.php
    header("Location:recipeRequests.php");
?>