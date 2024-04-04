<?php include 'components/adminHeader.php';
session_start(); ?>

<?php
$conn= mysqli_connect("localhost", "root", "", "foodhub");
if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
else
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
   

        $query = "SELECT * FROM recipes WHERE id = $id";

        $result = mysqli_query($conn, $query);
        if(!$result) {
            die("Query failed".mysqli_error());
        }
    else {
            $row = mysqli_fetch_assoc($result);
      } 
    } 
}

?>

<style> 
    .cnt{
        margin-top: 100px;
        margin-left: 50px;
    }
    .urg{
        color: red;
        font-size: 12px;
    
    }
</style>

<?php 
       if(isset($_POST['update_recipes'])) {
           
           if (isset($_GET['id_new'])) {
               $idnew = $_GET['id_new'];
           }

            $recipe= $_POST['recipe'];
            $dish_type= $_POST['dish_type'];
            $nb_serv= $_POST['nb_serv'];
            $cookingTime= $_POST['cookingTime'];
            $Difficulty= $_POST['inlineRadioOptions'];
            $image= $_POST['image'];
            $ingredients= $_POST['ingredients'];
            $description= $_POST['description'];
           
            
            $query = "update `recipes` set Name = '$recipe', Type = '$dish_type', NbServings = '$nb_serv', Time = '$cookingTime', Difficulty = '$Difficulty', image = '$image', Ingredients = '$ingredients',
            Description = '$description' WHERE id = '$idnew' ";
        
            $result = mysqli_query($conn, $query);
            
            if(!$result){
                die("Query failed".mysqli_error());
            }
            else{
                $_SESSION['update_msg'] = "you have successfully updated the recipe";
              
                header("Location: crud.php");
            }
            }
          
?>

<form class=cnt action="update.php?id_new=<?php echo $id; ?>" method="post">
     <!-- Form -->
     <div class="container12" id ="main">
                <!--recipe name-->
                    <div class="row mb-3 ">
                        <label for="recipe_name" class="col-sm-3 col-form-label">Recipe Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control w-100" id="recipe_name" name="recipe" value="<?php echo $row['Name'] ?>">
                        </div>
                    </div>
                <!--Dish Type-->
        <div class="row mb-3">
            <label for="dish_type" class="col-sm-3 col-form-label">Dish Type</label>
            <div class="col-sm-9">
                <select class="form-select form-select-sm" id ="dish_type" name ="dish_type"  aria-label="default" required>
                    <?php
                    $options = array("", "Main Dish", "Side Dish", "Appetizer", "Soup", "Salad", "Dessert", "Drink");
                    foreach($options as $option) {
                        echo '<option value="' . $option . '"';
                        if($row['Type'] == $option) {
                            echo ' selected';
                        }
                        echo '>' . $option . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
                    <!--No. of Servings-->
                    <div class="row mb-3">
                    <label for="nb_serv" class="col-sm-3 col-form-label">No. of Servings</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-100" id="nb_serv" name ="nb_serv" placeholder="ex: 4" required value="<?php echo $row['NbServings']?>">
                    </div>
                    </div>
                    <!--Cooking Time-->
                    <div class="row mb-3">
                    <label for="cookingTime" class="col-sm-3 col-form-label">Cooking Time</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-100" id="cookingTime" name="cookingTime" placeholder="ex:45 mins" required value="<?php echo $row['Time']?>">
                    </div>
                    </div>
                    <!--Difficulty-->
                    <div class="row mb-3">
                    <label for="Difficulty" class="col-sm-3 col-form-label">Difficulty</label>
                    <div class="col-sm-9" id ="Difficulty">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="easy" checked required value="<?php echo $row['Difficulty']?>">
                        <label class="form-check-label" for="inlineRadio1">easy</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="moderate">
                        <label class="form-check-label" for="inlineRadio2">moderate</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="hard">
                        <label class="form-check-label" for="inlineRadio3">hard</label>
                        </div>              
                    </div>
                    </div>
                    <!--image-->
                    <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="image" required value="<?php echo $row['image']?>">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <p class=urg >Please note: You need to reselect the image when updating the recipe.</p>

                    
                    <!--Ingredient-->
                    <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required > <?php echo $row['Ingredients']?></textarea>
                    </div>
                    <!--Description-->
                    <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name ="description" rows="3" required ><?php echo $row['Description']?></textarea>
                    </div>           
            </div>
            <input type="submit" class="btn btn-success" name="update_recipes" value="UPDATE">

</form>







<? include 'components/footer.php'; ?>