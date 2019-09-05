<?php
include"../library/common.php";
include_once "../model/User.php";

$username=!empty($_POST["username"]) ?$_POST["username"]: false;
$password=!empty($_POST["password"]) ?$_POST["password"]: false;
if($username && $password){
    $user = User::login($username,$password);
    if($user){
        $_SESSION['user'] = $user['id'];
        header("Location: /index");
    }else{
        $message = "kullanıcı adı yada şifre hatalı!";
    }
}

include  "../view/login.php";

?>

