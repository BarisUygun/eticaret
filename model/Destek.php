<?php


class Destek
{

    public $isimsoyisim;
    public $email;
    public $konu;
    public $telefon;
    public $mesaj;

    public function insert()
    {
        $db = DB::getConnection();
        if ($this->validate()) {
            try {

                $statement = $db->prepare("INSERT INTO destek(isimsoyisim,email,telefon,konu,mesaj) values(:isimsoyisim,:email,:telefon,:konu,:mesaj)");
                $data = [
                    ':isimsoyisim' => $this->isimsoyisim,
                    ':email' => $this->email,
                    ':telefon' => $this->telefon,
                    ':konu'=>$this->konu,
                    ':mesaj'=>$this->mesaj
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

        if($this->isimsoyisim=="" || $this->email=="" || $this->telefon=="" || $this->konu=="" || $this->mesaj==""){
            //TODO:UYARI MESAJI
            return false;
        }
        return true;
    }

}