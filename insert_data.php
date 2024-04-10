<?php 
session_start();

require_once "components/autoload.php";
$conn = ConnexionBD::getInstance();

if (isset($_POST['add_recipes']) && isset($_FILES['image'])){
    $name = $_POST['recipe'];
    $dish_type = $_POST['dish_type'];
    $nb_serv = $_POST['nb_serv'];
    $cookingtime = $_POST['cookingTime'];
    $difficulty = $_POST['inlineRadioOptions'];
    $ingredients = $_POST['ingredients'];
    $description = $_POST['description'];

    $image = $_FILES['image'];

    
    if ($image['error'] == 0) {
        
        $uploadDir = 'img/recepie/';

   
        $imagePath = $uploadDir . basename($image['name']);

      
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {

            $sql = "INSERT INTO `recipes` (Name, Type, NbServings, Time, Difficulty, image, Ingredients, Description) VALUES (:name, :dish_type, :nb_serv, :cookingtime, :difficulty, :image, :ingredients, :description)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ':name' => $name,
                ':dish_type' => $dish_type,
                ':nb_serv' => $nb_serv,
                ':cookingtime' => $cookingtime,
                ':difficulty' => $difficulty,
                ':image' => $imagePath,
                ':ingredients' => $ingredients,
                ':description' => $description
            ]);

            if($result){
                $_SESSION['message'] = 'Recipe added successfully';
                header('location:crud.php');
            } else {
                die("Query failed");
            }
        } else {
       
            die("Failed to upload image");
        }
    } else {
     
        die("Failed to upload image");
    }
}
?>