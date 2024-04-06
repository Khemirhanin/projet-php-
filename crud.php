<?php session_start(); ?>

<?php include 'components/adminHeader.php'; ?>
<link rel="stylesheet" href="css/crud.css">
<main>
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="box">
    <h2> All Recipes</h2>
<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Recipe</button>
     <br><br> 
    </div>
   
            
            
   
   <table  class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>Type</th>
                <th>Time </th>
                <th>NbServings </th>
                <th>Difficulty </th>
                <th>Ingredients </th>
                <th>Description </th>
                <th>Image url </th>
                <th>averageRating </th>
                <th> Id_User </th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $conn=mysqli_connect("localhost:4306","root","","foodhub");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            else {
            $sql = "SELECT * FROM recipes";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Type']; ?></td>
                        <td><?php echo $row['Time']; ?></td>
                        <td><?php echo $row['NbServings']; ?></td>
                        <td><?php echo $row['Difficulty']; ?></td>
                        <td><?php echo $row['Ingredients']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td><?php echo $row['Image']; ?></td>
                        <td><?php echo $row['AverageRating']; ?></td>
                        <td><?php echo $row['IdUser']; ?></td>
                        <td>
                         <div class="actions">
                            <a href="update.php? id=<?php echo $row['Id']; ?>" class="btn btn-success">Update</a>
                            <a href="delete.php? id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
                        </div>

                        </td>
                    </tr>
            <?php
                }
            }}
            ?>
        </tbody>
    </table>
    
    
    <?php
       if (isset($_SESSION['message'])) {
        echo "<h6>" . $_SESSION['message'] . "</h6>";
        unset($_SESSION['message']);  // Clear the message
    }
    ?>
    <?php
       if (isset($_SESSION['update_msg'])) {
        echo '<div class="alert alert-success" role="alert">';
        echo $_SESSION['update_msg'];
        echo '</div>';
        
        unset($_SESSION['update_msg']);
    }
    
    if (isset($_SESSION['delete_message'])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION['delete_message'];
        echo '</div>';
     
        unset($_SESSION['delete_message']);
    }
    ?>



    <!-- Modal -->
    <form action="insert_data.php" method="post" >
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Recipe</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <div class="container12" id ="main">
                
                        <!--recipe name-->
                            <div class="row mb-3 ">
                                <label for="recipe_name" class="col-sm-3 col-form-label">Recipe Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control w-100" id="recipe_name" name="recipe">
                                </div>
                            </div>
                            <!--Dish Type-->
                            <div class="row mb-3">
                            <label for="dish_type" class="col-sm-3 col-form-label">Dish Type</label>
                            <div class="col-sm-9">
                                <select class="form-select form-select-sm" id ="dish_type" name ="dish_type"  aria-label="default" required>
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
                            <div class="col-sm-9">
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
                            <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
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
                        
    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_recipes" value="ADD">
                </div>
            </div>
        </div>
    </div>
    </form>
            
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

    </div>

</main>



    











    <footer class="footer">
            <div class="copy-right_text">
                <div class="container">
                    
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-md-8">
                            <p class="copy_right">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-behance"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!--/ footer  -->
     <!-- JS here -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>