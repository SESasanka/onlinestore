<?php
include  "connection.php";
?>

<!-- filter -->
<?php
include "filter-form.php";
?>
<!-- filter -->



<div class="col-10 offset-1 col-md-8 offset-md-0 col-lg-9">
    <div class="row">

        <?php



        $page = 1;

        if (isset($_GET["page"]) && ($_GET["page"]) > 1) {
            $page = $_GET["page"];
        }


        $search = $_GET["search"];

        $rs = Database::search("SELECT * FROM `stock_view` WHERE `name` LIKE '%$search%' AND `status`='1'");
        $num = $rs->num_rows;

        $resultsPerpage =  4;
        $numOfPage = ceil($num / $resultsPerpage);
        $pageResults = ($page - 1) * $resultsPerpage;

        $rs2 = Database::search("SELECT * FROM `stock_view` WHERE `name` LIKE '%$search%' LIMIT $resultsPerpage OFFSET $pageResults");
        $num2 = $rs2->num_rows;


        if ($num2 > 0) {

            for ($x = 0; $x < $num2; $x++) {
                $row = $rs2->fetch_assoc();

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
                for ($x = 1; $x <= $numOfPage; $x++) {
                    if ($x == $page) {
                ?>
                        <li class="page-item"><span class="page-link" onclick="search(<?php echo ($x); ?>)"><?php echo ($x); ?></span></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><span class="page-link" onclick="search(<?php echo ($x); ?>)"><?php echo ($x); ?></span></li>
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