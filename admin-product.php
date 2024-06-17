<?php

session_start();

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Managment | Online Srore</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="image/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>

    <body onload="loadUsers(1);">

        <!-- admin header -->
        <?php include "admin-header.php" ?>

        <div class="container admin-body">
            <div class="row d-flex justify-content-center">
                <div class="col-10 mt-5">
                    <h2 class="text-center">Product Managment</h2>

                    <div class="row mt-4">
                        <div class="col-4 offset-4 d-flex justify-content-center mb-3">
                            <button class="btn btn-primary w-100">Register Product</button>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-around">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerBrandModal">Add Brand</button>
                            <button class="btn btn-warning">Add Category</button>
                            <button class="btn btn-warning">Add Color</button>
                            <button class="btn btn-warning">Add Size</button>
                        </div>
                    </div>

                    <div class="mt-4 table-responsive" id="content">

                    </div>

                </div>
            </div>
        </div>

        <!-- admin footer  -->
        <?php include "admin-footer.php" ?>

        <!-- Modal -->
        <div class="modal fade" id="registerBrandModal" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <label class="form-label" for="">Brand Name</label>
                       <input class="form-control" type="text" id="brandName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="registerBrand();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location: admin-signin.php");
}

?>