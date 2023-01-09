<?php

include '../private/session.php';
include '../private/db_connection.php';
include './functions.php';

$userId = $_GET['userId'];

// create SQL statement
$sql = "SELECT * FROM user WHERE user_id=$userId";

// Query database
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

$userName = $row['user_name'];

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
              <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <br><br>

      <div class="container-fluid">

    <div class="jumbotron text-center" id="jtcolour">
        <h2><u>Welcome <?php echo $userName ?> to your account</u></h2>

    </div>

    <h3 class = "text-center">All Bookings</h3>

    <hr>

    <div class="row">

        <div class="col-sm-6 offset-sm-3">

        <table class="table table-hover">


    <thead>

      <tr>
           <th>Booking Id</th>
           <th>Booking Date</th>
           <th>Booking Slot</th>
           <th>Vehicle</th>
           <th>Product</th>
           <th>License Number</th>
           <th>Engine Type</th>
           <th>Booking Name</th>
           <th>Booking Contact</th>
           <th>Booking Comment</th>
           <th>Booking Status</th>
      </tr>
    </thead>
    <tbody>

    <?php getBookingsByUser($userId);?>

  </tbody>
</table>

    </div>

    </div>

</div>
