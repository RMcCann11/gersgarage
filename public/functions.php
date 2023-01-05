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
    $sql = "SELECT DISTINCT booking_date FROM booking ORDER BY booking_date";
    
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

//Used to relate booking_detail to product to retrieve product price in invoice generation
function showProductPriceInvoiceGeneration($productId){

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

        return $row["price"];

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

//Used to retrieve the details of all bookings as per a particular date
function getBookingsByDateScheduleViewer($date){

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

            if($row["mechanic_id"] != NULL){

                $mechanicName = showMechanicNameInAdminBookings($row["mechanic_id"]);

$bookings = <<<DELIMITER

<tr>
    <td>{$row["booking_id"]}</td>
    <td>{$row["booking_date"]}</td>
    <td>{$row["booking_slot"]}</td>
    <td>{$mechanicName}</td>
    <td><a href=view_booking_detail.php?bookingId={$row["booking_id"]}>Please click here for further information regarding this booking</a></td>
</tr>

DELIMITER;
    
        echo $bookings; 

            } else {

$bookings = <<<DELIMITER
<tr>
    <td>{$row["booking_id"]}</td>
    <td>{$row["booking_date"]}</td>
    <td>{$row["booking_slot"]}</td>
    <td>No Mechanic Assigned</td>
    <td><a href=view_booking_detail.php?bookingId={$row["booking_id"]}>Please click here for further information regarding this booking</a></td>
</tr>
DELIMITER;

echo $bookings; 

            }     
   
    }  

}

//Used to retrieve the details of a paricular booking
function getBooking($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_detail WHERE booking_id = $bookingId";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        $bookingDate = showBookingDateInUserBookings($row["booking_id"]); 
        $bookingSlot =  showBookingSlotInUserBookings($row["booking_id"]);
        $vehicleMake = showVehicleMakeInUserBookings($row["vehicle_id"]);
        $productName = showProductInUserBookings($row["product_id"]);
        $bookingStatusName = showBookingStatusInUserBookings($row["booking_status_id"]); 

$booking = <<<DELIMITER
        
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

        echo $booking;

    }

}

//Used to retrieve the details of all bookings as per a date range
function getBookingsByDateRange($startDate, $endDate){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking WHERE booking_date BETWEEN '$startDate' AND '$endDate' ORDER BY booking_date";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        if($row["mechanic_id"] != NULL){

            $mechanicName = showMechanicNameInAdminBookings($row["mechanic_id"]);

$bookings = <<<DELIMITER

<tr>
    <td>{$row["booking_id"]}</td>
    <td>{$row["booking_date"]}</td>
    <td>{$row["booking_slot"]}</td>
    <td>{$mechanicName}</td>
    <td><a href=view_booking_detail.php?bookingId={$row["booking_id"]}>Please click here for further information regarding this booking</a></td>
</tr>

DELIMITER;
    
        echo $bookings;    

        } else {

$bookings = <<<DELIMITER

<tr>
    <td>{$row["booking_id"]}</td>
    <td>{$row["booking_date"]}</td>
    <td>{$row["booking_slot"]}</td>
    <td>No Mechanic Assigned</td>
    <td><a href=view_booking_detail.php?bookingId={$row["booking_id"]}>Please click here for further information regarding this booking</a></td>
</tr>

DELIMITER;
    
echo $bookings; 


        }   

 }  

}

//Used to relate booking to mechanic to retrieve a mechanic's name in list bookings in admin
function showMechanicNameInAdminBookings($mechanicId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM mechanic WHERE mechanic_id = $mechanicId";

    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

        return $row["full_name"];

    }

}

//Used to retrieve the details of all bookings as per a particular date
function getBookingsByDateMechanicAssignment($date){

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
 <td><a href=assign_mechanic.php?bookingId={$row["booking_id"]}&bookingDate={$row["booking_date"]}>Please click here for further information regarding this booking and to assign a mechanic to it</a></td>
</tr>

DELIMITER;
 
     echo $bookings;        

 }  

}

//Used to retrieve the details of all bookings as per a particular date
function getBookingsByDatePartAssignment($date){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking WHERE booking_date = '$date' AND parts_assigned = 'N'";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

$bookings = <<<DELIMITER

<tr>
 <td>{$row["booking_id"]}</td>
 <td>{$row["booking_date"]}</td>
 <td>{$row["booking_slot"]}</td>
 <td><a href=assign_parts.php?bookingId={$row["booking_id"]}>Please click here to assign parts to this booking</a></td>
</tr>

DELIMITER;
 
     echo $bookings;        

 }  

}

//Used to retrieve the details of all bookings as per a particular date
function getBookingsByDatePrintInvoice($date){

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
 <td><a href=generate_invoice.php?bookingId={$row["booking_id"]}>Please click here to generate an invoice for this booking</a></td>
</tr>

DELIMITER;
 
     echo $bookings;        

 }  

}

//Used to retrieve the details of all parts for assigning parts to a booking
function getPartDetails($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM part ORDER BY name";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

$parts = <<<DELIMITER

<tr>
 <td>{$row["name"]}</td>
 <td>{$row["price"]}</td>
 <td><a href=part_addition_confirmation.php?partId={$row["part_id"]}&bookingId={$bookingId}>Click Here To Add This Part To A Shopping Cart</a></td>
</tr>

DELIMITER;
 
     echo $parts;        

 }  

}

//Used to retrieve the name of a part for generating a receipt
function getPartName($partId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM part WHERE part_id = $partId";
    
    // Query database
    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){

       return $row["name"];

    }  

}

//Used to update parts assigned in checkout.php to Y
function changePartsAssigned($bookingId) {

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    // create SQL statement
    $sql = "UPDATE booking SET parts_assigned = 'Y' WHERE booking_id = $bookingId";

    // Query database
    $result = mysqli_query($connection, $sql);

}

//Used to dynamically pull mechanic details from database
function showMechanicDetails(){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   // create SQL statement
   $sql = "SELECT * FROM mechanic";
   
   // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

$vehicleOptions = <<<DELIMITER

<option value="{$row["mechanic_id"]}">{$row["full_name"]}</option>    

DELIMITER;

   echo $vehicleOptions;

   }

}

//Used to dynamically pull mechanic booking statuses from database
function showBookingStatuses(){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   // create SQL statement
   $sql = "SELECT * FROM booking_status";
   
   // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

$bookingStatusOptions = <<<DELIMITER

<option value="{$row["booking_status_id"]}">{$row["name"]}</option>    

DELIMITER;

   echo $bookingStatusOptions;

   }

}

// Used to retrieve booking details for the generation of an invoice
function getBookingDetailsForInvoice($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_detail WHERE booking_id = $bookingId";

    // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $vehicleMake = showVehicleMakeInUserBookings($row["vehicle_id"]);

$invoiceDetails = <<<DELIMITER

    <tr>
    <td>Customer Name:</td>
    <td>{$row["cust_name"]}</td>
    </tr>
    <tr>
    <td>Contact Number:</td>
    <td>{$row["cust_contact"]}</td>
    </tr>
    <td>Vehicle:</td>
    <td>{$vehicleMake}</td>
    </tr>
    <td>License Number:</td>
    <td>{$row["license_number"]}</td>
    </tr>

DELIMITER;

    echo $invoiceDetails;

   }

}

//Used to generate an invoice for a booking without parts
function getProductPriceForInvoiceWithoutParts($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_detail WHERE booking_id = $bookingId";

    // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $productName = showProductInUserBookings($row["product_id"]);
    $productPrice = showProductPriceInvoiceGeneration($row["product_id"]);

$invoiceDetails = <<<DELIMITER

    <tr>
    <td>Chosen Service:</td>
    <td>{$productName}</td>
    </tr>
    <tr>
    <td>Price of Chosen Service:</td>
    <td>&#8364;{$productPrice}</td>
    </tr>
    <tr>
    <td><b>Total Amount Due:</b></td>
    <td><b>&#8364;{$productPrice}</b></td>
    </tr>
    

DELIMITER;

    echo $invoiceDetails;

   }

}

//Used to generate an invoice for a booking with parts
function getProductPriceForInvoiceWithParts($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_detail WHERE booking_id = $bookingId";

    // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $productName = showProductInUserBookings($row["product_id"]);
    $productPrice = showProductPriceInvoiceGeneration($row["product_id"]);

$invoiceDetails = <<<DELIMITER

    <tr>
    <td>Chosen Service:</td>
    <td>{$productName}</td>
    </tr>
    <tr>
    <td><b>Price of Chosen Service:</b></td>
    <td><b>&#8364;{$productPrice}</b></td>
    </tr>

DELIMITER;

    echo $invoiceDetails;

   }

}

//Used to generate an invoice for a booking with parts
function getAdditionalInfoForInvoiceWithParts($orderId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM order_contents WHERE orders_id = $orderId";

    // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $partName = getPartName($row["part_id"]);
    $partTotal = $row["quantity"] * $row["price"];

$invoiceDetails = <<<DELIMITER

    <tr>
    <td>Name of Part Required:</td>
    <td>{$partName}</td>
    </tr>
    <tr>
    <td>Quantity of Part Required:</td>
    <td>{$row["quantity"]}</b></td>
    </tr>
    <tr>
    <td>Price of Part Required:</td>
    <td>&#8364;{$row["price"]}</b></td>
    </tr>
    <tr>
    <td><b>Total Price of Part Required:</b></td>
    <td><b>&#8364;{$partTotal}</b></td>
    </tr>

DELIMITER;

    echo $invoiceDetails;

   }

}

function getOrderTotalForInvoiceWithParts($fixedCost, $variableCost){

    $totalCost = $fixedCost + $variableCost;

$invoiceDetails = <<<DELIMITER

    <tr>
    <td style="color:red"><b>TOTAL AMOUNT DUE:</b></td>
    <td style="color:red"><b>&#8364;{$totalCost}</b></td>
    </tr>

DELIMITER;

    echo $invoiceDetails;


}

//Used to to get the fixed cost of a booking with parts 
function getProductPriceAsFixedPrice($bookingId) {

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM booking_detail WHERE booking_id = $bookingId";

    // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $productPrice = showProductPriceInvoiceGeneration($row["product_id"]);
    return $productPrice;

   }

}

//Used to to get the total variable cost of a booking with parts 
function getOrderTotal($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM orders WHERE booking_id = $bookingId";

     // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $orderPrice = $row["total"];
    return $orderPrice;

   }

}

//Used to to get the id of an order 
function getOrderId($bookingId){

    // Credentials
    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'gersgarage';

    // Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // create SQL statement
    $sql = "SELECT * FROM orders WHERE booking_id = $bookingId";

     // Query database
   $result = mysqli_query($connection, $sql);

   while($row = mysqli_fetch_assoc($result)){

    $orderId = $row["id"];
    return $orderId;

   }

}

//Used to retrieve the details of all bookings as per a particular date
function getBookingsByDateChangeBookingStatus($date){

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
 <td><a href=change_booking_status.php?bookingId={$row["booking_id"]}>Please click here to change the status of this booking</a></td>
</tr>

DELIMITER;
 
     echo $bookings;        

 }  

}

function setMessage($msg){

    if(!empty($msg)) {

        $_SESSION["message"] = $msg;

    } else {

        $msg = "";

    }

}

function displayMessage(){

    if(isset($_SESSION["message"])){

        echo $_SESSION["message"];
        unset($_SESSION["message"]);

    }

}



