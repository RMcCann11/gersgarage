<?php 

include '../session.php'; 
include '../db_connection.php'; 
include '../../public/functions.php'; 
include 'header.php';

?>

<?php $bookingId = $_GET['bookingId'];?>

<div id="page-wrapper">

    <div class="container-fluid">

    <p></p>

<!-- 
Please note lines 23 - 48 have been taken from the following source:

McGrath, Mike (2018) PHP and MySQL in Easy Steps, 2nd edn. Warwickshire: Easy Steps Limited. -->

    <?php

    # Check for passed total and cart.
if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{
  
  # Store buyer and order total in 'orders' database table.
  $q = "INSERT INTO orders ( booking_id, total, date ) VALUES (".$bookingId.",".$_GET['total'].", NOW() ) ";
  $r = mysqli_query ($connection, $q);
  
  # Retrieve current order number.
  $order_id = mysqli_insert_id($connection) ;
  
  # Retrieve cart items from 'shop' database table.
  $q = "SELECT * FROM part WHERE part_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY part_id ASC';
  $r = mysqli_query ($connection, $q);

  # Store order contents in 'order_contents' database table.
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO order_contents ( orders_id, part_id, quantity, price )
    VALUES ( $order_id, ".$row['part_id'].",".$_SESSION['cart'][$row['part_id']]['quantity'].",".$_SESSION['cart'][$row['part_id']]['price'].")" ;
    $result = mysqli_query($connection,$query);
  }

  changePartsAssigned($bookingId);

  # Remove cart items.  
  $_SESSION['cart'] = NULL;

  setMessage("The selected parts and their respective quantities have been assigned to the booking with id {$bookingId}");

  header("location:index.php?bookings_for_assignment_of_parts");

}
# Or display a message.
else { echo '<p>There are no items in your cart.</p>' ; }

?>

    </div>
</div>

<?php include 'footer.php';?>   