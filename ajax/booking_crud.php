<?php

require('../admin/inc/essentials.php');
require('../admin/inc/db_config.php');

if (isset($_POST['book'])) {

    $data = filteration($_POST);
    $today = date('Y-m-d');
    $tomorrow = date('Y-m-d', strtotime('+1 day', strtotime($today)));
    $dayafter = date('Y-m-d', strtotime('+2 day', strtotime($today)));
    $dates = [$today, $tomorrow, $dayafter];
    $times = array();

    // for ($hour = 6; $hour <= 20; $hour++) {
    //     $time = sprintf('%02d:00:00', $hour); // Format as HH:00:00
    //     array_push($times, $time);
    // }

    $time_exist = select(
        "SELECT * FROM `booking` WHERE `b_time`=? AND `b_date`=? LIMIT 1",
        [$data['time'], $data['date']],
        'ss'
    );
    if (!in_array($data['date'], $dates)) {
        echo "cant book in this date";
        //} elseif (!in_array($data['time'], $times)) {
        //     echo  'cant book in this time';
    } elseif (mysqli_num_rows($time_exist) != 0) {
        echo  'already booked';
    } else {
        $q = "INSERT INTO `booking` (`b_name`, `b_date`, `b_time`, `b_phn`,`b_email`) VALUES (?, ?, ?, ?,?)";
        session_start();
        $values = [$data['name'], $data['date'], $data['time'], $data['phn'], $_SESSION['userEmail']];
        if (insert($q, $values, 'sssss')) {
            $updatUserStatusQuery = 'UPDATE user_cred
            SET book_status = 1
            WHERE `email`=?';
            $updateUserStatusValues = [$_SESSION['userEmail']];
            if (update($updatUserStatusQuery, $updateUserStatusValues, 's')) {
                echo "success";
            } else {
                echo "error while updating user book status";
            }
            $r = $_SESSION['userEmail'];
            sendNotification($r);
        } else {
            echo 'error to insert';
        }
    }
}
