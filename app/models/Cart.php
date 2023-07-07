<?php

namespace App\Models;

class Cart extends BaseModel
{
    public $table = 'carts';
    public function getListCart() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addCart($id,$customer_name, $phone_number, $address_customer,$day ,$quantity, $total_money, $status , $note, $product_detail_id, $user_id ){
        $sql = "insert into $this->table values(?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute_get_id([$id,$customer_name, $phone_number, $address_customer ,$day ,$quantity, $total_money,$status, $note, $product_detail_id, $user_id]);
    }
    public function getOneCart($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function getCartByID($id){
        $sql = "SELECT ca.id, product_name, color, price, quantity, total_money, note, address_customer, customer_name,day, status FROM carts ca JOIN product_detail pd on ca.product_detail_id = pd.id JOIN products p ON p.id = pd.product_id JOIN users u on ca.user_id = u.id JOIN color c on c.id = pd.color_id WHERE ca.id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function updateCart($id,$customer_name, $phone_number, $address_customer, $note, $product_detail_id, $user_id){
        $sql = "update $this->table set customer_name = ?, phone_number =?, address_customer=?, note=?, product_detail_id=?, user_id = ? where id =?";
        $this->setQuery($sql);
        return $this->execute([$customer_name, $phone_number, $address_customer, $note, $product_detail_id, $user_id,$id]);
    }
    public function deleteCart($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}