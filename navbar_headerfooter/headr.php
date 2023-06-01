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
	<link href="../assets/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
	<!-- DataTable CSS	-->
	<link rel="stylesheet" href="../assets/dataTablesCSS/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/dataTablesCSS/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="../assets/dataTablesCSS/buttons.bootstrap5.min.css">


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

	@media (min-width: 1280px) {
		#main-dropdown {
			left: calc(-670%);
		}

		.sub-dropdown-menu {
			top: calc(7%);
			left: calc(-68.1%);
		}

		.sub-dropdown-menu-CM {
			top: calc(7%);
			left: calc(-80.2%);
		}
	}

	#logout:hover {
		background-color: #dc3545;
		transition: background-color .8s ease-out;
	}

	#thesisTitle {
		position: relative;
	}

	#thesisTitle::before {
		background: #212529;
		content: "";
		inset: 0;
		position: absolute;
		transform: scaleX(0);
		transform-origin: right;
		z-index: -1;
		transition: transform 0.5s ease-in-out;
	}

	#thesisTitle:hover {
		color: white;
	}

	#thesisTitle:hover::before {
		transform: scaleX(1);
		transform-origin: left;
	}

	.nav-link,
	.school-name,
	#about,
	.card {
		transition: transform 250ms;
	}

	.nav-link:hover,
	.school-name:hover,
	#about:hover,
	.card:hover {
		transform: translateY(-10px);
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
						<li>
							<a class="dropdown-item" href="../curriculumManagement_CourseScheduling/">
								<!--Icon-->
								<i class="fa-solid fa-pen-to-square fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Course Schedule
							</a>
						</li>
						<li>
							<a class="dropdown-item btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
								<!--Icon-->
								<i class="fa-solid fa-pen-to-square fa-lg"></i>
								<span class="fw-bold fa-lg text-info"> | </span>
								Excel Worksheet
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
						<div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Report</div>
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
								<span class="fw-semibold text-above">log out</span>
								<span class="fw-bold text-info text-above">|</span>
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
