<?php
include_once "../library/DB.php";

class User extends Model
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $name;
    public $surname;
    public $image;

    public static function login($username, $password)
    {
        $con = DB::getConnection();
        $sql = "SELECT * FROM user WHERE username=:username AND password=:password AND type=:type AND status=:status";
        $statement = $con->prepare($sql);
        $parameters = [
            ":username" => $username,
            ":password" => md5($username . $password),
            ":type" => "user",
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
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert()
    {

        $db = DB::getConnection();
        if ($this->validate()) {
            try {



                    $statement = $db->prepare("INSERT INTO user(username,password,email,name,surname,type,status,image) values(:username,:password,:email,:name,:surname,'user',1,:image)");
                    $data = [
                        ':username' => $this->username,
                        ':password' => md5($this->username . $this->password),
                        ':email' => $this->email,
                        ':name' => $this->name,
                        ':surname' => $this->surname,
                        ':image'=>$this->image
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

    public function validate()
    {
        if (($this->username == "" || $this->password == "" || $this->email == "" || $this->name == "" || $this->username == "")) {
            return false;
        }

        $con = DB::getConnection();
        $sql = "SELECT id FROM user WHERE username=:username or email=:email";
        $statement = $con->prepare($sql);
        $parameters = [
            ":username" => $this->username,
            ":email" => $this->email,
        ];
        $statement->execute($parameters);
        $result = $statement->fetchColumn();
        if($result){
            return false;
        }
        return true;
    }

    public function imageUpdate(){

        if ($this->validate("update")) {
            try {
                $db = DB::getConnection();
                $statement = $db->prepare("UPDATE user set image=:image where id=$this->id");
                $data = [

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

}