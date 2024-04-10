<?php
// auto_loader
require_once "components/autoload.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    $bdd = ConnexionBD::getInstance();
    $search = '%'.$search.'%'; // Assuming $search is already defined

    // Prepare the SQL statement
    $req = "SELECT * FROM confirmed_recipes where confirm = true and name LIKE :search";
    $rep = $bdd->prepare($req);

// Execute the query with an array of parameters
    $rep->execute(array(':search' => $search));
    $games = $rep->fetchAll(PDO::FETCH_ASSOC);
    $jsonData = json_encode($games);
    echo $jsonData;
}
?>