<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center vh-100">

            <!-- SignIn Box -->
            <div class="col-10 col-lg-4">
                <div class="row card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="text-center fw-bold">Admin | Sign In</h2>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Email Address</label>
                            <input class="form-control" type="email" id="email" placeholder="example@gmail.com"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" id="password" placeholder="***********"/>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-secondary" onclick="adminSigin();">Sign In</button>
                        </div>
                        <div id="msgDiv" class="d-none">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SignIn Box -->
        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>