<?php
include_once ("user_header.php");
$q = "select * from products where status='Active'";
$result = mysqli_query($con, $q);

?>
<br>
<div class="container">
    <div class="row">
        <?php

        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_array($result)) {
                ?>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="card">
                <img class="card-img-top" src="images/products/<?php echo $r[6]; ?>" alt="Card image" height="250px">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $r[1]; ?></h4>

                    <a href="view_product_detail.php?prod_id=<?php echo $r[0]; ?>"> <button>
                            <i class="fa-solid fa-circle-info"></i> View Details
                        </button></a>
                    <a href=add_to_cart.php?prod_id=<?php echo $r[0]; ?>> <button>
                            <i class="fa-solid fa-cart-plus"></i> Add to Cart
                        </button></a>
                </div>
            </div>
        </div>
        <?php
            }

        } else {
            ?>
        <h1 align="center">No Products to display</h1>

        <?php
        }
        ?>


    </div>
</div>
<?php
include_once ("footer.php");