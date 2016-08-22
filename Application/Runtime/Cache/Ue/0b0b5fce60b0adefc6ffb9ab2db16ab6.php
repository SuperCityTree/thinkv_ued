<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo ($re_path); ?>/css/global.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ($re_path); ?>/css/main2.css"/>

<script type="text/javascript" src="<?php echo ($re_path); ?>/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo ($re_path); ?>/js/index.js"></script>
<title><?php echo getconfig(cfg_webname);?></title>
</head>

<body>

<div class="header">
	<div class="logo">
		<a href="<?php echo getconfig('cfg_indexurl');?>"><img src="<?php echo ($re_path); ?>/images/logo.png"/></a>
	</div>
	<div class="search">
		<form name="formsearch" action="<?php echo U('Plus/search');?>" method="GET">
			<input type="hidden" name="kwtype" value="0"/>
			<input name="key" type="text" class="sctxt" id="searchkey" />
			<input type="submit" value="" class="scbt"/>
		</form>
	</div>
	
</div>

<div class="banner banner2">
    <?php $_result=getcatlist(us_banner,img);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["link"]); ?>" width="1601" height="305"/><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="nav">
	<ul>	
		<li><a href="<?php echo getconfig('cfg_indexurl');?>">首 页</a></li>
		
		<?php $_result=getcategory('top');if(is_array($_result)): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a>
			<div class="secondary er<?php echo ($k); ?>">
				<?php $_result=getcategory('son',$vo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><a href="<?php echo ($in["url"]); ?>"><?php echo ($in["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>

	
	</ul>
</div>

<div class="main">
  <div class="left">
     <h2>联系我们<span>COMTACT US</span></h2>
    <div class="leftNav">
      <ul>
	
      </ul>
    </div>
  </div>
  <div class="right">
    <div class="current"><span class="nin">当前位置：</span><?php echo location();?></div>
    <div class="contact">
        <div class="yijian">
	<form id='reback'>

	        	<ul>
	            	<li><span>姓名：　</span><input type="text" name="name" class="text1" id="key" placeholder=" 请输入联系人姓名" /></li>
	            	<li><span>邮箱：　</span><input type="text" name="email" class="text1" id="key2" placeholder=" 请输入联系人邮箱" /></li>
	            	<li><span>内容：　</span><textarea id="key3" name="content" class="text2"placeholder="请输入联系人邮箱"></textarea></li>
	            	<li><span></span><a href="javascript:()" class="tj" />提交</a></li>
	            </ul>
	</form>
        </div>
    </div>
  </div>
</div>

<!-- <div class="fushu">
	<ul>
		<li><a href='subsidiary_fl.html'>法律条款</a></li>
		<li><a href='#'>隐私声明</a><span></span></li>
		<li><a href='#'>站点地图</a><span></span></li>
		<li><a href='#'>友情链接</a><span></span></li>
		<li><a href="#">联系方式</a><span></span></li>
	</ul>
</div> -->
<div class="footer">
	<div class="ftleft">
		<p style="margin-bottom:10px;">
			<img src="<?php echo ($re_path); ?>/images/ftlogo.jpg"/>
		</p>
		<p><?php echo getconfig(cfg_powerby);?></p>
	</div>
	<div class="ftright">
		<a href="<?php echo getconfig(weibo);?>" target="_blank"><img src="<?php echo ($re_path); ?>/images/wb_img.jpg"/></a>
		<a href="<?php echo getconfig(tencent);?>" target="_blank"><img src="<?php echo ($re_path); ?>/images/wx_img.jpg"/></a>
		<div class="ewm">
			<img src="<?php echo ($re_path); ?>/images/ewmbtn.jpg" width="128" height="48"/>
			<div>
				<img src="<?php echo ($re_path); ?>/images/ewm.png"/>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$('.tj').click(function(){

  var name=$("#key").val();
  var content=$("#key3").val();

  if(name==''){
    alert ('请输入您的姓名');
    return false;
  }else if(content==''){
    alert ('请输入您反馈的内容');
    return false;
  }else{


     $.ajax({
            cache: true,
            data:$('#reback').serialize(),
            type: "POST",
            url: "/he/index.php/Ue/Plus/addmsg/",
            async: true,
            error: function(request) {
              alert("稍候再试");
            },
            success: function(data) {
              alert("提交成功");
            }
          });



  }




})
  

</script>

</body>
</html>