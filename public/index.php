<?php

include '../private/session.php';
include '../private/db_connection.php';

$username = $_SESSION['loggedin_user'];

// create SQL statement
$sql = "SELECT * FROM user WHERE user_name='$username'";

// Query database
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

// count the number of records found
$count = mysqli_num_rows($result);

// If result matched $username, table row must be 1 row
if ($count > 0) {

    $userId = $row['user_id'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/select_calendar_values.js"></script>
  <link rel="stylesheet" href="css/my_style.css">
  <link rel="stylesheet" href="css/calendar_style.css">
</head>
<!--
The following lines of code (lines 45 to 68 have) have been sourced from https://hackerthemes.com/bootstrap-cheatsheet/#collapse__navbar-collapse
-->
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-md-0">

            <li class="nav-item">
              <a class="nav-link" href="./user_account.php?userId=<?php echo $userId; ?>">My Account<span class="sr-only">(current)</span></a>
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

          <h1><u>Booking system</u></h1>
          <p id="red">Please select a below time slot.
          </p>
  </div>

<br>
  <div class="row">
          <div class="col-sm-6 offset-sm-3" >

<?php
// (A) LOAD BOOKING + INIT
require "./booking.php";
$start = strtotime("+" . BOOKING_MIN . " day");
$end = strtotime("+" . BOOKING_MAX . " day");
$booked = $_BOOKING->get(date("Y-m-d", $start), date("Y-m-d", $end));
?>

<!-- (B) SELECT BOOKING DATE/SLOT -->
<!-- <h2>SELECT A DATE</h2> -->
<table id="select">
  <!-- (B1) FIRST ROW : HEADER CELLS -->
  <tr>
    <th></th>
    <?php foreach (BOOKING_SLOTS as $slot) {echo "<th>$slot</th>";}?>
  </tr>

  <!-- (B2) FOLLOWING ROWS : DAYS -->
<?php
for ($unix = $start; $unix <= $end; $unix += 86400) {
    $thisDate = date("Y-m-d", $unix);
    echo "<tr><th>$thisDate</th>";
    foreach (BOOKING_SLOTS as $slot) {
        if (isset($booked[$thisDate][$slot])) {
            echo "<td class='booked'>Booked</td>";
        } else {
            echo "<td onclick=\"select(this, '$thisDate', '$slot')\"></td>";
        }
    }
    echo "</tr>";
}
?>
</table>

<br>

<!-- (C) CONFIRM -->
<p id = "red">Please confirm your booking by clicking the below button</p>
  <form id="confirm" method="post" action="register_booking.php">
  <input type="hidden" name="user" value=<?php echo $userId; ?>>
  <input type="text" id="cdate" name="date" readonly>
  <input type="text" id="cslot" name="slot" readonly>
  <br>
  <input type="submit" id="cgo" value="Go" disabled>
</form>

  </div>
</body>
</html>