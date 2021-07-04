<?php
(defined("CLIENT_SERVER_AUTHENTICATION") && CLIENT_SERVER_AUTHENTICATION === TRUE) or exit(header("location:../../errors/"));


/**
 * Check the server request method
 */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit(header("location:../../errors/"));
}

// if (defined("CLIENT_UPDATE_STATUS") && CLIENT_UPDATE_STATUS === TRUE) {
//     $username = Sanitize::__string(Input::grab("username"));
//     $email = Sanitize::__string(Input::grab("email"));
//     $moblie_number = Sanitize::__string(Input::grab("phone-number"));
//     $password =  Sanitize::__string(Input::grab("password"));
//     $password_confirm =  Sanitize::__string(Input::grab("confirm-password"));
//     $validator->factory__validateUserUpdateAccount($_POST);
//     if (!$validator->factory__confirmStatus()) {
//         $bioMsgError = $validator->factory__outputErrorToGUI();
//     } else {
//         if ($validator->factory__updateUserBioProfile()) {
//             $bioInfoMessage = "Your bio info has been updated successfully. Your changes will be effected the next time you log in. Thank you for shoping with us ";
//         }
//     }
// }
// if (defined("CLIENT_UPDATE_STATUS") && CLIENT_UPDATE_STATUS === TRUE) {
//     $firstname = Sanitize::__string(Input::grab("firstname"));
//     $lastname = Sanitize::__string(Input::grab("lastname"));
//     $gender = Sanitize::__string(Input::grab("gender"));
//     $day = Sanitize::__string(Input::grab("day"));
//     $month = Sanitize::__string(Input::grab("month"));
//     $year = Sanitize::__string(Input::grab("year"));
//     $kin_name = Sanitize::__string(Input::grab("next_of kin"));
//     $kin_relation = Sanitize::__string(Input::grab("kin-relation"));
//     $kin_contact_mode = Sanitize::__string(Input::grab("contact-mode"));
//     $kin_phone_number = Sanitize::__string(Input::grab("next-of-kin-telephone"));
//     $kin_email = Sanitize::__string(Input::grab("next-of-kin-email"));
//     $validator->factory__validateUserUpdateAccount($_POST, "personal");
//     if (!$validator->factory__confirmStatus()) {
//         $personalMsgErr = $validator->factory__outputErrorToGUI();
//     } else {
//         if ($validator->factory__updateUserPersonalProfile()) {
//             $personalInfoMessage = "Your personal info has been updated successfully. Your changes will be effected the next time you log in. Thank you for shopping with us ";
//         }
//     }
// }

if (defined("CLIENT_UPDATE_PASSWORD_INFO_STATUS") && CLIENT_UPDATE_PASSWORD_INFO_STATUS === TRUE) {
    $old_password =  Sanitize::__string(Input::grab("old-password"));
    $password =  Sanitize::__string(Input::grab("password"));
    $confirm_password =  Sanitize::__string(Input::grab("confirm-password"));
    $authenticator = new Authenticator($_POST, "update");
    if (!$authenticator->assertStatus()) {
        $pasword_info_error_msg = $authenticator->getMsg();
    } else {
        if ($authenticator->authenticatePasswordUpdate()) {
            $password_info_success_msg = "Your password has been changed successfully";
        }
    }
}

if (defined("CLIENT_UPDATE_PERSONAL_INFO_STATUS") && CLIENT_UPDATE_PERSONAL_INFO_STATUS === TRUE) {
    $firstname = Sanitize::__string(Input::grab("firstname"));
    $lastname = Sanitize::__string(Input::grab("lastname"));
    $gender = Sanitize::__string(Input::grab("gender"));
    $day = Sanitize::__string(Input::grab("day"));
    $month = Sanitize::__string(Input::grab("month"));
    $year = Sanitize::__string(Input::grab("year"));
    $authenticator = new Authenticator($_POST, "update");
    if (!$authenticator->assertStatus()) {
        $personal_info_error_msg = $authenticator->getMsg();
    } else {
        if ($authenticator->authenticatePersonalInfoUpdate()) {
            $personal_info_success_msg = "Your information has been updated successfully";
        }
    }
}

if (defined("CLIENT_UPDATE_CONTACT_INFO_STATUS") && CLIENT_UPDATE_CONTACT_INFO_STATUS === TRUE) {
    $username = Sanitize::__string(Input::grab("username"));
    $email = Sanitize::__string(Input::grab("email"));
    $moblie_number = Sanitize::__string(Input::grab("phone-number"));
    $nickname = Sanitize::__string(Input::grab("nickname"));
    $authenticator = new Authenticator($_POST, "update");
    if (!$authenticator->assertStatus()) {
        $contact_info_error_msg = $authenticator->getMsg();
    } else {
        if ($authenticator->authenticateContactInfoUpdate()) {
            $contact_info_success_msg = "Your information has been updated successfully";
        }
    }
}

if (defined("CLIENT_LOGIN_STATUS") && CLIENT_LOGIN_STATUS === TRUE) {
    $authenticator = new Authenticator($_POST, "login");
    if (!$authenticator->assertStatus()) {
        $error = $authenticator->getMsg();
    } else {
        if ($authenticator->authenticateUserSignIn()) {
            if (file_exists("../profile/home/")) {
                header("location:../profile/home/");
            }
        }
    }
}
if (defined("CLIENT_REGISTRATION_STATUS") && CLIENT_REGISTRATION_STATUS === TRUE) {
    $authenticator = new Authenticator($_POST);
    if (!$authenticator->assertStatus()) {
        $error = $authenticator->getMsg();
    } else {
        if ($authenticator->createNewUserProfile()) {
            if (file_exists("../profile/home/")) {
                header("location:../profile/home/");
            }
        }
    }
}
