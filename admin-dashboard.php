<?php

session_start();

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="image/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>Admin Dashboard | Online Store</title>
    </head>

    <body onload="loadChart();">


        <?php
        include "admin-header.php";
        ?>


        <div class="container">
            <div class="row">
                <div class="col-3">
                    <canvas id="chart1"></canvas>
                </div>
            </div>
        </div>



        <?php
        include "admin-footer.php";
        ?>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>

    </html>

<?php

} else {
?>
    <script>
        window.location = "admin-signin.php";
    </script>

<?php
}

?>