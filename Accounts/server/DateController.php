<?php

if ($_SERVER["HTTP_X_REQUESTED_WITH"] != 'XMLHttpRequest') {
    exit(header("location:../../errors/"));
}
define("PATHNAME", TRUE);
require_once("../../models/config/core.php");
$day = Input::grab("day");
$month = Input::grab("month");
$month = date("m", strtotime($month));
$year = Input::grab("year");

if (!Functions::validateDate($day, $month, $year)) {
    $message = array("flag" => 0, "message" => "You have entered an incorrect date");
} else {
    $message = array("flag" => 1);
}
echo json_encode($message);
