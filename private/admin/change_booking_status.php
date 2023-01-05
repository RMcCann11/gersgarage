<?php include '../session.php'; ?>
<?php include '../db_connection.php'; ?>
<?php include '../../public/functions.php'; ?>
<?php include 'header.php';?>

<?php

$bookingId = $_GET['bookingId'];

if(isset($_POST["submit_status"])){

}

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <form action="" method="post">

            <select name="mechanic_id" id="mechanic_id" class="form-control">
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