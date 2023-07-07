<?php

namespace App\Models;

class Ram extends BaseModel
{
    public $table = "ram";
    public function getListRam(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addRam($id,$ram){
        $sql = "insert into $this->table values(?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$ram]);
    }
    public function getOneRam($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateRam($id,$ram){
        $sql = "update $this->table set ram = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$ram,$id]);
    }
    public function deleteRam($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}