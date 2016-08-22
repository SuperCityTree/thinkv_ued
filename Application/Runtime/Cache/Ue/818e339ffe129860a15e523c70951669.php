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
	<?php $_result=getcatlist(about_banner,img);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["link"]); ?>" width="1601" height="305"/><?php endforeach; endif; else: echo "" ;endif; ?>
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
		<h2>关于我们<span>ABOUT US</span></h2>
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
			<span class="nin">当前位置：</span><a href="#" class="home">首页</a><strong>></strong><a href="#">关于我们</a><strong>></strong><b>公司简介</b>
		</div>
		<div class="aboutMain">
			<h2>飞宇投资控股有限公司（下称飞宇控股）<span>FEEYU HOLDING GROUP</span></h2>
			<p>
				<img width="792" height="135" src="<?php echo ($re_path); ?>/images/aboutImg_20.jpg" alt=""/>
			</p>
			<p>
				河南飞宇投资控股有限公司（以下简称飞宇控股）是一家专业从事金融投资的大型综合性企业集团。公司通过持续管理创新，市场不断开拓，经营网点已覆盖国内外，成功地实现了从无到有、从小到大的跨越式发展。公司已初步形成了&ldquo;以一业特强，适度发展多元产业&rdquo;的业务布局，并朝向多业态、跨区域、跨行业的大型企业集团迈进。
			</p>
			<p>
				公司总部位于河南省郑州市，现有员工1000余人。公司专业技术人才力量雄厚，科研实力较强。公司的业务范围涵盖工业电气、商业地产、创新创业综合体、实业投资等四大板块，全资控股数家工业电气实体生产企业，并投资开发数个商业地产项目。工业电气方面两大重点项目为飞宇重工、平开集团；商业地产方面两大重点项目为郑州飞宇五金机电市场、平顶山飞宇国际汽贸城。其他正在投资开发的项目有平顶山飞宇保税物流园区、平顶山平开电力加速园、郑州飞宇（新郑）电气创新创业综合体、平顶山湛南新城红星美凯龙、平顶山第三污水处理厂等。
			</p>
			<p>
				工业电气是飞宇控股的龙头和主业，下属的河南飞宇重工机械制造有限公司是一家专业生产GIS焊接筒体及高压开关零部件的出口型高新技术型企业。公司已与平高集团、平高东芝、韩国晓星等国内外多家知名企业建立了良好的战略合作伙伴关系，并成为国内外综合配套能力强、极具竞争力的GIS零部件制造商，公司产品在国际市场上也占据一定份额。下属另一重点企业河南平开电力设备集团有限公司专业从事输配电及控制设备研发和生产制造的高新技术企业，其产品在国内市场上已占有较大份额，并已成功实现出口。
			</p>
			<p>
				商业地产项目是公司业态呈多元化发展的重要一个环节。公司下属的郑州飞宇五金机电市场总建筑面积26万平方米，依托新郑南龙湖20平方公里商贸物流园区，打造具有地方特色的集商品展示、接待办公、仓储物流及信息交流于一体的综合批零市场。平顶山飞宇国际汽贸城总建筑面积35万平方米，是平顶山首家一站式整车销售、零配件、汽车用品交易、汽车维修服务汽车后市场服务基地。正在建设的平顶山保税物流园区，将整合豫中南地区物流及仓储资源，为本地乃至周边进口出企业提供便利的进出口业务支持及货源支持，促进河南省进出口业务的发展。
			</p>
			<p>
				创新创业综合体是公司近年重点打造的新型业态，重点为科技孵化及小微企业加速为主。建设中的飞宇（新郑）电气创新创业综合体是以智能化的电气装备研发制造为基础、以智能输变配电成套设备制造产业为核心，以智能信息和智能物流产业为保障、以创新制造4.0为目标的高科技产业园区。项目将通过电气装备产业园的集聚效应，逐步引导产业园的电气装备产业由以工业制造为主，向制造、研发、销售、总部经济等高端形态转变，成为引领全球电气装备产业发展的龙头。另一重点项目平顶山平开电力加速园是一家以电气装备产业孵化加速综合服务为主的综合性园区。项目定位于电气装备产业孵化加速服务及企业总部办公基地转移承接，依托平高集团的战略优势，吸引电气装备上下游产业企业聚集，打造电气产业装备产业完整产业链。
			</p>
			<p>
				飞宇控股坚守&ldquo;创造价值、服务社会、成就员工&rdquo;的企业使命，秉承&ldquo;用心成就梦想&rdquo;的企业精神，稳健经营，和谐发展。飞宇注重以人为本，让员工成为企业的员工，让企业成为员工的企业。飞宇坚信企业是社会的一个重要部分，愿与社会一起，携手共进，开拓进取，共同营造价值，促进和谐社会的发展。
			</p>
			<p>
				&nbsp;
			</p>
		</div>
	</div>
</div>
<div class="fushu">
	<ul>
		<li><a href='#'>法律条款</a></li>
		<li><a href='#'>隐私声明</a><span></span></li>
		<li><a href='#'>站点地图</a><span></span></li>
		<li><a href='#'>友情链接</a><span></span></li>
		<li><a href="#">联系方式</a><span></span></li>
	</ul>
</div>
<div class="footer">
	<div class="ftleft">
		<p style="margin-bottom:10px;">
			<img src="<?php echo ($re_path); ?>/images/ftlogo.jpg"/>
		</p>
		<p>
			Copyright 2013 <span style=" margin:0 5px; color:red;">FEEYU HOLDING GROUP</span> All Rights Reserved
		</p>
	</div>
	<div class="ftright">
		<a href="#" target="_blank"><img src="<?php echo ($re_path); ?>/images/wb_img.jpg"/></a><a href="#" target="_blank"><img src="<?php echo ($re_path); ?>/images/wx_img.jpg"/></a>
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