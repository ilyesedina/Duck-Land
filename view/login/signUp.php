<?php 
	include_once 'header2.php';
?>

<body>
<form action="includes/signUp.inc.php" method="post"> 
    <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">

                    <form class="login100-form validate-form">
                        <span class="login100-form-title">
                            Create an acount
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="text" name="name" placeholder="Full name...">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email...">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="text" name="uid" placeholder="Username...">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pwd" placeholder="Password...">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pwdrepeat" placeholder="Repeat your password...">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <button name="submit" class="login100-form-btn">
                                Sign Up
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                            <a class="txt2" href="#">
                                Username / Password?
                            </a>
                        </div>

                        <div class="text-center p-t-136">
                            <a class="txt2" href="login.php">
                                Login
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
</form>
</body>

<?php 
	include_once 'footer.php';
?>