<?php
namespace Home\Controller;
use Think\Controller;
class ToolsController extends CommonController {
    public function index(){
       

            $this->redirect('tools/msg');
    }


    //反馈列表页面
     public function msg(){
            $msg=M('msg');
             $list =   $msg ->order('applytime desc')->select();
            $this->assign('msg_list',$list);

           

            $this->display(); // 输出模板    
    }

  //反馈列表页面
     public function getmsg(){
            $id=$_GET['id'];
            $msg=M('msg');
             $list =   $msg ->where('id='.$id)->find();
             $msg ->where('id='.$id)->setField('read','0');
            $list['applytime']=date('Y-m-d H:i:s',$list['applytime']);
             $list= json_encode($list);

            echo $list;
    }

    //预约申请表
     public function getyuyue(){
            $id=$_GET['id'];
            $yuyue=M('yuyue');
             $list =   $yuyue ->where('id='.$id)->find();
             $yuyue ->where('id='.$id)->setField('read','0');
            $list['applytime']=date('Y-m-d H:i:s',$list['applytime']);
             $list= json_encode($list);

            echo $list;
    }

public function deletemsg(){
         $id=$_GET['id'];
            $msg=M('msg');
             $result=   $msg ->where('id='.$id)->delete();
               if ($result!==false) 
                            {
                                $this->success("删除成功");
                            } 
                            else 
                            {
                                $this->error("删除失败");
                            }
            
}
public function deleteyuyue(){
         $id=$_GET['id'];
            $yuyue=M('yuyue');
             $result= $yuyue ->where('id='.$id)->delete();
               if ($result!==false) 
                            {
                                $this->success("删除成功");
                            } 
                            else 
                            {
                                $this->error("删除失败");
                            }
            
}

      //反馈列表页面
     public function addmsg(){
     
                //发送邮件
             //think_send_mail('445727430@qq.com', '王鹏', '来自网站的信息反馈', "这个是文件的内容");

            echo $list;
    }




     public function ad(){

            $ad=M('ad');
            $list =   $ad ->select();
            $this->assign('ad_list',$list);

            $this->display(); // 输出模板    
    }
    //广告列表页面
     public function adlist(){

               $id=$_GET['id'];//获取广告id
                $ad_list=M('ad_list');
                $list = $ad_list->where('gid='.$id)->select();
                $this->assign('ad_list',$list);
                 $this->assign('gid',$id);

            $this->display(); // 输出模板    
    }
     //添加广告
      public function addad(){
              if(!empty($_POST['dopost'])){
                    $newdata['gid']=$_POST['gid']; //获取广告组标识
                    $newdata['name']=$_POST['name']; //获取标题
                    $newdata['value']=$_POST['value']; //获取文章封面
                    $newdata['img']=$_POST['img']; //获取图片
                    $newdata['link']=$_POST['link']; //获取图片
                    $newdata['status']='1'; //获取文章内容
                    $newdata['creattime']=time(); //获取文章内容
                    $adlist=M('ad_list');// 实例化文章模型
                     $result=$adlist-> add($newdata);   
                      //$User->where('id=5')->save($data);    
                            if ($result!==false) 
                            {
                                $this->success("添加成功！",'ad/');
                            } 
                            else 
                            {
                                $this->error("修改失败！");
                            }
                    }
                    else{
                        
                         $gid=$_GET['gid'];//获取广告id
                        $this->assign('gid',$gid);
                        $ad=M('ad');
                        $list =   $ad ->select();
                        $this->assign('ad_list',$list);

                        $this->display(); // 输出模板 
                    }
    }


    //编辑广告内容
    public function editad(){

      

        if(!empty($_POST['dopost'])){

      
        $newdata['name']=$_POST['name']; 
        $newdata['link']=$_POST['link']; 
        $newdata['value']=$_POST['value']; 
        $newdata['img']=$_POST['img']; //获取描述
       
        $newdata['creattime']=time(); //
        
          $adlist=M('ad_list');// 实例化文章模型
         $where="id=".$_POST['id'];

          $result=$adlist-> where($where)->save($newdata);   

          //$User->where('id=5')->save($data);    
                if ($result!==false) 
                {
                    $this->success("修改成功！",'ad/');
                } 
                else 
                {
                    $this->error("修改失败！");
                }
        }
        else{
            
                $id=$_GET['id'];//获取修改id
               $adlist=M('ad_list');// 实例化广告列表
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
                $list = $adlist->where('id='.$id)->find();
                $list['gid']=strval($list['gid']); 
                //var_dump($list['gid']);
                $this->assign('ad',$list);// 赋值数据集
                $ad=M('ad'); //实例化广告组列表
                $list =   $ad ->select();
                $this->assign('ad_list',$list);
                 $this->display(); // 输出模板  
        }
   
    }


    //删除广告
      public function deletead(){


             $id=$_GET['id'];//获取广告id
           $adlist=M('ad_list');// 实例化广告模型
            $result= $adlist-> where('id='.$id)->delete();  

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



  //添加广告组
      public function add_adGroup(){

            $ad=M('ad');
            $newdata['name']=$_POST['name']; //获取更改值
            $newdata['des']=$_POST['des']; //获取更改描述
            $newdata['creattime']=time(); //获取更改描述
                     
            $result=$ad->add($newdata);  

            if($result){
                echo "1";
            }
            else{
                echo '2';
            }
           

            
    }

      //编辑广告组
      public function edit_adGroup(){

            $ad=M('ad');
            $newdata['id']=$_POST['id']; //获取更改值
            $newdata['name']=$_POST['name']; //获取更改值
            $newdata['des']=$_POST['des']; //获取更改描述
            $where="id=".$newdata['id'];       
            $result=$ad->where($where)->save($newdata);  
            if($result){
                echo "1";
            }
            else{
                echo '2';
            }

 }
           

            


//删除广告组
 public function deleteadgroup(){

            $id=$_GET['id'];//获取广告id
           $ad=M('ad');// 实例化广告模型
            $result= $ad-> where('id='.$id)->delete();  

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

    //数据库备份
    public function bakdate() {
        $DataDir = "databak/";
        mkdir($DataDir);
        if (!empty($_GET['Action'])) {
            import("Common.Org.MySQLReback");
            $config = array(
                'host' => C('DB_HOST'),
                'port' => C('DB_PORT'),
                'userName' => C('DB_USER'),
                'userPassword' => C('DB_PWD'),
                'dbprefix' => C('DB_PREFIX'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0
            );
            $mr = new MySQLReback($config);
            $mr->setDBName(C('DB_NAME'));
            if ($_GET['Action'] == 'backup') {
                $mr->backup();
                echo "<script>document.location.href='" . U("tools/bakdate") . "'</script>";
//                $this->success( '数据库备份成功！');
            } elseif ($_GET['Action'] == 'RL') {
                $mr->recover($_GET['File']);
                echo "<script>document.location.href='" . U("tools/bakdate") . "'</script>";
//                $this->success( '数据库还原成功！');
            } elseif ($_GET['Action'] == 'Del') {
                if (@unlink($DataDir . $_GET['File'])) {
                    // $this->success('删除成功！');
                    echo "<script>document.location.href='" . U("tools/bakdate") . "'</script>";
                } else {
                    $this->error('删除失败！');
                }
            }
            if ($_GET['Action'] == 'download') {

                function DownloadFile($fileName) {
                    ob_end_clean();
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                    header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . $_GET['file']);
                exit();
            }
        }
        $lists = $this->MyScandir('databak/');
        $this->assign("datadir",$DataDir);
        $this->assign("lists", $lists);

        $this->display();
    }

    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }


    //水印设置
     public function add_sy(){
        if(!empty($_POST['dopost'])){
      $shuiyindate['markup']=$_POST['markup']; //文章缩略图
	  $shuiyindate['marwz']=$_POST['marwz']; //文章内容
      $shuiyindate['newimg']=$_POST['newimg'];   //水印图片                    度
      $shuiyindate['waterpos']=$_POST['waterpos'];       //水印图片所在位置
      $shuiyindate['diaphaneity']=$_POST['diaphaneity'];  //水印图片的透明度    

           $news=M('sy');// 实例化文章模型
             $where="id=1";
         
           $result=$news-> where($where)->save($shuiyindate);
		   
		     
                 if ($result!==false) 
                {
                    $this->success("修改成功！");
					exit;
                } 
                else 
                {
                    $this->error("修改失败！");
                }
        }
        else{ 
              
               $news=M('sy');// 实例化User对象
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
                $list = $news->where('id=1')->find();          
                $this->assign('sy',$list);// 赋值数据集       
              $this->display(); // 输出模板  
        }
    }
    

}




?>