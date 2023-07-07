<?php

namespace App\Models;

class Image extends BaseModel
{
    public $table = "img_product";
    public function getImage(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addImage($id,$url, $product_detail_id, $product_id){
        $sql = "insert into $this->table values(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$url, $product_detail_id, $product_id]);
    }
    public function getImageProduct($id){
        $sql = "select * from $this->table where product_id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function getImageProductDetail($id){
        $sql = "select * from $this->table where product_detail_id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateImage($id,$url, $product_detail_id, $product_id){
        $sql = "update $this->table set url=?, product_detail_id = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$url, $product_detail_id,$id]);
    }
//    Xoá theo id của ảnh
    public function deleteImage($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
//    Xóa theo product_detail_id
    public function deleteImageProduct($id){
        $sql = "delete from $this->table where product_id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}