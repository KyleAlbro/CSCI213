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
            <br>
            <img id="leftImg" src="images/blt.jpg" alt="BLT Sandwich">
            <br>
            <img id="leftImg" src="images/southWestWrap.jpg" alt="Southwest Chicken Wrap">

        </div>

        <div class="column">
            <h2>Lunch Items</h2>

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
            <img id="rightImg" src="images/pizzaSlices.jpg" alt="Pizza Slices">
            <br>
            <img id="rightImg" src="images/grilledCheese.jpg" alt="Grilled Cheese">

        </div>
    </section>
    <p id="contactInfo">Contact us: <br>

        Phone: (406)555-2390 <br>
        Email: PaulsBakery@gmail.com<br>

    </p>
</body>

</html>