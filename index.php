<html>
 <head>
  <title>PHP</title>
 </head>
 <body>
    <?php echo '<p>Hello world!</p>'; ?>
    <?php 
        $dblocation = "localhost";
        $dbname = "carshowroom";
        $dbuser = "root";
        $dbpass = "";
        $dbcnx = @mysql_connect($dblocation, $dbuser, $dbpass);
        if (!$dbcnx) {
            echo "No connection ";
            exit();
        }
        if(!@mysql_select_db($dbname, $dbcnx)) {
            echo "No";
            exit();
        }
        
        $selectCar = mysql_query("select * from car");
        if(! $selectCar){
            throw new My_Db_Exception('Database error: ' . mysql_error());
        }
        while($car = mysql_fetch_assoc($selectCar)) {
            echo "ID: " . $car["ID"]. " - Country: " . $car["Country"]. " - Marka: " . $car["Marka"] . " - Model: " . $car["Model"] . "<br>";
        }
    ?>
 </body>
</html>