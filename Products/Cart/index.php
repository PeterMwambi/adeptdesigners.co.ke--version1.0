 <?php

    define("PATHNAME", TRUE);
    require_once("../../models/config/core.php");
    $id = Sanitize::__string(Input::grab("product_id"));
    $cart = new Cart($id);
    $cart->insert();
    $action = isset($_REQUEST["action"]) ? Sanitize::__string($_REQUEST["action"]) : false;
    $update = Input::grab("update") ? Sanitize::__string(Input::grab("update")) : false;
    $get_id = isset($_REQUEST["cid"]) ? (int)(Sanitize::__string($_REQUEST["cid"])) : false;
    $quantity = Input::grab("quantity") ? (int)Sanitize::__string(Input::grab("quantity")) : Session::getValue("quantity");
    if ($action) {
        switch ($action) {
            case 'delete':
                if ($cart->delete($get_id)) {
                    header("location:../../products/cart");
                }
                break;
            case 'emptycart':
                if ($cart->destroyCart()) {
                    header("location:../../products/");
                }
                break;
        }
    }
    if ($update) {
        switch ($update) {
            case 'Update':
                if ($cart->update($id, $quantity)) {
                    header("location:../../products/");
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
     <link rel="icon" href="../../tools/assets/icons/apple-touch-icon-iphone-60x60.png">
     <link rel="icon" sizes="60x60" href="../../tools/assets/icons/apple-touch-icon-ipad-76x76.png">
     <link rel="icon" sizes="114x114" href="../../tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png">
     <link rel="icon" sizes="144x144" href="../../tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png">
     <link rel="stylesheet" href="../../tools/css/global/bootstrap.min.css">
     <link rel="stylesheet" href="../../tools/FontAwesome/css/all.css">
     <link rel="stylesheet" href="../../tools/css/global/uniform.css">
     <link rel="stylesheet" href="../../tools/css/page/cart.css">
     <link rel="stylesheet" href="../../tools/css/global/animate.css">
     <link rel="stylesheet" href="../../tools/css/global/responsive.css">
     <title>Cart</title>
 </head>

 <body>

     <?php include "../../Includes/header/secondary-navbar.php"; ?>

     <div class="container-fluid container-lg">
         <div class="d-flex justify-content-center">
             <div class="col-md-9">
                 <div class="d-flex justify-content-end mt-lg-4 mb-lg-n1">
                     <a class="btn btn-outline-primary text-nowrap" href="../../products/">Continue Shopping</a>
                     <a class="btn btn-outline-danger text-nowrap ml-3" href="<?php echo "../../products/cart?action=emptycart"; ?>">Delete Cart Items</a>
                 </div>
                 <div class="d-flex justify-content-end mt-lg-4 mt-md-4 mb-lg-n1">
                     <p>Total Items: <?php echo ($cart->getTotalItems() > 0) ? $cart->getTotalItems() : 0; ?></p>
                 </div>
                 <table class="table mt-lg-3 table-stripped table-hover table-responsive">
                     <thead>
                         <tr>
                             <th>
                                 Id
                             </th>
                             <th class="text-center w-75">
                                 Name
                             </th>
                             <th><img src="../../tools/assets/dollar.png" class="img-fluid resized"></th>
                             <th>Quantity</th>
                             <th class="text-nowrap">Total Price</th>
                             <th class="text-center">Update</th>
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
                                         <span class="text-warning"><?php echo $cartItems["items"]["price"] ?></span>
                                     </div>
                                 </td>
                                 <form action="" method="post">
                                     <td>
                                         <div class="product-quantity">
                                             <div class="ml-lg-2 d-flex">
                                                 <select class="quantity-counter" name="quantity">
                                                     <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                         <option value="<?php echo $i; ?>" <?php echo ($cart->displayQuantity($cartItems["items"]["id"]) === $i) ? "selected='selected'" : $quantity ?>><?php echo $i; ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="product-price d-flex">
                                             <span class="text-warning"><?php echo ($cartItems["items"]["total_price"]) ?></span>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="delete-item d-flex justify-content-center">
                                             <input type="hidden" name="product_id" value="<?php echo $cartItems["items"]["id"]; ?>">
                                             <input type="submit" name="update" class="btn btn-outline-info" value="Update">
                                         </div>
                                     </td>
                                     <td>
                                         <div class="delete-item d-flex justify-content-center">
                                             <a href="<?php echo "../cart/?cid=" . $cartItems["items"]["id"] . "&action=delete"; ?>" class="hovereble"> <img src="../../Tools/Assets/delete.png" class="img-fluid resized"></a>
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
                         <p class="text-muted">Sub Total: </p>
                         <p class="display-4 ml-lg-3"><?php echo number_format($cart->getTotalPrice(), 1); ?></p>
                         <p class="text-muted mt-lg-4 ml-lg-2">Ksh </p>
                     </div>
                 </div>
                 <div class="d-flex justify-content-center">
                     <a class="btn btn-success w-100 btn-lg" href="../../products/checkout/">Checkout &raquo;</a>
                 </div>
             </div>
         </div>
     </div>


     <?php include "../../Includes/Footer/homepages/footer.php"; ?>

     <script src="../../tools/js/global/jquery.js"></script>
     <script src="../../tools/js/global/bootstrap.min.js"></script>
     <script src="../../tools/js/global/uniform.js"></script>
     <script src="../../tools/js/validator/subscription.js"></script>
 </body>

 </html>