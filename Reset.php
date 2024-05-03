<?php
// Start session to access session variables (optional for this script)
// session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $email = $_POST["email"];

  // Connect to your database
  $servername = "localhost";
  $username = "root";
  $password = ""; 
  $database = "lizard"; 

  $conn = new mysqli($servername, $username, $password, $database);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Generate a random verification code
  $code = rand(100000, 999999);

  // Prepare SQL statement to insert verification code
  $sql_code = "INSERT INTO password_resets (email, code) VALUES (?, ?)";
  $stmt_code = $conn->prepare($sql_code);
  $stmt_code->bind_param("ss", $email, $code);

  // Execute the statement for code insertion
  if ($stmt_code->execute() === TRUE) {
    // Send verification code to the user's email (replace with your email sending logic)
    $to = $email;
    $subject = "Iron Lizard Password Reset";
    $message = "Your verification code to reset your password is: " . $code;
    $headers = "From: Iron Lizard mahmoudounduwayo@gmail.com"; // Replace with your email address
    mail($to, $subject, $message, $headers);

    echo "A verification code has been sent to your email address.";
  } else {
    echo "Error generating verification code: " . $conn->error;
  }

  // Close prepared statements and database connection
  $stmt_code->close();
  $conn->close();
}
?>

<html>
<head>
  <title>Forgot Password</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="reset.css">  <h1>Forgot your password?</h1>
<hr></hr>
<h3>Enter your email address to begin password reset</h3>

<form action="reset_password.php" method="post">
  <label for="email">Email</label></br>
  <input type="email" id="email" name="email" placeholder="Enter your email address" required>
  <button type="submit">Send Verification Code</button>
</form>

</body>
</html>
