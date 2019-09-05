<?php


class SepetUrun extends Model
{
    public $id;
    public $name;
    public $price;
    public $quantity;
    public $sepet_id;
    public $urun_id;
    public $images;

    public function insert()
    {
        if ($this->validate()) {
            try { //TODO:BURADA SEPET DB DE VAR MI DİYE BAK
                $db = DB::getConnection();

                $statement = $db->prepare("INSERT INTO siparislerim_urun(name,price,quantity,sepet_id,images,urun_id) values(:name,:price,:quantity,:sepet_id,:images,:urun_id)");
                $data = [
                    ':name' => $this->name,
                    ':price' => $this->price,
                    ':quantity' => $this->quantity,
                    ':sepet_id' => $this->sepet_id,
                    'images'=>$this->images,
                    'urun_id'=>$this->urun_id,
                ];
                $statement->execute($data);
               // $this->id = $db->lastInsertId();
                return true;
            }catch (Exception $e){
                return false;
            }
        }else{
            return false;
        }
    }
    public static function getAllByUser($sepet_id)
    {

        $con = DB::getConnection();
        $sql = "SELECT * FROM siparislerim_urun WHERE sepet_id=:sepet_id";
        $statement = $con->prepare($sql);
        $parameters = [
            ":sepet_id" => $sepet_id
        ];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }
}