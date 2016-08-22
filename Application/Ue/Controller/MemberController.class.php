<?php
namespace Ue\Controller;

use Think\Controller;

class MemberController extends CommonController {
    public function login(){
       
     
       
        $this->display('/login');
    }

    public function register(){
       
     
       
        $this->display('/register_1');
    }


}