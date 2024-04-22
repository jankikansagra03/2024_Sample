<?php
include_once("admin_header.php");
if (isset($_POST['btn'])) {
    $product_name = $_POST['pname'];
    $product_description = $_POST['pdesc'];
    $product_price = $_POST['pprice'];
    $product_quantity = $_POST['pquantity'];
    $product_category = $_POST['pcategory'];
    $main_image_name = uniqid() . $_FILES['p_main']['name'];
    $extra_images = [];
    if (!empty($_FILES['p_extra']['name'][0])) {
        foreach ($_FILES['p_extra']['name'] as $key => $extra_image_name) {
            $extra_image_tmp = $_FILES['p_extra']['tmp_name'][$key];
            $extra_image_unique_name = uniqid() . $extra_image_name;
            $extra_images[] = $extra_image_unique_name;
        }
    }
    $extra_images_string = implode(",", $extra_images);
    $update = "UPDATE `event_details` SET `event_title`='$event_title',`event_description`='$event_description',`event_date`='$event_date',`event_type`='$event_type',`event_place`='$event_place',`status`='$status' ";
    if ($_FILES['e_main']['name'] != "") {
        $event_main = uniqid() . $_FILES['e_main']['name'];
        $update = $update . ",`main_image`='$event_main'";
    }
    $count = count($_FILES['e_extra']['name']);
    if ($count > 0) {
        $event_extra = "";
        $tmp_name = "extra_image";
        // $ans = "";
        $extra = [];
        for ($i = 0; $i < $count; $i++) {
            $t = $tmp_name . $i;
            $t = uniqid() . $_FILES['e_extra']['name'][$i];
            $extra[$i] = $t;
        }
        $ans = implode(",", $extra);
        $update = $update . ",`extra_images`='$ans'";
    }
    $update = $update . " where event_id='$event_id'";
    $q = "select * from event_details where event_id='$event_id'";
    $result = mysqli_query($con, $q);
    while ($row = mysqli_fetch_array($result)) {
        setcookie('main_image', $row[6]);
        setcookie('extra_images', $row[7]);
    }
    if (mysqli_query($con, $update)) {
        if ($_FILES['e_main']['name'] != "") {
            if (!is_dir("images/events")) {
                mkdir("images/events");
            }
            move_uploaded_file($_FILES['e_main']['tmp_name'], "images/events/" . $event_main);
            unlink("images/events/" . $_COOKIE['main_image']);
            setcookie('main_image', "", time() - 1, "/");
        }
        if ($count > 0) {
            if (!is_dir("images/events")) {
                mkdir("images/events");
            }
            for ($i = 0; $i < $count; $i++) {
                move_uploaded_file($_FILES['e_extra']['tmp_name'][$i], "images/events/" . $extra[$i]);
            }

            $extras = explode(",", $_COOKIE['extra_images']);
            foreach ($extras as $e) {
                unlink("images/events/" . $e);
            }
            setcookie('extra_images', "", time() - 2, "/");
        }

        setcookie('success', 'Event Details updated successfully', time() + 2, "/");
    } else {
        setcookie('error', 'Error in Updating Event Details', time() + 2, "/");
    }

?>
    <script>
        window.location.href = "manage_events.php";
    </script>
<?php
}
