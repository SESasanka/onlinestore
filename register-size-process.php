<?php

include "connection.php";

$size = $_POST["size"];

if(empty($brand)){
    echo("Please enter the size");
}else{

    $rs = Database::search("SELECT * FROM  `size` WHERE `size_name`='$size'");
    $num = $rs->num_rows;

    if($num > 0){
        echo("The bradn you have entered has been already registered");
    }else{
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('$size')");
        echo("success");
    }

}