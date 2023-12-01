<?php
require('inc/essentials.php');
require('inc/db_config.php');
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
    <style>
        .yellow-row {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <?php include("inc/header.php");

    $query = "select uc.email,uc.name,uc.phonenum,uc.book_status,b.b_time,b.b_date FROM user_cred uc LEFT JOIN booking b ON uc.email=b.b_email";
    $result = mysqli_query($con, $query);

    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Usermail</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Phonenum</th>
                            <th scope="col">Booking Status</th>
                            <th scope="col">Booking Time</th>
                            <th scope="col">Booking Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<tr";
                            if ($rows['book_status'] == 0) {
                                echo " class='yellow-row'";
                            }
                            echo ">";
                            echo "<td>" . $rows['email'] . "</td>";
                            echo "<td>" . $rows['name'] . "</td>";
                            echo "<td>" . $rows['phonenum'] . "</td>";
                            if ($rows['book_status'] == 0) {
                                echo "<td class='text-center' colspan='3'>no booking done yet</td>";
                            } else {
                                echo "<td >booked</td>";
                            }
                            if (isset($rows['b_time'])) {
                                echo "<td>" . $rows['b_time'] . "</td>";
                                echo "<td>" . $rows['b_date'] . "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <?php require('inc/scripts.php');
    ?>
    <script>
        function upd_user() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/user_display.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Hide the modal using the initialized instance
                        console.log(xhr.responseText); // Log the response status
                        if (this.responseText == 1) {
                            alert('success', 'user table updated');
                        } else {
                            alert('Error', 'no changes made!');
                        }
                    }
                }
            };
            xhr.send('upd_user');
        }
        window.onload = function() {
            upd_user();
        }
    </script>
    +
</body>

</html>