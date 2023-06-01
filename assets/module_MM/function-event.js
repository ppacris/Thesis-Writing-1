$(document).ready(function () {
	// Section
	InsertDataSection();
	DisplayDataSection();

	// Room
	InsertDataRoom();
	DisplayDataRoom();
});

/*
 *
 *	SECTION
 *
 */

function DuplicateSection() {
	var section_add = $("#Section").val();
	$.ajax({
		url: "../assets/module_MM/mmSection-Duplicate.php",
		method: "POST",
		data: {
			section_send: section_add
		},
		success: function (data) {
			$("#DuplicateSection").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}

// Display Record in the Database `section` (<div id="DataTable_Section"></div>)
function DisplayDataSection() {
	var DisplayData_Section = "true";
	$.ajax({
		url: '../assets/module_MM/mmSection-view.php',
		method: 'POST',
		data: {
			DisplayData_SectionSend: DisplayData_Section
		},
		success: function (data, status) {
			$('#DataTable_Section').html(data);
			$(document).ready(function () {
				$('#DB_DataTableSection').DataTable({
					deferRender: true,
					scrollY: '50vh',
					scrollCollapse: true,
					order: [
						[0, 'asc']
					],
				});
			});
		}
	});
}

// Insert Data `section` (Button id = #SectionSubmit)
function InsertDataSection() {
	const toastTrigger = $('#SectionSubmit');
	const toastLiveExample = $('#liveToastSuccess');
	let toastBootstrap_Update;

	$('#myFormSection').submit(function (event) {
		event.preventDefault();

		var formData = $(this).serialize();

		$.ajax({
			url: '../assets/module_MM/mmSection-insert.php',
			method: 'POST',
			data: formData,
			success: function (data) {
				if (toastTrigger) {
					toastBootstrap_Update = toastBootstrap_Update || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Update.show();
				}
				DisplayDataSection();
			}
		});

	});
}

// Update Button 
function GetDataSection(updateID) {
	$('#hiddenID').val(updateID);

	$.post('../assets/module_MM/mmSection-update.php', {
		updateID_Send: updateID
	}, function (data, status) {
		var dataValue = JSON.parse(data);
		$('#YearLevel_Update').val(dataValue.YearLevel);
		$('#Section_Update').val(dataValue.SectionName);
	});
}

// Update Record in the DataBase `section` (Update Button - Onclick event)
function UpdateDataSection() {
	var YL = $('#YearLevel_Update').val();
	var SecName = $('#Section_Update').val();
	var updatehiddenID = $('#hiddenID').val();

	const toastTrigger = $('#liveToastBtnUpdate');
	const toastLiveExample = $('#liveToastUpdate');
	let toastBootstrap_Update;

	$('#myFormSecUpdate').submit(function (event) {
		event.preventDefault();

		if (YL == "" || SecName == "") {
			$("input").prop('required', true);
			$("select").prop('required', true);
		} else {
			$.ajax({
				type: 'POST',
				url: '../assets/module_MM/mmSection-update.php',
				data: {
					YL_Send: YL,
					SecName_Send: SecName,
					updatehiddenID_Send: updatehiddenID
				},
				success: function (response) {
					// Toast Notif
					if (toastTrigger) {
						toastBootstrap_Update = toastBootstrap_Update || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
						toastBootstrap_Update.show();
					}
					$('#mmSectionModal').modal('hide');
					DisplayDataSection();
				},
				error: function (error) {
					alert('Form submission failed:', error);
				}
			});
		}
	});
}

// Delete Record in the Database `section` (Delete Button - Onclick event)
function DeleteDataSection(deleteidSection) {
	$.ajax({
		url: '../assets/module_MM/mmSection-delete.php',
		method: 'POST',
		data: {
			deleteidSection_Send: deleteidSection
		},
		success: function (data, status) {
			DisplayDataSection();
		}
	});
}

/*
 *
 *	ROOM
 *
 */

function DuplicateRoom() {
	var room_add = $("#Room").val();
	$.ajax({
		url: "../assets/module_MM/mmRoom-Duplicate.php",
		method: "POST",
		data: {
			room_send: room_add
		},
		success: function (data) {
			$("#DuplicateRoom").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}

// Display Record in the Database `room` (<div id="DataTable_Room"></div>)
function DisplayDataRoom() {
	var DisplayData_Room = "true";
	$.ajax({
		url: '../assets/module_MM/mmRoom-view.php',
		method: 'POST',
		data: {
			DisplayData_RoomSend: DisplayData_Room
		},
		success: function (data, status) {
			$('#DataTable_Room').html(data);
			$(document).ready(function () {
				$('#DB_DataTableRoom').DataTable({
					deferRender: true,
					scrollY: '50vh',
					scrollCollapse: true,
					order: [
						[0, 'asc']
					],
				});
			});
		}
	});
}

// Insert Data `room` (Button id = #RoomSubmit)
function InsertDataRoom() {
	const toastTrigger = $('#RoomSubmit');
	const toastLiveExample = $('#liveToastSuccess');
	let toastBootstrap_Update;

	$('#myFormRoom').submit(function (event) {
		event.preventDefault();

		var formData = $(this).serialize();

		$.ajax({
			url: '../assets/module_MM/mmRoom-insert.php',
			method: 'POST',
			data: formData,
			success: function (data) {
				if (toastTrigger) {
					toastBootstrap_Update = toastBootstrap_Update || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Update.show();
				}
				DisplayDataRoom();
			}
		});

	});
}

// Update Button 
function GetDataRoom(updateIDRoom) {
	$('#hiddenID_Room').val(updateIDRoom);
	$.post('../assets/module_MM/mmRoom-update.php', {
		updateIDRoom_Send: updateIDRoom
	}, function (data, status) {
		var dataValue_Room = JSON.parse(data);
		$('#Room_Update').val(dataValue_Room.Room);
		$('#Floor_Update').val(dataValue_Room.Floor);
		$('#Description_Update').val(dataValue_Room.Description);
	});
}

// Update Record in the DataBase `room` (Update Button - Onclick event)
function UpdateDataRoom() {
	var room = $('#Room_Update').val();
	var floor = $('#Floor_Update').val();
	var description = $('#Description_Update').val();
	var updatehiddenIDRoom = $('#hiddenID_Room').val();

	const toastTrigger = $('#liveToastBtnUpdate');
	const toastLiveExample = $('#liveToastUpdate');
	let toastBootstrap_Update;


	$('#myFormRoomUpdate').submit(function (event) {
		event.preventDefault();

		if (room == "" || floor == "" || description == "") {
			$("input").prop('required', true);
		} else {
			$.ajax({
				type: 'POST',
				url: '../assets/module_MM/mmRoom-update.php',
				data: {
					Room_Send: room,
					Floor_Send: floor,
					Description_Send: description,
					updatehiddenIDRoom_Send: updatehiddenIDRoom
				},
				success: function (response) {
					// Toast Notif
					if (toastTrigger) {
						toastBootstrap_Update = toastBootstrap_Update || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
						toastBootstrap_Update.show();
					}
					$('#mmRoomModal').modal('hide');
					DisplayDataRoom();
				},
				error: function (error) {
					alert('Form submission failed:', error);
				}
			});
		}
	});
}

// Delete Record in the Database `room` (Delete Button - Onclick event)
function DeleteDataRoom(deleteidRoom) {
	$.ajax({
		url: '../assets/module_MM/mmRoom-delete.php',
		method: 'POST',
		data: {
			deleteidRoom_Send: deleteidRoom
		},
		success: function (data, status) {
			DisplayDataRoom();
		}
	});
}
