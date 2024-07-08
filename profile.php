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
                <img class="rounded-circle" src="image/user.png" alt="" height="200px">
                <div class="my-3 text-start">
                    <label for="" class="form-label">Profile Image</label>
                    <input type="file" class="form-control">
                </div>
                <div class="d-grid">
                    <button class=" btn btn-secondary">Update</button>
                </div>
            </div>


            <div class="col-8">
                <div class="row">

                    <div class="col-12 mb-2">
                        <h4>Personl Details</h4>
                    </div>

                    <div class="col-6 mb-2">
                        <label for="" class="form-label">First Name</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="" class="form-label">Last Name</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Email</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="" class="form-label">Mobile</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="" class="form-label">User Type</label>
                        <input class="form-control" type="text" disabled>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <h4>Billing Details</h4>
                </div>

                <div class="col-3">
                    <label for="" class="form-label">No</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-9">
                    <label for="" class="form-label">Address Line 1</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Address Line 2</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">City</label>
                    <input class="form-control" type="text">
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Postal Code</label>
                    <input class="form-control" type="text">
                </div>

            

            <div class="row">
                <div class="col-12">
                    <button class="btn btn-warning v-100">UPDATE PROFILE</button>
                </div>
            </div>

        </div>
    </div>

</body>

</html>