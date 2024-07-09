<?php
include "connection.php";
session_start();

if (isset($_SESSION["user"])) {

    $uid = $_SESSION["user"]["id"];
    $rs = Database::search("SELECT * FROM `users` WHERE `id`='$uid'");

    if ($rs->num_rows < 1) {
        header("Location: signin.php");
    }

    $user = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile | Online Srore</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="image/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body>

        <!-- header -->
        <?php
        include "header.php";
        ?>
        <!-- header -->

        <div class="container">
            <div class="row vh-90 d-flex justify-content-center align-itmes-center">

                <div class="col-4 text-center">

                    <?php
                    $profile = "assets/profile/desault.png";
                    if (isset($user["profile"]) && !empty($user["profile"])) {
                        $profile = $user["profile"];
                    }
                    ?>

                    <img class="rounded-circle" src="<?php echo ($profile); ?>" alt="" height="200px">
                    <div class="my-3 text-start">
                        <label for="" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="profileImg">
                    </div>
                    <div class="d-grid">
                        <button class=" btn btn-secondary" onclick="uploadProfileImg();">Update</button>
                    </div>
                </div>


                <div class="col-8">
                    <div class="row">

                        <div class="col-12 mb-2">
                            <h4>Personl Details</h4>
                        </div>


                        <div class="col-6 mb-2">
                            <label for="" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="fname" value="<?php echo ($user["fname"]); ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Last Name</label>
                            <input class="form-control" type="text" id="lname" value="<?php echo ($user["lname"]); ?>">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control" type="text" value="<?php echo ($user["email"]); ?>" disabled>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Mobile</label>
                            <input class="form-control" type="text" id="mobile" value="<?php echo ($user["mobile"]); ?>">
                        </div>
                        <div class="col-6 mb-2">

                            <?php
                            $utId = $user["user_type_id"];
                            $userTypeRs = Database::search("SELECT * FROM `user_type` WHERE `id`='$utId'");
                            $userType = $userTypeRs->fetch_assoc();
                            ?>

                            <label for="" class="form-label">User Type</label>
                            <input class="form-control" type="text"  id="ut" value="<?php echo ($userType["name"]) ?>" disabled>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 ">
                        <h4>Billing Details</h4>
                    </div>

                    <?php

                    $userAddressRs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$uid'");

                    $no = "";
                    $line1 = "";
                    $line2 = "";
                    $city = "";
                    $postalCode = "";

                    if ($userAddressRs->num_rows > 0) {
                        $address = $userAddressRs->fetch_assoc();

                        $no = $address["no"];
                        $line1 = $address["line_1"];
                        $line2 = $address["line_2"];
                        $city = $address["city"];
                        $postalCode = $address["postal_code"];
                    }

                    ?>

                    <div class="col-3">
                        <label for="" class="form-label">No</label>
                        <input type="text" class="form-control" id="no" value="<?php  echo($no);?>">
                    </div>
                    <div class="col-9">
                        <label for="" class="form-label">Address Line 1</label>
                        <input type="text" class="form-control" id="line1" value="<?php  echo($line1);?>">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" id="line2" value="<?php  echo($line2);?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="" class="form-label">City</label>
                        <input class="form-control" type="text" id="city" value="<?php  echo($city);?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="" class="form-label">Postal Code</label>
                        <input class="form-control" type="text" id="pcode" value="<?php  echo($postalCode);?>">
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-warning v-100" onclick="updateProfile();">UPDATE PROFILE</button>
                        </div>
                    </div>

                </div>
            </div>

    </body>

    </html>
<?php
} else {
    header("Location: signin.php");
}
?>