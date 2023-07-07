<?php

namespace App\Models;

class Products extends BaseModel
{
    public $table = 'products';
    public function getListProducts() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addProducts($id,$product_name,$screen_resolution,$screen_width, $maximum_brightness, $rear_camera, $front_camera, $HDH, $CPU, $GPU, $pin_sac, $description, $cate_id){
        $sql = "insert into $this->table values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute_get_id([$id,$product_name,$screen_resolution,$screen_width, $maximum_brightness, $rear_camera, $front_camera, $HDH, $CPU, $GPU, $pin_sac, $description, $cate_id]);
    }
    public function getOneProduct($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateProducts($id,$product_name,$screen_resolution,$screen_width, $maximum_brightness, $rear_camera, $front_camera, $HDH, $CPU, $GPU, $pin_sac, $description, $cate_id){
        $sql = "update $this->table set product_name = ?,screen_resolution = ?,screen_width = ?, maximum_brightness = ?, rear_camera = ?, front_camera = ?, HDH = ?, CPU = ?, GPU = ?, pin_sac = ?, description = ?, cate_id = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$product_name,$screen_resolution,$screen_width, $maximum_brightness, $rear_camera, $front_camera, $HDH, $CPU, $GPU, $pin_sac, $description, $cate_id, $id]);
    }
    public function deleteProducts($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}