function changeView() {
  var signinBox = document.getElementById("signinbox");
  var signupBox = document.getElementById("signupbox");

  signinBox.classList.toggle("d-none");
  signupBox.classList.toggle("d-none");
}

function signup() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("password", password.value);

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        document.getElementById("errorMsg2").innerHTML = resp;
        document.getElementById("errorMsgDiv2").classList.remove("d-none");
      }
    }
  };

  req.open("POST", "signup-process.php", true);
  req.send(form);
}

function signin() {
  var email = document.getElementById("em");
  var password = document.getElementById("pw");
  var rememberMe = document.getElementById("rmb");

  var form = new FormData();
  form.append("em", email.value);
  form.append("pw", password.value);
  form.append("rmb", rememberMe.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location = "index.php";
      } else {
        alert(resp);
      }
    }
  };
  req.open("POST", "signin-process.php", true);
  req.send(form);
}

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

function resetPassword() {
  var pw = document.getElementById("pw");
  var cpw = document.getElementById("cpw");
  var vcode = document.getElementById("vcode");

  var form = new FormData();
  form.append("pw", pw.value);
  form.append("cpw", cpw.value);
  form.append("vcode", vcode.value);

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      alert(resp);
    }
  };

  req.open("POST", "reset-password-process.php", true);
  req.send(form);
}

app.get('/auth/google/callback', async (req, res) => {
  const { token } = req.query;

  // Verify the token with Google
  const ticket = await client.verifyIdToken({
    idToken: token,
    audience:
      "551653266643-dk0hj6gteq6u5dp4b6uprlkd7l2bt8hu.apps.googleusercontent.com",
  });
  const payload = ticket.getPayload();

  // Use the user information (payload) as needed
  const userId = payload["sub"];
  const email = payload["email"];
  const name = payload["name"];

  // Here you can create a session, create a new user, or update an existing user in your database

  res.redirect("/dashboard"); // Redirect the user to your desired page
});


function adminSignFunction(){

  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("email",email.value);
  form.append("password",password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if(request.readyState == 4 && request.status == 200){
      if(request.responseText == "success"){
        window.location = "admin-dashboard.php";
      }else{
        document.getElementById("msg").innerHTML = request.responseText;
        document.getElementById("msgDiv").className = "d-none";
      }
    }
  }

  request.open("POST","admin-signin-process.php",true);
  request.send(form);

}

