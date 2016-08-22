<?php
namespace Home\Controller;
use Think\Controller;
class StoreController extends Controller {


    public function new_delete(){
         
		$id=I('id');//获取分中心id
		$inchina=M('inchina');// 实例化分中心模型
		$result= $inchina-> where('id='.$id)->delete();

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

        $this->Get_category();//获取栏目名称
        $this->Get_category_son('20'); //获取子栏目
        $id=$_GET[id];
        $this->assign('catid', $id);//写入栏目id
		$presult=M('province')->select();
		$this->assign('presult',$presult);
        if(!empty($_POST['dopost'])){
        $newsdata['catid']=$_POST['catid']; //获取栏目名称
        $newsdata['title']=$_POST['title']; //获取标题
        $newsdata['provinceid']=$_POST['provinceid']; //获取省份id		
        $newsdata['thumb']=$_POST['thumb']; //获取文章封面
        $newsdata['ewcode']=$_POST['ewcode']; //获取二维码
        $newsdata['telephone']=$_POST['telephone']; //获取联系电话
        $newsdata['caddress']=$_POST['caddress']; //获取中心地址
        $newsdata['latlng']=$_POST['latlng']; //获取中心坐标
        $newsdata['opentime']=$_POST['opentime']; //获取营业时间
        $newsdata['inputtime']=time(); //获取添加时间
        $inchina=M('inchina');// 实例化文章模型 

        $result= $inchina->add($newsdata);
                if ($result!==false)
                {
					if($_POST['user']&&$_POST['password']){
						$data['password']=md5($_POST['password']); //获取密码
						$data['user']=$_POST['user']; //获取用户名
						$data['pid']=$_POST['provinceid']; //获取管理员类型
						$data['aid']=$result; //获取管理员类型
						$list=M('admin')->add($data);
						if($list){
							$this->success("保存成功！");
						}else{
							$this->error('用户添加失败');
						}
					}else{
						$this->error('用户名和密码不能为空');
					}     
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

        $this->Get_category();//获取栏目名称
        $this->Get_category_son('20'); //获取

        if(!empty($_POST['dopost'])){
		
        $newsdata['title']=$_POST['title']; //获取标题
        $newsdata['provinceid']=$_POST['provinceid']; //获取省份id		
        $newsdata['thumb']=$_POST['thumb']; //获取文章封面
        $newsdata['ewcode']=$_POST['ewcode']; //获取二维码
        $newsdata['telephone']=$_POST['telephone']; //获取联系电话
        $newsdata['caddress']=$_POST['caddress']; //获取中心地址
        $newsdata['latlng']=$_POST['latlng']; //获取中心坐标
        $newsdata['opentime']=$_POST['opentime']; //获取营业时间
        $newsdata['updatetime']=time(); //获取更新时间
        
        $inchina=M('inchina');// 实例化文章模型
        $where="id=".$_POST['id'];

        $result=$inchina-> where($where)->save($newsdata);   

        //$User->where('id=5')->save($data);   
                if ($result!==false) 
                {
                    $this->success("修改成功！");
                } 
                else 
                {
                    $this->error("修改失败！");
                }
        }
        else{
			   
               $id=$_SESSION['users']['aid'];//获取修改id

	 $presult=M('province')->select();
		       $this->assign('presult',$presult);		   
               $inchina=M('inchina');// 实例化User对象
               // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
               $list = $inchina->where('id='.$id)->find();
               $thiscatid=strval($list['catid']);
               $this->assign('thiscatid',$thiscatid);// 赋值数据集
               $this->assign('inchina',$list);// 赋值数据集
               $this->display(); // 输出模板
        }
   
    }

	public function content(){
		$this->Get_category();
        $this->Get_category_son(20);
        if($_GET['id']){
           $id=$_GET['id'];  
        }
        else{
            $id='20';
        }
       
          $aid=$_SESSION['users']['aid'];//获取修改id
        if($id == 20){
            $where="catid !=".$id." and areaid=".$aid;
        }else{
            $where="catid =".$id." and areaid=".$aid;
        }		
        $catid=I('id');
        $this->assign('catid',$catid);
        $this->assign('aid',$aid);
        $list=M('inchina')->where($where)->order('id desc')->select();
        $this->assign('list',$list);
        $this->display();		
	}
    public function newadd(){
        $filename=cookie('filename');
        if($filename){
           $list_file=M('Inchina')->where('thumb="'.$filename.'"')->find();
           if(!$list_file){
                @unlink($filename[0]);
           } 
        }
        cookie('filename',null);
        $category=M('category');
        $list =  $category ->where('parentid=0')->select();
        $this->assign('category_list',$list);
        $catlist=$category->where('parentid=20')->select();
        $this->assign('catlist',$catlist);
        $catid=$_GET['id'];
        $this->assign('catid',$catid);
		$aid=$_GET['aid'];
		$this->assign('aid',$aid);
        $this->display();
    }
	
    public function uploadfile(){
        $act = $_GET['act'];
        $acts = array('tk', 'up', 'fd');


        //判断是否正确的请求
        if(! in_array($act, $acts)){
            //错误
            exit;
        }

        $path="./Uploads/Inchina/";
        if(!is_dir($path)){
            mkdir($path,0777);
        }
        $upload = new \Org\Util\StreamUpload($path);
        $upload->$act();

    }
	
    public function doadd(){
        $data=$_POST;
        $filename=cookie('filename');
        $data['thumb']=$filename[0];
		$data['provinceid']=M('inchina')->where('id='.$_POST['areaid'])->getField('provinceid');
        //$data['filename']=substr($filename[0],25);
        $data['inputtime']=time();
        $res=M('Inchina')->add($data);
        if($res){
            cookie('filename',null);
            $this->success('添加成功');
        }else{
			$this->error('添加失败');
		}

    }
	
    public function newedit()
    {
        $filename=cookie('filename');
        if($filename){
           $list_file=M('Inchina')->where('thumb="'.$filename.'"')->find();
           if(!$list_file){
                @unlink($filename[0]);
           } 
        }
        cookie('filename',null);
        $category=M('category');
        $clist =  $category ->where('parentid=0')->select();
        $this->assign('category_list',$clist);
        $catlist=$category->where('parentid=20')->select();
        $this->assign('catlist',$catlist);
        $list=M('Inchina')->where('id='.$_GET['id'])->find();
        $catid=$list['catid'];
        $this->assign('catid',$catid);
		$aid=$list['areaid'];
		$this->assign('aid',$aid);
        $this->assign('list',$list);
        $this->display();    
    }	

    public function doedit()
    {
        $data=$_POST;
        $filename=cookie('filename');
        if($filename){
            $data['thumb']=$filename[0];
        }
        $list==M('Inchina')->where('id='.$_POST['id'])->find();
        $data['updatetime']=time();
        $res=M('Inchina')->where('id='.$_POST['id'])->save($data);
        if($res){
            if($filename){
                @unlink($list['thumb']);
            }
            cookie('filename',null);
            $this->success('修改成功');
        }else{
			$this->error('修改失败');
		}
    }
	
    public function del(){
        $id=$_GET['id'];
        $list=M('Inchina')->where('id='.$id)->find();
        $res=M('Inchina')->where('id='.$id)->delete();
        if($res){
            if($list['filepath']){
                @unlink($list['thumb']);
            }
            $this->success('删除成功');
        }else{
			$this->error('删除失败');
		}
    }
	
    //图片上传函数
    public function uploadimg(){

        require('UploadHandler.php');
        $time = time();
        $forup = array('user_id' => date("ymd",$time));
        $upload_handler = new UploadHandler($forup);
        


    }
    //编辑器图片上传接口
    public function uploadimgfromeditor(){

        require('uploads.php');

      //  $upload_handler = new FileUpload($forup);

        $up = new fileupload;
        //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
        $up -> set("path", "./Uploads/");
        $up -> set("maxsize", 2000000);
        $up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
        $up -> set("israndname", false);
        //var_dump($_POST['original_filename']);

        //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
        if($up -> upload('fileData')) {
         
            //获取上传后文件名子
            $file_Name=$up->getFileName();
            $msg = Array('success'=>'true', 'file_path'=>'http://localhost/think/Uploads/'.$file_Name);
             echo json_encode($msg);

        } else {

            //获取上传失败以后的错误提示
            var_dump($up->getErrorMsg());
    
        }
        

    }

//获取一级栏目列表
     private function Get_category() {
            $category=M('category');
            $list =  $category ->where('parentid=0')->select();
            $this->assign('category_list',$list);
    }

//获取子栏目栏目列表
     private function Get_category_son($id) {
            $category=M('category');
            $list =  $category ->where('parentid='.$id)->select();
            $this->assign('category_sonlist',$list);
    }
  
//获取栏目设置组列表信息
     private function Get_setgroup($catid) {
            $setgroup=M('catset_group');
             $setgroup_list=M('catset_list');
            $list =  $setgroup ->where('catid='.$catid)->select();
            
            for($i = 0;$i< count($list);$i++){
                   $list[$i]['count'] =  $setgroup_list ->where('gid='.$list[$i]['id'] )->count();
                  } 

            $this->assign('setgroup',$list);
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
                $this->Get_category();//获取栏目信息

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
              $this->Get_category();//获取栏目信息
              if(!empty($_POST['dopost'])){
                    $newdata['gid']=$_POST['gid']; //获取广告组标识
                    $newdata['name']=$_POST['name']; //获取标题
                    $newdata['value']=$_POST['value']; //获取文章封面
                    $newdata['img']=$_POST['img']; //获取图片
                    $newdata['img_ink']=$_POST['link']; //获取图片链接
                     $newdata['text']=$_POST['text']; //获取文字
                    $newdata['text_link']=$_POST['text_link']; //获取文字链接
                    $newdata['type']=$_POST['type']; //获取文章内容
                    $newdata['status']='1'; //获取文章内容
                    $newdata['creattime']=time(); //获取文章内容
                    $adlist=M('catset_list');// 实例化文章模型
                     $result=$adlist-> add($newdata);   
                      //$User->where('id=5')->save($data);    
                            if ($result!==false) 
                            {
                                $this->success("添加成功！");
                            } 
                            else 
                            {
                                $this->error("添加失败！");
                            }
                    }
                    else{
                        
                        $gid=$_GET['gid'];//获取广告id
                        $type=$_GET['type'];//获取添加栏目类型
                        $this->assign('gid',$gid);
                        $cat=M('catset_group');
                        $list =   $cat ->select();
                        $this->assign('ad_list',$list);
                         if($type=="img"){
                            $this->display('addsetimg'); // 输出模板 
                         }
                         else{
                            $this->display('addsettext'); // 输出模板 
                         }
                        
                    }
    }

    public function editset(){
              $this->Get_category();//获取栏目信息
              if(!empty($_POST['dopost'])){

                    $id=$_POST['id']; //获取广告组标识
                    $newdata['gid']=$_POST['gid']; //获取广告组标识
                    $newdata['name']=$_POST['name']; //获取标题
                    $newdata['value']=$_POST['value']; //获取文章封面
                    $newdata['img']=$_POST['img']; //获取图片
                    $newdata['img_ink']=$_POST['link']; //获取图片链接
                     $newdata['text']=$_POST['text']; //获取文字
                    $newdata['text_link']=$_POST['text_link']; //获取文字链接
                    $newdata['status']='1'; //获取文章内容
                    $newdata['type']=$_POST['type']; //获取类型
                    $newdata['creattime']=time(); //获取文章内容
                    $adlist=M('catset_list');// 实例化文章模型
                     $result=$adlist->where("id=".$id)-> save($newdata);   
                      //$User->where('id=5')->save($data);    
                            if ($result!==false) 
                            {
                                $this->success("修改成功！");
                            } 
                            else 
                            {
                                $this->error("修改失败！");
                            }
                    }
                    else{
                        
                        $gid=$_GET['gid'];//获取catid
                        $id=$_GET['id'];//获取id
                        $type=$_GET['type'];//获取添加栏目类型
                        $this->assign('gid',$gid);

                        $cat=M('catset_group');//获取栏目设置组
                        $list =   $cat ->select();
                        $this->assign('ad_list',$list);

                        //调用信息
                        $cat_info=M('catset_list');
                        $info=$cat_info->where('id='.$id)->find();
                        $this->assign('info',$info);



                         if($info['type']=="img"){
                            $this->display('editsetimg'); // 输出模板 
                         }
                         else{
                            $this->display('editsettext'); // 输出模板 
                         }
                        
                    }
    }






    



}