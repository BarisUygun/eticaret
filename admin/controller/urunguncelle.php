<?php
include "../library/common.php";
include "../model/Urunler.php";
include "../model/Kategoriler.php";
if(!isLogged()){
    redirect("/giris","/admin");
}
user();
$urun = Urunler::get($_GET['id']);

$message = "";

if(count($_POST)){
    $data = $_POST;
    if(isset($_FILES['myimage'])) {
        $pathinfo = pathinfo($_FILES['myimage']['name']);
        $name = "urunresim_".time()."_".$pathinfo['basename'];
        $target = __DIR__ . "/../../asset/images/" . $name;

        if (move_uploaded_file($_FILES['myimage']['tmp_name'], $target)) {
            $urun->image = $name;
        }else{
            $urun->image="image/none";
        }
    }

    $urun->name = $_POST['name'];
    $urun->stock = $_POST['stock'];
    $urun->description = $_POST['description'];
    $urun->price=$_POST['price'];
    $urun->kategori_id=$_POST['kategori_id'];
    if($urun->update()){
        redirect("/urunler","/admin");
    }else{
        $message = "Bir hata oluştu. Lütfen kontrol ediniz";
    }

}
$kategoriler = Kategoriler::getAll();

include "../view/urunguncelle.php";