/**
 * @author Peter Mwambi
 * @time Thu Jun 04 2020 13:13:05 GMT+0300 (East Africa Time)
 * @content Login form validator
 */

$(document).ready(function () {
  ///////////////////////////////
  //buttons
  //////////////////////////////
  var button = $("#submit");

  ///////////////////////////////
  //Form varables
  ///////////////////////////////

  //Large devices
  var username = $("input[name='username']");
  var password = $("input[name='password']");

  /////////////////////////////////
  //Patterns
  ////////////////////////////////
  var username_regExp = /^[a-zA-Z0-9@]{5,30}$/;
  var password_regExp = /^[0-9A-Za-z$@#%!*?_,]{6,100}$/;

  ////////////////////////////////////
  //Validator on submit
  //////////////////////////////////
  $("form[name='login-form']").submit(function () {
    //////////////////////////////////////
    //Username validation
    //////////////////////////////////////

    if ($("input[name='username']").val() == "") {
      $("span[name='usernameErr']").html("Enter your username !");
      return false;
    }
    if (username_regExp.test($("input[name='username']").val())) {
      $("span[name='usernameErr']").html(null);
      button.removeAttr("disabled");
    } else {
      $("span[name='usernameErr']").html("Invalid username");
      return false;
    }
    if ($("input[name='username']").val().length < 5) {
      $("span[name='usernameErr']").html("Invalid username");
      return false;
    }
    if ($("input[name='username']").val().length > 30) {
      $("span[name='usernameErr']").html("Invalid username");
      return false;
    }

    ////////////////////////////////////////////
    //Password Validation
    ///////////////////////////////////////////

    if ($("input[name='password']").val() == "") {
      $("span[name='passwordErr']").html("Your password is required !");
      return false;
    }
    if (password_regExp.test($("input[name='password']").val())) {
      $("span[name='passwordErr']").html(null);
    } else {
      $("span[name='passwordErr']").html("Enter a valid password ");
      return false;
    }
    if ($("input[name='password']").val().length < 6) {
      $("span[name='passwordErr']").html("Invalid password");
      return false;
    }
  });

  //////////////////////////////////////
  //Username validation
  //////////////////////////////////////
  username.focus(function () {
    if ($("input[name='username']").val() == "") {
      $("span[name='usernameErr']").html("Enter your username");
    } else {
      $("span[name='usernameErr']").html(null);
    }
    username.keyup(function () {
      if (username_regExp.test($("input[name='username']").val())) {
        $("span[name='usernameErr']").html(null);
        button.removeAttr("disabled");
      } else {
        $("span[name='usernameErr']").html("Enter a valid username");
        button.attr("disabled", "disabled");
      }
    });
  });

  username.blur(function () {
    if ($("input[name='username']").val() == "") {
      $("span[name='usernameErr']").html("Your username is required !");
      button.attr("disabled", "disabled");
    } else {
      $("span[name='usernameErr']").html(null);
      button.removeAttr("disabled");

      if (username_regExp.test($("input[name='username']").val())) {
        $("span[name='usernameErr']").html(null);
        button.removeAttr("disabled");
      } else {
        $("span[name='usernameErr']").html("Enter a valid username !");
        button.attr("disabled", "disabled");
      }
    }
  });

  ////////////////////////////////////////////
  //Password Validation
  ///////////////////////////////////////////
  password.focus(function () {
    if ($("input[name='password']").val() == "") {
      $("span[name='passwordErr']").html("Enter your password");
    } else {
      $("span[name='passwordErr']").html(null);
    }
    password.keyup(function () {
      if (password_regExp.test($("input[name='password']").val())) {
        $("span[name='passwordErr']").html(null);
        button.removeAttr("disabled");
      } else {
        $("span[name='passwordErr']").html("Enter a valid password");
        button.attr("disabled", "disabled");
      }
    });
  });

  password.blur(function () {
    if ($("input[name='password']").val() == "") {
      $("span[name='passwordErr']").html("Your password is required !");
      button.attr("disabled", "disabled");
    } else {
      $("span[name='passwordErr']").html(null);
      button.removeAttr("disabled");

      if (password_regExp.test($("input[name='password']").val())) {
        $("span[name='passwordErr']").html(null);
        button.removeAttr("disabled");
      } else {
        $("span[name='passwordErr']").html("Enter a vaid password");
        button.attr("disabled", "disabled");
      }
    }
  });
});
