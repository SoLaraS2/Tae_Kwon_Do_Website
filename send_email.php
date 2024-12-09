<?php
// Allow cross-origin requests
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Please fill out the form correctly.";
    exit;
  }

  $recipient = "taekwondoonthego@gmail.com";
  $email_subject = !empty($subject) ? $subject : "New Contact Message from $name";
  $email_body = "Name: $name\n";
  $email_body .= "Email: $email\n\n";
  $email_body .= "Message:\n$message\n";

  $headers = "From: $name <$email>";

  if (mail($recipient, $email_subject, $email_body, $headers)) {
    http_response_code(200);
    echo "Success! Your message was sent.";
  } else {
    http_response_code(500);
    echo "An error occurred while sending your message.";
  }
} else {
  http_response_code(403);
  echo "Please submit the form properly.";
}
?>
