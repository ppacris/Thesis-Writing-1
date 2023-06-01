<?php 
    include_once '../navbar_headerfooter/headr.php';
	include_once '../assets/includes/DBHandler.php';

    $query1 ="SELECT DISTINCT CurriculumYear FROM bscs ORDER BY CurriculumYear";
    $result1 = $conn->query($query1);
    if($result1->num_rows > 0){
      $options1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
	}

    $query2 ="SELECT DISTINCT Semester FROM bscs ORDER BY Semester";
    $result2 = $conn->query($query2);
    if($result2->num_rows > 0){
      $options2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	}

    $query3 ="SELECT DISTINCT YearLevel FROM bscs ORDER BY YearLevel";
    $result3 = $conn->query($query3);
    if($result3->num_rows > 0){
      $options3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
	}
?>

<title>Timetable</title>

<section class="container pt-3">
	<div class="row">
		<div class="col">
			<h3><i class="fa-solid fa-calendar-plus fa-beat"></i> Scheduling Process</h3>
		</div>

		<div class="col d-flex justify-content-end">
			<nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="../homepage/" class="text-dark" style="text-decoration: none;">
							<i class="fa fa-house"></i> Home
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Timetable</li>
				</ol>
			</nav>
		</div>
		<hr>
	</div>
</section>

<div class="container pb-2">
	<form id="myFormTimeTable">
		<div class="row border rounded shadow-sm pb-2">
			<h4 class="text-center bg-primary-subtle p-1">Program of Study</h4>
			<div class="col pt-1">
				<label for="SY" class="form-label">School Year</label>
				<select class="form-select" name="SY" id="SY" oninput="copySY()" required>
					<option value="">Select</option>
					<?php
						foreach ($options1 as $option1){
					?>
					<option value="<?= $option1['CurriculumYear']; ?>"><?= $option1['CurriculumYear']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col pt-1">
				<label for="YL" class="form-label">Semester</label>
				<select class="form-select" name="Sem" id="Sem" oninput="copySem()" required>
					<option value="">Select</option>
					<?php
						foreach ($options2 as $option2){
					?>
					<option value="<?= $option2['Semester']; ?>"><?= $option2['Semester']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col pt-1">
				<label for="YL" class="form-label">Year Level</label>
				<select class="form-select" name="YL" id="YL" oninput="copyYL()" required>
					<option value="">Select</option>
					<?php
						foreach ($options3 as $option3){
					?>
					<option value="<?= $option3['YearLevel']; ?>"><?= $option3['YearLevel']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="row col align-self-end me-1">
				<button type="submit" class="btn btn-primary" id="filterSubmit"><b>Search / Refresh</b></button>
			</div>
		</div>
	</form>
</div>

<form id="myFromSubjects" class="pb-3">
	<input type="text" id="hiddenID" name="hiddenID" hidden>
	<input type="text" id="SYCopy" name="SYCopy" hidden>
	<input type="text" id="SemCopy" name="SemCopy" hidden>
	<input type="text" id="YLCopy" name="YLCopy" hidden>

	<div class="row border rounded shadow-sm pb-2 mb-2 mx-5">
		<h4 class="text-center bg-primary-subtle p-1">Instructors Schedule</h4>
		<div class="col pt-1">
			<label for="Employee" class="form-label">Employee</label>
			<select class="form-select" id="Employee" required>
				<option value="" selected>Select</option>
				<?php
						require_once '../assets/includes/DBHandler.php';
						$query = "SELECT DISTINCT EmployeeID, FullName FROM instructor_sched ORDER BY EmployeeID";
						$result = mysqli_query($conn, $query);
						while ($row = mysqli_fetch_array($result)){
					?>
				<option value="<?= $row['EmployeeID']; ?>">[<?= $row['EmployeeID']; ?>] - <?= $row['FullName']; ?></option>
				<?php }?>
			</select>
		</div>
		<div class="col pt-1">
			<label for="Day" class="form-label">Day</label>
			<select class="form-select" id="Day" required>
				<option value="" selected>Select</option>
			</select>
		</div>
		<div class="col pt-1">
			<label for="Time" class="form-label">Time</label>
			<select class="form-select" id="Time" required>
				<option value="" selected>Select</option>
			</select>
		</div>
	</div>

	<div class="row border shadow rounded mx-1 py-2">
		<h4>Subjects...</h4>
		<div id="filtertimeTable"></div>
	</div>
</form>

<!-- Decision Notification Modal -->
<div class="modal fade" id="DecisionNotif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form id="myFormYesOrNo">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<center>
						<p id="readNotif"></p>
					</center>
					<input type="text" id="hiddenIDCopy" name="hiddenIDCopy" hidden>
					<input type="text" id="EmployeeIDCopy" name="EmployeeIDCopy" hidden>
					<input type="text" id="ProfCopy" name="ProfCopy" hidden>
				</div>
				<div class="modal-footer d-flex justify-content-between">
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="yesUpdate">Yes</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

<script src="../assets/module_TT/function-event.js"></script>

<script type="text/javascript">
	function copyEmployee() {
		$("#Employee").change(function() {
			var selectedValue = $(this).val();
			$("#EmployeeCopy").val(selectedValue);
		});
	}

	function copyDay() {
		$("#Day").change(function() {
			var selectedValue = $(this).val();
			$("#DayCopy").val(selectedValue);
		});
	}

	function copyTime() {
		$("#Time").change(function() {
			var selectedValue = $(this).val();
			$("#TimeCopy").val(selectedValue);
		});
	}

	function copySY() {
		$("#SY").change(function() {
			var selectedValue = $(this).val();
			$("#SYCopy").val(selectedValue);
		});
	}

	function copySem() {
		$("#Sem").change(function() {
			var selectedValue = $(this).val();
			$("#SemCopy").val(selectedValue);
		});
	}

	function copyYL() {
		$("#YL").change(function() {
			var selectedValue = $(this).val();
			$("#YLCopy").val(selectedValue);
		});
	}

</script>

<!-- TOAST NOTIFICATION -->
<div class="toast-container top-0 end-0 p-3">
	<div id="liveToastUpdate" class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Updated! Refreshing data...</b>
			</div>
			<button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>

	<div id="liveToastRefresh" class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Search / Refresh</b>
			</div>
			<button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>
