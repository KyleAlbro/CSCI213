<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Database Example</h4>

    <h4>Kyle in class Feb 13</h4>

    <?php 
        $hostname = "localhost";
        $user = "srobinett_cafe";
        $passwd = "CSCI213!db";
        $dbname = "srobinett_cafe";

        //1.
        $myConn = new mysqli($hostname, $user, $passwd, $dbname);

        //2. result set
        $result = $myConn->query("SELECT * from menu_items where cafe_id =4");
        while (($row = $result->fetch_assoc()) != null){
            echo "$row[menu_descr]<br>";
        }
        echo "DONE<br>";


        $result = $myConn->query("SELECT menu_name from menu_items where cafe_id =4");
        while (($row = $result->fetch_assoc()) != null){
            echo "$row[menu_name]<br>";
        }
        echo "DONE<br>";

        $result = $myConn->query("SELECT menu_name from menu_items where cafe_id =4 and menu_meal = 1");
        while (($row = $result->fetch_assoc()) != null){
            echo "$row[menu_name]<br>";
        }
        echo "DONE<br>";


    ?>
</body>

</html>