<?php

$username = $_SESSION['loggedin_user'];

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Welcome <?php echo $username?> to the administration portal.
        </h1>
        <p>Please click any of the links to the side depending on the action you wish to take.</p>
    </div>
</div>