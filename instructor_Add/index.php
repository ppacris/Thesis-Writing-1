<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Instructor > Add</title>


<section class="container pt-3">
    <div class="row">
        <div class="col">
            <h3><i class="fa fa-user-plus"></i> Add New Instructor</h3>
        </div>

        <div class="col d-flex justify-content-end">
            <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../homepage/" class="text-dark" style="text-decoration: none;">
                            <i class="fa fa-house"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Instructor</li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</section>

<div class="container">
    <form action="">
        <div class="row border rounded shadow mb-4">
            <h4 class="pt-2">Personal Information</h4>
            <hr>
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="idnum" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" placeholder="Employee ID" id="idnum">
                    </div>
                    <div class="col-9">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Email Address" id="email">
                    </div>
                </div>

                <div class="row border shadow-sm rounded mx-1 pb-2 mb-3">
                    <label for="fullname" class="form-label pt-1">Full name</label>
                    <div class="col-lg col-md-4 col-sm-5 pb-2">
                        <input type="text" class="form-control" placeholder="Last name" id="fullname">
                    </div>
                    <div class="col-lg col-md-4 col-sm-5">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col-lg col-md-4 col-sm-2">
                        <input type="text" class="form-control" placeholder="M.I">
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-3">
                        <input type="text" class="form-control" placeholder="Suffix">
                    </div>
                </div>

                <div class="row border shadow-sm rounded mx-1 pb-2 mb-3 justify-content-center">
                    <label for="address" class="form-label pt-1">Address</label>
                    <div class="col-sm-6 pb-2">
                        <input type="text" class="form-control" placeholder="Street address" id="address">
                    </div>
                    <div class="col-sm-6 pb-2">
                        <input type="text" class="form-control" placeholder="Barangay">
                    </div>
                    <div class="col-sm-6 pb-2">
                        <input type="text" class="form-control" placeholder="Municipality / City">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Province">
                    </div>
                </div>
            </div>
        </div>

        <div class="row border rounded shadow mb-4">
            <h4 class="pt-2">Other Information</h4>
            <hr>
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col">
                        <label for="College" class="form-label">College</label>
                        <select class="form-select" id="College">
                            <option selected="">Select</option>
                            <option value="College of Computer Science">College of Computer Science</option>
                            <option value="Information Technology">College of Information Technology</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Department" class="form-label">Department</label>
                        <select class="form-select" id="Department">
                            <option selected="">Select</option>
                            <option value="IT">IT</option>
                            <option value="ACCOUNTING">ACCOUNTING</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Employeestat" class="form-label">Employee Status</label>
                        <select class="form-select" id="Employeestat">
                            <option selected="">Select</option>
                            <option value="College of Computer Science">Full Time</option>
                            <option value="Information Technology">Part Time</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-3 justify-content-end">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
</div>


<?php 
    include_once '../navbar_headerfooter/footr.php';
?>
