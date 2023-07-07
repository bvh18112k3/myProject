<?php

namespace App\Controllers;
use App\Models\Color;

class ColorController extends BaseController
{
    public $color;
    public function __construct()
    {
        $this->color = new Color();
    }
    public function getColor(){
        $colors = $this->color->getListColor();
        $this->render('color.index', compact('colors'));
    }
    public function addColor(){
        $this->render('color.add');
    }
    public function addColorPost(){
        if(isset($_POST['them'])){
            $result = $this->color->addColor(NULL, $_POST['color']);
            if($result){
                redirect('success', 'Thêm Thành Công', 'addColor');
            }
        }
    }
    public function updateColor($id){
        $colors = $this->color->getOneColor($id);
        $this->render('color.update', compact('colors'));
    }
    public function updateColorPost($id){
        if(isset($_POST['them'])){
            $result = $this->color->updateColor($id, $_POST['color']);
            if($result){
                redirect('success', 'Sửa Thành Công', 'color');
            }
        }
    }
    public function deleteColor($id){
        $result = $this->color->deleteColor($id);
        if($result){
            redirect('success', 'xóa Thành Công', 'color');
        }
    }
}