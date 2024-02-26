<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // In a real application, perform authentication against a database or other method
    // For demonstration purposes, let's assume a simple username/password check
    $valid_username = "kyle";
    $valid_password = "p1";

    // Check if the submitted username and password match the valid credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful
        // Set the username in the session variable
        $_SESSION["username"] = $username;

        // Redirect to the home page or any other page after successful login
        header("Location: index.php");
        exit;
    } else {
        // Authentication failed
        echo "Invalid username or password. Please try again.";
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
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
