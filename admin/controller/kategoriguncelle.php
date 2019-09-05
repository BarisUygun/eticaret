<?php
include "../library/common.php";
include "../model/Kategoriler.php";

if(isLogged()){

    $kategori=Kategoriler::get($_GET['id']);
if(isset($_POST['kaydet'])) {

    $kategoriUpdate = new Kategoriler();


    if(isset($_FILES['myimage'])) {
        $pathinfo = pathinfo($_FILES['myimage']['name']);
        $name = "urunresim_".time()."_".$pathinfo['basename'];
        $target = __DIR__ . "/../../asset/images/" . $name;

        if (move_uploaded_file($_FILES['myimage']['tmp_name'], $target)) {
            $kategoriUpdate->image = $name;
        }else{
            $kategoriUpdate ->image="image/none";

        }
    }

    $kategoriUpdate->name=$_POST['name'];
    $kategoriUpdate->slug=$_POST['slug'];
    $kategoriUpdate->id=$kategori->id;
    $kategoriUpdate->update();
    redirect("/kategoriler","/admin");

}

}








include "../view/kategoriguncelle.php";