<?php
session_start();
require "DB.php";
require_once "Model.php";
require_once "../model/User.php";
include_once "../model/Kategoriler.php";

function isLogged(){
    if(!isset($_SESSION['user'])){
        return false;
    }else{
        return true;
    }
}

function user(){
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user'];
        return User::get($user_id);
    }else{
        return false;
    }
}

/**
 * @param string $url
 * @param string $section
 */
function redirect(string $url, $section = ""){
    header("Location: {$section}{$url}");
    exit();
}