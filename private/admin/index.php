<?php include '../session.php'; ?>

<?php include 'header.php';?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php

                if ($_SERVER['REQUEST_URI'] == '/gersgarage/private/admin/index.php'){

                    include 'admin_index_content.php';

                }


                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'footer.php';?>      

    