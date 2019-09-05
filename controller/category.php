<?php
include "../library/common.php";
require_once "../model/Urunler.php";
require_once "../model/Kategoriler.php";


$kategori = Kategoriler::getBySlug($_GET['slug']);
$liste=Urunler::getAllbyCategory($kategori->id);



include "../view/category.php";
