<?php
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION["username"]);

// If the user is logged in, display the welcome message and logout link
if ($loggedIn) {
    $username = $_SESSION["username"];
    $loginAreaContent = "<p class=welcomeMsg>Welcome, $username</p><a href='logout.php' class=logoutButton>Logout</a>";
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

    //sets variable to json file
    $menuFile = 'menu.json';
    //decodes json into php array
    $menuData = json_decode(file_get_contents($menuFile), true);

    //gets filename of php script, strips php off the end then sets the result to $currentPage
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    //converts $currentPage to lowercase then is assigned to $mealType
    $mealType = strtolower($currentPage);

    ?>

    <section>
        <div class="column">
            <br>
            <img id="leftImg" src="images/cinnamonRoll.jpg" alt="Cinnamon Rolls">
            <br>
            <img id="leftImg" src="images/baconAndEggs.jpg" alt="Bacon and Eggs">

        </div>

        <div class="column">
            <h2>Breakfast Items</h2>

            <?php
            if (isset($menuData[$mealType])) {
                echo "<table border='1'>";
                echo "
                <tr>
                <th>Menu Item</th>
                <th>Price</th>
                <th>Description</th>
                </tr>";

                foreach ($menuData[$mealType] as $menuItem) {
                    echo "
                    <tr>
                    <td>{$menuItem['item']}</td>
                    <td>{$menuItem['price']}</td>
                    <td>{$menuItem['description']}</td>
                    </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>Menu not available for this meal type.</p>";
            }
            ?>

        </div>

        <div class="column">
            <br>
            <img id="rightImg" src="images/avocadoToast.jpg" alt="Avovado Toast">
            <br><br>
            <img id="rightImg" src="images/rolls.jpg" alt="Homemade Rolls with Butter">

        </div>
    </section>
    <p id="contactInfo">Contact us: <br>

        Phone: (406)555-2390 <br>
        Email: PaulsBakery@gmail.com<br>

    </p>
</body>

</html>