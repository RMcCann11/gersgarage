<?php

include '../private/db_connection.php';
include '../private/session.php';
include './functions.php';

$username = $_SESSION['loggedin_user'];

// create SQL statement
$sql = "SELECT * FROM user WHERE user_name='$username'";

// Query database
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
  
$userId = $row['user_id'];

// Retrieving ID of currently logged in user

$bookingDetailsId = $_GET["bookingDetailsId"];

// create SQL statement
$sql = "SELECT * FROM booking_detail WHERE booking_detail_id =$bookingDetailsId";

// Query database
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
  
$relatedBookingId = $row['booking_id'];
$latestCustName = $row['cust_name'];

// Retrieving ID of latest booking and name provided for latest booking
    
// create SQL statement
$sql = "SELECT * FROM booking WHERE booking_id =$relatedBookingId";

// Query database
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

$bookingDate = $row['booking_date'];
$bookingSlot = $row['booking_slot'];

// Retrieving date and slot of latest booking 

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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            
            <li class="nav-item">
              <a class="nav-link" href="index.php">Make A Booking<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user_account.php?userId=<?php echo $userId;?>">My Account<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <br><br>

      <div class="container-fluid">
    
    <div class="jumbotron text-center" id="jtcolour">
        <h1><u>Booking Confirmation</u></h1>
            
    </div>

    <div class="row">

    <div class="col-sm-6 offset-sm-3" style="background-color:rgb(236, 236, 112);">


        <?php echo "Thank you " . $latestCustName . " for your booking " . "on the " . $bookingDate . " at " . $bookingSlot . "."; ?>

        <br><br>

        <p>Please click <a href="./user_account.php?userId=<?php echo $userId;?>">on this link</a> to view further details of this booking along with all previous bookings associated with this account.</p>



    </div>

    </div>

</div>
    