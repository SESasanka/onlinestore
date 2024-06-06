function changeView(){
    var signinBox = document.getElementById("signinbox");
    var signupBox = document.getElementById("signupbox");

    signinBox.classList.toggle("d-none");
    signupBox.classList.toggle("d-none");
}

function signup(){

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("fname",fname.value);
    form.append("lname",lname.value);
    form.append("mobile",mobile.value);
    form.append("email",email.value);
    form.append("password",password.value);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            if(resp == "success"){
                window.location.reload();
            }else{
                document.getElementById("errorMsg2").innerHTML = resp;
                document.getElementById("errorMsgDiv2").classList.remove("d-none");
            }
        }
    }

    req.open("POST","signup-process.php",true);
    req.send(form);
}

function signin(){
    
    var email = document.getElementById("em");
    var password = document.getElementById("pw");
    var rememberMe = document.getElementById("rmb");

    var form = new FormData();
    form.append("em",email.value);
    form.append("pw",password.value);
    form.append("rmb",rememberMe.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            if(resp == "success"){
                window.location = "index.php";
            }else{
                alert(resp);
            }
        }
    }
    req.open("POST","signin-process.php",true);
    req.send(form);

}

function forgotPassword(){

    var email = document.getElementById("email");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            alert(resp);
        }
    }
    req.open("GET","forgot-passowrd-process.php?email=" + email.value,true);
    req.send();

}