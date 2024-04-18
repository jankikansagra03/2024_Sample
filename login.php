<?php
include_once("guest_header.php");
?>
<br>

<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Login Form</h2>
            <form action="login_action.php" method="post" id="form1">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <a href="Forgot_password.php">
                    Forgot Password?
                </a>
                <br>
                <input type="submit" class="btn" value="Submit" name="lgn_btn" />


            </form>
        </div>
    </div>
</div>
<br>
<?php
include_once("footer.php");
?>