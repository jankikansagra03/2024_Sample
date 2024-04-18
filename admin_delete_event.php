<?php
include_once('admin_header.php');
$event_id = $_REQUEST['s_id'];
$q = "update event_details set `status`='Deleted' where event_id=$event_id";
if (mysqli_query($con, $q)) {
    setcookie('success', 'Event Deleted Successfully', time() + 2, "/");
} else {
    setcookie('error', 'Error in Deleting Event', time() + 2, "/");
}
?>
<script>
    window.location.href = "manage_events.php";
</script>