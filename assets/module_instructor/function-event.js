$(document).ready(function () {
	// Add & View
	InsertData();
	DisplayData();

	//Delete
	DeleteDataEmp2();

	// SCHEDULE
	InsertDataSched();
});

function DuplicateEmpID() {
	var empID_add = $("#EmployeeID").val();
	$.ajax({
		url: "../assets/module_instructor/instructor-DuplicateEmpID.php",
		method: "POST",
		data: {
			empID_send: empID_add
		},
		success: function (data) {
			$("#DuplicateEmpID").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}

// Display Record in the Database (<div id="displayDataTable"></div>)
function DisplayData() {
	var DisplayData_insView = "true";
	$.ajax({
		url: '../assets/module_instructor/Instructor-view.php',
		method: 'POST',
		data: {
			DisplayDatainsView_Send: DisplayData_insView
		},
		success: function (data, status) {
			$('#DataTable_InstructorView').html(data);
			$(document).ready(function () {
				$('#DB_InstructorTableView').DataTable({
					deferRender: true,
					scrollY: '50vh',
					scrollCollapse: true,
					order: [
						[0, 'asc']
					],
				});
			});
		}
	})
}

// Insert Record in the Database (Save Button)
function InsertData() {
	const toastTrigger = $('#submitInstuctor');
	const toastLiveExample = $('#liveToast');
	let toastBootstrap_Add;

	$('#myFormAdd').submit(function (event) {
		event.preventDefault();

		// Get the form data
		var formData = $(this).serialize();

		$.ajax({
			type: 'POST',
			url: '../assets/module_instructor/instructor-insert.php',
			data: formData,
			success: function (response) {
				// Toas Notif
				if (toastTrigger) {
					toastBootstrap_Add = toastBootstrap_Add || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Add.show();
				}
				$('form').trigger('reset');
			},
			error: function (error) {
				alert('Form submission failed:', error);
			}
		});

	});
}

// Update Button
function GetData(updateID) {
	$('#hiddenID').val(updateID);
	$.post('../assets/module_instructor/Instructor-update.php', {
		updateID_Send: updateID
	}, function (data, status) {
		var userData = JSON.parse(data);
		$('#EmpID').val(userData.EmployeeID);
		$('#EmpEmail').val(userData.EmployeeEmail);
		$('#EmpLname').val(userData.Lname);
		$('#EmpFname').val(userData.Fname);
		$('#EmpMI').val(userData.MI);
		$('#EmpSuffix').val(userData.Suffix);
		$('#EmpStAddress').val(userData.StAddress);
		$('#EmpBrgy').val(userData.Brgy);
		$('#EmpCity').val(userData.City);
		$('#EmpProvince').val(userData.Province);
		$('#EmpDegree').val(userData.Degree);
		$('#EmpDeptartment').val(userData.Department);
		$('#EmpStatus').val(userData.Status);
	});
	$('#UpdateModal').modal('show');
}

// Update Record in the DataBase (Update Button - Onclick event)
function UpdateData() {
	const toastTrigger = $('#liveToastBtnUpdate');
	const toastLiveExample = $('#liveToastUpdate');
	let toastBootstrap_Update;

	$('#myFormUpdate').submit(function (event) {
		event.preventDefault();

		// Get the form data
		var formData = $(this).serialize();

		$.ajax({
			type: 'POST',
			url: '../assets/module_instructor/Instructor-update.php',
			data: formData,
			success: function (response) {
				// Toast Notif
				if (toastTrigger) {
					toastBootstrap_Update = toastBootstrap_Update || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Update.show();
				}
				$('#UpdateModal').modal('hide');
				DisplayData();
			},
			error: function (error) {
				alert('Form submission failed:', error);
			}
		});
	});
}

// Delete Record Notification
function DeleteDataEmp(delEmpID) {
	$.ajax({
		url: '../assets/module_instructor/Instructor-deleteNotif.php',
		method: 'POST',
		data: {
			delEmpID_Send: delEmpID
		},
		dataType: 'json',
		success: function (response) {
			$('#readNotif').html(response.readNotif);
			$('#EmployeeIDCopy').val(response.EmployeeID);
			$('#DeleteNotif').modal('show');
		}
	});
}

function DeleteDataEmp2() {
	const toastTrigger = $('#yesDelete');
	const toastLiveExample = $('#liveToastDel');
	let toastBootstrap_Delete;

	$('#myFormDelYesOrNo').submit(function (event) {
		event.preventDefault();
		var formData = $(this).serialize();

		$.ajax({
			url: '../assets/module_instructor/Instructor-delete.php',
			method: 'POST',
			data: formData,
			success: function (data, status) {
				if (toastTrigger) {
					toastBootstrap_Delete = toastBootstrap_Delete || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Delete.show();
				}
				DisplayData();
			}
		});
	});
}


/*
 *
 * SCHEDULE
 *
 */

// Insert Data `insctructor_sched` (Button id = #scheduleSubmit)
function InsertDataSched() {
	const toastTrigger = $('#submitSched');
	const toastLiveExample = $('#liveToast');
	let toastBootstrap_Sched;

	$('#myFormSched').submit(function (event) {
		event.preventDefault();

		var formData = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: '../assets/module_instructor/instructor-insertSched.php',
			data: formData,
			success: function (data) {
				if (toastTrigger) {
					toastBootstrap_Sched = toastBootstrap_Sched || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Sched.show();
				}
				$('form').trigger('reset');
			},
			error: function (error) {
				alert('Form submission failed:', error);
			}
		});
	});
}

function checkDuplicate() {
	var emp_add = $("#EmpID").val();
	var day_add = $("#Day").val();
	var time_add = $("#Time").val();

	$.ajax({
		url: "../assets/module_instructor/instructor-checkSched.php",
		method: "POST",
		data: {
			emp_send: emp_add,
			day_send: day_add,
			time_send: time_add
		},
		success: function (data) {
			$("#checkDuplicate").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}
