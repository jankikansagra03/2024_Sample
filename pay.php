<?php
include_once("user_header.php");
require_once 'vendor/autoload.php'; // Include the Razorpay library

use Razorpay\Api\Api;

$api_key = 'rzp_test_PVSdEIOj67KSKy';
$api_secret = '6jZmoJDeWUetW8LC7lhFiU8Y';
$total=$_SESSION['total'];
//$total=$_REQUEST['total'];
$api = new Api($api_key, $api_secret);

// Create a new order
$order = $api->order->create(array(
    'receipt' => 'order_rcptid_' . time(),
    'amount' => $total*100, // Amount in paise
    'currency' => 'INR'
));

$order_id = $order->id;
$_SESSION['order_id']=$order_id;

?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="payment_action.php" method="POST">
<h1>Paying to Janki Kansagra</h1>
<div class="form-group">
    <label for="total1">Net Payable Amount</label>
<input type="text" class="form-control"name="total" id="total1" value="<?php echo $total; ?>" disabled> 
</div>
<div class="form-group">
    <label for="total1">Order ID</label>
<input type="text" class="form-control"name="total" id="total1" value="<?php echo $order_id ?>" disabled> 
</div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $api_key; ?>"
        data-amount="<?php echo $total * 100; ?>" 
        data-currency="INR"
        data-order_id="<?php echo $order_id; ?>"
        data-buttontext="Pay"
        data-name="Janki Kansagra"
        data-description="Test Transaction"
        data-image="https://example.com/your_logo.png"
        data-prefill.name="Janki Kansagra"
        data-prefill.email="janki.kansagra@rku.ac.in"
        data-prefill.contact="9999999999"
        data-theme.color="#3b5998">
    </script>
    <input type="hidden" custom="Hidden Element" name="hidden">
</form></div>
    </div>
</div>
<br>
<?php
include_once('footer.php');
?>