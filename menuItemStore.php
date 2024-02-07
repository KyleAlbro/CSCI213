<?php
include 'menuItem.php';

class MenuItemStore {
    private $menuData;

    public function __construct($menuFile) {
        // Read menu data from the JSON file
        $this->menuData = json_decode(file_get_contents($menuFile), true);
    }

    public function getMenuItemsByType($mealType) {
        // Convert $mealType to lowercase
        $mealType = strtolower($mealType);

        // Check if menu data for the given meal type exists
        if (isset($this->menuData[$mealType])) {
            return $this->menuData[$mealType];
        } else {
            return []; // Return an empty array if no menu items found for the given type
        }
    }
}

?>