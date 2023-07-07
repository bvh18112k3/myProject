<?php

namespace App\Models;

class Categories extends BaseModel
{
    public $table = "categories";
    public function getCategories(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addCategories($id,$cate_name){
        $sql = "insert into $this->table values(?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$cate_name]);
    }
    public function getOneCategories($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateCategories($id,$cate_name){
        $sql = "update $this->table set cate_name = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$cate_name,$id]);
    }
    public function deleteCateegories($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}