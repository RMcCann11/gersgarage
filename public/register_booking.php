<?php

require "../private/db_connection.php";
require "./booking.php";

echo $_BOOKING->save ($_POST["date"], $_POST["slot"], $_POST["user"])
  ? "OK" : $_BOOKING->error;



