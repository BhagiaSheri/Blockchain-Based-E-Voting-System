<?php
include_once("header.html");
?>
<title>Login to VO-BLOK</title>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/images/logo-round.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="php/login.php" name="login">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user" value="" placeholder="email" required validate>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password" required validate>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit"  class="btn login_btn">Login</button>
						</div>
					</form>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="signup.php" style="color: #2e3853;" class="ml-2">Sign Up</a>
					</div>
					<!-- <div class="d-flex justify-content-center links">
                    <a href="#">Forgot your password?</a>
                </div> -->
				</div>
			</div>
		</div>
	</div>
	<?php
	include_once("footer-script.html");
	?>
</body>

</html>