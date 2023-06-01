$(document).ready(function () {
	// Course Scheduling
	InsertData_bscs();
	InsertData_bscsExcel();
});

/*
 *
 *	Course Scheduling
 *
 */

function InsertData_bscs() {
	const toastTrigger = $('#liveToastBtn');
	const toastLiveExample = $('#liveToast');

	$('#myForm').submit(function (event) {
		event.preventDefault();

		// Get the form data
		var formData = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '../assets/module_CM/cmCS-insert.php',
			data: formData,
			success: function (response) {
				if (toastTrigger) {
					const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap.show();
				}
				$('form').trigger('reset');
			},
			error: function (error) {
				alert('Form submission failed:', error);
			}
		});
	});
}

function InsertData_bscsExcel() {
	const toastTrigger = $('#liveToastBtnExcel');
	const toastLiveExample = $('#liveToast');

	$('#myFormoffcanvas').submit(function (e) {
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			type: 'POST',
			url: '../assets/module_CM/cmCS-insertExcel.php',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function (response) {
				console.log(response);
				if (response === 'Success') {
					if (toastTrigger) {
						const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
						toastBootstrap.show();
					}
				} else if (response === 'Invalid') {
					alert('Invalid file type!');
				} else {
					alert('Failed to upload file!')
				}
				$('#myFormoffcanvas').trigger('reset');
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				alert('Error occurred while uploading file!');
			}
		});
		return false;
	});
}

function DuplicateDataCC() {
	var a_add = $("#a").val();
	var b_add = $("#b").val();
	var c_add = $("#c").val();
	var d_add = $("#d").val();

	$.ajax({
		method: "POST",
		url: "../assets/module_CM/cmCS-duplicateCC.php",
		data: {
			a_send: a_add,
			b_send: b_add,
			c_send: c_add,
			d_send: d_add
		},
		success: function (data) {
			$("#DuplicateCC").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}

function ConflictSched() {
	var a_add = $("#a").val();
	var b_add = $("#b").val();
	var c_add = $("#c").val();
	var j_add = $("#j").val();
	var k_add = $("#k").val();
	var l_add = $("#l").val();
	var m_add = $("#m").val();

	$.ajax({
		method: "POST",
		url: "../assets/module_CM/cmCS-ConflictSched.php",
		data: {
			a_send: a_add,
			b_send: b_add,
			c_send: c_add,
			j_send: j_add,
			k_send: k_add,
			l_send: l_add,
			m_send: m_add
		},
		success: function (data) {
			$(".Conflict").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}

function ConflictSecSched() {
	var a_add = $("#a").val();
	var b_add = $("#b").val();
	var c_add = $("#c").val();
	var j_add = $("#j").val();
	var k_add = $("#k").val();
	var m_add = $("#m").val();

	$.ajax({
		method: "POST",
		url: "../assets/module_CM/cmCS-ConflictSecSched.php",
		data: {
			a_send: a_add,
			b_send: b_add,
			c_send: c_add,
			j_send: j_add,
			k_send: k_add,
			m_send: m_add
		},
		success: function (data) {
			$(".Conflict").html(data);
		},
		error: function () {
			alert('failed:', error);
		}
	});
}

function ConflictRoom() {
	var a_add = $("#a").val();
	var b_add = $("#b").val();
	var j_add = $("#j").val();
	var k_add = $("#k").val();
	var l_add = $("#l").val();

	$.ajax({
		type: "POST",
		url: "../assets/module_CM/cmCS-ConflictRoom.php",
		data: {
			a_send: a_add,
			b_send: b_add,
			j_send: j_add,
			k_send: k_add,
			l_send: l_add
		},
		success: function (data) {
			$("#ComflictRoom").html(data);
		},
		error: function () {
			alert("An error occurred.");
		}
	});

}
