<?php
namespace App\Models;
use PDO;
class BaseModel{
    public $pdo;
    public $sql;
    public $sta;
 public   function __construct()
    {
        //set connect
       $this->pdo =  new PDO("mysql:host=" . DBHOST
            . ";dbname=" . DBNAME
            . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    //    return $pdo;
    }
 public   function setQuery($sql) {
        // return $sql;
        $this->sql= $sql;
    }
//
//    //Function execute the query
//    // hàm này sẽ làm hàm chạy câu truy vấn
 public function execute($options=array()) {
        // $pdo = getConnect();
        $this->sta = $this->pdo->prepare($this->sql);
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $this->sta->bindParam($i+1,$options[$i]);
            }
        }
        $this->sta->execute();
        return $this->sta;
    }
    public function execute_get_id($options=array()){
//        $args = func_get_args();
//        $args = array_slice($args, 1);
//        $this->sta->execute($args);
        $this->sta = $this->pdo->prepare($this->sql);
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $this->sta->bindParam($i+1,$options[$i]);
            }
        }
        $this->sta->execute();
        $lastId =  $this->pdo->lastInsertId();
        return $lastId;
    }
//
//    //Funtion load datas on table
//    // lấy nhiều dữ liệu ở trong bảng
 public function loadAllRows($options=array()) {
        if(!$options) {
            if(!$result = $this->execute($options,$this->sql))
                return false;
        }
        else {
            if(!$result = $this->execute($options,$this->sql))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
//
//    //Funtion load 1 data on the table
//    //lay 1 du lieu thoi
  public function loadRow($option=array(),$sql="") {
        if(!$option) {
            if(!$result = $this->execute($option,$this->sql))
                return false;
        }
        else {
            if(!$result = $this->execute($option,$this->sql))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }

}

//
//
//}
?>