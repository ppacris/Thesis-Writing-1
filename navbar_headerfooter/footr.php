</div>
<footer class="footer rounded-top bg-body-secondary">
	<div class="container d-flex justify-content-between">
		<a href="../about/" id="about" style="text-decoration: none; color: black;"><b>ABOUT</b></a>
		<small class="text-dark">Web-Dev. A K Pacris - Faculty Scheduling © 2022 - 2023</small>
	</div>
</footer>

<!-- Bootstrap JS -->
<script src="../assets/bootstrapJS/bootstrap.bundle.min.js"></script>
<!-- JQuery JS -->
<script src="../assets/dataTablesJS/jquery.min.js"></script>
<!-- DataTable JS -->
<script src="../assets/dataTablesJS/jquery.dataTables.min.js"></script>
<script src="../assets/dataTablesJS/dataTables.bootstrap5.min.js"></script>

<!-- Icon Hover -->
<script>
	$(document).ready(function() {
		/* Icon-hover Start */
		$(".icon-hover1").hover(function() {
			$(".icon-color1").toggleClass('text-info');
		});

		$(".icon-hover2").hover(function() {
			$(".icon-color2").toggleClass('text-light');
		});

		$(".icon-hover3").hover(function() {
			$(".icon-color3").toggleClass('text-light');
		});

		$(".icon-hover4").hover(function() {
			$(".icon-color4").toggleClass('text-light');
		});

		$(".icon-hover5").hover(function() {
			$(".icon-color5").toggleClass('text-light');
		});

		$(".icon-hover6").hover(function() {
			$(".icon-color6").toggleClass('text-info');
		});

		$("#schoolName").hover(function() {
			$(".school-name").toggleClass('text-warning');
		});
		/* Icon-hover End */
	});

</script>

<!-- TOAST NOTIFICATION -->
<div class="toast-container position-fixed top-0 end-0 p-3">
	<div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="d-flex">
			<div class="toast-body">
				<b>Success!</b>
			</div>
			<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>

</body>

</html>
