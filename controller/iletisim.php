<?php
include "../library/common.php";
include "../model/Destek.php";
$data=$_POST;
$db=DB::getConnection();

if(isset($_POST['send'])){
    $destek = new Destek();
    $destek->mesaj=$data['mesaj'];
    $destek->konu=$data['konu'];
    $destek->telefon=$data['telefon'];
    $destek->email=$data['email'];
    $destek->isimsoyisim=$data['isimsoyisim'];
    $destek->insert();



}



include "../view/iletisim.php";

