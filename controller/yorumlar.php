<?php
include "../library/common.php";
include "../model/Yorumlar.php";
include_once "../model/Urunler.php";

$yorumlar=Yorumlar::getByKullanici($_SESSION['user']);



include "../view/yorumlar.php";