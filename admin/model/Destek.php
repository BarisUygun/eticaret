<?php


class Destek
{
    public static function getAll()
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM destek ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}