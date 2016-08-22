<?php
namespace Ue\Controller;
use Think\Controller;
class CommonController extends Controller {
   	//初始化操作

   	 Public function _initialize(){


   	 		//判断后台设定主题，
   	 		$theme=getconfig('cfg_theme');
   	 	       	$theme_path= __ROOT__.'/Theme/Ue/'.$theme;
   	 	       	$runthteme=getconfig('cfg_wap');
   	 		
		        //移动设备浏览，则切换模板
		        if (ismobile()&&$runthteme=='Y') {
		            //设置默认默认主题为 Mobile
		          	  C('DEFAULT_THEME',$theme.'/mb');
		              $this->assign('re_path', $theme_path.'/mb');//手机模板目录资源
		        }
		        else{
		        	 C('DEFAULT_THEME',$theme.'/pc');
		        	 $this->assign('re_path', $theme_path.'/pc');//PC模板目录自选
		        }
		
		        //将网站顶级栏目调出
		        $category=M('category')->where('parentid=0')->select(); 
		        $this->assign('category',$category);

		      
		        
		    }

		    
}