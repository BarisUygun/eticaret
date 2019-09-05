<?php
include "../library/common.php";
include_once "../model/User.php";
include "../model/Urunler.php";



$liste = Urunler::getAll();

$data = $_POST;
if(!isset($_SESSION['total_price'])){
    $_SESSION['total_price']=0;
}
if (!isset($_SESSION['total_product'])){
    $_SESSION['total_product']=0;
}



include "../view/category-oyun.php";
