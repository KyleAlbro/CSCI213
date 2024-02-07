<?php
require_once 'MenuItemStore.php'; // Include the MenuItemStore class

// Specify the filename of the JSON file containing menu data
$menuFile = 'menu.json';

// Instantiate the MenuItemStore class with the menu file
$menuItemStore = new MenuItemStore($menuFile);

// Define meal types
$mealTypes = ['breakfast', 'lunch', 'dinner'];

// Display menu items for each meal type
foreach ($mealTypes as $mealType) {
    // Get menu items for the current meal type
    $menuItems = $menuItemStore->getMenuItemsByType($mealType);

    // Display menu items
    echo "<h2>{$mealType} Menu</h2>";
    echo "<ul>";
    foreach ($menuItems as $menuItem) {
        echo "<li>{$menuItem['item']}: {$menuItem['description']} - {$menuItem['price']}</li>";
    }
    echo "</ul>";
}
?>