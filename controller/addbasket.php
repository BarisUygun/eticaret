<?php
include "../library/common.php";
include "../model/Urunler.php";

$urun = Urunler::get($_GET['id']);
$data = $_POST;

if(!isset($_SESSION['total_price'])){
    $_SESSION['total_price']=0;
}
if (!isset($_SESSION['total_product'])){
    $_SESSION['total_product']=0;
}


if ($data['quantity'] <= $urun->stock && $data['quantity'] > 0) {
    if (isset($_SESSION['carts'][$urun->id])) {
        $myObj = json_decode($_SESSION['carts'][$urun->id], true);
        $myObj['adet'] += $data['quantity'];
        $myObj['fiyat'] = $myObj['adet'] * $urun->price;
        $myObj['id'] = $urun->id;
        $myObj['image']=$urun->image;
        $myObj['name']=$urun->name;

        $_SESSION["total_price"]+=$urun->price*$data['quantity'];
        $_SESSION['total_product']+=$data['quantity'];
    } else {
        $myObj['image']=$urun->image;
        $myObj['name']=$urun->name;

        $myObj['name'] = $urun->name;
        $myObj['adet'] = $data['quantity'];
        $myObj['fiyat'] = $myObj['adet'] * $urun->price;
        $myObj['id'] = $urun->id;
        $_SESSION["total_price"]+=$urun->price;
        $_SESSION['total_product']+=$data['quantity'];
    }
    $_SESSION['carts'][$urun->id] = json_encode($myObj);
    $response = ["status"=>1,"total_product"=>$_SESSION['total_product'],"total_price"=>$_SESSION['total_price'],"message"=>"Stok Eklenmiştir","html"=>'<a href="/cart">Cart - <span class="cart-amunt">'.$_SESSION['total_price'].' &#8378    </span> <i class="fa fa-shopping-cart"></i> <span class="product-count">

                            '.$_SESSION['total_product'].'
                        </span></a>'];

} else{
    $response = ["status"=>-1,"message"=>"Stok Geçersiz"];
}

echo json_encode($response);