<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Corriculum Management > Corriculum > Add Corriculum</title>

<section class="container pt-3">
    <div class="row">

        <div class="col">
            <h3> <i class="fa-solid fa-plus"></i> Add Corriculum</h3>
        </div>

        <div class="col d-flex justify-content-end">
            <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../homepage/" class="text-dark" style="text-decoration: none;">
                            <i class="fa fa-house"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Corriculum Management</li>
                    <li class="breadcrumb-item active" aria-current="page">Corriculum</li>
                    <li class="breadcrumb-item active" aria-current="page">Add Corriculum</li>
                </ol>

            </nav>
        </div>
    </div>
</section>
<hr>

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
                            <option selected>Select</option>
                            <option value="1st_Semester">1st Semester</option>
                            <option value="2nd_Semester">2nd Semester</option>
                        </select>
                    </td>
                    <td style="width: 10%;">
                        <select class="form-select">
                            <option selected>Select</option>
                            <option value="1st_Year">1st Year</option>
                            <option value="2nd_Year">2nd Year</option>
                            <option value="3rd_Year">3rd Year</option>
                            <option value="4th_Year">4th Year</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select">
                            <option selected>Select</option>
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
                    <td style="width: 5%">
                        <select class="form-select">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>




<?php 
    include_once '../navbar_headerfooter/footr.php';
?>

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
