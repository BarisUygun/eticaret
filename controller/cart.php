<?php
include "../library/common.php";
include_once "../library/DB.php";

if(isset($_POST['delete'])) {
    if (isset($_SESSION['carts'][$_GET['id']])) {
        $myObj = json_decode($_SESSION['carts'][$_GET['id']], true);

        $_SESSION["total_price"]-=$myObj['fiyat'];
        $_SESSION['total_product']-=$myObj['adet'];
        unset($_SESSION['carts'][$_GET['id']]);

    }
}
include "../view/cart.php";

