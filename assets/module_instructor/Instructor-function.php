<?php
require_once '../includes/DBHandler.php';


/*
 *
 *	Add and View
 *
 */

// Checking for Duplicate Employee ID
function DuplicateEmpID(){
	global $conn;
	if(!empty($_POST["empID_send"])) {

		$query ="SELECT * FROM instructor WHERE EmployeeID='".$_POST["empID_send"]."'";
		
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<span class='text-danger'>*Duplicate ID</span>";
			echo "<script>$('#submitAdd').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#submitAdd').prop('disabled', false);</script>";
		}
	}
}

// Insert Record  
function InsertRecord(){
	global $conn;
	$EmpID = $_POST['EmployeeID'];
	$EmpEmail = $_POST['EmployeeEmail'];
	$EmpLname = $_POST['Lname'];
	$EmpFname= $_POST['Fname'];
	$EmpMI = $_POST['MI'];
	$EmpSuffix = $_POST['Suffix'];
	$EmpStAddress= $_POST['StAddress'];
	$EmpBrgy = $_POST['Brgy'];
	$EmpCity = $_POST['City'];
	$EmpProvince = $_POST['Province'];
	$EmpDegree = $_POST['Degree'];
	$EmpDepartment = $_POST['Department'];
	$EmpStatus = $_POST['EmployeeStatus'];
	

	$query =
	"INSERT INTO instructor
	(EmployeeID,
	EmployeeEmail,
	Lname,
	Fname,
	MI,
	Suffix,
	StAddress,
	Brgy,
	City,
	Province,
	Degree,
	Department,
	Status)

	VALUES ('$EmpID',
	'$EmpEmail',
	'$EmpLname',
	'$EmpFname',
	'$EmpMI',
	'$EmpSuffix',
	'$EmpStAddress',
	'$EmpBrgy',
	'$EmpCity',
	'$EmpProvince',
	'$EmpDegree',
	'$EmpDepartment',
	'$EmpStatus')";

	$result = mysqli_query($conn, $query);
}

// Display Data Function
function DisplayRecord(){
	global $conn;
	if(isset($_POST['DisplayDatainsView_Send'])){
		$table='<table id="DB_InstructorTableView" class="table table-bordered table-hover" style="width:100%">
				<thead class="table-info">
					<tr>
						<th>Employee ID</th>
						<th>Full Name</th>
						<th>Degree</th>
						<th>Department</th>
						<th>Faculty Status</th>
						<th>
							<center>Profile / Edit</center>
						</th>
					</tr>
				</thead>';
		$query = "SELECT * FROM instructor";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result)){
			$table.='<tr>
						<td>'.$row['EmployeeID'].'</td>
						<td>'.$row['Lname'].' '.$row['Fname'].' '.$row['MI'].' '.$row['Suffix'].'</td>
						<td>'.$row['Degree'].'</td>
						<td>'.$row['Department'].'</td>
						<td>'.$row['Status'].'</td>
						<td>
							<center>
								<button type="button" onclick="GetData('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal">
									<span class=" d-flex justify-content-center align-items-center">
										<i class="fa-solid fa-user-pen text-light"></i>
									</span>
								</button>
								<button type="button" onclick="DeleteDataEmp('.$row['EmployeeID'].')" class="btn btn-danger">
									<span class=" d-flex justify-content-center align-items-center">
										<i class="fa-solid fa-x text-light"></i>
									</span>
								</button>
							</center>
						</td>
					</tr>';
		}
		$table.='</table>';
		echo $table;
	}
}

// Get Record Data Funcion
function GetRecord(){
	global $conn;
	if(isset($_POST['updateID_Send'])){
		$recordID = $_POST['updateID_Send'];
		$query = "SELECT * FROM instructor WHERE ID = $recordID";
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

// Update Data Function
function UpdateRecord(){
	global $conn;
	if(isset($_POST['hiddenID'])){
		$gethiddenID = $_POST['hiddenID'];
		$getEmpID = $_POST['EmpID'];
		$getEmpEmail = $_POST['EmpEmail'];
		$getEmpLname = $_POST['EmpLname'];
		$getEmpFname = $_POST['EmpFname'];
		$getEmpMI = $_POST['EmpMI'];
		$getEmpSuffix = $_POST['EmpSuffix'];
		$getEmpStAddress = $_POST['EmpStAddress'];
		$getEmpBrgy = $_POST['EmpBrgy'];
		$getEmpCity = $_POST['EmpCity'];
		$getEmpProvince = $_POST['EmpProvince'];
		$getEmpDegree = $_POST['EmpDegree'];
		$getEmpDeptartment = $_POST['EmpDeptartment'];
		$getEmpStatus = $_POST['EmpStatus'];
		
		$query = "UPDATE instructor SET
		EmployeeID = '$getEmpID',
		EmployeeEmail = '$getEmpEmail',
		Lname = '$getEmpLname',
		Fname = '$getEmpFname',
		MI = '$getEmpMI',
		Suffix = '$getEmpSuffix',
		StAddress = '$getEmpStAddress',
		Brgy = '$getEmpBrgy',
		City = '$getEmpCity',
		Province = '$getEmpProvince',
		Degree = '$getEmpDegree',
		Department = '$getEmpDeptartment',
		Status = '$getEmpStatus'
		WHERE ID = $gethiddenID";
		$result = mysqli_query($conn, $query);
		
		
		// Get Prof full name from `instructor`
		$qryProfName = "SELECT Lname, Fname, MI, Suffix FROM instructor WHERE EmployeeID = '$getEmpID'";
		$resultProfName = mysqli_query($conn, $qryProfName);
		$rowProfName = mysqli_fetch_assoc($resultProfName);
		$profName = $rowProfName['Lname'] .', ' . $rowProfName['Fname'] .' '. $rowProfName['MI'] .' '. $rowProfName['Suffix'];
		
		//Update `instructor_sched` column: FullName
		$queryTT1 = "UPDATE instructor_sched SET FullName = '$profName' WHERE EmployeeID = $getEmpID";
		$resultTT1 = mysqli_query($conn, $queryTT1);

		//Update `bscs` column: Prof
		$queryTT2 = "UPDATE bscs SET Prof = '$profName' WHERE EmployeeID = $getEmpID";
		$resultTT2 = mysqli_query($conn, $queryTT2);
	}
}

function DeleteRecordNotif(){
	$ID = $_POST['delEmpID_Send'];
	$readNotif = "Do you wish to save changes?";
	
	$response = array(
		'EmployeeID' => $ID,
		'readNotif' => $readNotif
	);
	echo json_encode($response);
}

// Delete Data Function for Instructor
function DeleteRecordEmp2(){
	global $conn;
	$ID = $_POST['EmployeeIDCopy'];
	$currentYear = date('Y');
	
	/* `instructor_sched` */
	$qryinstructor_sched = "DELETE FROM instructor_sched WHERE EmployeeID = $ID";
	$resultinstructor_sched = mysqli_query($conn, $qryinstructor_sched);

	/* `bscs` */
    $qrybscs = "UPDATE bscs SET Prof = NULL WHERE EmployeeID = $ID AND CurriculumYear = $currentYear";
    $resultbscs = mysqli_query($conn, $qrybscs);
}

/*
 *
 *	Schedule
 *
 */

// Insert Record into Datadabe for Schedule
function InsertRecordSched(){
    global $conn;
	$employeeID = filter_var($_POST['EmpID'], FILTER_SANITIZE_STRING);
	$day = filter_var($_POST['Day'], FILTER_SANITIZE_STRING);
	$time = filter_var($_POST['Time'], FILTER_SANITIZE_STRING);
	$currentYear = date('Y');
	
	$Ordering = 0;
	switch($day){
		case $day == "Monday":
			$Ordering = 1;
			break;
		case $day == "Tuesday":
			$Ordering = 2;
			break;
		case $day == "Wednesday":
			$Ordering = 3;
			break;
		case $day == "Thursday":
			$Ordering = 4;
			break;
		case $day == "Friday":
			$Ordering = 5;
			break;
		case $day == "Saturday":
			$Ordering = 6;
			break;
		case $day == "Sunday":
			$Ordering = 7;
			break;
	}
	
	// get full name from `instructor`
    $selectquery1 = "SELECT Lname, Fname, MI, Suffix FROM instructor WHERE EmployeeID = '$employeeID'";
    $selectresult1 = mysqli_query($conn, $selectquery1);
    $row = mysqli_fetch_assoc($selectresult1);
    $fullName = $row['Lname'] . ", " . $row['Fname'] . " " . $row['MI'] . " " . $row['Suffix'];

    $query = 
	"INSERT INTO instructor_sched
    (EmployeeID,
	FullName,
	Ordering,
	Day,
	Time,
	SchoolYear)

    VALUES(
	'$employeeID',
	'$fullName',
	'$Ordering',
	'$day',
	'$time',
	'$currentYear')";
	
    $result = mysqli_query($conn, $query);
}

// Checking for Duplicate Schedule
function DuplicateRecord(){
	global $conn;
	if(!empty($_POST["emp_send"]) && 
	   !empty($_POST["day_send"]) && 
	   !empty($_POST["time_send"])) {
		
		$query =
			"SELECT * FROM instructor_sched
			WHERE EmployeeID='".$_POST["emp_send"]."' AND 
			Day='".$_POST["day_send"]."' AND 
			Time='".$_POST["time_send"]."'";
		
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		
		if($count > 0) {
			echo "<div class='text-danger'>*Schedule already added.</div>";
			echo "<script>$('#submitSched').prop('disabled', true);</script>";
		}else{
			echo "<script>$('#submitSched').prop('disabled', false);</script>";
		}
	}
}
