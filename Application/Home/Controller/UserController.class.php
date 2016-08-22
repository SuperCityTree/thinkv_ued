<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   	 public function index(){
        $this->show();
    }

    //管理员登陆
    public function login(){
		//记住密码直接登录
		if($_SESSION['users']){
		$this->redirect('Center/index');	
		}

		if(!empty($_COOKIE['account']) && !empty($_COOKIE['password'])){
			$account=$_COOKIE['account'];
			$password=$_COOKIE['password'];
			$this->assign('account',$account);
			$this->assign('pwd',$password);
		}
		$repage=$_SERVER['HTTP_REFERER'];
		//setCookie('repage',$repage);
		$this->assign('login',$repage);
		$this->display();	
	}


	/** 
	 * 执行登陆操作
	 * @return 返回1登陆成功 返回2账号或密码错误 
	 */ 
	public function dologin(){
		$user=M('Admin');
		$email=$_POST['account'];
		$pwd=md5($_POST['pwd']); 
		$list=$user->where("user='{$email}'")->find();	

		if($list){
			if($list['password']==$pwd){
				$_SESSION['users']=$list;				
				$data['user_id']=$_SESSION['users']['id'];
				$data['logtime']=time();
				$data['logip']=get_client_ip();
				M('Admin')->where('id='.$_SESSION['users']['id'])->setField('logintime',$data['logtime']);
				M('Admin')->where('id='.$_SESSION['users']['id'])->setField('loginip',$data['logip']);
				echo 1;
			}
			else{
				echo 2;
			}
		}else{

			echo 2;
		}
	}

    //退出管理员登陆
    public function loginout(){
		unset($_SESSION['users']);
		$this->redirect('User/login');
		exit;
	}




}