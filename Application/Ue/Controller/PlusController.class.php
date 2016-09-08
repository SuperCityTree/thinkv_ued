<?php
namespace Ue\Controller;

use Think\Controller;

class PlusController extends CommonController {
   
//搜素
    public function search(){
        $key=$_GET['key'];

      //  var_dump($key);
        $where="`title` LIKE '%".$key."%' OR `content` LIKE '%".$key."%'";
         $where3="`title` LIKE '%".$key."%' OR `responsibilities` LIKE '%".$key."%'";
        $news=M('news');//实例化新闻模块
        $result1=$news->where($where)->select();//新闻结果

           $count1=count($result1); 
                if($count1>0){
                         for($i=0;$i<$count1;$i++) 
                               { 
                                     $result1[$i]['url']=__APP__."/Ue/Show/index/cid/".$result1[$i]['catid']."/aid/".$result1[$i]['id']; //返回栏目链接
                               }   
                }   

        $product=M('product');//实例化产品模型
        $result2=$product->where($where)->select();//产品结果


           $count2=count($result2); 
           if($count2>0){

                       for($i=0;$i<$count2;$i++) 
                                      { 
                                           $result2[$i]['url']=__APP__."/Ue/Show/index/cid/".$result2[$i]['catid']."/aid/".$result2[$i]['id']; //返回栏目链接
                                     }   

           }
      

        $media=M('media');//实例化媒体模型
        $result3=$media->where($where)->select();//媒体结果

           $count3=count($result3); 
           if($count3>0){

                       for($i=0;$i<$count3;$i++) 
                                      { 
                                           $result3[$i]['url']=__APP__."/Ue/Show/index/cid/".$result3[$i]['catid']."/aid/".$result3[$i]['id']; //返回栏目链接
                                     }   

           }

        $hr=M('hr');//实例化hr模型
        $result4=$hr->where($where3)->select();//hr结果

           $count4=count($result4); 
           if($count4>0){

                       for($i=0;$i<$count4;$i++) 
                                      { 
                                           $result4[$i]['url']=__APP__."/Ue/Show/index/cid/".$result4[$i]['catid']."/aid/".$result4[$i]['id']; //返回栏目链接
                                     }   

           }


        $page=M('page');//实例化单页模型
        $result5=$page->where($where)->select();//单页结果

         $count5=count($result5); 
           if($count5>0){

                       for($i=0;$i<$count5;$i++) 
                                      { 
                                          $result5[$i]['url']=__APP__."/Ue/List/index/cid/".$result5[$i]['catid']; //返回栏目链接
                                     }   

           }

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

         $this->display('/search'); 
        
    }



    //添加反馈消息
    public function addmsg()
    {


                    $newdata['name']=$_POST['name']; 
                    $newdata['sex']=$_POST['sex']; 
                    $newdata['sex'] = isset($_POST['sex']) ? $_POST['sex'] : '未填写';
                   // $newdata['img']=$_POST['img']; 
                    $newdata['tel'] = isset($_POST['tel']) ? $_POST['tel'] : '未填写';
                    $newdata['email']=$_POST['email']; 
                    $newdata['address']=$_POST['address']; 
                     $newdata['channel'] = isset($_POST['channel']) ? $_POST['tel'] : '未填写';
                    $newdata['content']=$_POST['content']; 
                    $newdata['applytime']=time(); 
                    $newdata['read']="1"; 
                    $newdata['ip']= get_client_ip(); 

                    //需开发人员处理的部分
                    $orderid=$_POST['productid']; 
                    $price=$_POST['price']; 
                    $title=$_POST['title']; 
                     $img=$_POST['img']; 
                     $str="<li class='list-group-item'>申请产品id<span class='pull-right ' >".$orderid." </span></li>";
                     $str=$str."<li class='list-group-item'>产品名称<span class='pull-right ' >".$title." </span></li>";
                     $str=$str."<li class='list-group-item'>产品价格<span class='pull-right ' >￥".$price." </span></li>";
                      $str=$str."<li class='list-group-item'>产品图片<span class='pull-right ' ><img src='".$img."' style='width:150px'></span></li>";
                      $newdata['otherinfo']= $str; 


                    $msg=M('msg');// 实例化文章模型
                     $result=$msg-> add($newdata);   
                      //$User->where('id=5')->save($data);    
                            if ($result!==false) 
                            {
                                echo "1";
                            } 
                            else 
                            {
                                    echo "0";
                            }

                      $content="<p>客户姓名：".$newdata['name']."<br>客户电话：". $newdata['tel']."<br>联系邮件：".$newdata['email']."<br>申请时间：". date("Y/m/d", $newdata['applytime']);

                      $body=$this->emailcontent($content);
                      think_send_mail(getconfig('emailhr'), "网站反馈", $subject = '网站反馈', $body , $attachment = null);
  


    }




    private function emailcontent($content){
          $body="<div><br></div><div><includetail><style type='text/css'>body,#bodyTable,#bodyCell,#bodyCell{height:100%!important;margin:0;padding:0;width:100%!important;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,'Lucida Grande',sans-serif}table{border-spacing:0px}table{width:100%!important;margin:auto;max-width:600px!important;color:#7A7A7A;font-weight:normal}img,a img{border:0;border-style:none;border-color:#ffffff;outline:none;text-decoration:none;height:auto;line-}a{text-decoration:none!important;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,'Lucida Grande',sans-serif}h1,h2,h3,h4,h5,h6{color:#363C43;font-weight:500;font-family:'AvenirNextLTPro-Medium','Avenir Next','HelveticaNeueMedium','HelveticaNeue-Medium','Helvetica Neue Medium','HelveticaNeue','Helvetica Neue','Avenir',Helvetica;font-size:20px;line-text-align:Left;letter-spacing:normal;margin-top:17px;margin-right:0;margin-bottom:13px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-}table,td{mso-table-lspace:0pt;mso-table-rspace:0pt}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic;display:block;outline:none;text-decoration:none}body,table,td,p,a,li,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.ExternalClass td[class='ecxflexibleContainerBox']h3{padding-top:13px!important}h1{display:block;font-size:26px;font-style:normal;font-weight:500;line-}h2{display:block;font-size:20px;font-style:normal;font-weight:500;line-}h3{display:block;font-size:17px;font-style:normal;font-weight:500;line-}h4{display:block;font-size:18px;font-style:italic;font-weight:500;line-}.flexibleImage{height:auto}.linkRemoveBorder{border-bottom:0!important}table{padding-bottom:0!important;padding-top:0!important}body,#bodyTable{background-color:#F0F1F3}#emailHeader{background-color:#F0F1F3}#emailBody{background-color:#FFFFFF;border-spacing:0px;border:1px solid#E0E1E2;box-shadow:0 0 15px#E8EAEC;-moz-box-shadow:0 0 15px#E8EAEC;-webkit-box-shadow:0 0 15px#E8EAEC;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px}#emailFooter{background-color:#F0F1F3}.textContent,.textContentLast{color:#6B7075;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica;font-size:16px;line-text-align:left}.textContent a,.textContentLast a{color:#2D9AE5;text-decoration:underline}.nestedContainer{background-color:#F6F7F8;border:1px solid#F3F3F5}.emailButton{background-color:#2D9AE5;border-collapse:separate}.buttonContent{color:#FFFFFF;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica;font-size:18px;font-weight:bold;line-padding:15px;text-align:center}.buttonContent a{color:#FFFFFF;display:block;text-decoration:none!important;border:0!important}.emailCalendar{background-color:#FFFFFF;border:1px solid#CCCCCC}.emailCalendarMonth{background-color:#2D9AE5;color:#FFFFFF;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,sans-serif;font-size:16px;font-weight:bold;padding-top:10px;padding-bottom:10px;text-align:center}.emailCalendarDay{color:#2D9AE5;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,sans-serif;font-size:60px;font-weight:bold;line-padding-top:20px;padding-bottom:20px;text-align:center}.imageContentText{margin-top:10px;line-height:0}.imageContentText a{line-height:0}#invisibleIntroduction{display:none!important;font-size:1px}.ios-footer{color:#8D9196;text-decoration:none!important}.ios-footer a{color:#8D9196;text-decoration:none!important}span a{color:#275100!important;text-decoration:none!important}span a{color:#2D9AE5!important;text-decoration:none!important}span a{color:#6B7075!important;text-decoration:none!important}.a[href^='tel'],a[href^='sms']{text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important}.mobile_link a[href^='tel'],.mobile_link a[href^='sms']{text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important}</style><center style='background-color:#F0F1F3;'><table border='0'cellpadding='0'cellspacing='0'width='100%'id='bodyTable'style='table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;'><tbody><tr><td align='center'valign='top'id='bodyCell'><table bgcolor='#F0F1F3'border='0'cellpadding='0'cellspacing='0'width='600'id='emailHeader'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='600'class='flexibleContainer'><tbody><tr><td valign='top'width='600'class='flexibleContainerCell'><table align='center'border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='middle'id='invisibleIntroduction'class='flexibleContainerBox'style='display:none !important;'><table border='0'cellpadding='0'cellspacing='0'width='100%'style='max-width:100%;'><tbody><tr><td align='center'class='textContent'><div style='font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,sans-serif; font-size:1px;color:#F0F1F3;text-align:center;line- display: block'>Featured Webflow blog post</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table bgcolor='#F0F1F3'border='0'cellpadding='0'cellspacing='0'width='600'id='emailHeader'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='600'class='flexibleContainer'><tbody><tr><td valign='top'width='600'class='flexibleContainerCell'><table align='center'border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'style='display:block; text-align:center;'><table border='0'cellpadding='0'cellspacing='0'width='100%'style='max-width:100%;'><tbody><tr><td align='center'>您有新的反馈</td></tr><tr><td align='center'style='padding-top:3px; padding-bottom:15px;'><div style='text-align:center;font-family:'AvenirNextLTPro-Medium','Avenir Next','HelveticaNeueMedium','HelveticaNeue-Medium','Helvetica Neue Medium','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,sans-serif;font-weight:500;font-size:11px;margin-bottom:0;color:#909192;line-letter-spacing:0.5px;text-transform:uppercase;'>网页反馈</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table bgcolor='#FFFFFF'border='0'cellpadding='0'cellspacing='0'width='600'id='emailBody'style='margin-bottom: 20px; border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='600'class='flexibleContainer'><tbody><tr><td align='center'valign='top'width='600'class='flexibleContainerCell'><table border='0'cellpadding='30'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td valign='top'class='textContent'><div style='text-align:center;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,sans-serif;font-size:11px;margin-bottom:0;color:#909192;line-letter-spacing:0.5px;margin-bottom: 8px;'>反馈信息内容</div>".$content."</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table bgcolor='#FFFFFF'border='0'cellpadding='0'cellspacing='0'width='600'id='emailBody'style='border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;margin-bottom:10px;'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='600'class='flexibleContainer'><tbody><tr><td align='center'valign='top'width='600'class='flexibleContainerCell'><table border='0'cellpadding='30'cellspacing='0'width='100%'><tbody><tr><td align='center'valign='top'><table border='0'cellpadding='0'cellspacing='0'width='100%'><tbody><tr><td valign='top'class='textContent'><div style='text-align:center;font-family:'AvenirNextLTPro-Regular','Avenir Next','HelveticaNeue','Helvetica Neue','Avenir',Helvetica,Arial,sans-serif;font-size:16px;margin-bottom:0;margin-top:3px;color:#6B7075;line-'>建议您尽快和客户取得联系，方便安排听课事宜</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></center></includetail></div>";

    return $body;
    }



}