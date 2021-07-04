var timer;

window.addEventListener("blur", function () {
  if (timer) {
    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (document.hasFocus()) {
          clearTimeout(timer);
        } else {
          alert(
            "Your session has already expired please login to access your account"
          );
        }
      }
    };
    http.open("GET", "../../server/logout.php");
    http.send();
  }
});
$(".quick-links").addClass("d-none");
$(".subscription-banner").addClass("pt-lg-5");
