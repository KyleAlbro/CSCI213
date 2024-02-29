<?php
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION["email"]);

// If the user is logged in, display the welcome message and logout link
if ($loggedIn) {
    $email = $_SESSION["email"];
    $loginAreaContent = "<p class=welcomeMsg>Welcome, $email</p><a href='logout.php' class=logoutButton>Logout</a>";
} else {
    // If the user is not logged in, display a login link or message
    $loginAreaContent = "<a href='login.php' class=loginButton>Login</a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paul's Bakery</title>
    <link rel="stylesheet" href="styles.css">
    <style>

    </style>
</head>

<body>
    <header>
        <h1> <a id="h1" href="index.php">Paul's Bakery</a></h1>
    </header>
    <div id="login-area">
        <?php echo $loginAreaContent; ?>
    </div>

    <div id="banner">
        <a href="breakfast.php" class="navigation-button">Breakfast Page</a>
        <a href="lunch.php" class="navigation-button">Lunch Page</a>
        <a href="dinner.php" class="navigation-button">Dinner Page</a>
    </div>

    <p>Welcome to Paul's Bakery, where passion meets flavor! At Paul's,
        we pride ourselves on crafting delectable treats using time-honored homemade recipes that have been perfected over the years.
        Our commitment to quality ingredients and meticulous preparation ensures that every bite is a delightful experience.
        Whether you're craving artisanal bread, mouthwatering pastries, or custom cakes for special occasions, we've got your cravings covered.
        Join us from 8 am to 8 pm daily, and let us sweeten your day with the irresistible taste of our baked creations.
        At Paul's Bakery, it's not just about baking; it's about creating moments of joy through the artistry of homemade goodness.
    </p>

    <?php


    $dayOfWeek = date("l");

    $specials = array(
        "Monday" => "25% off sandwiches",
        "Tuesday" => "Free breakfast roll with breakfast item",
        "Wednesday" => "50% off Pizza slices with $5 order",
        "Thursday" => "15% off childrens meals",
        "Friday" => "25% off dinner"
    );

    if (array_key_exists($dayOfWeek, $specials)) {
        echo "<p>Special of the Day for $dayOfWeek: " . $specials[$dayOfWeek] . "</p>";
    } else {
        echo "<p>Sorry, no special today. Check back tomorrow!</p>";
    }
    ?>

    <section>
        <div class="column">
            <h2>Popular Breakfast Items!</h2>
            <?php
            $hostname = "localhost";
            $user = "srobinett_cafe";
            $passwd = "CSCI213!db";
            $dbname = "srobinett_cafe";



            echo "<div class='image-container'>";
            $myConn = new mysqli($hostname, $user, $passwd, $dbname);
            $result = $myConn->query("SELECT * FROM menu_items WHERE cafe_id = 4 AND menu_meal = 1");
            for ($i = 0; $i < 4; $i++) {
                $row = $result->fetch_assoc();
                if ($row) {
                    echo "<img src='images/" . $row['menu_image_name'] . "' alt='Menu Image'>";
                } else {
                    // If no more rows are available, break out of the loop
                    break;
                }
            }
            echo "</div>";
            ?>

        </div>

        <div class="column">

            <h2>Popular Lunch Items!</h2>
            <?php
            echo "<div class='image-container'>";
            $myConn = new mysqli($hostname, $user, $passwd, $dbname);
            $result = $myConn->query("SELECT * FROM menu_items WHERE cafe_id = 4 AND menu_meal = 2");
            for ($i = 0; $i < 4; $i++) {
                $row = $result->fetch_assoc();
                if ($row) {
                    echo "<img src='images/" . $row['menu_image_name'] . "' alt='Menu Image'>";
                } else {
                    // If no more rows are available, break out of the loop
                    break;
                }
            }
            echo "</div>";
            ?>
        </div>

        <div class="column">
            <h2>Popular Dinner Items!</h2>
            <?php
            echo "<div class='image-container'>";
            $myConn = new mysqli($hostname, $user, $passwd, $dbname);
            $result = $myConn->query("SELECT * FROM menu_items WHERE cafe_id = 4 AND menu_meal = 3");
            for ($i = 0; $i < 4; $i++) {
                $row = $result->fetch_assoc();
                if ($row) {
                    echo "<img src='images/" . $row['menu_image_name'] . "' alt='Menu Image'>";
                } else {
                    // If no more rows are available, break out of the loop
                    break;
                }
            }
            echo "</div>";
            ?>
        </div>
    </section>
    <p id="contactInfo">Contact us: <br>

        Phone: (406)555-2390 <br>
        Email: PaulsBakery@gmail.com<br>

    </p>
</body>

</html>