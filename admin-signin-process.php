<?php
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo "Enter your emial address";
} else if (empty($password)) {
    echo "Enter your password";
} else {

    require "connection.php";
    $result  = Database::search("SELECT * FROM `users` WHERE `email`='" . $email . "' AND `password`='" . $password . "'
     AND `user_type_id`='1'");
    $num_of_rows  = $result->num_rows;

    if($num_of_rows == 1){ //True
        $data = $result->fetch_assoc();
        $_SESSION["admin"] = $data;
        echo "success";
    }else{ //False
        echo "Invalid Email or Password";
    }

}
