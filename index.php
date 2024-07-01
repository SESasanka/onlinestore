<?php
session_start();
include "connection.php";
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

    <!-- search -->
    <form class="row" method="GET" action="shop.php">

      <div class="col-5 offset-2 mt-4">
        <div class="form-floating">
          <input type="text" class="form-control" name="search" placeholder="Serach...">
          <label for="search">Search</label>
        </div>
      </div>

      <div class="col-2 mt-4 d-grid">
        <button type="submit" class="btn btn-secondary">Search</button>
      </div>
    </form>


    <!-- search -->

    <div class="row">
      <div class="col-12 mt-5">
        <img class="rounded-3" src="image/banner.webp" width="100%" alt="">
      </div>
    </div>

    <div class="row my-5">

      <?php
      $rs =  Database::search("SELECT * FROM `stock_view` ORDER BY `stock_view`.`stock_id` DESC LIMIT 8");
      $num = $rs->num_rows;

      for ($x = 0; $x < $num; $x++) {
        $row = $rs->fetch_assoc();
      ?>
        <div class="col-12 col-md-4 col-lg-3 my-3">
          <div class="card">

            <a href="" class="link-light text-decoration-none">
              <img src="<?php echo ($row["img"]); ?>" class="card-img-top rounded-top-4" alt="...">

              <div class="card-body">
                <h5 class="card-title"><?php echo ($row["name"]) ?></h5>
                <p class="card-text"><?php echo ($row["description"]) ?></p>
                <p class="card-text fs-3 fw-bold text-warning-emphasis"><?php echo ($row["price"]) ?></p>
              </div>
            </a>
          </div>
        </div>
      <?php
      }
      ?>

    </div>
  </div>
  </div>

  <!-- footer -->

  <div class="container-fluid bg-body-secondary py-3">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center justify-content-around">
          <img src="image/logo.png" alt="logo" height="100">
          <div>
            <p class="fs-3 fw-bold">Online Store</p>
            <p>&copy; 2024</p>
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
</body>

</html>