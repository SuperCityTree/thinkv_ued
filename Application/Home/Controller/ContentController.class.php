<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends CommonController {

      //初始化操作
  public function _initialize(){ 
       

           //获取栏目信息
            $category=M('category');
            $list =  $category ->where('parentid=0')->order('listorder')->select();
            if($_GET['cid']){
               $ifson=$category ->where('catid='.$_GET['cid'])->find();

            }
            else{
                $_GET['cid']="0";
                
            }

               //判断是否为当前栏目
            foreach ($list as $key => $value) {
                if($ifson[parentid]==0){
                     if($value[catid]== $_GET['cid']){
                       $list[$key]['thisone']="class='active'";
                      }  
                }
                else{
                    
                    if($value[catid]== $ifson[parentid]||$value[catid]== $ifson[arrparentid]){
                       $list[$key]['thisone']="class='active navouter'";
                      } 
                }
                
            }

            $this->assign('category_list',$list);

             if($_GET['cid']){
            //查看是否绑定了linktop选项，如果绑定了将自动跳转到该项目下
                     $cinfo =  $category ->where('catid='. $_GET['cid'])->find();  
                     $catexit = $category->where('catid='.$cinfo ['linktop'])->find();//判断是否其子栏目还存在


                     if($cinfo['linktop']!=0&&$cinfo['parentid']==0&&$catexit){
                               $_GET['cid']=$cinfo['linktop'];
                     }

             }


                 

            //获取子栏目信息
            if($_GET['cid']){
                  $cinfo=  $category ->where('catid='.$_GET['cid'])->find();
                  if($cinfo['parentid']=='0'){
                      $list_son=  $category ->where('parentid='.$_GET['cid'])->select();
                      $topselfid=$_GET['cid'];
                  }else{
                      $list_son=  $category ->where('parentid='.$cinfo['parentid'])->select();
                       $topselfid=$cinfo['parentid'];
                  }
                 $this->assign('category_sonlist',$list_son);

            $this->Get_setgroup($_GET['cid']);      //获取该栏目设置组信息
                  $this->assign('topselfid',$topselfid);//获取上级栏目id,如果已经是顶级，则返回其自身的值
                
            }

          
            $this->assign('catinfo',$cinfo);//当前栏目信息
             $this->assign('catid',$_GET['cid']);
     
          
  }


  public function index(){
            $this->Get_setgroup('0');//获取该栏目设置组信息
            $this->display(); // 输出模板    
    }

  public function hr(){
            $cid=$_GET['cid'];
            if(!$cid){
                  $this->error("缺少参数");
            }

             $category=M('category');
            $catinfo =  $category ->where('catid='. $cid)->find();
            //根据是否有子栏目等信息判断查询条件
              if($catinfo['parentid']=='0'){
                      $isfather=true;
                        //判断其包含的子栏目
                      $soninfo =  $category ->where('parentid='. $cid)->select();

                      //如果有子栏目
                      if($soninfo){
                            foreach( $soninfo as $v){ 
                                $sonid= $v['catid'].','. $sonid;
                            } 
                            $where=array('catid'=>array('in',$sonid));
                      }
                      //如果没有子栏目
                      else{
                          $where="`catid` = ".$cid;
                      }
                        
              }
              else{
                     $isfather=false; 
                     $where="`catid` = ".$cid;
              }
                    

            $hr=M('hr');//实例化新闻列表
            $list = $hr->where($where)->order('listorder,updatetime desc')->page($_GET['p'].',20')->select();
    
            $this->assign('list_hr',$list);// 赋值数据集
            $count      = $hr->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出


            $this->display(''); // 输出模板    
    }



//新闻模块列表
 public function news(){

            $cid=$_GET['cid'];
            if(!$cid){
                  $this->error("缺少参数");
            }
            $category=M('category');
            $catinfo =  $category ->where('catid='. $cid)->find();
            //根据是否有子栏目等信息判断查询条件
              if($catinfo['parentid']=='0'){
                      $isfather=true;
                        //判断其包含的子栏目
                      $soninfo =  $category ->where('parentid='. $cid)->select();

                      //如果有子栏目
                      if($soninfo){
                            foreach( $soninfo as $v){ 
                                $sonid= $v['catid'].','. $sonid;
                            } 
                            $where=array('catid'=>array('in',$sonid));
                      }
                      //如果没有子栏目
                      else{
                          $where="`catid` = ".$cid;
                      }
                        
              }
              else{
                     $isfather=false; 
                     $where="`catid` = ".$cid;
              }
                    

            $news=M('news');//实例化新闻列表
            $list = $news->where($where)->order('listorder,updatetime desc')->page($_GET['p'].',20')->select();
    
            $this->assign('news_list',$list);// 赋值数据集
            $count      = $news->where('status=99')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->display(); // 输出模板    
    }

  

//单页管理
     public function page(){
      
            $this->Get_page($_GET['cid']);
            $this->display(); // 输出模板    
 }

    //添加一个单页
     public function add_page(){
        if(!empty($_GET['cid'])){
          $pagedata["catid"]=$_GET['cid'];
          $pagedata["title"]="这里填写个标题";
          $pagedata["content"]="这里填写内容";
          $pagedata["read"]="0";
          $pagedata["updatetime"]=time();
          $pagedata['style'] = isset($_POST['style']) ? $_POST['style'] : 'page';
           $pagedata['keywords'] = isset($_POST['keywords']) ? $_POST['keywords'] : ' ';
               $pagedata['elete'] = isset($_POST['elete']) ? $_POST['elete'] : ' ';

          $page=M('page');// 实例化文章模型
          $result= $page->add($pagedata);     

          $url=U('Content/page',array('cid'=>$_GET['cid']));  //跳转网址
                if ($result!==false) 
                { 
                    $this->success("添加成功",$url);
                } 
                else 
                {
                    $this->error("添加失败！",$url);
                }
        }
        else{
                  $url=U('Content/index');  //跳转网址
                   $this->error("未接收到相关数据",$url);
        }
   
         
    }

    //删除一个单页
     public function delete_page(){
        if(!empty($_GET['id'])){
          $page=M('page');// 实例化文章模型
          $result= $page->where('id='.$_GET['id'])->delete();     

          $url=U('Content/page',array('cid'=>$_GET['cid']));  //跳转网址
                if ($result!==false) 
                { 
                    $this->success("删除成功",$url);
                } 
                else 
                {
                    $this->error("删除失败！",$url);
                }
        }
        else{
                  $url=U('Content/index');  //跳转网址
                   $this->error("未接收到相关数据",$url);
        }

    }


    //单页内容管理
     public function edit_page(){


        if(!empty($_POST['dopost'])){


          $pagedata["title"]=$_POST['title'];
          $pagedata["content"]=$_POST['content'];
          $pagedata["updatetime"]=time();
           $pagedata["thumb"]=$_POST['thumb'];
          $pagedata["description"]=$_POST['description'];

          $page=M('page');// 实例化文章模型
      

          $result= $page->where('id='.$_POST['id'])->save($pagedata);       
                if ($result!==false) 
                {
                    $this->success("保存成功",'page/cid/'.$_POST['catid']);
                } 
                else 
                {
                    $this->error("保存失败！");
                }
        }
        else{
                   $this->error("未接收到相关数据");
        }
   
         
    }

    //产品模型
     public function product(){
      
            $cid=$_GET['cid'];
            if(!$cid){
                  $this->error("缺少参数");
            }
            $category=M('category');
            $catinfo =  $category ->where('catid='. $cid)->find();

            //根据是否有子栏目等信息判断查询条件
              if($catinfo['parentid']=='0'){
                      $isfather=true;
                        //判断其包含的子栏目
                      $soninfo =  $category ->where('parentid='. $cid)->select();

                      //如果有子栏目
                      if($soninfo){
                            foreach( $soninfo as $v){ 
                                $sonid= $v['catid'].','. $sonid;
                            } 
                            $where=array('catid'=>array('in',$sonid));
                      }
                      //如果没有子栏目
                      else{
                          $where="`catid` = ".$cid;
                      }
                        
              }
              else{
                     $isfather=false; 
                     $where="`catid` = ".$cid;
              }
            $product=M('product');//实例化新闻列表
            $list = $product->where($where)->order('listorder,updatetime desc')->page($_GET['p'].',20')->select();
            $this->assign('product_list',$list);// 赋值数据集
            $count      = $product->where('status=99')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->display(); // 输出模板    
 }

 //添加媒体模型
public function add_product(){
         $cid=$_GET[cid];
         $this->assign('catid', $cid);//写入栏目id

              if(!empty($_POST['dopost'])){
            if( $_POST['title']==""){
                  $this->error("您有信息未填写");
              }

                $newsdata['catid']=$_POST['catid']; //获取栏目名称
                $newsdata['title']=$_POST['title']; //获取标题
                $newsdata['thumb']=$_POST['thumb']; //获取文章封面
                $newsdata['keywords']=$_POST['keywords']; //获取关键字
                $newsdata['description']=$_POST['description']; //获取描述

                //将资源内容进行数据组装
                $count=count($_POST['filelink']);
               /*  var_dump($_POST['filelink']);
                exit();*/
                for($i=0;$i<$count;$i++) 
                { 
                      $arr = array('link' =>$_POST['filelink'][$i],'type' =>$_POST['filetype'][$i],'name' =>$_POST['filename'][$i],'add'=>$_POST['fileadd'][$i] );
                      $arr2[$i]=$arr;
                } 

              $newsdata['resource']=Array2String($arr2);
                $newsdata['price']=$_POST['price']; //获取价格
                $newsdata['note']=$_POST['note']; //获取推荐语
                $newsdata['buyurl']=$_POST['buyurl']; //获取购买链接
                 $newsdata['option']=$_POST['option']; //获取文章内容
                $newsdata['content']=$_POST['content']; //获取文章内容
                $newsdata['status']='99'; //获取文章状态
                $newsdata['posids']=$_POST['posids']['0']+$_POST['posids']['1']; //查看是否推荐 1 推荐到首页，2推荐到栏目页，3两个都选了
                $newsdata['userid']=$_SESSION['users']['id'];//发布文章人
                 $newsdata['username']=$_SESSION['users']['user'];//发布文章人
                  if($_POST['listorder']!=NULL){          
                   $newsdata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $newsdata['listorder']="9999";//排序位置
                 }
                 
                 $newsdata['url']=$_POST['url'];//跳转链接
                 
           if(strlen($_POST['inputtime'])>1){          
                    $newsdata['inputtime']=strtotime($_POST['inputtime']);
                      $newsdata['updatetime']=$newsdata['inputtime'];
                 }
                 else{
                        $newsdata['inputtime']=time(); //获取文章内容
                        $newsdata['updatetime']=time(); //获取文章内容
                 }

                  if($newsdata['description']==NUll){
                            $newsdata['description']=msubstr($newsdata['body'],0,100);
                       }

          $product=M('product');// 实例化media模型

          $result= $product->add($newsdata);       
                if ($result!==false) 
                {
                    $this->success("保存成功",'product/cid/'.$newsdata['catid']);
                } 
                else 
                {
                    $this->error("保存失败！");
                }
        }
        else{
              $this->display(); // 输出模板  
        }
   
    }




    //媒体模型
     public function media(){
      
            $cid=$_GET['cid'];
            if(!$cid){
                  $this->error("缺少参数");
            }
            $category=M('category');
            $catinfo =  $category ->where('catid='. $cid)->find();

            //根据是否有子栏目等信息判断查询条件
              if($catinfo['parentid']=='0'){
                      $isfather=true;
                        //判断其包含的子栏目
                      $soninfo =  $category ->where('parentid='. $cid)->select();

                      //如果有子栏目
                      if($soninfo){
                            foreach( $soninfo as $v){ 
                                $sonid= $v['catid'].','. $sonid;
                            } 
                            $where=array('catid'=>array('in',$sonid));
                      }
                      //如果没有子栏目
                      else{
                          $where="`catid` = ".$cid;
                      }
                        
              }
              else{
                     $isfather=false; 
                     $where="`catid` = ".$cid;
              }
            $meida=M('media');//实例化新闻列表
            $list = $meida->where($where)->order('listorder,updatetime desc')->page($_GET['p'].',20')->select();
            $this->assign('media_list',$list);// 赋值数据集
            $count      = $meida->where('status=99')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->display(); // 输出模板    
 }

 //添加媒体模型
public function add_media(){
         $cid=$_GET[cid];
         $this->assign('catid', $cid);//写入栏目id

              if(!empty($_POST['dopost'])){
            if( $_POST['title']==""){
                  $this->error("您有信息未填写");
              }

                $newsdata['catid']=$_POST['catid']; //获取栏目名称
                $newsdata['title']=$_POST['title']; //获取标题
                $newsdata['thumb']=$_POST['thumb']; //获取文章封面
                $newsdata['keywords']=$_POST['keywords']; //获取关键字
                $newsdata['description']=$_POST['description']; //获取描述

                //将资源内容进行数据组装
                $count=count($_POST['filelink']);
               /*  var_dump($_POST['filelink']);
                exit();*/
                for($i=0;$i<$count;$i++) 
                { 
                      $arr = array('link' =>$_POST['filelink'][$i],'type' =>$_POST['filetype'][$i],'name' =>$_POST['filename'][$i],'add'=>$_POST['fileadd'][$i] );
                      $arr2[$i]=$arr;
                } 

              $newsdata['resource']=Array2String($arr2);
     
                $newsdata['content']=$_POST['content']; //获取文章内容
                $newsdata['status']='99'; //获取文章状态
                $newsdata['posids']=$_POST['posids']['0']+$_POST['posids']['1']; //查看是否推荐 1 推荐到首页，2推荐到栏目页，3两个都选了
                $newsdata['userid']=$_SESSION['users']['id'];//发布文章人
                 $newsdata['username']=$_SESSION['users']['user'];//发布文章人

                if($_POST['listorder']!=NULL){          
                   $newsdata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $newsdata['listorder']="9999";//排序位置
                 }
                 
                 $newsdata['url']=$_POST['url'];//跳转链接
                 
           if(strlen($_POST['inputtime'])>1){          
                    $newsdata['inputtime']=strtotime($_POST['inputtime']);
                      $newsdata['updatetime']=$newsdata['inputtime'];
                 }
                 else{
                        $newsdata['inputtime']=time(); //获取文章内容
                        $newsdata['updatetime']=time(); //获取文章内容
                 }


                  if($newsdata['description']==NUll){
                            $newsdata['description']=msubstr($newsdata['body'],0,100);
                       }

          $media=M('media');// 实例化media模型

          $result= $media->add($newsdata);       
                if ($result!==false) 
                {
                    $this->success("保存成功",'media/cid/'.$newsdata['catid']);
                } 
                else 
                {
                    $this->error("保存失败！");
                }
        }
        else{
              $this->display(); // 输出模板  
        }
   
    }

   //编辑媒体模型

   public function edit_product(){

        if(!empty($_POST['dopost'])){

                    if( $_POST['title']==""){
                  $this->error("您有信息未填写");
              }

                $newsdata['catid']=$_POST['catid']; //获取栏目名称
                $newsdata['title']=$_POST['title']; //获取标题
                $newsdata['thumb']=$_POST['thumb']; //获取文章封面
                $newsdata['keywords']=$_POST['keywords']; //获取关键字
                $newsdata['description']=$_POST['description']; //获取描述

                //将资源内容进行数据组装
                $count=count($_POST['filelink']);
               /*  var_dump($_POST['filelink']);
                exit();*/
                for($i=0;$i<$count;$i++) 
                {   

                     $arr = array('link' =>$_POST['filelink'][$i],'type' =>$_POST['filetype'][$i],'name' =>$_POST['filename'][$i],'add'=>$_POST['fileadd'][$i] );
                      $arr2[$i]=$arr;
                } 
              $newsdata['resource']=Array2String($arr2);
                $newsdata['price']=$_POST['price']; //获取价格
                $newsdata['note']=$_POST['note']; //获取推荐语
                $newsdata['buyurl']=$_POST['buyurl']; //获取购买链接
                 $newsdata['option']=$_POST['option']; //获取文章内容
                $newsdata['content']=$_POST['content']; //获取文章内容
                $newsdata['status']='99'; //获取文章状态
                $newsdata['posids']=$_POST['posids']['0']+$_POST['posids']['1']; //查看是否推荐 1 推荐到首页，2推荐到栏目页，3两个都选了
                $newsdata['userid']=$_SESSION['users']['id'];//发布文章人
                 $newsdata['username']=$_SESSION['users']['user'];//发布文章人
              
                 if($_POST['listorder']!=NULL){          
                   $newsdata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $newsdata['listorder']="9999";//排序位置
                 }
                 
                 $newsdata['url']=$_POST['url'];//跳转链接
                 
                $newsdata['updatetime']=strtotime($_POST['inputtime']);

                       $where="id=".$_POST['id'];

                           $product=M('product');// 实例化media模型

                $result= $product-> where($where)->save($newsdata);   
                 if ($result!==false) 
                {
                    $this->success("修改成功",'product/cid/'.$newsdata['catid']);
                } 
                else 
                {
                    $this->error("修改失败！");
                }


        
        }
        else{
            
                $id=$_GET['id'];//获取修改id
               $product=M('product');// 实例化User对象
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
                $list = $product->where('id='.$id)->find();
              
               if($list['resource']){
                  $imglist=String2Array($list['resource']);
               }
                $list['updatetime']=date("Y-m-d h:i", $list['updatetime']); //获取文章内容
                $this->assign('imglist',$imglist);// 赋值图片列表
                $this->assign('product',$list);// 赋值数据集
                 $this->display(); // 输出模板  
        }

   
   }

//删除通过媒体模型上传的图片

   public function delete_media_img(){
    $name=$_POST['name'];
    var_dump($name);
      $flies="files/".date('ymd')."/".$name;
      $flies_x="files/".date('ymd')."/thumbnail/".$name;
      $result = unlink ($flies); //删除大图
        unlink ($flies_x); //删除大图

      if ($result == false) { 
            echo 'false misson'; 
            } else { 
            echo 'success'; 
            } 
   }


   //编辑媒体模型

   public function edit_media(){

        if(!empty($_POST['dopost'])){

                    if( $_POST['title']==""){
                  $this->error("您有信息未填写");
              }

                $newsdata['catid']=$_POST['catid']; //获取栏目名称
                $newsdata['title']=$_POST['title']; //获取标题
                $newsdata['thumb']=$_POST['thumb']; //获取文章封面
                $newsdata['keywords']=$_POST['keywords']; //获取关键字
                $newsdata['description']=$_POST['description']; //获取描述

                //将资源内容进行数据组装
                $count=count($_POST['filelink']);
               /*  var_dump($_POST['filelink']);
                exit();*/
                for($i=0;$i<$count;$i++) 
                {   

                     $arr = array('link' =>$_POST['filelink'][$i],'type' =>$_POST['filetype'][$i],'name' =>$_POST['filename'][$i],'add'=>$_POST['fileadd'][$i] );
                      $arr2[$i]=$arr;
                } 
              $newsdata['resource']=Array2String($arr2);

                $newsdata['content']=$_POST['content']; //获取文章内容
                $newsdata['status']='99'; //获取文章状态
                $newsdata['posids']=$_POST['posids']['0']+$_POST['posids']['1']; //查看是否推荐 1 推荐到首页，2推荐到栏目页，3两个都选了
                $newsdata['userid']=$_SESSION['users']['id'];//发布文章人
                 $newsdata['username']=$_SESSION['users']['user'];//发布文章人
               
        if($_POST['listorder']!=NULL){          
                   $newsdata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $newsdata['listorder']="9999";//排序位置
                 }
                 
                 $newsdata['url']=$_POST['url'];//跳转链接
                 
    $newsdata['updatetime']=strtotime($_POST['inputtime']);

                       $where="id=".$_POST['id'];

                           $media=M('media');// 实例化media模型

                $result= $media-> where($where)->save($newsdata);   
                 if ($result!==false) 
                {
                    $this->success("修改成功",'media/cid/'.$newsdata['catid']);
                } 
                else 
                {
                    $this->error("修改失败！");
                }


        
        }
        else{
            
                $id=$_GET['id'];//获取修改id
               $media=M('media');// 实例化User对象
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
                $list = $media->where('id='.$id)->find();
              
               if($list['resource']){
                  $imglist=String2Array($list['resource']);
               }
                 $list['updatetime']=date("Y-m-d h:i", $list['updatetime']); //获取文章内容
                 //var_dump($list);
                $this->assign('imglist',$imglist);// 赋值图片列表
                $this->assign('media',$list);// 赋值数据集
                 $this->display(); // 输出模板  
        }

   
   }
      //加入我们管理
 






    //删除新闻
     public function new_delete(){   
           $id=$_GET['id'];//获取广告id
           $news=M('news');// 实例化广告模型
           $result= $news-> where('id='.$id)->delete();
             if ($result!==false) 
                {
                    $this->success("删除成功！");
                } 
                else 
                {
                    $this->error("删除失败！");
                }
                exit();
    }
    //删除媒体
     public function media_delete(){   
           $id=$_GET['id'];//获取广告id
           $media=M('media');// 实例化广告模型
           $result= $media-> where('id='.$id)->delete();
             if ($result!==false) 
                {
                    $this->success("删除成功！");
                } 
                else 
                {
                    $this->error("删除失败！");
                }
                exit();
    }
      //删除产品
     public function product_delete(){   
           $id=$_GET['id'];//获取广告id
           $product=M('product');// 实例化广告模型
           $result= $product-> where('id='.$id)->delete();
             if ($result!==false) 
                {
                    $this->success("删除成功！");
                } 
                else 
                {
                    $this->error("删除失败！");
                }
                exit();
    }





        //文章添加
       public function add(){
         $cid=$_GET[cid];
         $this->assign('catid', $cid);//写入栏目id

        if(!empty($_POST['dopost'])){
			if( $_POST['title']=="" || $_POST['body']==""){
				    $this->error("您有信息未填写");
				}

                $newsdata['catid']=$_POST['catid']; //获取栏目名称
                $newsdata['title']=$_POST['title']; //获取标题
                $newsdata['thumb']=$_POST['thumb']; //获取文章封面
                $newsdata['keywords']=$_POST['keywords']; //获取关键字
                $newsdata['description']=$_POST['description']; //获取描述

                $newsdata['content']=$_POST['body']; //获取文章内容
                $newsdata['status']='99'; //获取文章状态
                $newsdata['posids']=$_POST['posids']['0']+$_POST['posids']['1']; //查看是否推荐 1 推荐到首页，2推荐到栏目页，3两个都选了
                $newsdata['userid']=$_SESSION['users']['id'];//发布文章人
                 $newsdata['username']=$_SESSION['users']['user'];//发布文章人

                if($_POST['listorder']!=NULL){          
                   $newsdata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $newsdata['listorder']="9999";//排序位置
                 }
                 
                 $newsdata['url']=$_POST['url'];//跳转链接
                 
           if(strlen($_POST['inputtime'])>1){          
                    $newsdata['inputtime']=strtotime($_POST['inputtime']);
                      $newsdata['updatetime']=$newsdata['inputtime'];
                 }
                 else{
                        $newsdata['inputtime']=time(); //获取文章内容
                        $newsdata['updatetime']=time(); //获取文章内容
                 }

                  if($newsdata['description']==NUll){
                            $newsdata['description']=msubstr($newsdata['body'],0,100);
                       }

          $news=M('news');// 实例化文章模型
      

          $result= $news->add($newsdata);       
                if ($result!==false) 
                {
                    $this->success("保存成功",'news/cid/'.$newsdata['catid']);
                } 
                else 
                {
                    $this->error("保存失败！");
                }
        }
        else{
              $this->display(); // 输出模板  
        }
   
    }


    //文章修改
     public function edit(){

        if(!empty($_POST['dopost'])){

        $newsdata['catid']=$_POST['catid']; //获取栏目名称
        $newsdata['title']=$_POST['title']; //获取标题
        $newsdata['thumb']=$_POST['thumb']; //获取文章封面
        $newsdata['keywords']=$_POST['keywords']; //获取关键字
        $newsdata['description']=$_POST['description']; //获取描述
        $newsdata['content']=$_POST['body']; //获取文章内容
         $newsdata['posids']=$_POST['posids']['0']+$_POST['posids']['1']; //查看是否推荐 1 推荐到首页，2推荐到栏目页，3两个都选了
        $newsdata['status']='99'; //获取文章内容
       

        if($_POST['listorder']!=NULL){          
                   $newsdata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $newsdata['listorder']="9999";//排序位置
                 }
                 
                 $newsdata['url']=$_POST['url'];//跳转链接

           $newsdata['updatetime']=strtotime($_POST['inputtime']);

        
          $news=M('news');// 实例化文章模型
         $where="id=".$_POST['id'];

          $result=$news-> where($where)->save($newsdata);   

          //$User->where('id=5')->save($data);    
                if ($result!==false) 
                {
                    $this->success("修改成功",'news/cid/'.$newsdata['catid']);

                } 
                else 
                {
                    $this->error("修改失败！");
                }
        }
        else{
            
                $id=$_GET['id'];//获取修改id
               $news=M('news');// 实例化User对象
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
                $list = $news->where('id='.$id)->find();
                $thiscatid=strval($list[catid]);
                 $this->assign('thiscatid',$thiscatid);// 赋值数据集
               //  var_dump($news['updatetime']);
                   $list['updatetime']=date("Y-m-d h:i", $list['updatetime']); //获取文章内容
                $this->assign('news',$list);// 赋值数据集
                 $this->display(); // 输出模板  
        }
   
    }
       //招聘添加
    public function add_hr(){
        $cid=$_GET[cid];
         $this->assign('catid', $cid);//写入栏目id
        if(!empty($_POST['dopost'])){
          if($_POST['catid']==""||$_POST['title']==""){
              $this->error("您有信息未填写");
          }
        $zhaopindata['catid']=$_POST['catid']; //薪资标准
        $zhaopindata['salary']=$_POST['salary']; //薪资标准
        $zhaopindata['money']=$_POST['money']; //工资
        $zhaopindata['address']=$_POST['address']; //工作地点
        $zhaopindata['text']=$_POST['text']; //获取要求
        $zhaopindata['inputtime']=time(); //获取发布时间
        $zhaopindata['updatetime']=time();
        $zhaopindata['title']=$_POST['title']; //获取职位
        $zhaopindata['workjy']=$_POST['workjy']; //获取工作经验
        $zhaopindata['number']=$_POST['number']; //获取招聘人数
        $zhaopindata['study']=$_POST['study']; //获取最低学历
        $zhaopindata['responsibilities']=$_POST['responsibilities']; //获取岗位职责
        $zhaopindata['ask']=$_POST['ask']; //获取入职要求
        $zhaopindata['style'] = isset($_POST['style']) ? $_POST['style'] : ' ';
        $zhaopindata['workxz'] = isset($_POST['workxz']) ? $_POST['workxz'] : ' ';


                if($_POST['listorder']!=NULL){          
                   $zhaopindata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $zhaopindata['listorder']="9999";//排序位置
                 }
                 
                 $zhaopindata['url']=$_POST['url'];//跳转链接
                 
           if(strlen($_POST['inputtime'])>1){          
                    $zhaopindata['inputtime']=strtotime($_POST['inputtime']);
                      $zhaopindata['updatetime']=$zhaopindata['inputtime'];
                 }
                 else{
                        $zhaopindata['inputtime']=time(); //获取文章内容
                        $zhaopindata['updatetime']=time(); //获取文章内容
                 }


        $hr=M('hr');// 实例化文章模型
      

          $result= $hr->add($zhaopindata);       
                if ($result!==false) 
                {
                    $this->success("保存成功！",'hr/cid/'.$_POST['catid']);
                } 
                else 
                {
                    $this->error("保存失败！");
                }
        }
        else{
              $this->display(); // 输出模板  
        }
   
    }


    //招聘修改
    public function edit_hr(){
       

        if(!empty($_POST['dopost'])){
        $zhaopindata['catid']=$_POST['catid']; 
        $zhaopindata['salary']=$_POST['salary']; //薪资标准
        $zhaopindata['money']=$_POST['money']; //工资
        $zhaopindata['address']=$_POST['address']; //工作地点
        $zhaopindata['text']=$_POST['text']; //获取要求
        $zhaopindata['title']=$_POST['title']; //获取职位
        $zhaopindata['workjy']=$_POST['workjy']; //获取工作经验

        $zhaopindata['number']=$_POST['number']; //获取招聘人数
        $zhaopindata['study']=$_POST['study']; //获取最低学历
        $zhaopindata['responsibilities']=$_POST['responsibilities']; //获取岗位职责
        $zhaopindata['ask']=$_POST['ask']; //获取入职要求
      if($_POST['listorder']!=NULL){          
                   $zhaopindata['listorder']=$_POST['listorder'];//排序位置
                 }
                 else{
                        $zhaopindata['listorder']="9999";//排序位置
                 }
                 
                 $zhaopindata['url']=$_POST['url'];//跳转链接
                 
       $zhaopindata['updatetime']=strtotime($_POST['inputtime']);

          $hr=M('hr');// 实例化文章模型
         $where="id=".$_POST['id'];

          $result=$hr-> where($where)->save($zhaopindata);  
		 
                if ($result!==false) 
                {
                  $this->success("修改成功",'hr/cid/'.$_POST['catid']);
                } 
                else 
                {
                    $this->error("修改失败！");
                }
        }
        else{
            
                $id=$_GET['id'];//获取修改id
                $hr=M('hr');// 实例化User对象
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
                $list = $hr->where('id='.$id)->find();
                 $thiscatid=strval($list[catid]);
                  $list['updatetime']=date("Y-m-d h:i", $list['updatetime']); //获取文章内容
                 $this->assign('thiscatid',$thiscatid);// 赋值数据集      
                $this->assign('hr',$list);// 赋值数据集
                 $this->display(); // 输出模板  
        }
   
    }

   //招聘删除
    public function hr_delete(){   
            $id=$_GET['id'];//获取广告id
           $hr=M('hr');// 实例化广告模型
            $result= $hr-> where('id='.$id)->delete();  
             if ($result!==false) 
                {
                    $this->success("删除成功！");
                } 
                else 
                {
                    $this->error("删除失败！");
                }
                exit();
    }


  

    //图片上传函数
    public function uploadimg(){
       
       //var_dump($_POST);
       // require('UploadHandler.php');
       // $time = time();
       // $forup = array('user_id' => date("ymd",$time));
       // $upload_handler = new UploadHandler($forup);

      $setting=C('UPLOAD_SITEIMG_QINIU');
      $Upload = new \Think\Upload($setting);
      $file[0]=$_FILES['files'];
      $info = $Upload->upload($file);
      //var_dump($info);
     if($info){
           $files[files][0]= array(
            'name' =>$info[0]['name'],
            'size'=>$info[0]['size'],
            'type'=>$info[0]['type'],
            'url'=>$info[0]['url'],
            'thumbnailUrl'=>$info[0]['url'],
            'deleteUrl'=>$info[0]['url'],
            'deleteType'=>"DELETE"
            );
           echo json_encode($files);
      }
      else{
        // var_dump($up->getErrorMsg());
      }



        // {"files":[{"name":"20160717153445_530.jpg","size":262506,"type":"image\/jpeg","url":"http:\/\/localhost\/demo\/files\/160717\/20160717153445_530.jpg","thumbnailUrl":"http:\/\/localhost\/demo\/files\/160717\/thumbnail\/20160717153445_530.jpg","deleteUrl":"http:\/\/localhost\/demo\/index.php?file=20160717153445_530.jpg","deleteType":"DELETE"}]}


	 $mark=$_GET['mark'];
       
	    //判断是否添加水印
   //       $news=M('sy');
		 // $list=$news->find();	 
		 // if($list['markup']==1&&$mark==null){ 
			//  //水印上传
			// $imgup=$upload_handler->response;//获取上传文件信息
			// $imginfo=  $this->object2array($imgup['files']['0']);
			// $savelink="files/".date('ymd')."/";
			// $imgurl=$savelink.$imginfo['name'];
			// //覆盖图片
			// $this->watermarker($imginfo['name'],$savelink);//生成水印
		 // }


    }




     public  function object2array($object) {
    $object = json_decode( json_encode( $object),true);
    return $object;
    }
    
    //编辑器图片上传接口
    public function uploadimgfromeditor(){
        require('uploads.php');
      //  $upload_handler = new FileUpload($forup);
        $up = new fileupload;
        //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
        $up -> set("path", "./Uploads/".date('ymd')."/");
        $up -> set("maxsize", 2000000);
        $up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
        $up -> set("israndname", true);
        //var_dump($_POST['original_filename']);		  
        //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
        if($up -> upload('fileData')) {       
            //获取上传后文件名子
            $file_Name=$up->getFileName();
            $file_path=__ROOT__."/Uploads/".date('ymd')."/";
            $file_path2="Uploads/".date('ymd')."/";//水印需要相对路径
            $msg = Array('success'=>'true', 'file_path'=>$file_path.$file_Name);
			//判断是否添加水印
         $news=M('sy');
		 $list=$news->find();	 
		 if($list['marwz']==1){ 
            //覆盖图片
	        $this->watermarker($file_Name,$file_path2);
			}
             echo json_encode($msg);	
        } else {
            //获取上传失败以后的错误提示
            var_dump($up->getErrorMsg());
    
        }
        
    }


    //编辑器图片上传接口
    public function uploadimgfromeditor_w(){
       

      $setting=C('UPLOAD_SITEIMG_QINIU');
      $Upload = new \Think\Upload($setting);
      $file[0]=$_FILES['wangEditorH5File'];
      $info = $Upload->upload($file);
  
      if($info){
        echo $info[0]['url'];
      }
      else{
        var_dump($up->getErrorMsg());
      }

    /*    if($up -> upload('wangEditorH5File')) {    
            //获取上传后文件名子
            $file_Name=$up->getFileName();
            $file_path=__ROOT__."/Uploads/".date('ymd')."/";
            $file_path2="Uploads/".date('ymd')."/";//水印需要相对路径
            $msg = $file_path.$file_Name;
      //判断是否添加水印
         $news=M('sy');
         $list=$news->find();  
         if($list['marwz']==1){ 
                //覆盖图片
              $this->watermarker($file_Name,$file_path2);
          }
             echo $msg;  
        } else {
            //获取上传失败以后的错误提示
            var_dump($up->getErrorMsg());
    
        }*/
        
    }


    //水印处理
    private function watermarker($filename,$savelink,$direction,$opcity){
		
		  $news=M('sy');
		  $list=$news->find();
		
      $direction=$direction ? $direction : $list['waterpos'] ;
      $opcity=$opcity ? $opcity: $list['diaphaneity']; 
             //给上传的图片添加水印
      $image = new \Think\Image();
      $savelink=$savelink;
      $imgurl=$savelink.$filename;
     $array=explode('/',$list['newimg']);
       $shi=$array[5];
     $img=trim(strrchr($list['newimg'], '/'),'/');
      $image->open($imgurl)->water('./files/'.$shi.'/'.$img,$direction,$opcity)->save($imgurl);
 
    }





  
  //获取栏目设置组列表信息
     private function Get_setgroup($catid) {

            $catinfo=M('category')->where('catid='.$catid)->find();

             if($catinfo['parentid']=='0'){
                $where='catid='.$catid;
             }
             else{
               $where=array("catid"=>array("in",$catid.",".$catinfo['parentid'])) ;
             }

             $setgroup_list=M('catset_list');
              $list =  $setgroup_list ->where($where)->select();
                        for($i = 0;$i< count($list);$i++){
                             if($list[$i]['img']){
                              $list[$i][img]=String2Array($list[$i]['img']);
                           }

                    } 

            $this->assign('catset_list',$list);
    }


 //获取单页设置信息
     private function Get_page($catid) {
            $page=M('page');
            $page_info =  $page ->where('catid='.$catid)->order('id')->select();
            $this->assign('page',$page_info);
    }



  //添加栏目内容设置组
      public function add_setGroup(){
            $ad=M('catset_group');
            $newdata['name']=$_POST['name']; //获取titile
            $newdata['des']=$_POST['des']; //获取描述
            $newdata['catid']=$_POST['catid']; //获取栏目id
            $newdata['creattime']=time(); //获取创建时间                   
            $result=$ad->add($newdata);  
            if($result){
                echo "1";
            }
            else{
                echo '2';
            }            
    }

     //编辑栏目设置内容
      public function edit_setGroup(){

            $ad=M('catset_group');
            $newdata['id']=$_POST['id']; //获取更改值
            $newdata['name']=$_POST['name']; //获取更改值
            $newdata['des']=$_POST['des']; //获取更改描述
            $newdata['catid']=$_POST['catid']; 
            $where="id=".$newdata['id'];  
            $result=$ad->where($where)->save($newdata);  
            if($result){
                echo "1";
            }
            else{
                echo '2';
            }

 }


//删除栏目内容设置组及成员设置
public function deleteadgroup(){
            $id=$_GET['id'];//获取设置id
           $catset_group=M('catset_group');
            $result= $catset_group-> where('id='.$id)->delete();  
            $catset_list=M('catset_list');
            $result= $catset_list-> where('gid='.$id)->delete(); 

             if ($result!==false) 
                            {
                                $this->success("删除成功！");
                            } 
                            else 
                            {
                                $this->error("删除失败！");
                            }

            exit();

            
    }


    //展示栏目内容设置内容
      public function catset(){
                

                $gid=$_GET['gid'];//获取广告id
                $catset_list=M('catset_list');
                $list = $catset_list->where('gid='.$gid)->select();
                $this->assign('catset_list',$list);
                 $this->assign('gid',$gid);

                $catset_group=M('catset_group');
                $group= $catset_group->where('id='.$gid)->find();
                 $this->assign('group',$group);

            $this->display();       
    }

    //删除栏目内容设置
public function delete_setcat(){
            $id=$_GET['id'];//获取设置id
            $catset_list=M('catset_list');
            $result= $catset_list-> where('id='.$id)->delete(); 
            exit();

            
    }


    //添加栏目设置
      public function addset(){
              
              if(!empty($_POST['dopost'])){
                var_dump($_POST['catid']);
                    $newdata['gid']=$_POST['catid']; //获取广告组标识
                    $newdata['catid']=$_POST['catid']; 
                    $newdata['name']=$_POST['name']; //获取标题
                    $newdata['value']=$_POST['value']; //获取文章封面
                  //  $newdata['img']=$_POST['img']; //获取图片
                    $newdata['img_link']=$_POST['img_link']; //获取图片链接
                    $newdata['text']=$_POST['text']; //获取文字
                    $newdata['text_link']=$_POST['text_link']; //获取文字链接
                    $newdata['type']=$_POST['type']; //获取文章内容
                    if($newdata['type']=="img"){
                          //将资源内容进行数据组装
                            $count=count($_POST['filelink']);
                           /*  var_dump($_POST['filelink']);
                            exit();*/
                            for($i=0;$i<$count;$i++) 
                            { 
                                  $arr = array('link' =>$_POST['filelink'][$i],'type' =>$_POST['filetype'][$i],'name' =>$_POST['filename'][$i],'add'=>$_POST['fileadd'][$i] );
                                  $arr2[$i]=$arr;
                            } 
                          $newdata['img']=Array2String($arr2);
                    }
                    $newdata['status']='1'; //获取文章内容
                    $newdata['creattime']=time(); //获取文章内容
                    $adlist=M('catset_list');// 实例化文章模型
                     $result=$adlist-> add($newdata);   

                   
                       if($newdata['catid']=='0'){
                        $gourl="index";
                       }
                     else{
                        $catinfo=M('category')->where('catid='.$newdata['catid'])->find();
                        $gourl=$catinfo["module"]."/cid/".$newdata['catid'];
                     }
                      //$User->where('id=5')->save($data);    
                            if ($result!==false) 
                            {
                               $this->success("添加成功！",$gourl);
                            } 
                            else 
                            {
                                $this->error("添加失败！");
                            }
                    }
                    else{
                        
                        $cid=$_GET['cid'];//获取栏目id
                        if($cid==0){
                          $catlist1 = array('catid' => '0','catname' => '首页' );
                           $catlist[0]=$catlist1;
                        }
                        else{
                           $catlist1=M('category')->where('catid='.$cid)->find();

                           if($catlist1["parentid"]=='0'){
                                $catlist2= M('category')->where('parentid='.$cid)->select();
                                $catlist3[count($catlist2)]=$catlist1;
                           }
                           else{
                                 $catlist2= M('category')->where('parentid='.$catlist1["parentid"])->select();
                                 $catlist4= M('category')->where('catid='.$catlist1["parentid"])->find();
                                  $catlist4['catname']=$catlist4['catname']."下通用";
                                 $catlist3[count($catlist2)]=$catlist4;
                           }

                           

                            $catlist=array_merge($catlist3,$catlist2);

                        }

                        $type=$_GET['type'];//获取添加栏目类型
                        $this->assign('gid',$gid);
                        $cat=M('catset_group');
                        $list =   $cat ->select();
                        $this->assign('catlist',$catlist);
                         if($type=="img"){
                            $this->display('addsetimg'); // 输出模板 
                         }
                         else{
                            $this->display('addsettext'); // 输出模板 
                         }
                        
                    }
    }

    public function editset(){
              
              if(!empty($_POST['dopost'])){

                    $id=$_POST['id']; //获取广告组标识
                    $newdata['gid']=$_POST['catid']; //获取广告组标识
                    $newdata['catid']=$_POST['catid']; 
                    $newdata['name']=$_POST['name']; //获取标题
                    $newdata['value']=$_POST['value']; //获取文章封面
          
                    $newdata['img_link']=$_POST['img_link']; //获取图片链接
                    $newdata['text']=$_POST['text']; //获取文字
                    $newdata['text_link']=$_POST['text_link']; //获取文字链接
                    $newdata['status']='1'; //获取文章内容
                    $newdata['type']=$_POST['type']; //获取类型
                    $newdata['creattime']=time(); //获取文章内容
                    $adlist=M('catset_list');// 实例化文章模型
                      if($newdata['type']=="img"){
                          //将资源内容进行数据组装
                            $count=count($_POST['filelink']);
                           /*  var_dump($_POST['filelink']);
                            exit();*/
                            for($i=0;$i<$count;$i++) 
                            { 
                                  $arr = array('link' =>$_POST['filelink'][$i],'type' =>$_POST['filetype'][$i],'name' =>$_POST['filename'][$i],'add'=>$_POST['fileadd'][$i] );
                                  $arr2[$i]=$arr;
                            } 
                          $newdata['img']=Array2String($arr2);
                    }

                     $result=$adlist->where("id=".$id)-> save($newdata);   

                         if($newdata['catid']=='0'){
                        $gourl="index";
                       }
                     else{
                        $catinfo=M('category')->where('catid='.$newdata['catid'])->find();
                        $gourl=$catinfo["module"]."/cid/".$newdata['catid'];
                     }

                      //$User->where('id=5')->save($data);    
                            if ($result!==false) 
                            {
                                $this->success("修改成功！", $gourl);
                            } 
                            else 
                            {
                                $this->error("修改失败！");
                            }
                    }
                    else{

                    $cid=$_GET['cid'];//获取栏目id

                        if($cid==0){
                          $catlist1 = array('catid' => '0','catname' => '首页' );
                           $catlist[0]=$catlist1;
                        }
                        else{
                           $catlist1=M('category')->where('catid='.$cid)->find();
                           if($catlist1["parentid"]=='0'){
                                $catlist2= M('category')->where('parentid='.$cid)->select();
                                $catlist3[count($catlist2)]=$catlist1;
                           }
                           else{
                              
                                $catlist2= M('category')->where('parentid='.$catlist1["parentid"])->select();
                                 $catlist4= M('category')->where('catid='.$catlist1["parentid"])->find();
                                  $catlist4['catname']=$catlist4['catname']."下通用";
                                 $catlist3[count($catlist2)]=$catlist4;

                           }


                            $catlist=array_merge($catlist3,$catlist2);
                        }

                        $id=$_GET['id'];//获取id
                        $type=$_GET['type'];//获取添加栏目类型
                        $this->assign('catlist',$catlist);
                        //调用信息
                        $cat_info=M('catset_list');
                        $info=$cat_info->where('id='.$id)->find();
                          if($info['img']){
                              $imglist=String2Array($info['img']);
                           }

                        $this->assign('imglist',$imglist);// 赋值图片列表
                        $this->assign('info',$info);
                          $this->assign('cid',$cid);


                         if($info['type']=="img"){
                            $this->display('editsetimg'); // 输出模板 
                         }
                         else{
                            $this->display('editsettext'); // 输出模板 
                         }
                        
                    }
    }


    //搜素
    public function search(){
        $key=$_GET['key'];

      //  var_dump($key);
        $where="`title` LIKE '%".$key."%' OR `content` LIKE '%".$key."%'";
             $where3="`title` LIKE '%".$key."%' OR `responsibilities` LIKE '%".$key."%'";
        $news=M('news');//实例化新闻模块
        $result1=$news->where($where)->select();//新闻结果

        $product=M('product');//实例化产品模型
        $result2=$product->where($where)->select();//产品结果

        $media=M('media');//实例化媒体模型
        $result3=$media->where($where)->select();//媒体结果

        $hr=M('hr');//实例化hr模型
        $result4=$hr->where($where3)->select();//hr结果

        
        $page=M('page');//实例化单页模型
        $result5=$page->where($where)->select();//单页结果


     

      



          $result=array_merge($result1,$result2,$result3,$result4,$result5);//将搜索结果进行合并
            $Page       = new \Think\Page(count($result),10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            //$list = $User->where('status=1')->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();

              for ($i= $Page->firstRow;$i< $Page->firstRow+10; $i++){
                      if(!$result[$i]==NULL){
                        $list[$i]=$result[$i];
                      }
                        
                  } 
        $this->assign('searchkey',$key);
        $this->assign('searchamount',count($result));
        $this->assign('search',$list);
        $this->assign('page',$show);// 赋值分页输出

         $this->display(); 
        
    }


}