<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';



function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
        window.location.href='index.php';
        </script>";
    }
}

function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-sucess" : "alert-danger";

    echo <<<alert
                    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                     <strong class="me-3">$msg</strong>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
}

function redirect($url)
{
    echo "<script>
      window.location.href='$url';
      </script>";
}
// function sendNotificationToUser()
// {

//     // Required if your environment does not handle autoloading
//     require __DIR__ . '/vendor/autoload.php';

//     // Your Account SID and Auth Token from console.twilio.com
//     $sid = "AC68df4f4998969f22c90ec18b0188bbc0";
//     $token = "f166129cd5dbe90a470e95eda20067a8";
//     $client = new Twilio\Rest\Client($sid, $token);

//     // Use the Client to make requests to the Twilio REST API
//     $message = $client->messages->create(
//         // The number you'd like to send the message to
//         '+9779869296810',
//         [
//             // A Twilio phone number you purchased at https://console.twilio.com
//             'from' => '+17853902347',
//             // The body of the text message you'd like to send
//             'body' => "Hey Jenny! Good luck on the bar exam!"
//         ]
//     );
// }
function sendNotification($receiver)
{
    try {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kafleprashanna4444@gmail.com';                     //SMTP username
        $mail->Password   = 'pxtt zlzt xfhf ldpj';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kafleprashanna4444@gmail.com');
        $mail->addAddress($receiver);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'FUtsal booking';
        $mail->Body    = 'dear customer your desired futsal time has been booked';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
