<?php 
	include_once '../navbar_headerfooter/headr.php';
?>
<title>Instructor > View</title>

<section class="container pt-3">
	<div class="row">
		<div class="col">
			<h3><i class="fa-solid fa-address-book fa-beat"></i> List of Instructors</h3>
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
					<li class="breadcrumb-item active" aria-current="page">View</li>
				</ol>
			</nav>
		</div>
		<hr>
	</div>
</section>

<div class="container pb-3">
	<div class="row border shadow rounded">
		<h4 class="text-center bg-primary-subtle p-1">Instructors Data</h4>
		<div class="col pb-3 pt-1">
			<!-- DataTabale -->
			<div id="DataTable_InstructorView"></div>
		</div>
	</div>
</div>

<!-- Decision Notification Modal -->
<div class="modal fade" id="DeleteNotif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form id="myFormDelYesOrNo">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<center>
						<p id="readNotif"></p>
					</center>
					<input type="text" id="EmployeeIDCopy" name="EmployeeIDCopy" hidden>
				</div>
				<div class="modal-footer d-flex justify-content-between">
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="yesDelete">Yes</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</form>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
	// Modal Update
	include_once '../instructor_Update/index.php';
?>

<script src="../assets/module_instructor/function-event.js"></script>

<!-- TOAST NOTIFICATION -->
<div class="toast-container top-0 end-0 p-3">
	<div id="liveToastDel" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Deleted! Record.</b>
			</div>
			<button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>
