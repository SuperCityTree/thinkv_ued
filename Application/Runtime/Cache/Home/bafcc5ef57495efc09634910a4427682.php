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

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
        <h3>会员管理</h3>
        <p>您可以在本栏目内自定义设置内容，管理文档内容等</p>
      </div>
    </div>
    <div class="container bs-docs-container">
              <div class="row">
                        <div class="col-md-2 nav_left" role="complementary">
                               <!-- 引用内容管理通用左侧类目 -->
                                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                                  <ul class="nav bs-docs-sidenav">
                                      <li>
                                       
                                        <ul class="nav">
                                          <li ><a href="<?php echo U('Member/index');?>" >会员列表</a></li>
                                          <li ><a href="<?php echo U('Content/index');?>" >黑名单</a></li>
                                           
                                        </ul>
                                      </li>
                                  </ul>
                                </nav>
                        </div>

                         <div class="col-md-10" role="main">

                                 <ul class="bigdateshow">
                                     
                                     <li class="red_show">
                                       会员用户数
                                        <h3><?php echo ($usermount); ?><span>人</span></h3>
                                     </li>
                                     <li class="blue_show">
                                        活跃用户数
                                            <h3><?php echo ($boy); ?>/<?php echo ($girl); ?><span>人</span></h3>
                                     </li>
                                    <li class="green_show">
                                        本月新增
                                            <h3><?php echo ($mouthfocus); ?><span>人</span></h3>
                                    </li>
                                      
                                 </ul>
                             
                          

                                    <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th>管理</th>
                                             <th>用户id</th>
                                              <th>头像</th>
                                              <th>昵称</th>
                                              <th>手机号码</th>
                                               <th>性别</th>
                                              <th>注册时间</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                          <form  id='mlist'>

                                              <?php if(is_array($member_list)): $i = 0; $__LIST__ = $member_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                                         <td><input type="checkbox" name='userid[]' class='userid' value="<?php echo ($vo["userid"]); ?>"></td>
                                                             <td><?php echo ($vo["userid"]); ?></td>
                                                              <td>
                                                              <img src="<?php echo get_member_detail($vo['userid'],'headimgurl');?>" width="50" class="img-circle">
                                                              </td>
                                                              <td><?php echo ($vo['nickname']); ?></td>
                                                                  <td><?php echo ($vo["mobile"]); ?></td>
                                                                      <td>
                                                                        <?php echo get_member_detail($vo['userid'],'sex');?>                                                                       
                                                                      </td>
                                                              <td><?php echo (date('Y-m-d',$vo["regdate"])); ?></td>
                                                         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                      </form>
                                          
                                          </tbody>

                                        </table>
                                        <div class="row">
                                          <a href="javascript:void(0)" class="btn btn-default seleteall btn-sm" data='1'>全选</a>
                                          <a href="javascript:void(0)" class="btn btn-danger btn-sm dodelete" data='1'>删除</a>
                                        </div>
                                           
                                 </div>
            
        </div>

      </div>
    </div>










<script>


 $(".seleteall").click(function(){   
  if($(this).attr('data')=='1'){   
   $(".userid").prop("checked",'true');
    $(this).html("全不选").attr('data','2')

  }else{   
   $(".userid").prop("checked",false);
      $(this).html("全选").attr('data','1')
    }   
 });

</script>

<script type="text/javascript">
  $('.dodelete').click(function(){
       var result = confirm('是否确定删除！');  
      if(result){  

         $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('Member/delete_member/');?>",
                data:$('#mlist').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("删除失败");
                },
                success: function(data) {
                  if(data=='1'){
                   window.location.reload();
                  }
                  else{
                     alert("删除失败");
                  }
                }
            });
            
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
$.post('/thinkv_p/index.php/Home/Member/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>