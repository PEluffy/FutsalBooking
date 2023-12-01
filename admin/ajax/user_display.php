<?php
require('../inc/essentials.php');
require('../inc/db_config.php');
adminLogin();

if (isset($_POST['upd_user'])) {
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');
    $query = "DELETE FROM `booking` WHERE `b_date` < ? OR (`b_date` = ? AND `b_time` <= ?)";
    $expiredQuery = "INSERT INTO expired_bookings (eb_name, eb_date, eb_time,eb_phn,eb_email) SELECT b_name, b_date, b_time,b_phn,b_email FROM booking WHERE b_date < ? OR (b_date = ? AND b_time < ?)";
    $updateStatusQuery = "UPDATE user_cred SET `book_status` = 0 WHERE `email` IN (SELECT `b_email` FROM booking WHERE b_date < ? OR (b_date = ? AND b_time < ?))";
    $values = [$currentDate, $currentDate, $currentTime];
    $valuesForExpired = [$currentDate, $currentDate, $currentTime];
    $valuesForStatusUpdate = [$currentDate, $currentDate, $currentTime];
    insert($expiredQuery, $valuesForExpired, 'sss');
    update($updateStatusQuery, $valuesForStatusUpdate, 'sss');
    $res = delete_data($query, $values, 'sss');
    echo $res;
}
