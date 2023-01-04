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

    # Check if form has been submitted for update.

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}


# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  
  # Retrieve all items in the cart from the 'shop' database table.
  $q = "SELECT * FROM part WHERE part_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY part_id ASC';
  $r = mysqli_query ($connection, $q);

  # Display body section with a form and a table.
  echo '<form method="post"><table><tr><th colspan="4">Items in your cart</th></tr><tr>';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['part_id']]['quantity'] * $_SESSION['cart'][$row['part_id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo "<tr> <td>{$row['name']}</td><td><input type=\"text\" size=\"3\" name=\"qty[{$row['part_id']}]\" value=\"{$_SESSION['cart'][$row['part_id']]['quantity']}\"></td>
    <td>@ {$row['price']} = </td> <td>".number_format ($subtotal, 2)."</td></tr>";
  }
  
  # Display the total.
  echo ' <tr><td colspan="5" style="text-align:right">Total = '.number_format($total,2).'</td></tr></table><input type="submit" name="submit" value="Update My Cart"></form>';
}
else
# Or display a message.
{ echo '<p>Your cart is currently empty.</p>' ; }

    ?>

<hr>

<p><a href="assign_parts.php?bookingId=<?php echo $bookingId;?>">Click Here To Continue Adding Parts To Your Cart |</a> <a href="checkout.php?bookingId=<?php echo $bookingId;?>&total=<?php echo $total;?>"> Click Here To Assign The Selected Parts To The Booking</a></p>

    </div>

</div>

<?php include 'footer.php';?>     
