<?php
include_once ('user_header.php');
$uname = $_SESSION['user_uname'];
$product_id = $_REQUEST['prod_id'];
$q = "select * from shopping_cart where User_email='$uname' and product_id=$product_id";
$count = mysqli_num_rows(mysqli_query($con, $q));
if ($count > 0) {
    setcookie('success', "Item already added to cart", time() + 2, "/");

} else {
    $prod="select prod_price from products where prod_id=$product_id";
    $r1=mysqli_fetch_array(mysqli_query($con,$prod));
    $ins = "INSERT INTO `shopping_cart`(`User_email`, `product_id`, `quantity`,`price`) VALUES ('$uname',$product_id,1,$r1[0])";
    if (mysqli_query($con, $ins)) {
        setcookie("success", "Item Added to cart", time() + 2, "/");
    } else {
        setcookie('error', "Error in adding iotem to cart", time() + 2, "/");
    }
}

?>
<script>
    window.location.href = "user_cart.php";
</script>
<br>

<?php
include_once ('footer.php');