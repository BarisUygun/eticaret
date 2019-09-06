<?php
include "../library/common.php";
include_once "../model/Urunler.php";

$search_parameter=$_GET['id'];

$liste=Urunler::searchProduct($search_parameter);

if(count($liste)){
    include "../view/search.php";

}
else{
    $message="Sonuç bulunamadı Ana Sayfa'ya yönlendiriliyorsunuz";
    echo "<script type='text/javascript'>alert(\"$message\");
     window.location.replace(\"/\");

</script>";

    //redirect("/","");

}
