<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Corriculum Management > Course Scheduling</title>

<section class="container pt-3">
    <div class="row">

        <div class="col">
            <h3><i class="fa-solid fa-calendar-days"></i> Course Scheduling</h3>
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
                    <li class="breadcrumb-item active" aria-current="page">Course Scheduling</li>
                </ol>
            </nav>
        </div>

        <hr>
    </div>
</section>

<div class="container">

    <div class="row border shadow rounded mb-4 p-2">
        <h3>Schedule</h3>
        <hr />
        <div class="col">
            <label for="A_Program" class="form-label">Academic Program</label>
            <select class="form-select" id="A_Program">
                <option selected="">Select</option>
                <option value="BSCS">BSCS</option>
                <option value="BSIT">BSIT</option>
            </select>
        </div>
        <div class="col">
            <label for="Level" class="form-label">Level</label>
            <select class="form-select" id="Level">
                <option selected="">Select</option>
                <option value="1st_Year">1st Year</option>
                <option value="2nd_Year">2nd Year</option>
                <option value="3rd_Year">3rd Year</option>
                <option value="4th_Year">4th Year</option>
            </select>
        </div>
        <div class="col">
            <label for="Section" class="form-label">Section</label>
            <select class="form-select" id="Section">
                <option selected="">Select</option>
                <option value="1A1_1BSCS">1A1 - 1BSCS</option>
                <option value="1A1_1BSIT">1A1 - 1BSIT</option>
            </select>
        </div>
    </div>

    <div class="row border shadow rounded mb-4 p-2">
        <h3>Course Offered</h3>
        <hr />
        <table id="example" class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Description</th>
                    <th>Schedule</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CS Thesis Writing 1</td>
                    <td>Bachelor of Science in Computer Science</td>
                    <td style="width: 40%;"></td>
                    <td>
                        <button class="btn btn-success">
                            <a href="#">
                                <span class=" d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-pen-to-square text-light"></i>
                                </span>
                            </a>
                        </button>
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
            scrollX: true,
        });
    });

</script>
