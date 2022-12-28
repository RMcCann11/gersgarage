<?php

$username = $_SESSION['loggedin_user'];

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Welcome <?php echo $username?> to the administration portal.
        </h1>
        <p>In terms of the actions that can be performed here, please see the menu to the left.</p>
        <p>Please click on the appropriate link for the action you wish to take. </p>
    </div>
</div>