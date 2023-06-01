$(document).ready(function () {
	filterSection();
	DisplayData_Schedule();
	DisplayData_Prof();

	filterEmployeeEmail();
});


function filterSection() {
	$("#YL").change(function () {
		var selectedValue = $(this).val();
		$.ajax({
			url: '../assets/module_Reports/filterSection.php',
			type: 'POST',
			data: {
				YL: selectedValue
			},
			success: function (data) {
				$("#Section").html(data);
			}
		});
	});
}

// Display Record from Database
function DisplayData_Schedule() {
	$('#myFormSchedule').submit(function (event) {
		event.preventDefault();

		var DisplayData_Add = "true";
		var SY_Add = $('#SY').val();
		var Sem_Add = $('#Sem').val();
		var YL_Add = $('#YL').val();
		var Section_Add = $('#Section').val();
		var YLCopy_Add = $('#YLCopy').val();
		var SectionCopy_Add = $('#SectionCopy').val();

		const toastTrigger_Search = $('#filtetSubmit');
		const toastLiveExample_Search = $('#liveToastSearch');
		let toastBootstrap_Search;

		if (SY_Add == "" || Sem_Add == "" || YL_Add == "" || Section_Add == "") {
			alert('Fill `Prof. Schedule`.');
		} else {
			$.ajax({
				method: 'POST',
				url: '../assets/module_Reports/reports-schedView.php',
				data: {
					DisplayData_Send: DisplayData_Add,
					SY_Send: SY_Add,
					Sem_Send: Sem_Add,
					YL_Send: YL_Add,
					Section_Send: Section_Add,
					YLCopy_Send: YLCopy_Add,
					SectionCopy_Send: SectionCopy_Add
				},
				success: function (response) {
					$('#filterSched').html(response);
					var btns = $('#filterSched1').DataTable({
						deferRender: true,
						deferRender: true,
						scrollY: '50vh',
						scrollCollapse: true,
						lengthChange: false,
						searching: false,
						buttons: [
							'excel',
							'pdf',
							'print',
							{
								text: 'Screenshot',
								action: function (e, dt, node, config) {
									const screenshotContent = $('#filterSched1_wrapper .row:eq(1)').get(0);
									screenshotContent.classList.add('scaled');

									setTimeout(() => {
										html2canvas(screenshotContent).then(function (canvas) {
											let link = document.createElement('a');
											link.href = canvas.toDataURL('image/png');
											link.download = 'Schedule.png';

											document.body.appendChild(link);
											link.click();
											document.body.removeChild(link);
										});

										screenshotContent.classList.remove('scaled');
									}, 500);
								}
							}
						]
					});
					btns.buttons().container()
						.appendTo('#filterSched1_wrapper .col-md-6:eq(0)');
				},
				error: function (error) {
					alert('Form submission failed:', error);
				}
			});
		}
	});
}

// Display Record from Database
function DisplayData_Prof() {
	$('#myFormProf').submit(function (event) {
		event.preventDefault();

		var DisplayData_Add = "true";
		var Employee_Add = $('#Employee').val();
		var Sem_Add = $('#Sem').val();
		var Email_Add = $('#email').val();

		const toastTrigger_Search = $('#filtetSubmit');
		const toastLiveExample_Search = $('#liveToastSearch');
		let toastBootstrap_Search;

		if (Employee_Add == "" || Sem_Add == "") {
			alert('Fill `Prof. Schedule`.');
		} else {
			$.ajax({
				method: 'POST',
				url: '../assets/module_Reports/reports-profView.php',
				data: {
					DisplayData_Send: DisplayData_Add,
					Employee_Send: Employee_Add,
					Sem_Send: Sem_Add,
					Email_Send: Email_Add
				},
				success: function (response) {
					$('#filterProf').html(response);
					var btns = $('#filterProf1').DataTable({
						deferRender: true,
						deferRender: true,
						scrollY: '50vh',
						scrollCollapse: true,
						lengthChange: false,
						searching: false,
						buttons: [
							'excel',
							'pdf',
							'print',
							{
								text: 'Screenshot',
								action: function (e, dt, node, config) {
									const screenshotContent = $('#filterProf1_wrapper .row:eq(1)').get(0);
									screenshotContent.classList.add('scaled');

									setTimeout(() => {
										html2canvas(screenshotContent).then(function (canvas) {
											let link = document.createElement('a');
											link.href = canvas.toDataURL('image/png');
											link.download = `${Employee_Add} - Schedule.png`;

											document.body.appendChild(link);
											link.click();
											document.body.removeChild(link);
										});

										screenshotContent.classList.remove('scaled');
									}, 500);
								}
							},
							{
								text: 'Email',
								action: function (e, dt, node, config) {
									const screenshotContent = $('#filterProf1_wrapper .row:eq(1)').get(0);
									screenshotContent.classList.add('scaled');

									setTimeout(() => {
										html2canvas(screenshotContent).then(function (canvas) {
											canvas.toBlob(function (blob) {
												let formData = new FormData();
												formData.append('image', blob, `Schedule.png`);
												formData.append('email', Email_Add);

												let xhr = new XMLHttpRequest();
												xhr.open('POST', '../assets/module_Reports/email.php', true);
												xhr.onload = function () {
													if (xhr.status === 200) {
														alert('Email sent successfully!');
													} else {
														alert('Email sending failed.');
													}
												};
												xhr.send(formData);
											}, 'image/png');

											screenshotContent.classList.remove('scaled');
										});
									}, 500);
								}
							}
						]
					});
					btns.buttons().container()
						.appendTo('#filterProf1_wrapper .col-md-6:eq(0)');
				},
				error: function (xhr, status, error) {
					console.error("AJAX error: " + status + " - " + error);
				}
			});
		}
	});
}

function filterEmployeeEmail() {
	$("#Employee").change(function () {
		var selectedValue = $(this).val();
		$.ajax({
			url: '../assets/module_Reports/filterEmpEmail.php',
			type: 'POST',
			data: {
				Prof: selectedValue
			},
			success: function (data) {
				$("#email").val(data);
			}
		});
	});
}
