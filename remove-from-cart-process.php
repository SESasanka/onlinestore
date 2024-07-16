<?php

$cartId = $_GET["id"];

if(empty($cartId)){
    echo "Invalid Request";
}else{

    Database::search("SELECT * FROM `cart` WHERE `id`='$cartId'");
    $num = $rs->num_rows;

    if($num > 0){
        Database::iud("DELETE FROM `cart` WHERE `id`='$cartId'");
        echo "success";
    }else{
        echo "Cart item not found";
    }

}