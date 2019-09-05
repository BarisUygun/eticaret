<?php


class Urunler
{

    public $id;
    public $name;
    public $stock;
    public $image;
    public $description;
    public $price;
    public $kategori_id;

    public function insert()
    {
        if ($this->validate("insert")) {
            try {

                $db = DB::getConnection();
                $statement = $db->prepare("INSERT INTO urunler(name,stock,image,description,price,kategori_id,slug) VALUES (:name,:stock,:image,:description,:price,:kategori_id,:slug)");
                $data = [
                    'name' => $this->name,
                    'stock' => $this->stock,
                     'price'=>$this->price,
                    'description' => $this->description,
                    ":image"=>$this->image,
                    ":kategori_id"=>$this->kategori_id,
                    ":slug"=>strtolower(preg_replace('/\s+/', '',($this->kategori_id.$this->name.$this->description)))
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

    public function update()
    {
        if ($this->validate("update")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("UPDATE urunler set name = :name, stock = :stock, image = :image, description= :description,price= :price , kategori_id=:kategori_id WHERE id = :id");
                $data = [
                    ':name' => $this->name,
                    ':stock' => $this->stock,
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



    public function validate($scenerio = "insert")
    {
        if ($scenerio == "insert") {
            return true;

        } elseif ($scenerio == "update") {
            if ($this->name == "") {
                return false;
            }
            return true;
        }

    }

    public static function getAll()
    {
        $con = DB::getConnection();
        $sql = "SELECT urunler.*,kategoriler.name AS kategori_name FROM urunler LEFT OUTER JOIN kategoriler ON kategoriler.id=urunler.kategori_id ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return $this
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

    public function delete()
    {
        $db=DB::getConnection();
        $query = $db->prepare("DELETE FROM urunler WHERE id = :id");
        $delete = $query->execute(array(
            'id' => $this->id
        ));
    }

}