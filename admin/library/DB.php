<?php


class DB
{
    private static $db;
    public static function getConnection(){
        try {
            if(!self::$db){
                self::$db = new PDO("mysql:host=localhost;dbname=eticaret", "root", "");
            }

        } catch ( PDOException $e ){
            print $e->getMessage();
        }
        return self::$db;
    }
}