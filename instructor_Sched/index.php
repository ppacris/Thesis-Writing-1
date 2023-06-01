<?php
	include_once '../navbar_headerfooter/headr.php';
?>

<title>Instructor > Schedule</title>
<section class="container pt-3">
	<div class="row">
		<div class="col">
			<h3><i class="fa-solid fa-clock fa-beat"></i> Instructors Schedule</h3>
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
					<li class="breadcrumb-item active" aria-current="page">Schedule</li>
				</ol>
			</nav>
		</div>
		<hr>
	</div>
</section>


<div class="container pb-4">
	<div class=" row border shadow rounded">
		<h4 class="text-center bg-primary-subtle p-1">Set Instructors Schedule</h4>
		<form id="myFormSched" class="row pt-1">
			<div class="col">
				<div class="col border rounded shadow-sm p-4">
					<div class="col pb-3">
						<label for="EmployeeID" class="form-label">Employee</label>
						<?php
                        require_once '../assets/includes/DBHandler.php';
                        $query = "SELECT EmployeeID, Lname, Fname, MI, Suffix FROM instructor"; 
                        $result = mysqli_query($conn, $query);
                        echo "<select class='form-select' onInput='checkDuplicate()' id='EmpID' name='EmpID' required>";
                        echo "<option value='' disabled selected>Select</option>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value='".$row['EmployeeID']."'>[".$row['EmployeeID'].'] - '.$row['Lname'].', '.$row['Fname'].' '.$row['MI'].' '.$row['Suffix']."</option>";
						}
                        echo "</select>";
                    ?>
					</div>
				</div>
			</div>
			<div class="col pb-3">
				<div class="border rounded shadow-sm p-4">
					<label for="Day" class="form-label">Day</label>
					<select class="form-select" onInput="checkDuplicate()" id="Day" name="Day" required>
						<option value="" disabled selected>Select</option>
						<option value="Monday">Monday</option>
						<option value="Tuesday">Tuesday</option>
						<option value="Wednesday">Wednesday</option>
						<option value="Thursday">Thursday</option>
						<option value="Friday">Friday</option>
						<option value="Saturday">Saturday</option>
						<option value="Sunday">Sunday</option>
					</select>

					<hr />
					<div class="row mx-1 mb-2 justify-content-center">
						<div class="col-sm-6 pb-2">
							<label for="Time" class="form-label pt-1">Time:</label>
							<select class="form-select" id="Time" name="Time" oninput="checkDuplicate();" required>
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
						</div>
					</div>
					<span id="checkDuplicate"></span>
				</div>
				<div class="row row-cols-3 justify-content-end pt-4 pe-4">
					<button type="submit" class="btn btn-primary" id="submitSched"><b>Save</b></button>
				</div>
			</div>
		</form>
	</div>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

<script src="../assets/module_instructor/function-event.js"></script>
