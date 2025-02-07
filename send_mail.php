<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer Include
require 'vendor/autoload.php'; // Agar aapne composer se install kiya hai
// require 'path/to/PHPMailerAutoload.php'; // Agar manually use kar rahe hain

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['tel']);
    $persons = htmlspecialchars($_POST['persons']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);

    // SMTP Configuration
    $mail = new PHPMailer(true);
    
    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com'; // Apna Gmail Email
        $mail->Password   = 'your-app-password'; // Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender & Recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('ali@gmail.com', 'Ali'); // Jis email pr bhejna hai

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Table Booking Request";
        $mail->Body    = "
            <html>
            <head>
                <title>New Booking Request</title>
            </head>
            <body>
                <h2>Booking Details</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Persons:</strong> $persons</p>
                <p><strong>Date:</strong> $date</p>
                <p><strong>Time:</strong> $time</p>
            </body>
            </html>
        ";

        // Send Email
        $mail->send();
        echo "Your booking has been sent successfully!";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid Request!";
}
?>
