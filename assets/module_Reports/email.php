<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../lib/phpmailer/vendor/autoload.php'; // require PHPMailer library

// Get form data
$image = $_FILES['image']['tmp_name'];
$to = $_POST['email'];
$subject = 'Schedule screenshot';

// Create a PHPMailer object
$mail = new PHPMailer(true);

try {
  // SMTP configuration
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'arnnielkhenethpacris.cgc@gmail.com'; // Replace with your Gmail address
  $mail->Password = 'nlvkhwdlqlotlbxk'; // Replace with your OAuth 2.0 access token
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // Sender and recipient
  $mail->setFrom('arnnielkhenethpacris.cgc@gmail.com'); // Replace with your Gmail address
  $mail->addAddress($to);

  // Attach the image
  $mail->addAttachment($image, 'Schedule.png');

  // Email content
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = 'See attached schedule screenshot.';

  // Send email
  $mail->send();
  echo 'Email sent successfully!';
} catch (Exception $e) {
  echo 'Email sending failed. Error message: ', $mail->ErrorInfo;
}
