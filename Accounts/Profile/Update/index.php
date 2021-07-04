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
$user_profile = Database::getInstance()->generateSelectQuery(
    array("*"),
    "users_bio_info",
    0,
    array("username", "=", Session::getValue("username")),
    array("LEFT JOIN" => "users_personal_info", "ON" => "users_bio_info.user_id = users_personal_info.user_id")
);
$fields = $user_profile->getOutput();
if (!count($fields)) {
    exit(header("location:../../login/"));
}
foreach ($fields as $field) {
    $contact_info_token = Token::createInstance("CONTACT_INFO_TOKEN");
    $personal_info_token = Token::createInstance("PERSONAL_INFO_TOKEN");
    $change_password_token = Token::createInstance("CHANGE_PASSWORD_TOKEN");
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

            <div class="d-flex justify-content-center bio-overview">
                <div class="col-md-12 mr-lg-4 mt-lg-5">
                    <div class="card bg-gradient">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="profile-image-container">
                                    <div class="d-flex justify-content-center">
                                        <h3 class="heading text-center">Howdy <?php echo Sanitize::__string($field->firstname); ?></h3>
                                    </div>
                                    <div>
                                        <img src="../../../Tools/Assets/man.png" class="img-fluid profile-image">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="profile-image-btn ml-lg-n1" for="profile-image">Update profile picture</label>
                                                <input type="file" name="profile-image" id="profile-image">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="overview-info">
                                    <p> You are currently logged in as:<span class="overview-item"> <?php echo $field->username; ?></span><br />
                                        Your fullnames are: <span class="overview-item"><?php echo $field->firstname . " " . $field->lastname; ?></span><br />
                                        Your Adept Id is:<span class="overview-item"> <?php echo $field->user_id; ?> </span><br />
                                        Your account was created on:<span class="overview-item"> <?php echo $field->day_joined . ", " . $field->day_joined_int . " " . $field->month_joined . " " . $field->year_joined;   ?></span><br />
                                        At: <span class="overview-item"><?php echo $field->time_joined; ?></span><br />
                                        Last Login date:<span class="overview-item"> <?php echo $field->login_day . ", " . $field->login_date; ?></span><br />
                                        At: <span class="overview-item"><?php echo $field->login_time; ?></span><br />
                                        Current orders: 0 <br />
                                    </p>
                                </div>
                                <div class="logo-in-profile">
                                    <img src="../../../tools/assets/title.png" class="img-fluid small-title" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="profile-row mt-lg-5 animate__animated animate__pulse">
                    <div class="col-md-6 mr-lg-4">
                        <div class="card ml-lg-4 shadow bg-gradient min-width-md">
                            <div class="card-header">
                                <h3 class="heading p-lg-2"><img src="../../../tools/assets/phone.png" class="img-fluid medium-profile-icon mb-lg-2"> Contact Information</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                if (Input::grab("update-contact-info")) {
                                    if ($contact_info_token->validate(Sanitize::__string(Input::grab("contact-info-key")))) {
                                        define("CLIENT_SERVER_AUTHENTICATION", TRUE);
                                        define("CLIENT_UPDATE_CONTACT_INFO_STATUS", TRUE);
                                        require_once("../../server/engine.php");
                                    }
                                }
                                if (Input::grab("update-personal-info")) {
                                    if ($personal_info_token->validate(Sanitize::__string(Input::grab("personal-info-key")))) {
                                        define("CLIENT_SERVER_AUTHENTICATION", TRUE);
                                        define("CLIENT_UPDATE_PERSONAL_INFO_STATUS", TRUE);
                                        require_once("../../server/engine.php");
                                    }
                                }
                                if (Input::grab("reset-password")) {
                                    if ($change_password_token->validate(Sanitize::__string(Input::grab("password-info-key")))) {
                                        define("CLIENT_SERVER_AUTHENTICATION", TRUE);
                                        define("CLIENT_UPDATE_PASSWORD_INFO_STATUS", TRUE);
                                        require_once("../../server/engine.php");
                                    }
                                }
                                ?>
                                <form method="POST" name="update-bio-info" class="p-lg-3" action="<?php echo htmlspecialchars(""); ?>">
                                    <?php if (isset($contact_info_error_msg)) { ?>
                                        <div class="alert alert-danger show">
                                            <div class="alert-heading">
                                                <h3 class="text-center">&#10060; Oops !</h3>
                                            </div>
                                            <p class="text-center"><?php echo $contact_info_error_msg; ?></p>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($contact_info_success_msg)) { ?>
                                        <div class="alert alert-success show">
                                            <div class="alert-heading">
                                                <h3 class="text-center">&#129351; Congratulations</h3>
                                            </div>
                                            <p class="text-center"><?php echo $contact_info_success_msg; ?></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="username"><i class="fa fa-user-circle"></i> Username: </label>
                                        <input type="text" name="username" value="<?php echo isset($username) ? $username : $field->username; ?>">
                                        <span name="usernameMsg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile-number"><img src="../../../tools/assets/phone1.png" class="img-fluid small-profile-icon mb-lg-2"> Mobile Number:</label>
                                        <input type="text" name="phone-number" value="<?php echo isset($moblie_number) ? $moblie_number : $field->phone_number; ?>">
                                        <span name="phoneNumberMsg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><img src="../../../tools/assets/mail.png" class="img-fluid small-profile-icon mb-lg-2"> Email:</label>
                                        <input type="text" name="email" value="<?php echo isset($email) ? $email : $field->email; ?>">
                                        <span name="emailMsg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname"> Nickname: </label>
                                        <input type="text" name="nickname" value="<?php echo isset($nickname) ? $nickname : $field->nickname; ?>">
                                        <span name="nicknameMsg"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="contact-info-key" value="<?php echo $contact_info_token->getToken(); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="update-contact-info" class="w-100 " value="Update Contact Info">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mr-lg-5 shadow bg-gradient">
                            <div class="card-header">
                                <h3 class="heading p-lg-2"><img src="../../../tools/assets/man1.png" class="img-fluid medium-profile-icon mb-lg-2"> Personal Information</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" name="update-bio-info" action="<?php echo htmlspecialchars(""); ?>">
                                    <?php if (isset($personal_info_error_msg)) { ?>
                                        <div class="alert alert-danger show">
                                            <div class="alert-heading">
                                                <h3 class="text-center">&#10060; Oops !</h3>
                                            </div>
                                            <p class="text-center"><?php echo $personal_info_error_msg; ?></p>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($personal_info_success_msg)) { ?>
                                        <div class="alert alert-success show">
                                            <div class="alert-heading">
                                                <h3 class="text-center">&#129351; Congratulations</h3>
                                            </div>
                                            <p class="text-center"><?php echo $personal_info_success_msg; ?></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="fullname"> <img src="../../../tools/assets/person.png" class="img-fluid small-profile-icon"> Name: </label>
                                        <div class="form-row mt-lg-2">
                                            <div class="col-md-6">
                                                <label for="firstname"> Firstname: </label>
                                                <input type="text" name="firstname" value="<?php echo isset($firstname) ? $firstname : $field->firstname; ?>">
                                                <span name="firstnameMsg" class="message"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lastname"> Lastname: </label>
                                                <input type="text" name="lastname" value="<?php echo isset($lastname) ? $lastname : $field->lastname; ?>">
                                                <span name="lastnameMsg" class="message"></span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group mb-lg-5 mt-lg-4">
                                        <div class="alert alert-danger d-none">
                                            <p class="alert-message text-center"></p>
                                        </div>
                                        <label for="DOB"><img src="../../../tools/assets/calendar.png" class="img-fluid small-profile-icon"> Date of Birth: </label>
                                        <div class="form-row mt-lg-3">
                                            <div class="col-lg-4">
                                                <label for="Year">Year</label>
                                                <select name="year" class="md-width-select">
                                                    <?php
                                                    $start_month = 1920;
                                                    $end_month = date("Y");
                                                    while ($start_month <= $end_month) {
                                                        echo "<option value='" . $start_month . "'" . ((isset($year) && $year == $start_month) ? "selected='selected'" : null) . ((isset($field->birth_year) && $field->birth_year == $start_month) ? "selected='selected'" : null) . ">" . $start_month . "</option>";
                                                        $start_month++;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="Month">Month</label>
                                                <select name="month" class="md-width-select">
                                                    <?php
                                                    $start_month = strtotime("1");
                                                    $end_month = strtotime("+11 months", $start_month);

                                                    while ($start_month <= $end_month) {
                                                        $start_month = strtotime("+1 month", $start_month);
                                                        echo "<option value='" . date("M", $start_month) . "'" . ((isset($month) && $month == date("M", $start_month)) ? "selected='selected'" : null) . ((isset($field->birth_month) && $field->birth_month == date("M", $start_month)) ? "selected='selected'" : null) . ">" . date("M", $start_month) . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="Day">Day</label>
                                                <select name="day" class="md-width-select">
                                                    <?php
                                                    $start_date = strtotime("01");
                                                    $end_date = strtotime("+31 days", $start_date);

                                                    while ($start_date < $end_date) {
                                                        $start_date = strtotime("+1 day", $start_date);
                                                        echo "<option value='" . date("d", $start_date) . "'" . ((isset($day) && $day == date("d", $start_date)) ? "selected='selected'" : null) . ((isset($field->birth_day) && $field->birth_day == date("d", $start_date)) ? "selected='selected'" : null) . ">" . date("d", $start_date) . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-lg-4 mt-lg-2">
                                        <label for="gender"><img src="../../../tools/assets/gender.png" class="img-fluid small-profile-icon mb-lg-2"> Gender: </label>
                                        <div class="form-row ml-lg-2 p-0">
                                            <div class="col-lg-4">
                                                <input type="radio" name="gender" value="male" class="input-blur w-auto form-control" <?php echo (isset($gender) && $gender === "male") ? "checked" : false;
                                                                                                                                        echo (isset($field->gender) && $field->gender === "male") ? "checked" : false; ?>> Male
                                                <span class="checkmark"></span>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="radio" name="gender" value="female" class="input-blur w-auto form-control" <?php echo (isset($gender) && $gender === "female") ? "checked" : false;
                                                                                                                                        echo (isset($field->gender) && $field->gender === "female") ? "checked" : false; ?>>Female
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="radio" name="gender" value="rather-not-say" class="input-blur form-control w-auto" <?php echo (isset($gender) && $gender === "rather-not-say") ? "checked" : false;
                                                                                                                                                echo (isset($field->gender) && $field->gender === "rather-not-say") ? "checked" : false; ?>> Rather not say
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="personal-info-key" value="<?php echo $personal_info_token->getToken(); ?>">
                                    </div>
                                    <div class="form-group mt-lg-4">
                                        <input type="submit" name="update-personal-info" class=" w-100 " value="Update Personal Info">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-row mt-lg-5">
                    <div class="col-md-6">
                        <div class="card ml-lg-4 shadow bg-gradient">
                            <div class="card-header">
                                <h3 class="heading p-lg-2"><img src="../../../tools/assets/password.png" class="img-fluid medium-profile-icon mb-lg-2"> Reset Password</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" name="update-bio-info" action="<?php echo htmlspecialchars(""); ?>">
                                    <?php if (isset($pasword_info_error_msg)) { ?>
                                        <div class="alert alert-danger show">
                                            <div class="alert-heading">
                                                <h3 class="text-center">&#10060; Oops !</h3>
                                            </div>
                                            <p class="text-center"><?php echo $pasword_info_error_msg; ?></p>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($password_info_success_msg)) { ?>
                                        <div class="alert alert-success show">
                                            <div class="alert-heading">
                                                <h3 class="text-center">&#129351; Congratulations</h3>
                                            </div>
                                            <p class="text-center"><?php echo $password_info_success_msg; ?></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="old-password"><i class="fa fa-key"></i> Old Password: </label>
                                            <input type="password" name="old-password" class="input-blur password" value="<?php echo isset($old_password) ? $old_password : Session::getValue("password"); ?>">
                                            <span name="old-passwordMsg"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="new-password"><i class="fa fa-lock"></i> New Password: </label>
                                            <input type="password" name="password" class="input-blur password" value="<?php echo isset($password) ? $password : ""; ?>">
                                            <span name="new-passwordMsg"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="password"><i class="fa fa-lock-open"></i> Confirm Password: </label>
                                            <div class="form-row flex-wrap">
                                                <div class="col-md-10">
                                                    <input type="password" name="confirm-password" class="input-blur password" value="<?php echo isset($confirm_password) ? $confirm_password : ''; ?>">
                                                    <span name="confirm-passwordMsg"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group ml-md-2">
                                                        <a class="btn btn-outline-secondary enable-user-visibility" href="javascript:"><i class="fa fa-eye visibility-toggler"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="password-info-key" value="<?php echo $change_password_token->getToken(); ?>">
                                    </div>
                                    <div class="form-group mt-lg-4">
                                        <input type="submit" name="reset-password" class=" w-100 " value="Reset password">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include "../../../Includes/footer/account/footer.php" ?>

        <script src="../../../tools/js/global/jquery.js"></script>
        <script src="../../../tools/js/page/profile.js"></script>
        <script src="../../../tools/js/validator/update.js"></script>
        <script src="../../../tools/js/global/bootstrap.min.js"></script>
        <script src="../../../tools/js/global/uniform.js"></script>
    </body>

    </html>
<?php } ?>