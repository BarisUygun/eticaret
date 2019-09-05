<?php
include "../library/common.php";
include "../model/Kategoriler.php";

if(!isLogged()){
    redirect("/giris","/admin");
}

$kategori = Kategoriler::get($_GET['id']);
$kategori->delete();

redirect("/kategoriler","/admin");

