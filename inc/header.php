<?php 
    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
?>

<!-- navbar -->
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#">BAD Hotel</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link me-2" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="contact.php">Contact Us</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">About</a>
                </li> -->
            </ul>
            <!-- perbuttonan -->
            <div class="d-flex">
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button" id="registButton" class="btn btn-outline-dark shadow-none me-lg-2" data-bs-toggle="modal" data-bs-target="#registModal">
                    Register
                </button>
                <!-- <a href="admin/index.php" class="btn btn-outline-dark shadow-none" role="button">Admin</a> -->
                <!-- <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#adminModal">
                    Admin
                </button> -->
            </div>
        </div>
    </div>
</nav>

    <!-- modal login-->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-people-fill fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-outline-dark shadow-none">Login</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot password?</a>
                        <!-- <a href="" data-bs-toggle="modal" data-bs-target="#registModal" data-bs-dismiss="modal">Don't have any account? Regist here</a> -->
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- modal register -->
    <div class="modal fade" id="registModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-plus-fill fs-3 me-2"></i>User Register
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <label class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>   
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone number</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" min=0 required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <button type="submit" class="btn btn-outline-dark shadow-none">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>