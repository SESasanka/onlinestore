<?php

$cartId = $_GET["id"];
$qty = $_GET["qty"];

if(empty($cartId)){
    echo "Invalid Request";
}else if($qty < 1){
    echo "Invalid quntity";
}else{

    $cartRs = Database::search("SELECT * FROM `cart` WHERE `id`='$cartId'");
    $cartnum = $cartRs->num_rows;

    if($cartnum > 0){
        $cartRow = $cartRs->fetch_assoc();
        $stockId = $cartRow["stock_id"];

        $stockRs = Database::search("SELECT * FROM `stock_view` WHERE `stock_id`='$stockId'");
        $stock = $stockRs->fetch_assoc();

        if($stock["qty"] >= $qty){
            Database::iud("UPDATE `cart` SET `qty`='$qty' WHERE `id`='$cartId'");
        }else{
            echo "Quntity Exceeded";
        }
    }else{
        echo "Cart itm not found";
    }
}