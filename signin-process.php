<?php

include "connection.php";

session_start();

$email = $_POST["em"];
$password = $_POST["pw"];

if(empty($email)){
    echo("Please enter your email address");
}elseif(empty($password)){
    echo("Please enter your password");
}else{

    $rs = Database::search("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
    $num = $rs->num_rows;

    if($num > 0){

        $row = $rs->fetch_assoc();

        if($row["status"] == 1){

            $_SESSION["user"] = $row;

            if($_POST["rmb"] == "true"){
                setcookie("email",$email,time() + (60 * 60 * 24 *7));
                setcookie("password",$password,time() + (60 * 60 * 24 * 7));
            }else{
                setcookie("email","",-1);
                setcookie("password","",-1);
            }

            echo("success");

        }else{
            echo("User has been blocked");
        }

    }else{
        echo("Invalid email or password");
    }

}