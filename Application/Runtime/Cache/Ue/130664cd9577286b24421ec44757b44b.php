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

<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<style type="text/css">
body,html{margin:0;padding:0}
.iw_poi_title{color:#C52;font-size:14px;font-weight:700;overflow:hidden;padding-right:13px;white-space:nowrap}
.iw_poi_content{font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
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
		
		<?php $_result=getcategory('top');if(is_array($_result)): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li <?php if(!empty($vo["current"])): ?>class="hover"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a>
			
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
          <?php $_result=getcategory('same',$catinfo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[catid] == $catinfo[catid]): ?><li><a href="<?php echo ($vo["url"]); ?>" class="hover"><?php echo ($vo["catname"]); ?></a></li>
	 	<?php else: ?>
	 	<li ><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

          
      </ul>

    </div>

  </div>

  <div class="right">

    <div class="current"><span class="nin">当前位置：</span><?php echo location();?></div>

    <div class="contact">

    <div class="map">
<div style="width:747px;height:436px;" id="dituContent">&nbsp;</div>
</div>
<div class="mapwenzi">

 <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p >
             <?php echo ($vo["content"]); ?>
 </p><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<p>&nbsp;</p>

    </div>

  </div>

</div>

<script type="text/javascript">

    //创建和初始化地图函数：

    function initMap(){

        createMap();//创建地图

        setMapEvent();//设置地图事件

        addMapControl();//向地图添加控件

        addMarker();//向地图中添加marker

    }

    

    //创建地图函数：

    function createMap(){

        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图

        var point = new BMap.Point(116.465573,39.817579);//定义一个中心点坐标

        map.centerAndZoom(point,13);//设定地图的中心点和坐标并将地图显示在地图容器中

        window.map = map;//将map变量存储在全局

    }

    

    //地图事件设置函数：

    function setMapEvent(){

        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)

        map.enableScrollWheelZoom();//启用地图滚轮放大缩小

        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)

        map.enableKeyboard();//启用键盘上下左右键移动地图

    }

    

    //地图控件添加函数：

    function addMapControl(){

        //向地图中添加缩放控件

	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});

	map.addControl(ctrl_nav);

        //向地图中添加缩略图控件

	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0});

	map.addControl(ctrl_ove);

        //向地图中添加比例尺控件

	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});

	map.addControl(ctrl_sca);

    }

    

    //标注点数组

    var markerArr = [{title:"禾和商事调解",content:"北京大兴区旧宫镇德林园小区6号楼底商11号&nbsp;<br/>电话：18601308777",point:"116.465573|39.817579",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}

		 ];

    //创建marker

    function addMarker(){

        for(var i=0;i<markerArr.length;i++){

            var json = markerArr[i];

            var p0 = json.point.split("|")[0];

            var p1 = json.point.split("|")[1];

            var point = new BMap.Point(p0,p1);

			var iconImg = createIcon(json.icon);

            var marker = new BMap.Marker(point,{icon:iconImg});

			var iw = createInfoWindow(i);

			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});

			marker.setLabel(label);

            map.addOverlay(marker);

            label.setStyle({

                        borderColor:"#808080",

                        color:"#333",

                        cursor:"pointer"

            });

			

			(function(){

				var index = i;

				var _iw = createInfoWindow(i);

				var _marker = marker;

				_marker.addEventListener("click",function(){

				    this.openInfoWindow(_iw);

			    });

			    _iw.addEventListener("open",function(){

				    _marker.getLabel().hide();

			    })

			    _iw.addEventListener("close",function(){

				    _marker.getLabel().show();

			    })

				label.addEventListener("click",function(){

				    _marker.openInfoWindow(_iw);

			    })

				if(!!json.isOpen){

					label.hide();

					_marker.openInfoWindow(_iw);

				}

			})()

        }

    }

    //创建InfoWindow

    function createInfoWindow(i){

        var json = markerArr[i];

        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");

        return iw;

    }

    //创建一个Icon

    function createIcon(json){

        var icon = new BMap.Icon("http://app.baidu.com/map/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})

        return icon;

    }

    

    initMap();//创建和初始化地图

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