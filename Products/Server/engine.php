<?php

$_SERVER["REQUEST_METHOD"] === "POST" or exit(header("location:../products/checkout/"));
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
        sleep(10);       
        header("location:../../products/orders");
    }
}
