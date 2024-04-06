<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form has been submitted
if(isset($_POST["send"])) {
    // Set up the response message
    $response = "Get in Touch";

    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];
    
    // Check if all required fields are filled
    if(trim($name) != "" && trim($email) != "" && trim($subject) != "" && trim($description) != "") {
        // Set recipient email address
        $recipient = "benameureya953@gmail.com";

        // Set email headers
        $emailHeader = "From: " . $name . " <" . $email . ">\r\n";

        // Send email
        if(mail($recipient, $subject, $description, $emailHeader)) {
            $response = "Email sent successfully";
        } else {
            $response = "Email sending failed";
        }
    }
}

// Redirect back to contact.php
header("Location: contact.php");
exit;
?>
