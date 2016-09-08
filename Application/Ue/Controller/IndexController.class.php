<?php
namespace Ue\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){

       $this->assign('isindex',"1");// 判断是否是首页
	$_SESSION['catinfo'] = array('catid' =>'0' , 'catname' =>'首页');
       $this->display('/index');
    }




}