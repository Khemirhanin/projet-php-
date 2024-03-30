<?php
//auto_loader

require_once "components/autoload.php";

$echos =array();
function verifInput(){
    global $echos;
    $b = true;
    foreach ($_POST as $key => $value) {
        if(empty($value)){
            return false;
        }                   
    }
    return true;
}

//form data recuperation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $image = new Image('image');
    $verifImage = $image->verifImage(10000000,'jpg','png','jpeg');
    

    if(verifInput() && $verifImage){
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
            $requete = "INSERT INTO recipes (name, type, time, NbServings, Difficulty, Ingredients, Description, rate, NbRate, Image, Confirm) 
                    VALUES (:name, :type, :time, :NbServings, :Difficulty, :Ingredients, :Description, :rate, :NbRate, :Image, :Confirm)";
            $req = $bdd->prepare($requete);
            $req->execute(array(
            'name' => $recipe_name,
            'type' => $dish_type,
            'time' => $cooking_time,
            'NbServings' => $servings,
            'Difficulty' => $difficulty,
            'Ingredients' => $ingredients,
            'Description' => $description,
            'rate' => 0,
            'NbRate' => 0,
            'Image' => $image_name,
            'Confirm' => 'false', 
            ));
            // Redirect to another page after processing the form
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
            
            
            
          
            
    }  


    
    
    }
    
    

    




    // Déplacer l'image téléchargée vers un emplacement souhaité
  //  move_uploaded_file($image_tmp_name, 'C:/xampp/htdocs/projet/images/posts/' . $image_name);
}
?>
