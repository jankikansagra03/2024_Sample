<?php
include_once ("admin_header.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Add Category</h2>
            <form action="add_category_form.php" method="post" enctype="multipart/form-data" id="form1">
                <div class="form-group">
                    <label for="pcategory1">Enter Category:</label>
                    <input type="text" class="form-control" id="pcategory1" name="pcategory"
                        placeholder="Category Name">
                    <span id="pcategory_err"></span>
                </div>

                <input type="submit" class="btn btn-dark" name="btn" value="Add Category">
            </form>
        </div>
    </div>
</div>
<br>
<?php
include_once ("footer.php");
?>

<?php
if (isset($_POST['btn'])) {
    $c_name = $_POST['pcategory'];

    $q = "INSERT INTO `categories`(`category_name`) VALUES ('$c_name')";

    if (mysqli_query($con, $q)) {
        setcookie('success', 'Category added successfully', time() + 2, "/");

    } else {
        setcookie('success', 'Category added successfully', time() + 2, "/");
    }
    ?>
    <script>
        window.location.href = "manage_category.php";
    </script>
    <?php
}
?>