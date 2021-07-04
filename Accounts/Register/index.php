<?php
define("PATHNAME", TRUE);
define("REGISTER_TOKEN_ACCESS", TRUE);
define("SUBSCRIPTION_TOKEN_ACCESS", TRUE);
require_once("../../Models/Config/core.php");
$register_token = Token::createInstance("REGISTRATION_TOKEN");
$subscription_token = Token::createInstance("SUBSCRIPTON_TOKEN");
if (Input::grab("submit-registration")) {
  if ($register_token->validate(Input::grab("registration_passkey"))) {
    define("CLIENT_SERVER_AUTHENTICATION", TRUE);
    define("CLIENT_REGISTRATION_STATUS", TRUE);
    require_once("../server/engine.php");
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
  <link rel="stylesheet" href="../../tools/css/global/responsive.css">
  <title>Register</title>
</head>

<body>
  <?php include "../../Includes/header/secondary-navbar.php"; ?>

  <div class="container-fluid no-gutters">
    <div class="col-12">
      <img class="img-fluid position-fixed h-100 w-100 form-background" src="../../tools/assets/store-1338629_1920.jpg">
    </div>
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="shadow col-12 mt-5 p-3 bg-light form-body">
          <div class="row">
            <div class="col-5 mr-3">
              <img class="img-fluid page-icon" src="../../tools/assets/icon.png">
            </div>
            <form method="POST" action="<?php echo htmlspecialchars("") ?>" class="col-6" name="registration-form">
              <div class="d-flex justify-content-lg-center col-12">
                <img src="../../tools/assets/title.png" class="img-fluid title mt-lg-5">
              </div>
              <?php if (isset($error)) { ?>
                <div class="alert alert-danger show justify-content-lg-center">
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
              <div class="form-row mb-3 mt-3">
                <div class="col-md-5">
                  <label for="Email"> Email:</label>
                  <input type="email" name="email" value="<?php echo Sanitize::__email(Input::grab("email")); ?>">
                  <span name="emailErr" class="text-warning"></span>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <span class="text-center mt-lg-5">Or</span>
                </div>
                <div class="col-md-5">
                  <label for="phone number"> Phone Number:</label>
                  <input type="text" name="phone-number" value="<?php echo Sanitize::__int(Input::grab("phone-number")); ?>">
                  <span name="phoneNumberErr" class="text-warning"></span>
                </div>
              </div>
              <div class="form-group mb-3 mt-3">
                <label for="Password"> Password:</label>
                <input type="password" name="password" value="<?php echo Sanitize::__string(Input::grab("password")); ?>">
                <span name="passwordErr" class="text-warning"></span>
              </div>
              <div class="form-group mb-3 mt-3">
                <label for="password"> Re-enter password:</label>
                <input type="password" name="confirm-password" value="<?php echo Sanitize::__string(Input::grab("confirm-password")); ?>">
                <span name="confirm-passwordErr" class="text-warning"></span>
              </div>
              <input type="hidden" name="registration_passkey" value="<?php echo $register_token->getToken(); ?>">
              <div class="form-group mb-3 mt-3">
                <div class="d-flex justify justify-content-lg-left">
                  <input type="submit" name="submit-registration" class="btn btn-warning w-100 btn-lg" value="Register &raquo;">
                </div>
              </div>
              <div class="d-flex justify-content-center mt-3">
                <p> Already have an account <a class="btn btn-outline-warning" href="../login/">Log in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include "../../Includes/footer/account/footer.php"; ?>

  <script src="../../tools/js/global/jquery.js"></script>
  <script src="../../tools/js/global/bootstrap.min.js"></script>
  <script src="../../tools/js/global/uniform.js"></script>
  <script src="../../tools/js/validator/register.js"></script>
  <script src="../../tools/js/validator/recovery.js"></script>
  <script src="../../tools/js/validator/subscription.js"></script>
</body>

</html>