<?php
session_start();

$hostname = "localhost";
$user = "srobinett_cafe";
$passwd = "CSCI213!db";
$dbname = "srobinett_cafe";

$myConn = new mysqli($hostname, $user, $passwd, $dbname);

// Initialize an empty array to store user accounts
if (!isset($_SESSION['user_accounts'])) {
    $_SESSION['user_accounts'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);
    //$sql = "INSERT INTO customer (cust_id, cust_fname, cust_lname, cust_email, cust_passwd_hash) VALUES(null, '$fname', '$lname', '$email', '$hashed_passwd')";
    $sql = "INSERT INTO customer (cust_id, cust_fname, cust_lname, cust_email, cust_passwd_hash) VALUES(null, '$fname', '$lname', '$email', '$password')";

    //testing if it inserts
    //echo $sql . "<br>";

    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Store the new user account in the session array
        $_SESSION['user_accounts'][$email] = $password;

        // Inform the user about successful account creation
        echo "Account creation successful. You will be redirected to the login page shortly.";
        echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 10000);</script>";
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
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" required><br><br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>