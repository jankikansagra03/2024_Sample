<?php
include_once("admin_header.php");
$e_id = $_REQUEST['e_id'];
$q = "update registration set status='Inactive' where email='$e_id'";
if (mysqli_query($con, $q)) {
    setcookie("success", "User Deactivated Successfully", time() + 2, "/");
} else {
    setcookie("error", "User Deactivation Failed", time() + 2, "/");
}
?>
<script>
    window.location.href = "manage_users.php";
</script>