<?php 
    include_once '../navbar_headerfooter/headr.php';
	include_once '../assets/includes/DBHandler.php';

    $query1 ="SELECT DISTINCT Prof FROM bscs WHERE Prof IS NOT NULL AND Prof != '' ORDER BY Prof";
    $result1 = $conn->query($query1);
    if($result1->num_rows > 0){
      $options1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
	}

    $query2 ="SELECT DISTINCT Semester FROM bscs ORDER BY Semester";
    $result2 = $conn->query($query2);
    if($result2->num_rows > 0){
      $options2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	}
?>

<title>Reports > Instructor</title>
<style type="text/css">
	#filterProf1_wrapper .row:nth-child(2) {
		padding-bottom: 0.5rem;
	}

</style>
<section class="container pt-3">
	<div class="row">
		<div class="col">
			<h3><i class="fa-solid fa-calendar-check fa-beat"></i> Instructor Schedule </h3>
		</div>
		<div class="col d-flex justify-content-end">
			<nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="../homepage/" class="text-dark" style="text-decoration: none;">
							<i class="fa fa-house"></i> Home
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Reports</li>
					<li class="breadcrumb-item active" aria-current="page">Instructor</li>
				</ol>
			</nav>
		</div>
		<hr>
	</div>
</section>

<div class="container pb-3">
	<form id="myFormProf">
		<div class="row col-11 ms-5 border rounded shadow-sm pb-2">
			<h4 class="text-center bg-primary-subtle p-1">Instructors Schedule</h4>
			<div class="col pt-1">
				<label for="Employee" class="form-label">Employee</label>
				<select class="form-select" name="Employee" id="Employee" required>
					<option value="">Select</option>
					<?php
						foreach ($options1 as $option1){
					?>
					<option value="<?= $option1['Prof']; ?>"><?= $option1['Prof']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col pt-1">
				<label for="Sem" class="form-label">Semester</label>
				<select class="form-select" name="Sem" id="Sem" required>
					<option value="">Select</option>
					<?php
						foreach ($options2 as $option2){
					?>
					<option value="<?= $option2['Semester']; ?>"><?= $option2['Semester']; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="row col align-self-end me-1">
				<button type="submit" class="btn btn-primary"><b>Search</b></button>
			</div>
		</div>
	</form>
</div>

<input type="text" id="email" name="email" hidden>

<div class="pb-3">
	<div class="row border shadow rounded mx-1 py-2">
		<h4>Schedule ...</h4>
		<div id="filterProf"></div>
	</div>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
?>
<!-- functions -->
<script src="../assets/module_Reports/function-event.js"></script>
<!-- html2canvas JS -->
<script src="../assets/dataTablesJS/html2canvas.min.js"></script>
<!-- DataTable JS -->
<script src="../assets/dataTablesJS/dataTables.buttons.min.js"></script>
<script src="../assets/dataTablesJS/buttons.bootstrap5.min.js"></script>
<script src="../assets/dataTablesJS/jszip.min.js"></script>
<script src="../assets/dataTablesJS/pdfmake.min.js"></script>
<script src="../assets/dataTablesJS/vfs_fonts.js"></script>
<script src="../assets/dataTablesJS/buttons.html5.min.js"></script>
<script src="../assets/dataTablesJS/buttons.print.min.js"></script>
<script src="../assets/dataTablesJS/buttons.colVis.min.js"></script>
