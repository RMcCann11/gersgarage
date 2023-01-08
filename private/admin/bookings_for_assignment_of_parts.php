<?php include '../../public/functions.php'; ?>

<div class="row">

    <h2 class = "bg-success text-center"><?php displayMessage(); ?></h2>
    <h2 class="page-header">This area can be used to assign the cost of parts to a booking.</h2>
    <h3 style="color:green;text-align:left;">In order to assign parts to a booking, please select a date in the below dropdown menu to view bookings for that date.</h3>

    <br>

</div>

<form action="list_bookings_for_assignment_of_parts.php" method="get">


<div class="col-md-8">

    <div class="form-group">
    <label for="booking_date">Date:</label>
    <select id="booking_date" class="form-control" name="date">
            
    
        <option value="">Please select a date</option>
        
        <?php showBookingDatesInAdmin();?>

    </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg" value = "Submit Date">
    </div>

</div>

</form>

<p style="color:red;text-align:center;">Please note that if a date doesn't appear in the dropdown menu, no bookings exist for this date.</p>



          