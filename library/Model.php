<?php


class Model
{
    public function setAttribute($keyOrArray,$value = null)
    {
        if(is_array($keyOrArray)){
            foreach ($keyOrArray as $key=>$val) {
                if(property_exists(get_called_class(),$key)){
                    $this->{$key} = $val;
                }
            }
        }elseif(property_exists(get_called_class(),$keyOrArray)){
            $this->{$keyOrArray} = $value;
        }
    }

    public function insert(){}
    public function validate(){return true;}
    public function update(){}

}