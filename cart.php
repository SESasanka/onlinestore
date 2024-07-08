<?php

include "connection.php";
session_start();

if (isset($_SESSION["user"])) {

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart | Online Srore</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="image/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body>

        <!-- header -->
        <?php
        include "header.php";
        ?>
        <!-- header -->

        <div class="container">
            <div class="row">

                <div class="col-12 my-4">
                    <h2><i class="bi bi-cart-fill"></i> Shopping Cart</h2>
                </div>

                <div class="col-12">
                    <div class="row">

                    <!-- Cart-item -->
                    <div class="col-12 border border-3 rounded-4 mb-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex p-3">
                            <img class="rounded-4" src="assets/products/667d8fba2e061wallpaper_1648780126fb855a9141174fc947d92dbea8111e59.jpeg" alt="" height="200">
                            <div class="ms-4">
                                <h4 class="text-warning fw-bold">White T shirt</h4>
                                <p>Color: White</p>
                                <p>Size: M</p>
                                <p class="fw-bold text-primary-emphasis fs-3">Rs.2500.00</p>
                            </div>
                        </div>

                        <div class="btn-group d-flex" role="group" aria-label="Basic example">
                            <button class="btn btn-sm btn-light rounded ">-</button>
                            <input type="text" class="form-control form-control-sm text-center ms-2 rounded-pill" style="width: 100px;" value="1" disabled>
                            <button class="btn btn-sm btn-light rounded ms-2">+</button>
                        </div>

                        <div>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                        </div>
                    </div>

                    <div class="col-12 border border-3 rounded-4 mb-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex p-3">
                            <img class="rounded-4" src="assets/products/667d8fba2e061wallpaper_1648780126fb855a9141174fc947d92dbea8111e59.jpeg" alt="" height="200">
                            <div class="ms-4">
                                <h4 class="text-warning fw-bold">White T shirt</h4>
                                <p>Color: White</p>
                                <p>Size: M</p>
                                <p class="fw-bold text-primary-emphasis fs-3">Rs.2500.00</p>
                            </div>
                        </div>

                        <div class="btn-group d-flex" role="group" aria-label="Basic example">
                            <button class="btn btn-sm btn-light rounded ">-</button>
                            <input type="text" class="form-control form-control-sm text-center ms-2 rounded-pill" style="width: 100px;" value="1" disabled>
                            <button class="btn btn-sm btn-light rounded ms-2">+</button>
                        </div>

                        <div>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                        </div>
                    </div>
                    <!-- Cart-item -->

                    </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12 text-end">
                    <h5>Number of Items: <span class="fw-bold text-danger-emphasis">2</span></h5>
                    <h4>Delivery Fee: <span class="text-muted">Rs.500.00</span></h4>
                    <h2>Net Total: <span class="text-warning">Rs.5500.00</span></h2>
                    <button class="btn btn-success w-25">CHECKOUT</button>
                </div>

            </div>
        </div>


        <script src="script.js"></script>
    </body>

    </html>
<?php

} else {
    header("Location: signin.php");
}

?>