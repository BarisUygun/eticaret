<?php
include "../library/common.php";
include_once "../model/Favoriler.php";
include_once "../model/Urunler.php";



$favoriler=Favoriler::get($_SESSION['user']);

if(isset($_POST['delete'])){

    $favori=new Favoriler();
    $favori->id=$_GET['id'];
    $favori->deletebyID();
    redirect("/favoriler","");
}



include "../view/favoriler.php";