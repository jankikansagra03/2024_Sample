<?php
include_once("admin_header.php");
$s_id = $_REQUEST['s_id'];
$q = "update slider_images set status='Active' where img_id=$s_id";
if (mysqli_query($con, $q)) {
    setcookie("success", "Record Activation Successfull", time() + 2, "/");
} else {
    setcookie("error", "Record Activation Failed", time() + 2, "/");
}
?>
<script>
    window.location.href = "manage_slider.php";
</script>