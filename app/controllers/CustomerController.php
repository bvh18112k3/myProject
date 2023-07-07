<?php
// include_once 'app/models/Customer.php';
// include_once 'app/controllers/BaseController.php';
namespace App\Controllers;
use App\Models\Customer;
class CustomerController extends BaseController{
    public $customer;
    public function __construct(){
        $this->customer = new Customer();
    }
public function getCustomer() {
    // echo "test autoload";
    // die;
    $customers = $this->customer->getListCustomer();
    return $this->render('customer.index',compact('customers'));
}
public function addCustomer(){
    $this->render('customer.add');
}
public function addCustomerPost(){
    if(isset($_POST['them'])){
        $result = $this->customer->addCustomer(NULL,$_POST['name'],$_POST['phone'],$_POST['address'],$_POST['note']);
        if($result){
            redirect('success', 'Thêm Thành Công', 'addCustomer');
        }
    }
}
public function deleteCustomer($id){
    $result = $this->customer->deleteCustomer($id);
    if($result){
        redirect('success', 'xóa Thành Công', 'customer');
    }
}
}