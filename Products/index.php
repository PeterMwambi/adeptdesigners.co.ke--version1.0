<?php


define("PATHNAME", TRUE);
require_once("../models/config/core.php");
$product_cartegory = array("Men Fashion", "Women Fashion", "Beauty and Salon", "Shoes", "Bags", "Jewelery");
$cartegory = "Shoes";
if (input::grab("cartegory")) {
    $cartegory = Sanitize::__string(Input::grab("cartegory"));
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
    <link rel="stylesheet" href="../tools/css/page/item.css">
    <link rel="stylesheet" href="../tools/css/page/products.css">
    <link rel="stylesheet" href="../tools/css/global/animate.css">
    <link rel="stylesheet" href="../tools/css/global/responsive.css">
    <title>Products</title>
</head>

<body>
    <?php
    $conn = Database::getInstance();
    $conn->generateSelectQuery(array("*"), "products", 0, array("product_cartegory", "=", $cartegory));
    $results =  $conn->getOutput();
    ?>
    <!-- Begin home content -->
    <div class="products-body">
        <?php if (Input::grab("failedStatus")) { ?>
            <div class="alert alert-danger alert-dismissible fade show mb-0">
                <div class="d-flex justify-content-center">
                    <?php echo "No Item Has been added to your cart"; ?>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } ?>
        <!-- Secondary navigation bar-->

        <!-- @Content header URL links  -->
        <?php include "../Includes/header/secondary-navbar.php"; ?>
        <!-- End secondary navigation bar content -->
        <div class=" container-fluid p-0 animate__animated animate__fadeIn content-for-large-width-screens">
            <div id="products-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($x = 0; $x <= count($results); $x++) {
                    ?>
                        <?php if ($x == 0) { ?>
                            <li data-target="#products-carousel" data-slide-to="<?php echo $x; ?>" class="active"></li>
                            <?php continue; ?>
                        <?php } ?>
                        <li data-target="#products-carousel" data-slide-to="<?php echo $x; ?>"></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item overlay active">
                        <img src="<?php echo "../uploads/products/" . $results[0]->product_url; ?>" class="img-fluid">
                    </div>
                    <?php foreach ($results as $result) { ?>
                        <div class="carousel-item overlay">
                            <img src="<?php echo "../uploads/products/" . $result->product_url; ?>" class="img-fluid">
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#products-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#products-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="productsDisplayBar">
            <div id="productsDisplay">
                <div id="cartegory-shoes">
                    <div class="d-flex justify-content-center mb-lg-3">
                        <h1 class="text-muted text-nowrap"><?php echo isset($cartegory) ? $cartegory : "Shoes" ?></h1>
                    </div>
                    <div class="row">
                        <?php foreach ($results as $result) { ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="<?php echo "../uploads/products/" . $result->product_url; ?>" class="img-fluid resizedProductsImage">
                                    </div>
                                    <div class="d-flex justify-content-center mt-lg-3">
                                        <h5 class="muted text-body text-nowrap text-center"><?php echo ucfirst($result->product_name); ?></h5>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <p class="muted text-center ml-lg-2 mr-lg-2 mt-lg-1 mb-lg-2"><?php echo $result->product_description; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <form method="post" action="<?php echo htmlspecialchars("../products/cart/"); ?>">
                                            <div class="d-flex justify-content-center mb-lg-2 mt-lg-2">
                                                <img src="../tools/assets/dollar.png" class="img-fluid resized"> &nbsp;<span class="text-warning"><?php echo $result->price; ?> Ksh</span>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?php echo $result->product_id; ?>">
                                            <div class="d-flex justify-content-center">
                                                <input type="submit" name="addCart" class="btn btn-warning" value="Add to Cart &raquo;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-identifier">
            <a class="open" href="javascript:void(0)"><img src="../Tools/Assets/info.png" class="img-fluid info-img" title="Click to select a product cartegory"></a>
        </div>
        <div class="cartegory-identifier">
            <div class="cartegory-background">
                <div class="d-flex justify-content-end">
                    <button type="button" class="mr-lg-3 mb-1 close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="p-lg-4">
                    <div class="d-flex justify-content-center">
                        <p class="display-5 text-light">Choose Your Cartegory</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form method="post" action="<?php echo htmlspecialchars(""); ?>">
                            <div class="d-flex">
                                <div class="form-group mr-lg-3 mr-md-3">
                                    <select class="form-control" name="cartegory">
                                        <?php foreach ($product_cartegory as $cartegory) { ?>
                                            <option value="<?php echo $cartegory; ?>"><?php echo $cartegory; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" name="getproduct" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../Includes/Footer/homepages/footer.php"; ?>

    <script src="../tools/js/global/jquery.js"></script>

    <script>
        $(".close").click(function() {
            $(".cartegory-identifier").hide("fast", function() {
                $(".open").show();
            });
        })
        $(".open").click(function() {
            $(".cartegory-identifier").show("fast");
            $(this).hide();
        })
    </script>
    <script src="../tools/js/global/bootstrap.min.js"></script>
    <script src="../tools/js/global/uniform.js"></script>
    <script src="../tools/js/validator/subscription.js"></script>
</body>

</html>