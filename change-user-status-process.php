<?php

include "connection.php";

$id = $_GET["id"];
$status = $_GET["s"];

$s = ($status == "0") ? "1" : "0";

$rs = Database::search("SELECT * FROM `users` WHERE `id`='$id' AND `status`='$s'");
$num = $rs->num_rows;

if($num > 0){

    Database::iud("UPDATE `users` SET `status`='$status' WHERE `id`='$id'");
    echo("success");

}else{
    echo("User not found!");
}


