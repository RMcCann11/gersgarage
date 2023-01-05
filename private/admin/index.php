<?php include '../session.php'; ?>

<?php include 'header.php';?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php

                if ($_SERVER['REQUEST_URI'] == '/gersgarage/private/admin/index.php' || $_SERVER["REQUEST_URI"] == '/gersgarage/private/admin/'){

                    include 'admin_index_content.php';

                }

                if(isset($_GET["bookings"])){

                    include 'bookings.php';

                }

                if(isset($_GET["bookings_for_assignment_of_mechanic"])){

                    include 'bookings_for_assignment_of_mechanic.php';

                }

                if(isset($_GET["bookings_for_assignment_of_parts"])){

                    include 'bookings_for_assignment_of_parts.php';

                }

                if(isset($_GET["bookings_for_printing_of_invoice"])){

                    include 'bookings_for_printing_of_invoice.php';

                }


                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'footer.php';?>      

    