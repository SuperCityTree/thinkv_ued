<?php
namespace Ue\Controller;

use Think\Controller;

class PageController extends CommonController {
    public function show(){
        
        $list_style=$_GET['s'];//获取页面模板

        $this->display('/'.$list_style);
    }


}