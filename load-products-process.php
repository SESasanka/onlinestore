<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Category</td>
            <td>Brand</td>
            <td>Color</td>
            <td>Size</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>

        <?php

        include "connection.php";

        $page = 1;
        if (isset($_GET["page"]) && $_GET["page"] > 1) {
            $page = $_GET["page"];
        }

        $rs = Database::search("SELECT * FROM `product_details` ");
        $num = $rs->num_rows;

        $resultsPerPage = 5;
        $noOfPage = ceil($num / $resultsPerPage);
        $pageResults = ($page - 1) * $resultsPerPage;

        $rs2 = Database::search("SELECT * FROM `product_details` LIMIT $resultsPerPage OFFSET $pageResults");
        $num2 = $rs2->num_rows;

        for ($x = 0; $x < $num2; $x++) {
            $row = $rs2->fetch_assoc();
        ?>

            <tr>
                <td><?php echo ($row["id"]); ?></td>
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["cat_name"]); ?></td>
                <td><?php echo ($row["brand_name"]); ?></td>
                <td><?php echo ($row["color_name"]); ?></td>
                <td><?php echo ($row["size_name"]); ?></td>
            </tr>

        <?php
        }

        ?>
    </tbody>