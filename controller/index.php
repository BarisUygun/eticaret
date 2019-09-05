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


if (isset($data['button'])) {
    $urun = Urunler::get($_GET['id']);
    if ($urun->stock>0) {
        if (isset($_SESSION['carts'][$urun->id])) {
            $myObj = json_decode($_SESSION['carts'][$urun->id], true);
            $myObj['adet'] += 1;
            $myObj['fiyat'] = $myObj['adet'] * $urun->price;
            $myObj['id'] = $urun->id;
            $myObj['image']=$urun->image;
            $myObj['name']=$urun->name;
            $_SESSION["total_price"]+=$urun->price;
            $_SESSION['total_product']+=1;
        } else {
            $myObj['name']=$urun->name;

           $myObj['image']=$urun->image;
            $myObj['name'] = $urun->name;
            $myObj['adet'] = 1;
            $myObj['fiyat'] = $myObj['adet'] * $urun->price;
            $myObj['id'] = $urun->id;
            $_SESSION["total_price"]+=$urun->price;
            $_SESSION['total_product']+=1;
        }
        $_SESSION['carts'][$urun->id] = json_encode($myObj);
    }
    else{
        //TODO: HATA MESAJI YAPILACAK
    }
}

include "../view/index.php";
