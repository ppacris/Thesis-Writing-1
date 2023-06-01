<?php
require_once '../includes/DBHandler.php';

/*
 *
 * Course Scheduling
 *
 */

// Ordering Array
function getOrder($value){
	$Ordering = [
		"7:00 AM - 8:00 AM",
		"7:00 AM - 8:30 AM",
		"7:00 AM - 9:00 AM",
		"7:00 AM - 10:00 AM",
		"7:30 AM - 8:30 AM",
		"7:30 AM - 9:00 AM",
		"7:30 AM - 9:30 AM",
		"7:30 AM - 10:30 AM",
		"8:00 AM - 9:00 AM",
		"8:00 AM - 9:30 AM",
		"8:00 AM - 10:00 AM",
		"8:00 AM - 11:00 AM",
		"8:30 AM - 9:30 AM",
		"8:30 AM - 10:00 AM",
		"8:30 AM - 10:30 AM",
		"8:30 AM - 11:30 AM",
		"9:00 AM - 10:00 AM",
		"9:00 AM - 10:30 AM",
		"9:00 AM - 11:00 AM",
		"9:00 AM - 12:00 PM",
		"9:30 AM - 10:30 AM",
		"9:30 AM - 11:00 AM",
		"9:30 AM - 11:30 AM",
		"9:30 AM - 12:30 PM",
		"10:00 AM - 11:00 AM",
		"10:00 AM - 11:30 AM",
		"10:00 AM - 12:00 PM",
		"10:00 AM - 1:00 PM",
		"10:30 AM - 11:30 AM",
		"10:30 AM - 12:00 PM",
		"10:30 AM - 12:30 PM",
		"10:30 AM - 1:30 PM",
		"11:00 AM - 12:00 PM",
		"11:00 AM - 12:30 PM",
		"11:00 AM - 1:00 PM",
		"11:00 AM - 2:00 PM",
		"11:30 AM - 12:30 PM",
		"11:30 AM - 1:00 PM",
		"11:30 AM - 1:30 PM",
		"11:30 AM - 2:30 PM",
		"12:00 PM - 1:00 PM",
		"12:00 PM - 1:30 PM",
		"12:00 PM - 2:00 PM",
		"12:00 PM - 3:00 PM",
		"12:30 PM - 1:30 PM",
		"12:30 PM - 2:00 PM",
		"12:30 PM - 2:30 PM",
		"12:30 PM - 3:30 PM",
		"1:00 PM - 2:00 PM",
		"1:00 PM - 2:30 PM",
		"1:00 PM - 3:00 PM",
		"1:00 PM - 4:00 PM",
		"1:30 PM - 2:30 PM", // 1
		"1:30 PM - 3:00 PM", // 1:30
		"1:30 PM - 3:30 PM", // 2
		"1:30 PM - 4:30 PM", // 3
		"2:00 PM - 3:00 PM", // 1
		"2:00 PM - 3:30 PM", // 1:30
		"2:00 PM - 4:00 PM", // 2
		"2:00 PM - 5:00 PM", // 3
		"2:30 PM - 3:30 PM", // 1
		"2:30 PM - 4:00 PM", // 1:30
		"2:30 PM - 4:30 PM", // 2
		"2:30 PM - 5:30 PM", // 3
		"3:00 PM - 4:00 PM", // 1
		"3:00 PM - 4:30 PM", // 1:30
		"3:00 PM - 5:00 PM", // 2
		"3:00 PM - 6:00 PM", // 3
		"3:30 PM - 4:30 PM", // 1
		"3:30 PM - 5:00 PM", // 1:30
		"3:30 PM - 5:30 PM", // 2
		"3:30 PM - 6:30 PM", // 3
		"4:00 PM - 5:00 PM", // 1
		"4:00 PM - 5:30 PM", // 1:30
		"4:00 PM - 7:00 PM", // 2
		"4:00 PM - 7:30 PM", // 3
		"4:30 PM - 5:30 PM", // 1
		"4:30 PM - 6:00 PM", // 1:30
		"4:30 PM - 6:30 PM", // 2
		"4:30 PM - 7:30 PM", // 3
		"5:00 PM - 6:00 PM", // 1
		"5:00 PM - 6:30 PM", // 1:30
		"5:00 PM - 7:00 PM", // 2
		"5:00 PM - 8:00 PM", // 3
		"5:30 PM - 6:30 PM", // 1
		"5:30 PM - 7:00 PM", // 1:30
		"5:30 PM - 7:30 PM", // 2
		"6:00 PM - 7:00 PM", // 1
		"6:00 PM - 7:30 PM", // 1:30
		"6:00 PM - 8:00 PM", // 2
		"6:30 PM - 7:30 PM", // 1
		"6:30 PM - 8:00 PM", // 1:30
		"7:00 PM - 8:00 PM", // 1
	];

	$index = array_search($value, $Ordering);
	
	return $index;
}

function InsertRecord_bscs(){
	global $conn;
	$a = $_POST['a'];
	$b = $_POST['b'];
	$c = $_POST['c'];
	
    $d = $_POST['d'];
    $e = $_POST['e'];
	$f = $_POST['f'];
	$g = $_POST['g'];
	$h = $_POST['h'];
	$i = $_POST['i'];
	$j = $_POST['j'];
	$k = $_POST['k'];
	$l = $_POST['l'];
	$m = $_POST['m'];
	
	/*** Ordering Time in ASC for `Reports` module "Prof. Schedule" ***/
	$Order = getOrder($k);
	
	// Get ID column: Room
	$quertRoom = "SELECT ID FROM room WHERE Room = '$l'";
	$resultRoom = mysqli_query($conn, $quertRoom);
	$rowRoom = mysqli_fetch_assoc($resultRoom);
	$RoomID = $rowRoom['ID'];
	
	// Get ID column: Section
	$quertSec = "SELECT ID FROM section WHERE SectionName = '$m'";
	$resultSec = mysqli_query($conn, $quertSec);
	$rowSec = mysqli_fetch_assoc($resultSec);
	$SecID = $rowSec['ID'];

    $query = 
	"INSERT INTO bscs
    (CurriculumYear,
    Semester,
	YearLevel,
	CourseCode,
	CourseName,
	Lec,
	Lab,
	Units,
	PreRequisite,
	Day,
	Time,
	Room,
	Section,
	RoomID,
	SecID)

    VALUES(
	'$a',
	'$b',
	'$c',
	'$d',
	'$e',
	'$f',
	'$g',
	'$h',
	'$i',
	'$j',
	'$k',
	'$l',
	'$m',
	'$RoomID',
	'$SecID')";
	
    $result = mysqli_query($conn, $query);
}

function DuplicateRecordCC(){
	global $conn;
	if(!empty($_POST["a_send"])
	  && !empty($_POST["b_send"])
	  && !empty($_POST["c_send"])
	  && !empty($_POST["d_send"])) {
		$query = 
			"SELECT * FROM bscs
			WHERE
			CurriculumYear = '".$_POST["a_send"]."' AND
			Semester = '".$_POST["b_send"]."' AND
			YearLevel = '".$_POST["c_send"]."' AND
			CourseCode = '".$_POST["d_send"]."'";
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<span class='text-danger'>*Duplicate Course Code</span>";
			echo "<script>$('#btn2').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#btn2').prop('disabled', false);</script>";
		}
	}
}

function ExcelUpload(){
	global $conn;
	require_once '../lib/excel/vendor/autoload.php';

	// check if file was uploaded
	if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileType = $_FILES['file']['type'];
		$fileSize = $_FILES['file']['size'];

		// check if file is a valid Excel file
		$allowedTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
		if (in_array($fileType, $allowedTypes)) {
			// read Excel file and insert data into database
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fileTmpName);
			$worksheet = $spreadsheet->getActiveSheet();
			$lastRow = $worksheet->getHighestRow();

				$sql =
				"INSERT INTO bscs (CurriculumYear, Semester, YearLevel, CourseCode, CourseName, Lec, Lab, Units, PreRequisite, EmployeeID, Prof, Day, Time, Room, Section, RoomID, SecID) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($conn, $sql);

				for ($row = 1; $row <= $lastRow; $row++) {
					$col1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$col2 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$col3 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$col4 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$col5 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$col6 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$col7 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$col8 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$col9 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$col10 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$col11 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$col12 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$col13 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$col14 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$col15 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();

					// Get ID column: Room
					$quertRoom = "SELECT ID FROM room WHERE Room = '$col14'";
					$resultRoom = mysqli_query($conn, $quertRoom);
					$rowRoom = mysqli_fetch_assoc($resultRoom);
					$col16 = $rowRoom['ID'];

					// Get ID column: Section
					$quertSec = "SELECT ID FROM section WHERE SectionName = '$col15'";
					$resultSec = mysqli_query($conn, $quertSec);
					$rowSec = mysqli_fetch_assoc($resultSec);
					$col17 = $rowSec['ID'];

					mysqli_stmt_bind_param($stmt, 'sssssssssssssssss', $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12, $col13, $col14, $col15, $col16, $col17);
					mysqli_stmt_execute($stmt);
				}
			mysqli_stmt_close($stmt);

			echo "Success";
		} else {
			echo "Invalid";
		}
	} else {
		echo "Failed";
	}
}

function ConflictRecord(){
	global $conn;
	if(!empty($_POST["a_send"]) && !empty($_POST["b_send"])
	  && !empty($_POST["c_send"]) && !empty($_POST["j_send"])
	  && !empty($_POST["k_send"]) && !empty($_POST["l_send"])
	  && !empty($_POST["m_send"])) {
		$query = 
			"SELECT * FROM bscs
			WHERE
			CurriculumYear = '".$_POST["a_send"]."' AND 
			Semester = '".$_POST["b_send"]."' AND
			YearLevel = '".$_POST["c_send"]."' AND
			Day = '".$_POST["j_send"]."' AND
			Time = '".$_POST["k_send"]."' AND
			Room = '".$_POST["l_send"]."' AND
			Section = '".$_POST["m_send"]."'";
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<span class='text-danger'>*Conflict Schedule</span>";
			echo "<script>$('#btn2').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#btn2').prop('disabled', false);</script>";
		}
	}
}

function ConflictRecord_Section(){
	global $conn;
	if(!empty($_POST["a_send"]) && !empty($_POST["b_send"])
	  && !empty($_POST["c_send"]) && !empty($_POST["j_send"])
	  && !empty($_POST["k_send"]) && !empty($_POST["m_send"])) {
		$query = 
			"SELECT * FROM bscs
			WHERE
			CurriculumYear = '".$_POST["a_send"]."' AND 
			Semester = '".$_POST["b_send"]."' AND
			YearLevel = '".$_POST["c_send"]."' AND
			Day = '".$_POST["j_send"]."' AND
			Time = '".$_POST["k_send"]."' AND
			Section = '".$_POST["m_send"]."'";
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<span class='text-danger'>*Conflict Section Schedule</span>";
			echo "<script>$('#btn2').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#btn2').prop('disabled', false);</script>";
		}
	}
}

function ConflictRecord_Room(){
	global $conn;
	$time = $_POST['k_send'];
	
	if(!empty($_POST["a_send"]) && !empty($_POST["b_send"]) 
	   && !empty($_POST["j_send"]) && !empty($_POST["k_send"]) && !empty($_POST["l_send"])) {
		
		// Retrieve schedules from database
		$query = "SELECT Time FROM bscs WHERE CurriculumYear = '".$_POST["a_send"]."' AND Semester = '".$_POST["b_send"]."' AND Day = '".$_POST["j_send"]."' AND Room = '".$_POST["l_send"]."';";
		$result = mysqli_query($conn, $query);
		
		// Loop through all schedules
		while ($row = mysqli_fetch_assoc($result)) {
			// Split start_time and end_time values into separate variables
			list($start_time, $end_time) = explode(" - ", $row['Time']);

			// Check for conflicts with inputted time value
			list($inputted_start_time, $inputted_end_time) = explode(" - ", $time);

			// Convert time values to seconds
			$start_time_seconds = strtotime($start_time);
			$end_time_seconds = strtotime($end_time);
			$inputted_start_time_seconds = strtotime($inputted_start_time);
			$inputted_end_time_seconds = strtotime($inputted_end_time);

			// Check if the inputted time conflicts with the retrieved time
			if (($inputted_start_time_seconds >= $start_time_seconds && $inputted_start_time_seconds < $end_time_seconds) ||
				($inputted_end_time_seconds > $start_time_seconds && $inputted_end_time_seconds <= $end_time_seconds) ||
				($inputted_start_time_seconds <= $start_time_seconds && $inputted_end_time_seconds >= $end_time_seconds)) {
				// Conflict found
				echo "\n<span class='text-danger'>*Conflict Room: {$_POST["j_send"]} @ ${row['Time']}</span>";
				echo "\n<script>$('#btn2').prop('disabled', true);</script>";
				return;
			}
		}

		// There is no conflict with the inputted schedule
		echo "<script>$('#btn2').prop('disabled', false);</script>";
	}
}
