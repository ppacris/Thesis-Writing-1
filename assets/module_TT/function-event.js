$(document).ready(function () {
	filterDay();
	filterTime();

	DisplayData_Subjects();
	InsertData_Prof();
	InsertData_Prof2();

	$('#yesUpdate').click(function () {
		setTimeout(function () {
			$('#filterSubmit').click();
		}, 700);
	});
});

/*
 *	Binary Search Algorithm
 */
function binarySearch(arr, x) {
	let start = 0;
	let end = arr.length - 1;

	while (start <= end) {
		let mid = Math.floor((start + end) / 2);

		if (arr[mid] === x) {
			return mid;
		}

		if (arr[mid] < x) {
			start = mid + 1;
		} else {
			end = mid - 1;
		}
	}
	return -1;
}



/*
 *
 * TimeTable
 *
 */

/** Employee Schedule **/

function filterDay() {
	$("#Employee").change(function () {
		var selectedValue = $(this).val();
		$.ajax({
			url: '../assets/module_TT/filterDay.php',
			type: 'POST',
			data: {
				EmpID: selectedValue
			},
			success: function (data) {
				$("#Day").html(data);
			}
		});
	});
}

function filterTime() {
	$("#Day").change(function () {
		var selectedValue1 = $(this).val();
		var selectedValue2 = $("#Employee").val();
		$.ajax({
			url: '../assets/module_TT/filterTime.php',
			type: 'POST',
			data: {
				Day: selectedValue1,
				EmpID: selectedValue2
			},
			success: function (data) {
				$("#Time").html(data);
			}
		});
	});
}


/** Program of Study **/

// Display Record from Database in (<div id="filtertimeTable"></div>)
function DisplayData_Subjects() {
	$('#myFormTimeTable').submit(function (event) {
		event.preventDefault();

		var DisplayData_Add = "true";
		var SY_Add = $('#SY').val();
		var Sem_Add = $('#Sem').val();
		var YL_Add = $('#YL').val();

		const toastTrigger_Refresh = $('#filtetSubmit');
		const toastLiveExample_Refresh = $('#liveToastRefresh');
		let toastBootstrap_Refresh;

		if (SY_Add == "" || Sem_Add == "" || YL_Add == "") {
			alert('Fill `Program of Study`.');
		} else {
			$.ajax({
				method: 'POST',
				url: '../assets/module_TT/filterSubjects.php',
				data: {
					DisplayData_Send: DisplayData_Add,
					SY_Send: SY_Add,
					Sem_Send: Sem_Add,
					YL_Send: YL_Add
				},
				success: function (response) {
					$('#filtertimeTable').html(response);
					$('#filtertimeTable1').DataTable({
						deferRender: true,
						deferRender: true,
						scrollY: '50vh',
						scrollX: true,
						scrollCollapse: true,
					});

					if (toastTrigger_Refresh) {
						toastBootstrap_Refresh = toastBootstrap_Refresh || bootstrap.Toast.getOrCreateInstance(toastLiveExample_Refresh);
						toastBootstrap_Refresh.show();
					}
				},
				error: function (xhr, status, error) {
					console.error("AJAX error: " + status + " - " + error);
				}
			});
		}
	});
}


/** Subjects Table **/

function getID_Subject(updateID) {
	$('#hiddenID').val(updateID);
	$.post('../assets/module_TT/appendProf.php', {
		updateID_Send: updateID
	}, function (data, status) {

	});
}

// Insert Record in Database `bscs`
function InsertData_Prof() {
	const daySlots = [
		"Monday",
		"Tuesday",
		"Wednesday",
		"Thursday",
		"Friday",
		"Saturday",
		"Sunday"
	];
	const timeSlots = [];
	$.ajax({
		url: "../assets/module_TT/fetchArray.php",
		method: "GET",
		dataType: "json",
		success: function (data) {
			// Add the fetched data to the array
			console.log(daySlots.sort());
			timeSlots.push(...data);
			timeSlots.sort((a, b) => a - b);
			console.log(timeSlots.sort());

			const uniqueArray = Array.from(new Set(timeSlots.map(JSON.stringify)), JSON.parse);
			console.log(uniqueArray);

			$('#myFromSubjects').submit(function (event) {
				event.preventDefault();

				var target_daySlot = $('#Day').val();
				var target_timeSlot = $('#Time').val();

				var subID_Add = $('#hiddenID').val();
				var empID_Add = $('#Employee').val();
				var SY_Add = $('#SYCopy').val();
				var Sem_Add = $('#SemCopy').val();
				var day_Add = $('#Day').val();
				var time_Add = $('#Time').val();

				const index1 = binarySearch(daySlots.sort(), target_daySlot);
				const index2 = binarySearch(uniqueArray, target_timeSlot);

				if (target_timeSlot == "" || target_daySlot == "") {
					alert("Employee Schedule is required!");
				} else {
					if (index1 !== -1 && index2 !== -1) {
						console.log(SY_Add);
						console.log(day_Add);
						console.log(time_Add);
						var day_record;
						var time_record;
						$.ajax({
							url: '../assets/module_TT/getDay.php',
							method: 'POST',
							data: {
								subIDRecord1_Send: subID_Add,
								SY_Send: SY_Add,
								Sem_Send: Sem_Add,
								dayRecord1_Send: day_Add,
								timeRecord1_Send: time_Add
							},
							success: function (data) {
								day_record = data;
								if (day_record == day_Add) {
									$.ajax({
										url: '../assets/module_TT/getTime.php',
										method: 'POST',
										data: {
											subIDRecord2_Send: subID_Add,
											SY_Send: SY_Add,
											Sem_Send: Sem_Add,
											dayRecord2_Send: day_Add,
											timeRecord2_Send: time_Add
										},
										success: function (data) {
											time_record = data;
											if (time_record == time_Add) {
												$.ajax({
													method: 'POST',
													url: '../assets/module_TT/appendProf.php',
													data: {
														subID_Send: subID_Add,
														empID_Send: empID_Add,
														SY_Send: SY_Add,
														Sem_Send: Sem_Add,
														day_Send: day_Add,
														time_Send: time_Add
													},
													dataType: 'json',
													success: function (response) {
														if (response == "Confict") {
															console.log('Conflict Schedule');
															console.log('');
															console.log('');
															alert("Conflict Prof. Schedule");
														} else if (response.status == "Max") {
															console.log('Max Units');
															console.log('');
															console.log('');
															$('#readNotif').html(response.readNotif);
															$('#hiddenIDCopy').val(response.hiddenID);
															$('#EmployeeIDCopy').val(response.EmployeeID);
															$('#ProfCopy').val(response.Prof);
															$('#DecisionNotif').modal('show');
														} else if (response.hiddenID == subID_Add) {
															$('#readNotif').html(response.readNotif);
															$('#hiddenIDCopy').val(response.hiddenID);
															$('#EmployeeIDCopy').val(response.EmployeeID);
															$('#ProfCopy').val(response.Prof);
															$('#DecisionNotif').modal('show');
														}
													},
													error: function (xhr, status, error) {
														console.error("AJAX error: " + status + " - " + error);
													}
												});
											} else {
												console.log('Schedule not match');
												console.log('');
												console.log('');
												alert(`${target_daySlot} @ ${target_timeSlot} \nSchedule not match.`);
											}
										},
										error: function (xhr, status, error) {
											console.error("AJAX error: " + status + " - " + error);
										}
									});
								} else {
									console.log('Schedule not match');
									console.log('');
									console.log('');
									alert(`${target_daySlot} @ ${target_timeSlot} \nSchedule not match.`);
								}
							},
							error: function (xhr, status, error) {
								console.error("AJAX error: " + status + " - " + error);
							}
						});
					} else {
						console.log('Schedule not match');
						console.log('');
						console.log('');
						alert(`${target_daySlot} @ ${target_timeSlot} \nSchedule not match.`);
					}
				}
			});
		},
		error: function (xhr, status, error) {
			console.error("AJAX error: " + status + " - " + error);
		}
	});
}

function InsertData_Prof2() {
	const toastTrigger = $('#appendSubmit');
	const toastLiveExample = $('#liveToastUpdate');
	let toastBootstrap_Update;

	$('#myFormYesOrNo').submit(function (event) {
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			url: '../assets/module_TT/appendProf2.php',
			method: 'POST',
			data: formData,
			success: function (data) {
				console.log('Update Success');
				console.log('');
				console.log('');
				// Toast Notif
				if (toastTrigger) {
					toastBootstrap_Update = toastBootstrap_Update || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
					toastBootstrap_Update.show();
				}
			},
			error: function (xhr, status, error) {
				console.error("AJAX error: " + status + " - " + error);
			}
		});
	});
}
