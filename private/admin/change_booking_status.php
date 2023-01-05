<?php include '../session.php'; ?>
<?php include '../db_connection.php'; ?>
<?php include '../../public/functions.php'; ?>
<?php include 'header.php';?>

<?php

$bookingId = $_GET['bookingId'];

if(isset($_POST["submit_status"])){

    $bookingStatusId = $_POST["status_id"];

    // create SQL statement
    $sql = "UPDATE booking_detail SET booking_status_id = $bookingStatusId WHERE booking_id = $bookingId";

    // Query database
    $result = mysqli_query($connection, $sql);
    
    setMessage("The booking with id {$bookingId} has been assigned the new status.");

    header("location:index.php?bookings_for_changing_of_booking_status");

}

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <form action="" method="post">

            <select name="status_id" id="status_id" class="form-control">
                <option value="">Please select a status for this booking</option>

                <?php showBookingStatuses();?>

            </select>

            <br>

            <div class="form-group">
            <input type="submit" name="submit_status" class="btn btn-primary btn-lg" value="Submit Status">
            </div>

        </form>

    </div>
</div>