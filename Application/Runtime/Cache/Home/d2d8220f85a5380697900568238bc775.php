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
<link rel="stylesheet" type="text/css" href="/thinkv_p/Public/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkv_p/Public/admin/css/admin.css">
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
                                         <li class='active'>
                                        <a href="<?php echo U('tools/msg/');?>">反馈消息<?php echo getmsgunread();?></a>
                                   
                                      </li>
                                        <li>
                                        <a href="<?php echo U('tools/add_sy/');?>">水印管理</a>
                                        
                                      </li>
                                             <li>
                                        <a href="<?php echo U('tools/bakdate');?>">数据库备份</a>
                                        
                                      </li>
                                         <li><a  href="#" class="ui primary button clearbtn">清除缓存</a></li>
                                      
                                  </ul>
                                </nav>
                        </div>

                         <div class="col-md-10" role="main">
                         <div class="row pd20">
                            
                            <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">反馈消息列表</h3>
                                  </div>
                                         <ul class="list-group">
                                           <?php if(is_array($msg_list)): $i = 0; $__LIST__ = $msg_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["read"] != '0'): ?><li class="list-group-item list-group-item-warning getmsg" data='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?>&nbsp;<?php echo ($vo["tel"]); ?><span class="pull-right glyphicon glyphicon-menu-right"></span><span class="pull-right "><?php echo (date('Y-m-d',$vo["applytime"])); ?></span></li>
                                                <?php else: ?>
                                                   <li class="list-group-item getmsg" data='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?>&nbsp;<?php echo ($vo["tel"]); ?><span class="pull-right glyphicon glyphicon-menu-right"></span><span class="pull-right "><?php echo (date('Y-m-d',$vo["applytime"])); ?></span></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            <div class="clearfix"></div>
                                          </ul>
                                </div>

                                 



                          </div>

                            
                            <?php echo ($page); ?>
                           
                    </div>
            

    

        </div>
        
        
        
      </div>
    </div>

 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">信息详情</h4>
      </div>
      <div class="modal-body">
          <ul class="list-group" id='itemshow'>
                  <li class="list-group-item ">姓名<span class="pull-right " id='name'>未填写</span></li>
                  <li class="list-group-item ">电话<span class="pull-right " id='tel'>未填写</span></li>
                  <li class="list-group-item ">邮箱<span class="pull-right " id='email'>未填写</span></li>
                   <li class="list-group-item ">提交时间<span class="pull-right " id='applytime'>未填写</span></li>
               
            </ul>
          <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <a  href="#" date='' class="btn btn-danger  pull-left dodelete"  id='deid'>删除</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal"> 关闭</button>
      </div>
    </div>
  </div>
</div>





<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(".getmsg").click(function(){
        var thisitem=$(this);
        var id=$(this).attr('data');
            $.ajax({
                cache: true,
                type: "POST",
                url:"/thinkv_p/index.php/Home/tools/getmsg/id/"+id,
                data:$('#addad').serialize(),// 你的formid
                dataType: "json", 
                async: true,
                error: function(request) {
                    alert("获取失败");
                },
                success: function(data) {
               
                  $('#myModal').modal('show')
                   $('#name').html(data.name);
                     $('#tel').html(data.tel);
                      $('#email').html(data.email);
                     $('#applytime').html(data.applytime);
                      $('#deid').attr('date',data.id);
                      $('#itemshow').append(data.otherinfo);
                     var badge=$('.badge').html();
                     badge=parseInt(badge);
                     if(badge>1){
                      badge=badge-1;
                      $('.badge').html(badge);
                     }
                     else{
                        $('.badge').hide();
                     }
                     thisitem.removeClass('list-group-item-warning');
                     
                }
            });


  })

  $(".getyuyue").click(function(){
        var thisitem=$(this);
        var id=$(this).attr('data');
            $.ajax({
                cache: true,
                type: "POST",
                url:"/thinkv_p/index.php/Home/tools/getyuyue/id/"+id,
                dataType: "json", 
                async: true,
                error: function(request) {
                    alert("获取失败");
                },
                success: function(data) {
               
                  $('#myModal2').modal('show')
                   $('#yycity').html(data.city);
                     $('#yysex').html(data.sex);
                     $('#yytel').html(data.tel);
                     $('#yystore').html(data.store);
                      $('#yykidsname').html(data.kidsname);
                     $('#yybirthday').html(data.birthday);
                     $('#yyapplytime').html(data.applytime);
                         $('#yuid').attr('date',data.id);
                     var badge=$('.badge').html();
                     badge=parseInt(badge);
                     if(badge>1){
                      badge=badge-1;
                      $('.badge').html(badge);
                     }
                     else{
                        $('.badge').hide();
                     }
                     thisitem.removeClass('list-group-item-warning');
                     
                }
            });


  })


   $('.dodelete').click(function(){
       var result = confirm('是否确定删除！');  
      if(result){  
          window.location.href="/thinkv_p/index.php/Home/tools/deletemsg/id/"+$(this).attr('date'); 
      }else{  
          return false;  
      }  
 })

$('.dodelete2').click(function(){
       var result = confirm('是否确定删除！');  
      if(result){  
          window.location.href="/thinkv_p/index.php/Home/tools/deleteyuyue/id/"+$(this).attr('date'); 
      }else{  
          return false;  
      }  
 })

</script>
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
$.post('/thinkv_p/index.php/Home/Tools/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>