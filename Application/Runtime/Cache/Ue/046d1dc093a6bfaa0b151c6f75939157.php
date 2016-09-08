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
    <?php $_result=getcatlist(develop_banner,img);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["link"]); ?>" width="1601" height="305"/>s<?php endforeach; endif; else: echo "" ;endif; ?></div>
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
   <h2>发展战略<span>DEVELOPMENT STRATEGY</span></h2>
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
    <div class="hezuoMain">
      <ul>

      <!-- <li>
          <dl>
            <dt><a href="#" target="_blank"><img src="images/1-1311201304010-L.jpg" width="224" height="147" /></a></dt>
            <dd>
              <h2><a href="#" target="_blank">平高集团</a></h2>
              <p><p>河南平高电气股份有限公司（股票代码600312）是全国高压开关行业首家通过中科院、科技部&ldquo;双高&rdquo;认证的高新技术企业，我国研制和生产高压、超高压、特高压开关及电站成套设备研发、制造基地，国家电工行业重大技术装备支柱企业，被评为 &ldquo;全国500家最大电器制造企业&rdquo;、&ldquo;河南省工业企业20强&rdquo;，&ldquo;河南省优秀高新技术企业&rdquo;，荣获&ldquo;全国</p>
            </dd>
          </dl>
        </li> -->

        <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <dl>
                <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank"><img src="<?php echo ($vo["thumb"]); ?>" width="224" height="147" /></a></dt>
                <dd>
                  <h2><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></h2>
                  <p><?php echo ($vo["description"]); ?></p>
                </dd>
              </dl>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

      </ul>
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