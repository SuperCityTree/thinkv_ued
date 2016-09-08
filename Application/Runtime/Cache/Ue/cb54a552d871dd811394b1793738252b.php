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
<body>
<div class="header">
	<div class="logo">
		<a href="<?php echo getconfig('cfg_indexurl');?>"><img src="<?php echo ($re_path); ?>/images/logo.jpg"/></a>
	</div>
	<div class="search">
		<form name="formsearch" action="/plus/search.php">
			<input type="hidden" name="kwtype" value="0"/>
			<input name="q" type="text" class="sctxt"/>
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
<div class="banner banner2">
	<?php $_result=getcatlist(new_banner,img);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["link"]); ?>" width="1601" height="305"/><?php endforeach; endif; else: echo "" ;endif; ?>
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
		<h2>关于我们<span>aBOUT US</span></h2>
		<div class="leftNav">
			<ul>
				<?php $_result=getcategory('same',$catinfo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[catid] == $catinfo[catid]): ?><li><a href="<?php echo ($vo["url"]); ?>" class="hover"><?php echo ($vo["catname"]); ?></a></li>
	 	<?php else: ?>
	 	<li ><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<div class="right">
		<div class="current">
			<span class="nin">当前位置：</span><?php echo location();?>
		</div>
		<div class="News_xq">
			<div class="tittle">
				<h2><?php echo ($detail["title"]); ?></h2>
				<span>时间：<?php echo (date('y-m-d',$detail["updatetime"])); ?></span><span>字号：<a href="javascript:doZoom(16)">大</a><a href="javascript:doZoom(14)">中</a><a href="javascript:doZoom(12)">小</a></span>
			</div>
			<div class="new_wz" id="Zoom">
				<?php echo ($detail["content"]); ?>
			</div>
			<div class="fenxiang">
				<!-- JiaThis Button BEGIN -->
				<div class="jiathis_style">
					<a class="jiathis_button_qzone"></a><a class="jiathis_button_tsina"></a><a class="jiathis_button_tqq"></a><a class="jiathis_button_weixin"></a><a class="jiathis_button_renren"></a><a href="#" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a><a class="jiathis_counter_style"></a>
				</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
				<!-- JiaThis Button END -->
			</div>
			<div class="fanpian">
				<ul>
					<?php if(!empty($prev)): ?><li>上一篇：<a href='<?php echo ($prev["url"]); ?>'><?php echo ($prev["title"]); ?></a> ...</a></li>
						<?php else: ?>
						<li>上一篇：没有了 ...</li><?php endif; ?>

					<?php if(!empty($next)): ?><li>下一篇：<a href='<?php echo ($next["url"]); ?>'><?php echo ($next["title"]); ?></a> ...</a></li>
						<?php else: ?>
						<li>下一篇：没有了 ...</li><?php endif; ?>
					<a href="javascript:window.close()" class="close">【关闭】</a>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> 
function doZoom(size) 
{ 
var zoom=document.all?document.all['Zoom']:document.getElementById('Zoom'); 
zoom.style.fontSize=size+'px'; 
} 
</script>
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