<?php
include_once('admin_header.php');
$email = $_REQUEST['e_id'];
$q = "select * from registration where email='$email'";
$result = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($result)) {

    $old_profile_pic = "images/profile_pictures/" . $row[6];
    setcookie("profile_pic", $old_profile_pic);
?>
    <div class="container">
        <div class="row">
            <div class=col-lg-3></div>
            <div class=col-lg-6>
                <h2>Edit User Profile</h2>
                <form action="admin_update_user_profile.php" method="post" enctype="multipart/form-data" id="form1">
                    <div class="form-group">
                        <label for="fn1"><b>Fullname:</b></label>
                        <input type="text" class="form-control" id="fn1" placeholder="Enter Name" name="fn" value="<?php echo $row[0]; ?>">
                        <span id="fn_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="email1"><b>Email:</b></label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email" onblur="check_email(document.getElementById('email1').value)" value="<?php echo $row[1]; ?>" readonly>
                        <span id="em_err"></span>
                    </div>

                    <div class="form-group">
                        <label for="gen1"><b>Select Gender:</b></label>
                        <br>
                        <input type="radio" id="gen1" name="gen" value="Male" <?php if ($row[2] == "Male") {
                                                                                    echo "checked";
                                                                                } ?>> Male
                        <input type="radio" id="" name="gen" value="Female" <?php if ($row[2] == "Female") {
                                                                                echo "checked";
                                                                            } ?>> Female
                        <span id="gen_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pwd"><b>Password:</b></label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $row['4']; ?>">
                        <span id="pswd_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="repwd"><b>Confirm Password: </b></label>
                        <input type="password" class="form-control" id="repwd" placeholder="Enter password" name="repswd" value="<?php echo $row['4']; ?>">
                        <span id="repswd_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="mobile1"><b>Mobile Number: </b></label>
                        <input type="number" class="form-control" id="mobile1" placeholder="1234567890" name="mobile" value="<?php echo $row[3]; ?>">
                        <span id="mobile_err"></span>
                    </div>
                    <div class="form-group">
                        <img src="images/profile_pictures/<?php echo $row[6]; ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="file1"><b>Select Profile Picture:</b></label>
                        <input type="file" class="form-control" id="file1" name="pic_updt">
                        <span id="file1_updt_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="file1"><b>Select Role:</b></label>
                        <select name="role" id="role1" class="form-control">
                            <option value="Admin" <?php if ($row[7] == "Admin") {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                            <option value="User" <?php if ($row[7] == "User") {
                                                        echo "selected";
                                                    } ?>>User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file1"><b>Select Status:</b></label>
                        <select name="status" id="role1" class="form-control">
                            <option value="Active" <?php if ($row[8] == "Active") {
                                                        echo "selected";
                                                    } ?>>Active</option>
                            <option value="Inactive" <?php if ($row[7] == "Inactive") {
                                                            echo "selected";
                                                        } ?>>Inactive</option>
                            <option value="Deleted" <?php if ($row[7] == "Deleted") {
                                                        echo "Deleted";
                                                    } ?>>Deleted</option>
                        </select>
                    </div>
                    <input type="submit" class="btn" value="Update Profile" name="btn">
                </form>
            </div>

        </div>
    </div>
    <br>
<?php
}
include_once("footer.php");

?>