<?php
include_once('admin_header.php');
$p_id = $_REQUEST['p_id'];
$q = "select * from products where prod_id=$p_id";
$q1 = "Select * from categories";
$result1 = mysqli_query($con, $q1);
$result = mysqli_query($con, $q);
while ($row1 = mysqli_fetch_array($result)) {
    $extra = explode(",", $row1[7]);
    $old_profile_pic = "images/profile_pictures/" . $row1[6];
    setcookie("profile_pic", $old_profile_pic);
?>
    <div class="container">
        <div class="row">
            <div class=col-1></div>
            <div class=col-lg-9>
                <h2>Edit Product Details</h2>
                <form action="admin_update_product.php" method="post" enctype="multipart/form-data" id="form1">
                    <div class="form-group">
                        <label for="pid1">Product ID:</label>
                        <input type="text" class="form-control" id="pid1" placeholder="Enter Product Name" name="pis" value="<?= $row1[0] ?>" readonly>
                        <span id="pid_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pname1">Product Name:</label>
                        <input type="text" class="form-control" id="pname1" placeholder="Enter Product Name" name="pname" value="<?= $row1[1] ?>" readonly>
                        <span id="pname_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pdesc1">Product Description</label>
                        <textarea class="form-control" id="pdesc1" placeholder="Enter Product Description" name="pdesc" rows="5"><?= $row1[2] ?></textarea>
                        <span id="pdesc_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pprice1">Product Price:</label>
                        <input type="number" class="form-control" id="pprice1" placeholder="Enter Product Price" name="pprice" value="<?= $row1[3] ?>">
                        <span id="pprice_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pquantity1">Product Quantity:</label>
                        <input type="number" class="form-control" id="pquantity1" placeholder="Enter Product Quantity" name="pquantity" value="<?= $row1[4] ?>">
                        <span id="pquantity_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pcategory1">Select Product Category</label>
                        <select name="pcategory" id="pcategory1" class="form-control">
                            <?php
                            while ($row = mysqli_fetch_array($result1)) {
                            ?>
                                <option value="<?= $row[0] ?>" <?php if ($row1[5] == $row[0]) {
                                                                    echo "selected";
                                                                } ?>>
                                    <?= $row[1] ?></option>
                            <?php
                            }

                            ?>
                        </select>

                        <span id=" pcategory_err"></span>
                    </div>
                    <div class="form-group">
                        <img src="images/products/<?php echo $row1[6]; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="form-group">
                        <label for="p_main1">Product Main Image:</label>
                        <input type="file" class="form-control" id="p_main1" name="p_main_updt">
                        <span id="p_main_err_updt"></span>
                    </div>
                    <div class="form-group">
                        <div class="row"><?php
                                            foreach ($extra as $e) {
                                            ?>
                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 d-block mx-auto mx-md-0" style="height:100px">
                                    <img src="images/products/<?php echo $e ?>" alt="err" class="img-fluid" style="height: 100%; width: auto; object-fit: cover;" />
                                </div>
                            <?php
                                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p_extra1">Product Extra Images:</label>
                        <input type="file" class="form-control" id="p_extra1" placeholder="Enter Event Title" name="p_extra_updt[]" multiple>
                        <span id="p_extra_err_updt"></span>
                    </div>
                    <div class="form-group">
                        <label for="status1">Select Status:</label>
                        <select name="status" id="status1" class="form-control">
                            <option value="Active" <?php if ($row1[8] == "Active") {
                                                        echo "selected";
                                                    } ?>>Active</option>
                            <option value="Inactive" <?php if ($row1[8] == "Inactive") {
                                                            echo "selected";
                                                        } ?>>Inactive</option>
                            <option value="Deleted" <?php if ($row1[8] == "Deleted") {
                                                        echo "Deleted";
                                                    } ?>>Deleted</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-dark" value="Add Product" name="btn">
                </form>
            </div>

        </div>
    </div>
    <br>
<?php
}
include_once("footer.php");

?>