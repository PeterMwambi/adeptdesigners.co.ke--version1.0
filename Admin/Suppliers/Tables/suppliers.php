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
    <div class="container-fluid">
        <div class="console-body">
            <div class="d-flex justify-content-center mb-lg-4">
                <h1 class="text-warning">Table: supplier</h1>
            </div>
            <?php
            $conn = Database::getInstance();
            $conn->generateSelectQuery(array("*"), "suppliers");
            $results =  $conn->getOutput();
            $product_id = Sanitize::__int(Input::grab("pid"));
            $action = Sanitize::__string(Input::grab("action"));
            if ($product_id) {
                switch ($action) {
                    case 'delete':
                        if ($conn->generateDeleteQuery("products", array("product_id" => $product_id))) {
                            $msg = "Record Deleted Successfully";
                        }
                        break;

                    default:
                        # code...
                        break;
                }
            }
            ?>
            <?php if (isset($msg)) { ?>
                <div class="alert alert-success">
                    <p><?php echo $msg ?></p>
                </div>
            <?php } ?>
            <div class="upload-body d-flex justify-content-center">
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>supplier Id</th>
                            <th>supplier Name</th>
                            <th>supplier Company</th>
                            <th>supplier address</th>
                            <th>telephone number</th>
                            <th>supplier product</th>
                            <th>product description</th>
                            <th>product price</th>
                            <th>product category</th>
                            <th>package size</th>
                            <th>product quantity</th>
                            <th>View Record</th>
                            <th>Update Record</th>
                            <th>Delete Record</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result) { ?>
                            <tr>
                                <td><?php echo  $result->id; ?></td>
                                <td><?php echo  $result->supplier_id; ?></td>
                                <td><?php echo  $result->supplier_url; ?></td>
                                <td><?php echo  $result->supplier_name; ?></td>
                                <td class="text-info"><?php echo  $result->price; ?></td>
                                <td><?php echo  $result->supplier_description; ?></td>
                                <td><?php echo  $result->supplier_status; ?></td>
                                <td><?php echo  $result->supplier_cartegory; ?></td>
                                <td><a href="<?php echo "supplier.php?pid=" . $result->product_id . "&action=view"; ?>" class="btn btn-outline-primary">View</a></td>
                                <td><a href="<?php echo "supplier.php?pid=" . $result->product_id . "&action=update"; ?>" class="btn btn-outline-info">Update</a></td>
                                <td><a href="<?php echo "supplier.php?pid=" . $result->product_id . "&action=delete"; ?>" class="btn btn-outline-danger">Delete</a></td>
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