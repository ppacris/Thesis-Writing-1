<?php
require_once '../includes/DBHandler.php';

/*
 *
 *	SECTION
 *
 */

// Checking for Duplicate Section
function DuplicateSection(){
	global $conn;
	if(!empty($_POST["section_send"])) {

		$query ="SELECT * FROM section WHERE SectionName = '".$_POST["section_send"]."'";
		
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<span class='text-danger'>*Duplicate Section</span>";
			echo "<script>$('#SectionSubmit').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#SectionSubmit').prop('disabled', false);</script>";
		}
	}
}

// Insert Record into Datadabe for Section
function InsertRecordSection(){
	global $conn;
    $AcadProgram = $_POST['AcadProgram'];
    $YearLevel = $_POST['YearLevel'];
	$Section = $_POST['Section'];

	$query = "INSERT INTO section
	(ProgramCode,
	YearLevel,
	SectionName)
	
	VALUES('$AcadProgram',
	'$YearLevel',
	'$Section')";
	
    $result = mysqli_query($conn, $query);
}

// Display Data Function for Section
function DisplayRecordSection(){
	global $conn;
	if(isset($_POST['DisplayData_SectionSend'])){
		$table='<table id="DB_DataTableSection" class="table table-bordered table-hover" style="width:100%">
				<thead class="table-primary">
					<tr>
						<th>Program Code</th>
						<th>Level</th>
						<th>Section</th>
						<th>
							<center>Action</center>
						</th>
					</tr>
				</thead>';
		$query = "SELECT * FROM section ORDER BY YearLevel";
		$result = mysqli_query($conn, $query);
		
		$queryColor = "SELECT Section FROM bscs";
		$resultColor = mysqli_query($conn, $queryColor);
		$bscsSections = array();
		while ($rowColor = mysqli_fetch_assoc($resultColor)) {
			$bscsSections[] = $rowColor['Section'];
		}
		while($row = mysqli_fetch_assoc($result)){
			// color 'table-success' if Section from bscs and SectionName from section coexist
			$sectionSection = $row['SectionName'];
			$bgColor = in_array($sectionSection, $bscsSections) ? '' : 'table-success';
			$table.='<tr class="'.$bgColor.'">
						<td>'.$row['ProgramCode'].'</td>
						<td>'.$row['YearLevel'].'</td>
						<td>'.$row['SectionName'].'</td>
						<td>
							<center>
								<!-- Button Edit -->
								<button type="button" onclick="GetDataSection('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mmSectionModal">
									<a style="text-decoration: none;">
										<span class=" d-flex justify-content-center align-items-center">
											<i class="fa-solid fa-pencil text-light"></i>
										</span>
									</a>
								</button>
								<!-- Button Delete -->
								<button type="button" onclick="DeleteDataSection('.$row['ID'].')" class="btn btn-danger" >
									<a style="text-decoration: none;">
										<span class=" d-flex justify-content-center align-items-center">
											<i class="fa-solid fa-x text-light"></i>
										</span>
									</a>
								</button>
							</center>
						</td>
					</tr>';
		}
		$table.='</table>';
		echo $table;
	}
}

// Get Record Data Funcion for Section
function GetRecordSection() {
	global $conn;
	if (isset($_POST['updateID_Send'])) {
		$record_id = $_POST['updateID_Send'];
		$query = "SELECT * FROM section WHERE ID = $record_id";
		$result = mysqli_query($conn, $query);
		$response = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$response = $row;
		}
		echo json_encode($response);
	} else {
		$response['status'] = 200;
		$response['message'] = "Invalid data found";
	}
}

// Update Data Function for Section
function UpdateRecordSection(){
	global $conn;
	if(isset($_POST['updatehiddenID_Send'])){
		$gethiddenID = $_POST['updatehiddenID_Send'];
		$getYL = $_POST['YL_Send'];
		$getSecName = $_POST['SecName_Send'];
		
		$query = "UPDATE section SET
		YearLevel = '$getYL',
		SectionName = '$getSecName'
		WHERE ID = $gethiddenID";
		$result = mysqli_query($conn, $query);
		
		// Update `bscs` column: Section
		$queryTT = "UPDATE bscs SET Section = '$getSecName' WHERE SecID = $gethiddenID";
		$resultTT = mysqli_query($conn, $queryTT);
	}
}

// Delete Data Function for Section
function DeleteRecordSection(){
	global $conn;
	if (isset($_POST['deleteidSection_Send'])){
		$ID = $_POST['deleteidSection_Send'];
		$query = "DELETE FROM section WHERE ID = $ID";
		$result = mysqli_query($conn, $query);
	}
}

/*
 *
 *	ROOM
 *
 */

// Checking for Duplicate Room
function DuplicateRoom(){
	global $conn;
	if(!empty($_POST["room_send"])) {

		$query ="SELECT * FROM room WHERE Room = '".$_POST["room_send"]."'";
		
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<span class='text-danger'>*Duplicate Room</span>";
			echo "<script>$('#RoomSubmit').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#RoomSubmit').prop('disabled', false);</script>";
		}
	}
}

// Insert Record into Datadabe for Room
function InsertRecordRoom(){
	global $conn;
    $Room = $_POST['Room'];
    $Floor = $_POST['Floor'];
	$Description = $_POST['Description'];

	$query = "INSERT INTO room
	(Room,
	Floor,
	Description)
	
	VALUES('$Room',
	'$Floor',
	'$Description')";
	
    $result = mysqli_query($conn, $query);
}

// Display Data Function for Room
function DisplayRecordRoom(){
	global $conn;
	if(isset($_POST['DisplayData_RoomSend'])){
		$table='<table id="DB_DataTableRoom" class="table table-bordered table-hover" style="width:100%">
				<thead class="table-primary">
					<tr>
						<th>Room</th>
						<th>Floor</th>
						<th>Description</th>
						<th>
							<center>Action</center>
						</th>
					</tr>
				</thead>';
		$query = "SELECT * FROM room";
		$result = mysqli_query($conn, $query);
		
		//
		$queryColor = "SELECT Room FROM bscs";
		$resultColor = mysqli_query($conn, $queryColor);
		$bscsRooms = array();
		while ($rowColor = mysqli_fetch_assoc($resultColor)) {
			$bscsRooms[] = $rowColor['Room'];
		}
		while($row = mysqli_fetch_assoc($result)){
			// color 'table-success' if Room from bscs and Room from room coexist
			$roomRoom = $row['Room'];
			$bgColor = in_array($roomRoom, $bscsRooms) ? '' : 'table-success';
			$table.='<tr class="'.$bgColor.'">
						<td>'.$row['Room'].'</td>
						<td>'.$row['Floor'].'</td>
						<td>'.$row['Description'].'</td>
						<td>
							<center>
								<!-- Button Edit -->
								<button type="button" onclick="GetDataRoom('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mmRoomModal">
									<a style="text-decoration: none;">
										<span class=" d-flex justify-content-center align-items-center">
											<i class="fa-solid fa-pencil text-light"></i>
										</span>
									</a>
								</button>
								<!-- Button Delete -->
								<button type="button" onclick="DeleteDataRoom('.$row['ID'].')" class="btn btn-danger" >
									<a style="text-decoration: none;">
										<span class=" d-flex justify-content-center align-items-center">
											<i class="fa-solid fa-x text-light"></i>
										</span>
									</a>
								</button>
							</center>
						</td>
					</tr>';
		}
		$table.='</table>';
		echo $table;
	}
}

// Get Record Data Funcion for Room
function GetRecordRoom() {
	global $conn;
	if (isset($_POST['updateIDRoom_Send'])) {
		$record_idRoom = $_POST['updateIDRoom_Send'];
		$query = "SELECT * FROM room WHERE ID = $record_idRoom";
		$result = mysqli_query($conn, $query);
		$response = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$response = $row;
		}
		echo json_encode($response);
	} else {
		$response['status'] = 200;
		$response['message'] = "Invalid data found";
	}
}

// Update Data Function for Room
function UpdateRecordRoom(){
	global $conn;
	if(isset($_POST['updatehiddenIDRoom_Send'])){
		$gethiddenIDRoom = $_POST['updatehiddenIDRoom_Send'];
		$getRoom  = $_POST['Room_Send'];
		$getFloor = $_POST['Floor_Send'];
		$getDescription = $_POST['Description_Send'];
		
		$query = "UPDATE room SET
		Room = '$getRoom',
		Floor = '$getFloor',
		Description = '$getDescription'
		WHERE ID = $gethiddenIDRoom";
		$result = mysqli_query($conn, $query);
		
		// Update `bscs` column: Section
		$queryTT = "UPDATE bscs SET Room = '$getRoom' WHERE RoomID = $gethiddenIDRoom";
		$resultTT = mysqli_query($conn, $queryTT);
	}
}

// Delete Data Function for Room
function DeleteRecordRoom(){
	global $conn;
	if (isset($_POST['deleteidRoom_Send'])){
		$ID = $_POST['deleteidRoom_Send'];
		$query = "DELETE FROM room WHERE ID = $ID";
		$result = mysqli_query($conn, $query);
	}
}
