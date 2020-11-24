<?php 
	if (isset($_GET["logout"])){
		session_start();
		$_SESSION['userid'] = null;
        $_SESSION['useruid'] = null; 
		header("location: index.php");
		exit();
	} 
	include_once 'login/header2.php';
?>

<body>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form action="login/includes/login.inc.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="uid" placeholder="User name / Email...">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pwd" placeholder="Password...">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>



					<div class="text-center p-t-5">
						<span class="txt1">
							<?php 
								if (isset($_GET["error"])) {
									if ($_GET["error"] == "emptyinput") {
										echo "<p>Fill in all fields!</p>";
									}
									else if ($_GET["error"] == "wronglogin") {
										echo "<p>Incorrect login information!</p>";
									}
								}
							?>
						</span>
					</div>					
					<div class="container-login100-form-btn">
						<button  name="submit" class="login100-form-btn">
							Login
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
					<div class="text-center p-t-20">
						<a class="txt2" href="signUp.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

<?php 
	include_once 'login/footer.php';
?>