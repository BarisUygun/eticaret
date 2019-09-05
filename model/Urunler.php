<?php

class Urunler
{

    public $id;
    public $name;
    public $stock;
    public $image;
    public $description;
    public $price;
    public $kategori;

    public static function getBySlug($slug)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM urunler WHERE slug=:slug";
        $statement = $con->prepare($sql);
        $parameters = [
            ":slug" => $slug
        ];
        $statement->execute($parameters);
        return $statement->fetchObject("Urunler");
    }

    public function updateStock($obj)
    {
        if ($this->validate("update")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("UPDATE urunler set name = :name, stock = :stock, image = :image, description= :description,price= :price , kategori_id=:kategori_id WHERE id = :id");
                $data = [
                    ':name' => $this->name,
                    ':stock' => $this->stock-$obj,
                    ':description' => $this->description,
                    ':id' => $this->id,
                    ":price"=>$this->price,
                    ":image"=>$this->image,
                    ":kategori_id"=>$this->kategori_id,
                ];
                $statement->execute($data);
                return true;
            } catch (Exception $exception) {
                return false;
            }
        } else {
            return false;
        }
    }
    public function validate(){
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
    public static function getAllbyCategory($category_id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM urunler WHERE kategori_id=:kategori_id ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $parameters = [
            ":kategori_id" => $category_id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * @param $id
     * @return Urunler
     */

    public static function get($id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM urunler WHERE id=:id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":id" => $id
        ];
        $statement->execute($parameters);
        return $statement->fetchObject("Urunler");
    }



}