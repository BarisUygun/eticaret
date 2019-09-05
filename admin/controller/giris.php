<?php
include "../library/common.php";
if(isLogged()){
    redirect("/","/admin");
}
$username=!empty($_POST["username"]) ?$_POST["username"]: false;
$password=!empty($_POST["password"]) ?$_POST["password"]: false;
if($username && $password){
    $user = User::login($username,$password);
    $support=User::supportLogin($username,$password);
    if($user['type']=="admin"){
        $_SESSION['user'] = $user['id'];
        redirect("/","/admin");
    }else if($support['type']=="support"){

        $_SESSION['user'] = $support['id'];
        $_SESSION['type']=$support['type'];

        redirect("/destek","/admin");
    }
}

include "../view/giris.php";