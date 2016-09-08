<?php

//公共函数
//获取单个广告位
function getad($name, $type) {
    $adlist=M('ad_list');
    $result=$adlist->where("value='".$name."'")->find();
    return $result[$type];
}

/**
获取指定栏目信息内容
 * @type 字段名称
 * @catid  栏目id
 */

function catinfo($catid,$type) {
        $cat=M('category');
        $result=$cat->where("catid=".$catid)->find();
        $result['url']=__APP__."/Ue/List/index/cid/".$catid; //返回栏目链接

        return $result[$type];
}

/**
获取seo信息
 * @type 字段名称 通常为 keyword 或者 description
 */

function getseo($type) {

         $cid=$_GET['cid'];//栏目id
         $aid=$_GET['aid'];//文章id
          if(!$cid){
               $catid=$_SESSION['catinfo']["catid"];
          }
          if(!$aid){
                      if($cid<1){
                         $str="cfg_".$type;
                          $return=getconfig($str);
                       }
                       else{
                          $cat=M('category');
                          $cinfo=$cat->where("catid=".$cid)->find();
                            if($type=='keywords'){
                               $return=$cinfo["keyword"];
                            }
                             if($type=='description'){
                               $return=$cinfo["description"];
                             }
                       }
                       }
               else
               {
                      $cat=M('category');
                      $cinfo=$cat->where("catid=".$cid)->find();
                      $arc=M($cinfo['module']);
                      $ainfo=$arc->where("id=".$aid)->find();
                      $return=$ainfo[$type];
               }
               return $return;
          }


/**
获取所有栏目名称
 * @type 类型名称，{top:顶级栏目;son:下级栏目}
 * @id  栏目id,顶级栏目可不传
 * @return 数组
 */

function getcategory($type,$catid,$usable='1') {
        $cat=M('category');
        

    if($type=='top'){
         $result=$cat->where("usable_type='".$usable."' and parentid=0")->order('listorder') ->select();
    }
    if($type=='son'){

        $catup=$cat->where("catid=".$catid)->find();

        if($catup['parentid']==0){
             $result=$cat->where("usable_type='".$usable."' and parentid=".$catup['catid'])->order('listorder') ->select();
        }else{
          $result=$cat->where("usable_type='".$usable."' and parentid=".$catup['parentid'])->order('listorder') ->select();
        }
      
        
    }
     if($type=='same'){

     $catinfo=$cat->where("catid=".$catid)->find();
      $catinfo2=$cat->where("catid=".$catinfo['parentid'])->find();
      if($catinfo2['parentid']==0){
          $result=$cat->where(" usable_type='".$usable."' and parentid=".$catinfo['parentid'])->order('listorder') ->select();
      }else{
          $result=$cat->where(" usable_type='".$usable."' and parentid=".$catinfo2['catid'])->order('listorder') ->select(); 
      }    
        
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
    $catid=$_SESSION['catinfo']['catid'];


 
    if($catid==$id){
      return "1";
      exit();
    }
    else{


          if($catid){
             $catinfos=$cat->where("parentid=".$id." AND catid = ".$catid)->select();//判断二级
              $catinfot=$cat->where("parentid=".$id." AND catid = ".$_SESSION['catinfo']['parentid'])->select();//判断三级
          }
             

             if($catinfos||$catinfot){
                   return "1";
                  exit();
             }
    }
}


/**
循环获取指定栏目内的内容
 * @栏目id 指定栏目id
    @type 指定栏目id
  * @num 获取数量
 * @flag  推荐标签
 * @return 数组
 */

function getlist($catid,$num) {
    //var_dump($catid);
    $cat=M('category');
    if($type=='top'){
         $result=$cat->where("parentid=0")->select();
    }
     if($type=='son'){
         $result=$cat->where("parentid=".$id)->select();
    }
   
    return $result;
}

/**
生成url信息
 * @栏目id 指定栏目id
    @aid 不传则为栏目url,传了则为文章id
 * @return 链接
 */

function geturl($catid,$aid) {
  if(!$aid){
     $result=__APP__."/Ue/List/index/cid/".$catid; //返回栏目链接
  }
 else{
     $result=__APP__."/Ue/Show/index/cid/".$catid."/aid/".$aid; //返回文章链接
  }
   return $result;
}

/**
生成模板链接信息 用于只使用模板 而不需要增加栏目
 * @栏目id 指定栏目id
 * @return 链接
 */

function usetheme($style) {
  $result=__APP__."/Ue/Page/show/s/".$style; //返回模板链接
   return $result;
}

/**
循环获取指定栏目内的内容列表
 * @栏目id 指定栏目id
    @type 指定栏目id
  * @num 获取数量
  * @type 同级，或者子集 same son
 * @return 数组
 */

function getdatalist($catid,$num,$type) {
    //var_dump($catid);
    $cat=M('category');
    $catinfo=$cat->where("catid=".$catid)->find();

    $table=M($catinfo['module']);

      if($type=='son'){
                      $isfather=true;
                        //判断其包含的子栏目
                      $soninfo =  $cat ->where('parentid='. $catid)->select();

                      //如果有子栏目
                      if($soninfo){
                            foreach( $soninfo as $v){ 
                                $sonid= $v['catid'].','. $sonid;
                            } 
                            $where=array('catid'=>array('in',$sonid));
                      }
                      //如果没有子栏目
                      else{
                              return false;
                              exit();
                      }
                        
              }
              else{
                     $isfather=false; 
                     $where="`catid` = ".$catid;

              }

                 if($num){
                  $result=$table->where($where)->limit($num)->order('listorder,updatetime desc')->select();
                     
                 }
                 else{
                   $result=$table->where($where)->order('listorder,updatetime desc')->select();

                 }
  
    //对内容页面进行url组装
         $count=count($result); 
         if($table="page"){
                   for($i=0;$i<$count;$i++) 
                              { 
                                  $result[$i]['url']=__APP__."/Ue/List/index/cid/".$result[$i]['catid']; //返回栏目链接
                              }   
         }
         else{
           for($i=0;$i<$count;$i++) 
            { 
                $result[$i]['url']=__APP__."/Ue/Show/index/cid/".$result[$i]['catid']."/aid/".$result[$i]['id']; //返回栏目链接
            }   
         }
           
    
   //var_dump($result);
    return $result;

}


/**
制作面包屑导航 只试用于当前二级栏目，三级栏目需要另行开发

  * @m 使用类型

 * @return 数组
 */

function location($m) {
    //var_dump($catid);
   //var_dump($_SESSION['catinfo']);
    $catid=$_SESSION['catinfo']['catid'];
    $cat=M('category');
    $catinfo=$cat->where("catid=".$catid)->find();
    if($m=='li'){
        $returninfo="<li><a href=".__APP__.">首页</a></li>&gt;";
        if($catinfo['parentid']=='0'){
            $returninfo=$returninfo."<li><a href=".__APP__."/Ue/List/index/cid/".$catinfo[catid].">".$catinfo[catname]."</a></li>";
        }
        else{
             $catinfo2=$cat->where("catid=". $catinfo['parentid'])->find();  
              $returninfo=$returninfo."<li><a href=".__APP__."/Ue/List/index/cid/".$catinfo2[catid].">".$catinfo2[catname]."</a></li>&gt;"."<li><a href=".__APP__."/Ue/List/index/cid/".$catinfo[catid]."><strong>".$catinfo[catname]."</strong></a></li>";
        }
    }
    else{
                $returninfo="<a href=".__APP__." class=".home.">首页</a>"."<strong>></strong>";
        if($catinfo['parentid']=='0'){
            $returninfo=$returninfo."<a href=".__APP__."/Ue/List/index/cid/".$catinfo[catid]."<strong>></strong>".$catinfo[catname]."</a>";
        }
        else{
             $catinfo2=$cat->where("catid=". $catinfo['parentid'])->find();  
              $returninfo=$returninfo."<a href=".__APP__."/Ue/List/index/cid/".$catinfo2[catid].">".$catinfo2[catname]."</a>"."<strong>></strong>"."<b>".$catinfo[catname]."</b>";
        }
    }
    
   return $returninfo;
  
}


//将资源字段转换成数组

function re2array($data) {          
                 $result=String2Array($data);
                 return $result;
              
}




//公共函数
//循环获取广告组
function getadgroup($gid, $num='NULL') {
    $adlist=M('ad_list');
    $result=$adlist->where("gid='".$gid."'")->limit($num)->select();
    return $result;
}

//公共函数
//获取单个栏目的设置值
function getcatset($value,$type, $catid) {
    $adlist=M('catset_list');
    
        if(!$catid){
            $catid=$_SESSION['catinfo']['catid'];
            $pid=$_SESSION['catinfo']['parentid'];
        }
     
    $result=$adlist->where("value='".$value."'AND catid = '".$catid."'")->find();
    if(!$result){
      $result=$adlist->where("value='".$value."'AND catid = '".$pid."'")->find();
      // var_dump($result);
    }
    return $result[$type];
}

//公共函数
//获取栏目设置组内容
function getcatlist($value,$type,$catid) {
    $adlist=M('catset_list');
    
        if(!$catid){
            $catid=$_SESSION['catinfo']['catid'];
               $pid=$_SESSION['catinfo']['parentid'];
        }

    $result=$adlist->where("value='".$value."'AND catid = '".$catid."'")->find();

     if(!$result){
      $result=$adlist->where("value='".$value."'AND catid = '".$pid."'")->find();
      // var_dump($result);
    }

    if($type=='img'){
      //如果是图片则转为数据进行输出
      $result['img']=String2Array($result['img']);

    }
  
   // var_dump($result);
    return $result[$type];
}





function ismobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
    
    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
        //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}



/**
自动生成地图api
 * @id 显示地图div的id名称 必传
 * @title 标题名称
* @address地址详情 
 * @return 代码
 */

function baidumap($id,$title,$address) {

          $id = isset( $id) ? $id : false;
          $title = isset( $address) ? $title : getconfig('cfg_webname');
          $address = isset( $address) ? $address : getconfig('cfg_address');


      $str="<script type='text/javascript' src='http://api.map.baidu.com/api?v=2.0&ak=ZKjAnV6V1ZfxRqDSKCaycR19'></script><script type='text/javascript'> var map = new BMap.Map('".$id."'); var point = new BMap.Point(116.417854,39.921988);var myGeo = new BMap.Geocoder(); myGeo.getPoint('".$address."', function(point){ if (point) { var marker = new BMap.Marker(point); map.addOverlay(marker);  map.centerAndZoom(point, 17); var opts = { width : 200, height: 50, title : '".$title."'  };var infoWindow = new BMap.InfoWindow('地址：".$address."', opts);  map.openInfoWindow(infoWindow,point);;  }else{ alert('您选择地址没有解析到结果!'); } }); </script>";

    return $str;


}




?>