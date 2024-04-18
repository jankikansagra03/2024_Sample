<?php
include_once('admin_header.php');
$e_id = $_REQUEST['e_id'];
$_SESSION['view_email'] = $e_id;
$q = "select * from registration where email='$e_id'";
$result = mysqli_query($con, $q);

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>User Details</h3>
            <?php
            while ($res = mysqli_fetch_array($result)) {
            ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Fullname</th>
                        <td><?= $res[0] ?> </td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td><?= $res[1] ?> </td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?= $res[2] ?> </td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td><?= $res[3] ?> </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><?= $res[4] ?> </td>
                    </tr>
                    <tr>
                        <th>Profile Picture</th>
                        <td><img src="<?= 'images/profile_pictures/' . $res[6] ?>" class="img-fluid" /> </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td><?= $res[7] ?> </td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td><?= $res[8] ?> </td>
                    </tr>
                    <tr>
                        <th>Token</th>
                        <td><?= $res[9] ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <a href="admin_edit_user.php?e_id=<?php echo $_SESSION['view_email']; ?>">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-square-pen fa-lg" style="color: #ffffff;"></i> Edit
                                </button>
                            </a>

                            <a href="admin_delete_user.php?e_id=<?php echo $_SESSION['view_email']; ?>">
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can fa-lg" style="color:white;"></i> Delete
                                </button>
                            </a>
                        </td>
                    </tr>





                </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<br>


<?php
include_once('footer.php');
?>