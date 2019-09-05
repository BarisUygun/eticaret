<?php
include "../library/common.php";
include "../model/Kategoriler.php";

if(!isLogged()){
    redirect("/giris","/admin");
}

$kategoriler = Kategoriler::getAll();

include "../view/kategoriler.php";
