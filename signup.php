<?php
include 'config.php'; // Use include instead of @include to handle errors properly

if(isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); // Avoid spaces in $_POST

    // Check if username already exists
    $select = "SELECT * FROM user_form WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error = 'Username already exists!';
    } else {
        // Insert new user into database
        $insert = "INSERT INTO user_form (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$password')";
        if (mysqli_query($conn, $insert)) {
            header('Location: Iron_lizard.php');
            exit; // Ensure script stops after redirection
        } else {
            $error = 'Error inserting user. Please try again.';
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<div class="wrapper">
    <div class="signup">
        <h1>Sign Up</h1>
        <?php
        if(isset($error)){
            echo '<span class="error-msg">'.$error.'</span>';
        }
        ?>
        <form class="signup-form" method="post">
            <fieldset>
                <label>First Name</label>
                <input type="text" name="first_name" required placeholder="Enter your first name">
                <label>Last Name</label>
                <input type="text" name="last_name" required placeholder="Enter your last name">
            </fieldset>
            <fieldset>
                <label>Email</label>
                <input type="email" name="email" required placeholder="Enter your email">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Enter your username">
            </fieldset>
            <fieldset>
                <label>Password</label>
                <input type="password" name="password" required placeholder="********">
            </fieldset>
            <button type="submit" name="submit">Sign up Now</button>
        </form>
    </div>  
</div>
</body>
</html>
