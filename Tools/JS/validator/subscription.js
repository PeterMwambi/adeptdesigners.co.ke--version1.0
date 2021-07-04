/**
 * @author Peter Mwambi
 * @time  Mon Oct 05 2020 09:34:37 GMT+0300 (East Africa Time)
 * @time updated Wed Dec 30 2020 17:56:33 GMT+0300 (East Africa Time)
 * @content Subscription form validator
 */

/////////////////////////////////
//Regular Expressions
///////////////////////////////
var emailRegExp = /^[a-z]+\@+[a-z]+\.+[a-z.]{2,5}$/;
var referrer = window.location.pathname;
var url = null;

if (referrer == "/adeptdesigners.co.ke/accounts/login/") {
  var url = "../../accounts/server/subscription.php";
} else if (referrer == "/adeptdesigners.co.ke/accounts/register/") {
  var url = "../../accounts/server/subscription.php";
} else {
  var url = "../accounts/server/subscription.php";
}

$(document).ready(function () {
  $("input[name='newsletterEmail']").focus(function () {
    if ($(this).val() == "") {
      $("span[name='newsletterEmailErr']").html("Enter your email address");
    }
  });
  $("input[name='newsletterEmail']").blur(function () {
    if ($(this).val() == "") {
      $("span[name='newsletterEmailErr']").html(
        "Your email address is required !"
      );
    } else {
      $("input[name='newsletterEmailErr']").html(null);
      if (emailRegExp.test($(this).val())) {
        $("span[name='newsletterEmailErr']").html(null);
      } else {
        $("input[name='newsletterEmailErr']").html(
          "Please enter a valid email address !"
        );
      }
    }
  });

  ///////////////////////////////////////////
  //Validator on submit
  //////////////////////////////////////////
  $("form[name='subscription-form']").submit(function (e) {
    e.preventDefault();
    if ($("input[name='newsletterEmail']").val() == "") {
      $("span[name='newsletterEmailErr']").html("Enter your email address");
      return false;
    }
    if (emailRegExp.test($("input[name='newsletterEmail']").val())) {
      $("span[name='newsletterEmailErr']").html(null);
    } else {
      $("span[name='newsletterEmailErr']").html(
        "Please enter a valid email address !"
      );
      return false;
    }

    ////////////////////////////////////////////
    //Ajax calls
    ///////////////////////////////////////////
    var email = $("input[name='newsletterEmail']").val();
    var token = $("input[name='subscription']").val();
    $.ajax({
      type: "post",
      url: url,
      data: { email: email, token: token },
      beforeSend: function () {
        $(".spinner").show();
      },
      success: function (data) {
        $(".spinner").hide();
        $(".auth-message").removeClass("d-none");
        var results = JSON.parse(data);
        if (results.flag === 0) {
          $(".auth-message")
            .removeClass("alert-success")
            .addClass("alert-danger");
          $("span[name='confirmation-message']").html(results.error);
        } else {
          if (results.flag === 1) {
            $("span[name='confirmation-message']").html(results.message);
            if ($(".auth-message").hasClass("alert-danger")) {
              $(".auth-message")
                .removeClass("alert-danger")
                .addClass("alert-success");
            }
          }
        }
      },
      fail: function () {},
    });
  });
});
