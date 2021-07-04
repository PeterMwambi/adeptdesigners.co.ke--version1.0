<?php
define("PATHNAME", true);
require "../../../models/config/core.php";
$product_cartegory = array("Men Fashion", "Women Fashion", "Beauty and Salon", "Shoes", "Bags", "Jewelery");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" href="../../../tools/assets/icons/apple-touch-icon-iphone-60x60.png">
    <link rel="icon" sizes="60x60" href="../../../tools/assets/icons/apple-touch-icon-ipad-76x76.png">
    <link rel="icon" sizes="114x114" href="../../../tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png">
    <link rel="icon" sizes="144x144" href="../../../tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png">
    <link rel="stylesheet" href="../../../tools/css/global/bootstrap.min.css">
    <link rel="stylesheet" href="../../../tools/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../../../tools/css/global/uniform.css">
    <link rel="stylesheet" href="../../../tools/css/global/animate.css">
    <link rel="stylesheet" href="../../../tools/css/page/home.css">
    <link rel="stylesheet" href="../../../tools/css/global/responsive.css">
    <title>Add Products</title>
    <link rel="stylesheet" href="../../../tools/css/page/admin/products.css">
</head>

<body>
    <div class="container">
        <div class="console-body">
            <div class="d-flex justify-content-center mb-lg-4">
                <h1 class="text-warning">Add Item</h1>
            </div>
            <?php
            if (Input::grab("addsupplier")) {
                $authenticator = new Authenticator($_POST, null);
                $msg = null;
                if (!$authenticator->assertStatus()) {
                    $msg = $authenticator->getMsg();
                }
                if (!$authenticator->generateUploadRequest("fileToUpload", "../../../uploads/products/")) {
                    $msg = $authenticator->getMsg("file-upload-error");
                } else {
                    if (!$authenticator->authenticateAdminProcessAdd()) {
                        $msg = "supplier Add Failed";
                    }
                    if (is_null($msg)) {
                        $successMsg = "supplier Added Successfully";
                    }
                }
            }
            ?>
            <div class="col-md-12 upload-body">
                <form action="<?php echo htmlspecialchars(""); ?>" method="post" enctype="multipart/form-data">
                    <?php if (isset($msg)) { ?>
                        <div class="alert alert-danger d-flex justify-content-center"><?php echo $msg; ?></div>
                    <?php } ?>
                    <?php if (isset($successMsg)) { ?>
                        <div class="alert alert-success d-flex justify-content-center"><?php echo $successMsg; ?></div>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier-name" class="text-light">Enter supplier name:</label>
                                <input type="text" name="supplier-name" value="<?php echo Sanitize::__string(Input::grab("product-name")); ?>" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="supplier-description" class="text-light">Enter supplier description:</label>
                                <textarea name="supplier-description" class="form-control" rows="3" cols="20"><?php echo Sanitize::__string(Input::grab("product-description")); ?></textarea>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="supplier-price" class="text-light">Enter supplier price:</label>
                                <input type="text" name="supplier-price" value="<?php echo Sanitize::__string(Input::grab("product-price")); ?>" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="supplier-cartegory" class="text-light">Choose supplier cartegory:</label>
                                <select name="supplier-cartegory" class="form-control">
                                    <?php
                                    $cartegorySelected = Sanitize::__string(Input::grab("supplier-cartegory"));
                                    foreach ($supplier_cartegory as $cartegory) {
                                        echo "<option value='" . $cartegory . "'" . (isset($cartegorySelected) ? "selected='selected'" : null) . ">" . $cartegory . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 ml-lg-5">
                            <?php
                            if (isset($_FILES["fileToUpload"]["name"])) {
                                echo "<img src='../../../uploads/products/" . Sanitize::__string($_FILES["fileToUpload"]["name"]) . "' class='img-fluid product-picture-review'>";
                            } else {
                                echo "<img src='../../../uploads/products/man2.png' class='img-fluid product-picture-review resized'>";
                            }
                            ?>
                            <div class="d-flex justify-content-center">
                                <span class="text-light image-list"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-lg-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" name="addsuppleir" class="btn btn-lg btn-outline-info" value="Add new suppleir &raquo">
                            </div>
                        </div>
                        <div class="col-md-5 ml-lg-5">
                            <div class="form-group">
                                <label for="fileToUpload" class="btn btn-lg btn-outline-primary w-100">Click to upload &raquo;</label>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <script src="../../../tools/js/global/jquery.js"></script>
    <script src="../../../tools/js/global/bootstrap.min.js"></script>
    <script src="../../../tools/js/global/uniform.js"></script>
    <script src="../../../tools/js/page/admin.js"></script>


</body>

</html>