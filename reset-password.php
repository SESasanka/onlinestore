<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-10 col-lg-4">
                <div class="row card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="text-center fw-bold">Reset Password</h2>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="">New Password</label>
                            <input class="form-control" type="password"  id="pw"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Confirm Password</label>
                            <input class="form-control" type="password"  id="cpw"/>
                        </div>

                        <div class="d-none">
                           <input type="hidden" id="vcode" value="<?php echo($_GET["code"]); ?>">
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-secondary" onclick="resetPassword();">Reset</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>