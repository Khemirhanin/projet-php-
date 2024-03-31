<?php
$con=mysqli_connect("localhost","root","","foodHub");
$totalUsers = mysqli_query($con," SELECT * from users");
$totalRequests = mysqli_query($con," SELECT * from recipes where IdUser <> 0 ");                
$totalRecipes = mysqli_query($con," SELECT * from recipes ");                
$connectedUsers = mysqli_query($con," SELECT * from users where Status = 1");                
?>


<!-- the header -->
<?php include_once "components/adminHeader.php"; ?>
    <!-- slider_area_start -->

  <div class="contain">
    
    <div class="statistics">
    <div class="defaultStyle connectedUsers ">
          <h2>Connected Users</h2>
          <br>
          <h4><?=mysqli_num_rows($connectedUsers)?></h4>
        </div>
        <div class="defaultStyle totalUsers">
          <h2>Total Users</h2>
          <br>
          <h4><?=mysqli_num_rows($totalUsers)?></h4>
          
        </div>
        <div class="defaultStyle categories">
          <h2>Categories</h2>
          <br>
          <h4>3</h4>
          
        </div>
        <div class="defaultStyle totalRecipes">
          <h2>Recipes</h2>
          <br>
          <h4><?=mysqli_num_rows($totalRecipes)?></h4>
          

        </div>
        <div class="defaultStyle totalRecipes">
          <h2>Downloads</h2>
          <br>
          <h4>10</h4>
          

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
  </div>
     










<!-- footer  -->
<?php
include_once "components/footer.php";
?>
