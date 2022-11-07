</div>
<footer class="footer">
    <div class="container d-flex justify-content-end">
        <small class="text-muted">WebDev: A K. Pacris - Faculty Scheduling © 2022</small>
    </div>
</footer>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<!-- Jquery /* Used also in DataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

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
        /* Icon-hover End */
    });

</script>

</body>

</html>
