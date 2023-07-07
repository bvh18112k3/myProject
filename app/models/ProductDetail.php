<?php

namespace App\Models;

class ProductDetail extends BaseModel
{
    public $table = 'product_detail';
    public function getListProductDetail() {
        $sql = "select pd.id as id, product_name, ram.ram as ram, rom.rom as rom, c.color, price from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on pd.ram_id = ram.id JOIN rom on rom.id = pd.rom_id JOIN color c on pd.color_id = c.id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addProductDetail($id,$ram_id,$room_id,$color_id,$price, $product_id){
        $sql = "insert into $this->table values(?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$ram_id,$room_id,$color_id,$price, $product_id]);
    }
    public function getOneProductDetail($id){
        $sql = "select * from $this->table where product_id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateProductDetail($id,$ram_id,$rom_id,$color_id,$price, $product_id){
        $sql = "update $this->table set ram_id = ?,rom_id = ?,color_id = ?,price = ?, product_id = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$ram_id,$rom_id,$color_id,$price, $product_id]);
    }
    public function editProductDetail($id, $price){
        $sql = "update $this->table set price = ? where product_id = ?";
        $this->setQuery($sql);
        return $this->execute([$price, $id]);
    }
    public function updateProduct($id, $ten_sp, $gia){
        $sql = "update $this->table set ten_sp = ?, gia = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$ten_sp, $gia,$id]);
    }
    public function deleteProductDetail($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getPro($product_id){
        $sql = "select pd.id as id , pd.product_id as pid , product_name, ram.ram as ram, ram.id as ram_id, rom.rom as rom, rom.id as rom_id, c.color, c.id as color_id, price from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on pd.ram_id = ram.id JOIN rom on rom.id = pd.rom_id JOIN color c on pd.color_id = c.id where product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$product_id]);
    }
    public function getProduct($product_id){
        $sql = "select * from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on pd.ram_id = ram.id JOIN rom on rom.id = pd.rom_id JOIN color c on pd.color_id = c.id JOIN img_product img ON p.id = img.product_id GROUP BY img.color_id, img.product_id HAVING pd.product_id = ?;";
        $this->setQuery($sql);
        return $this->loadAllRows([$product_id]);
    }
    public function getRam($product_id){
        $sql = "select  COUNT(*), pd.product_id as pid, ram.ram as ram, ram.id as ram_id from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on pd.ram_id = ram.id JOIN rom on rom.id = pd.rom_id JOIN color c on pd.color_id = c.id GROUP BY p.product_name, ram_id HAVING pd.product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$product_id]);
    }
    public function getRom($product_id){
        $sql = "select  COUNT(*), pd.product_id as pid, rom.rom as rom, rom.id as rom_id from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on pd.ram_id = ram.id JOIN rom on rom.id = pd.rom_id JOIN color c on pd.color_id = c.id GROUP BY p.product_name, rom_id HAVING pd.product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$product_id]);
    }public function getColor($product_id){
    $sql = "SELECT COUNT(*), pd.product_id as pid, color, c.id as color_id from product_detail pd JOIN products p on pd.product_id = p.id JOIN color c on pd.color_id = c.id GROUP BY p.id, color_id HAVING pd.product_id =?";
    $this->setQuery($sql);
    return $this->loadAllRows([$product_id]);
}
    public function getProductDe($id){
        $sql = "select product_name, ram, rom, color, price, pd.ram_id, pd.rom_id, pd.color_id from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on ram.id = pd.ram_id JOIN rom on rom.id = pd.rom_id JOIN color on color.id = pd.color_id where pd.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function getOneProduct($id){
        $sql = "select product_name, ram, rom, color, price from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on ram.id = pd.ram_id JOIN rom on rom.id = pd.rom_id JOIN color on color.id = pd.color_id where pd.id = ?";
        $this->setQuery($sql);
        return $this->loadRows($id);
    }
    public function getPriceProduct($id){
        $sql = "SELECT MAX(price) as max, MIN(price) as min, product_name ,cate.id as cate_id, url, p.id as product_id FROM product_detail pd JOIN products p on pd.product_id = p.id JOIN categories cate on p.cate_id = cate.id JOIN img_product on img_product.product_id = p.id GROUP BY product_name HAVING cate.id = ? LIMIT 4;";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function getPriceProducts($id, $product_id){
        $sql = "SELECT MAX(price) as max, MIN(price) as min, product_name ,cate.id as cate_id, url, p.id as product_id FROM product_detail pd JOIN products p on pd.product_id = p.id JOIN categories cate on p.cate_id = cate.id JOIN img_product on img_product.product_id = p.id GROUP BY product_name HAVING cate.id = ? AND p.id != ?LIMIT 4;";
        $this->setQuery($sql);
        return $this->loadAllRows([$id, $product_id]);
    }
    public function getPrice($id){
        $sql = "select color, ram, rom, price from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on ram.id = pd.ram_id JOIN rom on rom.id = pd.rom_id JOIN color on color.id = pd.color_id where p.id = ? ";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function getProForPrice($ram_id, $rom_id, $color_id, $price){
        $sql = "select product_name, color, ram, rom, price,pd.ram_id, pd.rom_id, pd.color_id, pd.id as id from product_detail pd JOIN products p on pd.product_id = p.id JOIN ram on ram.id = pd.ram_id JOIN rom on rom.id = pd.rom_id JOIN color on color.id = pd.color_id where pd.ram_id = ? and pd.rom_id = ? and pd.color_id = ? and price = ?";
        $this->setQuery($sql);
        return $this->loadRow([$ram_id, $rom_id, $color_id,$price]);
    }
}