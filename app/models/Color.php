<?php

namespace App\Models;

class Color extends BaseModel
{
    public $table = "color";
    public function getListColor(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addColor($id,$color){
        $sql = "insert into $this->table values(?,?)";
        $this->setQuery($sql);
        return $this->execute_get_id([$id,$color]);
    }
    public function getOneColor($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateColor($id,$color){
        $sql = "update $this->table set color = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$color,$id]);
    }
    public function deleteColor($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}