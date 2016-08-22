<?php
//微信控制器
namespace Home\Controller;
use Think\Controller;
class WeixinController extends CommonController {

    //栏目列表
    public function index(){
        $r=D("weixin");
       echo $r->getAccess();
        $this->redirect('Weixin/set');
 
    }
   //基础配置
   public function set()
   {   
       $list=D('Weixin');  
       $this->assign('set',$list->cone());      
       $this->display(); 
   }
  
  //菜单管理
  public function menu()
  {     $menu=M("wx_menu")->find();
        //dump(json_decode($menu['wxcontent']),TRUE);
        $Weix=D('Weixin');
        $data=$Weix->tongbumenu(); 
		$var=json_decode($data,true);   
		$menu_list=$var['menu']['button'];
		$this->assign(menu_list,$menu_list);  
        $this->display();
  }
  //会员管理
  public function user()
  {  
       $result=D('Weixin');
       $t=$result->wx_userlist();
       $userlist=json_decode($t,true);
       $this->sortArrByField($userlist['user_info_list'],'subscribe_time',"desc");

       $this->assign('userlist',$userlist['user_info_list']);

      $usermount=count($userlist['user_info_list']);
       $this->assign('usermount',$usermount);

            $boy = 0;
             $girl=0;
             $mouthfocus=0;
              $strat_time = strtotime(date("Y")."-".date("m")."-1");//本月第一天

          foreach($userlist['user_info_list'] as $item){
                if($item['sex']==1){
                 $boy += 1 ;
                }
                elseif($item['sex']==2){
                    $girl += 1; 
                }
                if($strat_time<$item[subscribe_time]){
                     $mouthfocus += 1; 
                }
          }

          $this->assign('boy',$boy);
          $this->assign('girl',$girl);
           $this->assign('mouthfocus',$mouthfocus);

       

       $this->display();
  }

private    function sortArrByField(&$array, $field, $desc = false){
    $fieldArr = array();

    foreach ($array as $k => $v) {
    $fieldArr[$k] = $v[$field];
    }
    $sort = $desc == false ? SORT_ASC : SORT_DESC;
    array_multisort($fieldArr, $sort, $array);
}

  //配置公众号基础
  public function setadd()
  {
      $set=M('Weixin')->find();
      if(!$set && M('Weixin')->create())
      {
        $result=  M('Weixin')->add();
         if($result){ $this->success('新增成功', 'set');}else{$this->error('新增失败', 'set');}
      }else{
       
        $result=M('Weixin')->where('id='.$_POST['id'])->save($_POST);
        if($result){$this->success('修改成功', 'set');}else{$this->error('没有更新', 'set');}
      }
      
  }
  //修改菜单
  public function edit()
  {  
      $wei=D('Weixin');
      $wei->editHandle();
  }
  //更新到微信平台
  public function wxupdata()
  {
       $wei=D('Weixin');
       $rezult=$wei->up_wx_menu();
        if($rezult==0)
	    {
	        $this->success('更新成功','index');
	    }
	    else
	    {
	        $this->error('更新失败','index');
	    }
  } 
  
  
  public  function  userlist()
  {}

}