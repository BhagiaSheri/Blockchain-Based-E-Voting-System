<?php 
	include_once("header.html");
	?>
	<title>Sign Up to VO-BLOK</title>
	<link rel="stylesheet" href="assets/css/signup.css">
</head>
<!--Signup page code-->

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/images/logo-round.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-around form_container ml-5">
					<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="uname" class="form-control input_user" value=""
								placeholder="Full Name">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="uemail" class="form-control input_user" value=""
								placeholder="Email Address">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-phone"></i></span>
							</div>
							<input type="tel" name="uphone-no" class="form-control input_user" value=""
								placeholder="Contact No.">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-calendar"></i></span>
							</div>
							<input type="date" name="udob" class="form-control input_user" value=""
								placeholder="Full Name" title="Enter Date of Birth">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="upass" class="form-control input_pass" value=""
								placeholder="Password">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="uconfirm_pass" class="form-control input_user" value=""
								placeholder="Confirm Password">
						</div>

						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="button" name="button" class="btn login_btn">Sign Up</button>
						</div>

						<div class="mt-2">
							<div class="d-flex justify-content-center links">
								Already have an account? <a href="login.php" class="ml-2 login-link">Login</a>
							</div>
						</div>
					</form>

					<section id="image-place-holder" class="d-flex flex-column align-items-center">
						<div>
							<img src="assets/images/user.png" alt="Profile Picture" width="180px">
						</div>
						<div class="mt-3 ml-5 profile_container">
							<input type="file" name="profile-pic" class="file_btn" accept="image/*" />
						</div>
					</section>
				</div>


			</div>
		</div>
	</div>
	<?php 
	include_once("footer-script.html");
	?>
</body>

</html>