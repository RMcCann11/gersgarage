<?php 

include '../session.php'; 
include '../db_connection.php'; 
include '../../public/functions.php'; 
include 'header.php';

?>

<?php

$bookingId = $_GET['bookingId'];

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Part</th>
                    <th>Price</th>
                    <th></th>
                </tr>

            </thead>
            <tbody>

            <?php getPartDetails($bookingId);?>

            </tbody>
        </table>


    </div>

</div>

<?php include 'footer.php';?>     