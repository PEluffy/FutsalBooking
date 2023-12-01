<?php

require('../admin/inc/essentials.php');
require('../admin/inc/db_config.php');

if (isset($_POST['register'])) {

    $data = filteration($_POST);

    //match password and confirm password field
    if ($data['pass'] != $data['cpass']) {
        echo "Passwords do not match";
        exit;
    }
    //check user exists or not

    $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",
        [$data['email'], $data['phonenum']],
        'ss'
    );
    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already_exist' : 'phone_already_exist';
    } else {
        $hashed_password = password_hash($data['pass'], PASSWORD_DEFAULT);
        $q = "INSERT INTO `user_cred` (`email`,`name`,`phonenum`, `password`) VALUES (?, ?, ?, ?)";
        $values = [$data['email'], $data['name'],  $data['phonenum'], $hashed_password];
        if (insert($q, $values, 'ssss')) {
            echo 'success';
        } else {
            echo 'error to insert';
        }
    }
}
if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);
    $email = $frm_data['u_mail'];
    $password = $frm_data['u_pass'];

    // Query the database to retrieve the hashed password for the given email
    $query = "SELECT * FROM `user_cred` WHERE `email`=?";
    $values = [$email];
    $datatypes = "s";
    $res = select($query, $values, $datatypes);

    if ($res->num_rows == 1) {
        $row = mysqli_fetch_assoc($res);
        $hashed_password = $row['password'];

        // Verify the provided password against the hashed password from the database
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['userLogin'] = true;
            $_SESSION['userEmail'] = $row['email'];
            echo 'success';
        } else {
            echo 'error Login failed - Invalid password!';
        }
    } else {
        echo 'error Login failed - Email not found!';
    }
}
