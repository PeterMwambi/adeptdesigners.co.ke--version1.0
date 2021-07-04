/**
 * @author Peter Mwambi
 * @time  Wed Dec 30 2020 18:04:40 GMT+0300 (East Africa Time)
 * @time updated
 * @content Recovery form validator
 */

/////////////////////////////////
//Regular Expressions
///////////////////////////////
var emailRegExp = /^[a-z]+\@+[a-z]+\.+[a-z.]{2,5}$/;

$(document).ready(function () {
  $("input[name='recovery-email']").focus(function () {
    if ($(this).val() == "") {
      $("p[name='recovery-emailErr']").html("Enter your email address");
    }
  });
  $("input[name='recovery-email']").blur(function () {
    if ($(this).val() == "") {
      $("p[name='recovery-emailErr']").html(
        "Your email address is required !"
      );
    } else {
      $("input[name='recovery-emailErr']").html(null);
      if (emailRegExp.test($(this).val())) {
        $("p[name='recovery-emailErr']").html(null);
      } else {
        $("input[name='recovery-emailErr']").html(
          "Please enter a valid email address !"
        );
      }
    }
  });

  ///////////////////////////////////////////
  //Validator on submit
  //////////////////////////////////////////
  $("form[name='recovery-form']").submit(function (e) {
    e.preventDefault();
    if ($("input[name='recovery-email']").val() == "") {
      $("p[name='recovery-emailErr']").html("Enter your email address");
      return false;
    }
    if (emailRegExp.test($("input[name='recovery-email']").val())) {
      $("p[name='recovery-emailErr']").html(null);
    } else {
      $("p[name='recovery-emailErr']").html(
        "Please enter a valid email address !"
      );
      return false;
    }

    ////////////////////////////////////////////
    //Ajax calls
    ///////////////////////////////////////////
    var email = $("input[name='recovery-email']").val();
    var url = "../../accounts/server/recovery.php";
    var token = $("input[name='recovery']").val();
    $.ajax({
      type: "post",
      url: url,
      data: { email: email, token: token },
      beforeSend: function () {
        $("spinner-get-pwd-link").show();
      },
      success: function (data) {
        $(".spinner-get-pwd-link").hide();
        $(".recoverpwd-alert").removeClass("d-none");
        var results = JSON.parse(data);
        if(results.flag === 0){
          $(".recoverpwd-alert").removeClass("alert-success").addClass("alert-danger");
          $("p[name='account-recovery-message']").html(results.error);
        }else{
          if(results.flag === 1){
          $("p[name='account-recovery-message']").html(results.message);
          $(".saluitation").html("HOORAY !!!")
          if($(".recoverpwd-alert").hasClass("alert-danger")){
            $(".recoverpwd-alert").removeClass("alert-danger").addClass("alert-success");
          }
        }
        }
      },
      fail: function () {},
    });
  });
});
