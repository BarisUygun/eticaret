<?php

class Favoriler
{

    public $id;
    public $user_id;
    public $product_id;

    public function validate(){
        $con = DB::getConnection();
        $sql = "SELECT * FROM favorite where user_id=:user_id and product_id=:product_id order by id";
        $data = [
            ':user_id'=>$this->user_id,
            ':product_id'=>$this->product_id
        ];
        $statement = $con->prepare($sql);
        $statement->execute($data);
        $yorum= $statement->fetchAll(PDO::FETCH_ASSOC);
        if(count($yorum)>0){
            $this->delete();
            return false;

        }

        return true;
    }


    public static function getAll()
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM urunler ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert()
    {
        $db = DB::getConnection();
        if ($this->validate()) {
            try {

                $statement = $db->prepare("INSERT INTO favorite(user_id,product_id) values(:user_id,:product_id)");
                $data = [
                    ':user_id'=>$this->user_id,
                    ':product_id'=>$this->product_id
                ];
                $statement->execute($data);

                return true;
            } catch (Exception $exception) {
                return false;
            }
        }
        else{
            return false;

        }
    }

    public static function get($id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM favorite WHERE user_id=:user_id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":user_id" => $id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public  function delete()
    {
        $db=DB::getConnection();
        $query = $db->prepare("DELETE FROM favorite WHERE product_id=:product_id and user_id=:user_id");
        $parameters = [
            ':product_id' => $this->product_id,
            ':user_id'=>$this->user_id,

        ];
        $query->execute($parameters);
    }

    public  function deletebyID()
    {
        $db=DB::getConnection();
        $query = $db->prepare("DELETE FROM favorite WHERE id=:id");
        $parameters = [
            ':id' => $this->id,

        ];
        $query->execute($parameters);
    }

}