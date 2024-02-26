<?php
session_start()
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        echo "Login successful. You will be redirected to the main page shortly.";
        echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 3000);</script>";
    }
}
?>