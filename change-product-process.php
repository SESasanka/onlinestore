<?php

include "connection.php";

$id = $_GET["id"];

$rs = Database::search("SELECT * FROM `product` WHERE `id`='$id'");
$num = $rs->num_rows;

if($num > 0){

    $row = $rs->fetch_assoc();

    $status = 0;
    if($row["status"] == 0){
        $status = 1;
    }

    Database::iud("UPDATE `product` SET `status`='$status' WHERE `id`='$id'");
    echo("success");
 
}else{
    echo("Product not found!");
}