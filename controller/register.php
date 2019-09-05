<?php
include "../library/common.php";
include_once "../model/User.php";

$user = new User();
$data = $_POST;


    if(isset($_POST['button'])){

        if(isset($_FILES['myimage'])) {
            $pathinfo = pathinfo($_FILES['myimage']['name']);
            $name = "useresim_".time()."_".$pathinfo['basename'];
            $target = __DIR__ . "/../asset/images/" . $name;

            if (move_uploaded_file($_FILES['myimage']['tmp_name'], $target)) {
                $user->image = $name;

            }else{
                $user->image="image/none";
            }
        }

        $user->setAttribute($_POST);
        if($user->insert()){
            header("Location: /login");

        }
        else{
           //TODO:HATA MESAJI
        }
    }

include "../view/register.php";