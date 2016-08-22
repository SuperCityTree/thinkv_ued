<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends CommonController {
    public function index(){
        //检查配置状态
         $setting=M('sysconfig');
         $list=$setting->where("varname='cfg_setstatus'")->find(); 
         switch ($list[value]) {
             case 0://网站基本信息设置
                  $this->redirect('Center/setting');
                 break;
            case 1://网站栏目信息设置
                $this->redirect('Center/chosecategory');
                 break;
             
             default:

                 break;
         }

        $this->show();
    }

    //网站登陆配置页面
       public function setting(){
                         $admin=M('admin');
                        $list =  $admin ->select();
                        $this->assign('admin_list',$list);
                        $setting=M('sysconfig');//获取系统设置信息
                        $where1="groupid=1";
                        $where2="groupid=2";
                        $where3="groupid=3";
                        $list_1 =  $setting->where($where1) ->select();//获取基础配置
                        $list_2 =  $setting->where($where2) ->select();//获取拓展配置
                        $list_3 =  $setting->where($where3) ->select();//获取自定义配置
                        $this->assign('set_list_1',$list_1);
                         $this->assign('set_list_2',$list_2);
                          $this->assign('set_list_3',$list_3);

                         $list_1_logo=$setting->where("groupid=1 and aid=1")->find();
                         $this->assign("logo",$list_1_logo);

                     $this->show();
    }

       //网站管理员管理
       public function admin(){
                        $admin=M('admin');
                        $list =  $admin ->select();
                        $this->assign('admin_list',$list);
                        $this->show();
    }


        //网站主题管理
       public function theme(){

                    $theme = $this->getDir("Theme/Ue");//获取主题列表
                    $cfg_theme=getconfig('cfg_theme');
                    foreach ($theme as $key => $value) {
                        $themelist[$key]["title"]=$theme[$key];
                        $themelist[$key]["thumb"]=__ROOT__."/Theme/Ue/".$theme[$key]."/theme.png";
                        if($themelist[$key]["title"]==$cfg_theme){
                            $themelist[$key]["usable"]=1;
                        }
                    }
                      
        
                    $DataDir = "Theme/Ue/".$cfg_theme;             
                    $sqldata = $this->MyScandir($DataDir);
                    $this->assign("sqldata", $sqldata);

                    $this->assign('themelist',$themelist);
                    $this->show();
    }
    

    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
           if($this->getFileType($filename)=="sql"){
            $FileAndFolderAyy[] = $filename;
          }
        }
       
        return $FileAndFolderAyy;
    }

     private   function getFileType($filename) {
            return substr($filename, strrpos($filename, '.') + 1);
      }

       //数据库备份
    public function themedata() {

                
        $cfg_theme=getconfig('cfg_theme');
        $DataDir = "Theme/Ue/" .$cfg_theme;
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
           if ($_GET['Action'] == 'RL') {
                $mr->recover($_GET['File']);
                echo "<script>document.location.href='" . U("center/theme") . "'</script>";
//                $this->success( '数据库还原成功！');
            }
        }

        $lists = $this->MyScandir('databak/');
        $this->assign("datadir",$DataDir);
        $this->assign("lists", $lists);

        $this->display();
    }


      //网站主题管理
       public function chanage_theme(){

                        $setting=M('sysconfig');
                        $setting-> where('aid=65')->setField('value',$_GET['name']);
                        $this->success("启用成功",$url);
                        exit();
                     
    }





        //删除配置项目
       public function delete_setting(){
                         $setting=M('sysconfig');
                          $where="aid=".$_GET['id'];
                           $result=$setting-> where($where)->delete();  
                               exit();
                     
    }
       //网站配置编辑
    public function edit_setting(){
                         $setting=M('sysconfig');
                        $newdata['value']=$_POST['value']; //获取更改值
                        $where="aid=".$_POST['id'];
                        $result=$setting-> where($where)->save($newdata);  
                        exit();
                     
    }
     //添加网站配置信息
    public function add_setting(){
                         $setting=M('sysconfig');
                        $newdata['value']=$_POST['value']; //获取更改值
                        $newdata['info']=$_POST['info']; //获取更改描述
                         $newdata['varname']=$_POST['varname']; //获取更改描述
                        $newdata['groupid']='3'; //添加到自定义配置项目中去
                        $newdata['type']='string'; //添加到自定义配置项目类型
                        $result=$setting->add($newdata);  
                        exit();
                     
    }





    //修改管理员密码
       public function editadmin(){
                      
                 $admin=M('admin');
                $newdata['id']=$_POST['id']; //获取栏目名称
                $oldpassword=$_POST['old-password'];//获取旧的密码
                $newdata['password']=md5($_POST['new-password']); //获取新密码
                 $where="id=".$_POST['id'];

                //验证旧密码

                $pwd=md5($oldpassword); 
                $list=$admin->where("id='{$newdata['id']}'")->find();  

                if($list){
                    if($list['password']==$pwd){
                        $result=$admin-> where($where)->save($newdata); 
                        unset($_SESSION['users']);
                        echo "1";

                    }
                    else{
                        echo "2";
                    }
                }else{

                    echo "3";
                }
   
         }

    //添加新的管理员
    public function addadmin(){
        $admin=M('admin');
        
        if($_POST['user']&&$_POST['password']){
            $newdata['password']=md5($_POST['password']); //获取密码
            $newdata['user']=$_POST['user']; //获取用户名
            $newdata['pid']=0; //获取管理员类型
            $newdata['aid']=0; //获取管理员类型
            $result=$admin->add($newdata);  

        }

        exit();
     
   

    }

    //删除管理员
    public function deleteadmin(){
        $admin=M('admin');
        
       $where="id=".$_POST['id'];
        $result=$admin-> where($where)->delete();  
     
   

    }



      //网站登陆配置页面
       public function chosecategory(){
                        $category=M('category');

                         $list =  $category ->limit(100)->select();
                       //  var_dump($list);

                         $this->assign('category_list',$list);

                       $this->show();
        }

        //网站登陆配置页面
       public function save_category(){
                   $category=M('category');
                   $setting=M('sysconfig');
                    // 要修改的数据对象属性赋值
                     $list =  $category ->limit(100)->select();
                     //循环检查改变值
                     for ($i=0; $i<count($list); $i++) { 

                            $date['catid'] = $list[$i][catid];

                            //如果没有填写栏目名称，则重新不修改栏目名称
                            if($_POST['catname'][$list[$i][catid]]==""){
                                  unset($date['catname']);
                            }else{
                                 $date['catname']=$_POST['catname'][$list[$i][catid]];
                            }

                            $date['description']=$_POST['description'][$list[$i][catid]];
 
                             $category->save($date);
                         } 
                    $setting->where("varname='cfg_setstatus'")->setField('value','2'); //网站栏目已经设置完毕
        }

        //获取要清除的目录和目录所在的绝对路径
 public function cache(){
  ////前台用ajax get方式进行提交的，这里是先判断一下
  if($_POST['type']){
   //得到传递过来的值
   $type=$_POST['type'];
   //将传递过来的值进行切割，我是用“-”进行切割的
   $name=explode('-', $type);
   //得到切割的条数，便于下面循环
   $count=count($name);
   //循环调用上面的方法
   for ($i=0;$i<$count;$i++){
    //得到文件的绝对路径
    $abs_dir=dirname(dirname(dirname(dirname(__FILE__))));
    //组合路径
    $pa=$abs_dir.'indexRuntime';
    $runtime=$abs_dir.'indexRuntime~runtime.php';
    if(file_exists($runtime))//判断 文件是否存在
    {
     unlink($runtime);//进行文件删除
    }
 //调用删除文件夹下所有文件的方法
    $this->rmFile($pa,$name[$i]); 
   }
   //给出提示信息
   $this->ajaxReturn(1,'清除成功',1);
  }else{
   $this->display();
  }
 }
 public function rmFile($path,$fileName){//删除执行的方法
  //去除空格
  $path = preg_replace('/(/){2,}|{}{1,}/','/',$path); 
  //得到完整目录 
  $path.= $fileName;
  //判断此文件是否为一个文件目录
  if(is_dir($path)){
   //打开文件
   if ($dh = opendir($path)){
    //遍历文件目录名称
     while (($file = readdir($dh)) != false){
      //逐一进行删除
      unlink($path.''.$file);
      }
      //关闭文件
      closedir($dh);
    } 
   }
 }

//获取文件目录列表,该方法返回数组
private function getDir($dir) {
    $dirArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".."&&!strpos($file,".")) {
                $dirArray[$i]=$file;
                $i++;
            }
        }
        //关闭句柄
        closedir ( $handle );
    }
    return $dirArray;
}
 
//获取文件列表
private function getFile($dir) {
    $fileArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".."&&strpos($file,".")) {
                $fileArray[$i]="./imageroot/current/".$file;
                if($i==100){
                    break;
                }
                $i++;
            }
        }
        //关闭句柄
        closedir ( $handle );
    }
    return $fileArray;
}

    



}