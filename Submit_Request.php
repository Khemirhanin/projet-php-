<?php 
session_start();

if(!isset($_COOKIE['user_id']))
{
  header("Location:login.php");
}?>

<?php

 include 'components/header.php';
?>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/form1.0.css">



    
    <div class="containerbox12">
    <div class="container12" id ="main">
        <h1 class="form_title">Share Recipe</h1>
        <?php
          if(isset($_GET["success"])){
            echo "<h4>recipe sent Successfully.<br> check your profile for confirmation .</h4>";
            
          }
          
          if(isset($_GET["missing"])){
            echo "<h4 >Please fill all the fields </h4>";
          }
          ?>
        <form method="post" action="form.php"  name="submit_request" enctype="multipart/form-data">
          <!--recipe name-->
            <div class="row mb-3 ">
                <label for="recipe_name" class="col-sm-3 col-form-label">Recipe Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-100" id="recipe_name" name="recipe" required >
                </div>
            </div>
            
            <!--Dish Type-->
            <div class="row mb-3">
              <label for="dish_type" class="col-sm-3 col-form-label">Dish Type</label>
              <div class="col-sm-9">
                <select class="form-select form-select-sm" id ="dish_type" name ="dish_type"  aria-label="default">
                  <option value="" selected>Open this select menu</option>
                  <option value="Main Dish">Main Dish</option>
                  <option value="Side Dish">Side Dish</option>
                  <option value="Appetizer">Appetizer</option>
                  <option value="Soup">Soup</option>
                  <option value="Salad">Salad</option>
                  <option value="Dessert">Dessert</option>
                  <option value="Drink">Drink</option>
                </select>
              </div>
            </div>
            <!--No. of Servings-->
            <div class="row mb-3">
              <label for="nb_serv" class="col-sm-3 col-form-label">No. of Servings</label>
              <div class="col-sm-9">
                <input type="text" class="form-control w-100" id="nb_serv" name ="nb_serv" placeholder="ex: 4" required>
              </div>
            </div>
            <!--Cooking Time-->
            <div class="row mb-3">
              <label for="cookingTime" class="col-sm-3 col-form-label">Cooking Time</label>
              <div class="col-sm-9" required>
                <input type="text" class="form-control w-100" id="cookingTime" name="cookingTime" placeholder="ex:45 mins" required>
              </div>
            </div>
            <!--Difficulty-->
            <div class="row mb-3">
              <label for="Difficulty" class="col-sm-3 col-form-label">Difficulty</label>
              <div class="col-sm-9" id ="Difficulty">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="easy" checked required>
                  <label class="form-check-label" for="inlineRadio1">easy</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="moderate" required>
                  <label class="form-check-label" for="inlineRadio2">moderate</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="hard" required>
                  <label class="form-check-label" for="inlineRadio3">hard</label>
                </div>              
              </div>
            </div>
            <!--image-->
            <div class="input-group mb-3">
              <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
              <label class="input-group-text" for="inputGroupFile02">Upload dish Image</label>
            </div>
            <!--Ingredient-->
            <div class="mb-3">
              <label for="ingredients" class="form-label">Ingredients</label>
              <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
            </div>
            <!--Description-->
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name ="description" rows="3" required></textarea>
            </div>
            <!--Submit btn-->
            <div class="subbtn">
              <button id ="sub" name="subbtn"  class=" button button-contactForm btn_4 boxed-btn" type="submit" >Submit form</button>
            </div>

        </form>
              
    </div>
    </div>
    <?php include 'components/footer.php'?>

    
    