<?php


class Kategoriler
{

    public $id;
    public $name;
    public $slug;
    public $image;

    public function insert()
    {
        if ($this->validate("insert")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("INSERT INTO kategoriler(name,slug,image) VALUES (:name,:slug,:image)");
                $data = [
                    'name' => $this->name,
                    'slug' => $this->slug,
                    ":image"=>$this->image,
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
                $statement = $db->prepare("UPDATE kategoriler set name = :name, image = :image, slug = :slug WHERE id = :id");
                $data = [
                    ':name' => $this->name,
                    ':id' => $this->id,
                    ':slug'=>$this->slug,
                    ":image" => $this->image,
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
        $sql = "SELECT * FROM kategoriler ORDER BY id DESC";
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
        $sql = "SELECT * FROM kategoriler WHERE id=:id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":id" => $id
        ];
        $statement->execute($parameters);
        return $statement->fetchObject("Kategoriler");
    }

    /**
     * @param $slug
     * @return $this
     */
    public static function getBySlug($slug)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM kategoriler WHERE slug=:slug";
        $statement = $con->prepare($sql);
        $parameters = [
            ":slug" => $slug
        ];
        $statement->execute($parameters);
        return $statement->fetchObject("Kategoriler");
    }

    public static function getUrun($kategori_id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM urunler WHERE kategori_id=:kategori_id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":kategori_id" => $kategori_id
        ];
        $statement->execute($parameters);
        return $statement->fetchObject("Urunler");
    }

    public function delete()
    {
        $db=DB::getConnection();
        $query = $db->prepare("DELETE FROM kategoriler WHERE id = :id");
        $delete = $query->execute(array(
            'id' => $this->id
        ));
    }

}