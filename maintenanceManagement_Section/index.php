<?php 
    include_once '../navbar_headerfooter/headr.php';

	include_once '../assets/includes/DBHandler.php';
    $query ="SELECT ProgramCode FROM acad_program";
    $result = $conn->query($query);
    if($result->num_rows > 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
?>
<title>MM > Section</title>

<section class="container pt-3">
	<div class="row">

		<div class="col">
			<h3><i class="fa-solid fa-cubes fa-beat"></i> Section</h3>
		</div>

		<div class="col d-flex justify-content-end">
			<nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="../homepage/" class="text-dark" style="text-decoration: none;">
							<i class="fa fa-house"></i> Home
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Maintenance Management</li>
					<li class="breadcrumb-item active" aria-current="page">Section</li>
				</ol>
			</nav>
		</div>

		<hr>
	</div>
</section>

<div class="container pb-4">
	<div class="row">
		<!-- New Section Inputs -->
		<form class="col-4 me-4" id="myFormSection">
			<div class="col border rounded shadow p-2">
				<h5>New Section</h5>
				<hr />
				<div class="col pb-2">
					<label for="AcadProgram" class="form-label">Academic Program</label>
					<select class="form-select" id="AcadProgram" name="AcadProgram" required>
						<option value="">Select</option>
						<?php
						foreach ($options as $option){
						?>
						<option><?php echo $option['ProgramCode']; ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col pb-2">
					<label for="YearLevel" class="form-label">Year Level</label>
					<select class="form-select" id="YearLevel" name="YearLevel" required>
						<option value="">Select</option>
						<option>1st Year</option>
						<option>2nd Year</option>
						<option>3rd Year</option>
						<option>4th Year</option>
					</select>
				</div>

				<div class="col pb-2">
					<label for="Section" class="form-labe">Section <span id="DuplicateSection"></span></label>
					<input type="text" class="form-control" id="Section" name="Section" oninput="DuplicateSection();" required>
				</div>

				<div class="row row-cols-2 justify-content-center">
					<button type="submit" class="btn btn-success" id="SectionSubmit">Submit</button>
				</div>
			</div>

			<div class="col border rounded p-2 mt-5">
				Legend: <br>
				<div class="pb-2" style="display: inline-block;">
					<div style="width: 60px; height: 25px; background-color: #d1e7dd; border: 1px solid black; display: inline-block; vertical-align: middle;"></div>
					<span style="display: inline-block; vertical-align: middle;">- Section has not been used.</span>
				</div>
				<div style="display: inline-block;">
					<div style="width: 60px; height: 25px; background-color: #fff; border: 1px solid black; display: inline-block; vertical-align: middle;"></div>
					<span style="display: inline-block; vertical-align: middle;">- Section already used.</span>
				</div>
			</div>
		</form>

		<!-- DataTable -->
		<div class="col-lg-7 col-sm-12 border rounded shadow ms-5 p-2 ms-lg-4 mt-lg-0 ms-sm-4 mt-sm-4">
			<h5>List of Created Section</h5>
			<hr />
			<div id="DataTable_Section"></div>
		</div>
	</div>
</div>

<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

<script src="../assets/module_MM/function-event.js"></script>

<!-- Update Section Modal -->
<div class="modal fade" id="mmSectionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="myFormSecUpdate">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Update Section</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col pb-2">
						<label for="YearLevel_Update" class="form-label">Year Level</label>
						<select class="form-select" id="YearLevel_Update">
							<option selected="">Select</option>
							<option>1st Year</option>
							<option>2nd Year</option>
							<option>3rd Year</option>
							<option>4th Year</option>
						</select>
					</div>
					<div class="col">
						<label for="Section_Update" class="form-label">Section</label>
						<input type="text" class="form-control" id="Section_Update">
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" onclick="UpdateDataSection()" class="btn btn-primary">Update</button>
					<input type="hidden" id="hiddenID">
				</div>
			</form>
		</div>
	</div>
</div>


<!-- TOAST NOTIFICATION -->
<div class="toast-container position-fixed top-0 end-0 p-3">

</div>

<!-- TOAST NOTIFICATION -->
<div class="toast-container top-0 end-0 p-3">
	<div id="liveToastUpdate" class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Updated!</b>
			</div>
			<button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>

	<div id="liveToastSuccess" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Success!</b>
			</div>
			<button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>
