<?php if (!defined('THINK_PATH')) exit();?><div class="fushu">
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