<?php

// Get the name, email, and comment from the POST request
$receiving_email_address = 'haameemhumaidh@gmail.com';
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// Validate the input
if (empty($name)) {
  echo "Please enter your name.";
  exit;
}

if (empty($email)) {
  echo "Please enter your email address.";
  exit;
}

if (empty($comment)) {
  echo "Please enter your comment.";
  exit;
}

// Save the comment to a database
$sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

$result = mysqli_query($conn, $sql);

if ($result) {
  echo "Your comment has been submitted.";
} else {
  echo "There was an error submitting your comment.";
}

?>
