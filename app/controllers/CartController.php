<?php

namespace App\Controllers;

use App\Models\Cart;

class CartController extends BaseController
{
    public $cart ;
    public function __construct()
    {
        $this->cart = new Cart();
    }
    public function addCartPost(){
        if(isset($_POST['them'])){
            $user_id = $_SESSION['user']->id;
            $status = 0;
            $total_money = $_POST['price'] * $_POST['quantity'];
            $cart_id = $this->cart->addCart(NULL, $_POST['customer_name'], $_POST['phone_number'], $_POST['address_customer'], $_POST['day'], $_POST['quantity'], $total_money, $status, $_POST['note'], $_POST['pdid'], $user_id);
            $carts = $this->cart->getCartByID($cart_id);
            if(isset($carts)){
                $this->render('customer.cart', compact('carts'));
            }
        }
    }
}