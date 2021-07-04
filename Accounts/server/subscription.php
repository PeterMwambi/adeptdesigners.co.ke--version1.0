<?php

/**
 * @author Peter Mwambi
 * @time  Mon Oct 05 2020 13:13:35 GMT+0300 (East Africa Time)
 * @content Newsletter subscription authenticator
 */

if ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    die(header("location:../../errors/"));
}
define("PATHNAME", TRUE);
require_once("../../models/config/core.php");
$token = Input::grab("token");
if (!hash_equals(Session::getValue("SUBSCRIPTION_AUTHENTICATOR"), $token)) {
    die(header("location:../../errors/"));
}
if (Token::createInstance("SUBSCRIPTION_AUTHENTICATOR")) {
    $validator = new Validator;
    $validator->factory__validateSubscriptionForm($_POST);
    if (!$validator->factory__confirmStatus()) {
        echo json_encode(array("error" => $validator->factory__outputErrorToGUI(), "flag" => 0));
    } else {
        if ($validator->factory__authenticateUserSubscription()) {
            echo json_encode(array("flag" => 1, "message" => "Congratulations. Your email has been added successfully. You will receive daily updates on fashion news straight to your email address"));
        }
    }
} else {
    die(header("location:../../errors/"));
}
