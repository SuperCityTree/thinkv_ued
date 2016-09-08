<?php


//公共函数
//调用网站配置文件
function getconfig($varname) {
    $adlist=M('sysconfig');
    $result=$adlist->where("varname='".$varname."'")->find();
    return $result['value'];
}


//公共函数
//获取栏目名称
//$type 若不传则调用当前栏目 若为up则为父级栏目 top则为顶级栏目
function getcatname($catid,$type) {
    //var_dump($catid);
    $cat=M('category');
    

    if ($type=='up') {
        $info=$cat->where("catid='".$catid."'")->find();
        if($info[parentid]!=0){
            $result=$cat->where("catid='".$info['parentid']."'")->find();
        }
        else{
            $result=$info;
        }
        
    }elseif($type=='top'){
        $info=$cat->where("catid='".$catid."'")->find();
        if($info[parentid]!=0){
             $info2=$cat->where("catid='".$info['parentid']."'")->find();
         if($info2['parentid']=='0'){
          $result= $info2;
         }else{
           $result=$cat->where("catid='".$info2['parentid']."'")->find();
         }
      
        }else{
            $result=$info;
        }
            

        
    }
    else{
      $result=$cat->where("catid='".$catid."'")->find();
    }
    
    return $result['catname'];
}


//公共函数
//字符串截取
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)  

    {  
      $str=strip_tags($str);
  if(function_exists("mb_substr")){  

              if($suffix)  

              return mb_substr($str, $start, $length, $charset)."...";  

              else

                   return mb_substr($str, $start, $length, $charset);  

         }  

         elseif(function_exists('iconv_substr')) {  

             if($suffix)  

                  return iconv_substr($str,$start,$length,$charset)."...";  

             else

                  return iconv_substr($str,$start,$length,$charset);  

         }  

         $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]
                  [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";  

         $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";  

         $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";  

         $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";  

         preg_match_all($re[$charset], $str, $match);  

         $slice = join("",array_slice($match[0], $start, $length));  

         if($suffix) return $slice."…";  

         return $slice;

    }

    function Array2String($Array)
        {
            $Return='';
            $NullValue="^^^";
            foreach ($Array as $Key => $Value) {
                if(is_array($Value))
                    $ReturnValue='^^array^'.Array2String($Value);
                else
                    $ReturnValue=(strlen($Value)>0)?$Value:$NullValue;
                $Return.=urlencode(base64_encode($Key)) . '|' . urlencode(base64_encode($ReturnValue)).'||';
            }
            return urlencode(substr($Return,0,-2));
        }
    function String2Array($String)
            {
                $Return=array();
                $String=urldecode($String);
                $TempArray=explode('||',$String);
                $NullValue=urlencode(base64_encode("^^^"));
                foreach ($TempArray as $TempValue) {
                    list($Key,$Value)=explode('|',$TempValue);
                    $DecodedKey=base64_decode(urldecode($Key));
                    if($Value!=$NullValue) {
                        $ReturnValue=base64_decode(urldecode($Value));
                        if(substr($ReturnValue,0,8)=='^^array^')
                            $ReturnValue=String2Array(substr($ReturnValue,8));
                        $Return[$DecodedKey]=$ReturnValue;
                    }
                    else
                    $Return[$DecodedKey]=NULL;
                }
                return $Return;
            }


//邮件发送
    function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){
    $config = C('THINK_EMAIL');
    vendor('PHPMailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
    $mail             = new PHPMailer(); //PHPMailer对象
    $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();  // 设定使用SMTP服务
    $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    $mail->SMTPSecure = 'ssl';                 // 使用安全协议
    $mail->Host       = getconfig('cfg_smtp_server');  // SMTP 服务器
    $mail->Port       =  getconfig('cfg_smtp_port'); // SMTP服务器的端口号
    $mail->Username   = getconfig('cfg_smtp_user');  // SMTP服务器用户名
    $mail->Password   = getconfig('cfg_smtp_password');  // SMTP服务器密码
    $mail->SetFrom(getconfig('cfg_smtp_user'), '网站反馈');
    $replyEmail       =getconfig('cfg_smtp_user');
    $replyName        ='网站反馈';
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to, $name);
    if(is_array($attachment)){ // 添加附件
        foreach ($attachment as $file){
            is_file($file) && $mail->AddAttachment($file);
        }
    }
  
    return $mail->Send() ? true : $mail->ErrorInfo;
}



?>