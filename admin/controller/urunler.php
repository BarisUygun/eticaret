<?php
include "../library/common.php";
include "../model/Urunler.php";
if(!isLogged()){
    redirect("/giris","/admin");
}


$liste = Urunler::getAll();
include "../view/urunler.php";