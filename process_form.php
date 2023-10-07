<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $selectedService = $_POST["service"];
    $message = $_POST["message"];

    // Validate the email field
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }

    // Compose the email message
    $to = "technozarsolution@gmail.com"; // Replace with your email address
    $subject = "New Form Submission";
    $headers = "From: $email";
    $message = "Name: $name\nEmail: $email\nService: $selectedService\nMessage:\n$message";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Thank you for your submission!";
    } else {
        // Email sending failed
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Handle non-POST requests
    echo "Invalid request.";
}
?>
