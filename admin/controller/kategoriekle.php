<?php
include "../library/common.php";
include "../model/Kategoriler.php";
if (!isLogged()) {
    redirect("/giris", "/admin");
}

$message = "";
if (count($_POST)) {
    $kategori = new Kategoriler();

    $data = $_POST;
    if (isset($_FILES['myimage'])) {
        $pathinfo = pathinfo($_FILES['myimage']['name']);
        $name = "kategoriresim_" . time() . "_" . $pathinfo['basename'];
        $target = __DIR__ . "/../../asset/images/" . $name;

        if (move_uploaded_file($_FILES['myimage']['tmp_name'], $target)) {
            $kategori->image = $name;

        } else {
            $kategori->image = "image/none";
        }
    }
    $kategori->name = $_POST['name'];
    $kategori->slug = $_POST['slug'];
    if ($kategori->insert()) {
        redirect("/kategoriler", "/admin");
    } else {
        $message = "Bir hata oluştu. Lütfen kontrol ediniz";
    }

}
include "../view/kategoriekle.php";