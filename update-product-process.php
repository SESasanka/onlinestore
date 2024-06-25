<?php

include "connection.php";

$id = $_POST["id"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$category = $_POST["cat"];
$brand = $_POST["brand"];
$color = $_POST["color"];
$size = $_POST["size"];

if (empty($name)) {
    echo ("Please enter the product name");
} else if (empty($desc)) {
    echo ("Please enter the  product description");
} else {

    $rs = Database::search("SELECT * FROM `product` WHERE `id` !='$id' AND (`name` = '$name' AND `brand_brand_id`='$brand'
    AND `color_color_id`='$color' AND `size_size_id`='$size' AND `category_cat_id`='$category')");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("The product you are going to update is already in the list");
    } else {
        $rs2 = Database::search("SELECT * FROM  `product` WHERE `id`='$id'");
        $data = $rs2->fetch_assoc();

        $imgPath = $data["img"];
        if (!empty($_FILES["img"])) {
            unlink($data["img"]);
            $imgPath = "assets/products/" . uniqid() . $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tep_name"], $imgPath);
        }

        Database::iud("UPDATE `product` SET `name`='$name',`description`='$desc',`img`='$imgPath',
        `brand_brand_id`='$brand',`color_color_id`='$color',`size_size_id`='$size',`category_cat_id`='$category' WHERE `id`='$id'");

        echo ("success");
    }
}
