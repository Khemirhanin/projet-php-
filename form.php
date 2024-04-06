<?php
//auto_loader
require_once "components/autoload.php";


//form data recuperation
if (isset($_POST["subbtn"]) ) {

    $image = new Image('image');
    $verifImage = $image->verifImage(10000000,'jpg','png','jpeg');
    if($verifImage){
       
        
        $recipe_name = $_POST['recipe'];
        $dish_type = $_POST['dish_type'];
        $servings = $_POST['nb_serv'];
        $cooking_time = $_POST['cookingTime'];
        $difficulty = $_POST['inlineRadioOptions'];
        $ingredients = $_POST['ingredients'];
        $description = $_POST['description'];

        $image_name = $image->uploadImage('img/recepie/');
       if($image_name){
            $bdd = ConnexionBD::getInstance();
            $requete = "INSERT INTO recipes (Name, Type, Time, NbServings, Difficulty, Ingredients, Description, Image, Confirm,IdUser,AverageRating) 
                                VALUES (:name, :type, :time, :NbServings, :Difficulty, :Ingredients, :Description,:Image, :Confirm ,:IdUser,:AverageRating);";
            $req = $bdd->prepare($requete);
            $req->execute(array(
            'name' => $recipe_name,
            'type' => $dish_type,
            'time' => $cooking_time,
            'NbServings' => $servings,
            'Difficulty' => $difficulty,
            'Ingredients' => $ingredients,
            'Description' => $description,
            'Image' => $image_name,
            'Confirm' => 'false', 
            'IdUser' => $_COOKIE['user_id'],
            'AverageRating' => 0
            ));
            
            //Redirect to another page after processing the form
            header("Location:Submit_Request.php?success");
            exit();
            
            
            
        }
            
        }  
        header("Location:Submit_Request.php?missing");

    
    
    
    
    

    




    // Déplacer l'image téléchargée vers un emplacement souhaité
  //  move_uploaded_file($image_tmp_name, 'C:/xampp/htdocs/projet/images/posts/' . $image_name);
}
?>