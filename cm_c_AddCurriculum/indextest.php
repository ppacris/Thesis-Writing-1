<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- Bootstrap DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- FontAwesome Icon CSS -->
<link rel="stylesheet" href="../fontawesomeV6/css/all.css">

<title>Corriculum Management > Corriculum > Add Corriculum</title>


<div class="offcanvas offcanvas-bottom" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row border shadow rounded mx-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2">
                <table id="example" class="table table-striped table-hover display nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Curriculum Year</th>
                            <th>Period</th>
                            <th>Level</th>
                            <th>Program Code</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Lec</th>
                            <th>Lab</th>
                            <th>Units</th>
                            <th>Comlab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <button class="btn btn-primary">
                                    <a href="#">
                                        <span class=" d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-plus text-light"></i>
                                        </span>
                                    </a>
                                </button>
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td style="width: 13%;">
                                <select class="form-select">
                                    <option value="1st_Semester">1st Semester</option>
                                    <option value="2nd_Semester">2nd Semester</option>
                                </select>
                            </td>
                            <td style="width: 10%;">
                                <select class="form-select">
                                    <option value="1st_Year">1st Year</option>
                                    <option value="2nd_Year">2nd Year</option>
                                    <option value="3rd_Year">3rd Year</option>
                                    <option value="4th_Year">4th Year</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select">
                                    <option value="BSCS">BSCS</option>
                                    <option value="BSIT">BSIT</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td style="width: 20%">
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <select class="form-select">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<!-- Jquery /* Used also in DataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            searching: false,
            ordering: false,
            info: false,
            stateSave: true,
            scrollX: true,
        });
    });

</script>
