<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center vh-100">

            <!-- SignIn Box -->
            <div class="col-10 col-lg-4 d-none" id="signinbox">
                <div class="row card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="text-center fw-bold">Sign In</h2>
                        </div>

                        <?php
                        $email = "";
                        $password = "";

                        if(isset($_COOKIE["email"])){
                            $email = $_COOKIE["email"];
                        }
                        if(isset($_COOKIE["password"])){
                            $password = $_COOKIE["password"];
                        }

                        ?>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Email Address</label>
                            <input class="form-control" type="email" id="em" value="<?php echo($email); ?>"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password"  id="pw" value="<?php echo($password); ?>"/>
                        </div>
                        <div class="form-check col-12 mb-3">
                            <input id="rmb" class="form-check-input" type="checkbox" <?php if(isset($_COOKIE["email"])) {echo("checked"); }  ?> >
                            <label  class="form-check-label" for="">Remember Me</label>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-secondary" onclick="signin();">Sign In</button>
                        </div>
                        <div class="text-center">
                            <a href="" class="link-secondary text-decoration-none">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a  class="link-secondary text-decoration-none" onclick="changeView();">New to Online Store? Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SignIn Box -->

            <!-- SignUp Box -->
            <div class="col-10 col-lg-4" id="signupbox">
                <div class="row card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="text-center fw-bold">Sign Up</h2>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="">First Name</label>
                                <input class="form-control" type="text" id="fname"/>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="">Last Name</label>
                                <input class="form-control" type="text"  id="lname"/>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Mobile</label>
                            <input class="form-control" type="text" id="mobile"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Email Address</label>
                            <input class="form-control" type="email" id="email"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" id="password"/>
                        </div>

                        <div id="errorMsgDiv2" class="d-none">
                            <div class="alert alert-danger" id="errorMsg2"></div>
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button class="btn btn-secondary" onclick="signup();">Sign Up</button>
                        </div>
                        <div class="text-center">
                            <a  class="link-secondary text-decoration-none" onclick="changeView();">Already have an account? Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SignUp Box -->
        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>