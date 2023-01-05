<?php include '../session.php';?>
<?php include '../db_connection.php';?>
<?php include '../../public/functions.php';?>
<?php include 'header.php';?>

<?php $bookingId = $_GET["bookingId"];?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <h3 style="color:green;text-align:left;"><u>Booking Details:</h3></u>

            <table class="table table-hover">

                <tbody>

                <?php getBookingDetailsForInvoice($bookingId);?>

                </tbody>

            </table>

        </div>

        <div class="row">

            <h3 style="color:green;text-align:left;"><u>Price Breakdown:</u></h3>

            <table class="table table-hover">

            <tbody>

                <?php 
                
                // create SQL statement
                $sql = "SELECT * FROM booking WHERE booking_id = $bookingId";

                // Query database
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);

                if ($row["parts_assigned"] == 'N') {

                    getProductPriceForInvoiceWithoutParts($bookingId);

                } else {

                    $fixedCost = getProductPriceAsFixedPrice($bookingId);
                    $variableCost = getOrderTotal($bookingId);
                    $orderId = getOrderId($bookingId);
                    

                    getProductPriceForInvoiceWithParts($bookingId);
                    
                    getAdditionalInfoForInvoiceWithParts($orderId);

                    getOrderTotalForInvoiceWithParts($fixedCost, $variableCost);   

                }

                ?>

            </tbody>

            </table>

        </div>


    </div>

</div>

<?php include 'footer.php';?>


