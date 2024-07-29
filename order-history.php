<?php

include "connection.php";
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: signin.php");
}

$userId = $_SESSION["user"]["id"];

$ohRs = Database::search("SELECT * FROM `order_history` WHERE `users_id`='" . $userId . "'");
$num = $ohRs->num_rows;



?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History | Online Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include "header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1>Order History</h1>
            </div>

            <div class="col-12">

                <?php
                for ($x = 0; $x < $num; $x++) {
                    $row = $ohRs->fetch_assoc();

                ?>

                    <div class="row">

                        <div class="card">
                            <div class="card-body">

                                <h3>Order #<?php echo $row["order_id"]; ?></h3>
                                <p>Date: <?php echo $row["order_date"]; ?></p>

                                <table class="table mt-3">

                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        Database::search("SELECT * FROM `order_items` JOIN `stock_view` ON 
                                        `order_items`.`stock_id`=`stock_view`.`stovk_id` WHERE `oh_id`='".$row["id"]."'");

                                        while($oi = $ohRs->fetch_assoc()){
                                            $total += $oi["price"] * $oi["qty"];
                                            ?>
                                                <td><?php echo $oi["name"]; ?></td>
                                                <td><?php echo $oi["price"]; ?></td>
                                                <td><?php echo $oi["qty"]; ?></td>
                                                <td><?php echo $oi["price"] * $oi["qty"]; ?></td>
                                            <?php
                                        }
                                    ?>

                                    </tbody>

                                </table>

                                <div class=" text-end">


                                    <div>
                                        <span class="fw-bold fs-5">Sub Total:</span>
                                        <span>Rs. 3500.00</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold fs-5">Delivaery:</span>
                                        <span>Rs. 500.00</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold fs-4">Net Total:</span>
                                        <span>Rs. 3500.00</span>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>

                <?php

                }
                ?>



            </div>

        </div>
    </div>

    <?php include "admin-footer.php" ?>

    <script src="script.js"></script>
</body>

</html>