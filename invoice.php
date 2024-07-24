<?php
    include "connection.php";
    session_start();

    if(!isset($_SESSION["user"]) || !isset($_GET["id"])){
        header("Location: index.php");
    }

    $user = $_SESSION["user"];

    $ohId = $_GET["id"];

    Database::search("SELECT * FROM `order_history` WHERE `id`='$ohId'");
    $num = $ohId->num_rows;

    if($num < 1){
        header("Location: index.php");
   }

   $oh = $ohId->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <?php include "header.php" ?>

    <div class="container mt-2 mb-4">

        <div class="row d-flex justify-content-center">

        <div class="col-10 offset-1 text-end mb-3">
            <button class="btn btn-danger" onclick="printReport();">Print</button>
        </div>

            <div class="col-10 offset-1 card bg-dark-subtle shadow-sm" id="printArea">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12">
                            <h1 class="fs-1 fw-bold">INVOICE #<?php echo $oh["order_id"]; ?></h1>

                            <p><span class="fw-bold">DATE:</span> <?php echo $oh["order_date"]; ?></p>
                        </div>

                        <div class="col-6">
                            <div class="fw-bold fs-5 mt-3">Online Store Pvt.Ltd</div>
                            <div>No 100</div>
                            <div>Colombo road,</div>
                            <div>Kandy.</div>
                        </div>

                        <div class="col-6 text-end">
                            <div class="fw-bold fs-5 mt-3"><?php echo $user["fname"] ."". $user["lname"]; ?></div>
                            <?php
                                $addressRs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='".$user["id"]."'");
                                if($addressRs->num_rows > 0){
                                    $address = $addressRs->fetch_assoc();
                                    ?>

                                    <div>No <?php echo $address["no"] ?></div>
                                    <div><?php echo $address["line_1"] ?></div>
                                    <div><?php echo $address["line_2"] ?></div>
                                    <div><?php echo $address["city"] ?></div>
                                    <div><?php echo $address["postal_code"] ?></div>
                                    
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="col-12 mt-4">
                            <table class="table table-striped table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        Database::search("SELECT * FROM `order_items`");
                                    ?>
                                    <tr>
                                        <td>White Moose T shirt</td>
                                        <td>Rs. 1500.00</td>
                                        <td>3</td>
                                        <td>Rs.3000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-6">
                            <h3>Thank You... </h3>
                        </div>

                        <div class="col-6 text-end">
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
        </div>
    </div>

    </div>

    <script src="script.js"></script>
</body>

</html>