<?php
include "../library/common.php";
include_once "../model/User.php";

$user = User::get($_SESSION['user']);
$data = $_POST;
if(isset($_POST['sifre'])){

    if(md5($user['username'].$_POST['eskisifre'])==$user['password']){

        if($_POST['yenisifre']==$_POST['yenisifretekrar']){
            $user['password']=md5($user['username'].$_POST['yenisifre']);
            $db = DB::getConnection();
            $statement = $db->prepare("UPDATE user set password=:password where id=:id");
            $data = [
                ":id"=>$user['id'],
                ":password"=>$user['password'],
            ];
            $statement->execute($data);
        }

    }

}

if (isset($_POST['submit-image'])) {

    if (isset($_FILES['changeimage'])) {

        $pathinfo = pathinfo($_FILES['changeimage']['name']);
        $name = "useresim_" . time() . "_" . $pathinfo['basename'];
        $target = __DIR__ . "/../asset/images/" . $name;

        if (move_uploaded_file($_FILES['changeimage']['tmp_name'], $target)) {
            $user['image'] = $name;

        } else {
            $user['image']= "image/none";
        }

        $db = DB::getConnection();
        $statement = $db->prepare("UPDATE user set image=:image where id=:id");
        $data = [
            ":id"=>$user['id'],
            ":image"=>$user['image'],
        ];
        $statement->execute($data);

    }

}
include "../view/profile.php";