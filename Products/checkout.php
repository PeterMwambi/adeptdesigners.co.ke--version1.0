<?php
define("PATHNAME", TRUE);
require_once("../models/config/core.php");
$cart = new Cart($id);
if ($cart->getTotalItems() <= 0) {
    header("location:../products/?failed=" . true);
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

    <?php

    require("../Includes/header/secondary-navbar.php");
    if (Input::grab("checkout")) {
        require_once("engine.php");
    }

    ?>


    <div class="container-fluid">
        <div class="d-flex">
            <div class="col-md-6">
                <div class="d-flex justify-content-center mt-lg-5 bg-light overflow-hidden rounded">
                    <div class="mt-lg-5">
                        <div class="d-flex justify-content-center mb-lg-4">
                            <img src="../Tools/Assets/title.png" class="img-fluid title">
                        </div>
                        <?php if (isset($failMsg)) { ?>
                            <div class="alert alert-danger">
                                <span class="message"><?php echo $failMsg; ?></span>
                            </div>
                        <?php } elseif ($successMsg) { ?>
                            <div class="alert alert-success d-flex justify-content-center">
                                <span class="message"><?php echo $successMsg ?></span>
                            </div>
                        <?php } ?>
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstname">Firstname:</label>
                                    <input type="text" name="firstname" value="<?php echo Sanitize::__string(Input::grab("firstname")); ?>">
                                </div>
                                <div class="form-group ml-lg-5">
                                    <label for="lastname">Lastname:</label>
                                    <input type="text" name="lastname" value="<?php echo Sanitize::__string(Input::grab("lastname")); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="<?php echo Sanitize::__string(Input::grab("email")); ?>">
                            </div>

                            <div class="form-group">
                                <label for="phone-number">Phone Number:</label>
                                <input type="text" name="phone-number" value="<?php echo Sanitize::__string(Input::grab("phone-number")); ?>">
                            </div>
                            <div class="form-group">
                                <label for="id-number">National ID Number:</label>
                                <input type="text" name="national-id" value="<?php echo Sanitize::__string(Input::grab("national-id")); ?>">
                            </div>
                            <div class="form-group mt-lg-5">
                                <div class="d-flex justify-content-center mb-lg-3">
                                    <h5 class="text-body">Choose your preferred payment mode</h5>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="payment-mode" value="">
                                    <div class="mt-lg-1">
                                        <button class="payment-btn option-1"><img src="../Tools/Assets/paypal.png" class="img-fluid resized-lg"></button>
                                    </div>
                                    <div class="ml-lg-5">
                                        <button class="payment-btn option-2"><img src="../Tools/Assets/mpesa-logo-AE44B6F8EB-seeklogo.com.png" class="img-fluid resized-md"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ml-lg-5">
                            </div>
                            <div class="form-group mt-lg-4 mb-lg-5">
                                <input type="submit" name="checkout" class="btn btn-lg btn-success shadow" value="Click To Order Now &raquo;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 checkout-items mt-lg-5 ml-lg-5">
                <div class="d-flex justify-content-center">
                    <h1 class="display-4">My Cart</h1>
                </div>
                <div class="d-flex justify-content-end mt-lg-2 mb-lg-n1">
                    <p>Total Items: <?php echo ($cart->getTotalItems() > 0) ? $cart->getTotalItems() : 0; ?></p>
                </div>
                <table class="table mt-lg-3 table-stripped">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th class="text-center w-75">
                                Name
                            </th>
                            <th><img src="../tools/assets/dollar.png" class="img-fluid resized"></th>
                            <th>Quantity</th>
                            <th class="text-nowrap">Total Price</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($cart->displayItems() as $cartItems) { ?>
                            <tr>
                                <td>
                                    <div class="id">
                                        <p class="text-info"><?php echo $index; ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-name d-flex justify-content-center">
                                        <p class="muted text-body text-nowrap text-center"><?php echo ucwords($cartItems["items"]["name"]); ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-price d-flex">
                                        <span class="text-dark"><?php echo $cartItems["items"]["price"] ?></span>
                                    </div>
                                </td>
                                <form action="" method="post">
                                    <td>
                                        <div class="product-quantity">
                                            <div class="d-flex justify-content-center"><?php echo $cart->displayQuantity($cartItems["items"]["id"]); ?></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-price d-flex">
                                            <span class="text-warning"><?php echo ($cartItems["items"]["total_price"]) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="delete-item d-flex justify-content-center">
                                            <a href="<?php echo "checkout.php?cid=" . $cartItems["items"]["id"] . "&action=delete"; ?>" class="hovereble"> <img src="../Tools/Assets/delete.png" class="img-fluid resized"></a>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <?php
                            $index++; ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if ($cart->getTotalPrice() > 0) {
                    echo "<hr>";
                } ?>
                <div>
                    <div class="d-flex justify-content-end payment-banner">
                        <p class="text-muted mt-lg-4">Sub Total: </p>
                        <p class="display-4 ml-lg-3 text-warning"><?php echo number_format($cart->getTotalPrice(), 1); ?></p>
                        <p class="text-muted mt-lg-4 ml-lg-2">Ksh </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="../products/">Continue Shopping &raquo;</a>
                </div>
            </div>
        </div>
    </div>


    <?php include "../Includes/Footer/homepages/footer.php"; ?>

    <script src="../tools/js/global/jquery.js"></script>
    <script src="../tools/js/global/bootstrap.min.js"></script>
    <script src="../tools/js/global/uniform.js"></script>
    <script src="../tools/js/validator/subscription.js"></script>
</body>

</html>