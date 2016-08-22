<?php
namespace Home\Controller;
use Think\Controller;
class SetController extends Controller {
   	 public function index(){
		        $this->show();
		 }

    //实行操作
    public function doset(){
		$setting=M('sysconfig');

		foreach ($_POST as $key => $value) {
			$data = array('value'=>$value);
			$where="`varname` = '".$key."'";
			$setting-> where($where)->setField($data);
		}

		$this->redirect('Set/start/');

	}

  //提示进入页面
    public function start(){

		$this->show();
	}

	



}