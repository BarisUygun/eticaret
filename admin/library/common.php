<?php
session_start();
require "DB.php";
require_once "../model/User.php";
$user_model = null;


function isLogged()
{
    if (!isset($_SESSION['user'])) {
        return false;
    } else {
        $user = user();
        if (user()->type == "user") {
            return false;
        } else {
            return true;
        }
    }
}

function user()
{

    global $user_model;

    if (isset($_SESSION['user'])) {
        if (!$user_model) {
            $user_id = $_SESSION['user'];
            $user_model = User::get($user_id);
        }
        return $user_model;
    } else {
        return false;
    }
}

function redirect($url, $section = "")
{
    header("Location: {$section}{$url}");
}