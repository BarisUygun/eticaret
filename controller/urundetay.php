<?php
include "../library/common.php";
require_once "../model/Urunler.php";
require_once "../model/Yorumlar.php";
require_once "../model/User.php";
require_once "../model/Favoriler.php";

$toplam_yildiz=0;
$toplam_yorum=0;
$ortalama=0;


$urun = Urunler::getBySlug($_GET['slug']);
$data = $_POST;


$yorumlar=Yorumlar::get($urun->id);

foreach($yorumlar as $yorum) {
    if($yorum['approved']==1) {
        $toplam_yorum++;
        $toplam_yildiz += $yorum['rating'];

    }

}
if($toplam_yorum!=0){
    $ortalama=round($toplam_yildiz/$toplam_yorum);

}
else{
    $ortalama=0;
}

$yorum=new Yorumlar();
$yorum->rating=0;

if(isset($_POST['rating'])){

    $yorum->rating=$_POST['rating'];
}
if(isset($_POST['favorite'])){
    $favoriler=new Favoriler();
    $favoriler->product_id=$urun->id;
    $favoriler->user_id=$_SESSION['user'];
    $favoriler->insert();

}

if(!isset($_SESSION['total_price'])){
    $_SESSION['total_price']=0;
}
if (!isset($_SESSION['total_product'])){
    $_SESSION['total_product']=0;
}


if(isset($_POST['btnyorum'])){
    $user=User::get($_SESSION['user']);

    $yorum->username=$user['username'];
    $yorum->approved=0;
    $yorum->product_id=$urun->id;
    $yorum->review=$_POST['yorum'];
    $yorum->context=$_POST['baslik'];
    $yorum->user_id=$_SESSION['user'];
    $yorum->insert();
    redirect("/urundetay/".$urun->slug,"");
}

include "../view/detay.php";
