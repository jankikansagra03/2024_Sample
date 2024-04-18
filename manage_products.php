<?php
include_once ('admin_header.php');
$q = "select * from products";
$result = mysqli_query($con, $q);
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="add_product_form.php">
                <button>
                    <i class="fa-solid fa-calendar-plus fa-lg" style="color:white"></i> &nbsp;&nbsp;Add Product
                </button>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($a = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td><?php echo $a[0]; ?></td>
                        <td><?php echo $a[1]; ?></td>
                        <td><?php echo $a[2]; ?></td>
                        <td><?php echo $a[3]; ?></td>
                        <td style="height:100px; width:200px"><img src="images/products/<?php echo $a[6]; ?>"
                                class="img-fluid" /></td>
                        <td>
                            <a href="admin_edit_event.php?e_id=<?php echo $a[0]; ?>">
                                <button class="btn btn-primary text-white" style="width:90%">
                                    <i class="fa-solid fa-square-pen fa-lg" style="color: #ffffff;"></i> Edit
                                </button>
                            </a>
                            <a href="admin_delete_event.php?e_id=<?php echo $a[0]; ?>">
                                <button class="btn btn-danger text-white" style="width:90%"> <i
                                        class="fa-solid fa-trash-can fa-lg" style="color:white;"></i> Delete
                                </button>
                            </a>

                            <a href="admin_view_event.php?e_id=<?php echo $a[0]; ?>">
                                <button class="btn btn-info text-white" style="width:90%">
                                    <i class="fa-solid fa-eye fa-lg" style="color:white"></i> View
                                </button>
                            </a>

                            <?php
                                if ($a[8] == "Active") {
                                    ?>
                            <a href="admin_deactivate_event.php?e_id=<?php echo $a[0]; ?>">

                                <button class="btn btn-warning text-white" style="width:90%">
                                    <i class="fa-solid fa-circle-xmark fa-lg" style="color:white"></i> Deactivate
                                </button>
                            </a>
                            <?php
                                } else {
                                    ?>
                            <a href="admin_activate_event.php?e_id=<?php echo $a[0]; ?>">

                                <button class="btn btn-success text-white" style="width:90%">
                                    <i class="fa-solid fa-square-check fa-lg" style="color: #ffffff;"></i>
                                    &nbsp;Activate
                                </button>
                            </a>
                            <?php
                                }
                                ?>

                        </td>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>