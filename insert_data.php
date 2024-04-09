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

    // Check if the upload was successful
    if ($image['error'] == 0) {
        // Define the upload directory
        $uploadDir = 'img/recepie/';

        // Define the path to the image
        $imagePath = $uploadDir . basename($image['name']);

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // The file was moved successfully, now store the path in the database
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
            // The file could not be moved
            die("Failed to upload image");
        }
    } else {
        // The upload was not successful
        die("Failed to upload image");
    }
}
?>