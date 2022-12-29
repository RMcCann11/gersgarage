<?php include '../session.php'; ?>
<?php include '../db_connection.php'; ?>
<?php include '../../public/functions.php'; ?>
<?php include 'header.php';?>

<?php

$date = $_GET['date'];

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Booking Id</th>
                    <th>Booking Date</th>
                    <th>Booking Slot</th>
                    <th></th>
                </tr>

            </thead>
            <tbody>

            <?php getBookingsByDate($date);?>

            </tbody>
        </table>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include 'footer.php';?>     

    