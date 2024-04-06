<?php
require_once('components/autoload.php');
require_once('components/adminHeader.php');
$recipeRepository = new RecipeRepository();
$userRepository=new userRepository();
$con=mysqli_connect("localhost","root","","foodHub");
$totalUsers = $userRepository->findAll();
$totalRequests = mysqli_query($con," SELECT * from recipes where Confirm=0 ");                
$totalRecipes = $recipeRepository->findAll();               
$connectedUsers = $userRepository->findConnectedUsers();    
?>


<!-- the header -->
    <!-- slider_area_start -->

    <h1>Statistics </h1>
    
    <div class="statistics">
    <div class="defaultStyle connectedUsers ">
          <h2>Connected Users</h2>
          <br>
          <h4><?=count($connectedUsers)?></h4>
        </div>
        <div class="defaultStyle totalUsers">
          <h2>Total Users</h2>
          <br>
          <h4><?=count($totalUsers)?></h4>
          
        </div>
        <div class="defaultStyle categories">
          <h2>Categories</h2>
          <br>
          <h4>7</h4>
          
        </div>
        <div class="defaultStyle totalRecipes">
          <h2>Recipes</h2>
          <br>
          <h4><?=count($totalRecipes)?></h4>
          

        </div>
        
        <div class="defaultStyle totalRecipes">
          <h2>Requests</h2>
          <br>
          <h4><?=mysqli_num_rows($totalRequests)?></h4>
          

        </div>
        

    </div>
    <div class="displaying">
      <div class="connectedUsers defaultTable">
        <h3>Connected Users</h3>
        <?php
        include_once "connectedUsers.php";
        ?>
      </div>
      <div class="totalUsers defaultTable">
        <h3>Total Users</h3>
        <?php
        include_once "totalUsers.php";
        ?>
      </div>
      <div class="recipes defaultTable">
        <h3>Recipes</h3>
        <?php
        include_once "recipesDisplay.php";
        ?>
      </div>
      <div class="requests defaultTable">
        <h3>Requests</h3>
        <?php
        include_once "requestsDisplay.php";
        ?>
      </div>
    </div>
 
     










<!-- footer  -->
<?php
include_once "components/footer.php";
?>