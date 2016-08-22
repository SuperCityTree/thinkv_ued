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
        <h3>工具及消息</h3>
        <p>本栏目中将提供广告管理，消息管理以及数据库备份还原等基础工具。</p>
      </div>
    </div>



    <div class="container bs-docs-container">



              <div class="row">

                        <div class="col-md-2 nav_left" role="complementary">
                                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                                 <ul class="nav bs-docs-sidenav">
                                      <li>
                                        <a href="<?php echo U('tools/ad/');?>">广告管理</a>
                                       
                                      </li>
                                         <li>
                                        <a href="<?php echo U('tools/msg/');?>">反馈消息<?php echo getmsgunread();?></a>
                                    
                                      </li>
                                        <li>
                                        <a href="<?php echo U('tools/add_sy/');?>">水印管理</a>
                                        
                                      </li>
                                      
                                             <li class='active'>
                                        <a href="<?php echo U('tools/bakdate');?>">数据库备份</a>
                                        
                                      </li>
                                         <li><a  href="#" class="ui primary button clearbtn">清除缓存</a></li>
                                  </ul>
                                </nav>
                        </div>

                         <div class="col-md-10" role="main">
                         <div class="row">

                            <div class="demo" style="margin-left: 20px;">
            

                <table class="table table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="90%">
                    <tbody>
                        <tr class="tr_head">
                            <th width="60px">序号</th>
                            <th>文件名</th>
                            <th width="200px">备份时间</th>
                            <th width="150px">文件大小</th>
                            <th width="120px">操作</th>

                        </tr>
                        <?php if(!empty($lists)): if(is_array($lists)): foreach($lists as $key=>$row): if($key > 1): ?><tr>
                                        <td><?php echo ($key-1); ?></td>
                                        <td style="text-align: left"><a href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>"><?php echo ($row); ?></a></td>
                                        <td><?php echo (getfiletime($row,$datadir)); ?></td>
                                        <td><?php echo (getfilesize($row,$datadir)); ?></td>
                                        <td>
                                            <a href="<?php echo U('Tools/bakdate',array('Action'=>'download','file'=>$row));?>">下载</a>
                                            <a onclick="return confirm('确定将数据库还原到当前备份吗？')"href="<?php echo U('Tools/bakdate',array('Action'=>'RL','File'=>$row));?>">还原</a>
                                            <a onclick="return confirm('确定删除该备份文件吗？')"href="<?php echo U('Tools/bakdate',array('Action'=>'Del','File'=>$row));?>">删除</a>
                                        </td>
                                    </tr><?php endif; endforeach; endif; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7">没有找到相关数据。</td>
                            </tr><?php endif; ?>
                    </tbody>
                </table>
                <p>     
                    <a class="btn btn-warning pull-right" type="button" onClick="location.href = '/thinkv/index.php/Home/Tools/bakdate/Action/backup'">新增备份</a>
                </p>
            </div>
                                
                          </div>

                            
                      
                    </div>
            

    

        </div>
        
        
        
      </div>
    </div>



<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
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
$.post('/thinkv/index.php/Home/Tools/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>