<?php
//微信模型
namespace Home\Model;
use Think\Model;
class WeixinModel extends Model{

    public function  _initialize()
    {
     

      // $ccc= $this->tongbumenu();
      // echo dump($ccc);
    } 

	public function cone()
	{
	   return $this->find();
	}
	///调用同步
	public function tongbumenu()
	{
	    $access_token=$this->getAccess();
	    $info="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$access_token;
	    $ch = curl_init();//初始化curl
	    curl_setopt($ch,CURLOPT_URL,$info);//抓取指定网页
	    curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	    curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	    $data = curl_exec($ch);//运行curl
	    curl_close($ch);
	    return $data;
	}
	//使用缓存保存access_token , access_token有效时间是7200秒
	public function getAccess()
	{
	    if (S('access_token') == '' || S('access_token') == false)
	    {
	        $wxapp= $this->wxapp();
	        $appid =$wxapp['appid'];
	        $secret = $wxapp['appsecret'];
	        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
	        $res=$this->http_curl($url);
	        if ($res['errcode'] == 40013) return false;
	        S('access_token', $res['access_token'], 7000);
	        return $res['access_token'];
	    }
	    else
	    {
	        return S('access_token');
	    }
	
	
	}
	///////编辑菜单
	public function edit($level = 1, $pid = '0', $id = '0', $type = 'empty')
	{
	    $pid=$_GET['pid'];
	    $id=$_GET['id'];
	    $type=$_GET['type'];
	    $level=$_GET['level'];
	    $this->assign('form_action', U('Weixin/editHandle', array('level' => $level, 'pid' => $pid, 'id' => $id, 'type' => $type)));
	    $this->assign('action', '编辑菜单');
	    $this->assign('action_name', '编辑');
	
	    $this->assign('action_url', U('Weixin/Menu/edit', array('level' => $level, 'pid' => $pid, 'id' => $id, 'type' => $type)));
	    	
	    ///获取微信菜单
	    $data=$this->tongbumenu();
	    $var=json_decode($data,true);
	    $Weixin_menu=$var['menu'];
	    $this->assign('weixin_menu', $Weixin_menu);
	    if($level == 1 && $pid == $id)
	    {
	        $this->assign('weixin_menu_now', $Weixin_menu['button'][$pid]);
	    }
	    elseif ($level == 2)
	    {
	        $this->assign('weixin_menu_now', $Weixin_menu['button'][$pid]["sub_button"][$id]);
	    }
	    $this->display('edit_'.$type);
	
	}
	//编辑菜单
	public function editHandle($level = 1, $pid = 0, $id = 0, $type = 'empty')
	{

	    $pid=$_REQUEST['pid'];
	    $id=$_REQUEST['sid'];
	    $type=$_REQUEST['typec'];
	    $level=$_REQUEST['level'];
	    $data=$this->tongbumenu();
	    $var=json_decode($data,true);
	    $Weixin_menu=$var['menu'];
	    if ($level == 1 && $pid == $id && $type == 'empty')
	    {
	        $Weixin_menu["button"][$pid]['name'] = $_REQUEST['name'];
	        
	    }
	    elseif ($level == 1 && $pid == $id && $type == 'click')
	    {
	        $Weixin_menu["button"][$pid]['name'] = $_REQUEST['name'];
	        $Weixin_menu["button"][$pid]["key"] = $_REQUEST['key'];
 
	    }
	    elseif ($level == 1 && $pid == $id && $type == 'view')
	    {
	        $Weixin_menu["button"][$pid]['name'] = $_REQUEST['name'];
	        $Weixin_menu["button"][$pid]["url"] = $_REQUEST['url'];
	   
 	    }
	    elseif ($level == 2 && $type == 'click')
	    {
	        $Weixin_menu["button"][$pid]["sub_button"][$id]['name'] = $_REQUEST['name'];
	        $Weixin_menu["button"][$pid]["sub_button"][$id]['key'] = $_REQUEST['key'];
	    }
	    elseif ($level == 2 && $type == 'view')
	    {
	        $Weixin_menu["button"][$pid]["sub_button"][$id]['name'] =$_REQUEST['name'];
	        $Weixin_menu["button"][$pid]["sub_button"][$id]['url'] = $_REQUEST['url'];
	    }
	    else{ echo kkl; exit;}
	    $menu_json = $this->decodeUnicode(json_encode($Weixin_menu));
	    $res = $this->saveM($menu_json);
	    if ($res)
	    {
	       // $this->assign("jumpUrl",U('Weixin/index'));
	        //$this->success('设置成功');
	        echo 1;
	  
	    }
	    else
	    {  
	        //$this->error('设置失败或者没有改变');
	        echo 2;
	    }
	
	
	}
	//更新菜单
	private function saveM($menu_json)
	{
	    $res = M('Wx_menu')->where('wxid=1')->setField('wxcontent',$menu_json);
	    return $res;
	}
	private function decodeUnicode($str)
	{
	    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', create_function('$matches', 'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'), $str);
	}
	///创建菜单函数
	private function createMenu($data)
	{
	    if ($data != '')
	    {
	        $this->wxdelete();
	    }
	    $access_token=$this->getAccess();
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token."");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $tmpInfo = curl_exec($ch);
	    if (curl_errno($ch))
	    {
	        return curl_error($ch);
	    }
	    curl_close($ch);
	    return $tmpInfo;
	}
	//更新到微信平台
	public function up_wx_menu()
	{
	    $list=M('Wx_menu')->where('wxid=1')->find();
	    $cmenu=$this->createMenu($list['wxcontent']);
	    $cmenu2=json_decode($cmenu,true);
	    return $cmenu2['errcode'];
	}
	//全部删除菜单
	public function wxdelete()
	{
	    $accton = $this->getAccess();
	    return  $returninfo=file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$accton."");
	}
	//curl
	public function  http_curl($url)
	{
	    $ch = curl_init();
	    curl_setopt($ch,CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	    $json = curl_exec($ch);
	    curl_close($ch);
	    $res = json_decode($json, true);
	    return $res;
	}
	///删除菜单
	public function del_item_menu($level = 1, $pid = 0, $id = 0, $type = 'empty')
	{
	    $pid=$_GET['pid'];
	    $id=$_GET['id'];
	    $type=$_GET['type'];
	    $level=$_GET['level'];
	    $data=$this->tongbumenu();
	    $var=json_decode($data,true);
	    $Weixin_menu=$var['menu'];
	    if ($level == 1 && $pid == $id)
	    {
	        unset($Weixin_menu['button'][$pid]);
	        $Weixin_menu['button']=array_values($Weixin_menu['button']);
	
	    }
	    elseif ($level == 2)
	    {
	
	        $Weixin_menu["button"][$pid]['name'] = $Weixin_menu["button"][$pid]['name'];
	
	        if($_GET['type']=='url')
	        {
	            $Weixin_menu["button"][$pid]['url'] =  $Weixin_menu["button"][$pid]['url'];
	            $Weixin_menu["button"][$pid]['type'] =  $_GET['type'];
	        }
	        elseif($_GET['type']=='click')
	        {
	            $Weixin_menu["button"][$pid]['key'] =  $Weixin_menu["button"][$pid]['sub_button'][$id]['key'];
	            $Weixin_menu["button"][$pid]['type'] =  $_GET['type'];
	        }
	
	        unset($Weixin_menu['button'][$pid]["sub_button"][$id]);
	    }
	    $menu_json = $this->decodeUnicode(json_encode($Weixin_menu));
	    $res = $this->saveM($menu_json);
	    if ($res)
	    {
	        $this->assign("jumpUrl",U('Weixin/index'));
	        $this->success('设置成功');
	    }
	    else
	    {
	        $this->assign("jumpUrl",U('Weixin/index'));
	        $this->error('设置失败或者没有改变');
	    }
	}
	//
	/////添加菜单
	public function additem($level = 1, $pid = 0, $id = 0, $type = 'empty')
	{
	    $pid=$_GET['pid'];
	    $id=$_GET['id'];
	    $type=$_GET['type'];
	    $level=$_GET['level'];
	    $data=$this->tongbumenu();
	    $var=json_decode($data,true);
	    $Weixin_menu=$var['menu'];
	    $this->assign('form_action', U('Weixin/additemHandle', array('level' => $level, 'pid' => $pid, 'id' => $id, 'type' => $type)));
	    $this->assign('action', '添加菜单项');
	    $this->assign('action_name', '添加');
	    $this->assign('action_url', U('Weixin/index', array('level' => $level, 'pid' => $pid, 'id' => $id, 'type' => $type)));
	    $this->display('edit_full');
	
	}
	///
	public function additemHandle($level = 1, $pid = 0, $id = 0, $type = 'empty')
	{
	    $pid=$_GET['pid'];
	    $id=$_GET['id'];
	    $type=$_GET['type'];
	    $level=$_GET['level'];
	    $data=$this->tongbumenu();
	    $var=json_decode($data,true);
	    $Weixin_menu=$var['menu'];
	
	    if ($level == 1 && $pid == $id && $_POST['reply_type'] =='empty')
	    {
	        if (sizeof($Weixin_menu['button']) == 3)
	        {
	
	            $this->error('此层菜单已满');
	
	        }
	        else
	        {
	            $temp_array = array();
	            $temp_array['name'] = $_POST['name'];
	            $temp_array['sub_button'] = array();
	            $temp_array['sub_button']["type"]= "";
	            $temp_array['sub_button']["name"] =  "";
	            $temp_array['sub_button']["url"] =  "";
	            $temp_array['sub_button']["sub_button"]= array();
	            $this->array_insert($Weixin_menu["button"], $pid + 1, $temp_array);
	        }
	    }
	    elseif($level == 1 && $pid == $id && $_POST['reply_type'] == 'first')
	    {
	
	        $temp_array = array();
	        $temp_array['name'] = $_POST['name'];
	        $temp_array['type'] = 'click';
	        $temp_array['key'] = $_POST['fkey'];
	        $temp_array['sub_button'] = array();
	        $this->array_insert($Weixin_menu["button"], $pid + 1, $temp_array);
	    }
	    elseif ($level == 1 && $pid == $id && $_POST['reply_type'] == 'second')
	    {
	        $temp_array = array();
	        $temp_array['name'] = $_POST['name'];
	        $temp_array['type'] = 'view';
	        $temp_array['url'] = $_POST['surl'];
	        $temp_array['sub_button'] = array();
	        $this->array_insert($Weixin_menu["button"], $pid + 1, $temp_array);
	    }
	    elseif ($level == 1 && $pid == $id && $_POST['reply_type'] == 'click')
	    {
	        if (sizeof($Weixin_menu["button"][$pid]["sub_button"]) == 5)
	        {
	            $this->error('此层菜单已满');
	        }
	        else
	        {
	            $temp_array = array();
	            $temp_array['name'] = $_POST['name'];
	            $temp_array['type'] = 'click';
	            $temp_array['key'] = $_POST['key'];
	            $this->array_insert($Weixin_menu["button"][$pid]["sub_button"], 0, $temp_array);
	        }
	
	    }
	    elseif($level == 1 && $pid == $id && $_POST['reply_type'] == 'view')
	    {
	        if (sizeof($Weixin_menu["button"][$pid]["sub_button"]) == 5)
	        {
	            $this->error('此层菜单已满');
	        }
	        else
	        {
	            $temp_array = array();
	            $temp_array['name'] = $_POST['name'];
	            $temp_array['type'] = 'view';
	            $temp_array['url'] = $_POST['url'];
	            $this->array_insert($Weixin_menu["button"][$pid]["sub_button"], 0, $temp_array);
	            	
	        }
	    }
	    elseif($level == 2 && $_POST['reply_type'] == 'empty')
	    {
	        if (sizeof($Weixin_menu["button"][$pid]["sub_button"]) == 5)
	        {
	            $this->error('此层菜单已满');
	        }
	
	    }
	    else if ($level == 2 && $_POST['reply_type'] == 'click')
	    {
	        if (sizeof($Weixin_menu["button"][$pid]["sub_button"]) == 5)
	        {
	            $this->error('此层菜单已满');
	        }
	        else
	        {
	            $temp_array = array();
	            $temp_array['name'] = $_POST['name'];
	            $temp_array['type'] = 'click';
	            $temp_array['key'] = $_POST['key'];
	            $this->array_insert($Weixin_menu["button"][$pid]["sub_button"], $id + 1, $temp_array);
	        }
	    }
	    else if ($level == 2 && $_POST['reply_type'] == 'view')
	    {
	
	        if (sizeof($Weixin_menu["button"][$pid]["sub_button"]) == 5)
	        {
	            $this->error('此层菜单已满');
	        }
	        else
	        {
	            $temp_array = array();
	            $temp_array['name'] = $_POST['name'];
	            $temp_array['type'] = 'view';
	            $temp_array['url'] = $_POST['url'];
	            $this-> array_insert($Weixin_menu["button"][$pid]["sub_button"], $id + 1, $temp_array);
	        }
	
	    }
	    	
	
	    $menu_json = $this->decodeUnicode(json_encode($Weixin_menu));
	
	
	
	
	    $res = $this->saveM($menu_json);
	    if ($res) {
	
	        $this->assign("jumpUrl",U('index'));
	        $this->success('设置成功');
	    } else {
	        $this->assign("jumpUrl",U('index'));
	        $this->error('设置失败或者没有改变');
	    }
	
	
	}
	public function array_insert(&$array, $position, $insert_array)
	{
	    $first_array = array_splice($array, 0, $position);
	    array_push($first_array, $insert_array);
	    $array = array_merge($first_array, $array);
	}
	//排序菜
	//活动微信统计
	public function wxactivity()
	{
	
	    $Model=new  \Think\Model();
	    $wx_activity=$Model->query("select group_concat('wx_id') as wxclikno,count('wx_id') as wxfxsum,wx_nickname,wxaddress,wx_time from (select * from cheerue_wx_activity order by `wx_time` desc) as tod  group by wx_id order by wx_time desc");
	    $this->assign(countren,count($wx_activity));
	
	    $zcount=M('Wx_activity')->count();
	    $this->assign('zcount',$zcount);
	    //分页
	    $Page  = new \Think\Page(count($wx_activity),20);
	    $wx_activity=$Model->query("select group_concat('wx_id') as wxclikno,count('wx_id') as wxfxsum,wx_nickname,wxaddress,wx_time,wx_headimgurl from (select * from cheerue_wx_activity order by `wx_time` desc) as tod group by wx_id order by wxfxsum desc limit  ".$Page->firstRow.",".$Page->listRows."");
	    $this->assign('wx_activity',$wx_activity);
	    $show = $Page->show();
	    $this->assign(page,$show);
	
	    $this->display();
	    
	}
	
	private function wxapp()
	{
	     $menu=M("weixin")->field('appid,appsecret')->find();
	     return $menu;
	}
 
   //拉取关注用户列表
   public function wx_user($openid)
   {
       $access_token=$this->getAccess();
       $result=file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$access_token."&next_openid=".$openid."");
       return $result;
   }  
   //批量获取用户信息
   public function  wx_userlist()
   {   
       $access_token=$this->getAccess();
       $user= $this->wx_user();
       $openid_list=json_decode($user,true);
       $useropenlist= $openid_list[data]['openid'];
       foreach ($useropenlist as $key=>$v )
       {
           $userlist2['user_list'][$key]['openid']=$v;
           $userlist2['user_list'][$key]['lang']='zh-CN';
       }
        $data=json_encode($userlist2);
        $listurl="https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=".$access_token."";
        return  $this->ht_curl_post($listurl,$data);
          
   }
   private function ht_curl_post($url,$data)
   {
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
       curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $tmpInfo = curl_exec($ch);
       if (curl_errno($ch))
       {
           return curl_error($ch);
       }
       curl_close($ch);
       return $tmpInfo;
   }
   
}