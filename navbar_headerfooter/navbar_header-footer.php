<?php
    session_start();
	require_once '../assets/includes/authen-check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/100x100.png">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- DataTable CSS	-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">


	<!-- Link CSS Connection Start -->
	<!-- FontAwesome Icon CSS -->
	<link rel="stylesheet" href="../assets/fontawesomeV6/css/all.css">
	<!-- Styles per Page Start -->
	<link rel="stylesheet" href="../homepage/style-homepage.css">
	<!-- Styles per Page End -->
	<!-- Link CSS Connection Start End -->
</head>

<style>
	#main-dropdown {
		left: calc(-670%);
	}

	.sub-dropdown-menu {
		display: none;
		position: absolute;
		top: calc(7%);
		left: calc(-68.1%);
	}

	.sub-dropdown-menu-CM {
		display: none;
		position: absolute;
		top: calc(7%);
		left: calc(-80.2%);
	}

	.sub-dropdown:hover .sub-dropdown-menu,
	.sub-dropdown:hover .sub-dropdown-menu-CM {
		display: block;
	}

	#logout:hover {
		background-color: rgba(220, 53, 69);
		opacity: 1;
	}

	.bg-black {
		background-image: var(--bs-gradient);
	}

	.bg-body-secondary {
		--bs-bg-opacity: 1;
		background-color: rgba(var(--bs-secondary-bg-rgb), var(--bs-bg-opacity)) !important;
		background-image: var(--bs-gradient);
	}

</style>

<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-expand navbar-dark bg-black rounded-bottom">
		<div class="container">
			<!-- navbar-brand -->
			<a href="../homepage/" class="navbar-brand school-name" id="schoolName">CGC <span class="text-white">-</span> FSS</a>
			<!--Start navbar-nav (unordered list) w/ nav-item (list item)-->
			<ul class="navbar-nav">
				<?php
						require_once '../assets/includes/DBHandler.php';
						$user_id = $_SESSION['useruid'];
						$sql = "SELECT usersType FROM users WHERE username = '".$user_id."' ";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						$usersType = $row["usersType"];

						if ($usersType == "Admin") {
							echo "<li class='nav-item'> <!-- Button trigger modal --> <a href='#' class='nav-link active icon-hover1' data-bs-toggle='modal' data-bs-target='#staticBackdrop' aria-current='page'> <!-- Icon in navbar --> <i class='fa-solid fa-user-gear fa-lg icon-color1'></i> <span class='fw-bold fa-lg text-info'> | </span> </a> </li>";
						}
				?>
				<li class="nav-item dropdown dropstart">
					<a href="#" class="nav-link active dropdown-toggle text-info icon-hover2" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- Icon in navbar -->
						<i class="fa-solid fa-users-viewfinder fa-lg text-light icon-color2"></i>
						<span class="fw-bold fa-lg text-info"> | </span>
					</a>
					<ul class="dropdown-menu shadow">
						<div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Instructor</div>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="../instructor_Add/">
								<!--Icon-->
								<i class="fa-solid fa-user-plus fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Add
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="../instructor_View/">
								<!--Icon-->
								<i class="fa-solid fa-id-card fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								View
							</a>
						</li>
						<li>
							<a href="../instructor_Sched/" class="dropdown-item ">
								<!--Icon-->
								<i class="fa-solid fa-clock fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Schedule
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item dropdown dropstart">
					<a href="#" class="nav-link active dropdown-toggle text-info icon-hover3" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- Icon in navbar -->
						<i class="fa-solid fa-graduation-cap fa-lg text-light icon-color3"></i>
						<span class="fw-bold fa-lg text-info"> | </span>
					</a>
					<ul class="dropdown-menu shadow">
						<div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Curriculum Management</div>
						<li>
							<hr class="dropdown-divider">
						</li>
						<!--
						<li>
							<a class="dropdown-item" href="../curriculumManagement_Curriculum/">
								Icon
								<i class="fa-solid fa-pen-to-square fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Curriculum
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="../curriculumManagement_CourseOffer/">
								Icon
								<i class="fa-solid fa-pen-to-square fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Course Offer
							</a>
						</li>
-->
						<li>
							<a class="dropdown-item" href="../curriculumManagement_CourseScheduling/">
								<!--Icon-->
								<i class="fa-solid fa-pen-to-square fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Course Schedule
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item dropdown dropstart">
					<a href="#" class="nav-link active dropdown-toggle text-info icon-hover4" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- Icon in navbar -->
						<i class="fa-solid fa-building fa-lg text-light icon-color4"></i>
						<span class="fw-bold fa-lg text-info"> | </span>
					</a>
					<ul class="dropdown-menu shadow">
						<div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Maintenance Management</div>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="../maintenanceManagement_Section/">
								<!--Icon-->
								<i class="fa-solid fa-gears fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Section
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="../maintenanceManagement_Room/">
								<!--Icon-->
								<i class="fa-solid fa-gears fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Room
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item dropdown dropstart">
					<a href="#" class="nav-link active dropdown-toggle text-info icon-hover5" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- Icon in navbar -->
						<i class="fa-solid fa-list fa-lg text-light icon-color5"></i>
						<span class="fw-bold fa-lg text-info"> | </span>
					</a>
					<ul class="dropdown-menu shadow">
						<div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Reports</div>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="../reports_Instructor/">
								<!--Icon-->
								<i class="fa-regular fa-clipboard fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Instructor
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="../reports_Schedule/">
								<!--Icon-->
								<i class="fa-regular fa-clipboard fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Schedule
							</a>
						</li>
						<!--
						<li>
							<a class="dropdown-item" href="#">
								<i class="fa-regular fa-envelope"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Email
							</a>
						</li>
-->
					</ul>
				</li>

				<li class="nav-item">
					<a class="nav-link active icon-hover6" href="../timeTable/">
						<!--Icon-->
						<i class="fa-solid fa-id-card-clip fa-lg icon-color6"></i>
						<span class="fw-bold fa-lg text-info"> | </span>
					</a>
				</li>

				<!-- navbar-item dropdown Start -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
					<!-- navbar-menu Start -->
					<ul class="dropdown-menu shadow" id="main-dropdown">
						<hr class="dropdown-divider">
						<!-- navbar-menu button -->
						<li class="dropdown dropstart sub-dropdown">
							<pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-users-viewfinder fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Instructor</span></a></pre>
							<ul class="dropdown-menu shadow sub-dropdown-menu">
								<li>
									<a class="dropdown-item" href="../instructor_Add/">
										<!--Icon-->
										<i class="fa-solid fa-user-plus"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Add
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="../instructor_View/">
										<!--Icon-->
										<i class="fa-solid fa-id-card"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										View
									</a>
								</li>
								<li>
									<a href="../instructor_Sched/" class="dropdown-item">
										<!--Icon-->
										<i class="fa-solid fa-clock"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Schedule
									</a>
								</li>
							</ul>
						</li>

						<hr class="dropdown-divider">

						<li class="dropdown dropstart sub-dropdown">
							<pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-graduation-cap fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Curriculum Management</span></a></pre>
							<ul class="dropdown-menu shadow sub-dropdown-menu-CM">
								<!--
								<li>
									<a class="dropdown-item" href="../curriculumManagement_Curriculum/">
										Icon
										<i class="fa-solid fa-pen-to-square"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Curriculum
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="../curriculumManagement_CourseOffer/">
										Icon
										<i class="fa-solid fa-pen-to-square"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Course Offer
									</a>
								</li>
-->
								<li>
									<a class="dropdown-item" href="../curriculumManagement_CourseScheduling/">
										<!--Icon-->
										<i class="fa-solid fa-pen-to-square"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Course Schedule
									</a>
								</li>
							</ul>
						</li>

						<hr class="dropdown-divider">

						<li class="dropdown dropstart sub-dropdown">
							<pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-building fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Maintenance Management</span></a></pre>
							<ul class="dropdown-menu shadow sub-dropdown-menu">
								<li>
									<a class="dropdown-item" href="../maintenanceManagement_Section/">
										<!--Icon-->
										<i class="fa-solid fa-gears"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Section
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="../maintenanceManagement_Room/">
										<!--Icon-->
										<i class="fa-solid fa-gears"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Room
									</a>
								</li>
							</ul>
						</li>

						<hr class="dropdown-divider">

						<li class="dropdown dropstart sub-dropdown">
							<pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-list fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Reports</span></a></pre>
							<ul class="dropdown-menu shadow sub-dropdown-menu">
								<li>
									<a class="dropdown-item" href="../reports_Instructor/">
										<!--Icon-->
										<i class="fa-regular fa-clipboard"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Instructor
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="../reports_Schedule/">
										<!--Icon-->
										<i class="fa-regular fa-clipboard"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Schedule
									</a>
								</li>
								<!--
								<li>
									<a class="dropdown-item" href="#">
										Icon
										<i class="fa-regular fa-envelope"></i>
										<span class="fw-bold fa-lg text-info"> | </span>
										Email
									</a>
								</li>
-->
							</ul>
						</li>

						<hr class="dropdown-divider">

						<li class="dropdown dropstart">
							<pre><a href="../timeTable/" class="dropdown-item text-info" aria-expanded="false">
                            <i class="fa-solid fa-id-card-clip fa-lg text-dark"></i><br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Timetable</span></a></pre>
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>

						<li class="text-end">
							<a class="dropdown-item rounded" href="../assets/includes/logout-inc.php" id="logout">
								<span class="fw-semibold">log out</span>
								<span class="fw-bold text-info">|</span>
								<i class="fa-solid fa-right-from-bracket fa-beat-fade"></i>
							</a>
						</li>
					</ul>
					<!-- navbar-menu End -->
				</li>
				<!-- navbar-item dropdown End -->
			</ul>
			<!-- End navbar-nav (unordered list) w/ nav-item (list item) -->
		</div>
	</nav>
	<!-- End navbar -->

	<?php
		// Modal Sign Up
		include_once '../signup/index.php';
	?>

	<!-- index file -->
	<div class="container-fluid">


	</div>
	<footer class="footer rounded-top bg-body-secondary">
		<div class="container d-flex justify-content-end">
			<small class="text-dark">Web-Dev. A K Pacris - Faculty Scheduling © 2022 - 2023</small>
		</div>
	</footer>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- JQuery JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<!-- DataTable JS -->
	<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

	<!-- Icon Hover -->
	<script>
		$(document).ready(function() {
			/* Icon-hover Start */
			$(".icon-hover1").hover(function() {
				$(".icon-color1").toggleClass('text-info');
				$(".icon-color1").toggleClass('fa-bounce');
			});

			$(".icon-hover2").hover(function() {
				$(".icon-color2").toggleClass('text-light');
				$(".icon-color2").toggleClass('fa-bounce');
			});

			$(".icon-hover3").hover(function() {
				$(".icon-color3").toggleClass('text-light');
				$(".icon-color3").toggleClass('fa-bounce');
			});

			$(".icon-hover4").hover(function() {
				$(".icon-color4").toggleClass('text-light');
				$(".icon-color4").toggleClass('fa-bounce');
			});

			$(".icon-hover5").hover(function() {
				$(".icon-color5").toggleClass('text-light');
				$(".icon-color5").toggleClass('fa-bounce');
			});

			$(".icon-hover6").hover(function() {
				$(".icon-color6").toggleClass('text-info');
				$(".icon-color6").toggleClass('fa-bounce');
			});

			$("#schoolName").hover(function() {
				$(".school-name").toggleClass('text-warning');
				$(".school-name").toggleClass('fa-bounce');
			});


			$("#logo").hover(function() {
				$(".logo-bounce").toggleClass('fa-bounce');
			});
			/* Icon-hover End */
		});

	</script>

	<!-- TOAST NOTIFICATION -->
	<div class="toast-container position-fixed top-0 end-0 p-3">
		<div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="d-flex">
				<div class="toast-body">
					<b>Success!</b>
				</div>
				<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
		</div>
	</div>

</body>

</html>
