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

    <?php

    $menuFile = 'menu.json';
    $menuData = json_decode(file_get_contents($menuFile), true);

    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    $mealType = strtolower($currentPage);
    ?>

    <section>
        <div class="column">
            <?php
            $hostname = "localhost";
            $user = "srobinett_cafe";
            $passwd = "CSCI213!db";
            $dbname = "srobinett_cafe";

            $myConn = new mysqli($hostname, $user, $passwd, $dbname);

            echo "<br>";
            $result = $myConn->query("SELECT * FROM menu_items WHERE cafe_id = 4 AND menu_meal = 2");
            $row = $result->fetch_assoc();

            echo "<img id='leftImg' src='images/" . $row['menu_image_name'] . "' alt='Pizza Slices'>";
            echo "<br>";
            $row = $result->fetch_assoc();

            echo "<img id='leftImg' src='images/" . $row['menu_image_name'] . "' alt='Grilled Cheese'>";
            ?>

        </div>

        <div class="column">
            <h2>Lunch Items</h2>

            <?php


            $result = $myConn->query("SELECT * from menu_items where cafe_id =4 and menu_meal = 2");

            echo "<table border='1'>";
            echo "
                <tr>
                <th>Menu Item</th>
                <th>Price</th>
                <th>Description</th>
                </tr>";

            for ($i = 0; $i < 4; $i++) {
                $row = $result->fetch_assoc();
                if ($row) {
                    echo "<tr>";
                    echo "<td>" . $row['menu_name'] . "</td>";
                    echo "<td>$" . $row['menu_price'] . "</td>";
                    echo "<td>" . $row['menu_descr'] . "</td>";
                    echo "</tr>";
                } else {
                    // If no more rows are available, break out of the loop
                    break;
                }
            }
            echo "</table>";
            ?>
        </div>

        <div class="column">
            <?php
            echo "<br>";
            $result = $myConn->query("SELECT * FROM menu_items WHERE cafe_id = 4 AND menu_meal = 2 ORDER BY menu_id desc limit 2");
            $row = $result->fetch_assoc();

            echo "<img id='rightImg' src='images/" . $row['menu_image_name'] . "' alt='Chicken Wrap'>";
            echo "<br>";

            $row = $result->fetch_assoc();
            echo "<img id='rightImg' src='images/" . $row['menu_image_name'] . "' alt='BLT Sandwich'>";
            ?>

        </div>
    </section>
    <p id="contactInfo">Contact us: <br>

        Phone: (406)555-2390 <br>
        Email: PaulsBakery@gmail.com<br>

    </p>
</body>

</html>