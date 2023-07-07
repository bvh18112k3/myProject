<?php

namespace App\Controllers;

use App\Models\Categories;

class CategoriesController extends BaseController
{
    public $cate;
    public function __construct()
    {
        $this->cate = new Categories();
    }
    public function getCategories(){
        $cates = $this->cate->getCategories();
        $this->render('cate.index', compact('cates'));
    }
    public function addCategories(){
        $this->render('cate.add');
    }
    public function addCategoriesPost(){
        if(isset($_POST['them'])){
            $result = $this->cate->addCategories(NULL, $_POST['cate_name']);
            if($result){
                redirect('success', 'Thêm Thành Công', 'addCate');
            }
        }
    }
    public function updateCategories($id){
        $cates = $this->cate->getOneCategories($id);
        $this->render('cate.update', compact('cates'));
    }
    public function updateCategoriesPost($id){
        if(isset($_POST['them'])){
            $result = $this->cate->updateCategories($id, $_POST['cate_name']);
            if($result){
                redirect('success', 'Sửa Thành Công', 'cate');
            }
        }
    }
    public function deleteCategories($id){
        $result = $this->cate->deleteCateegories($id);
        if($result){
            redirect('success', 'xóa Thành Công', 'cate');
        }
    }
}