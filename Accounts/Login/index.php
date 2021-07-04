<?php
define("PATHNAME", TRUE);
require("../../Models/Config/core.php");
$login_token = Token::createInstance("LOGIN_TOKEN");
$recovery_token = Token::createInstance("RECOVERY_TOKEN");
$subscription_token = Token::createInstance("SUBSCRIPTION_TOKEN");
if (Input::getData()) {
    if ($login_token->validate(Input::grab("login_passkey"))) {
        if (file_exists("../server/engine.php")) {
            define("CLIENT_SERVER_AUTHENTICATION", TRUE);
            define("CLIENT_LOGIN_STATUS", TRUE);
            require_once("../server/engine.php");
        }
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
    <link rel="stylesheet" href="../../tools/css/page/account.css">
    <link rel="stylesheet" href="../../tools/css/responsive.css">
    <title>Login</title>

</head>

<body>
    <?php include "../../Includes/header/secondary-navbar.php"; ?>

    <!-- Sign Up form body -->
    <div class="container-fluid no-gutters">
        <div class="col-12">
            <img class="img-fluid position-fixed h-100 w-100 form-background" src="../../tools/assets/store-1338629_1920.jpg">
        </div>
        <div class="container mt-3">
            <div class="d-flex justify-content-center">
                <div class="shadow col-12 mt-5 p-3 mb-5 bg-light form-body">
                    <div class="row">
                        <div class="col-5">
                            <img class="img-fluid page-icon" src="../../tools/assets/icon.png">
                        </div>
                        <form method="POST" action="<?php echo htmlspecialchars(""); ?>" class="col-6 p-5 h-50 mt-5" name="login-form" autocomplete="OFF">
                            <div class="d-flex justify-content-lg-center mb-3 col-12">
                                <img src="../../tools/assets/title.png" class="img-fluid title">
                            </div>
                            <?php if (isset($error)) { ?>
                                <div class="alert alert-danger show">
                                    <div class="alert-heading">
                                        <h3 class="text-center">Oops!!!</h3>
                                    </div>
                                    <p class="text-center"><?php echo $error; ?></p>
                                </div>
                            <?php } ?>
                            <div class="form-group mb-3 mt-3">
                                <label for="Username"> Username:</label>
                                <input type="text" name="username" value="<?php echo Sanitize::__string(Input::grab("username")); ?>">
                                <span name="usernameErr" class="text-warning"></span>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="Password"> Password:</label>
                                <input type="password" name="password" value="<?php echo Sanitize::__string(Input::grab("password")); ?>">
                                <span name="passwordErr" class="text-warning"></span>
                            </div>
                            <input type="hidden" name="login_passkey" value="<?php echo $login_token->getToken(); ?>">

                            <div class="form-group mb-3 mt-5">
                                <div class="d-flex justify justify-content-lg-left">
                                    <input type="submit" name="submit" class="btn btn-warning w-100 btn-lg" value="Go to my profile &raquo">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <a class="btn btn-outline-dark" data-toggle="modal" href="javascript:void(0)" data-target="#recover-password">Forgot password !</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-warning ml-lg-2" href="../register/" title="Click to create an account for free">Create a free account &raquo;</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal large device remember password -->
    <div class="modal fade" id="recover-password" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recover Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" name="recovery-form">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow text-warning spinner-get-pwd-link" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning spinner-get-pwd-link" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning spinner-get-pwd-link" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning spinner-get-pwd-link" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning spinner-get-pwd-link" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="alert alert-success d-none recoverpwd-alert">
                            <div class="alert-heading">
                                <h3 class="text-center saluitation">Oops!!!</h3>
                            </div>
                            <p class="text-center p-0 m-0" name="account-recovery-message"></p>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter your Email address</label>
                            <input type="email" class="mt-1 mb-2" name="recovery-email">
                            <span name="recovery-emailErr" class="text-warning mb-2"></span>
                        </div>
                        <input type="hidden" name="recovery" value="<?php echo $recovery_token->getToken(); ?>">
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning btn-lg shadow" value="Recover account" name="get-recovery-link">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "../../Includes/footer/account/footer.php"; ?>

    <script src="../../tools/js/global/jquery.js"></script>
    <script src="../../tools/js/global/bootstrap.min.js"></script>
    <script src="../../tools/js/global/uniform.js"></script>
    <script src="../../tools/js/validator/login.js"></script>
    <script src="../../tools/js/validator/recovery.js"></script>
    <script src="../../tools/js/validator/subscription.js"></script>
</body>

</html>