<?php
	require_once '../assets/includes/authen-check.php';
?>

<!-- Modal Update -->
<div class="modal fade modal-xl" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="myFormUpdate">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Update Instructor Record</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row border rounded shadow mb-4">
						<div class="col-md-12">
							<div class="row mb-3 mt-2">
								<div class="col-3">
									<label for="EmpID" class="form-label">Employee ID</label>
									<input type="text" class="form-control" placeholder="Employee ID" id="EmpID" name="EmpID">
								</div>
								<div class="col-9">
									<label for="EmpEmail" class="form-label">Email</label>
									<input type="email" class="form-control" placeholder="Email Address" id="EmpEmail" name="EmpEmail">
								</div>
							</div>

							<div class="row border shadow-sm rounded mx-1 pb-2 mb-3">
								<label for="EmpLname" class="form-label pt-1">Full name</label>
								<div class="col-lg col-md-4 col-sm-5 pb-2">
									<input type="text" class="form-control" placeholder="Last name" id="EmpLname" name="EmpLname">
								</div>
								<div class="col-lg col-md-4 col-sm-5">
									<input type="text" class="form-control" placeholder="First name" id="EmpFname" name="EmpFname">
								</div>
								<div class="col-lg col-md-4 col-sm-2">
									<input type="text" class="form-control" placeholder="M.I" id="EmpMI" name="EmpMI">
								</div>
								<div class="col-lg-1 col-md-2 col-sm-3">
									<input type="text" class="form-control" placeholder="Suffix" id="EmpSuffix" name="EmpSuffix">
								</div>
							</div>

							<div class="row border shadow-sm rounded mx-1 pb-2 mb-3 justify-content-center">
								<label for="EmpStAddress" class="form-label pt-1">Address</label>
								<div class="col-sm-6 pb-2">
									<input type="text" class="form-control" placeholder="Street address" id="EmpStAddress" name="EmpStAddress" required>
								</div>
								<div class="col-sm-6 pb-2">
									<input type="text" class="form-control" placeholder="Barangay" id="EmpBrgy" name="EmpBrgy" required>
								</div>
								<div class="col-sm-6 pb-2">
									<input type="text" class="form-control" placeholder="Municipality / City" id="EmpCity" name="EmpCity" required>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Province" id="EmpProvince" name="EmpProvince" required>
								</div>
							</div>
						</div>
					</div>

					<div class="row border rounded shadow">
						<h4 class="pt-2">Other Information</h4>
						<hr>
						<div class="col-md-12">
							<div class="row mb-3">
								<div class="col">
									<label for="EmpDegree" class="form-label">Degree</label>
									<select class="form-select" id="EmpDegree" name="EmpDegree" required>
										<option value="" disabled selected></option>
										<option value="BS Computer Science">BS Computer Science</option>
										<option value="BS Information Technology">BS Information Technology</option>
									</select>
								</div>
								<div class="col">
									<label for="EmpDeptartment" class="form-label">Department</label>
									<select class="form-select" id="EmpDeptartment" name="EmpDeptartment" required>
										<option value="" disabled selected></option>
										<option value="IT">IT</option>
										<option value="ACCOUNTING">ACCOUNTING</option>
									</select>
								</div>
								<div class="col">
									<label for="EmpStatus" class="form-label">Employee Status</label>
									<select class="form-select" id="EmpStatus" name="EmpStatus" required>
										<option value="" disabled selected></option>
										<option value="Full Time">Full Time</option>
										<option value="Part Time">Part Time</option>
									</select>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="liveToastBtnUpdate" onclick="UpdateData()">Update</button>
					<input type="text" id="hiddenID" name="hiddenID" hidden>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- TOAST NOTIFICATION -->
<div class="toast-container position-fixed top-0 end-0 p-3">
	<div id="liveToastUpdate" class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Updated!</b>
			</div>
			<button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>
