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


</head>

<body>
    <?php include("inc/header.php");
    $query1 = "SELECT COUNT(*) as no_of_users FROM user_cred";
    $result1 = mysqli_query($con, $query1);
    $query2 = "SELECT COUNT(*) as no_of_booking FROM booking";
    $result2 = mysqli_query($con, $query2);
    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <div class="card border-primary mb-3 user-card">
                    <div class="card-header">Users</div>
                    <div class="card-body text-danger">
                        <?php
                        if ($result1) {
                            $row = mysqli_fetch_assoc($result1);
                            $rowCount = $row['no_of_users'];
                            echo "<h5>$rowCount users are registered.</h5>";
                        }
                        ?>

                    </div>
                </div>
                <div class="card border-primary mb-3 user-card">
                    <div class="card-header">Booking</div>
                    <div class="card-body text-danger">
                        <?php
                        if ($result2) {
                            $row = mysqli_fetch_assoc($result2);
                            $rowCount = $row['no_of_booking'];
                            echo "<h5>$rowCount booking is done</h5>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php require('inc/scripts.php');
    ?>
</body>

</html>