<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
$shutdownQuery = "select shutdown from settings where sr_no=1";
$result = mysqli_query($con, $shutdownQuery);
session_start();
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $shutdown = $row['shutdown'];
}

if (!(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true)) {
    echo "<script>
    window.location.href='../src/index.php';
    </script>";
} elseif (!($shutdown == 0)) {
    echo "<script>
    window.location.href='../src/index.php';
    </script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../src/main.css">
</head>

<body>
    <div class="booking-form p-5 text-center rounded bg-white shadow overflow-hidden">
        <form id="booking-form">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label font-weight-bold">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name..." name="name">
            </div>
            <div class="mb-3">
                <label for="bookdate" class="form-label font-weight-bold">Date</label>
                <input class=" form-control" id="bookdate" type="date" name="date"></input>
            </div>
            <div class="mb-3">
                <label for="booktime" class="form-label font-weight-bold">Time</label>
                <input class=" form-control" id="booktime" type="time" name="time" step="3600"></input>
            </div>
            <div class="mb-3">
                <label for="booknumber" class="form-label font-weight-bold">Phone Number</label>
                <input class=" form-control" id="booknumber" type="text" name="phn" placeholder="contact..."></input>
            </div>
            <div class="mb-3">
                <input class="btn form-control btn-primary" id="submit" type="submit" name="submit"> </input>
            </div>
        </form>
    </div>
    <script>
        let booking_form = document.getElementById('booking-form');
        booking_form.addEventListener('submit', (e) => {
            e.preventDefault();

            let data = new FormData();
            data.append('name', booking_form.elements['name'].value);
            data.append('date', booking_form.elements['date'].value);
            data.append('time', booking_form.elements['time'].value);
            data.append('phn', booking_form.elements['phn'].value);
            data.append('book', '');
            console.log(data.get('date'));
            console.log(data.get('time'));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../ajax/booking_crud.php", true);
            xhr.onload = function() {
                if (xhr.status === 200 && this.readyState == 4) {
                    window.location.href = "../src/index.php";
                    console.log(this.responseText);
                } else {
                    console.error("Request failed with status: " + xhr.status);
                }
            };
            xhr.send(data);
        });
    </script>
</body>

</html>