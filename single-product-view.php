<?php

include "connection.php";

if (!isset($_GET["product"]) || empty($_GET["product"])) {
    header("Location: index.php");
}
$stockId = $_GET["product"];

$rs = Database::search("SELECT * FROM `stock_view` WHERE `stock_id`='$stockId'");

if ($rs->num_rows < 1) {
?>
    <script>
        alert("Product not found");
        window.location = "index.php";
    </script>
<?php
}

$row = $rs->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <title><?php echo $row["name"]; ?> | Onlne Store</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- header -->
    <?php include "header.php" ?>
    <!-- header -->


    <div class="container">
        <div class="row d-flex align-items-center vh-100">
            <div class="col-10 offset-1">
                <div class="card shadow bg-dark-subtle rounded-3">
                    <div class="card-body d-flex">

                        <div>
                            <img src="<?php echo $row["img"]  ?>" height="380" alt="">
                        </div>

                        <div class="ms-5">
                            <h3 class="fw-bold text-warning mb-1"><?php echo $row["name"]  ?></h3>
                            <p class="text-muted"><?php echo $row["description"]  ?></p>

                            <ul class="list-unstyled">
                                <li class="mb-2 fs-5">Category:<?php echo $row["cat_name"]  ?></li>
                                <li class="mb-2 fs-5">Brand:<?php echo $row["brand_name"]  ?></li>
                                <li class="mb-2 fs-5">Size: <?php echo $row["size_name"]  ?></li>
                                <li class="mb-2 fs-5">Color: <?php echo $row["color_name"]  ?></li>
                            </ul>

                            <div class="fw-bold text-info fs-4 mb-3">RS <?php echo $row["price"]  ?></div>

                            <div class="d-flex align-items-center">
                                <input class="form-control" type="text" placeholder="Qty" id="qty" style="width :100px">

                                <?php
                                if ($row["qty"] > 0) {
                                ?>
                                    <span class="fw-bold ms-3 text-bg-success rounded px-2 py-1 "><?php echo $row["qty"];  ?> Quantites Available</span>

                                <?php
                                } else {
                                ?>
                                    <span class="fw-bold ms-3 text-bg-danger rounded px-2 py-1 ">Out Of Stock</span>

                                <?php
                                }
                                ?>

                            </div>

                            <div class="row mt-3">
                                <div class="col-6 d-grid">
                                    <button class="btn btn-primary fw-bold" onclick="addToCart('<?php echo ($row['stock_id']); ?>');">Add to Card</button>
                                </div>
                                <div class="col-6 d-grid">
                                    <button class="btn btn-success fw-bold" onclick="buyNow('<?php echo $stockId; ?>');">Buy Now</button>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 col-12 fixed-bottom">
        <p class="text-center">&copy; 2024 OnlineStore/lk || All Rights Reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script src="script.js"></script>
</body>

</html>