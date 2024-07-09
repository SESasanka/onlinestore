<?php 

include "connection.php";
session_start();

if(isset($_SESSION["user"])){

    $uid = $_SESSION["user"]["id"];

    $rs = Database::search("SELECT * FROM `users` WHERE `id`='$uid'");
    if($rs->num_rows >0){
        $u = $rs->fetch_assoc();

        if(isset($u["profile"]) && !empty($u["profile"])){
            unlink($u["profile"]);
        }

        $imgPath = "assets/profile/" + uniqid() . "_" . $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tem_name"], $imgPath);

        Database::iud("UPDATE `users` SET `profile`='$imgPath' WHERE `id `='$uid'");
        echo("success");

    }else{
        echo("User not found");
    }

}else{
    echo("Please Login First");
    exit();
}

?>