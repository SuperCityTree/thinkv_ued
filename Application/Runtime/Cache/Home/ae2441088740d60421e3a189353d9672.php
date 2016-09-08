<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
<title>控制中心_<?php echo ($cfg_webname); ?></title>
<link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/css/admin.css">

</head>
<body>

    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="../" class="navbar-brand">UED</a>
    </div>
    <nav id="bs-navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php echo U('index/index');?>" >控制台首页</a>
        </li>
        <li>
          <a href="<?php echo U('Content/index');?>">内容管理</a>
        </li>
        <li>
          <a href="<?php echo U('Category/index');?>" >栏目管理</a>
        </li>
        <li>
          <a href="<?php echo U('tools/index');?>" >工具及消息<?php echo getmsgunread();?></a>
        </li>
         <li>
          <a href="<?php echo U('Weixin/index');?>" >微信管理</a>
        </li>
        <li>
          <a href="<?php echo U('Member/index');?>" >会员管理</a>
        </li>
        <li>
          <a href="<?php echo U('Center/setting');?>/" >系统设置</a>
        </li>
        <li><a href="<?php echo getconfig('cfg_indexurl');?>" target="_blank">网站前台</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

     
         <li><a href="<?php echo U('Center/setting');?>/">你好，<?php echo getuser('user');?></a></li>
        <li><a  href="<?php echo U('User/loginout');?>"   class="ui primary button">退出</a></li>
      </ul>
    </nav>
  </div>
</header>

    <div class="bs-docs-header" id="content" tabindex="-1">
      <div class="container">
        <h3>系统设置</h3>
        <p>您可以在本栏目进行系统设置及管理员管理</p>
      </div>
    </div>



    <div class="container bs-docs-container">



              <div class="row">

                        <div class="col-md-2 nav_left" role="complementary">
                                         <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                                  <ul class="nav bs-docs-sidenav">
                                      <li>
                                       
                                        <ul class="nav">
                                            <li ><a href="<?php echo U('Center/admin');?>" >管理员列表</a></li>
                                          <li ><a href="<?php echo U('Center/setting');?>" >系统配置</a></li>
                                          <li class="active"><a href="<?php echo U('Center/theme');?>" >主题配置</a></li>
                                        </ul>
                                      </li>
                                  </ul>
                                </nav>
                                  </div>
                           <div class="col-md-10" role="main">

                           <ul class="themelist">
                           <?php if(is_array($themelist)): $i = 0; $__LIST__ = $themelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                             <img src="<?php echo ($vo["thumb"]); ?>">
                             <h3><?php echo ($vo["title"]); ?></h3>
                              <p>作者：cheerueTeam</p>
                              <?php if(!empty($vo["usable"])): ?><p><a  class="btn btn-success">已经启用</a> <a href="javascript:void(0)" class='themedata pull-right'>导入主题数据</a></p>
                              <?php else: ?> 
                              <p><a href="/thinkv/index.php/Home/center/chanage_theme/name/<?php echo ($vo["title"]); ?>" class="btn">立即启用</a></p><?php endif; ?>
                           </li><?php endforeach; endif; else: echo "" ;endif; ?>

                           </ul>


                           </div>

         

        
        
        
        
      </div>


    </div>


      <footer class="bs-docs-footer" role="contentinfo">
  <div class="container">

    <p>Designed and built  by <a href="http://cheerue.com" target="_blank">Cheerue</a></p>
 
    <p>如有问题，欢迎致电客服电话：010-57032682 </p>

  </div>
</footer>

<script>
$('.clearbtn').click(function(){
if(confirm("确认要清除缓存？")){
var $type=$('#type').val();
var $mess=$('#mess');
$.post('/thinkv/index.php/Home/Center/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>


      <!-- 添加系统配置 -->
<div class="modal fade" id="themedata" tabindex="-2" role="dialog" aria-labelledby="addModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">导入主题数据</h4>
      </div>
      <div class="modal-body">
      <p>导入主题数据将覆盖到现有数据，请谨慎操作!</p>
        <ul class="theme_data">
             <?php if(!empty($sqldata)): if(is_array($sqldata)): $i = 0; $__LIST__ = $sqldata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <h3><?php echo ($vo); ?></h3>
                            <p> <a onclick="return confirm('确定将该主题数据导入吗？现有数据将会被覆盖')"href="<?php echo U('Center/themedata',array('Action'=>'RL','File'=>$vo));?>" class="btn btn-success ">导入</a></p>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php else: ?>
                           <li>
                                <h3>该主题没有数据包</h3>
                                 </li><?php endif; ?>
                        <div class="clearfix"></div>
                        </ul>


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        
      </div>
    </div>
  </div>
</div>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">

  //添加管理员
  $('.themedata').click(function(){

    $('#themedata').modal('show');
    return false;
    
  })




</script>

</body>

</html>