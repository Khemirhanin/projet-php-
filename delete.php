<?php 
session_start();
require_once "components/autoload.php";
$conn = ConnexionBD::getInstance();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM recipes WHERE id = :id";
    $stmt = $conn->prepare($query);
    $result = $stmt->execute([':id' => $id]);

    if(!$result) {
        die("Query failed");
    } else {
        $_SESSION['update_msg'] = "recipe deleted";
        header("Location: crud.php");
    }
}
?>