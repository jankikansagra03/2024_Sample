<?php
include_once("user_header.php");
$email=$_SESSION['user_uname'];
$q="select * from orders where user_id='$email'";
$result=mysqli_query($con,$q);
?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-striped">
                <tr>
                    <th>Sr.No</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
                <?php
                $i=1;
    while($row=mysqli_fetch_array($result))
    {
        ?>
    <tr>
        <td><?= $i ?></td>
        <?php $prod="select prod_name,prod_image from products where prod_id=$row[1]";
    $r1=mysqli_fetch_array(mysqli_query($con,$prod)); ?>
        <td><?= $r1[0] ?></td>
        <td>
            <img src="images/products/<?= $r1[1] ?>" alt="" class="img-fluid">
        </td>
        <td><?= $row[3] ?></td>
        <td><?= $row[4] ?></td>
        <td><?= $row[5] ?></td>
        <td><?= $row[7] ?></td>
        <td><?= $row[8] ?></td>
        <td>
        <?php
        if($row[7] =="Confirmed" || $row[7] == "Dispatched") 
        {
            ?>
            <a href="cancel_order.php?o_id=<?= $row[0] ?>"> 
        <button class="btn btn-danger"><i class="fa-solid fa-rectangle-xmark"></i> Cancel 
        </button></a>
            <?php
        }?>
        </td>
    </tr>
        <?php
        $i++;
    }
                ?>
            </table>
        </div>
    </div>
</div>
<br>
<?php
include_once("footer.php");