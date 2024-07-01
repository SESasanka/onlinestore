<?php
$search = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Omline Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body onload="search(1);">
    <!-- header -->
    <?php include "header.php" ?>
    <!-- header -->

    <div class="container-fluid">
        <div class="row">
            <form class="row" method="GET" action="shop.php">

                <div class="col-5 offset-2 mt-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Serach..." value="<?php echo ($search); ?>">
                        <label for="search">Search</label>
                    </div>
                </div>

                <div class="col-2 mt-4 d-grid">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </form>
        </div>


        <div class="row" id="content">
            <div class="col-2 bg-dark py-4 rounded-3 mt-5 ms-2">
                <h2 class="text-center"><i class="bi bi-funnel-fill"></i>Filters</h2>
                <div class="mb-2">
                    <label class="form-label" for="">Category</label>
                    <select class="form-control" id="">
                        <option value="0">Select Category</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Brand</label>
                    <select class="form-control" id="">
                        <option value="0">Select Brand</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Size</label>
                    <select class="form-control" id="">
                        <option value="0">Select Size</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Color</label>
                    <select class="form-control" id="">
                        <option value="0">Select Color</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Price Form</label>
                    <input class="form-control" type="text" name="" id="">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Price To</label>
                    <input class="form-control" type="text" name="" id="">
                </div>
            </div>


            <div class="col-9">
                <div class="row">
                    
                </div>
            </div>


        </div>
    </div>
    </div>

    <script src="script.js"></script>
</body>

</html>