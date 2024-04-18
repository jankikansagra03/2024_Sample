<?php
include_once('admin_header.php');
$slider_id = $_REQUEST['s_id'];
$q = "update slider_images set `status`='Deleted' where img_id=$slider_id";
if (mysqli_query($con, $q)) {
    setcookie('success', 'Slider Image Deleted Successfully', time() + 2, "/");
} else {
    setcookie('error', 'Error in Deleting Slider Image', time() + 2, "/");
}
?>
<script>
    window.location.href = "manage_slider.php";
</script>

