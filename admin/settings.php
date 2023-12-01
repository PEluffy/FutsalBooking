<?php
require('inc/essentials.php');
adminLogin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANNEL</title>
    <?php require('inc/links.php');
    ?>
</head>

<body>
    <?php include("inc/header.php");
    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <h3 class="mb-4">SETTINGS</h3>
                <!-- General settings section -->
                <div class="card border-0 shadow mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form id="general_s_form">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">General Settings</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 ">
                                                    <label class="form-label">Site Title</label>
                                                    <input required type="text" name="site_title" id="site_title_inp" class="form-control shadow-none">
                                                </div>
                                                <div class="mb-3 ">
                                                    <label class="form-label">About Us</label>
                                                    <textarea required class="form-control shadow-none" id="site_about_inp" name="site_about" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="site_title.value=general_data.site_title,site_about.value=general_data.site_about" class="btn text-dark shadow-none" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary tex-white shadow-none">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>
                <!-- Shutdown section -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toogle">
                                </form>

                            </div>
                        </div>
                        <p class="card-text">
                            No customer will be allpowed to book hotel room ,when thw shutdown mode is turned on.
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <?php require('inc/scripts.php');
        ?>
        <script>
            let general_data;
            let general_s_form = document.getElementById('general_s_form');
            let site_title_inp = document.getElementById("site_title_inp");
            let site_about_inp = document.getElementById("site_about_inp");

            function get_general() {
                let site_title = document.getElementById("site_title");
                let site_about = document.getElementById("site_about");
                let shutdown_togggle = document.getElementById('shutdown-toogle');
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (xhr.status === 200 && this.readyState == 4) {
                        general_data = JSON.parse(this.responseText);
                        site_title.innerText = general_data.site_title;
                        site_about.innerText = general_data.site_about;
                        site_title_inp.value = general_data.site_title;
                        site_about_inp.value = general_data.site_about;

                        if (general_data.shutdown == 0) {
                            shutdown_togggle.checked = false;
                            shutdown_togggle.value = 0;
                        } else {
                            shutdown_togggle.checked = true;
                            shutdown_togggle.value = 1;
                        }

                    } else {
                        console.error("Request failed with status: " + xhr.status);
                    }
                };

                xhr.send('get_general');
            }


            general_s_form.addEventListener('submit', function(e) {
                e.preventDefault();
                upd_general(site_title_inp.value, site_about_inp.value);
            })

            var myModal = new bootstrap.Modal(document.getElementById('general-s'));

            function upd_general(site_title_val, site_about_val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            // Hide the modal using the initialized instance
                            myModal.hide();
                            console.log(xhr.responseText); // Log the response status
                            if (this.responseText == 1) {
                                alert('success', 'Changes saved!');
                                get_general();
                            } else {
                                alert('Error', 'no changes made!');
                            }
                        }
                    }
                };
                xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
            }

            window.onload = function() {
                get_general();
            }

            function upd_shutdown(val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            if (this.responseText == 1 && general_data.shutdown == 0) {
                                alert('success', 'Site has been shutdown!');

                            } else {
                                alert('success', 'Shutdown mode off!');
                            }
                            get_general();
                        }
                    }
                };
                xhr.send('upd_shutdown=' + val);

            }
        </script>

</body>

</html>