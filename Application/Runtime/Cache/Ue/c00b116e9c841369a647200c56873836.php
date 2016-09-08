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
    <?php $_result=getcatlist(hr_banner,img);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["link"]); ?>" width="1601" height="305"/><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
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
    <h2>人力资源<span>HUMaN RESOURCES</span></h2>
    <div class="leftNav">
      <ul>
          <?php $_result=getcategory('same',$catinfo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[catid] == $catinfo[catid]): ?><li><a href="<?php echo ($vo["url"]); ?>" class="hover"><?php echo ($vo["catname"]); ?></a></li>
	 	<?php else: ?>
	 	<li ><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
  <div class="right">
    <div class="current"><span class="nin">当前位置：</span><?php echo location();?></div>
    <div class="zhaoping">
      <div class="wenzi">
    <p>飞宇控股是一家专业从事金融理财的专业服务公司，公司本着&quot;为客户创造最大利润&quot;的经营理念<br />
秉承&quot;使命、忠诚、一流&quot;的企业核心价值观</p>
    </div>
      <div class="re">职位申请</div>
      <div class="tittle"><span class="name">职位</span><span class="didian">地点</span><span class="renshu">人数</span><span class="time">时间</span></div>
      <ul>
      <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
          <div class="tittle"><span class="down"><img src="<?php echo ($re_path); ?>/images/d_03.jpg" width="20" height="49" /></span><span class="name"><?php echo ($vo["title"]); ?></span><span class="didian"><?php echo ($vo["address"]); ?></span><span class="renshu"><?php echo ($vo["number"]); ?>人</span><span class="time"><?php echo (date('y-m-d',$vo["updatetime"])); ?></span></div>
          <div class="yincang dis">
            <div class="wenzi2">
              <h2>职位描述</h2>
              <p><?php echo ($vo["text"]); ?></p>
            </div>
            <div class="up"><span><img src="<?php echo ($re_path); ?>/images/u_06.jpg" width="20" height="49" /></span><a href="<?php echo ($vo["url"]); ?>" target="_blank">申请此职位</a></div>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <div class="page">
         <?php echo ($page); ?>
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