<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends CommonController {


  public function index(){
            $member=M('member');//实例化新闻列表
            $list = $member->where($where)->order('regdate desc')->page($_GET['p'].',20')->select();
            $this->assign('member_list',$list);// 赋值数据集

              //计算本月新增
             $strat_time = strtotime(date("Y")."-".date("m")."-1");//本月第一天
             $mouthfocus=0;
                foreach($list as $item){
                 
                      if($strat_time<$item[regdate]){
                           $mouthfocus += 1; 
                      }
                }
           $this->assign('mouthfocus',$mouthfocus);

            $count      = $member->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
                $this->assign('usermount',$count);// 赋值分页输出
            $this->display(); // 输出模板    
    }

//删除会员
     public function delete_member(){

        $member=M('member');//实例会员模型
         $md=M('member_detail');//实例会员详情
        $did=$_POST['userid'];

        foreach($did as $value){ 
          $member->where('userid='.$value)->delete();   
          $md->where('userid='.$value)->delete();     
        } 

     
          echo "1";
        
    }


}