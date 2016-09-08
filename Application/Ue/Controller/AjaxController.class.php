<?php
namespace Ue\Controller;
use Think\Controller;
class AjaxController extends CommonController {


    public function getcontent()
    {
        $catid=$_GET[cid];
        $aid=$_GET[aid];
        if(!$aid){
        	   	$page=M('page');
	        $result=$page->where('catid='.$catid)->find();
	        echo $result[content];
        }
        else{
        	         $cat=M('category');
                      $cinfo=$cat->where("catid=".$catid)->find();
                      $arc=M($cinfo['module']);
                      $ainfo=$arc->where("id=".$aid)->find();
                      if($cinfo['module']=='news'){
			echo $ainfo[body];
                      }else{
                      		echo $ainfo[content];	
                      }
                       
        }
     

    }


}
