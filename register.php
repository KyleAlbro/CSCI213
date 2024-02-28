<?php
session_start();

// Initialize an empty array to store user accounts
if (!isset($_SESSION['user_accounts'])) {
    $_SESSION['user_accounts'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Store the new user account in the session array
        $_SESSION['user_accounts'][$username] = $password;

        // Inform the user about successful account creation
        echo "Account creation successful. You will be redirected to the login page shortly.";
        echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 3000);</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register for Paul's Bakery</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
