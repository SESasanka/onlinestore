<?php
include "connection.php";


$page = 1;

if (isset($_POST["page"]) && $_POST["page"] > 1) {
    $page = $_POST["page"];
}


$category = $_POST["category"];
$brand = $_POST["brand"];
$size = $_POST["size"];
$color = $_POST["color"];
$pf = $_POST["priceFrom"];
$pt = $_POST["priceTo"];
$search = $_POST["search"];
?>
<!-- filter -->

<div class="col-10 offset-1 col-md-4 offset-md-0 col-lg-2 bg-dark py-4 rounded-3 mt-5">
    <h2 class="text-center"><i class="bi bi-funnel-fill"></i>Filters</h2>
    <div class="mb-2">
        <label class="form-label" for="">Category</label>
        <select class="form-select" id="category">
            <option value="0">Select Category</option>

            <?php
            $rs = Database::search("SELECT * FROM `category`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["cat_id"]); ?>"<?php if($category == $d["cat_id"]){echo("selected");} ?>><?php echo ($d["cat_name"]); ?></option>

            <?php
            }
            ?>

        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Brand</label>
        <select class="form-select" id="brand">
            <option value="0">Select Brand</option>

            <?php
            $rs = Database::search("SELECT * FROM `brand`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["brand_id"]); ?>" <?php if($brand == $d["brand_id"]){echo("selected");} ?>><?php echo ($d["brand_name"]); ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Size</label>
        <select class="form-select" id="size">
            <option value="0">Select Size</option>

            <?php
            $rs = Database::search("SELECT * FROM `size`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["size_id"]); ?>" <?php if($size == $d["size_id"]){echo("selected");} ?>><?php echo ($d["size_name"]); ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Color</label>
        <select class="form-select" id="color">
            <option value="0">Select Color</option>

            <?php
            $rs = Database::search("SELECT * FROM `color`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["color_id"]); ?>" <?php if($color == $d["color_id"]){echo("selected");} ?>><?php echo ($d["color_name"]); ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Price Form</label>
        <input class="form-control" type="text" name="" id="priceFrom" value="<?php echo($pf) ?>">
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Price To</label>
        <input class="form-control" type="text" name="" id="priceTo" value="<?php echo($pt) ?>">
    </div>

    <div class="d-grid">
        <button class="btn btn-secondary" onclick="filter(1);">FITER</button>
    </div>

</div>
<!-- filter -->


<div class="col-10 offset-1 col-md-8 offset-md-0 col-lg-9">
    <div class="row">
        <?php


        $query = "SELECT * FROM `stock_view`";

        $condition = [];

        // filter by text
        if(!empty($search)){
            $condition[] = "`name` LIKE '%$search%'";
        }

        //filter by category

        if ($category != 0) {
            $condition[] = "`cat_id`='$category'";
        }
        //filter by brand

        if ($brand != 0) {
            $condition[] = "`brand_id`='$brand'";
        }
        //filter by size

        if ($category != 0) {
            $condition[] = "`cat_id`='$category'";
        }
        //filter by category

        if ($size != 0) {
            $condition[] = "`size_id`='$size'";
        }
        //filter by color

        if ($color != 0) {
            $condition[] = "`color_id`='$color'";
        }
        //filter by price from

        if (!empty($pf) && empty($pt)) {
            $condition[] = "`price` >='$pf'";
        }
        //filter by price to

        if (empty($pf) && !empty($pt)) {
            $condition[] = "`price` <='$pt'";
        }
        //filter by price range

        if (!empty($pf) && !empty($pt)) {
            $condition[] = "`price` BETWEEN '$pf' AND '$pt'";
        }


        if (!empty($condition)) {
            $query .= "WHERE" . implode("AND", $condition);
        }

        if(empty($condition)){
            $query .="WHERE `status`= '1'";
        }else{
            $query .="AND `status`= '1'";
        }


        $rs = Database::search($query);
        $num = $rs->num_rows;

        $resultsPerPage = 4;
        $noOfPage = ceil($num / $resultsPerPage);
        $pageResults = ($page - 1) * $resultsPerPage;

        $query .= "LIMIT $resultsPerPage OFFSET $pageResults";

        $rs2 = Database::search($query);
        $num2 = $rs2->num_rows;

        if ($num > 0) {
            for ($x = 0; $x < $num; $x++) {
                $row = $rs->fetch_assoc();
        ?>
                <div class="col-12 col-md-6 col-lg-3 my-3 ">
                    <div class="card ">

                        <a href="" class="link-light text-decoration-none">
                            <img src="<?php echo ($row["img"]); ?>" class="card-img-top rounded-top-4" alt="...">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo ($row["name"]); ?></h5>
                                <p class="card-text"><?php echo ($row["description"]); ?></p>
                                <p class="card-text fs-3 fw-bold text-warning-emphasis"><?php echo ($row["price"]); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="col-12 text-center mt-5">
                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 150px;"></i>
                <h2 class="text-danger fw-bold">No Product</h2>
                <span class="text-muted">No matching products wre found for the search text you have entered.</span>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
if ($num2 > 0) {
?>
    <div class="col-9 offset-3 d-grid justify-content-center mb-3">
        <nav aria-label="Page navigation example ">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($x = 1; $x <= $noOfPage; $x++) {
                    if ($x == $page) {
                ?>
                        <li class="page-item"><span class="page-link" onclick="filter(<?php echo ($x); ?>)"><?php echo ($x); ?></span></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><span class="page-link" onclick="filter(<?php echo ($x); ?>)"><?php echo ($x); ?></span></li>
                <?php

                    }
                }
                ?>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php
}
?>