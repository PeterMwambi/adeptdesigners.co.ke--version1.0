<?php
define("PATHNAME", TRUE);
require_once("../models/config/core.php");
if (!Session::exists("order_id")) {
    die(header("location:../products/?failed=" . false));
}
$cart = new Cart($id);
if ($cart->getTotalItems() <= 0) {
    header("location:../products/?failed=" . false);
}
$cart->insert();
$action = isset($_REQUEST["action"]) ? Sanitize::__string($_REQUEST["action"]) : false;
$get_id = isset($_REQUEST["cid"]) ? (int)(Sanitize::__string($_REQUEST["cid"])) : false;
if ($action) {
    switch ($action) {
        case 'delete':
            if ($cart->delete($get_id)) {
                header("location:checkout.php");
            }
            break;
    }
}
$conn = Database::getInstance();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../tools/assets/icons/apple-touch-icon-iphone-60x60.png">
    <link rel="icon" sizes="60x60" href="../tools/assets/icons/apple-touch-icon-ipad-76x76.png">
    <link rel="icon" sizes="114x114" href="../tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png">
    <link rel="icon" sizes="144x144" href="../tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png">
    <link rel="stylesheet" href="../tools/css/global/bootstrap.min.css">
    <link rel="stylesheet" href="../tools/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../tools/css/global/uniform.css">
    <link rel="stylesheet" href="../tools/css/page/checkout.css">
    <link rel="stylesheet" href="../tools/css/global/animate.css">
    <link rel="stylesheet" href="../tools/css/global/responsive.css">
    <title>Checkout</title>
</head>

<body>
    <div class="container bg-light">
        <div class="d-flex justify-content-center mt-lg-5 overflow-hidden rounded">
            <div class="d-block m-lg-4">
                <div class="d-flex justify-content-center">
                    <div class="welcome-header mt-lg-5 mb-lg-2">
                        <h3 class="display-5 text-success"> Order Successful </h3>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <b>Name</b> : <?php echo Session::getValue("name"); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <b> Email </b> : <?php echo Session::getValue("email"); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <b> Phone Number </b> : <?php echo Session::getValue("phone_number"); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <b> National Id </b> : <?php echo Session::getValue("national_id"); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <b>Items</b> : <?php echo $cart->getTotalItems(); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <b> Price </b> : <?php echo $cart->getTotalPrice(); ?>
                </div>
                <div class="order_id d-flex justify-content-center">
                    <b>Order Id</b> : <?php echo Session::getValue("order_id"); ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-lg-3">
            <a class="btn btn-outline-info mb-lg-5" href="../products/">Click to continue Shopping &raquo;</a>
        </div>
    </div>


    <?php include "../Includes/Footer/homepages/footer.php"; ?>

    <script src="../tools/js/global/jquery.js"></script>
    <script src="../tools/js/global/bootstrap.min.js"></script>
    <script src="../tools/js/global/uniform.js"></script>
    <script src="../tools/js/validator/subscription.js"></script>
</body>

</html>