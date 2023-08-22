<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiving_email_address = 'haameemhumaidh@gmail.com';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    // Validate inputs
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($subject)) {
        $errors[] = "Subject is required";
    }

    if (empty($message)) {
        $errors[] = "Message is required";
    }

    if (empty($errors)) {
        $headers = "From: $email" . "\r\n";
        $message_body = "Name: $name\nEmail: $email\n\n$message";
        
        if (mail($receiving_email_address, $subject, $message_body, $headers)) {
            $success_message = "Email sent successfully!";
        } else {
            $error_message = "Oops! Something went wrong and we couldn't send your message.";
        }
    }
}
?>
