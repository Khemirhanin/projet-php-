<?php
//auto_loader
require_once "components/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = $_POST['search'];
    //echo "<p>$search</p>";
    $bdd = ConnexionBD::getInstance();
    $search = '%' . $search . '%';
    // Prepare the SQL statement
    $req = "SELECT Name FROM recipes where confirm = true and  Name LIKE :search ORDER BY AverageRating DESC LIMIT 5";
    $rep = $bdd->prepare($req);
    // Bind the parameter and execute the query
    $rep->execute(array(':search' => $search));
    $games = $rep->fetchAll(PDO::FETCH_NUM);
    $jsonData = json_encode($games);
    echo $jsonData;
}


?>