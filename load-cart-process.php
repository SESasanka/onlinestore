<?php

include "connection.php";
session_start();

if (isset($_SESSION["user"])) {

    $userId = $_SESSION["user"]["id"];

    $rs = Database::search("SELECT * FROM `cart` WHERE `users_id`='$userId'");
    $num = $rs->num_rows;
}

?>
<div class="col-12 my-4">
    <h2><i class="bi bi-cart-fill"></i> Shopping Cart</h2>
</div>

<div class="col-12">
    <div class="row">

        <?php

        $netTotal = 0;

        for ($i = 0; $i < $num; $i++) {
            $row = $rs->fetch_assoc();
            $stockId = $row["stock_id"];

            $stockRs = Database::search("SELECT * FROM `stock_view` WHERE `stock_id`='$stockId'");
            $stock = $stockRs->ftech_assoc();

        ?>

            <!-- Cart-item -->
            <div class="col-12 border border-3 rounded-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="d-flex p-3">
                    <img class="rounded-4" src="<?php echo $stock["img"]; ?>" alt="" height="200">
                    <div class="ms-4">
                        <h4 class="text-warning fw-bold"><?php echo $stock["name"]; ?></h4>
                        <p>Color: <?php echo $stock["color_name"]; ?></p>
                        <p>Size: <?php echo $stock["size_name"]; ?></p>
                        <p class="fw-bold text-primary-emphasis fs-3"><?php echo $stock["price"]; ?></p>
                    </div>
                </div>

                <div class="btn-group d-flex" role="group" aria-label="Basic example">
                    <button onclick="decrementCartQty('<?php echo $row['id']; ?>')" class="btn btn-sm btn-light rounded ">-</button>
                    <input id="qty-<?php echo $row["id"]; ?>" class="form-control form-control-sm text-center ms-2 rounded-pill" style="width: 100px;" value="<?php echo $row["qty"]; ?>" disabled>
                    <button onclick="incrementCartQty('<?php echo $row['id']; ?>')" class="btn btn-sm btn-light rounded ms-2">+</button>
                </div>

                <div>
                    <?php
                    $pTotal = $stock["price"] + $row["qty"];
                    $netTotal +=$pTotal;
                    ?>
                    <h4 class="fw-blod text-success-emphasis">Rs.<?php echo $pTotal; ?>.00 </h4>
                </div>

                <div>
                    <button class="btn btn-danger btn-sm" onclick="removeFromCart('<?php echo $row['id']; ?>')"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </div>
            <!-- Cart-item -->

        <?php
        }

        ?>



    </div>
</div>

<div class="col-12">
    <hr>
</div>
<div class="col-12 text-end">
    <h5>Number of Items: <span class="fw-bold text-danger-emphasis">2</span></h5>

    <?php

        $delivery = 500;
        $netTotal +=$delivery;

    ?>

    <h4>Delivery Fee: <span class="text-muted">Rs.<?php echo $delivery; ?>.00</span></h4>
    <h2>Net Total: <span class="text-warning">Rs.<?php echo $netTotal ?> .00</span></h2>
    <button class="btn btn-success w-25">CHECKOUT</button>
</div>