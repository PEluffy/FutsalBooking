<?php
require('../admin/inc/essentials.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font text-primary " id="main_title" href="index.php">PK FUTSAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-2">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link " href="courts.php">Courts</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>

            </ul>
            <div class="d-flex">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] === true) {
                    // User is logged in, display "Logout" and "Booking" buttons
                    $logoutUrl = '../inc/logout.php'; // Replace with the actual URL for logging out
                    $bookingUrl = '../inc/booking.php'; // Replace with the actual URL for booking
                    $profile = '../src/profile.php';
                ?>
                    <button type="button" class="btn btn-outline-primary shadow-none me-lg-3 me-2" onclick="window.location.href='<?php echo $profile; ?>'">
                        Profile
                    </button>
                    <button type="button" class="btn btn-outline-primary shadow-none me-lg-3 me-2" onclick="window.location.href='<?php echo $logoutUrl; ?>'">
                        Logout
                    </button>
                    <button type="button" class="btn btn-outline-primary shadow-none" onclick="window.location.href='<?php echo $bookingUrl; ?>'">
                        Booking
                    </button>
                <?php
                } else {
                    // User is not logged in, display "Login" and "Register" buttons
                ?>
                    <button type="button" class="btn btn-outline-primary shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#LoginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-primary shadow-none" data-bs-toggle="modal" data-bs-target="#RegisterModal">
                        Register
                    </button>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>
<!-- login modal -->
<div class="modal fade " id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center text-primary" id="staticBackdropLabel">
                        <i class="bi bi-person-circle me-2 fs-3"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="u_mail">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="u_pass">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-primary shadow-none">LOGIN</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forget Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- registration MOdal-->
<div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class=" modal-header">
                    <h5 class="modal-title d-flex align-items-center text-primary" id="staticBackdropLabel">
                        <i class="bi bi-person-fill-add me-2 fs-3 "></i>User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-danger mb-3 text-wrap text-uppercase " id="alerttext">

                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3 p-1">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3 p-1">
                                <label class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3 p-1">
                                <label class="form-label">Phone Number</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3 p-1">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3 p-1">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary shadow-none" name="register">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let register_form = document.getElementById('register-form');
    let login_form = document.getElementById('login-form');
    let alert_text = document.getElementById('alerttext');
    register_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();
        data.append('name', register_form.elements['name'].value);
        data.append('email', register_form.elements['email'].value);
        data.append('phonenum', register_form.elements['phonenum'].value);
        data.append('pass', register_form.elements['pass'].value);
        data.append('cpass', register_form.elements['cpass'].value);
        data.append('name', register_form.elements['name'].value);
        data.append('register', '');
        console.log(data);


        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/login_register.php", true);
        xhr.onload = function() {
            if (xhr.status === 200 && this.readyState == 4) {

                if (this.responseText == "success") {
                    var myModal = document.getElementById('RegisterModal');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                } else {
                    alert_text.innerText = this.responseText + "  !Plz try again";
                }
            } else {
                console.error("Request failed with status: " + xhr.status);
            }
        };
        xhr.send(data);
    });
    login_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();
        data.append('u_mail', login_form.elements['u_mail'].value);
        data.append('u_pass', login_form.elements['u_pass'].value);
        data.append('login', '');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/login_register.php", true);
        xhr.onload = function() {
            if (xhr.status === 200 && this.readyState == 4) {
                if (this.responseText === "success") {
                    var myModal = document.getElementById('LoginModal');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();
                    // Redirect to the next page
                    console.log("success");
                    window.location.href = "../src/index.php";
                    /// Replace with your desired page URL
                } else {
                    // Handle errors or show a message to the user
                    console.error("Login failed.");
                }

            } else {
                console.error("Request failed with status: " + xhr.status);
            }
        };
        xhr.send(data);
    });
</script>