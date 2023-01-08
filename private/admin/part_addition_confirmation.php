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

<?php
# Get passed product id and assign it to a variable.
if ( isset( $_GET['partId'] ) ) $id = $_GET['partId'] ; 

# Retrieve selective item data from 'shop' database table. 
$q = "SELECT * FROM part WHERE part_id = $id" ;
$r = mysqli_query( $connection, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one of this product id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
    # Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo '<p>Another '.$row["name"].' has been added to your cart.</p>'; 
  } 
  else
  {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['price'] ) ;
    echo '<p>A '.$row["name"].' has been added to your cart</p>.' ; 
  }
}

?>

<hr>

<p><a href="assign_parts.php?bookingId=<?php echo $bookingId;?>">Click Here To Continue Adding Parts To Your Cart |</a> <a href="cart.php?bookingId=<?php echo $bookingId;?>"> Click Here To View Your Cart</a></p>





    </div>

</div>

<?php include 'footer.php';?>     