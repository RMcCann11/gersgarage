<?php include '../../public/functions.php'; ?>

<div class="row">

    <h2 class="page-header">This area can be used to filter bookings by date.</h2>
    <h3 style="color:green;text-align:left;">Please note that in this section bookings can be filtered by a particular day.</h3>

    <br>

</div>

<form action="view_bookings_by_day.php" method="get">


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

    <hr>

    <h3 style="color:green;text-align:left;">Please note that in this section bookings can be filtered by a date range.</h3>

    <br>

</div>

</form>

<p style="color:red;text-align:center;">Please note that if a date doesn't appear in any of the dropdown menus, no bookings exist for this date.</p>

<form action="view_bookings_by_range.php" method="get">


<div class="col-md-8">

    <div class="form-group">
    <label for="start_booking_date">Start Date:</label>
    <select id="start_booking_date" class="form-control" name="start_date">
            
    
        <option value="">Please select a start date</option>
        
        <?php showBookingDatesInAdmin();?>

    </select>
    </div>

    <div class="form-group">
    <label for="end_booking_date">End Date:</label>
    <select id="end_booking_date" class="form-control" name="end_date">
            
    
        <option value="">Please select a end date</option>
        
        <?php showBookingDatesInAdmin();?>

    </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg" value = "Submit Dates">
    </div>

</div>

</form>


          