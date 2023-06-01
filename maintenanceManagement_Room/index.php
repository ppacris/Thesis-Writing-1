<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>MM > Room</title>

<section class="container pt-3">
	<div class="row">

		<div class="col">
			<h3><i class="fa-solid fa-cubes fa-beat"></i> Room</h3>
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
					<li class="breadcrumb-item active" aria-current="page">Room</li>
				</ol>
			</nav>
		</div>

		<hr>
	</div>
</section>

<div class="container pb-4">
	<div class="row">
		<!-- New Room Inputs -->
		<form class="col-4 me-4" id="myFormRoom">
			<div class="col border rounded shadow p-2">
				<h5>New Room</h5>
				<hr />
				<div class="col pb-2">
					<label for="Room" class="form-label">Room <span id="DuplicateRoom"></span></label>
					<input type="text" class="form-control" id="Room" name="Room" oninput="DuplicateRoom();" required>

				</div>


				<div class="col pb-2">
					<label for="Floor" class="form-label">Floor</label>
					<input type="text" class="form-control" id="Floor" name="Floor" required>
				</div>

				<div class="col pb-2">
					<label for="Description" class="form-labe">Description</label>
					<input type="text" class="form-control" id="Description" name="Description" required>
				</div>

				<div class="row row-cols-2 justify-content-center">
					<button type="submit" class="btn btn-success" id="RoomSubmit">Submit</button>
				</div>
			</div>

			<div class="col border rounded p-2 mt-5">
				Legend: <br>
				<div class="pb-2" style="display: inline-block;">
					<div style="width: 60px; height: 25px; background-color: #d1e7dd; border: 1px solid black; display: inline-block; vertical-align: middle;"></div>
					<span style="display: inline-block; vertical-align: middle;">- Room has not been used.</span>
				</div>
				<div style="display: inline-block;">
					<div style="width: 60px; height: 25px; background-color: #fff; border: 1px solid black; display: inline-block; vertical-align: middle;"></div>
					<span style="display: inline-block; vertical-align: middle;">- Room already used.</span>
				</div>
			</div>
		</form>

		<!-- DataTable -->
		<div class="col-lg-7 col-sm-12 border rounded shadow ms-5 p-2 ms-lg-4 mt-lg-0 ms-sm-4 mt-sm-4">
			<h5>List of Created Room</h5>
			<hr />
			<div id="DataTable_Room"></div>
		</div>
	</div>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

<script src="../assets/module_MM/function-event.js"></script>


<!-- Update Room Modal -->
<div class="modal fade" id="mmRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Update Room</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="myFormRoomUpdate">
				<div class="modal-body">
					<div class="col pb-2">
						<label for="Room_Update" class="form-label">Room</label>
						<input type="text" class="form-control" id="Room_Update">
					</div>

					<div class="col pb-2">
						<label for="Floor_Update" class="form-label">Floor</label>
						<input type="text" class="form-control" id="Floor_Update">
					</div>

					<div class="col">
						<label for="Description_Update" class="form-label">Description</label>
						<input type="text" class="form-control" id="Description_Update">
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" onclick="UpdateDataRoom()" class="btn btn-primary">Update</button>
					<input type="hidden" id="hiddenID_Room">
				</div>
			</form>
		</div>
	</div>
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
