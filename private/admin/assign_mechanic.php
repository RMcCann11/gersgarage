<?php include '../session.php'; ?>
<?php include '../db_connection.php'; ?>
<?php include '../../public/functions.php'; ?>
<?php include 'header.php';?>

<?php

$bookingId = $_GET['bookingId'];

if(isset($_POST["submit_mechanic"])){

    $mechanicId = $_POST["mechanic_id"];

    // create SQL statement
    $sql = "UPDATE booking SET mechanic_id = $mechanicId WHERE booking_id = $bookingId";

    // Query database
    $result = mysqli_query($connection, $sql);
    
    setMessage("The mechanic with id {$mechanicId} has been assigned to the booking with id {$bookingId}");

    header("location:index.php?bookings_for_assignment_of_mechanic");
   
}

?>

<div id="page-wrapper">

    <div class="container-fluid">

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

        <?php getBooking($bookingId);?>

        </tbody>
        </table>

    </div>
    <!-- /.container-fluid -->

    <form action="" method="post">

        <select name="mechanic_id" id="mechanic_id" class="form-control">
            <option value="">Please select a mechanic</option>

            <?php showMechanicDetails();?>

      </select>

      <br>

      <div class="form-group">
        <input type="submit" name="submit_mechanic" class="btn btn-primary btn-lg" value="Submit Mechanic">
      </div>

    </form>

</div>
<!-- /#page-wrapper -->

<?php include 'footer.php';?>     

    