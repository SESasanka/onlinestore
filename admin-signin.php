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

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row ">
            <h2 class="text-center">Admin Login</h2>

            <div class="mt-3">
                <label>Email :</label>
                <input type="text" class="form-control border-light bg-transparent" placeholder="EX: text@gmail.com" id="email">
            </div>

            <div class="mt-3">
                <label>Password :</label>
                <input type="text" class="form-control border-light bg-transparent" placeholder="EX: 12345" id="password">
            </div>

            <div class="d-none" id="msgDiv">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="mt-4">
                <button class="btn btn-secondary btn-outline-light col-12" onclick="adminSignFunction();">Sign In</button>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>