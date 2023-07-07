<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Image;
use App\Models\ProductDetail;
use App\Models\Products;
use App\Models\Ram;
use App\Models\Color;
use App\Models\Rom;

class ProductDetailController extends BaseController
{
    public $product;
    public $product_detail;
    public $ram;
    public $rom;
    public $color;
    public $img;
    public $cate;

    public function __construct()
    {
        $this->product_detail = new ProductDetail();
        $this->product = new Products();
        $this->ram = new Ram();
        $this->color = new Color();
        $this->rom = new Rom();
        $this->img = new Image();
        $this->cate = new Categories();
    }

    public function getProductDetail()
    {
        // echo "test autoload";
        // die;
        $pd = $this->product_detail->getListProductDetail();
        return $this->render('product_detail.index', compact('pd'));
    }

    public function addProductDetail()
    {
        $rams = $this->ram->getListRam();
        $roms = $this->rom->getListRom();
        $colors = $this->color->getListColor();
        $products = $this->product->getListProducts();
        $total = array($rams, $roms, $colors, $products);
        $this->render('product_detail.add', compact('total'));
    }

    public function addProductDetailPost()
    {
        if (isset($_POST['them'])) {
            $price = 0;
            $result = $this->product_detail->addProductDetail(NULL, $_POST['ram'], $_POST['rom'], $_POST['color'], $price, $_POST['product']);
            if ($result) {
                redirect('success', 'Thêm Thành Công', 'addProductDetail');
            }
        }
    }

    public function editProductDetailPost()
    {
        if (isset($_POST['them'])) {
            $pd = $this->product_detail->getOneProductDetail($_POST['pid']);
            $col = $this->product_detail->getColor($_POST['pid']);
            $a = 1;
            $result = $this->product_detail->editProductDetail($_POST['id' . $a], $_POST['price' . $a]);
            $re = $this->product_detail->editProductDetail(136, 1811);
            var_dump( $_POST['id' . $a]);
            var_dump( $_POST['price' . $a]);
            foreach ($col as $c) {
                $img = $_FILES['img' . $b]['name'];
                $target_dir = "./public/img/";
                $target_file = $target_dir . basename($_FILES['img' . $b]['name']);
                if (move_uploaded_file($_FILES['img' . $b]["tmp_name"], $target_file)) {
                    $rel = $this->img->addImage(NULl, $img, $_POST['color_id' . $b], $_POST['pid']);
                }
                $b++;
            }
            if($re){
                redirect('success', 'Thành công', 'ProductDetail/'.$_POST['pid']);
            }

        }
    }

    public function updateProductDetail($id)
    {
        $pd = $this->product_detail->getProductDe($id);
        $this->render('product_detail.update', compact('pd'));
    }

    public function getProductID($id)
    {
        $pd = $this->product_detail->getPro($id);
        $this->render('product_detail.productDetail', compact('pd'));
    }

    public function getPro($id)
    {
        $pd = $this->product_detail->getProduct($id);
        $ram = $this->product_detail->getRam($id);
        $rom = $this->product_detail->getRom($id);
        $color = $this->product_detail->getColor($id);
        $p = $this->product_detail->getPro($id);
        if (isset($_GET['cate_id'])) {
            $cate_id = $_GET['cate_id'];
            $sp = $this->product_detail->getPriceProducts($cate_id,$id);
        }
        $total = array($ram, $rom, $color, $pd, $p, $sp);
        $this->render('customer.product', compact('total'));
    }

    public function getPriceProduct()
    {
        $cate = $this->cate->getCategories();
        foreach ($cate as $c) {
            if ($c->cate_name == "iPhone") {
                $id = $c->id;
            } else if ($c->cate_name == "Vivo") {
                $vi = $c->id;
            } else if ($c->cate_name == "Samsung") {
                $sa = $c->id;
            }
        }
        $ip = $this->product_detail->getPriceProduct($id);
        $vv = $this->product_detail->getPriceProduct($vi);
        $sam = $this->product_detail->getPriceProduct($sa);
        $sm = [$sam, $vv, $ip];
        $this->render('customer.home', compact('sm'));
    }
    public function getProForPrice(){
        if(isset($_POST['buy'])){
            $price = $_POST['price'];
            $product_id = $_POST['product_id'];
            $pr = $this->product_detail->getProduct($product_id);
            $a = 1;
            foreach ($pr as $p){
                if(isset($_POST['ram'.$a])){
                    $ram_id = $_POST['ram'.$a];
                }
                if(isset($_POST['rom'.$a])){
                    $rom_id = $_POST['rom'.$a];
                }
                if(isset($_POST['color'.$a])){
                    $color_id = $_POST['color'.$a];
                }
                $a++;
            }
            $pd = $this->product_detail->getProForPrice($ram_id, $rom_id, $color_id, $price);
            $this->render('customer.view', compact('pd'));
        }
    }
}