<?php

function showVehiclesBookingDetails(){

     // Credentials
     $dbhost = 'localhost:3307';
     $dbuser = 'root';
     $dbpass = 'root';
     $dbname = 'gersgarage';
 
     // Create a database connection
     $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM vehicle";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

$vehicleOptions = <<<DELIMITER

 <option value="{$row["vehicle_id"]}">{$row["name"]}</option>    

DELIMITER;

    echo $vehicleOptions;

    }

}

function showProductsBookingDetails(){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM product";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

$productOptions = <<<DELIMITER

 <option value="{$row["product_id"]}">{$row["name"]}</option>    

DELIMITER;

    echo $productOptions;

    }

}

