<?php
// Check if the user wants to log out
if(isset($_POST['confirm_logout'])) {
    require_once('components/autoload.php');
    $bdd = ConnexionBD::getInstance();
    if(isset($_COOKIE['user_id'])) {
        $requete = "UPDATE users SET Status = 0 WHERE Id = :id";
        $req = $bdd->prepare($requete);
        $req->execute(array(
            'id' => $_COOKIE['user_id']
        ));
        setcookie('user_id', '', time() - 3600, '/');
    } elseif(isset($_COOKIE['admin_id'])) {
        setcookie('admin_id', '', time() - 3600, '/');
    }
    // Redirect to the appropriate page after logout
    header("Location: index.php");
    exit(); // Stop further execution of the script
}
?>

<?php
// Display the logout confirmation dialog and form
if(isset($_COOKIE['user_id'])) {
    echo '
        <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                // Submit the form when the user confirms logout
                document.getElementById("logoutForm").submit();
            } else {
                // Redirect to index.php if the user cancels logout
                window.location.href = "index.php";
            }
        }
        // Automatically trigger logout confirmation when the page loads
        window.onload = confirmLogout;
        </script>
        <form id="logoutForm" method="post" style="display:none;">
            <input type="hidden" name="confirm_logout" value="true">
        </form>
    ';
} elseif(isset($_COOKIE['admin_id'])) {
    echo '
        <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                // Submit the form when the user confirms logout
                document.getElementById("logoutForm").submit();
            } else {
                // Redirect to statistics.php if the user cancels logout
                window.location.href = "statistics.php";
            }
        }
        // Automatically trigger logout confirmation when the page loads
        window.onload = confirmLogout;
        </script>
        <form id="logoutForm" method="post" style="display:none;">
            <input type="hidden" name="confirm_logout" value="true">
        </form>
    ';
}
?>
