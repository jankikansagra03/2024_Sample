<?php
include_once('user_header.php');
$email=$_SESSION['user_uname'];
$pid=$_REQUEST['p_id'];
$q="delete from Shopping_cart where User_email='$email' and product_id=$pid";
if(mysqli_query($con,$q))
{
    setcookie('success','Item removed from cart',time()+2,"/");
}
else{
    setcookie('error','Error in deleting Item',time()+2,"/");
}
?>
<script>
    window.location.href="user_cart.php";
    </script>
<?php
include_once('footer.php');