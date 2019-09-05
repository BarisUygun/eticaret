<?php
include "../library/common.php";
require_once "../model/Sepet.php";
require_once "../model/SepetUrun.php";

$liste = Sepet::getAllByUser($_SESSION['user']);


include "../view/siparislerim.php";