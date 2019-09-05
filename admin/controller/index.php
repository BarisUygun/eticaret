<?php
include "../library/common.php";

if(!isLogged()){
    redirect("/giris","/admin");
}

include "../view/index.php";