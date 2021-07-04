<?php
define("PATHNAME", TRUE);
require("../../../Models/Config/core.php");
if (!Session::exists("AUTHENTICATION_KEY") && !Session::exists("USER_PASSKEY")) {
    exit(header("location:../../login/"));
}
$authenticationKey = Functions::decrypt(Session::getValue("AUTHENTICATION_KEY"));
$user_string = Session::getValue("USER_PASSKEY");
if (false === $authenticationKey) {
    exit(header("location:../../login/"));
}
if (!Token::compare($authenticationKey, $user_string)) {
    exit(header("location:../../login/"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <noscript>
        <meta http-equiv="refresh" content="url=../../../errors/">
    </noscript>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../tools/assets/icons/apple-touch-icon-iphone-60x60.png">
    <link rel="icon" sizes="60x60" href="../../../tools/assets/icons/apple-touch-icon-ipad-76x76.png">
    <link rel="icon" sizes="114x114" href="../../../tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png">
    <link rel="icon" sizes="144x144" href="../../../tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png">
    <link rel="stylesheet" href="../../../tools/css/global/bootstrap.min.css">
    <link rel="stylesheet" href="../../../tools/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../../../tools/css/global/uniform.css">
    <link rel="stylesheet" href="../../../tools/css/global/animate.css">
    <link rel="stylesheet" href="../../../tools/css/page/themes/profile.css">
    <link rel="stylesheet" href="../../../tools/css/global/responsive.css">
    <title><?php echo "Update profile " . Session::getValue("username"); ?></title>

</head>

<body class="background-gradient">
    <div class="container-fluid p-0 h-100">
        <?php include "../../../Includes/header/profile.php" ?>

        <?php include "../../../Includes/footer/homepage/footer.php" ?>
    </div>
    <script src="../../../tools/js/global/jquery.js"></script>
    <script src="../../../tools/js/page/profile.js"></script>
    <script src="../../../tools/js/validator/update.js"></script>
    <script src="../../../tools/js/global/bootstrap.min.js"></script>
    <script src="../../../tools/js/global/uniform.js"></script>
</body>

</html>