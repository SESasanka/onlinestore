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

app.get("/auth/google/callback", async (req, res) => {
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

function adminSigin() {
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      if (request.responseText == "success") {
        window.location = "admin-dashboard.php";
      } else {
        document.getElementById("msg").innerHTML = request.responseText;
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };

  request.open("POST", "admin-signin-process.php", true);
  request.send(form);
}

function loadUsers(page) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open("GET", "load-users-process.php?page=" + page, true);
  req.send();
}

function changeUserStatus(id, status) {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open(
    "GET",
    "change-user-status-process.php?id=" + id + "&s=" + status,
    true
  );
  req.send();
}

function registerBrand() {
  var brand = document.getElementById("brandName");

  var form = new FormData();
  form.append("brand", brand.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 400) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open("POST", "register-brand-process.php", true);
  req.send(form);
}
function registerCategory() {
  var category = document.getElementById("categoryName");

  var form = new FormData();
  form.append("category", category.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 400) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open("POST", "register-category-process.php", true);
  req.send(form);
}
function registerColor() {
  var color = document.getElementById("colorName");

  var form = new FormData();
  form.append("color", color.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 400) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open("POST", "register-color-process.php", true);
  req.send(form);
}
function registerSize() {
  var size = document.getElementById("sizeName");

  var form = new FormData();
  form.append("size", size.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 400) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open("POST", "register-size-process.php", true);
  req.send(form);
}

function registerProduct(){

  var name = document.getElementById("prodname");
  var desc = document.getElementById("proddesc");
  var category = document.getElementById("prodcategory");
  var brand = document.getElementById("prodbrand");
  var color = document.getElementById("prodcolor");
  var size = document.getElementById("prodsize");
  var image = document.getElementById("prodimage");

  var form = new FormData();
  form.append("name",name.value);
  form.append("desc",desc.value);
  form.append("category",category.value);
  form.append("brand",brand.value);
  form.append("color",color.value);
  form.append("size",size.value);
  form.append("img",image.files[0]);

  var req = new XMLHttpRequest();

  req.onreadystatechange = function (){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      if(resp == "success"){
        window.location.reload();
      }else{
        alert(resp)
      }
    }
  }

  req.open("POST","register-product-process.php",true);
  req.send(form);

}

function loadProducts(page){

  var req = new XMLHttpRequest();

  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  }

  req.open("GET","load-products-process.php?page=" + page,true);
  req.send();

}

function changeProductStatus(id){
  var req =  new XMLHttpRequest();

  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      if(resp == "success"){
          window.location.reload();
      }else{
        alert(resp);
      }
      
    }
  }
  req.open("GET","change-product-process.php?id=" + id,true);
  req.send();
}

function addStock(){

  var product = document.getElementById("product");
  var qty = document.getElementById("qty");
  var price = document.getElementById("unitPrice");

  var form = new FormData();
  form.append("product", product.value);
  form.append("qty", qty.value);
  form.append("price", price.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      if(resp == "success"){
        showAlert("Success","Stock Updated Successfully!","success").then(()=>{
          window.location.reload();
        });
      }else{
        showAlert("Error",resp,"error");
      }
    }
  }

  req.open("POST","add-stock-process.php",true);
  req.send(form);

}

function showAlert(title,text,icon){
  return Swal.fire({
    title: title,
    text: text,
    icon: icon,
    color:"#fff"
  });
}

function loadProUpdateData(id){
  var req = new XMLHttpRequest();
  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      var data = JSON.parse(resp);

      document.getElementById("uProId").value = data.id;
      document.getElementById("uProdname").value = data.name;
      document.getElementById("uProddesc").value = data.description;
      document.getElementById("uProdcategory").value = data.category_cat_id;
      document.getElementById("uProdbrand").value = data.brand_brand_id;
      document.getElementById("uProdcolor").value = data.color_color_id;
      document.getElementById("uProdsize").value = data.size_size_id;
      document.getElementById("uProdImgTag").src = data.img;

      
      new bootstrap.Modal(document.getElementById("UpdateProductModal")).show();
    }
  }
  req.open("GET","get-product-details.php?id=" + id, true);
  req.send();
}

function updateProdImage(){
  var image = document.getElementById("uProdimage");
  var imageTag = document.getElementById("uProdImgTag");

  var url = window.URL.createObjectURL(image.files[0]);
  imageTag.src = url;

}

function updateProduct(){
  var id = document.getElementById("uProdname");
  var name = document.getElementById("uProddesc");
  var desc = document.getElementById("uProdcategory");
  var cat = document.getElementById("uProId");
  var brand = document.getElementById("uProdbrand");
  var size = document.getElementById("uProdcolor");
  var color = document.getElementById("uProdsize") ;
  var image = document.getElementById("uProdimage");

  var form = new FormData();
  form.append("id",id.value);
  form.append("name",name.value);
  form.append("desc",desc.value);
  form.append("cat",cat.value);
  form.append("brand",brand.value);
  form.append("size",size.value);
  form.append("color",color.value);
  form.append("img",image.files[0]);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      if(resp == "success"){
        showAlert("Success", "Product Updated Successfully","success").then(()=>{
          window.location.reload();
        });
      }else{
        showAlert("Error",resp, "error");
      }
    }
  }
  req.open("POST","update-product-process.php",true);
  req.send(form);

}

function printReport(){
  var Content = document.body.innerHTML;
  var printArea = document.getElementById("printArea");

  document.body.innerHTML = printArea.innerHTML;

  window.print();

  document.body.innerHTML = Content;
}

function search(page){

  var search = document.getElementById("search");
  
  var req = new XMLHttpRequest();
  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  }

  req.open("GET","search-product-process.php?search=" + search.value + "&page=" + page ,true);
  req.send();

}