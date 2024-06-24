<?php

include "connection.php";

$id = $_GET["id"];

if(!empty($id)){
    $rs = Database::search("SELECT * FROM `product` WHERE `id`='$id'");
    $num = $rs->num_rows;

    if($num > 0){
        $row = $rs->fetch_assoc();
        echo(json_encode($row));
    }

}