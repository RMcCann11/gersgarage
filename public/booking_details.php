<?php

include '../private/session.php';
include '../private/db_connection.php';
include './functions.php';

?>

<?php 

$bookingId = $_GET["bookingId"];
$userId = $_GET["userId"];

?>

<?php

if(isset($_POST["submit_details"])){

  $vehicleId = $_POST["vehicle_id"];
  $licenseDetails = $_POST["license_number"];
  $engineType = $_POST["engine_type"];
  $bookingStatusId = 1;
  $productId = $_POST["product_id"];
  $custName = $_POST["cust_name"];
  $custContact = $_POST["cust_contact"];
  $custComment = $_POST["cust_comment"];
  
  // create SQL statement
  $sql = "INSERT INTO booking_detail(booking_id, user_id, vehicle_id, license_number, engine_type, booking_status_id, product_id, cust_name, cust_contact, cust_comment) VALUES('{$appoId}', '{$userId}', '{$vehicleId}', '{$licenseDetails}', '{$engineType}', '{$bookingStatusId}', '{$productId}', '{$custName}', '{$custContact}', '{$custComment}')";
  
  // Query database
  $result = mysqli_query($connection, $sql);

  // Retrieve latest entry in booking_detail
  $sql = "SELECT * FROM booking_detail ORDER BY booking_detail_id DESC LIMIT 0,1";

  // Query database
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);

  $bookingDetailsId = $row['booking_detail_id'];

  header("location:booking_confirmation.php?bookingDetailsId=$bookingDetailsId");
  
}
  
  ?> 


<!DOCTYPE html>
<html lang="en">
<head>
<title>Ger's Garage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<br><br>

<div class="container-fluid">
    
    <div class="jumbotron text-center" id="jtcolour">
        <h1><u>Booking system</u></h1>
        <p id="red">Please provide the below required details to complete your booking.</p>
            
    </div>

    <div class="row">

    <div class="col-sm-6 offset-sm-3" style="background-color:rgb(236, 236, 112);">

<!--
The following lines of code (lines 61 to 70 have) have been sourced from https://hackerthemes.com/bootstrap-cheatsheet/#form-group  
-->

  <form action="" method="post">

      <label for="vehicle_id">Vehicle Make:</label>
      <select name="vehicle_id" id="vehicle_id" class="form-control">
            <option value="">Select Vehicle</option>

            <?php showVehiclesBookingDetails();?>

      </select>
      <br>
      <div class="form-group">
        <label for="license_number">Vehicle License Number:</label>
        <input type="text" name="license_number" class="form-control" id="license_number">
      </div>
      <fieldset>
        <label for="engine_type">What type of engine does your vehicle have?</label>
        <br>
        Diesel <input type = "radio" name="engine_type" value="diesel"> <br>
        Petrol <input type = "radio" name="engine_type" value ="petrol"> <br>
        Hybrid <input type = "radio" name="engine_type" value ="hybrid"> <br>
        Electric <input type = "radio" name="engine_type" value ="electric"> <br>
      </fieldset>
      <br>
      <label for="product_id">Chosen Service:</label>
      <select name="product_id" id="product_id" class="form-control">
            <option value="">Select Service</option>

            <?php showProductsBookingDetails();?>
      </select>
      <br>
      <div class="form-group">
        <label for="cust_name">Please Enter Your Name:</label>
        <input type="text" name="cust_name" class="form-control" id="cust_name">
      </div>
      <div class="form-group">
        <label for="cust_contact">Please Enter A Mobile Phone Number:</label>
        <input type="text" name="cust_contact" class="form-control" id="cust_contact">
      </div>
      <div class="form-group">
           <label for="cust_comment">Please Enter Any Further Information You Wish To Provide Here:</label>
          <textarea name="cust_comment" id="" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="submit_details" class="btn btn-primary btn-lg" value="Submit Details">
      </div>

    </form>


    </div>

    </div>

</div>
    