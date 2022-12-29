<?php include '../../public/functions.php'; ?>

<div class="row">

    <h2 class="page-header">This area can be used to filter bookings</h2>

</div>

<form action="view_bookings.php" method="get">


<div class="col-md-8">

    <div class="form-group">
    <label for="booking_date">Date:</label>
    <select id="booking_date" class="form-control" name="date">
            
    
        <option value="">Please select a date</option>
        
        <?php showBookingDatesInAdmin();?>

            

    </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg">
    </div>

</div>

</form>

          