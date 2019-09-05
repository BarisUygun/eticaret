<?php
include "../library/common.php";
include "../model/Urunler.php";

if(!isLogged()){
    redirect("/giris","/admin");
}

$urun = Urunler::get($_GET['id']);

$data = $_POST;

include "../view/detay.php";
