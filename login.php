<?php
session_start();

include 'config.php'; // Include database connection

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user by username
    $stmt = $conn->prepare("SELECT * FROM user_form WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password using password_verify
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['username'] = $user['username'];
            header('Location: Iron_lizard.php'); // Redirect to dashboard or desired page
            exit;
        } else {
            $error = 'Invalid username or password';
        }
    } else {
        $error = 'Invalid username or password';
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>
<body>
<?php
        if(isset($error)){
            echo '<span class="error-msg">'.$error.'</span>';
        }
        ?>
  <link rel="stylesheet" type="text/css" href="Main.css">
<div class="ring">
    <i style="--clr:#00ff0a;"></i>
    <i style="--clr:#ff0057;"></i>
    <i style="--clr:#fffd44;"></i>
    <div class="login">
      <h2>Login</h2>
      <div class="inputBx">
        <input type="text" placeholder="Username">
      </div>
      <div class="inputBx">
        <input type="password" placeholder="Password">
      </div>
      <div class="inputBx">
      <input type="submit" value="Sign in">
      </div>
      </form>
      <div class="links">
        <a href="Reset.php">Forget Password</a>
        <a href="signup.php">Signup</a>
      </div>
    </div>

  </body>
</html>
