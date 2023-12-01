<?php
require('../admin/inc/essentials.php');
require('../admin/inc/db_config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANNEL</title>
    <?php require('../inc/links.php');    ?>
</head>

<body>

    <?php
    session_start();
    $email = $_SESSION['userEmail'];
    $query = "select uc.email,uc.name,uc.phonenum,uc.book_status,b.b_time,b.b_date FROM user_cred uc LEFT JOIN booking b ON uc.email=b.b_email WHERE uc.email='$email'";
    $result = mysqli_query($con, $query);

    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10  p-4 mt-5 mb-5 overflow-hidden ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Usermail</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Phonenum</th>
                            <th scope="col">Booking Status</th>
                            <th scope="col">Booking Time</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
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
                                echo "<td>";
                                include('payment.php');
                                echo "</td>";
                                echo "<td>";
                                include('cancel.php');
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <?php require('../inc/footer.php');    ?>
</body>

</html>