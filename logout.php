<?php
//will delete the cookie and redirect to the index page
if(isset($_COOKIE['user_id'])){
    echo '<script>
    if (confirm("Are you sure you want to log out?")) {
        document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "index.php";
    } else {
        window.location.href = "index.php";
    }
</script>';
}
elseif (isset($_COOKIE['admin_id'])){
    echo '<script>
    if (confirm("Are you sure you want to log out?")) {
        document.cookie = "admin_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "login.php";
    } else {
        window.location.href = "statistics.php";
    }
</script>';
}

?>
