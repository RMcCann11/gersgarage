<?php include '../session.php'; ?>
<?php include '../db_connection.php'; ?>
<?php include '../../public/functions.php'; ?>
<?php include 'header.php';?>

<?php

$bookingId = $_GET['bookingId'];

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <table class="table table-hover">

        <thead>

            <tr>
                <th>Booking Id</th>
                <th>Booking Date</th>
                <th>Booking Slot</th>
                <th>Vehicle Type</th>
                <th>Vehicle Model</th>
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

</div>
<!-- /#page-wrapper -->

<?php include 'footer.php';?>     

    