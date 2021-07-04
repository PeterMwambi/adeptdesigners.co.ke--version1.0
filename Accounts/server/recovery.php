<?php

/**
 * @author Peter Mwambi
 * @time Mon Oct 05 2020 13:05:48 GMT+0300 (East Africa Time)
 * @content account recovery validator
 */

if ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    die(header("location:../../errors/"));
}
define("PATHNAME", TRUE);
require_once("../../models/config/core.php");
$token = Input::factory__getFieldData("token");
if (!hash_equals(Session::factory__getSessionValue("RECOVERY_AUTHENTICATOR"), $token)) {
    die(header("location:../../errors/"));
}
$validator = new Validator;
$validator->factory__validateAccountRecoveryForm($_POST);
if (!$validator->factory__confirmStatus()) {
    echo json_encode(array("error" => $validator->factory__outputErrorToGUI(), "flag" => 0));
} else {
    if ($validator->factory__authenticateAccountRecovery()) {
        echo json_encode(array("flag" => 1, "message" => "Your account was found successfully. An email has been sent with links to recover your account"));
    }
}
