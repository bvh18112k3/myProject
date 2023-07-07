<?php

namespace App\Models;

class Users extends BaseModel
{
    public $table = "users";
    public function getListUser(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addUser($id,$email, $username, $password, $role){
        $sql = "insert into $this->table values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $email, $username, $password, $role]);
    }
    public function checkUser($username, $password){
        $sql = "select * from $this->table where username = ? and password = ?";
        $this->setQuery($sql);
        return $this->loadRow([$username, $password]);
    }
    public function getOneUser($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateUser($id,$email, $username, $password, $role){
        $sql = "update $this->table set email = ?, username = ?, password = ?, role =? where id =?";
        $this->setQuery($sql);
        return $this->execute([$$email, $username, $password, $role,$id]);
    }
    public function deleteUser($id){
        $sql = "delete from $this->table where id =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}