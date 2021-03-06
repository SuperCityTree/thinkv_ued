<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
    *{ padding: 0; margin: 0; }
    body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 6px;   background-color: #f5f8fa;}



.message {
       width: 337px;
    height: 397px;
    margin: auto;
    border: 1px solid #ddd;
    border-radius: 29px;
    margin-top: 60px;
    background: #fff;
    overflow: hidden;
    box-shadow: 0 4px 67px 0 #999;
    color: #666;
    font-size: 14px;
    position: relative;
}
.message a{
  color: #fff;
}
    .head{width: 100%;height: 60px;background: #fff;text-align: center;padding-top: 5px;line-height: 60px; color: #333;font-size: 24px;border-bottom: 1px solid #ddd}
    .content{height: 120px;width: 100%;}
    .success ,.error{text-align: center;margin-top: 120px;font-size: 16px;}
    .jump{text-align: center;bottom: 30px;position: absolute;width: 100%}
    </style>

    </head>

    <body>
    <div class="message">

    <div class="head"><span>正在跳转:</span></div>

    <div class="content">


    <?php if(isset($message)) {?>

    <p class="success">:) <?php echo($message); ?></p>

    <?php }else{?>

    <p class="error">:( <?php echo($error); ?></p>

    <?php }?>

    <p class="detail"></p>

    <p class="jump">

    <a id="href" href="<?php echo($jumpUrl); ?>">如果你的浏览器没有自动跳转，请点击这里...</a>

    <br />

    等待时间： <b id="wait"><?php echo($waitSecond); ?></b>

    </p>

    </div>

    </div>

    <script type="text/javascript">

    (function(){

    var wait = document.getElementById('wait'),href = document.getElementById('href').href;

    var interval = setInterval(function(){

    var time = --wait.innerHTML;

    if(time <= 0) {

    location.href = href;

    clearInterval(interval);

    };

    }, 1000);

    })();

    </script>

    </body>

    </html>