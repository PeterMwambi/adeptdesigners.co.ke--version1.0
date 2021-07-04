$(document).ready(function () {
  ///////////////////////////////////
  //Regular Expressions
  ///////////////////////////////////
  var nameRegExp = /^[a-zA-Z]{2,20}$/;
  var usernameRegExp = /^[a-zA-Z0-9@]{5,30}$/;
  var emailRegExp = /^[a-z]+\@+[a-z]+\.+[a-z.]{2,5}$/;
  var numRegExp = /^[0-9]{9,10}$/;
  var passwordRegExp = /^[0-9A-Za-z$@#%!*?_,]{6,100}$/;

  ///////////////////////////////////
  //firstname validation
  ///////////////////////////////////
  $("input[name='firstname']").keyup(function () {
    $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
  });
  $("input[name='firstname']").focus(function () {
    $("span[name='firstnameMsg']").html(null);
  });
  $("input[name='firstname']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='firstnameMsg']")
        .addClass("text-danger")
        .html("&#x274C; Required");
    } else {
      $("span[name='firstnameMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
      if (nameRegExp.test($(this).val())) {
        $("span[name='firstnameMsg']")
          .addClass("text-success")
          .html("&#10004 field verified");
      } else {
        $("span[name='firstnameMsg']")
          .addClass("text-danger")
          .html("&#x274C; Firstname contains invalid characters.");
      }
    }
  });

  ////////////////////////////////////
  //Lastname validation
  ////////////////////////////////////
  $("input[name='lastname']").keyup(function () {
    $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
  });
  $("input[name='lastname']").focus(function () {
    $("span[name='lastnameMsg']").html(null);
  });
  $("input[name='lastname']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='lastnameMsg']")
        .removeClass("text-success")
        .addClass("text-danger")
        .html("&#x274C; Required");
    } else {
      $("span[name='lastnameMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
      if (nameRegExp.test($(this).val())) {
        $("span[name='lastnameMsg']")
          .addClass("text-success")
          .html("&#10004 field verified");
      } else {
        $("span[name='lastnameMsg']")
          .addClass("text-danger")
          .html("&#x274C; Lastname contains invalid characters.");
      }
    }
  });
  ///////////////////////////////////
  //Username validation
  ///////////////////////////////////

  $("input[name='username']").focus(function () {
    $("span[name='usernameMsg']").html(null);
  });
  $("input[name='username']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='usernameMsg']")
        .addClass("text-danger")
        .html("&#x274C; Required");
    } else {
      $("span[name='usernameMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
      if (nameRegExp.test($(this).val())) {
        $("span[name='usernameMsg']")
          .addClass("text-success")
          .html("&#10004 field verified");
      } else {
        $("span[name='usernameMsg']")
          .addClass("text-danger")
          .html(
            "&#x274C; Username contains invalid characters. Spaces and special characters are not allowed"
          );
      }
    }
  });
  ///////////////////////////////////
  //Email validation
  ///////////////////////////////////
  $("input[name='email']").focus(function () {
    $("span[name='emailMsg']").html(null);
  });
  $("input[name='email']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='emailMsg']")
        .addClass("text-danger")
        .html("&#x274C; Required");
    } else {
      $("span[name='emailMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
      if (emailRegExp.test($(this).val())) {
        $("span[name='emailMsg']")
          .addClass("text-success")
          .html("&#10004 field verified");
      } else {
        $("span[name='emailMsg']")
          .addClass("text-danger")
          .html("&#x274C; Invalid Email address");
      }
    }
  });
  ///////////////////////////////////
  //Phone Number validation
  //////////////////////////////////
  $("input[name='phone-number']").focus(function () {
    if ($(this).val() === "") {
      $(this).attr("value", "07");
      $("span[name='phoneNumberMsg']").html(null);
    }
  });
  $("input[name='phone-number']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='phoneNumberMsg']")
        .addClass("text-danger")
        .html("&#x274C; Required");
    } else {
      $("span[name='phoneNumberMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
      if (numRegExp.test($(this).val())) {
        $("span[name='phoneNumberMsg']")
          .addClass("text-success")
          .html("&#10004 field verified");
      } else {
        $("span[name='phoneNumberMsg']")
          .addClass("text-danger")
          .html(
            "&#x274C; " +
              $(this).val() +
              " is not a valid number, please enter a valid mobile phone number"
          );
      }
    }
  });
  ///////////////////////////////////
  //Password validation
  ///////////////////////////////////
  $("input[name='old-password']").attr("disabled", "disabled");
  $("input[name='new-password']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='new-passwordMsg']")
        .addClass("text-danger")
        .html("&#x274C; Required");
    } else {
      $("span[name='new-passwordMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
      if (passwordRegExp.test($(this).val())) {
        $("span[name='new-passwordMsg']")
          .addClass("text-success")
          .html("&#10004 field verified");
      } else {
        $("span[name='new-passwordMsg']")
          .addClass("text-danger")
          .html("&#x274C; Invalid password");
      }
    }
  });
  ///////////////////////////////////
  //Confirm password validation
  ///////////////////////////////////
  $("input[name='confirm-password']").keyup(function () {
    if ($(this).val() != $("input[name='new-password']").val()) {
      $("span[name='confirm-passwordMsg']")
        .addClass("text-danger")
        .html("&#x274C; Your passwords are not matching");
    } else {
      $("span[name='confirm-passwordMsg']")
        .removeClass("text-danger")
        .addClass("text-success")
        .html("&#10004 field verified");
    }
  });
  $("input[name='confirm-password']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='confirm-passwordMsg']")
        .addClass("text-danger")
        .html("&#x274C; Required");
    }
    if ($(this).val() != $("input[name='new-password']").val()) {
      $("span[name='confirm-passwordMsg']")
        .addClass("text-danger")
        .html("&#x274C; Your passwords are not matching");
    }
  });

  /**
   * Validator on submit
   */
  $("form[name='update-bio-info']").submit(function () {
    ///////////////////////////////////
    //Username validation
    ///////////////////////////////////
    if ($("input[name='username']").val() == "") {
      $("span[name='usernameMsg']").html("Your haven't chosen a username !");
      return false;
    }
    if ($("input[name='username']").val().length < 5) {
      $("span[name='usernameMsg']").html(
        "Username cannot be shorter than 5 characters"
      );
      return false;
    }
    if ($("input[name='username']").val().length > 20) {
      $("span[name='usernameMsg']").html(
        "Username cannot be longer than 20 characters"
      );
      return false;
    }
    if (usernameRegExp.test($("input[name='username']").val())) {
      $("span[name='usernameMsg']").html(null);
    } else {
      $("span[name='usernameMsg']").html(
        "Your username contains invalid characters. Only letters and whitespaces are allowed !"
      );
      return false;
    }
    ///////////////////////////////////
    //Email validation
    ///////////////////////////////////
    if ($("input[name='email']").val() == "") {
      $("span[name='emailMsg']").html("Your email address is required !");
      return false;
    }
    if (emailRegExp.test($("input[name='email']").val())) {
      $("span[name='emailMsg']").html(null);
    } else {
      $("span[name='emailMsg']").html("Please enter a valid email address");
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
        $("span[name='phoneNumberMsg']").html(
          "&#x274C; " +
            $("input[name='phone-number']").val() +
            " is invalid. Please enter a valid phone number"
        );
        return false;
      } else {
        if (numRegEx.test($("input[name='phone-number']").val())) {
          $("span[name='phoneNumberMsg']").html(null);
        } else {
          $("span[name='phoneNumberMsg']").html(
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
    if ($("input[name='new-password']").val() == "") {
      $("span[name='passwordMsg']").html("You have not yet chosen a password");
      return false;
    }
    if ($("input[name='new-password']").val() < 6) {
      $("span[name='passwordMsg']").html(
        "Please select a longer password with a minimum of 6 characters"
      );
      return false;
    }
    if (passwordRegExp.test($("input[name='new-password']").val())) {
      $("span[name='passwordMsg']").html(null);
    } else {
      $("span[name='passwordMsg']").html(
        "Your password contains invalid character please use letters numbers whitespaces and $ @ # % ! * ? _ , characters"
      );
      return false;
    }

    ////////////////////////////////////
    //Confirm password Validation
    ///////////////////////////////////
    if ($("input[name='confirm-password']").val() == "") {
      $("span[name='confirm-passwordMsg']").html(
        "Please confirm your password"
      );
      return false;
    } else {
      console.log("false");
    }
    if (
      $("input[name='confirm-password']").val() !=
      $("input[name='new-password']").val()
    ) {
      $("span[name='confirm-passwordMsg']").html(
        "Your passwords are not matching !!!"
      );
      return false;
    }
  });
  $("select[name='day']").blur(function () {
    var day = $("select[name='day'] option:selected").val();
    var month = $("select[name='month'] option:selected").val();
    var year = $("select[name='year'] option:selected").val();
    var token = $("input[name='update-personal-info-cipher']").val();
    console.log(day);
    $.ajax({
      type: "POST",
      url: "../../server/dateController.php",
      data: {
        day: day,
        month: month,
        year: year,
      },
      success: function (data) {
        var response = JSON.parse(data);
        if (response.flag == "0") {
          $(".alert").removeClass("d-none");
          $(".alert-message").html(response.message);
        } else {
          if (response.flag == "1") {
            $(".alert").addClass("d-none");
          }
        }
      },
    });
  });
  $(".enable-user-visibility").click(function () {
    if ($(".visibility-toggler").hasClass("fa fa-eye")) {
      $(".visibility-toggler")
        .removeClass("fa fa-eye")
        .addClass("fa fa-eye-slash");
      $(this).attr("title", "Hide password");
    } else {
      $(".visibility-toggler")
        .removeClass("fa fa-eye-slash")
        .addClass("fa fa-eye");
      $(this).attr("title", "Show password");
    }

    $(".visibility-toggler");
    if ($(".password").prop("type").toLowerCase() == "password") {
      $(".password").removeAttr("type").attr("type", "text");
    } else {
      if ($(".password").prop("type").toLowerCase() == "text") {
        $(".password").removeAttr("type").attr("type", "password");
      }
    }
  });

  $("select[name='contact-mode']").change(function () {
    if ($("select[name='contact-mode'] option:selected").val() == "Email") {
      $(".kin-contact-mode-div").addClass("animate__animated animate__fadeIn");
      $(".kin-contact-mode-label")
        .attr("for", "Email")
        .html("Enter their email address");
      $(".kin-contact-mode-input-box")
        .removeAttr("disabled")
        .attr("type", "email")
        .attr("name", "email");
    }
    if ($("select[name='contact-mode'] option:selected").val() == "Mobile") {
      $(".kin-contact-mode-div").addClass("animate__animated animate__fadeIn");
      $(".kin-contact-mode-label")
        .attr("for", "Phone Number")
        .html("Enter their telephone number");
      $(".kin-contact-mode-input-box")
        .removeAttr("disabled")
        .attr("type", "text")
        .attr("name", "phone-number");
    }
  });
  if ($("select[name='contact-mode'] option:selected").val() == "Email") {
    $(".kin-contact-mode-label")
      .attr("for", "Email")
      .html("Enter their email address");
    $(".kin-contact-mode-input-box")
      .removeAttr("disabled")
      .attr("type", "email")
      .attr("name", "email");
  }
  if ($("select[name='contact-mode'] option:selected").val() == "Mobile") {
    $(".kin-contact-mode-label")
      .attr("for", "Phone Number")
      .html("Enter their telephone number");
    $(".kin-contact-mode-input-box")
      .removeAttr("disabled")
      .attr("type", "text")
      .attr("name", "phone-number");
  }
});
