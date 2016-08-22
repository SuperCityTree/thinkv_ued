<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo getseo('description');?> ">
  	<meta name="keywords" content="<?php echo getseo('keywords');?>">

	<link rel="stylesheet" href="<?php echo ($re_path); ?>/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo ($re_path); ?>/css/style.css"> <!-- Resource style -->
	<script src="<?php echo ($re_path); ?>/js/modernizr.js"></script> <!-- Modernizr -->
	<title><?php echo getconfig(cfg_webname);?></title>
</head>
<body>
<header>
	<h1>THINK-V 使用手册</h1>
</header>
<section class="cd-faq">
	<ul class="cd-faq-categories">
		<!-- <li><a class="selected" href="#basics">Basics</a></li> -->
		<?php $_result=getcategory('top');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="m0<?php echo ($i); ?>" >
                                         <a href="#goto<?php echo ($vo["catid"]); ?>"><?php echo ($vo["catname"]); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">

	<?php $_result=getcategory('top');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul id="basics" class="cd-faq-group">
				                                         <li class="cd-faq-title" id='goto<?php echo ($vo["catid"]); ?>'><h2><?php echo ($vo["catname"]); ?></h2></li>

				                                                    <?php $_result=getcategory('son',$vo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><li>
									<a class="cd-faq-trigger loading" href="#0" data='<?php echo ($in["catid"]); ?>'><?php echo ($in["catname"]); ?></a>
									
									<div class="cd-faq-content">
										<p>
										
										内容加载中
										</p>
									</div> <!-- cd-faq-content -->
									
								</li><?php endforeach; endif; else: echo "" ;endif; ?>

				                       </ul><?php endforeach; endif; else: echo "" ;endif; ?>




	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="<?php echo ($re_path); ?>/js/jquery-2.1.1.js"></script>
<script src="<?php echo ($re_path); ?>/js/jquery.mobile.custom.min.js"></script>
<script src="<?php echo ($re_path); ?>/js/main.js"></script> <!-- Resource jQuery -->
<script>
			$(".cd-faq-trigger").click(function(){
				var catid=$(this).attr('data');
				var thisone=$(this);
				var nextshow=$(this).next('.cd-faq-content');
				if(thisone.hasClass('loading')){
					$.ajax({
					cache: true,
					type: "POST",
					url: "/thinkv_p/index.php/Ue/Ajax/getcontent/cid/" + catid,
					async: true,
					error: function(request) {
						alert("稍候再试");
					},
					success: function(data) {
						nextshow.html(data);
						thisone.removeClass('loading')
					}
				});
				}
				

			})




</script>
</body>
</html>