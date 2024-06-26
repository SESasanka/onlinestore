<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <title>Onlne Store</title>
  <link rel="stylesheet" href="style.css">

</head>

<body onload="onLoad()">
  <!-- Your content -->
  <!-- <button id="sign-out" onclick="signOut()">Sign Out</button> -->

  <!-- Header -->
  <?php include "header.php" ?>
  <!-- Header -->


  <div class="container">
    <div class="row">

      <div class="col-5 offset-2 mt-4">
        <div class="form-floating">
          <input type="text" class="form-control" id="search" placeholder="Serach...">
          <label for="search">Search</label>
        </div>
      </div>

      <div class="col-2 mt-4 d-grid">
        <button class="btn btn-secondary">Search</button>
      </div>

      <div class="row">
        <div class="col-12 mt-5">
          <img class="rounded-3" src="image/banner.webp" width="100%" alt="">
        </div>
      </div>

      <div class="row my-5">
        <div class="col-12 col-md-4 col-lg-3 my-3">
          <div class="card">

            <a href="" class="link-light text-decoration-none">
              <img src="image/product1.png" class="card-img-top rounded-top-4" alt="...">

              <div class="card-body">
                <h5 class="card-title">White T-shirt</h5>
                <p class="card-text">Moose white T-shirt medium size</p>
                <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.2500</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 my-3">
          <div class="card">

            <a href="" class="link-light text-decoration-none">
              <img src="image/product1.png" class="card-img-top rounded-top-4" alt="...">

              <div class="card-body">
                <h5 class="card-title">White T-shirt</h5>
                <p class="card-text">Moose white T-shirt medium size</p>
                <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.2500</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 my-3">
          <div class="card">

            <a href="" class="link-light text-decoration-none">
              <img src="image/product1.png" class="card-img-top rounded-top-4" alt="...">

              <div class="card-body">
                <h5 class="card-title">White T-shirt</h5>
                <p class="card-text">Moose white T-shirt medium size</p>
                <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.2500</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 my-3">
          <div class="card">

            <a href="" class="link-light text-decoration-none">
              <img src="image/product1.png" class="card-img-top rounded-top-4" alt="...">

              <div class="card-body">
                <h5 class="card-title">White T-shirt</h5>
                <p class="card-text">Moose white T-shirt medium size</p>
                <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.2500</p>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>


  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script>
    function signOut() {
      google.accounts.id.disableAutoSelect();
      console.log('User signed out.');
      window.location = "signin.php";
    }
  </script>

  <script></script>
</body>

</html>