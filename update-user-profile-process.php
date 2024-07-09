<?php


include "connection.php";
session_start();

if(isset($_SESSION["user"])){

    $uid = $_SESSION["user"]["id"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $no = $_POST["no"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $city = $_POST["city"];
    $pcode = $_POST["pcode"];

    //Validation add

    //Update user data

    Database::iud("UPDATE `users` SET `fname`='$fname',`lname`='$lname',`mobile`='$mobile' WHERE `id`='$uid'");

    $rs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$uid'");
    $num = $rs->num_rows;

    if($num > 0){
        Database::iud("UPDATE `usre_address` SET `no`='$no', `line1`='$line1', `line2`='$line2',`city`='$city',`pcode`='$pcode'");
    }else{
        Database::iud("INSERT INTO `user_address` VALUES('$uid','$no','$line1','$line2','$city','$pcode')");
    }

    echo("success");

}else{
    echo("Please login first");
}