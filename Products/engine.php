<?php

$_SERVER["REQUEST_METHOD"] === "POST" or exit(header("location:checkout.php"));
$failMsg = null;
$successMsg = null;

$authenticator = new Authenticator($_POST, "checkout");
$lastname = Sanitize::__string(ucfirst(Input::grab("lastname")));
$firstname = Sanitize::__string(ucfirst(Input::grab("firstname")));
$name = $firstname . " " . $lastname;
if (!$authenticator->assertStatus()) {
    $failMsg = $authenticator->getMsg();
} else {
    if (!$authenticator->authenticateCheckOut()) {
        $failMsg = "Error processing your order. <a class='btn btn-light' href='../contacts/'>Click </a> to contact customer care support";
    }
    if ($failMsg === null) {
        $successMsg = "Hello " . $name . " , your order has been placed successfully";
        Session::generate("flash_message", $successMsg);
        header("location:orders.php");
    }
}
