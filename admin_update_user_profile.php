<?php
include_once("admin_header.php");
if (isset($_POST['btn'])) {
    $fn = $_POST['fn'];
    $em = $_POST['email'];
    $gen = $_POST['gen'];
    $mobile = $_POST['mobile'];
    $pwd = $_POST['pswd'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $q_updt = "UPDATE `registration` SET `fullname`='$fn',`gender`='$gen',`mobile`=$mobile,`password`='$pwd',`role`='$role',`status`='$status'";
    if ($_FILES['pic_updt']['name'] != "") {
        $pic = uniqid() . $_FILES['pic_updt']['name'];
        $q_updt = $q_updt . ",`profile_pic`='$pic'";
        if (!is_dir("images/profile_pictures")) {
            mkdir("images/profile_pictures");
        }
        $q = "select * from registrations where email='$email'";
        $result = mysqli_query($con, $q);
        while ($res = mysqli_fetch_array($result)) {
            setcookie('profile_pic', $res[6]);
        }
    }
    $q_updt = $q_updt . " where email='$em'";
    if (mysqli_query($con, $q_updt)) {
        if (isset($_SESSION['view_email'])) {
            unset($_SESSION['view_email']);
        }
        if ($_FILES['pic_updt']['name'] != "") {
            unlink($_COOKIE['profile_pic']);
            move_uploaded_file($_FILES['pic_updt']['tmp_name'], "images/profile_pictures/" . $pic);
        }
        setcookie('profile_pic', "", time() - 2);
        setcookie('success', "User Profile Updated Successfully", time() + 2, "/");
?>
        <script>
            window.location.href = "manage_users.php";
        </script>
    <?php
    } else {
        setcookie('error', "Error in updating User Profile. Please try again later", time() + 2, "/");
    ?>
        <script>
            window.location.href = "manage_users.php";
        </script>
<?php
    }
}
