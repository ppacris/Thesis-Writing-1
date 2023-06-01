<?php
	require_once '../assets/includes/authen-check.php';
?>

<!-- Modal Sign up -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
					<span>
						<!--Icon-->
						<i class="fa-solid fa-circle-plus fa-beat"></i>
					</span>
					Register
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- Form Start -->
			<form action="../assets/includes/signup-inc.php" method="post">
				<div class="modal-body">

					<!-- input-group -->
					<div class="input-group mb-2">
						<span class="input-group-text">
							<!--Icon-->
							<i class="fa-solid fa-user-tie fa-lg"></i>
						</span>
						<input type="text" class="form-control" placeholder="Username" required name="Uname">
					</div>
					<div class="row g-2">
						<!-- input-group -->
						<div class="col input-group mb-2">
							<span class="input-group-text">
								<!--Icon-->
								<i class="fa-solid fa-user fa-lg"></i>
							</span>
							<input type="text" class="form-control" placeholder="Last name" required name="ULname">
						</div>
						<!--input-group-->
						<div class="col input-group mb-2">
							<span class="input-group-text">
								<!--Icon-->
								<i class="fa-solid fa-user fa-lg"></i>
							</span>
							<input type="text" class="form-control" placeholder="First name" required name="UFname">
						</div>
					</div>
					<!-- input-group -->
					<div class="input-group mb-2">
						<span class="input-group-text">
							<!--Icon-->
							<i class="fa-solid fa-key fa-lg"></i>
						</span>
						<input type="password" class="form-control" placeholder="Password" required name="Upwd">
					</div>
					<!-- input-group -->
					<div class="input-group mb-2">
						<span class="input-group-text">
							<!--Icon-->
							<i class="fa-solid fa-key fa-lg"></i>
						</span>
						<input type="password" class="form-control" placeholder="Repeat password" required name="Upwdrepeat">
					</div>
					<!-- select -->
					<div class="row mb-2">
						<div class="col-sm-3 d-flex justify-content-center align-items-center fw-bold">
							User Level :
						</div>
						<div class="col-sm-9">
							<select class="form-select" name="Utype">
								<option value="Admin">Admin</option>
								<option value="Scheduler">Scheduler</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><b>Close</b></button>
					<button type="submit" class="btn btn-outline-primary" name="submit"><b>Save</b></button>
				</div>
			</form>
			<!-- Form End -->
		</div>
	</div>
</div>
