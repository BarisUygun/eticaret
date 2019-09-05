<?php
include "../library/common.php";
include "../model/Yorumlar.php";

if(!isLogged())
    redirect("/giris","/admin");
//TODO: .htaccess bakınız!

switch ($_GET['action']){
    case "onaykaldir":
        $x=Yorumlar::get($_GET['id']);
        $x->unapproved();
        redirect("/admin/yorumlar/onaylilar");
        break;

    case "onayla":
        $x=Yorumlar::get($_GET['id']);
        $x->approved();
        redirect("/admin/yorumlar/bekleyenler");
        break;
    case "bekleyenler":
        $yorumlar = Yorumlar::getAllBekleyenler();
        include "../view/onayla.php";
        break;
    case "onaylilar":
        $yorumlar = Yorumlar::getAllOnaylilar();
        include "../view/onayla.php";
        break;
    default:
        $yorumlar = Yorumlar::getAll();
        include "../view/yorumlar.php";
        break;
}


