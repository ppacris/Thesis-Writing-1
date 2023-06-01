<?php 
    include_once '../navbar_headerfooter/headr.php';

    $query1 ="SELECT DISTINCT Room FROM room ORDER BY Room";
    $result1 = $conn->query($query1);
    if($result1->num_rows > 0){
      $options1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
	}

    $query2 ="SELECT DISTINCT SectionName FROM section ORDER BY SectionName";
    $result2 = $conn->query($query2);
    if($result2->num_rows > 0){
      $options2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	}
?>
<title>CM > Course Scheduling</title>

<section class="container pt-3">
	<div class="row">
		<div class="col">
			<h3><i class="fa-solid fa-calendar-days fa-beat"></i> Course Scheduling</h3>
		</div>
		<div class="col d-flex justify-content-end">
			<nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="../homepage/" class="text-dark" style="text-decoration: none;">
							<i class="fa fa-house"></i> Home
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Corriculum Management</li>
					<li class="breadcrumb-item active" aria-current="page">Course Scheduling</li>
				</ol>
			</nav>
		</div>

		<hr>
	</div>
</section>

<div class="container pb-4">
	<div class="row border rounded shadow pb-2">
		<h4 class="text-center bg-primary-subtle p-1">Scheduling Form</h4>
		<form method="POST" id="myForm">
			<div class="row">
				<div class="row row-cols-3 ms-1 mb-2">
					<div class="col">
						<label for="a" class="form-label">Curriculum Year</label>
						<input type="text" class="form-control mb-2" id="a" name="a" oninput="ConflictSched(); ConflictRoom();" required>
					</div>
					<div class="col">
						<label for="b" class="form-label">Semester</label>
						<select class="form-select mb-2" name="b" id="b" oninput="ConflictSched(); ConflictRoom();" required>
							<option value="">Select</option>
							<option value="1st Semester">1st Semester</option>
							<option value="2nd Semester">2nd Semester</option>
						</select>
					</div>
					<div class="col">
						<label for="c" class="form-label">Year Level</label>
						<select class="form-select mb-2" name="c" id="c" oninput="ConflictSched();" required>
							<option value="">Select</option>
							<option value="1st Year">1st Year</option>
							<option value="2nd Year">2nd Year</option>
							<option value="3rd Year">3rd Year</option>
							<option value="4th Year">4th Year</option>
						</select>
					</div>
				</div>

				<div class="col-6">
					<label for="d" class="form-label">Course Code <span id="DuplicateCC"></span></label>
					<input type="text" class="form-control mb-2" id="d" name="d" required>

					<label for="e" class="form-label">Course Name</label>
					<input type="text" class="form-control mb-2" id="e" name="e" required>

					<label for="f" class="form-label">Lec</label>
					<input type="text" class="form-control mb-2" id="f" name="f" oninput="sum()" required>

					<label for="g" class="form-label">Lab</label>
					<input type="text" class="form-control mb-2" id="g" name="g" oninput="sum()">

					<label for="h" class="form-label">Units</label>
					<input type="text" class="form-control mb-2" id="h" name="h" required>
				</div>

				<div class="col-6">
					<label for="i" class="form-label">Pre Requisite</label>
					<input type="text" class="form-control mb-2" id="i" name="i" required>

					<label for="j" class="form-label">Day <span class="Conflict"></span></label>
					<select class="form-select mb-2" id="j" name="j" oninput="ConflictSched(); ConflictRoom();" required>
						<option value="">Select</option>
						<option value="Monday">Monday</option>
						<option value="Tuesday">Tuesday</option>
						<option value="Wednesday">Wednesday</option>
						<option value="Thursday">Thursday</option>
						<option value="Friday">Friday</option>
						<option value="Saturday">Saturday</option>
						<option value="Sunday">Sunday</option>
					</select>

					<label for="k" class="form-label">Time <span class="Conflict"></span></label>
					<select class="form-select mb-2" id="k" name="k" oninput="ConflictSched(); ConflictRoom();" required>
						<option value="">Select</option>
						<option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
						<option value="7:00 AM - 8:30 AM">7:00 AM - 8:30 AM</option>
						<option value="7:00 AM - 9:00 AM">7:00 AM - 9:00 AM</option>
						<option value="7:00 AM - 10:00 AM">7:00 AM - 10:00 AM</option>
						<option value="7:30 AM - 8:30 AM">7:30 AM - 8:30 AM</option>
						<option value="7:30 AM - 9:00 AM">7:30 AM - 9:00 AM</option>
						<option value="7:30 AM - 9:30 AM">7:30 AM - 9:30 AM</option>
						<option value="7:30 AM - 10:30 AM">7:30 AM - 10:30 AM</option>
						<option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
						<option value="8:00 AM - 9:30 AM">8:00 AM - 9:30 AM</option>
						<option value="8:00 AM - 10:00 AM">8:00 AM - 10:00 AM</option>
						<option value="8:00 AM - 11:00 AM">8:00 AM - 11:00 AM</option>
						<option value="8:30 AM - 9:30 AM">8:30 AM - 9:30 AM</option>
						<option value="8:30 AM - 10:00 AM">8:30 AM - 10:00 AM</option>
						<option value="8:30 AM - 10:30 AM">8:30 AM - 10:30 AM</option>
						<option value="8:30 AM - 11:30 AM">8:30 AM - 11:30 AM</option>
						<option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
						<option value="9:00 AM - 10:30 AM">9:00 AM - 10:30 AM</option>
						<option value="9:00 AM - 11:00 AM">9:00 AM - 11:00 AM</option>
						<option value="9:00 AM - 12:00 PM">9:00 AM - 12:00 PM</option>
						<option value="9:30 AM - 10:30 AM">9:30 AM - 10:30 AM</option>
						<option value="9:30 AM - 11:00 AM">9:30 AM - 11:00 AM</option>
						<option value="9:30 AM - 11:30 AM">9:30 AM - 11:30 AM</option>
						<option value="9:30 AM - 12:30 PM">9:30 AM - 12:30 PM</option>
						<option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
						<option value="10:00 AM - 11:30 AM">10:00 AM - 11:30 AM</option>
						<option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
						<option value="10:00 AM - 1:00 PM">10:00 AM - 1:00 PM</option>
						<option value="10:30 AM - 11:30 AM">10:30 AM - 11:30 AM</option>
						<option value="10:30 AM - 12:00 PM">10:30 AM - 12:00 PM</option>
						<option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
						<option value="10:30 AM - 1:30 PM">10:30 AM - 1:30 PM</option>
						<option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
						<option value="11:00 AM - 12:30 PM">11:00 AM - 12:30 PM</option>
						<option value="11:00 AM - 1:00 PM">11:00 AM - 1:00 PM</option>
						<option value="11:00 AM - 2:00 PM">11:00 AM - 2:00 PM</option>
						<option value="11:30 AM - 12:30 PM">11:30 AM - 12:30 PM</option>
						<option value="11:30 AM - 1:00 PM">11:30 AM - 1:00 PM</option>
						<option value="11:30 AM - 1:30 PM">11:30 AM - 1:30 PM</option>
						<option value="11:30 AM - 2:30 PM">11:30 AM - 2:30 PM</option>
						<option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
						<option value="12:00 PM - 1:30 PM">12:00 PM - 1:30 PM</option>
						<option value="12:00 PM - 2:00 PM">12:00 PM - 2:00 PM</option>
						<option value="12:00 PM - 3:00 PM">12:00 PM - 3:00 PM</option>
						<option value="12:30 PM - 1:30 PM">12:30 PM - 1:30 PM</option>
						<option value="12:30 PM - 2:00 PM">12:30 PM - 2:00 PM</option>
						<option value="12:30 PM - 2:30 PM">12:30 PM - 2:30 PM</option>
						<option value="12:30 PM - 3:30 PM">12:30 PM - 3:30 PM</option>
						<option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
						<option value="1:00 PM - 2:30 PM">1:00 PM - 2:30 PM</option>
						<option value="1:00 PM - 3:00 PM">1:00 PM - 3:00 PM</option>
						<option value="1:00 PM - 4:00 PM">1:00 PM - 4:00 PM</option>
						<option value="1:30 PM - 2:30 PM">1:30 PM - 2:30 PM</option>
						<option value="1:30 PM - 3:00 PM">1:30 PM - 3:00 PM</option>
						<option value="1:30 PM - 3:30 PM">1:30 PM - 3:30 PM</option>
						<option value="1:30 PM - 4:30 PM">1:30 PM - 4:30 PM</option>
						<option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
						<option value="2:00 PM - 3:30 PM">2:00 PM - 3:30 PM</option>
						<option value="2:00 PM - 4:00 PM">2:00 PM - 4:00 PM</option>
						<option value="2:00 PM - 5:00 PM">2:00 PM - 5:00 PM</option>
						<option value="2:30 PM - 3:30 PM">2:30 PM - 3:30 PM</option>
						<option value="2:30 PM - 4:00 PM">2:30 PM - 4:00 PM</option>
						<option value="2:30 PM - 4:30 PM">2:30 PM - 4:30 PM</option>
						<option value="2:30 PM - 5:30 PM">2:30 PM - 5:30 PM</option>
						<option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
						<option value="3:00 PM - 4:30 PM">3:00 PM - 4:30 PM</option>
						<option value="3:00 PM - 5:00 PM">3:00 PM - 5:00 PM</option>
						<option value="3:00 PM - 6:00 PM">3:00 PM - 6:00 PM</option>
						<option value="3:30 PM - 4:30 PM">3:30 PM - 4:30 PM</option>
						<option value="3:30 PM - 5:00 PM">3:30 PM - 5:00 PM</option>
						<option value="3:30 PM - 5:30 PM">3:30 PM - 5:30 PM</option>
						<option value="3:30 PM - 6:30 PM">3:30 PM - 6:30 PM</option>
						<option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
						<option value="4:00 PM - 5:30 PM">4:00 PM - 5:30 PM</option>
						<option value="4:00 PM - 7:00 PM">4:00 PM - 7:00 PM</option>
						<option value="4:00 PM - 7:30 PM">4:00 PM - 7:30 PM</option>
						<option value="4:30 PM - 5:30 PM">4:30 PM - 5:30 PM</option>
						<option value="4:30 PM - 6:00 PM">4:30 PM - 6:00 PM</option>
						<option value="4:30 PM - 6:30 PM">4:30 PM - 6:30 PM</option>
						<option value="4:30 PM - 7:30 PM">4:30 PM - 7:30 PM</option>
						<option value="5:00 PM - 6:00 PM">5:00 PM - 6:00 PM</option>
						<option value="5:00 PM - 6:30 PM">5:00 PM - 6:30 PM</option>
						<option value="5:00 PM - 7:00 PM">5:00 PM - 7:00 PM</option>
						<option value="5:00 PM - 8:00 PM">5:00 PM - 8:00 PM</option>
						<option value="5:30 PM - 6:30 PM">5:30 PM - 6:30 PM</option>
						<option value="5:30 PM - 7:00 PM">5:30 PM - 7:00 PM</option>
						<option value="5:30 PM - 7:30 PM">5:30 PM - 7:30 PM</option>
						<option value="6:00 PM - 7:00 PM">6:00 PM - 7:00 PM</option>
						<option value="6:00 PM - 7:30 PM">6:00 PM - 7:30 PM</option>
						<option value="6:00 PM - 8:00 PM">6:00 PM - 8:00 PM</option>
						<option value="6:30 PM - 7:30 PM">6:30 PM - 7:30 PM</option>
						<option value="6:30 PM - 8:00 PM">6:30 PM - 8:00 PM</option>
						<option value="7:00 PM - 8:00 PM">7:00 PM - 8:00 PM</option>
					</select>

					<label for="l" class="form-label">Room <span class="Conflict" id="ComflictRoom"></span></label>
					<select class="form-select mb-2" name="l" id="l" oninput="ConflictSched(); ConflictRoom();" required>
						<option value="">Select</option>
						<?php
							foreach ($options1 as $option1){
						?>
						<option value="<?= $option1['Room']; ?>"><?= $option1['Room']; ?></option>
						<?php } ?>
					</select>

					<label for="m" class="form-label">Section <span class="Conflict"></span></label>
					<select class="form-select mb-2" name="m" id="m" oninput="ConflictSched(); ConflictSecSched();" required>
						<option value="">Select</option>
						<?php
							foreach ($options2 as $option2){
						?>
						<option value="<?= $option2['SectionName']; ?>"><?= $option2['SectionName']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" id="liveToastBtn" hidden></button>
		</form>
	</div>
	<div class="row row-cols-3 justify-content-center pt-4">
		<button type="submit" class="btn btn-primary" id="btn2"><b>SAVE</b></button>
	</div>
</div>

<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

<!-- OFFCANVAS -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
	<div class="offcanvas-header d-flex justify-content-end">
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<h5 class="text-center bg-primary-subtle p-1">Schedule Excel File</h5>
		<form id="myFormoffcanvas" method="post" enctype="multipart/form-data" class="pt-1">
			<input type="file" class="form-control mb-2" id="file" name="file">
			<button type="submit" class="btn btn-primary" id="liveToastBtnExcel">Upload</button>
		</form>
	</div>
</div>

<script src="../assets/module_CM/function-event.js"></script>

<script type="text/javascript">
	$("#btn2").on("click", function() {
		// Trigger the click event of the first button using jQuery
		$("#liveToastBtn").click();
	});

	function sum() {
		var f = parseFloat($("#f").val());
		var g = parseFloat($("#g").val());
		var sum = f + g;
		$("#h").val(sum);
	}

</script>

<!-- TOAST NOTIFICATION -->
<div class="toast-container position-fixed top-0 end-0 p-3">
	<div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<svg id="svg-icon" role="img" aria-label="Success:">
					<use xlink:href="#check-circle-fill"></use>
				</svg>
				<b>Success!</b>
			</div>
			<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>
