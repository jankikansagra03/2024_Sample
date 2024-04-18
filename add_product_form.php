<?php

include_once ("admin_header.php");
$q = "select * from categories";
$result = mysqli_query($con, $q);
?>
<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Add Product Form</h2>
            <form action="add_product_form.php" method="post" enctype="multipart/form-data" id="form1">
                <div class="form-group">
                    <label for="pname1">Product Name:</label>
                    <input type="text" class="form-control" id="pname1" placeholder="Enter Product Name" name="pname">
                    <span id="pname_err"></span>
                </div>
                <div class="form-group">
                    <label for="pdesc1">Product Description</label>
                    <textarea class="form-control" id="pdesc1" placeholder="Enter Product Description" name="pdesc"
                        rows="5"></textarea>
                    <span id="pdesc_err"></span>
                </div>
                <div class="form-group">
                    <label for="pprice1">Product Price:</label>
                    <input type="number" class="form-control" id="pprice1" placeholder="Enter Product Price"
                        name="pprice">
                    <span id="pprice_err"></span>
                </div>
                <div class="form-group">
                    <label for="pquantity1">Product Quantity:</label>
                    <input type="number" class="form-control" id="pquantity1" placeholder="Enter Product Quantity"
                        name="pquantity">
                    <span id="pquantity_err"></span>
                </div>
                <div class="form-group">
                    <label for="pcategory1">Select Product Category</label>
                    <select name="pcategory" id="pcategory1" class="form-control">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span id=" pcategory_err"></span>
                </div>
                <div class="form-group">
                    <label for="p_main1">Product Main Image:</label>
                    <input type="file" class="form-control" id="p_main1" name="p_main">
                    <span id="p_main_err"></span>
                </div>
                <div class="form-group">
                    <label for="p_extra1">Product Extra Images:</label>
                    <input type="file" class="form-control" id="p_extra1" placeholder="Enter Event Title"
                        name="p_extra[]" multiple>
                    <span id="p_extra_err"></span>
                </div>

                <input type="submit" class="btn btn-dark" value="Add Product" name="btn">

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
    // Retrieve form data
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

    $sql = "INSERT INTO `products`(`prod_name`, `prod_description`, `prod_price`, `prod_quantity`, `prod_category`, `prod_image`, `prod_extra_images`) VALUES ('$product_name', '$product_description', '$product_price', '$product_quantity', '$product_category', '$main_image_name', '$extra_images_string')";
    if (mysqli_query($con, $sql)) {
        if (!is_dir('images/products')) {
            mkdir("images/products");
        }
        move_uploaded_file($_FILES['p_main']['tmp_name'], "images/products/" . $main_image_name);
        $i = 0;
        for ($i = 0; $i < count($extra_images); $i++) {
            move_uploaded_file($_FILES['p_extra']['tmp_name'][$key], "images/products" . $extra_images[$i]);
        }
        setcookie('success', 'Product Added Successfully', time() + 2, "/");
    } else {
        setcookie('error', 'Error in adding Product', time() + 2, "/");
    }
    ?>
    <script>
        window.location.href = "manage_products.php";
    </script>
    <?php
}
?>