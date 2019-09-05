<?php


class Sepet extends Model
{
    public $id;
    public $toplam;
    public $kargo;
    public $user_id;


    public function insert()
    {
        $db = DB::getConnection();
        if ($this->validate()) {
            try {

                $statement = $db->prepare("INSERT INTO siparislerim(toplam,kargo,user_id) values(:toplam,:kargo,:user_id)");
                $data = [
                    ':toplam' => $this->toplam,
                    ':kargo' => $this->kargo,
                    ':user_id' => $this->user_id
                ];
                $statement->execute($data);
                $this->id = $db->lastInsertId();

                return true;
            } catch (Exception $exception) {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getAllByUser($user_id)
    {

        $con = DB::getConnection();
        $sql = "SELECT * FROM siparislerim WHERE user_id=:user_id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":user_id" => $user_id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }

}