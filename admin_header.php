<?php
session_start();
include_once("connection.php");
$url = $_SERVER['REQUEST_URI'];
// echo $url;
$url = parse_url($url, PHP_URL_PATH);
$arr_url = explode("/", $url);
//echo $arr_url[3];

if (!isset($_SESSION['admin_uname'])) {
?>
<script>
window.location.href = "login.php";
</script>
<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="js/jquery.validate.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/validator.js"></script>
    <script src="js/ajax.js"></script>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="#"><img src="images/logo_white.png" alt="RKU logo" height="25%"
                    width="25%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "admin_dashboard.php") {
                                                echo "active";
                                            } ?>" href="admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "manage_events.php") {
                                                echo "active";
                                            } ?>" href="manage_events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "manage_users.php") {
                                                echo "active";
                                            } ?>" href="manage_users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "manage_slider.php") {
                                                echo "active";
                                            } ?>" href="manage_slider.php">Slider Images</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "manage_products.php") {
                                                echo "active";
                                            } ?>" href="manage_products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "manage_category.php") {
                                                echo "active";
                                            } ?>" href="manage_category.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "manage_carts.php") {
                                                echo "active";
                                            } ?>" href="manage_carts.php">Shopping Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "admin_edit_profile.php") {
                                                echo "active";
                                            } ?>" href="admin_edit_profile.php">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "admin_change_password.php") {
                                                echo "active";
                                            } ?>" href="admin_change_password.php">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($arr_url[2] == "logout.php") {
                                                echo "active";
                                            } ?>" href="admin_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_COOKIE['success'])) {
                ?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>
                </div>
                <?php
                }
                if (isset($_COOKIE['error'])) {
                ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> <?php echo $_COOKIE['error']; ?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>