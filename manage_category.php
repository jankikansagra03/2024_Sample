<?php
include_once("admin_header.php");
$q = "select * from categories";
$result = mysqli_query($con, $q);

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="add_category_form.php">
                <button>
                    <i class="fa-solid fa-calendar-plus fa-lg" style="color:white"></i> &nbsp;&nbsp;Add Category
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
                        <th>Category</th>
                        <th>Status</th>
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
                        <td>
                            <a href="admin_edit_category.php?e_id=<?php echo $a[0]; ?>">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-square-pen fa-lg" style="color: #ffffff;"></i> Edit
                                </button>
                            </a>
                            <a href="admin_delete_category.php?e_id=<?php echo $a[0]; ?>">
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can fa-lg" style="color:white;"></i> Delete
                                </button>
                            </a>
                            <?php
                                if ($a[2] == "Active") {
                                ?>
                            <a href="admin_deactivate_category.php?e_id=<?php echo $a[0]; ?>">

                                <button class="btn btn-warning text-white">
                                    <i class="fa-solid fa-circle-xmark fa-lg" style="color:white"></i> Deactivate
                                </button>
                            </a>
                            <?php
                                } else {
                                ?>
                            <a href="admin_activate_category.php?e_id=<?php echo $a[0]; ?>">

                                <button class="btn btn-success">
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