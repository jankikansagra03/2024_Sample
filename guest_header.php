<?php
session_start();
include_once("connection.php");
$url = $_SERVER['REQUEST_URI'];
$url = parse_url($url, PHP_URL_PATH);
$arr_url = explode("/", $url);

//delete otp and token for forget_password
date_default_timezone_set("Asia/Kolkata");
$db_time = date("Y-m-d G:i:s", strtotime("-1 min"));
$q = "DELETE FROM `token` WHERE `sent_time`<='$db_time'";
mysqli_query($con, $q);

if (isset($_SESSION['admin_uname'])) {
?>
    <script>
        window.location.href = "admin_dashboard.php";
    </script>
<?php
}
if (isset($_SESSION['user_uname'])) {
?>
    <script>
        window.location.href = "user_dashboard.php";
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
    <link rel="stylesheet" href="css/style.css">
    <script src="js/ajax.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a class="navbar-brand" href="#"><img src="images/logo_white.png" alt="RKU logo" height="25%" width="25%"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link <?php if ($arr_url[3] == "index.php") {
                                                        echo "active";
                                                    } ?>" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($arr_url[3] == "event.php") {
                                                        echo "active";
                                                    } ?>" href="event.php">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($arr_url[3] == "about.php") {
                                                        echo "active";
                                                    } ?>" href="about.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($arr_url[3] == "contact.php") {
                                                        echo "active";
                                                    } ?>" href="contact.php">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($arr_url[3] == "login.php") {
                                                        echo "active";
                                                    } ?>" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($arr_url[3] == "register.php") {
                                                        echo "active";
                                                    } ?>" href="register.php">Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

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
                        <strong>Error!</strong> <?php echo $_COOKIE['error']; ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>