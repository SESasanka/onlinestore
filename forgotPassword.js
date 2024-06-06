function forgotPassword() {
  var email = document.getElementById("email");

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      alert(resp);
    }
  };
  req.open("GET", "forgot-passowrd-process.php?email=" + email.value, true);
  req.send();
}
