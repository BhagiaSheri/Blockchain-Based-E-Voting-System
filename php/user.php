<?php
session_start();
include_once("../header.html");
$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];
?>
<title>Cast Vote</title>
<!-- add icon link -->
<link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
<!-- web3 -->
<script src="../smart-contract/node_modules/web3/dist/web3.min.js"></script>

</head>

<body>
	<!-- hidden field to get its value in js file -->
<input type="hidden" value="<?php echo $user_id ?> " name="<?php echo $user_name ?>" class="user_id">
	<?php
	include_once("user-top-nav.php");
	?>
	<div id="section-container">
		<section id="candidates-list">

			<?php
			include_once("../smart-contract/smart-contract-config.php");
			?>
					</div>
				</div>
		</section>

	</div>
	<!-- user script file -->
	<script src="../assets/script/user.js"></script>
	<!-- handler & controller -->
	<script src="../ajax/handler.js"></script>
	<script src="../ajax/controller.js"></script>
	<!-- for sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- <script src="../assets/lib/dataTables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../assets/script/datatables.js"></script> -->

	<!-- smart contract script  -->

	<script>

	</script>
</body>