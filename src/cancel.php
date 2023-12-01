<html>

<head>

</head>

<body>
    <?php
    $email = $_SESSION['userEmail'];
    ?>

    <button id="cancelBookingBtn" class="text-danger" onclick="cancelBooking()">Cancel Booking</button>

    <script>
        function cancelBooking() {
            // Make an AJAX request to your PHP file to handle cancellation logic
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../ajax/delete_booking.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Optional: Handle the response from the server if needed
                    console.log(xhr.responseText);
                }
            };

            // Get the email value
            var email = "<?php echo $email; ?>";

            // Send the request with parameters
            xhr.send("cancel_booking=true&email=" + encodeURIComponent(email));
        }
    </script>
</body>

</html>