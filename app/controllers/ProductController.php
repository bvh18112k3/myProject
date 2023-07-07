<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Color;
use App\Models\ProductDetail;
use App\Models\Products;
use App\Models\Ram;
use App\Models\Rom;

class ProductController extends BaseController
{
    public $product;
    public $cate;
    public $ram;
    public $rom;
    public $color;
    public $product_detail;
    public function __construct(){
        $this->cate = new Categories();
        $this->product = new Products();
        $this->ram = new Ram();
        $this->rom = new Rom();
        $this->color = new Color();
        $this->product_detail = new ProductDetail();
    }
    public function getProducts() {
        // echo "test autoload";
        // die;
        $products = $this->product->getListProducts();
        return $this->render('product.index',compact('products'));
    }
    public function addProducts(){
        $cate = $this->cate->getCategories();
        $ram = $this->ram->getListRam();
        $rom = $this->rom->getListRom();
        $color = $this->color->getListColor();
        $p = [$ram, $rom, $color, $cate];
        $this->render('product.add', compact('p'));
    }
    public function addProductsPost(){
        if(isset($_POST['them'])){
            $id = $this->product->addProducts(NULL, $_POST['product_name'], $_POST['screen_resolution'],$_POST['screen_width'], $_POST['maximum_brightness'],$_POST['rear_camera'], $_POST['front_camera'], $_POST['HDH'], $_POST['CPU'],$_POST['GPU'], $_POST['pin_sac'], $_POST['description'], $_POST['cate_id']);
            $ram = $this->ram->getListRam();
            $rom = $this->rom->getListRom();
            $color = $this->color->getListColor();
            $colors = [];
            $rams = [];
            $roms  = [];
            $price = 0;
            for ($i = 0; $i<count($ram); $i++){
                if(isset($_POST['ram'.$i+1])){
                    $rams[] = $_POST['ram'.$i+1];
                }
            }
            for ($i = 0; $i<count($rom); $i++){
                if(isset($_POST['rom'.$i+1])){
                    $roms[] = $_POST['rom'.$i+1];
                }
            }
            for ($i = 0; $i<count($color); $i++){
                if(isset($_POST['color'.$i+1])){
                    $colors[] = $_POST['color'.$i+1];
                }
            }
            for($i = 0; $i<count($rams); $i++){
                for($j = 0; $j<count($roms); $j++){
                    for($k = 0; $k<count($colors); $k++){
                        $this->product_detail->addProductDetail(NULL, $rams[$i], $roms[$j], $colors[$k], $price, $id);
                    }
                }
            }
            $pd = $this->product_detail->getPro($id);
            $col = $this->product_detail->getColor($id);
            $pr = [$pd, $col];
            if(isset($pd)&&$col){
                $this->render('product_detail.edit', compact('pr'));
            }
        }
    }
    public function updateProducts($id){
        $product = $this->product->getOneProduct($id);
        $cate = $this->cate->getCategories();
        $products = [$cate, $product];
        $this->render('product.update', compact('products'));
    }
    public function updateProductPost($id){
        if(isset($_POST['them'])){
            $result = $this->product->updateProducts($id, $_POST['product_name'],$_POST['screen_technology'],$_POST['screen_resolution'],$_POST['screen_width'], $_POST['maximum_brightness'], $_POST['touch_screen'],$_POST['rear_camera'], $_POST['front_camera'], $_POST['HDH'], $_POST['CPU'], $_POST['pin_sac'], $_POST['description'], $_POST['cate_id']);
            if($result){
                redirect('success', 'Thêm Thành Công', 'updateProduct');
        }
        }
    }
    public function deleteProducts($id){
        $result = $this->product->deleteProducts($id);
        if($result){
            redirect('success', 'xóa Thành Công', 'product');
        }
    }
}