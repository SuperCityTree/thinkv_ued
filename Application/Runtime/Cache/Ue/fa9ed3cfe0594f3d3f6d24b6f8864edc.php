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
		<a href="<?php echo getconfig('cfg_indexurl');?>"><img src="<?php echo ($re_path); ?>/images/logo.jpg"/></a>
	</div>
	<div class="search">
		<form name="formsearch" action="<?php echo U('Plus/search');?>" method="GET">
			<input type="hidden" name="kwtype" value="0"/>
			<input name="key" type="text" class="sctxt" id="searchkey" />
			<input type="submit" value="" class="scbt"/>
		</form>
	</div>
	<div class="yy">
		<a href="#" class="yy_a"></a>
		<div class="encn">
			<a href="#">中 文</a><span>|</span><a href="#">ENLISH</a>
		</div>
	</div>
</div>

<div class="main">
  <div class="seachJg">
    <div class="right">
      <div class="current"><span class="nin">当前位置：</span><a href="<?php echo getconfig('cfg_indexurl');?>" class="home">首页</a><strong>></strong><b>搜索结果</b></div>

      <div class="guanjian"> 搜索”<span><?php echo ($searchkey); ?></span>"</div>
      <div class="main6">
        <ul>
        	<?php if(is_array($search)): $i = 0; $__LIST__ = $search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" target="_blank"><span><?php echo (date('y-m-d',$vo["updatetime"])); ?></span><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>	           
        </ul>
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

</body>
</html>