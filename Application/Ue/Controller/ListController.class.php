<?php
namespace Ue\Controller;

use Think\Controller;

class ListController extends CommonController {
    public function index(){
        $catid=$_GET['cid'];//获取栏目id

        $category=M('category');// 实例化category对象
        $cat = $category->where('catid='.$catid)->find();

        $catexit = $category->where('catid='.$cat['linktop'])->find();

        if($cat[url]){
          Header("Location:".$cat[url]);
        }

        $this->assign('catid',$catid);// 将最初的栏目id写入


        //判断该栏目是否跳转到制定子栏目
        if($cat['linktop']>1&&$catexit){
            $catinfo = $category->where('catid='.$cat['linktop'])->find();
            //支持当前三级分类 后续需调整成递归算法
            $catexitin = $category->where('catid='.$catinfo['linktop'])->find();
              if($catinfo['linktop']>1&&$catexitin){
                  $catinfo = $category->where('catid='.$catinfo['linktop'])->find();
              }
        }
        else{
            $catinfo=$cat;
        }
       //var_dump($catinfo);

        $_SESSION['catinfo']=$catinfo; //将栏目信息写入到session
         $catid=$catinfo[catid];//重新赋值catid

        
        $this->assign('catinfo',$catinfo);// 赋值栏目相关信息



        $list_style=$catinfo['style'];//获取栏目模板

        if(!$list_style){
            $list_style=$catinfo['module'];
        }
        $list_module=$catinfo['module'];
        $usable_type=$catinfo['usable_type'];

       if($usable_type=='1'){       //栏目在可用状态

                    $list=M($list_module);// 该栏目的数据库模型
               
                     $hasson =  $category ->where('parentid='. $catid)->select();

                    if($hasson){
                      $isfather=true;
                        //判断其包含的子栏目
                      $soninfo =  $category ->where('parentid='. $catid)->select();

                      //如果有子栏目
                      if($soninfo){
                            foreach( $soninfo as $v){ 
                                $sonid= $v['catid'].','. $sonid;
                            } 
                            $where=array('catid'=>array('in',$sonid));
                      }
                      //如果没有子栏目
                      else{
                          $where="`catid` = ".$catid;
                      }
                        
              }
              else{
                     $isfather=false; 
                     $where="`catid` = ".$catinfo['catid'];
              }

                    if($isfather){
                          $this->assign('fatherid',$catid);// 如何当前栏目是顶级栏目，则显示
                    }

                    
             if(!$_GET['p']){
                                  $_GET['p']=1;
                            }
                    $list_data = $list->where($where)->order('listorder,updatetime desc')->page($_GET['p'].',6')->select();


                    //对内容页面进行url组装
                     $count=count($list_data); 
                        for($i=0;$i<$count;$i++) 
                        { 
                            $list_data[$i]['url']=__APP__."/Ue/Show/index/cid/".$list_data[$i]['catid']."/aid/".$list_data[$i]['id']; //返回栏目链接
                        }    

            $this->assign('list_data',$list_data);// 赋值数据集

            $count      = $list->where('catid='.$catid)->count();// 查询满足要求的总记录数

            $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
        }  

     
       
        $this->display('/'.$list_style);
    }


}