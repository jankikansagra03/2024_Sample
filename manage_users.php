<?php
include_once("admin_header.php");
$q = "select * from registration";
$result = mysqli_query($con, $q);

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="admin_add_user.php">
                <button>
                    <i class="fa-solid fa-calendar-plus fa-lg" style="color:white"></i> &nbsp;&nbsp;Add User
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
                        <th>Sr.No</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($a = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $a[0]; ?></td>
                            <td><?php echo $a[1]; ?></td>

                            <td><?php echo $a[2]; ?></td>

                            <td><?php echo $a[8]; ?></td>
                            <td><?php echo $a[7]; ?></td>
                            <td>
                                <a href="admin_edit_user.php?e_id=<?php echo $a[1]; ?>">
                                    <button class="btn btn-primary">
                                        <i class="fa-solid fa-square-pen fa-lg" style="color: #ffffff;"></i> Edit
                                    </button>
                                </a>

                                <a href="admin_delete_user.php?e_id=<?php echo $a[1]; ?>">
                                    <button class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can fa-lg" style="color:white;"></i> Delete
                                    </button>
                                </a>

                                <a href="admin_view_user.php?e_id=<?php echo $a[1]; ?>">
                                    <button class="btn btn-info">
                                        <i class="fa-solid fa-eye fa-lg" style="color:white"></i> View
                                    </button>
                                </a>

                                <?php
                                if ($a[8] == "Active") {
                                ?>
                                    <a href="admin_deactivate_user.php?e_id=<?php echo $a[1]; ?>">

                                        <button class="btn btn-warning text-white">
                                            <i class="fa-solid fa-circle-xmark fa-lg" style="color:white"></i> Deactivate
                                        </button>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="admin_activate_user.php?e_id=<?php echo $a[1]; ?>">

                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-square-check fa-lg" style="color: #ffffff;"></i> &nbsp;Activate
                                        </button>
                                    </a>
                                <?php
                                }
                                ?>

                            </td>
                        </tr>

                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>