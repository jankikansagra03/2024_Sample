<?php
include_once('user_header.php');
$email=$_SESSION['user_uname'];
$order_id=$_SESSION['order_id'];
$total=$_SESSION['total'];


$q="select * from Shopping_cart where User_email='$email'";
$result=mysqli_query($con,$q);

while($row=mysqli_fetch_array($result))
{
    $ord_date=date('Y-m-d');
    $q="INSERT INTO `orders`(`prod_id`, `user_id`, `quantity`, `total_price`, `order_date`, `transaction_id`, `order_status`, `payment_status`) VALUES ($row[2],'$email',
    $row[3],$row[4],'$ord_date','$order_id','Confirmed','Paid')";
    if(mysqli_query($con,$q))
    {
        setcookie("success",'Order Placed successfully',time()+2,"/");
    }
    else{
        setcookie('error','Error in placing Order',time()+2,"/");
    }
    $q_delete="delete from Shopping_cart where User_email='$email' and product_id=$row[2]";
    mysqli_query($con,$q_delete);
    ?>
    <script>
        window.location.href="user_orders.php";
    </script>
    <?php

}
include_once('footer.php');