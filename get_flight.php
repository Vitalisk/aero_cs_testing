<?php
include_once ('Classes/Functions.php');
$functions = new Functions();
$trip_type = "RT";
$from = "WIL";
$to = "MBA";
$flight_id = "24709797";
$fare_id = "490617";
$flight_id2 = "24710760";
$fare_id2 = "490618";
$functions->get_flight($trip_type, $from, $to, $flight_id,$fare_id, $flight_id2,$fare_id2);
