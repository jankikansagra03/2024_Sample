<?php
include_once ("admin_header.php");
$s_id = $_REQUEST['s_id'];
$result = "select * from slider_images where img_id=$s_id";
$res = mysqli_query($con, $result);
?>

<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Edit Image Slider</h2>
            <?php
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <br>
                <div>
                    <img src="images/slider/<?php echo $row[1]; ?>" alt="" class="img-fluid">
                </div>
                <form action="admin_edit_slider.php?s_id=<?= $row[0]; ?>" method="post" enctype="multipart/form-data"
                    id="form1">

                    <br>
                    <div class="form-group">
                        <label for="pic_updt1">Select File:</label>
                        <input type="file" class="form-control" id="pic_updt1" name="pic_updt">
                        <span id="file1_updt_err"></span>
                    </div>

                    <input type="submit" class="btn btn-dark" name="btn" value="Update Slider Image">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<br>

<?php
include_once ('footer.php');

if (isset($_POST['btn'])) {
    if ($_FILES['pic_updt']['name'] != "") {
        $id = $_REQUEST['s_id'];
        $q = "select * from slider_images where img_id=$id";
        $result = mysqli_query($con, $q);
        $row = mysqli_fetch_array($result);
        $pic_name = uniqid() . $_FILES['pic_updt']['name'];
        $profile_pic = $row[1];
        $updt = "update slider_images set image_name='$pic_name' where img_id=$id";
        if (mysqli_query($con, $updt)) {
            move_uploaded_file($_FILES['pic_updt']['tmp_name'], "images/slider/" . $pic_name);
            unlink("images/slider/" . $profile_pic);
        } else {
            setcookie('error', 'Error in updating slider image', time() + 2, "/");
        }
        setcookie('success', 'Slider updated successfully', time() + 2, '/');
        ?>
        <script>
            window.location.href = "manage_slider.php";
        </script>
        <?php
    }
}