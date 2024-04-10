<?php session_start();

// Establish the database connection
$conn = mysqli_connect("localhost", "root", "", "foodhub");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_recipes'])){
    $name=$_POST['recipe'];
    $dish_type=$_POST['dish_type'];
    $nb_serv=$_POST['nb_serv'];
    $cookingtime=$_POST['cookingTime'];
    $difficulty=$_POST['inlineRadioOptions'];
    $image=$_POST['image'];
    $ingredients=$_POST['ingredients'];
    $description=$_POST['description'];

    $sql = "INSERT INTO `recipes` (Name, Type, NbServings, Time, Difficulty, image, Ingredients, Description, Confirm) 
    VALUES (\"$name\", \"$dish_type\", \"$nb_serv\", \"$cookingtime\", \"$difficulty\", \"$image\", \"$ingredients\", \"$description\", 1)";
$result=mysqli_query($conn,$sql);
    
    if($result){
        $_SESSION['message'] = 'Recipe added successfully';
        header('location:crud.php');
    } else {
       die("Query failed".mysqli_error($conn));
    }
}
?>