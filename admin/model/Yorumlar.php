<?php


class Yorumlar
{
    public $username;
    public $context;
    public $review;
    public $user_id;
    public $product_id;
    public $approved;
    public $id;


    public function insert()
    {
        if ($this->validate("insert")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("INSERT INTO yorumlar(context,review,user_id,product_id,approved,username) VALUES (:context,:review,:user_id,:product_id,:approved,:username)");
                $data = [
                    ':context' => $this->context,
                    ':review' => $this->review,
                    ":user_id" => $this->user_id,
                    ':product_id' => $this->product_id,
                    ":approved" => $this->approved,
                    ":username" => $this->username
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

    public function updateApproved($id,$apprv)
    {
        if ($this->validate("update")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("UPDATE yorumlar set approved = :approved WHERE id = :id");
                $data = [
                    ':approved' => $apprv,
                    ':id' => $id,
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

    public static function getAllBekleyenler()
    {
        return self::getOnay("onaysiz");
    }

    public static function getAllOnaylilar()
    {
        return self::getOnay("onayli");
    }


    public static function getOnay($onayli_mi)
    {
        if ($onayli_mi == "onayli") {
            $con = DB::getConnection();
            $sql = "SELECT * FROM yorumlar WHERE approved=:approved ORDER BY id DESC";
            $statement = $con->prepare($sql);
            $parameters = [
                ":approved" => 1,
            ];
            $statement->execute($parameters);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else if ($onayli_mi == "onaysiz") {
            $con = DB::getConnection();
            $sql = "SELECT * FROM yorumlar WHERE approved=:approved ORDER BY id DESC";
            $statement = $con->prepare($sql);
            $parameters = [

                ":approved" => 0,

            ];
            $statement->execute($parameters);
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        }

    }

    /**
     * @param $id
     * @return $this
     */
    public static function get($urun_id)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM yorumlar WHERE id=:id ORDER BY id DESC";
        $statement = $con->prepare($sql);
        $parameters = [
            ":id" => $urun_id
        ];
        $statement->execute($parameters);
        return $statement->fetchObject('Yorumlar');
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

    public function approved()
    {
        $db = DB::getConnection();
        $statement = $db->prepare("UPDATE yorumlar set approved = :approved,responsible_id=:responsible_id WHERE id = :id");
        $data = [
            ':responsible_id'=>$_SESSION['user'],
            ':approved' => 1,
            ':id' => $this->id,
        ];
        $statement->execute($data);
        return true;
    }
    public function unapproved()
    {
        $db = DB::getConnection();
        $statement = $db->prepare("UPDATE yorumlar set approved = :approved WHERE id = :id");
        $data = [
            ':approved' => 0,
            ':id' => $this->id,
        ];
        $statement->execute($data);
        return true;
    }

}