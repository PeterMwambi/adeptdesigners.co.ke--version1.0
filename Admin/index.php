<?php
define("PATHNAME", true);
require "../models/config/core.php";
$product_cartegory = array("Men Fashion", "Women Fashion", "Beauty and Salon", "Shoes", "Bags", "Jewelery");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" href="../tools/assets/icons/apple-touch-icon-iphone-60x60.png">
    <link rel="icon" sizes="60x60" href="../tools/assets/icons/apple-touch-icon-ipad-76x76.png">
    <link rel="icon" sizes="114x114" href="../tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png">
    <link rel="icon" sizes="144x144" href="../tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png">
    <link rel="stylesheet" href="../tools/css/global/bootstrap.min.css">
    <link rel="stylesheet" href="../tools/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../tools/css/global/uniform.css">
    <link rel="stylesheet" href="../tools/css/global/animate.css">
    <link rel="stylesheet" href="../tools/css/page/home.css">
    <link rel="stylesheet" href="../tools/css/global/responsive.css">
    <title>Administrators Login</title>
    <link rel="stylesheet" href="../tools/css/page/admin/home.css">
</head>

<body>
    <div class="container-fluid p-0 animate__animated animate__fadeIn">
        <div id="admin-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item overlay active">
                    <img src="../Gallery/Shoes/hipkicks-A2FlAh8cFW8-unsplash.jpg" class="img-fluid">
                </div>
                <div class="carousel-item animate__animated animate__fadeIn overlay">
                    <img src="../Gallery/men/inna-lesyk-oSaJDA9XJmY-unsplash.jpg" class="img-fluid">
                </div>
                <div class="carousel-item animate__animated animate__fadeIn overlay">
                    <img src="../Gallery/women/chema-photo-QmPmJhreK7o-unsplash.jpg" class="img-fluid">
                </div>
                <div class="carousel-item animate__animated animate__fadeIn overlay">
                    <img src="../Gallery/jewelery/barrett-ward-P44RIGl9V54-unsplash.jpg" class="img-fluid">
                </div>
                <div class="carousel-item animate__animated animate__fadeIn overlay">
                    <img src="../Gallery/Shoes/brunel-johnson-QosA0iWdEsw-unsplash.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="container admin-login position-absolute">
        <div class="d-flex justify-content-center">
            <div class="admin-login-body shadow-lg">
                <div class="d-flex justify-content-center mb-lg-4">
                    <img src="../Tools/Assets/title.png" class="img-fluid title">
                </div>
                <div class="d-flex justify-content-center">
                    <form action="<?php echo htmlspecialchars(""); ?>" class="col-md-7" method="post" enctype="multipart/form-data">
                        <?php if (isset($displayError)) { ?>
                            <div class="alert alert-danger"><?php echo $displayError; ?></div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="username">Enter username:</label>
                            <input type="text" name="username" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Enter password:</label>
                            <input type="password" name="password" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group mt-lg-4">
                            <input type="submit" name="login" class="btn btn-lg btn-outline-dark" value="Login &raquo;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>








    <script src="../tools/js/global/jquery.js"></script>
    <script src="../tools/js/global/bootstrap.min.js"></script>
    <script src="../tools/js/global/uniform.js"></script>
    <script src="../tools/js/validator/subscription.js"></script>


</body>

</html>