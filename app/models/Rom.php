<?php

namespace App\Models;

class Rom extends BaseModel
{
    public $table = "rom";
    public function getListRom(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addRom($id,$rom){
        $sql = "insert into $this->table values(?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$rom]);
    }
    public function getOneRom($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateRom($id,$rom){
        $sql = "update $this->table set rom = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$rom,$id]);
    }
    public function deleteRom($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}