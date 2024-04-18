<?php
session_start();
unset($_SESSION['user_uname']);
?>
<script>
    window.location.href = "login.php";
</script>