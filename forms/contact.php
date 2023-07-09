<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'mliu5@nd.edu';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
      echo 'Please fill in all fields.';
      exit;
    }

    // Create the email content
    $email_content = "From: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($receiving_email_address, $subject, $email_content, $headers)) {
      echo 'Message sent successfully!';
    } else {
      echo 'An error occurred while sending the message. Please try again later.';
    }
  } else {
    echo 'Invalid request.';
  }
?>

