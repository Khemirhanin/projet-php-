<?php 
    require_once('components/header.php');
    $repository = new RecipeRepository();
    if(isset($_GET['recipe']) && isset($_POST["request"])){
         $recipeId = (int)$_GET['recipe'];
    }else{
        $recipeId = '';
        header('location:recipeRequests.php');
    }
    $reply = $_POST["request"];
    if($reply == "accept"){
        $repository->acceptRecipe($recipeId);
    }
    else if($reply == "delete"){
        $repository->deleteRecipe($recipeId);
    }
    else{
        echo"invalid action";
    }
    header("Location:recipeRequests.php");
?>