<?php

include "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($fname)) {
    echo ("Please enter your first name");
} elseif (strlen($fname) > 20) {
    echo ("Your first name should be less than 20 characters");
} elseif (empty($lname)) {
    echo ("Please enter your last name");
} elseif (strlen($lname) > 20) {
    echo ("Your last name should be less than 20 characters");
} elseif (empty($mobile)) {
    echo ("Please enter your mobile number");
} elseif (strlen($mobile) != 10) {
    echo ("Youer mobile number must contain 10 characters");
} elseif (!preg_match("/07[0,1,2,4,6,7,8,][0-9]/", $mobile)) {
    echo ("Invalid mobile number");
} elseif (empty($email)) {
    echo ("Please enter your email address");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email address");
} elseif (empty($password)) {
    echo ("Please enter your password");
} elseif (strlen($password) <= 3 || strlen($password) > 20) {
    echo ("Your password should contain 3 to 20 characters");
} else {

    $rs =  Database::search("SELECT * FROM `users` WHERE `email` = '" . $email . "' OR `mobile` = '" . $mobile . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Usre has been already registered with the given email.");
    } else {

        Database::iud("INSERT INTO `users`(`fname`,`lname`,`mobile`,`email`,`password`,`user_type_id`)VALUES('$fname','$lname','$mobile','$email','$password','2')");
        echo ("success");
    }
}
