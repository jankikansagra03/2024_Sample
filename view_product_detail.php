<?php
include_once ("user_header.php");
$p_id = $_REQUEST['prod_id'];

// echo $event_id;
$q = "select * from products where prod_id=$p_id and status='Active'";
$result = mysqli_query($con, $q);
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
            while ($res = mysqli_fetch_array($result)) {

                $extra = explode(",", $res[7]);
                ?>
                <h3 style="text-decoration: underline;"> <?php echo $res[1]; ?></h3>
                <p style="text-align: justify;"><?php echo $res[2]; ?></p>
                <p><b>Price </b><?php echo $res[3]; ?></p>
                <div class="row gy-10">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 d-block mx-auto mx-md-0"
                        style="height:200px">
                        <img src="images/products/<?php echo $res[6]; ?>" alt="err" class="img-fluid"
                            style="height: 100%; width: 100%; object-fit: cover;" />
                    </div>
                    <?php

                    foreach ($extra as $e) {
                        ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 d-block mx-auto mx-md-0"
                            style="height:200px">
                            <img src="images/products/<?php echo $e ?>" alt="err" class="img-fluid"
                                style="height: 100%; width: auto; object-fit: cover;" />
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>
<br>

<?php
include_once ("footer.php");