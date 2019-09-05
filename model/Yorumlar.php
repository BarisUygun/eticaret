<?php


class Yorumlar
{
    public $username;
    public $context;
    public $review;
    public $user_id;
    public $product_id;
    public $approved;
    public $rating;

    public function insert()
    {
        if ($this->validate("insert")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("INSERT INTO yorumlar(context,review,user_id,product_id,approved,username,rating) VALUES (:context,:review,:user_id,:product_id,:approved,:username,:rating)");
                $data = [
                    ':context' => $this->context,
                    ':review' => $this->review,
                    ":user_id" => $this->user_id,
                    ':product_id' => $this->product_id,
                    ":approved" => $this->approved,
                    ":username" => $this->username,
                    ":rating" => $this->rating
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
                    ':slug' => $this->slug,
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

    public static function getKullanici($urun_id, $user_id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM yorumlar WHERE product_id=:product_id and user_id=:user_id ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $parameters = [
            ":product_id" => $urun_id,
            ":user_id" => $user_id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getByKullanici($user_id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM yorumlar WHERE user_id=:user_id ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $parameters = [
            ":user_id" => $user_id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function validate($scenerio = "insert")
    {
        if ($this->rating == 0 || $this->review == "" || $this->context == "") {
            return false;
        }

        $yorumlar = Yorumlar::getKullanici($this->product_id, $this->user_id);
        if(count($yorumlar)>0){
            //TODO:HATA MESAJI DA AT
            return false;
        }



        if ($scenerio == "insert") {
            return true;

        } elseif ($scenerio == "update") {
            return true;
        }

    }

    public static function getAll()
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM yorumlar ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return $this
     */
    public static function get($urun_id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM yorumlar WHERE product_id=:product_id ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $parameters = [
            ":product_id" => $urun_id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
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
        $db = DB::getConnection();
        $query = $db->prepare("DELETE FROM kategoriler WHERE id = :id");
        $delete = $query->execute(array(
            'id' => $this->id
        ));
    }

}