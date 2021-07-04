$(document).ready(function () {
  var pathname = window.location.pathname;
  $(".toast").toast("show");
  $(".mainnav").addClass("invisible");
  $(".spinner").hide();
  $(".spinner-get-pwd-link").hide();
  $(document).on("scroll", function () {
    var pageTop = $(document).scrollTop();
    var pageBottom = pageTop + $(window).height();
    var tags = $("section");

    for (var i = 0; i < tags.length; i++) {
      var tag = tags[i];
      if ($(tag).position().top < pageBottom) {
        $(tag).addClass("visible");
      } else {
        $(tag).removeClass("visible");
      }
    }
  });
  $(".form-body").fadeIn("slow");

  var timer;
  $(window).scroll(function () {
    if (
      pathname == "/adeptdesigners.co.ke/home/" ||
      pathname == "/adeptdesigners.co.ke/contacts/"
    ) {
      var navbar = $(".mainnav");
      var navposition = navbar.offset().top;
      if (timer) {
        window.clearTimeout(timer);
        if (window.pageYOffset >= navposition) {
          navbar.removeClass("d-none").removeClass("invisible");
        } else {
          navbar.addClass("invisible");
        }
      }
      timer = setTimeout(function () {
        navbar.addClass("invisible");
      }, 10000);
    }
  });

  $("#products-carousel")
    .find(".carousel-item")
    .each(function () {
      var imgContainer = $(this),
        bkImg = imgContainer.find("img").attr("src");
      imgContainer.css("background-image", 'url("' + bkImg + '")');
    });

  $("#productsDisplay")
    .find(".card-body")
    .each(function () {
      var imgContainer = $(this),
        bkImg = imgContainer.find("img").attr("src");
      imgContainer.css("background-image", 'url("' + bkImg + '")');
    });

  if (pathname == "/adeptdesigners.co.ke/home/") {
    $(".mainnav").removeClass("invisible");
    $(".home").addClass("active");
    $(".navbar-title").attr("src", "../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-home text-dark'></i> Home");
    $(".about .nav-link")
      .attr("href", "../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../products/")
      .html("<i class='fa fa-cart-plus'></i> Products");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/about/") {
    $(".mainnav").removeClass("invisible");
    $(".about").addClass("active");
    $(".navbar-title").attr("src", "../tools/assets/title.png");
    $(".welcome-description").hide();
    $(".welcome-information").hide();
    $(".about .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-info-circle text-dark'></i> About");
    $(".home .nav-link")
      .attr("href", "../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../products/")
      .html("<i class='fa fa-cart-plus'></i> Products");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/contacts/") {
    $(".mainnav").removeClass("invisible");
    $(".contacts").addClass("active");
    $(".navbar-title").attr("src", "../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".about .nav-link")
      .attr("href", "../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-phone-square text-dark'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../products/")
      .html("<i class='fa fa-cart-plus'></i> Products");
    $(".welcome-description").hide();
    $(".welcome-information").hide();
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/products/") {
    $(".mainnav").removeClass("invisible");
    $(".badge").removeClass("d-none");
    $(".products").addClass("active");
    $(".welcome-description").hide();
    $(".welcome-information").hide();
    $(".navbar-title").attr("src", "../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "../../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".about .nav-link")
      .attr("href", "../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../products/cart/")
      .html("<i class='fa fa-cart-plus text-dark'></i>");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/products/cart/") {
    $(".mainnav").removeClass("invisible");
    $(".products").addClass("active");
    $(".navbar-icon").attr("src", "../../tools/assets/icon.png");
    $(".navbar-title").attr("src", "../../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "../../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".about .nav-link")
      .attr("href", "../../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../../products/")
      .html("<i class='fa fa-cart-plus text-dark'></i> Products");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/products/checkout/") {
    $(".mainnav").removeClass("invisible");
    $(".products").addClass("active");
    $(".welcome-description").hide();
    $(".welcome-information").hide();
    $(".navbar-icon").attr("src", "../../tools/assets/icon.png");
    $(".navbar-title").attr("src", "../../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "../../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".about .nav-link")
      .attr("href", "../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../../products/")
      .html("<i class='fa fa-cart-plus'></i> Products");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/accounts/login/") {
    $(".mainnav").removeClass("invisible");
    $(".accounts").addClass("active");
    $(".navbar-icon").attr("src", "../../tools/assets/icon.png");
    $(".navbar-title").attr("src", "../../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "../../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".about .nav-link")
      .attr("href", "../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../../products/")
      .html("<i class='fa fa-cart-plus'></i> Products");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "javascript:void(0)");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "../../accounts/register/");
  }
  if (pathname == "/adeptdesigners.co.ke/accounts/register/") {
    $(".mainnav").removeClass("invisible");
    $(".accounts").addClass("active");
    $(".navbar-icon").attr("src", "../../tools/assets/icon.png");
    $(".navbar-title").attr("src", "../../tools/assets/title.png");
    $(".home .nav-link")
      .attr("href", "../../home/")
      .html("<i class='fa fa-home'></i> Home");
    $(".about .nav-link")
      .attr("href", "../about/")
      .html("<i class='fa fa-info-circle'></i> About");
    $(".notifications .nav-link")
      .attr("href", "../contacts/#notification-tray")
      .html("<i class='fa fa-inbox'></i> Notifications");
    $(".contact .nav-link")
      .attr("href", "../contacts/")
      .html("<i class='fa fa-phone-square'></i> Contacts");
    $(".products .nav-link")
      .attr("href", "../../products/")
      .html("<i class='fa fa-cart-plus'></i> Products");
    $(".accounts .nav-link")
      .attr("href", "javascript:void(0)")
      .html("<i class='fa fa-user'></i> My Account");
    $(".accounts .dropdown-item:first-child")
      .html("<i class='fa fa-user'></i> Sign in &raquo")
      .attr("href", "../../accounts/login/");
    $(".accounts .dropdown-item:last-child")
      .html("<i class='fa fa-address-card'></i> Register &raquo")
      .attr("href", "javascript:void(0)");
  }

  $("#fileToUpload").change(function () {
    $(".image-list").html("Image selected: " + $("#fileToUpload").val());
  });
  $(".payment-btn").click(function (e) {
    e.preventDefault();
  });
  $(".option-1").click(function () {
    $("input[name='payment-mode']").removeAttr("value").attr("value", "Paypal");
  });
  $(".option-2").click(function () {
    $("input[name='payment-mode']").removeAttr("value").attr("value", "Mpesa");
  });
});
