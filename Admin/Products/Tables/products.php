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
    <title>Display Products</title>
    <link rel="stylesheet" href="../../../tools/css/page/admin/products.css">
</head>

<body>
    <div class="container-fluid">
        <div class="console-body">
            <div class="d-flex justify-content-center mb-lg-4">
                <h1 class="text-warning">Table: Products</h1>
            </div>
            <div class="d-flex justify-content-end mb-lg-5 mr-lg-3">
                <a href="../forms/add.php" class="btn btn-outline-info">Click to Add products</a>
            </div>
            <?php
            $conn = Database::getInstance();
            $conn->generateSelectQuery(array("*"), "products");
            $results =  $conn->getOutput();
            $product_id = Sanitize::__int(Input::grab("pid"));
            $imgUrl = Sanitize::__string(Input::grab("imgurl"));
            $action = Sanitize::__string(Input::grab("action"));
            if ($product_id) {
                switch ($action) {
                    case 'delete':
                        if ($conn->generateDeleteQuery("products", array("product_id", "=", $product_id))) {
                            if (unlink("../../../uploads/products/$imgUrl")) {
                                header("location:products.php?status=" . true);
                            }
                        }
                        break;
                }
            }
            ?>
            <?php if (Input::grab("status")) { ?>
                <?php $msg = "Record deleted Successfully"; ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <p><?php echo $msg ?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="upload-body d-flex justify-content-center">
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Id</th>
                            <th>Product Url</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Product Status</th>
                            <th>Product Cartegory</th>
                            <th>View Record</th>
                            <th>Update Record</th>
                            <th>Delete Record</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result) { ?>
                            <tr>
                                <td><?php echo  $result->id; ?></td>
                                <td><?php echo  $result->product_id; ?></td>
                                <td><?php echo  $result->product_url; ?></td>
                                <td><?php echo  $result->product_name; ?></td>
                                <td class="text-info"><?php echo  $result->price; ?></td>
                                <td><?php echo  $result->product_description; ?></td>
                                <td><?php echo  $result->product_status; ?></td>
                                <td><?php echo  $result->product_cartegory; ?></td>
                                <td><a href="<?php echo "products.php?pid=" . $result->product_id . "&action=view"; ?>" class="btn btn-outline-primary">View</a></td>
                                <td><a href="<?php echo "products.php?pid=" . $result->product_id . "&action=update"; ?>" class="btn btn-outline-info">Update</a></td>
                                <td><a href="<?php echo "products.php?pid=" . $result->product_id . "&imgurl=" . $result->product_url . "&action=delete"; ?>" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script src="../../../tools/js/global/jquery.js"></script>
    <script src="../../../tools/js/global/bootstrap.min.js"></script>
    <script src="../../../tools/js/global/uniform.js"></script>
    <script src="../../../tools/js/page/admin.js"></script>


</body>

</html>