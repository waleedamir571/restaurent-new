<?php
//require_once('../PHPMailer/class.phpmailer.php');
//require_once('../PHPMailer/class.smtp.php');
// require_once('../PHPMailer/mail_test.php');
// require '../mailchimp-api-master/src/MailChimp.php';

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';
require '../vendor/autoload.php';
require '../config/dbc.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Name Email Phone Message Form
function nameEmailPhoneMessageForm($payload, $con)
{

    try {
        //DB FIRST
        $page = $_POST['page'];

        $name = mysqli_real_escape_string($con, $payload['name']);
        $email = mysqli_real_escape_string($con, $payload['email']);
        $phone = mysqli_real_escape_string($con, $payload['phone']);
        $total_persons = mysqli_real_escape_string($con, $payload['persons']);
        $date = mysqli_real_escape_string($con, $payload['date']);
        $time = mysqli_real_escape_string($con, $payload['time']);
        mysqli_query($con, "INSERT INTO leads(page,name,email,phone,total_persons,date,time) VALUES('$page','$name','$email','$phone','$total_persons','$date','$time')") or die(mysqli_error($con));

        //EMAIL NOTIFICATION
        $emailContent = '<p>Page : ' . $payload['page'] . '</p>';
        $emailContent .= '<p>Name : ' . $payload['name'] . '</p>';
        $emailContent .= '<p>Email : ' . $payload['email'] . '</p>';
        $emailContent .= '<p>Phone Number : ' . $payload['phone'] . '</p>';
        $emailContent .= '<p>Total Persons : ' . $payload['persons'] . '</p>';
        $emailContent .= '<p>Date : ' . $payload['date'] . '</p>';
        $emailContent .= '<p>Time : ' . $payload['time'] . '</p>';

        sendEmail($emailContent);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

// Function to send email with attachment
function sendEmail($message, $subject = 'Lead from dollyhide.com', $to = 'asad.cybertron@gmail.com', $fromName = 'Leads')
{
    $mail = new PHPMailer(true);
    try {
        // Main email settings
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '98e18ae4e838db';
        $mail->Password = '52f92054324eb9';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 465;

        // Set main email parameters
        $mail->setFrom('ddd55a3257-7e05c5+1@inbox.mailtrap.io', $fromName);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();

        // // Auto-reply email settings
        // $autoReplySubject = 'Thank you for contacting Cabby';
        // $autoReplyMessage = '';

        // // Check which form was submitted and set the appropriate auto-reply message
        // if (isset($_POST["submit_contact"])) {
        //     $autoReplyMessage = "Dear {$_POST['name']},<br>";
        //     $autoReplyMessage .= "
        //     <p>Thank you for reaching out to Cabby!<br>Our Cabby have received your query and are working on it as of now.<br>Expect to hear back from us within 24 hours.</p>
        //     <p>Thanks for your patience and interest in our work!</p>
        //     <p><b>Warm regards,</b></p>
        //     <p>The Cabby Team.</p>
        //     <img src='https://findmycabby.com/assets/img/favicon.ico' alt='Cabby' style='max-width: 100px;'>
        // ";
        // } elseif (isset($_POST["submit_newsletter"])) {
        //     $autoReplyMessage = "Hi {$_POST['name']},<br>";
        //     $autoReplyMessage .= "Thank you for subscribing to our newsletter! We will keep you updated with our latest news and offers.";
        // }

        // $autoReply = new PHPMailer(true);
        // $autoReply->isSMTP();
        // $autoReply->Host = 'smtp.hostinger.com';
        // $autoReply->SMTPAuth = true;
        // $autoReply->Username = 'noreply@findmycabby.com';
        // $autoReply->Password = '@Cabby2024'; // Use the same password as the main email
        // $autoReply->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        // $autoReply->Port = 465;

        // // Get the email address from the form data ($_POST or any other source)
        // $recipientEmail = isset($_POST["email"]) ? $_POST["email"] : '';

        // // Set auto-reply email parameters
        // $autoReply->setFrom('noreply@findmycabby.com', 'Cabby');
        // $autoReply->addAddress($recipientEmail);
        // $autoReply->isHTML(true);
        // $autoReply->Subject = $autoReplySubject;
        // $autoReply->Body = $autoReplyMessage;
        // $autoReply->send();

        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// function sendEmail($message, $subject = 'Lead from no-reply@hancockpublishers.com', $to = 'info@hancockpublishers.com', $fromName = 'Hancock Publishers')
// {
//     // Set up additional headers
//     $headers = "From: {$fromName} <no-reply@hancockpublishers.com>\r\n";
//     $headers .= "Reply-To: no-reply@hancockpublishers.com\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//     try {
//         // Attempt to send the main email
//         if (mail($to, $subject, $message, $headers)) {
//             // Send auto-reply email
//             $autoReplySubject = 'Hancockpublishers has Received Your Message!';
//             $autoReplyMessage = "
//                 <p>Dear <b>{$_POST['name']},</b></p>
//                 <p>Thank you for reaching out to Hancockpublishers! Our Hancockpublishers have received your query and are working on it as of now. Expect to hear back from us within 24 hours. For quick answers, you might find our <a href='https://hancockpublishers.com/faq'>FAQ</a> page helpful.</p>
//                 <p>Thanks for your patience and interest in our work!</p>
//                 <br><br>
//                 <p><b>Warm regards,</b></p>
//                 <p>The Hancockpublishers Team.</p>
//                 <br>
//                 <img src='https://hancockpublishers.com/assets/img/logo.png' alt='Hancockpublishers' style='max-width: 200px;'>
//                 <p>Email: <a href='mailto:info@hancockpublishers.com'>info@hancockpublishers.com</a>
//                 <br>Phone number: <a href='tel:(415) 520-1098'>(415) 520-1098</a>
//                 <br>Address: 895 Dove Street. Newport Beach, CA 92660 United States</p>
//             ";

//             // Send auto-reply email
//             if (mail($_POST["email"], $autoReplySubject, $autoReplyMessage, $headers)) {
//                 echo 'Email sent successfully!';
//             } else {
//                 echo 'Failed to send auto-reply email.';
//             }
//         } else {
//             echo 'Failed to send email.';
//         }
//     } catch (Exception $e) {
//         echo "Message could not be sent. Error: {$e->getMessage()}";
//     }
// }


// function sendEmailWithAttachment($message, $subject = 'Lead from no-reply@hancockpublishers.com', $to = 'no-reply@hancockpublishers.com', $fromName = 'Hancock Publishers', $attachmentPath = null)
// {
//     // Read the file content
//     $fileContent = file_get_contents($attachmentPath);
//     $fileContent = chunk_split(base64_encode($fileContent)); // Encode the file content

//     // Prepare a boundary string
//     $boundary = md5(time());

//     // Set up headers
//     $headers = "From: {$fromName} <no-reply@hancockpublishers.com>\r\n";
//     $headers .= "Reply-To: no-reply@hancockpublishers.com\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

//     // Prepare the email body
//     $body = "--{$boundary}\r\n";
//     $body .= "Content-Type: text/html; charset=iso-8859-1\r\n";
//     $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
//     $body .= $message . "\r\n"; // Add the HTML message
//     $body .= "--{$boundary}\r\n";

//     // Add attachment
//     $body .= "Content-Type: application/octet-stream; name=\"" . basename($attachmentPath) . "\"\r\n";
//     $body .= "Content-Transfer-Encoding: base64\r\n";
//     $body .= "Content-Disposition: attachment; filename=\"" . basename($attachmentPath) . "\"\r\n\r\n";
//     $body .= $fileContent . "\r\n"; // Add the file content
//     $body .= "--{$boundary}--"; // End boundary

//     // Attempt to send the email
//     if (mail($to, $subject, $body, $headers)) {
//         return true; // Return true on success
//     } else {
//         return false; // Return false on failure
//     }
// }


// function sendEmailWithAttachment($message, $subject = 'Lead from hancockpublishers.com', $to = ' info@hancockpublishers.com', $fromName = 'Hancock Publishers')
// {
//     $mail = new PHPMailer;
//     $mail->IsSMTP();
//     $mail->Host = 'smtpout.secureserver.net';
//     $mail->Port = 465;
//     $mail->SMTPAuth = true;
//     $mail->Username = 'no-reply@hancockpublishers.com';
//     $mail->Password = '@Cybertron2024';
//     $mail->isHTML(true);
//     $mail->From = 'noreply@hancockpublishers.com';
//     $mail->FromName = $fromName;
//     $mail->AddAddress($to);
//     $mail->Subject = $subject;
//     $mail->Body    = $message;
//     if (!$mail->send()) {
//         // echo 'Message could not be sent.';
//         // echo 'Mailer Error: ' . $mail->ErrorInfo;
//         // exit;
//     }
// }


//------------  --------------------------HELPERS------------------------------------------
//SEND Email For Godaddy to Gmail
// function sendEmail($message, $subject = 'Lead from noreply@hancockpublishers.com', $to = 'leads@hancockpublishers.com', $fromName = 'Hancock Publishers')
// {
//     $mail = new PHPMailer(true);
//     try {
//         // Server settings
//         $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//         $mail->isSMTP();
//         $mail->Host = 'hancockpublishers.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'noreply@hancockpublishers.com';
//         $mail->Password = 'mPio+n)45OTs';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $mail->Port = 465;

//         // Recipients for the main email
//         $mail->setFrom('noreply@hancockpublishers.com');
//         $mail->addAddress($to);

//         // Content for the main email
//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body = $message;
//         $mail->send();

//         // Auto-reply email
//         // $autoReplySubject = 'Thank you for contacting Hancockpublishers';
//         // $autoReplyMessage = "Thank you for getting in touch with Hancockpublishers! Your message has been received, and we appreciate your interest. Our team is currently reviewing your inquiry and will get back to you as soon as possible.";

//         $autoReplySubject = 'Hancockpublishers has Received Your Message!';
//         $autoReplyMessage = "
//             <p><b>Dear {$_POST['name']},</b></p>
//             <p>Thank you for reaching out to Hancockpublishers! Our Hancockpublishers have received your query and are working on it as of now. Expect to hear back from us within 24 hours. For quick answers, you might find our <a href='#0'>FAQ</a> page helpful.</p>
//             <p>Thanks for your patience and interest in our work!</p>
//             <p><b>Warm regards,</b></p>
//             <p>The Hancockpublishers Team.</p>
//             <br>
//             <img src='https://hancockpublishers.com/assets/img/logo.png' alt='Hancockpublishers' style='max-width: 200px;'>
//             <p>Email: <a href='mailto:info@hancockpublishers.com'>info@hancockpublishers.com</a>
//             <br>Phone number: <a href='tel:(415) 520-1098'>(415) 520-1098</a>
//             <br>Address: 895 Dove Street. Newport Beach, CA 92660 United States</p>
//         ";

//         $autoReply = new PHPMailer(true);
//         $autoReply->isSMTP();
//         $autoReply->Host = 'hancockpublishers.com';
//         $autoReply->SMTPAuth = true;
//         $autoReply->Username = 'noreply@hancockpublishers.com';
//         $autoReply->Password = 'mPio+n)45OTs';
//         $autoReply->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $autoReply->Port = 587;

//         $autoReply->setFrom('noreply@hancockpublishers.com');
//         $autoReply->addAddress($_POST["email"]);  // Send auto-reply to the same person who submitted the form

//         $autoReply->isHTML(true);
//         $autoReply->Subject = $autoReplySubject;
//         $autoReply->Body = $autoReplyMessage;
//         $autoReply->send();


//         // echo 'Message has been sent';
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }


//SEND EMAIL
/*function sendEmail($message,$subject='Lead from hancockpublishers.com',$to=' info@hancockpublishers.com', $fromName = 'Hancock Writers') {
    $mail = new PHPMailer;                                  
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';            
    $mail->Port = 587;                                   
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@hancockpublishers.com'; 
    $mail->Password = 'utmzsadrtrllnkfd';                  
    $mail->isHTML(true);
    $mail->From = 'noreply@hancockpublishers.com';
    $mail->FromName = $fromName;          
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    if(!$mail->send()) {
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
        // exit;
    }
}*/

// CLEAN FUNCTION
function clean($string)
{
    $string = str_replace(' ', '-', $string);

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

//GET CURRENT REQUEST
function current_url()
{
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}
