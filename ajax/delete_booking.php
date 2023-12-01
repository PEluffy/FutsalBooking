<?php
// Include your necessary PHP files and functions
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

// Start the session at the beginning of the script
session_start();

if (isset($_SESSION['userEmail'])) {
    $email = $_SESSION['userEmail'];

    // Check if the cancel_booking parameter is set in the POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_booking'])) {
        // Get the email from the POST data
        $emailFromPost = $_POST['email'];

        // Check if the email from the POST data matches the session email
        if ($emailFromPost === $email) {
            // Handle the cancel booking logic
            $query = "DELETE FROM `booking` WHERE `b_email` = ?";
            $values = [$email];
            $res = delete_data($query, $values, 's');

            $updateStatusQuery = "UPDATE user_cred SET `book_status` = 0 WHERE `email` = ?";
            update($updateStatusQuery, $values, 's');
        } else {
            // Handle a potential error (e.g., mismatched email)
            echo "Error: Email mismatch!";
        }
    }
} else {
    // Handle the case where the user is not logged in or the session is not properly set
    echo "Error: User not logged in.";
}
