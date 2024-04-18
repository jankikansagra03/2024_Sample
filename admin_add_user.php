<?php
include_once('admin_header.php');
?>
<br>
<div class="container">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Registration Form</h2>
            <form action="admin_add_user.php" method="post" enctype="multipart/form-data" id="form1">
                <div class="form-group">
                    <label for="fn1"><b>Fullname:</b></label>
                    <input type="text" class="form-control" id="fn1" placeholder="Enter Name" name="fn">
                    <span id="fn_err"></span>
                </div>
                <div class="form-group">
                    <label for="email1"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email" onblur="check_email(document.getElementById('email1').value)">
                    <span id="em_err"></span>
                </div>
                <div class="form-group">
                    <label for="pwd"><b>Password:</b></label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    <span id="pswd_err"></span>
                </div>
                <div class="form-group">
                    <label for="repwd"><b>Confirm Password: </b></label>
                    <input type="password" class="form-control" id="repwd" placeholder="Enter password" name="repswd">
                    <span id="repswd_err"></span>
                </div>
                <div class="form-group">
                    <label for="gen1"><b>Select Gender:</b></label>
                    <br>
                    <input type="radio" id="gen1" name="gen" value="Male"> Male
                    <input type="radio" id="" name="gen" value="Female"> Female
                    <span id="gen_err"></span>
                </div>
                <div class="form-group">
                    <label for="mobile1"><b>Mobile Number: </b></label>
                    <input type="number" class="form-control" id="mobile1" placeholder="1234567890" name="mobile">
                    <span id="mobile_err"></span>
                </div>
                <div class="form-group">
                    <label for="file1"><b>Select Profile Picture:</b></label>
                    <input type="file" class="form-control" id="file1" name="pic">
                    <span id="file1_err"></span>
                </div>
                <input type="submit" class="btn" value="Submit" name="btn">
            </form>
        </div>

    </div>


</div>
<br>
<?php
include_once("footer.php");
?>