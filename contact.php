<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback = "Invalid email format";
        $feedback_class = "error";
    } else {
        // Set the recipient email address
        $to = "rifat15-4084@diu.edu.bd"; // আপনার ইমেইল ঠিকানা দিন

        // Set the subject of the email
        $subject = "New Contact Form Message from " . $name;

        // Create the email content
        $email_content = "Name: " . $name . "\n";
        $email_content .= "Email: " . $email . "\n\n";
        $email_content .= "Message:\n" . $message;

        // Set the email headers
        $headers = "From: " . $email;

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            $feedback = "Thank you, your message was sent successfully.";
            $feedback_class = "success";
        } else {
            $feedback = "There was an error sending your message. Please try again.";
            $feedback_class = "error";
        }
    }
}
?>

<!-- HTML ফর্ম কোড এখানে থাকবে না, এটি আলাদা HTML ফাইলে হবে -->
