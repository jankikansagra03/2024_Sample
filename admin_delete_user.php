<?php
include_once('admin_header.php');
$email = $_REQUEST['e_id'];
$q = "update registration set `status`='Deleted' where email='$email'";
if (mysqli_query($con, $q)) {
    setcookie('success', 'User Deleted Successfully', time() + 2, "/");
} else {
    setcookie('error', 'Error in Deleting User', time() + 2, "/");
}
?>
<script>
    window.location.href = "manage_users.php";
</script>