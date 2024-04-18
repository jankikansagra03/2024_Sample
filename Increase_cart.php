<?php
include_once("user_header.php");
$email=$_SESSION['user_uname'];
$p_id=$_REQUEST['p_id'];
$q="select quantity from shopping_cart where User_email='$email' and product_id=$p_id";
$result=mysqli_query($con,$q);
while($row=mysqli_fetch_array($result))
{
    $quantity=$row[0]+1;
    $prod="select prod_price from products where prod_id=$p_id";
    $r1=mysqli_fetch_array(mysqli_query($con,$prod));
    $price=$r1[0]*$quantity;
    $q_updt="update shopping_cart set quantity=$quantity,price=$price where User_email='$email' and product_id=$p_id";
    if(mysqli_query($con,$q_updt))
    {
        ?>
        <script>
            window.location.href="user_cart.php";
        </script>
        <?php
    }
}
?>
<br>
<?php
include_once("footer.php");
