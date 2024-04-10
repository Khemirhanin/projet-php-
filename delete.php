
<?php 
session_start();
$conn=mysqli_connect("localhost","root","","foodhub");
if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
else
{
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query="delete from recipes where id=".$_GET['id'];

    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query failed".mysqli_error());
    }
    else {
        $_SESSION['update_msg'] = "recipe deleted ";
        
        header("Location: crud.php");
    
     }
 }}
?>
    