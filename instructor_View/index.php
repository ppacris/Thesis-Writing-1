<?php 
    include_once '../navbar_headerfooter/headr.php';
?>
<title>Instructor > View</title>

<section class="container pt-3">
    <div class="row">
        <div class="col">
            <h3><i class="fa-solid fa-address-book"></i> List of Instructors</h3>
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
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</section>

<div class="container">
    <div class="row border shadow rounded">
        <h4 class="pt-2">Instructors Data</h4>
        <hr />
        <div class="col pb-3">
            <table id="example" class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Full Name</th>
                        <th>College</th>
                        <th>Department</th>
                        <th>Faculty Status</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Pacris, Arnniel Kheneth D.</td>
                        <td>College of Computer Science</td>
                        <td>IT</td>
                        <td>Part Time</td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="../instructor_Update/">
                                    <span class=" d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-user-pen text-light"></i>
                                    </span>
                                </a>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>002</td>
                        <td>Pacris, Arnniel Kheneth D.</td>
                        <td>College of Computer Science</td>
                        <td>IT</td>
                        <td>Full Time</td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="../instructor_Update/">
                                    <span class=" d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-user-pen text-light"></i>
                                    </span>
                                </a>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>003</td>
                        <td>Pacris, Arnniel Kheneth D.</td>
                        <td>College of Computer Science</td>
                        <td>IT</td>
                        <td>Full Time</td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="../instructor_Update/">
                                    <span class=" d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-user-pen text-light"></i>
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
