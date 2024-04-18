<?php
include_once('admin_header.php');
$users = "select * from registration";
$user_count = mysqli_num_rows(mysqli_query($con, $users));
$active = "select * from registration where status='Active'";
$active_count = mysqli_num_rows(mysqli_query($con, $active));
$inactive = "select * from registration where status='Inactive'";
$inactive_count = mysqli_num_rows(mysqli_query($con, $inactive));
$admin = "select * from registration where role='Admin'";
$admin_count = mysqli_num_rows(mysqli_query($con, $admin));
$non_admin = "select * from registration where role='User'";
$non_admin_count = mysqli_num_rows(mysqli_query($con, $non_admin));
$products = "select * from products";
$products_count = mysqli_num_rows(mysqli_query($con, $products));
$events = "select * from event_details";
$event_count = mysqli_num_rows(mysqli_query($con, $events));
$slider = "select * from slider_images";
$slider_count = mysqli_num_rows(mysqli_query($con, $slider));
$shopping_cart = "select * from registration";
$cart_items_count = mysqli_num_rows(mysqli_query($con, $shopping_cart));
?>

<div class="container">
    <div class="row gy-10">
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_users.php"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;All Users</a></h5>
                    <h5><?php echo $user_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_users.php"><i class="fa-solid fa-user-shield"></i>&nbsp;&nbsp;Admins</a></h5>
                    <h5><?php echo $admin_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_users.php"><i class="fa-solid fa-users-gear"></i>&nbsp;&nbsp;Users</a></h5>
                    <h5><?php echo $non_admin_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_users.php"><i class="fa-solid fa-user-check"></i>&nbsp;&nbsp;Active Users</a></h5>
                    <h5><?php echo $active_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_users.php"><i class="fa-solid fa-user-clock"></i>&nbsp;&nbsp;Inactive Users</a></h5>
                    <h5><?php echo $inactive_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_products.php"><i class="fa-solid fa-store"></i>&nbsp;&nbsp;Products Gallery</a></h5>
                    <h5><?php echo $products_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_cart.php"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Shopping Cart</a></h5>
                    <h5><?php echo $cart_items_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_events.php"><i class="fa-regular fa-calendar-check"></i>&nbsp;&nbsp;Events Gallery</a></h5>
                    <h5><?php echo $event_count; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <div class="card-body text-white text-center" style="background-color: #3b5998;border-radius:5px;">
                    <h5><a class="admin_a" href="manage_slider.php"><i class="fa-solid fa-photo-film"></i>&nbsp;&nbsp;Slider Images</a></h5>
                    <h5><?php echo $slider_count; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>