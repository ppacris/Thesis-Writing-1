<!Doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/100x100.png">

	<!-- CSS only -->
	<link href="../assets/bootstrapCSS/bootstrap.min.css" rel="stylesheet">


	<!-- CSS Link Start -->

	<!-- FontAwesome Icon CSS -->
	<link rel="stylesheet" href="../assets/fontawesomeV6/css/all.css">

	<!-- BackGround stylesheet -->
	<link rel="stylesheet" href="style-login.css">

	<!-- CSS Link End -->
</head>

<body>
	<div class="container position-absolute top-50 start-50 translate-middle">
		<div class="row justify-content-center">
			<!--Sart of Form-->
			<form action="../assets/includes/login-inc.php" method="post" class="col-sm-6 col-lg-4 bg-white border rounded-4 shadow-lg p-4">
				<!--input-group-->
				<div class="input-group my-3">
					<!--form-floating-->
					<div class="form-floating">
						<!--form-control-->
						<input name="username" type="text" class="form-control" placeholder="Enter Username" aria-describedby="user1" required>
						<label for="username">username</label>
					</div>

					<!--input-group-text & Tooltips-->
					<span class="input-group-text tt" data-bs-placement="top" title="Enter Username" id="user1">
						<!--Icon-->
						<i class="fa-solid fa-user-tie fa-lg"></i>
					</span>
				</div>

				<!--input-group-->
				<div class="input-group my-3">
					<!--form-floating-->
					<div class="form-floating">
						<!--form-control-->
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" aria-describedby="pass1" required>
						<label for="password">password</label>
					</div>


					<!--input-group-text & Tooltips-->
					<span class="input-group-text tt" data-bs-placement="right" title="Hover me! -> to show password" id="pass1">
						<!--Icon-->
						<a href="#" class="text-dark" id="icon-hover">
							<i class="fa-solid fa-lock fa-lg" id="lockIcon"></i>
						</a>
					</span>
				</div>

				<!--btn-->
				<div class="row row-cols-3 row-cols-sm-2 justify-content-center">
					<button type="submit" name="submit" class="btn btn-primary rounded-4">Log in</button>
				</div>
			</form>
			<!--End of form-->
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->
	<script src="../assets/bootstrapJS/bootstrap.bundle.min.js"></script>

	<!-- Jquery -->
	<script src="../assets/dataTablesJS/jquery.min.js"></script>

	<script type="text/javascript">
		/* Tooltips */
		const tooltips = document.querySelectorAll('.tt')
		tooltips.forEach(t => {
			new bootstrap.Tooltip(t)
		})

		/* Lock & Unlock Password */
		$(document).ready(function() {
			$("#icon-hover").hover(function() {
				$("#lockIcon").toggleClass('fa-unlock');

				var showpass = $("#password");
				if (showpass.attr("type") === "password") {
					showpass.attr("type", "text");
				} else {
					showpass.attr("type", "password");
				}

			});
		});

	</script>
</body>

</html>
