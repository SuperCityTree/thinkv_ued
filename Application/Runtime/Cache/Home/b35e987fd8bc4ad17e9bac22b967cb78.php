<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>控制中心_<?php echo ($cfg_webname); ?></title>
    <link rel="stylesheet" type="text/css" href="/feiyu/Public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/feiyu/Public/admin/css/admin.css">
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
        <h3>微信管理</h3>
        <p>您可以在本菜单中进行微信的相关设置管理</p>
    </div>
</div>


<div class="container bs-docs-container">
    <div class="row">
         <div class="col-md-2 nav_left" role="complementary">
         <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
              <ul class="nav bs-docs-sidenav">
                                       <!-- 引用内容管理通用左侧类目 -->
                                   <li ><a href="<?php echo U('Weixin/set');?>" >基础配置</a></li>
                                  <li ><a href="<?php echo U('Weixin/menu');?>" >菜单管理</a></li>
                                   <li ><a href="<?php echo U('Weixin/user');?>" >会员管理</a></li>
                        </div>
                               <div class="col-md-8" role="main">
                                 <!--right start-->
                                 <div class="list-group catedit gridly">

            <?php if(is_array($menu_list)): $ky = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($ky % 2 );++$ky;?><a href="#" class="list-group-item active"><?php echo ($vo["name"]); ?><span class="edit"  pid="<?php echo ($key); ?>"   date-name="<?php echo ($vo["name"]); ?>"  level='1'
        sid="<?php echo ($key); ?>" type="<?php if($vo["type"] == ''): ?>empty<?php else: echo ($vo["type"]); endif; ?>">修改</span>                       
              <span>顶级菜单</span>
             <?php if($vo["type"] == 'click'): ?><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span><?php endif; ?>
             <?php if($vo["type"] == 'view'): ?><span class="glyphicon glyphicon-link" aria-hidden="true"> </span><?php endif; ?></a>
                   <?php if(is_array($vo["sub_button"])): $km = 0; $__LIST__ = $vo["sub_button"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($km % 2 );++$km;?><a href="#" class="list-group-item">
                            &nbsp;&nbsp;└<?php echo ($re["name"]); ?> 
                            <span class="edit" pid="<?php echo ($key); ?>"   date-name='<?php echo ($re["name"]); ?>'  level='2' sid='<?php echo ($key); ?>' type='<?php if($re["type"] == ''): ?>empty<?php else: echo ($re["type"]); endif; ?>'
                             date-description='<?php switch($re["type"]): case "click": echo ($re["key"]); break; case "view": echo ($re["url"]); break; endswitch;?>'>修改</span>    
                            <span>次级菜单</span>
                            <?php if($re["type"] == 'click'): ?><span class="glyphicon glyphicon-eye-close"  aria-hidden="true"></span><?php endif; ?>
                            <?php if($re["type"] == 'view'): ?><span class="glyphicon glyphicon-link" aria-hidden="true"></span><?php endif; ?>
                         </a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

        </div>
          <div class=""><a href="#" class="btn btn-success pull-right addnew">更新到微信</a> </div>

           
       
                       <!--right end-->
                    </div>
               </ul>
           </nav>
      
    </div>
</div>
</div>

<!-- 修改菜单 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       
                <h4 class="modal-title" id="exampleModalLabel">修改菜单</h4>
            </div>
            <div class="modal-body">
                <form id="changecat">
                    <input type="hidden" name='pid' id='pid' value=''>
                    <input type="hidden" name='level' id='level' value=''>
                    <input type="hidden" name='sid' id='sid'  value=''>
                    <input type="hidden" name='typec' id='type' value=''>
                     
                    <div class="form-group">
                     <div class="row">
                        <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                           <label for="ecipient-name" class="control-label">菜单类型:</label>
                           <select class="form-control m-bot15"  name="reply_type" id="reply_type" tabindex="1">
                                <option value="click" selected="selected">点击</option>
                                <option value="view">链接</option>
                                 <!-- <option value="empty">空(建一个同等级的节点)</option>-->
                                <option value="first">一级菜单（点击）</option>
                                <option value="second">一级菜单（链接）</option>
                           </select>
                        </div>  
                    </div>
                    <!--类型值自动切换-->
                     <div class="form-group" id="key">
                        <label for="message-text" class="control-label">键值:</label>
                        <input class="form-control" id="message-text" name='key' type="text">
                    </div>
                 
                    <div class="form-group" id="url">
                        <label for="message-text" class="control-label">URL:</label>
                        <input class="form-control" id="message-text" name='url' type="text">
                    </div>
                    <div class="form-group" id="first">
                        <label for="message-text" class="control-label">键值:</label>
                        <input class="form-control" id="message-text" name='fkey' value="" type="text">
                    </div>
                    <div class="form-group" id="second">
                        <label for="message-text" class="control-label">URL:</label>
                        <input class="form-control" id="message-text" name='furl' type="text">
                    </div>
                   <!--end 微信菜单类型-->
                   
                       <div class="form-group">
                        <label for="recipient-name" class="control-label">菜单名称:</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" value=""/>
                       </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger pull-left shanchu">删除</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary tochange">立即修改</button>
            </div>
        </div>
    </div>
</div>


<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
    //修改菜单
    $('.edit').click(function () {

        if ($(this).attr('date-see')) {
            $('.shanchu').show()
        }
        else {
            $('.shanchu').hide()
        }
        $('#exampleModal').modal('show');
        $('#pid').val($(this).attr('pid'));
		$('#sid').val($(this).attr('sid')); 
        $('#recipient-name').val($(this).attr('date-name')); 
        $('#message-text').val($(this).attr('date-description')); 
        $('#type').val($(this).attr('type'));
        $('#level').val($(this).attr('level'));
        
    })

    //添加菜单
    $('.addnew').click(function () {
      if(window.confirm('更新到微信平台吗?')){
                window.location.href="/feiyu/index.php/Home/Weixin/wxupdata"; 
                 return true;
              }
        return false;

    })


    $('.tochange').click(function () {
        var forname = $('#recipient-name').val();
        if (forname == '') {
            alert("菜单名称");
            return false;
        }
        else {
            $.ajax({
                type: "POST",
                url: "<?php echo U('Weixin/edit');?>",
                data: $('#changecat').serialize(),// 你的formid
                async: false,
                error: function (request){ 
                    alert("修改失败");
                },
                success: function (data) {alert(data);if(data==1){alert("修改成功");}else{alert("数据没变化")};
                   ///window.location.reload();
                }
            });
        }
    });


    $('.toadd').click(function () {

        var forname = $('#add-name').val();

        if (forname == '') {
            alert("菜单名称");
            return false;
        }


        else {

            $.ajax({
                cache: true,
                type: "POST",
                url: "<?php echo U('category/add/');?>",
                data: $('#addcat').serialize(),// 你的formid
                async: false,
                error: function (request) {
                    alert("添加失败");
                },
                success: function (data) {
                   // window.location.reload();
                }
            });
        }
    });

    $('.shanchu').click(function () {
        var result = confirm('是否确定删除！');
        if (result) {

            $('#exampleModal').modal('hide');

            $.ajax({
                cache: true,
                type: "POST",
              //  url: "<?php echo U('category/delete/');?>",
                data: $('#changecat').serialize(),// 你的formid
                async: false,
                error: function (request) {
                    alert("删除失败");
                },
                success: function (data) {
                    window.location.reload();
                }
            });
        } else {
            return false;
        }
    })

    $('.changecat').change(function () {
        // console.log( $(this).find("option:selected").attr('date'))
        $('#module').val($(this).find("option:selected").attr('date'));
    })

 $(document).ready(function () {
      // 微信类型选择
        var reply_type=$('#reply_type option:selected').val();
		
        if(reply_type=='click'){
            $('#url').fadeOut();
			$('#empty').fadeOut();
			$('#first').fadeOut();
			$('#second').fadeOut();
            $('#key').fadeIn(); 

        } else if(reply_type=='view'){
            $('#url').fadeIn();
            $('#key').fadeOut();
			$('#empty').fadeOut(); 

        } else if(reply_type=='empty'){
            $('#url').fadeOut();
            $('#key').fadeOut();
			

        }else if(reply_type=='first')
		{
			$('#url').fadeOut();
			$('#empty').fadeOut();
			$('#second').fadeOut();
			$('#key').fadeIn();
		}
		else if(reply_type=='second')
		{
			$('#url').fadeOut();
			$('#empty').fadeOut();
			$('#first').fadeOut();
			$('#second').fadeIn();
            $('#key').fadeOut();
		}




        $('#reply_type').change(function(){
            var reply_type=$('#reply_type option:selected').val();

            if(reply_type=='click')
			{
                $('#url').fadeOut();
				$('#empty').fadeOut();
				$('#first').fadeOut();
				$('#second').fadeOut();
				$('#key').fadeIn();    
            } 
			else if(reply_type=='view')
			{
                $('#url').fadeIn();
                $('#key').fadeOut();   
				$('#second').fadeOut();  
			    $('#first').fadeOut();

            }else if(reply_type=='empty')
			{
                $('#url').fadeOut();
                $('#key').fadeOut();

            }else if(reply_type=='first')
			{
				$('#url').fadeOut();
                $('#key').fadeOut();
				$('#second').fadeOut();
				$('#first').fadeIn();
			}
			else if(reply_type=='second')
			{
				$('#url').fadeOut();
                $('#key').fadeOut();
				$('#first').fadeOut();
				$('#second').fadeIn();
			}

        });



    });
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
$.post('/feiyu/index.php/Home/Weixin/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>