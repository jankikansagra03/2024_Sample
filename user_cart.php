<?php
include_once ('user_header.php');
$uname = $_SESSION['user_uname'];
$q = "select * from Shopping_cart where User_email='$uname'";
$result = mysqli_query($con, $q);
$count = mysqli_num_rows($result);
$total=0;
if ($count == 0) {
    ?>
    <h3 align="center">Your cart is empty.</h3>
    <?php
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Shopping Cart</h2>
                <table class="table table-striped">
                    <tr>
                        <th>Sr.NO</th>
                        <th>Prouct Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;

                    while ($row = mysqli_fetch_array($result)) {
                        $q = "select * from products where prod_id=$row[2]";
                        $result1 = mysqli_query($con, $q);
                        while ($prod = mysqli_fetch_array($result1)) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $prod[1] ?></td>
                                <td><img src="images/products/<?= $prod[6] ?>" alt=""  height="70px" width="100px" class="img-fluid"></td>
                                <td>
                                    <a href="Increase_cart.php?p_id=<?= $prod[0] ?>">
                                        <button style="padding:0px 5px; border:0px" type="submit" name="increase"> <i class="fa-solid fa-plus"></i> </button>
                                    </a>
                                    <input type="text" name="p_cart" id="" value="<?= $row[3] ?>" style="width:20%;height:30%" disabled>
                                    <a href="decrease_cart.php?p_id=<?= $prod[0] ?>">
                                        <button type="submit" style="padding:0px 5px; border:0px" name="decrease"> <i class="fa-solid fa-minus"></i> </button>
                                    </a>
                                </td>
                                <td><?= $prod[3] ?></td>
                                    <td>
                                  <?php
                                    $total=$total+$row[4]; ?>
                                    <?= $row[4]; ?>
                                </td>
                                <td>
                                    <a href="delete_from_cart.php?p_id=<?= $row[2] ?>">
                                    <button style="padding:10px;">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    $i++;
                    }
$_SESSION['total']=$total;
                    ?>
                    <tr>
                        <td colspan="3" style="background-color: #3b5998;"></td>
                        <td colspan="2" style="background-color: #3b5998;" class="text-white">Total</td>
                        <td style="background-color: #3b5998;" class="text-white"><?= $total ?></td>
                        <td>
                            <a href="pay.php?total=<?= $total ?>">
                            <button><i class="fa-regular fa-money-bill-1"></i> Pay Now</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php
}

?>

<br>

<?php
include_once ('footer.php');