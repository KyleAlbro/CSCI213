<?php
session_start();

$hostname = "localhost";
$user = "srobinett_cafe";
$passwd = "CSCI213!db";
$dbname = "srobinett_cafe";

$myConn = new mysqli($hostname, $user, $passwd, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM customer WHERE cust_email='$email'";

    echo"$sql <br>";

    $result = mysqli_query($myConn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION["email"] = $email;
            header("Location: index.php");
            exit;
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
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

    <?php
    


    ?>

</body>

</html>