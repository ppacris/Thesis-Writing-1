<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Corriculum Management > Corriculum > Course Offer > Offering</title>

<section class="container pt-3">
    <div class="row">

        <div class="col">
            <h3> <i class="fa-brands fa-buffer"></i> Course Offering</h3>
            Course Code
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
                    <li class="breadcrumb-item active" aria-current="page">Course Offer</li>
                    <li class="breadcrumb-item active" aria-current="page">Offering</li>
                </ol>

            </nav>
        </div>
        <hr>
    </div>
</section>


<div class="container">
    <div class="row row-cols-2 justify-content-center">
        <div class="col-5 border shadow rounded py-2 px-2">
            <h5 class="bg-dark text-light text-center p-2">Bachelor of Science in Information Technology</h5>
            <label for="level1" class="form-label">Level</label>
            <select name="" class="form-select" id="level1">
                <option selected>Select</option>
                <option value="">1st Year</option>
                <option value="">2nd Year</option>
                <option value="">3rd Year</option>
                <option value="">4th Year</option>
            </select>

            <label for="section" class="form-label pt-2">Sections</label>
            <select name="" class="form-select" id="section">
                <option selected>Select</option>
                <option value="">1A1 - 1BSCS</option>
                <option value="">1A1 - 1BSIT</option>
            </select>

        </div>

        <div class="col-1"></div>

        <div class="col-5 border shadow rounded py-2 px-2">
            <h5>Search Course</h5>
            <hr />
            <div class="row my-2">
                <div class="col-lg-4 col-sm-12 pb-sm-2">
                    <label for="c_year" class="form-label">Curriculum Year</label>
                    <select name="" class="form-select" id="c_year">
                        <option selected>Select</option>
                        <option value="">2021</option>
                        <option value="">2022</option>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12 pb-sm-2">
                    <label for="level2" class="form-label">Level</label>
                    <select name="" class="form-select" id="level2">
                        <option selected>Select</option>
                        <option value="">1st Year</option>
                        <option value="">2nd Year</option>
                        <option value="">3rd Year</option>
                        <option value="">4th Year</option>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12 pb-sm-2">
                    <label for="period" class="form-label">Period</label>
                    <select name="" class="form-select" id="period">
                        <option selected>Select</option>
                        <option value="">1st Semester</option>
                        <option value="">2nd Semester</option>
                    </select>
                </div>
            </div>
            <div class="row row-cols-2 justify-content-center mt-2">
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>

    <div class="row border shadow rounded mt-4 py-2">
        <h4>Courses Offer</h4>
        <table id="example" class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Course code</th>
                    <th>Description</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Units</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PROG 101</td>
                    <td>Programing 1</td>
                    <td>3</td>
                    <td>3</td>
                    <td>6</td>
                    <td>
                        <button class="btn btn-success">
                            <a href="#" style="text-decoration: none;">
                                <span class=" d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-plus text-light"></i>
                                </span>
                            </a>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row border shadow rounded mt-4 py-2">
        <h4>Courses Offered</h4>
        <table id="example1" class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Course code</th>
                    <th>Description</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Units</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Thesis 1</td>
                    <td>Thesis Writing 1</td>
                    <td>3</td>
                    <td>0</td>
                    <td>3</td>
                    <td>
                        <button class="btn btn-danger">
                            <a href="#" style="text-decoration: none;">
                                <span class=" d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-xmark text-light"></i>
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
            searching: false,
            ordering: false,
            info: false,
            scrollX: true,
        });

        $('#example1').DataTable({
            searching: false,
            ordering: false,
            info: false,
            scrollX: true,
        });
    });

</script>
