<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password from the form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email exists in the session variable array
    if (isset($_SESSION['user_accounts'][$email])) {
        // Check if the submitted password matches the stored password
        if ($_SESSION['user_accounts'][$email] == $password) {
            // Authentication successful
            // Set the email in the session variable
            $_SESSION["email"] = $email;

            // Redirect to the home page or any other page after successful login
            echo "Account creation successful. You will be redirected to the login page shortly.";
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 3000);</script>";
            exit;
        } else {
            // Authentication failed: incorrect password
            echo "Invalid password. Please try again.";
        }
    } else {
        // Authentication failed: email not found
        echo "Invalid email. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!-- Login form to log into the user's account -->
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">email:</label>
        <input type="text" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="register.php">Don't have an account? Register here!</a>
</body>

</html>