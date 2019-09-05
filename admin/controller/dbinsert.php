<?php
include "../library/common.php";

if (isLogged()) {
    $sql = new PDO("mysql:host=localhost;dbname=eticaret", "root", "");
    $sql->exec("INSERT INTO urunler(Pname,stock,image,description) VALUES ('adasds','232','sdads','dadsadads')");

}
include "../view/urunekle.php";

/*
include "../library/common.php";
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="eticaret";

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);




$sql = "INSERT INTO urunler(Pname,stock,image,description)
values ('osman','23232','dasdasdasd','asdsakodd');";
mysqli_query($conn, $sql);





include "../view/urunekle.php";




$sql=new PDO("mysql:host=localhost;dbname=eticaret", "root", "");
$sql.exec("INSERT INTO urunler(Pname,stock,image,description) VALUES ('adasds','232','sdads','dadsadads')");



$query = $db->prepare("INSERT INTO urunler SET
Pname = ?,
stock = ?,
image = ?,
description=?");
$insert = $query->execute(array(
    "Tayfun Erbilen", "12", "oafokskffakfk","asofsakaskoafkaokfaksfok"
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "insert işlemi başarılı!";
}
*/

?>
