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

//Used to dynamically pull dates of bookings from database
function showBookingDatesInAdmin(){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT DISTINCT booking_date FROM booking";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

$bookingDates = <<<DELIMITER

 <option value="{$row["booking_date"]}">{$row["booking_date"]}</option>    

DELIMITER;

    echo $bookingDates;

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

        $bookingDate = showBookingDateInUserBookings($row["booking_id"]); 
        $bookingSlot =  showBookingSlotInUserBookings($row["booking_id"]);
        $vehicleMake = showVehicleMakeInUserBookings($row["vehicle_id"]);
        $productName = showProductInUserBookings($row["product_id"]);
        $bookingStatusName = showBookingStatusInUserBookings($row["booking_status_id"]); 

$bookings = <<<DELIMITER
        
    <tr>
        <td>{$row["booking_id"]}</td>
        <td>{$bookingDate}</td>
        <td>{$bookingSlot}</td>
        <td>{$vehicleMake}</td>
        <td>{$productName}</td>
        <td>{$row["license_number"]}</td>
        <td>{$row["engine_type"]}</td>
        <td>{$row["cust_name"]}</td>
        <td>{$row["cust_contact"]}</td>
        <td>{$row["cust_comment"]}</td>
        <td>{$bookingStatusName}</td>
            
    </tr>

DELIMITER;

        echo $bookings;

    }

}

//Used to relate booking_detail to booking to retrieve booking date in user's account
function showBookingDateInUserBookings($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking WHERE booking_id = $bookingId";

    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        return $row["booking_date"];

    }

}

//Used to relate booking_detail to booking to retrieve booking slot in user's account
function showBookingSlotInUserBookings($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking WHERE booking_id = $bookingId";

    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        return $row["booking_slot"];

    }

}

//Used to relate booking_detail to vehicle to retrieve booking vehicle make in user's account
function showVehicleMakeInUserBookings($vehicleId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM vehicle WHERE vehicle_id = $vehicleId";

    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        return $row["name"];

    }

}

//Used to relate booking_detail to product to retrieve product in user's account
function showProductInUserBookings($productId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM product WHERE product_id = $productId";

    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        return $row["name"];

    }

}

//Used to relate booking_detail to booking_status to retrieve booking status in user's account
function showBookingStatusInUserBookings($bookingStatusId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_status WHERE booking_status_id = $bookingStatusId";

    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        return $row["name"];

    }

}

function getBookingsByDate($date){

       // Credentials
       $dbhost = 'localhost:3307';
       $dbuser = 'root';
       $dbpass = 'root';
       $dbname = 'gersgarage';
   
       // Create a database connection
       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
       // create SQL statement
       $sql = "SELECT * FROM booking WHERE booking_date = '$date'";
       
       // Query database
       $result = mysqli_query($connection, $sql);
   
       while($row = mysqli_fetch_assoc($result)){

$bookings = <<<DELIMITER

<tr>
    <td>{$row["booking_id"]}</td>
    <td>{$row["booking_date"]}</td>
    <td>{$row["booking_slot"]}</td>
</tr>

DELIMITER;
    
        echo $bookings;        
   
    }  

}

