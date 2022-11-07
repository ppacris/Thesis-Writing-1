<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Corriculum Management > Corriculum</title>

<section class="container pt-3">
    <div class="row">

        <div class="col">
            <h3><i class="fa-solid fa-cubes"></i> Section</h3>
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
                    <li class="breadcrumb-item active" aria-current="page">Section</li>
                </ol>
            </nav>
        </div>

        <hr>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-4 border rounded shadow mx-4 p-2">
            <h5>New Section</h5>
            <hr />
            <div class="col pb-2">
                <label for="" class="form-label">Academic Program</label>
                <select class="form-select" id="Employeestat">
                    <option selected="">Select</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSIT">BSIT</option>
                </select>
            </div>


            <div class="col pb-2">
                <label for="" class="form-label">Level</label>
                <select class="form-select" id="Employeestat">
                    <option selected="">Select</option>
                    <option value="1st_Year">1st Year</option>
                    <option value="2nd_Year">2nd Year</option>
                    <option value="3rd_Year">3rd Year</option>
                    <option value="4th_Year">4th Year</option>
                </select>
            </div>

            <div class="col pb-2">
                <label for="" class="form-labe">Section</label>
                <input type="text" class="form-control">
            </div>

            <div class="row row-cols-2 justify-content-center">
                <button class="btn btn-success">Submit</button>
            </div>

        </div>
        <div class="col-7 border rounded shadow mx-4 p-2">
            <h5>List of Created Sections</h5>
            <hr />
            <div class="col">
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Program Code</th>
                            <th>Level</th>
                            <th>Section Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BSCS</td>
                            <td>4th Year</td>
                            <td>1A1 - 1BSCS</td>
                            <td>
                                <button class="btn btn-primary">
                                    <a href="#" style="text-decoration: none;">
                                        <span class=" d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-pencil text-light"></i>
                                        </span>
                                    </a>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="#" style="text-decoration: none;">
                                        <span class=" d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-x text-light"></i>
                                        </span>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
?>


<script type=" text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            scrollX: true,
        });
    });

</script>
