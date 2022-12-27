<?php

//Used to dynamically pull vehicle details from database
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

//Used to dynamically pull product details from database
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

//Used to retrieve the details of all bookings by a particular user
function getBookingsByUser($id){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_detail WHERE user_id = $id";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

$bookings = <<<DELIMITER
        
    <tr>
        <td>{$row["booking_id"]}</td>
        <td>{$row["vehicle_id"]}</td>
        <td>{$row["product_id"]}</td>
        <td>{$row["license_number"]}</td>
        <td>{$row["engine_type"]}</td>
        <td>{$row["cust_name"]}</td>
        <td>{$row["cust_contact"]}</td>
        <td>{$row["cust_comment"]}</td>
        <td>{$row["booking_status_id"]}</td>
            
    </tr>

DELIMITER;

        echo $bookings;

    }

}

