<?php

require "../private/db_connection.php";
require "./booking.php";

echo $_BOOKING->save ($_POST["date"], $_POST["slot"], $_POST["user"])
  ? "OK" : $_BOOKING->error;

// Retrieve latest booking
$sql = "SELECT * FROM booking ORDER BY appo_id DESC LIMIT 0,1";

// Query database
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

// Save details of the latest booking
$bookingId = $row['booking_id'];
$userId = $row['user_id'];

header("location:booking_details.php?bookingId=$bookingId&userId=$userId");

