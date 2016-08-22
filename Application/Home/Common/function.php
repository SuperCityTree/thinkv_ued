<?php


//处理方法
function rmdirr($dirname) {
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    if ($dir) {
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            //递归
            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }
    }
}

//获取管理员信息
function getadminname($pid,$aid) {
   

    if($pid=="0"){
        $name = "系统管理员";
    }
    else{
          $p=M('province');
          $list1 =   $p->where("`id` =".$pid)->find();
          $s=M('inchina');
            $list2 =   $s->where("`id` =".$aid)->find();
            $name=$list1['pname']."-".$list2['title'];
    }
    return $name;
    
}

//获取编辑信息
function getbianji($catid,$id){
     $cat=M('category');
     //var_dump($id);
    $result=$cat->where("catid=".$catid)->find();
    if($result['module']=='news'){
         $str="/Home/Content/edit/cid/".$catid."/id/".$id;
    }
    elseif($result['module']=='product'){
        $str="/Home/Content/edit_product/cid/".$catid."/id/".$id;
    }
      elseif($result['module']=='hr'){
        $str="/Home/Content/edit_hr/cid/".$catid."/id/".$id;
    }
      elseif($result['module']=='media'){
        $str="/Home/Content/edit_media/cid/".$catid."/id/".$id;
    }
      elseif($result['module']=='page'){
        $str="/Home/Content/page/cid/".$catid;
    }
    else{
         $str="#";
    }
    return $str;

}


//公共函数
//获取文件修改时间
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

//公共函数
//获取未读消息数量
function getmsgunread() {
      $msg=M('msg');
      
     $list1 =   $msg->where("`read` =1")->count();
     $list=$list1+$list2;
     if($list>0){
        $list=" <span class='badge pull-right'>".$list ."</span>";
         return $list;
     }
     
    
}

//公共函数
//获取登陆账号
function getuser($type) {          
                $data['user_id']=$_SESSION['users']['id'];
               
                $user=M('Admin')->where('id='.$_SESSION['users']['id'])->find();
                return $user[$type];
              
}


/**
获取所有栏目名称
 * @type 类型名称，{top:顶级栏目;son:下级栏目}
 * @id  栏目id,顶级栏目可不传
 * @return 数组
 */

function getcategory($type,$id) {
        $cat=M('category');
    if($type=='top'){
         $result=$cat->where("parentid=0")->order('listorder') ->select();
    }
    if($type=='son'){
         $result=$cat->where("parentid=".$id)->order('listorder') ->select();
    }
     if($type=='same'){
         $catinfo=$cat->where("catid=".$id)->find();
         $result=$cat->where("parentid=".$catinfo['parentid'])->order('listorder') ->select();
    }

    $count=count($result); 

    for($i=0;$i<$count;$i++) 
    { 
        $result[$i]['url']=__APP__."/Ue/List/index/cid/".$result[$i]['catid']; //返回栏目链接
        $result[$i]['current']=checkcurrent($result[$i]['catid']);
    }    

    return $result;
}

function checkcurrent($id){
    $cat=M('category');
    $catid=$_GET['cid'];
    if($catid==$id){
      return "1";
      exit();
    }
    else{
             $catinfo=$cat->where("catid=".$id)->find();
             if($catinfo["parentid"]==$catid){
                   return "1";
                    exit();
             }
    }
}


//获取文件的大小
function getfilesize($file, $DataDir) {
    $perms = stat($DataDir . $file);
    $size = $perms['size'];
    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}

//微信模块
function getRealText($keyword)
{
    if ($keyword == 'text')
        return '文本';
    elseif ($keyword == 'click') {
        return '点击';
    } elseif ($keyword == 'view') {
        return '直链';
    } elseif ($keyword == 'news') {
        return '图文';
    } elseif ($keyword == 'text') {
        return '文本';
    } elseif ($keyword == 'image') {
        return '图片';
    } elseif ($keyword === 0) {
        return '已';
    } elseif ($keyword === 1) {
        return '未';
    } else {
        return '';
    }

}
//微信
function getMenuButtons()
{
    $menu = trim(C('Weixin_menu'));

    $menu = json_decode($menu, true);
    $array = $menu['button'];
    static $result_array = array();
    foreach ($array as $value)
    {
        if ($value['name'] != '' && $value['key'] != '')
        {
            $result_array [$value['key']] = $value['name'];
        }
        if (!empty($value['sub_button']))
        {
            foreach ($value['sub_button'] as $value2)
            {
                if ($value2['name'] != '' && $value2['key'] != '')
                {
                    $result_array [$value2['key']] = $value2['name'];
                }
            }
        }
    }
    return $result_array;
}
//微信


function get_alink($url)
{
    if(empty($url))return '';
    else return '<a href="'.$url.'"  target="_blank">点击查看</a>';
}
?>