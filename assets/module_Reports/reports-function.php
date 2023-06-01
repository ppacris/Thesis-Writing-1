<?php
	require_once '../includes/DBHandler.php';

/*
 *
 * Schedule
 *
 */

function filterSection_Record(){
	global $conn;
	$output = '';
	$query = "SELECT DISTINCT Section FROM bscs WHERE YearLevel = '".$_POST['YL']."' ORDER BY Section";
	$result = mysqli_query($conn, $query);
	$output .='<option value="" selected>Select</option>';
	while ($row = mysqli_fetch_array($result)){
		$output .='<option value="'.$row['Section'].'">'.$row['Section'].'</option>';
	}
	echo $output;
}

function DisplayRecord_SubjectsSched(){
	global $conn;
	$SY = $_POST['SY_Send'];
	$Sem = $_POST['Sem_Send'];
	$YL = $_POST['YL_Send'];
	$Section = $_POST['Section_Send'];
	$YLCopy = $_POST['YLCopy_Send'];
	$SectionCopy = $_POST['SectionCopy_Send'];
	$currentYear = date('Y');
	$currentYear1 = $currentYear + 1;
	$sum = 0;
	
	if(isset($_POST['DisplayData_Send'])){
		$table='<table id="filterSched1" class="table table-bordered table-hover" style="width:100%">
						<thead>';
						$queryHeader = "SELECT DISTINCT CurriculumYear, YearLevel, Section, Semester FROM bscs WHERE Section = '$SectionCopy' AND Semester = '$Sem'";
						$resultHeader = mysqli_query($conn, $queryHeader);
						while($rowHeader = mysqli_fetch_assoc($resultHeader)){
						$table.='<tr class="table-warning">
									<th colspan="11"><center>S.Y. '.$currentYear.' - '.$currentYear1.' ( '.$rowHeader['Semester'].' )<br>'.$rowHeader['YearLevel'].' [ '.$rowHeader['Section']. ']</center></th>
								</tr>';
						}
						$table.='<tr class="table-info">
									<th><center>Course Code</center></th>
									<th><center>Descriptive Title</center></th>
									<th><center>Lec</center></th>
									<th><center>Lab</center></th>
									<th><center>Units</center></th>
									<th><center>Pre-requisite</center></th>
									<th><center>PROF.</center></th>
									<th><center>Day</center></th>
									<th><center>Time</center></th>
									<th><center>Room</center></th>
									<th><center>Section</center></th>
								</tr>
						</thead>';
				$query = "SELECT ID, CourseCode, CourseName, Lec, Lab, Units, PreRequisite, Prof, Day, Time, Room, Section FROM bscs WHERE 1=1";
				if (!empty($SY)) {
				  $query .= " AND CurriculumYear = '$SY'";
				}
				if (!empty($Sem)) {
				  $query .= " AND Semester = '$Sem'";
				}
				if (!empty($YL)) {
				  $query .= " AND YearLevel = '$YL'";
				}
				if (!empty($Section)) {
				  $query .= " AND Section = '$Section'";
				}
				$result = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($result)){
					$table.='<tr>
								<td>'.$row['CourseCode'].'</td>
								<td>'.$row['CourseName'].'</td>
								<td><center>'.$row['Lec'].'</center></td>
								<td><center>'.$row['Lab'].'</center></td>
								<td><center>'.$row['Units'].'</center></td>
								<td>'.$row['PreRequisite'].'</td>
								<td>'.$row['Prof'].'</td>
								<td>'.$row['Day'].'</td>
								<td>'.$row['Time'].'</td>
								<td>'.$row['Room'].'</td>
								<td>'.$row['Section'].'</td>
							</tr>';
					$sum += $row['Units'];
				}
				if ($result && mysqli_num_rows($result) > 0) {
					$table.='<tbody><td colspan="4"><center><b>Total Units:</b></center></td><td><center><b>'.$sum.'</b></center></td></tbody>';
				}
		$table.='</table>';
		echo $table;
	}
}

function DisplayRecord_ProfSched(){
	global $conn;
	$Employee = $_POST['Employee_Send'];
	$Sem = $_POST['Sem_Send'];
	$currentYear = date('Y');
	$currentYear1 = $currentYear + 1;
	$sum = 0;
	
	if(isset($_POST['DisplayData_Send'])){
		$table='<table id="filterProf1" class="table table-bordered table-hover" style="width:100%">
					<thead>';

				$table.='<tr class="table-warning">
							<th colspan="11"><center>S.Y. '.$currentYear.' - '.$currentYear1.' ( '.$Sem.' )<br>'.$Employee.'</center></th>
						</tr>';
				$table.='<tr class="table-info">
							<th><center>Time / Day</center></th>
							<th><center>Sunday</center></th>
							<th><center>Monday</center></th>
							<th><center>Tuesday</center></th>
							<th><center>Wednesday</center></th>
							<th><center>Thursday</center></th>
							<th><center>Friday</center></th>
							<th><center>Saturday</center></th>
						</tr>
					</thead>';
		$query = "SELECT DISTINCT Time, YearLevel, CourseCode, Room, Section FROM bscs WHERE 1=1";
		if (!empty($Employee)) {
			$query .= " AND Prof = '$Employee'";
		}
		if (!empty($Sem)) {
			$query .= " AND Semester = '$Sem'";
		}
		if (!empty($currentYear)) {
			$query .= " AND CurriculumYear = '$currentYear'";
		}
		$result = mysqli_query($conn, $query);
		$timeSlots = array(); // array to store unique time slots
		while($row = mysqli_fetch_assoc($result)){
			$timeSlots[] = $row['Time']; // add unique time slots to the array
		}
		$timeSlots = array_unique($timeSlots); // remove duplicates
		foreach ($timeSlots as $time) { // iterate over unique time slots
			$table.='<tr>
						<td>'.$time.'</td>';
			for ($i = 0; $i < 7; $i++) { // iterate over days of the week
				$day = date('l', strtotime("Sunday +{$i} days")); // get day of the week
				$table .= '<td>';
				$result = mysqli_query($conn, "SELECT * FROM bscs WHERE Prof = '$Employee' AND Time = '$time' AND Day = '$day'");
				while($row = mysqli_fetch_assoc($result)){
					$table .= '<center>'.$row['Room'].'<br>'
										.$row['CourseCode'].'<br>'
										.$row['YearLevel'].'<br>'
										.$row['Section'].'<br>
								</center>'; // add data to the cell
				}
				$table .= '</td>';
			}
			$table.='</tr>';
		}
		$table.='</table>';
		echo $table;
	}
}

function filterEmpEmail_Record() {
    global $conn;
    $qryEmpID = "SELECT EmployeeID FROM bscs WHERE Prof = '".$_POST['Prof']."'";
    $resultEmpID = mysqli_query($conn, $qryEmpID);
    $rowEmpID = mysqli_fetch_assoc($resultEmpID);
    
    $qryEmpEmail = "SELECT EmployeeEmail FROM instructor WHERE EmployeeID = '{$rowEmpID['EmployeeID']}'";
    $resultEmpEmail = mysqli_query($conn, $qryEmpEmail);
    $rowEmpEmail = mysqli_fetch_assoc($resultEmpEmail);
    $output = $rowEmpEmail['EmployeeEmail'];
    echo $output;
}
