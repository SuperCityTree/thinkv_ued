<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<title><?php echo getconfig(cfg_webname);?></title>
<meta name="description" content="<?php echo ($catinfo["description"]); ?>">
<meta name="keyword" content="<?php echo ($catinfo["keyword"]); ?>">
<meta name="author" content="">

<link rel="shortcut icon" href="<?php echo ($re_path); ?>/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo ($re_path); ?>/css/common.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($re_path); ?>/css/common_new.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($re_path); ?>/css/current_event_list.css" />

<script type="text/javascript" src="<?php echo ($re_path); ?>/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo ($re_path); ?>/js/common.js"></script>
</head>

<body>
<div class="wrapper">
	<div id="wrap">
		<!-- header include -->
		<div id="header">
			
			
		
			<div class="gnb">
			<div class='wrap'>
			<div class="toplogo"><h1><a href="<?php echo getconfig('cfg_indexurl');?>"><img src="<?php echo ($re_path); ?>/images/h1_logo.png" alt="한샘인테리어" /></a></h1></div>
			<div class="topnav">
				<ul class="gnb_area">




					<li class="best on"><a href="<?php echo getconfig('cfg_indexurl');?>">首页</a></li>

					<?php $_result=getcategory('top');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="m0<?php echo ($i); ?>">
				                                         <a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a> 
				                                          <ul>
				                                                    <?php $_result=getcategory('son',$vo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($in["url"]); ?>"><?php echo ($in["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				                                            </ul>
				                                    
				                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>


					
				</ul>
			</div>
			<div class="clear-fix"></div>
			</div>
			</div>
			<div class="bg_blk opa80" style="display:none;" onclick="$('.close_btn').click();"></div> 
		</div>
		<!-- header include -->
		

		<!-- //header include -->
		<div id="content">
			<div class="location_wrap">

				<?php echo location();?>

				<!-- <a href="/index.do">HOME</a>&gt;<strong>이벤트</strong> -->

			</div>
			<div class="list_lnb">
				<ul>
					<?php $_result=getcategory('same',$catinfo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[catid] == $catinfo[catid]): ?><li class="current"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li>
						 	<?php else: ?>
						 	<li ><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="list_wrap">
				<div class="top_banner">

					
						<a href="<?php echo getcatset('7','newstop','link');?>" ><img width="1000px" src="<?php echo getcatset('7','newstop','img');?>" alt="<?php echo getcatset('7','newstop','name');?>"/></a>
				

				</div>
				<div class="event_list_wrap">
					
					
					<ul class="event_list">

					<?php if(is_array($list_data)): $i = 0; $__LIST__ = array_slice($list_data,<?php echo ($now_page); ?>,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo ($vo["url"]); ?>">
							<img width="480px;" height="160px;" src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" />
							
							</a>
							<div class="event_txt_area">
								<p class="event_tit"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></p>
								<p class="event_date"><?php echo (date('y-m-d',$vo["updatetime"])); ?></p>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					
				</div>
			</div><!-- list_wrap -->
		</div>
		<!-- footer include -->
		
<script type="text/javascript">
	$(document).ready(function(){
		$("#footer_select > li > a").click(function(){
			var onCnt = 0;
			$("#footer_select > li").each(function(){
				if($("#footer_select > li").attr("class") == "on"){
					onCnt++;
				}
			});
			if(onCnt == 0){
				window.open( $(this).attr("href"),"");
			}
		});
	});
</script>
    <!-- footer include -->
		<div id="footer">
			<div class="footer">
				<span class="logo"><img src="<?php echo ($re_path); ?>/images/foot_logo.gif"  /></span>
				<ul class="link">
					


					<?php $_result=getcategory('top');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li >
				                                         <a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a> 
				                                        
				                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

				</ul>

				<div class="family_site">
					<ul id="footer_select">
						<li class="on"><a href="javascript:;" title="새창으로 열립니다.">友情链接</a><span></span></li>

						    <?php $_result=getadgroup(5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["link"]); ?>" target="_blank" title="새창으로 열립니다."><?php echo ($vo["name"]); ?></a><span></span></li><?php endforeach; endif; else: echo "" ;endif; ?>

												
											</ul>
				</div>

				<script type="text/javascript">
					var footer_select = new selectFx();
					footer_select.selectSet("#footer_select","true");
				</script>

				<p class="info"><?php echo getconfig(cfg_footer);?><br /><?php echo getconfig(cfg_powerby);?></p>
			</div>
		</div>
	<!-- //footer include -->
	</div>
</div>


</body>
</html>