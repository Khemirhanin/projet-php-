<?php
echo '<script>
    if (confirm("Are you sure you want to log out?")) {
        document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "index.php";
    } else {
        window.location.href = "index.php";
    }
</script>';
?>
