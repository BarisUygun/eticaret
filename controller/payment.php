<?php
include "../library/common.php";
include "../model/Urunler.php";
include "../model/Sepet.php";
include "../model/SepetUrun.php";

// TODO: buradan başla
if (isset($_POST["cartnumber"]) && $_POST['cartnumber'] == "1111111111111111") {
    if (count($_SESSION['carts'])) {
        $insertable = true;
        $urunler = [];
        foreach ($_SESSION['carts'] as $urun_id => $urun) {
            $myObj = json_decode($urun, true);
            $urun = Urunler::get($urun_id);
            $urunler[$urun_id] = $urun;
            if ($myObj['adet'] > $urun->stock) {
                $insertable = false;

            }
            else{
                //TODO:UPDATE STOCK
                $urun->updateStock($myObj['adet']);


            }
        }
        if($insertable) {
            $sepet = new Sepet();
            $sepet->kargo = "PTT";
            $sepet->user_id = $_SESSION['user'];
            $sepet->toplam = $_SESSION['total_price'];
            $result = $sepet->insert();
            if ($result) {
                foreach ($_SESSION['carts'] as $urun_id => $urun) {
                    $myObj = json_decode($urun, true);
                    $urun = $urunler[$urun_id];
                    $urn=Urunler::get($urun_id);
                    $sepetUrun = new SepetUrun();
                    $sepetUrun->sepet_id = $sepet->id;

                    $sepetUrun->name = $myObj['name'];
                    $sepetUrun->price = $myObj['fiyat'];
                    $sepetUrun->quantity = $myObj['adet'];

                    $sepetUrun->images=$urn->image;
                    $sepetUrun->urun_id=$urn->id;

                    $sepetUrun->insert();

                }
                unset($_SESSION['carts']);
                $_SESSION['total_price']=0;
                $_SESSION['total_product']=0;

                redirect("/siparislerim");
            } else {
                //TODO : hata mesajı ver
            }
        }else{
            //TODO : hata mesajı ver stok hatası
        }


    }

    header("Location: /checkout");
}

include "../view/payment.php";
