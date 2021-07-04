/**
 * @author Peter Mwambi
 * @time Mon Sep 21 2020 08:53:23 GMT+0300 (East Africa Time)
 * @content Registration form validatior
 */

$(document).ready(function () {
  ///////////////////////////////////
  //Regular Expressions
  ///////////////////////////////////
  var usernameRegExp = /^[a-zA-Z0-9@#]{5,30}$/;
  var emailRegExp = /^[a-z]+\@+[a-z]+\.+[a-z.]{2,5}$/;
  var numRegEx = /^[0-9]{10}$/;
  var passwordRegExp = /^[0-9A-Za-z$@#%!*?_,]{6,100}$/;

  ///////////////////////////////////
  //Username validation
  ///////////////////////////////////
  $("input[name='username']").focus(function () {
    if ($(this).val() == "") {
      $("span[name='usernameErr']").html("Choose a username");
    }
  });
  $("input[name='username']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='usernameErr']").html(
        "A username is required to create your account !"
      );
    } else {
      $("span[name='usernameErr']").html(null);
      if (usernameRegExp.test($(this).val())) {
        $("span[name='usernameErr']").html(null);
      } else {
        $("span[name='usernameErr']").html(
          "Your username contains invalid characters. Only letters numbers @ # are allowed !"
        );
      }
    }
  });

  ///////////////////////////////////
  //Email validation
  ///////////////////////////////////
  $("input[name='email']").focus(function () {
    if ($(this).val() == "") {
      $("span[name='emailErr']").html("Enter your email address");
    }
  });
  $("input[name='email']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='emailErr']").html("Your email address is required !");
    } else {
      if (emailRegExp.test($(this).val())) {
        $("span[name='emailErr']").html(null);
      } else {
        $("span[name='emailErr']").html("Please enter a valid email address");
      }
    }
  });
  ///////////////////////////////////
  //Phone Number validation
  //////////////////////////////////
  $("input[name='phone-number']").focus(function () {
    $(this).attr("value", "07");
    if ($(this).val() == "07") {
      $("span[name='phoneNumberErr']").html("Enter your phone number");
    }
  });

  $("input[name='phone-number']").blur(function () {
    if ($(this).val().charAt(0) !== "0" && $(this).val().charAt(1) !== "7") {
      $("span[name='phoneNumberErr']").html(
        "Please enter a valid phone number"
      );
    } else {
      if (numRegEx.test($("input[name='phone-number']").val())) {
        $("span[name='phoneNumberErr']").html(null);
      } else {
        $("span[name='phoneNumberErr']").html(
          "Please enter a valid phone number"
        );
      }
    }
  });
  ///////////////////////////////////
  //Password validation
  ///////////////////////////////////
  $("input[name='password']").focus(function () {
    if ($(this).val() == "") {
      $("span[name='passwordErr']").html("Choose a password");
    }
  });
  $("input[name='password']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='passwordErr']").html(
        "A password is required to secure your account !"
      );
    } else {
      $("span[name='passwordErr']").html(null);
      if (passwordRegExp.test($(this).val())) {
        $("span[name='passwordErr']").html(null);
      } else {
        $("span[name='passwordErr']").html(
          "Your password contains invalid character please use letters numbers and $ @ # % ! * ? _ , characters"
        );
      }
    }
  });

  ///////////////////////////////////
  //Password-confirm validation
  ///////////////////////////////////
  $("input[name='confirm-password']").focus(function () {
    if ($(this).val() == "") {
      $("span[name='confirm-passwordErr']").html(
        "Please confirm your password"
      );
    }
  });
  $("input[name='confirm-password']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='confirm-passwordErr']").html(
        "You have not yet confirmed your password !"
      );
    } else {
      if ($(this).val() !== $("input[name='password']").val()) {
        $("span[name='confirm-passwordErr']").html(
          "Your passwords are not matching"
        );
      }
    }
  });

  /**
   * Validator on submit
   */
  $("form[name='registration-form']").submit(function () {
    ///////////////////////////////////
    //fullname validation
    ///////////////////////////////////
    if ($("input[name='fullname']").val() == "") {
      $("span[name='fullnameErr']").html("Your full names are required !");
      return false;
    }
    if ($("input[name='fullname']").val().length < 5) {
      $("span[name='fullnameErr']").html(
        "Your full names cannot be shorter than 5 characters !"
      );
      return false;
    }
    if (fullnameRegExp.test($("input[name='fullname']").val())) {
      $("span[name='fullnameErr']").html(null);
    } else {
      $("span[name='fullnameErr']").html(
        "Your full name contains invalid characters. Only letters and whitespaces are allowed !"
      );
      return false;
    }
    ///////////////////////////////////
    //Username validation
    ///////////////////////////////////
    if ($("input[name='username']").val() == "") {
      $("span[name='usernameErr']").html("Your haven't chosen a username !");
      return false;
    }
    if ($("input[name='username']").val().length < 5) {
      $("span[name='usernameErr']").html(
        "Username cannot be shorter than 5 characters"
      );
      return false;
    }
    if ($("input[name='username']").val().length > 20) {
      $("span[name='usernameErr']").html(
        "Username cannot be longer than 20 characters"
      );
      return false;
    }
    if (usernameRegExp.test($("input[name='username']").val())) {
      $("span[name='usernameErr']").html(null);
    } else {
      $("span[name='usernameErr']").html(
        "Your username contains invalid characters. Only letters and whitespaces are allowed !"
      );
      return false;
    }
    ///////////////////////////////////
    //Email validation
    ///////////////////////////////////
    if ($("input[name='email']").val() == "") {
      $("span[name='emailErr']").html("Your email address is required !");
      return false;
    }
    if (emailRegExp.test($("input[name='email']").val())) {
      $("span[name='emailErr']").html(null);
    } else {
      $("span[name='emailErr']").html("Please enter a valid email address");
      return false;
    }
    ///////////////////////////////////
    //Phone number validation
    ///////////////////////////////////
    if ($("input[name='phone-number']").val() != "") {
      if (
        $("input[name='phone-number']").val().charAt(0) != "0" &&
        $("input[name='phone-number']").val().charAt(1) != "7"
      ) {
        $("span[name='phoneNumberErr']").html(
          $("input[name='phone-number']").val() +
            " is invalid. Please enter a valid phone number"
        );
        return false;
      } else {
        if (numRegEx.test($("input[name='phone-number']").val())) {
          $("span[name='phoneNumberErr']").html(null);
        } else {
          $("span[name='phoneNumberErr']").html(
            $("input[name='phone-number']").val() +
              " is not a valid mobile phone number"
          );
          return false;
        }
      }
    }
    ///////////////////////////////////
    //Password validation
    ///////////////////////////////////
    if ($("input[name='password']").val() == "") {
      $("span[name='passwordErr']").html("You have not yet chosen a password");
      return false;
    }
    if ($("input[name='password']").val() < 6) {
      $("span[name='passwordErr']").html(
        "Please select a longer password with a minimum of 6 characters"
      );
      return false;
    }
    if (passwordRegExp.test($("input[name='password']").val())) {
      $("span[name='passwordErr']").html(null);
    } else {
      $("span[name='passwordErr']").html(
        "Your password contains invalid character please use letters numbers whitespaces and $ @ # % ! * ? _ , characters"
      );
      return false;
    }

    ///////////////////////////////////
    //Password-confirm validation
    ///////////////////////////////////
    if ($("input[name='confirm-password']").val() == "") {
      $("span[name='confirm-passwordErr']").html(
        "Please confirm your password"
      );
      return false;
    }
    if (
      $("input[name='confirm-password']").val() !==
      $("input[name='password']").val()
    ) {
      $("span[name='confirm-passwordErr']").html(
        "Your passwords are not matching"
      );
      return false;
    }
  });
});
