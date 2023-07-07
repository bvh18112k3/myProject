<?php

namespace App\Controllers;

use App\Models\Users;

class UserController extends BaseController
{
    public $user;
    public function __construct()
    {
        $this->user= new Users();
    }
    public function getUser(){
        $users = $this->user->getListUser();
        $this->render('users.index', compact('users'));
    }
    public function addUser(){
        $this->render('users.add');
    }
    public function addUserPost(){
        if(isset($_POST['them'])){
            $result = $this->user->addUser(NULL, $_POST['email'], $_POST['username'],$_POST['password'],$_POST['role']);
            if($result){
                redirect('success', 'Thêm Thành Công', 'addUser');
            }
        }
    }
    public function addUserCus(){
        $this->render('customer.sign-up');
    }
    public function addUserPostCus(){
        if(isset($_POST['them'])){}
        $result = $this->user->addUser(NULL, $_POST['email'], $_POST['username'], $_POST['password'], $_POST['role']);
        if($result){
            redirect('success', 'Đăng ký tài khoản thành công bạn hãy đăng nhập', 'signIn');
        }
    }
    public function SignIn(){
        $this->render('customer.sign-in');
    }
    public function SignInPost(){
        if(isset($_POST['signin'])){
            $result = $this->user->checkUser($_POST['username'], $_POST['password']);
            if(isset($result)){
                if(is_object($result)){
                    $_SESSION['user'] = $result;
                    redirect('success', 'Thành công', '/');
                }else{
                    redirect('errors', 'Tên đăng nhập hoặc mật khẩu không chính xác', 'signIn');
                }
            }
        }
    }
    public function SignOut(){
        unset($_SESSION['user']);
        redirect('success', 'Đăng xuất thành công', '/');
    }
    public function updateUser($id){
        $users = $this->user->getOneUser($id);
        $this->render('users.update', compact('users'));
    }
    public function updateRomPost($id){
        if(isset($_POST['them'])){
            $result = $this->user->updateUser($id,$_POST['email'], $_POST['username'],$_POST['password'],$_POST['role']);
            if($result){
                redirect('success', 'Sửa Thành Công', 'user');
            }
        }
    }
    public function deleteUser($id){
        $result = $this->user->deleteUser($id);
        if($result){
            redirect('success', 'Xóa Thành Công', 'user');
        }
    }
}