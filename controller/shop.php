<?php
include"../library/common.php";
include_once "../model/User.php";
include "../model/Urunler.php";



$liste = Urunler::getAll();



include  "../view/shop.php";

?>

