<?php
namespace Ue\Controller;

use Think\Controller;

class ShowController extends CommonController {
    public function index(){
         $id = $_GET['aid'];//获取内容id
        $catid = $_GET['cid'];//获取栏目id

        $category = M('category');// 实例化category对象
        $catinfo = $category->where('catid=' . $catid)->find();
        $_SESSION['catinfo']=$catinfo; //将栏目信息写入到session      
        $this->assign('catinfo', $catinfo);// 赋值栏目相关信息

        $list_style=$catinfo['style'];//获取栏目模板
         if(!$list_style){
            $list_style=$catinfo['module'];
        }

        $list_style = $list_style . "_detail";//获取文章显示模板
        $list_module = $catinfo['module'];


        $news = M($list_module);// 实例化User对象
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取


        $detail = $news->where('id=' . $id)->find();

        //判断是否有跳转，如有跳转则跳转
          if($detail[url]){
                Header("Location:".$detail[url]);
            }

         $read=$detail['read']+1; 
        $news->where('id=' . $id)->setField('read', $read);//更新阅读数据量


        //获取上一篇 下一篇
        $getnext="id >".$id." AND catid=".$catid;
        $getprev="id <".$id." AND catid=".$catid;
        $next=$news->where($getnext)->limit(1)->find();
        if($next){
            $next[url]= __APP__."/Ue/Show/index/cid/".$next[catid]."/aid/".$next[id]; //返回栏目链接
        }
        $prev=$news->where($getprev)->limit(1)->find();
           if($prev){
            $prev[url]= __APP__."/Ue/Show/index/cid/".$prev[catid]."/aid/".$prev[id]; //返回栏目链接
        }




        $this->assign('detail', $detail);// 赋值数据集
        $this->assign('next', $next);// 赋值数据集
        $this->assign('prev', $prev);// 赋值数据集
      
        $this->display('/'.$list_style); // 输出模板


    }


}