<?php


class User
{
    public static function supportLogin($username, $password){
        $con = DB::getConnection();
        $sql = "SELECT * FROM user WHERE username=:username AND password=:password AND type=:type AND status=:status";
        $statement = $con->prepare($sql);
        $parameters = [
            ":username" => $username,
            ":password" => md5($username . $password),
            ":type" => "support",
            ":status" => 1
        ];
        $statement->execute($parameters);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function login($username, $password)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM user WHERE username=:username AND password=:password AND type=:type AND status=:status";
        $statement = $con->prepare($sql);
        $parameters = [
            ":username" => $username,
            ":password" => md5($username . $password),
            ":type" => "admin",
            ":status" => 1
        ];
        $statement->execute($parameters);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function get($id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM user WHERE id=:id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":id" => $id
        ];
        $statement->execute($parameters);
        return $statement->fetchObject("User");
    }

}