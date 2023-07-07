<?php

namespace App\Controllers;
use App\Models\Ram;
class RamController extends BaseController
{
    public $ram;
    public function __construct()
    {
        $this->ram= new Ram();
    }
    public function getRam(){
        $rams = $this->ram->getListRam();
        $this->render('ram.index', compact('rams'));
    }
    public function addRam(){
        $this->render('ram.add');
    }
    public function addRamPost(){
        if(isset($_POST['them'])){
            $result = $this->ram->addRam(NULL, $_POST['ram']);
            if($result){
                redirect('success', 'Thêm Thành Công', 'addRam');
            }
        }
    }
    public function updateRam($id){
        $rams = $this->ram->getOneRam($id);
        $this->render('ram.update', compact('rams'));
    }
    public function updateRamPost($id){
        if(isset($_POST['them'])){
            $result = $this->ram->updateRam($id, $_POST['ram']);
            if($result){
                redirect('success', 'Sửa Thành Công', 'ram');
            }
        }
    }
    public function deleteRam($id){
        $result = $this->ram->deleteRam($id);
        if($result){
            redirect('success', 'Xóa Thành Công', 'ram');
        }
    }
}