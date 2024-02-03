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
        <a href="breakfast.php">Breakfast Page</a>
        <a href="lunch.php">Lunch Page</a>
        <a href="dinner.php">Dinner Page</a>
    </div>

    <p>Welcome to Paul's Bakery, where passion meets flavor! At Paul's,
        we pride ourselves on crafting delectable treats using time-honored homemade recipes that have been perfected over the years.
        Our commitment to quality ingredients and meticulous preparation ensures that every bite is a delightful experience.
        Whether you're craving artisanal bread, mouthwatering pastries, or custom cakes for special occasions, we've got your cravings covered.
        Join us from 8 am to 8 pm daily, and let us sweeten your day with the irresistible taste of our baked creations.
        At Paul's Bakery, it's not just about baking; it's about creating moments of joy through the artistry of homemade goodness.
    </p>

    <?php
    $dayOfWeek = date("1");
    //to test if it works
    //$dayOfWeek="Monday";

    $specials = array(
        "Monday" => "25% off sandwiches",
        "Tuesday" => "Free breakfast roll with breakfast item",
        "Wednesday" => "50% off Pizza slices with $5 order",
        "Thursday" => "",
        "Friday" => "25% off pies",
        "Sunday" => "testing"
    );

    if (array_key_exists($dayOfWeek, $specials)) {
        echo "<p>Special of the Day for $dayOfWeek: " . $specials[$dayOfWeek] . "</p>";
    } else {
        echo "<p>Sorry, no special today. Check back tomorrow!</p>";
    }
    ?>

    <section>
        <div class="column">
            <br>
            <img id="leftImg" src="images/cinnamonRoll.jpg" alt="Cinnamon Rolls">
            <br>
            <img id="leftImg" src="images/baconAndEggs.jpg" alt="Bacon and Eggs">

        </div>

        <div class="column">
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