<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends CommonController {

    //栏目列表
    public function index(){
            $category=M('category');
            $list =  $category->order('listorder') ->select();
            $list_f=$this->genCate($list);

            //扫描模板文件
              $cfg_theme=getconfig('cfg_theme');
              $styleDir = "Theme/Ue/".$cfg_theme."/pc/";      
            //  var_dump($styleDir);       
            $styledata = $this->MyScandir($styleDir);

            $this->assign("styledata", $styledata);

            $this->assign('category_list',$list_f); 
            $this->display(); // 输出模板 


    }




      private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
           if($this->getFileType($filename)=="html"){
               //$FileAndFolderAyy[] = $filename;
               $FileAndFolderAyy[]= explode(".",$filename );
          }
        }
       //var_dump($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

     private   function getFileType($filename) {
            return substr($filename, strrpos($filename, '.') + 1);
      }


     //修改栏目
    public function edit(){
        $category=M('category');
         $newdata['parentid']=$_POST['parentid']; //获取栏目名称
         if(!$newdata['parentid']){
          $newdata['parentid']=$_POST['arrparentid'];
         }
          $newdata['arrparentid']=$_POST['arrparentid']; //获取上一级栏目id
        $newdata['catid']=$_POST['catid']; //获取栏目名称
        $newdata['catname']=$_POST['catname']; //获取标题
        $newdata['description']=$_POST['description']; //获取描述
        $newdata['listorder']=$_POST['listorder']; 
        $newdata['module']=$_POST['module']; 
         $newdata['style']=$_POST['style']; 
         $newdata['catdir']=$_POST['catdir'];

        $where="catid=".$_POST['catid'];
       
        $newdata['keyword']=$_POST['keyword']; //获取栏目的关键字
        $newdata['image']=$_POST['image']; //获取栏目的封面图片
        $newdata['url']=$_POST['url']; //获取栏目的跳转链接
         
         if($_POST['usable_type']==1){
             $newdata['usable_type']=2; //获取该栏目是否隐藏
         }elseif(!$_POST['usable_type']){
            $newdata['usable_type']=1;
         }
        
         
        //判断之前是否存在linktop
        $oldinfo=$category->where('catid='.$newdata['catid'])->find();


        //$result=$category-> where($where)->save($newdata);

             //判断是否使用linktop
            if($_POST['linktop']&&$newdata['parentid']!=0){

                    $newdata['linktop']=$_POST['linktop']; 
                     $category->where('catid='.$newdata['parentid'])->setField('linktop',$_POST['catid']);
                     $oldinfo=$category->where('parentid='.$newdata['parentid']." AND `linktop`=1")->find();
                     if($oldinfo){
                        $category->where('catid='.$oldinfo['catid'])->setField('linktop','0');
                     }
                     $result=$category-> where($where)->save($newdata);

            }
            else{
                     //$newdata['linktop']="0"; 
                    //如果原来是有设置linktop的 则修改值为空
                    if($oldinfo[linktop]>0){
                            $newdata['linktop']='0'; 
                            $category->where('catid='.$newdata['parentid'])->setField('linktop','0');
                           }

                     $result=$category-> where($where)->save($newdata);
                   
            }

            //再次检查
             $reinfo=$category->where('parentid='.$newdata['parentid']." AND `linktop`=1")->find();

             if(!$reinfo){
                 $category->where('catid='.$newdata['parentid'])->setField('linktop','0');
             }


        exit(); 
    }

    //删除栏目
    public function delete(){
        $category=M('category');
        $newdata['catid']=$_POST['catid']; //获取栏目名称
        $where="catid=".$_POST['catid'];
         $where2="parentid=".$_POST['catid'];
          $result=$category-> where($where2)->find(); 
          if($result){
                echo "2";
          }
          else{
              $category-> where($where)->delete();  
              echo "1";
          }
      
        exit(); 
   
    }

     //添加栏目
    public function add(){
        $category=M('category');
        //var_dump($_POST);
        if($_POST['catname']){
            $newdata['parentid']=$_POST['parentid']; //获取栏目id
            $newdata['arrparentid']=$_POST['arrparentid']; //获取上一级栏目id
            $newdata['catname']=$_POST['catname']; //获取标题
            $newdata['description']=$_POST['description']; //获取描述
            
            $newdata['module']=$_POST['module']; //获取文章内容
            $newdata['keyword']=$_POST['keyword']; //获取栏目的关键字
            $newdata['image']=$_POST['image']; //获取栏目的封面图片
            $newdata['style']=$_POST['style']; //获取栏目的模板
            $newdata['catdir']=$_POST['catdir'];
            $newdata['url']=$_POST['url']; //获取栏目的跳转链接
           
           if($_POST['usable_type']){
               $newdata['usable_type']=$_POST['usable_type']; //获取该栏目不使用
           }else{
               $newdata['usable_type']='1'; //获取该栏目可以使用
           }


             $newdata['listorder']='50'; //获取文章内容

            
                 //判断是否使用linktop
            if($_POST['linktop']&&$newdata['parentid']!=0){
                    $newdata['linktop']=$_POST['linktop']; 
                     $catinfo=$category->where('catid='.$newdata['parentid'])->find();
                    if($catinfo['linktop']==0){
                             $result=$category->add($newdata);  
                            $category->where('catid='.$newdata['parentid'])->setInc('linktop',$result);
                    }
                    else{
                              $newdata['linktop']="0"; 
                             $result=$category->add($newdata);  
                    }


            }
            else{
                        $newdata['linktop']="0"; 
                     $result=$category->add($newdata);  
            }

        }

        exit();
     
   

    }


          function genCate($data, $pid = 0, $level = 0)
            {
                if($level == 10) break;
              //  $l= str_repeat("&nbsp;&nbsp;", $level);
                if($pid!==0)
                {
                 // $l = $l.'└';
                  $s = $level;
                }
                else{
                    $s = '0';
                }
                static $arrcat    = array();
                $arrcat    = empty($level) ? array() : $arrcat;
                foreach($data as $k => $row)
                {
                    if($row['parentid'] == $pid)
                    {
                        $row['catname']    = $row['catname'];
                        $row['son']= $s;
                        $row['level']    = $level;
                        $arrcat[]    = $row;
                        $this->genCate($data, $row['catid'], $level+1);
                    }
                }
              // var_dump($arrcat);
                return $arrcat;
            }

    //查找下级栏目
    public function getnext(){
        $category=M('category');
        $catid=$_GET['cid']; //获取栏目id
        //获取本栏目的信息
            $where="catid=".$catid;
         $cat=$category-> where($where)->find(); 
        //获取子栏目信息
         $where2="parentid=".$catid;
          $result=$category-> where($where2)->select(); 
            $str="<option value='".$catid."' selected='selected' date-style=".$cat['style'].">本级栏目</option>"; 
              if($result){
                  foreach ($result as $key => $value) {
                     $str=$str."<option value='".$value['catid']."' date-style=".$value['style'].">".$value['catname']."->下级分类</option>";
                  }
              }
          
          
        echo $str;
        exit(); 
   
    }

    //查找上级栏目
    public function checktop(){
        $category=M('category');
        $catid=$_GET['cid']; //获取栏目id
        $where2="catid=".$catid;
        $result=$category-> where($where2)->find(); 
        echo  $result["parentid"];
        exit(); 
   
    }



    



}