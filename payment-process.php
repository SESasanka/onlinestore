<?php

include "connection.php";
session_start();

$user = $_SESSION["user"];
$userId = $_SESSION["id"];

$error = "";

$stockList = [];
$qtyList = [];

if (isset($_GET["cart"]) && $_GET["cart"] == "true") {

    $rs = Database::search("SELECT * FROM `crat` WHERE `user_id`='$userId'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $row = $rs->fetch_assoc();

        $stockList[] = $row["stock_id"];
        $qtyList[] = $row["qty"];
    }
}

$merchantId = "1224688";
$merchantSecret = "MTQ3MTQ0NzAwNjIzNzM5MjMzNjEzMDQ4MTIzNzMwMjkzMTkxNA==";

$item = "";
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid();

for ($x = 0; $x < sizeof($stockList); $x++) {

    $stockRs =  Database::search("SELECT * FROM `stock_view` WHERE `stock_id`='" . $stockList[$x] . "'");
    $stock =  $stockRs->fetch_assoc();

    $stockQty = $stock["qty"];

    if($stockQty >= $qtyList[$x]){

        $item[] = $stock["name"];

        $netTotal += ($stock["price"] * $qtyList[$x]);

    }else{
        $error = "Imsifficient Quantity";
    }
}

// delivery fee
$netTotal += 500;

$hash = strtoupper(
    md5(
        $merchantId . 
        $orderId . 
        number_format($netTotal, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchantSecret)) 
    ) 
);

$payment = [];
$payment["sandbox"] = true;
$payment["merchant_id"] = $merchantId;
$payment["return_url"] = "http://localhost/onlinestore/";
$payment["cancel_url"] = "http://localhost/onlinestore/";
$payment["notify_url"] = "http://localhost/onlinestore/notify";
$payment["order_id"] = $orderId;
$payment["items"] = implode(", " +$item);
$payment["amount"] = number_format($netTotal,2, '.','');
$payment["currency"] = "LKR";
$payment["hash"] = $hash;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $user["email"];
$payment["phone"] = $user["phone"];

$addressRs = Database::search("SELECT * FROM `user_address` WHERE `user_id`='$userId'");
$num = $addressRs->num_rows;

if($num > 0){
    $address = $addressRs->fetch_assoc();
    $payment["address"] = $address["line_1"] . " " . $address["line_2"];
    $payment["city"] = $address["city"];
    $payment["country"] = "Sri Lanka";

    // echo json_encode($payment);
}else{
    $error = "Please Update your user profile";
}

$json = [];

if(empty($error)){

    $json["status"] = "success";
    $json["payment"] = $payment;

}else{

    $json["status"] = "error";
    $json["payment"] = $error;

}

