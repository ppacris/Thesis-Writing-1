<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Instructor > Add</title>

<section class="container pt-3">
	<div class="row">
		<div class="col">
			<h3><i class="fa fa-user-plus fa-beat"></i> Add New Instructor</h3>
		</div>

		<div class="col d-flex justify-content-end">
			<nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="../homepage/" class="text-dark" style="text-decoration: none;">
							<i class="fa fa-house"></i> Home
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Instructor</li>
					<li class="breadcrumb-item active" aria-current="page">Add</li>
				</ol>
			</nav>
		</div>
		<hr>
	</div>
</section>

<div class="container pb-4">
	<form id="myFormAdd" method="post">
		<div class="row border rounded shadow mb-4">
			<h4 class="text-center bg-primary-subtle p-1">Personal Information</h4>
			<div class="col-md-12 pt-1">
				<div class="row mb-3">
					<div class="col-3">
						<label for="EpmloyeeID" class="form-label">Employee ID <span id="DuplicateEmpID"></span></label>
						<input type="text" class="form-control" placeholder="Employee ID" onInput="DuplicateEmpID()" id="EmployeeID" name="EmployeeID" required>
					</div>
					<div class="col-9">
						<label for="EmployeeEmail" class="form-label">Email</label>
						<input type="email" class="form-control" placeholder="Email Address" id="EmployeeEmail" name="EmployeeEmail" required>
					</div>
				</div>

				<div class="row border shadow-sm rounded mx-1 pb-2 mb-3">
					<label for="Lname" class="form-label pt-1">Full name</label>
					<div class="col-lg col-md-4 col-sm-5 pb-2">
						<input type="text" class="form-control" placeholder="Last name" id="Lname" name="Lname" required>
					</div>
					<div class="col-lg col-md-4 col-sm-5">
						<input type="text" class="form-control" placeholder="First name" id="Fname" name="Fname" required>
					</div>
					<div class="col-lg col-md-4 col-sm-2">
						<input type="text" class="form-control" placeholder="M.I" id="MI" name="MI" required>
					</div>
					<div class="col-lg-1 col-md-2 col-sm-3">
						<input type="text" class="form-control" placeholder="Suffix" id="Suffix" name="Suffix">
					</div>
				</div>

				<div class="row border shadow-sm rounded mx-1 pb-2 mb-3 justify-content-center">
					<label for="StAddress" class="form-label pt-1">Address</label>
					<div class="col-sm-6 pb-2">
						<input type="text" class="form-control" placeholder="Street address" id="StAddress" name="StAddress">
					</div>
					<div class="col-sm-6 pb-2">
						<input type="text" class="form-control" placeholder="Barangay" id="Brgy" name="Brgy" required>
					</div>
					<div class="col-sm-6 pb-2">
						<input type="text" class="form-control" placeholder="Municipality / City" id="City" name="City" required>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Province" id="Province" name="Province" required>
					</div>
				</div>
			</div>
		</div>

		<!-- Other Information -->
		<div class="row border rounded shadow mb-4">
			<h4 class="pt-2">Other Information</h4>
			<hr>
			<div class="col-md-12">
				<div class="row mb-3">
					<div class="col">
						<label for="Degree" class="form-label">Degree</label>
						<select class="form-select" id="Degree" name="Degree" required>
							<option value="" disabled selected>Select</option>
							<option value="BS Computer Science">BS Computer Science</option>
							<option value="BS Information Technology">BS Information Technology</option>
						</select>
					</div>
					<div class="col">
						<label for="Department" class="form-label">Department</label>
						<select class="form-select" id="Department" name="Department" required>
							<option value="" disabled selected>Select</option>
							<option value="IT">IT</option>
						</select>
					</div>
					<div class="col">
						<label for="EmployeeStatus" class="form-label">Employee Status</label>
						<select class="form-select" id="EmployeeStatus" name="EmployeeStatus" required>
							<option value="" disabled selected>Select</option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<!-- Button Save -->
		<div class="row row-cols-3 justify-content-end">
			<button type="submit" class="btn btn-primary" id="submitAdd"><b>Save</b></button>
		</div>
	</form>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

<!-- Instructor-JS -->
<script src="../assets/module_instructor/function-event.js"></script>
