<?php
// FIX: Set a valid 'from' email address, preferably on your domain.
// This helps prevent emails from being marked as spam.
$email_from = 'noreply@yourdomain.com'; // Replace with a valid email for your domain

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];


$email_subject = "New Form Submission from NIET Website"; // More descriptive subject

$email_body = "User Name: $name.\n".
                "User Email: $visitor_email.\n".
                "Subject: $subject.\n".
                "User Message: $message.\n";

$to = 'kumar0221cs@gmail.com';

// FIX: Added more robust email headers for better deliverability
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

// Attempt to send the email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Email sent successfully, redirect with a success parameter
    header("Location: contact.html?mailsend=success");
} else {
    // Email failed to send, redirect with an error parameter
    header("Location: contact.html?mailsend=error");
}
exit(); // Always call exit after header redirects
?>