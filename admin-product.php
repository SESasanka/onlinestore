<?php

include "connection.php";
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

    <body onload="loadProducts(1);">

        <!-- admin header -->
        <?php include "admin-header.php" ?>

        <div class="container admin-body">
            <div class="row d-flex justify-content-center">
                <div class="col-10 mt-5">
                    <h2 class="text-center">Product Managment</h2>

                    <div class="row mt-4">
                        <div class="col-4 offset-4 d-flex justify-content-center mb-3">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#registerProductModal">Register Product</button>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-around">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerBrandModal">Add Brand</button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerCategoryModal">Add Category</button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerColorModal">Add Color</button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerSizeModal">Add Size</button>
                        </div>
                    </div>

                    <div class="mt-4 table-responsive" id="content">

                    </div>

                </div>
            </div>
        </div>

        <!-- admin footer  -->
        <?php include "admin-footer.php" ?>

        <!--brand Modal -->
        <div class="modal fade" id="registerBrandModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Product Register</h1>
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

        <!-- category modal -->
        <div class="modal fade" id="registerCategoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label" for="">Category Name</label>
                        <input class="form-control" type="text" id="categoryName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="registerCategory();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- color modal -->
        <div class="modal fade" id="registerColorModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label" for="">Color Name</label>
                        <input class="form-control" type="text" id="colorName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="registerColor();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- size modal -->
        <div class="modal fade" id="registerSizeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label" for="">Size Name</label>
                        <input class="form-control" type="text" id="sizeName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="registerSize();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- register product -->
        <div class="modal fade" id="registerProductModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header fs-5">
                        <h2>Product Register</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-2">
                            <label class="form-label" for="prodname">Product Name</label>
                            <input class="form-control" type="text" id="prodname">
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="proddesc">Product Description</label>
                            <textarea class="form-control" type="text" id="proddesc" rows="5"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="prodcategory">Category</label>
                            <select class="form-control" id="prodcategory">
                                <option value="0">Select Category</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["cat_id"]); ?>"><?php echo ($d["cat_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="prodbrand">Brand</label>
                            <select class="form-control" id="prodbrand">
                                <option value="0">Select brand</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["brand_id"]); ?>"><?php echo ($d["brand_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="prodcolor">Color</label>
                            <select class="form-control" id="prodcolor">
                                <option value="0">Select Color</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["color_id"]); ?>"><?php echo ($d["color_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="prodsize">Size</label>
                            <select class="form-control" id="prodsize">
                                <option value="0">Select Size</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["size_id"]); ?>"><?php echo ($d["size_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="prodimage">Product Image</label>
                            <input class="form-control" type="file" id="prodimage">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="registerProduct();">Register Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update product modal -->

        <div class="modal fade" id="UpdateProductModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Update Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-2">
                            <label class="form-label" for="uProdname">Product Name</label>
                            <input class="form-control" type="text" id="uProdname">
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="uProddesc">Product Description</label>
                            <textarea class="form-control" type="text" id="uProddesc" rows="5"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="uProdcategory">Category</label>
                            <select class="form-control" id="uProdcategory">
                                <option value="0">Select Category</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["cat_id"]); ?>"><?php echo ($d["cat_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="uProdbrand">Brand</label>
                            <select class="form-control" id="uProdbrand">
                                <option value="0">Select brand</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["brand_id"]); ?>"><?php echo ($d["brand_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="uProdcolor">Color</label>
                            <select class="form-control" id="uProdcolor">
                                <option value="0">Select Color</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["color_id"]); ?>"><?php echo ($d["color_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="uProdsize">Size</label>
                            <select class="form-control" id="uProdsize">
                                <option value="0">Select Size</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["size_id"]); ?>"><?php echo ($d["size_name"]); ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <img src="uProdImgTag" alt="" height="300">
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="uProdimage">Product Image</label>
                            <input class="form-control" type="file" id="uProdimage">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="registerProduct();">update Product</button>
                        </div>
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