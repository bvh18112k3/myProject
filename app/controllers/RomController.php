<?php

namespace App\Controllers;
use App\Models\Rom;
class RomController extends BaseController
{
    public $rom;
    public function __construct()
    {
        $this->rom= new Rom();
    }
    public function getRom(){
        $roms = $this->rom->getListRom();
        $this->render('rom.index', compact('roms'));
    }
    public function addRom(){
        $this->render('rom.add');
    }
    public function addRomPost(){
        if(isset($_POST['them'])){
            $result = $this->rom->addRom(NULL, $_POST['rom']);
            if($result){
                redirect('success', 'Thêm Thành Công', 'addRom');
            }
        }
    }
    public function updateRom($id){
        $roms = $this->rom->getOneRom($id);
        $this->render('rom.update', compact('roms'));
    }
    public function updateRomPost($id){
        if(isset($_POST['them'])){
            $result = $this->rom->updateRom($id, $_POST['rom']);
            if($result){
                redirect('success', 'Sửa Thành Công', 'rom');
            }
        }
    }
    public function deleteRom($id){
        $result = $this->ram->deleteRom($id);
        if($result){
            redirect('success', 'Xóa Thành Công', 'rom');
        }
    }
}