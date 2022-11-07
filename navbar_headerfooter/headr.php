<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Bootstrap DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <!-- Link CSS Connection Start -->
    <!-- FontAwesome Icon CSS -->
    <link rel="stylesheet" href="../fontawesomeV6/css/all.css">

    <!-- Styles per Page Start -->
    <link rel="stylesheet" href="../homepage/style-homepage.css">

    <!-- Styles per Page End -->
    <!-- Link CSS Connection Start End -->
</head>

<style>
    #main-dropdown {
        left: calc(-670%);
    }

    .sub-dropdown-menu {
        display: none;
        position: absolute;
        top: calc(7%);
        left: calc(-68.1%);
    }

    .sub-dropdown-menu-CM {
        display: none;
        position: absolute;
        top: calc(7%);
        left: calc(-80.2%);
    }

    .sub-dropdown:hover .sub-dropdown-menu,
    .sub-dropdown:hover .sub-dropdown-menu-CM {
        display: block;
    }

    #logout:hover {
        background-color: rgba(220, 53, 69);
        opacity: 1;
    }

</style>

<body>
    <!-- Start navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark rounded-bottom">
        <div class="container">
            <!-- navbar-brand -->
            <a href="../homepage/" class="navbar-brand">CGC - FSS</a>
            <!--Start navbar-nav (unordered list) w/ nav-item (list item)-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <a href="#" class="nav-link active icon-hover1" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-current="page">
                        <!-- Icon in navbar -->
                        <i class="fa-solid fa-user-gear fa-lg icon-color1"></i>
                        <span class="fw-bold fa-lg text-info"> | </span>
                    </a>

                </li>

                <li class="nav-item dropdown dropstart">
                    <a href="#" class="nav-link active dropdown-toggle text-info icon-hover2" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Icon in navbar -->
                        <i class="fa-solid fa-users-viewfinder fa-lg text-light icon-color2"></i>
                        <span class="fw-bold fa-lg text-info"> | </span>
                    </a>
                    <ul class="dropdown-menu shadow">
                        <div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Instructor</div>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../instructor_Add/">
                                <!--Icon-->
                                <i class="fa-solid fa-user-plus fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Add
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../instructor_View/">
                                <!--Icon-->
                                <i class="fa-solid fa-id-card fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                View
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown dropstart">
                    <a href="#" class="nav-link active dropdown-toggle text-info icon-hover3" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Icon in navbar -->
                        <i class="fa-solid fa-graduation-cap fa-lg text-light icon-color3"></i>
                        <span class="fw-bold fa-lg text-info"> | </span>
                    </a>
                    <ul class="dropdown-menu shadow">
                        <div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Curriculum Management</div>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../curriculumManagement_Curriculum/">
                                <!--Icon-->
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Curriculum
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../curriculumManagement_CourseOffer/">
                                <!--Icon-->
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Course Offer
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../curriculumManagement_CourseScheduling/">
                                <!--Icon-->
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Course Schedule
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown dropstart">
                    <a href="#" class="nav-link active dropdown-toggle text-info icon-hover4" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Icon in navbar -->
                        <i class="fa-solid fa-building fa-lg text-light icon-color4"></i>
                        <span class="fw-bold fa-lg text-info"> | </span>
                    </a>
                    <ul class="dropdown-menu shadow">
                        <div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Maintenance Management</div>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../maintenanceManagement_Section/">
                                <!--Icon-->
                                <i class="fa-solid fa-gears fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Section
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../maintenanceManagement_Room/">
                                <!--Icon-->
                                <i class="fa-solid fa-gears fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Room
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item dropdown dropstart">
                    <a href="#" class="nav-link active dropdown-toggle text-info icon-hover5" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Icon in navbar -->
                        <i class="fa-solid fa-list fa-lg text-light icon-color5"></i>
                        <span class="fw-bold fa-lg text-info"> | </span>
                    </a>
                    <ul class="dropdown-menu shadow">
                        <div class="text-center fw-bold bg-info rounded-5 mx-1 p-1">Reports</div>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <!--Icon-->
                                <i class="fa-regular fa-clipboard fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Instructor
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <!--Icon-->
                                <i class="fa-regular fa-clipboard fa-lg"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Room
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <!--Icon-->
                                <i class="fa-regular fa-envelope"></i>
                                <span class="fw-bold fa-lg text-info"> | </span>
                                Email
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link active icon-hover6">
                        <!--Icon-->
                        <i class="fa-solid fa-id-card-clip fa-lg icon-color6"></i>
                        <span class="fw-bold fa-lg text-info"> | </span>
                    </a>
                </li>

                <!-- navbar-item dropdown Start -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <!-- navbar-menu Start -->
                    <ul class="dropdown-menu shadow" id="main-dropdown">
                        <hr class="dropdown-divider">
                        <!-- navbar-menu button -->
                        <li class="dropdown dropstart sub-dropdown">
                            <pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-users-viewfinder fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Instructor</span></a></pre>
                            <ul class="dropdown-menu shadow-lg sub-dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="../instructor_Add/">
                                        <!--Icon-->
                                        <i class="fa-solid fa-user-plus"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Add
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-solid fa-id-card"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        View
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr class="dropdown-divider">

                        <li class="dropdown dropstart sub-dropdown">
                            <pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-graduation-cap fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Curriculum Management</span></a></pre>
                            <ul class="dropdown-menu shadow-lg sub-dropdown-menu-CM">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Curriculum
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Course Offer
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Course Schedule
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr class="dropdown-divider">

                        <li class="dropdown dropstart sub-dropdown">
                            <pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-building fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Maintenance Management</span></a></pre>
                            <ul class="dropdown-menu shadow-lg sub-dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-solid fa-gears"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Section
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-solid fa-gears"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Room
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr class="dropdown-divider">

                        <li class="dropdown dropstart sub-dropdown">
                            <pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-list fa-lg text-dark"></i> <br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">Reports</span></a></pre>
                            <ul class="dropdown-menu shadow-lg sub-dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-regular fa-clipboard"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Instructor
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-regular fa-clipboard"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Room
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <!--Icon-->
                                        <i class="fa-regular fa-envelope"></i>
                                        <span class="fw-bold fa-lg text-info"> | </span>
                                        Email
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr class="dropdown-divider">

                        <li class="dropdown dropstart">
                            <pre><a class="dropdown-item text-info" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fa-solid fa-id-card-clip fa-lg text-dark"></i><br>
                            <span class="dropdown-toggle"></span>
                            <span class="fw-bold fa-lg text-info">    |</span>
                            <span class="text-dark">name</span></a></pre>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="text-end">
                            <a class="dropdown-item rounded" href="#" id="logout">
                                <span class="fw-semibold">log out</span>
                                <span class="fw-bold text-info">|</span>
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- navbar-menu End -->
                </li>
                <!-- navbar-item dropdown End -->
            </ul>
            <!-- End navbar-nav (unordered list) w/ nav-item (list item) -->
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
                        <span>
                            <!--Icon-->
                            <i class="fa-solid fa-circle-plus"></i>
                        </span>
                        Register
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <form>
                        <!-- input-group -->
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <!--Icon-->
                                <i class="fa-solid fa-user-tie fa-lg"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="row g-2">
                            <!-- input-group -->
                            <div class="col input-group mb-2">
                                <span class="input-group-text">
                                    <!--Icon-->
                                    <i class="fa-solid fa-user fa-lg"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                            <!--input-group-->
                            <div class="col input-group mb-2">
                                <span class="input-group-text">
                                    <!--Icon-->
                                    <i class="fa-solid fa-user fa-lg"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <!-- input-group -->
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <!--Icon-->
                                <i class="fa-solid fa-key fa-lg"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <!-- input-group -->
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <!--Icon-->
                                <i class="fa-solid fa-key fa-lg"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Repeat password">
                        </div>
                        <!-- select -->
                        <div class="row mb-2">
                            <div class="col-sm-3 d-flex justify-content-center align-items-center fw-bold">
                                User Level :
                            </div>
                            <div class="col-sm-9">
                                <select class="form-select">
                                    <option value="Admin">Admin</option>
                                    <option value="Scheduler">Scheduler</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- index file -->
    <div class="container-fluid">
