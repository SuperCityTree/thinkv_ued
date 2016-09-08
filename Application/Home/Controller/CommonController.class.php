<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
   	//初始化操作
	public function _initialize(){ 
		
		//判断是否登陆
		
		if(empty($_SESSION['users']['id'])){
				$this->redirect('User/login');
				exit;
                                }

                          if($_SESSION['users']['pid']>'0'){
                          	$this->redirect('Home/Store/content/');
                          	exit;
                          }

                          //判断是否需要初始化设置

                       $start=M('sysconfig')->where("varname='cfg_start'")->getField('value');
                      if($start=='Y'){
                      		
                      		$this->redirect('Home/Set/index');
                      	}
                         



                          //查看网站相关配置文件
		$webname=M('sysconfig')->where("varname='cfg_webname'")->getField('value');		
		$this->assign('cfg_webname',$webname);	
	}


}