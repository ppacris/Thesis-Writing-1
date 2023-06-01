<?php
	require_once '../includes/DBHandler.php';

/*
 *
 * TimeTable
 *
 */

/** Employee Schedule **/

function filterDay_Record(){
	global $conn;
	$output2 = '';
	$query2 = "SELECT DISTINCT Day FROM instructor_sched WHERE EmployeeID = '".$_POST['EmpID']."' ORDER BY Ordering";
	$result2 = mysqli_query($conn, $query2);
	$output2 .='<option value="" selected>Select</option>';
	while ($row2 = mysqli_fetch_array($result2)){
		$output2 .='<option value="'.$row2['Day'].'">'.$row2['Day'].'</option>';
	}
	echo $output2;
}

function filterTime_Record(){
	global $conn;
	$output3 = '';
	$query3 = "SELECT Time FROM instructor_sched WHERE Day = '".$_POST['Day']."' AND EmployeeID = '".$_POST['EmpID']."' ORDER BY Time DESC";
	$result3 = mysqli_query($conn, $query3);
	$output3 .='<option value="" selected>Select</option>';
	while ($row3 = mysqli_fetch_array($result3)){
		$output3 .='<option value="'.$row3['Time'].'">'.$row3['Time'].'</option>';
	}
	echo $output3;
}

/** Subjects Table **/

function DisplayRecord_Subjects(){
	global $conn;
	$SY = $_POST['SY_Send'];
	$Sem = $_POST['Sem_Send'];
	$YL = $_POST['YL_Send'];
	
	if(isset($_POST['DisplayData_Send'])){
		$table='<table id="filtertimeTable1" class="table table-bordered table-hover" style="width:100%">
						<thead class="table-info">
							<tr>
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
								<th>
									<center>
										Action
									</center>	
								</th>
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
				$result = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($result)){
					$table.='<tr>
								<td>'.$row['CourseCode'].'</td>
								<td>'.$row['CourseName'].'</td>
								<td>'.$row['Lec'].'</td>
								<td>'.$row['Lab'].'</td>
								<td>'.$row['Units'].'</td>
								<td>'.$row['PreRequisite'].'</td>
								<td>'.$row['Prof'].'</td>
								<td>'.$row['Day'].'</td>
								<td>'.$row['Time'].'</td>
								<td>'.$row['Room'].'</td>
								<td>'.$row['Section'].'</td>
								<td>
									<center>
										<button type="submit" class="btn btn-primary" onclick="getID_Subject('.$row['ID'].')" id="appendSubmit">
											<a style="text-decoration: none;">
												<span class=" d-flex justify-content-center align-items-center">
													<i class="fa-solid fa-plus text-light"></i>
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

// Get Record Data Funcion button from Subject `Action`
function getID_Subject(){
	global $conn;
	if(isset($_POST['updateID_Send'])){
		$recordID = $_POST['updateID_Send'];
		$query = "SELECT * FROM bscs WHERE ID = $recordID";
		$result = mysqli_query($conn, $query);
		$response = array();
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
		echo json_encode($response);
	}else{
		$response['status']=200;
		$response['message']="Invalid data found";
	}
}

function UpdateRecord_Subjects(){
	global $conn;
	$subID = $_POST['subID_Send'];
	$empID = $_POST['empID_Send'];
	$day = $_POST['day_Send'];
	$time = $_POST['time_Send'];
	$currentYear = $_POST['SY_Send'];
	$sem = $_POST['Sem_Send'];
	
	// Get Prof full name from `instructor`
	$qryProfName = "SELECT Lname, Fname, MI, Suffix FROM instructor WHERE EmployeeID = '$empID'";
	$resultProfName = mysqli_query($conn, $qryProfName);
	$rowProfName = mysqli_fetch_assoc($resultProfName);
	$profName = $rowProfName['Lname'] .', ' . $rowProfName['Fname'] .' '. $rowProfName['MI'] .' '. $rowProfName['Suffix'];
	
	
	// Check if the Prof record is conflict by year, sem, prof, date, time.
	$qryCheckConflict = "SELECT  CurriculumYear, Prof, Day, Time FROM bscs WHERE CurriculumYear = '$currentYear' AND Semester = '$sem' AND Prof = '$profName' AND Day = '$day' AND Time = '$time'";
	$resultCheckConflict = mysqli_query($conn, $qryCheckConflict);
	
	// summation of column: Units based on EmployeeID, CurriculumYear, Semester.
	$qrytCheckUnits = "SELECT Units FROM bscs WHERE EmployeeID = '$empID' AND CurriculumYear = '$currentYear' AND Semester = '$sem'";
	$resultCheckUnits = mysqli_query($conn, $qrytCheckUnits);
	$UnitsSum = 0;
	while ($row = mysqli_fetch_assoc($resultCheckUnits)) {
		$UnitsSum += $row['Units'];
	}

	// get Employee Status (Full Time / Part Time)
	$qrytCheckStatus = "SELECT Status FROM instructor WHERE EmployeeID = '$empID'";
	$resultCheckStatus = mysqli_query($conn, $qrytCheckStatus);
	$rowStatus = mysqli_fetch_assoc($resultCheckStatus);
	$Status = $rowStatus['Status'];
	
	// check if $UnitsSum + $newUnits will exceed the $MaxUnits
	$qrytnewUnits = "SELECT Units FROM bscs WHERE ID = '$subID'";
	$resultnewUnits  = mysqli_query($conn, $qrytnewUnits);
	$rownewUnnits = mysqli_fetch_assoc($resultnewUnits);
	$newUnits = $rownewUnnits['Units'];
	
	$MaxUnits = 0;
	if ($Status == "Full Time"){
		$MaxUnits = 33;
		if ($MaxUnits == $UnitsSum || $UnitsSum + $newUnits > $MaxUnits){
			$result = "Max";
			$readNotif = "<h3><b><u style = 'text-decoration-color: red;'>A l e r t !</u></b></h3> <b>Status: Max ${MaxUnits} Units taken. <br> Employee Status: ${Status}.</b> <br> <br> Do you wish to save changes?";
			$response = array(
				'status' => $result,
				'EmpStatus' => $Status,
				'maxUnits' => $MaxUnits,
				'hiddenID' => $subID,
				'EmployeeID' => $empID,
				'Prof' => $profName,
				'readNotif' => $readNotif
			);
			// Output JSON response
			echo json_encode($response);
			exit();
		}
	} else if ($Status == "Part Time"){
		$MaxUnits = 9;
		if ($MaxUnits == $UnitsSum || $UnitsSum + $newUnits > $MaxUnits){
			$result = "Max";
			$readNotif = "<h3><b><u style = 'text-decoration-color: red;'>A l e r t !</u></b></h3> <b>Status: Max ${MaxUnits} Units taken. <br> Employee Status: ${Status}.</b> <br> <br> Do you wish to save changes?";
			$response = array(
				'status' => $result,
				'EmpStatus' => $Status,
				'maxUnits' => $MaxUnits,
				'hiddenID' => $subID,
				'EmployeeID' => $empID,
				'Prof' => $profName,
				'readNotif' => $readNotif
			);

			// Output JSON response
			echo json_encode($response);
			exit();
		}
	}
	
	// Check if the record matches the Schedule of prof to the fix sched.
	$qryCheckMatch = "SELECT Day, Time FROM bscs WHERE ID = '$subID' AND Day = '$day' AND Time = '$time'";
	$resultCheckMatch = mysqli_query($conn, $qryCheckMatch);
	
	if ($resultCheckConflict->num_rows > 0){
		$result = "Confict";
		echo json_encode($result);
		exit();
	}else if ($resultCheckMatch->num_rows > 0){
		$readNotif = "Do you wish to save changes?";
			$response = array(
				'hiddenID' => $subID,
				'EmployeeID' => $empID,
				'Prof' => $profName,
				'readNotif' => $readNotif
			);
		echo json_encode($response);
	}
}

function UpdateRecord_Subjects2(){
	global $conn;
	$empID = $_POST['EmployeeIDCopy'];
	$profName = $_POST['ProfCopy'];
	$subID = $_POST['hiddenIDCopy'];
	
	$qryAppend = "UPDATE bscs SET EmployeeID = '$empID', Prof = '$profName' WHERE ID = '$subID'";
	$resultAppend = mysqli_query($conn, $qryAppend);
}



// Get Record `Day` WHERE ID = '$subID' AND Day = '$day' AND Time = '$time';
function dayRecord(){
	global $conn;
	$subID = $_POST['subIDRecord1_Send'];
	$day = $_POST['dayRecord1_Send'];
	$time = $_POST['timeRecord1_Send'];
	
	$qryDay = "SELECT Day, Time FROM bscs WHERE ID = '$subID' AND Day = '$day' AND Time = '$time'";
	$resultDay  = mysqli_query($conn, $qryDay);
	$rowDay = mysqli_fetch_assoc($resultDay);
	$valueDay = $rowDay['Day'];
	echo $valueDay;
}
// Get Record `Time` WHERE ID = '$subID' AND Day = '$day' AND Time = '$time';
function timeRecord(){
	global $conn;
	$subID = $_POST['subIDRecord2_Send'];
	$day = $_POST['dayRecord2_Send'];
	$time = $_POST['timeRecord2_Send'];
	
	$qryTime = "SELECT Day, Time FROM bscs WHERE ID = '$subID' AND Day = '$day' AND Time = '$time'";
	$resultTime  = mysqli_query($conn, $qryTime);
	$rowTime = mysqli_fetch_assoc($resultTime);
	$valueTime = $rowTime['Time'];
	echo $valueTime;
}
