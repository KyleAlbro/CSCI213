<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username exists in the session variable array
    if (isset($_SESSION['user_accounts'][$username])) {
        // Check if the submitted password matches the stored password
        if ($_SESSION['user_accounts'][$username] == $password) {
            // Authentication successful
            // Set the username in the session variable
            $_SESSION["username"] = $username;

            // Redirect to the home page or any other page after successful login
            header("Location: index.php");
            exit;
        } else {
            // Authentication failed: incorrect password
            echo "Invalid password. Please try again.";
        }
    } else {
        // Authentication failed: username not found
        echo "Invalid username. Please try again.";
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
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="register.php">Don't have an account? Register here!</a>
</body>
</html>
