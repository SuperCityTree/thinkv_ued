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
                                          <li class="active"><a href="<?php echo U('Center/admin');?>" >管理员列表</a></li>
                                          <li ><a href="<?php echo U('Center/setting');?>" >系统配置</a></li>
                                          <li ><a href="<?php echo U('Center/theme');?>" >主题配置</a></li>
                                        </ul>
                                      </li>
                                  </ul>
                                </nav>
                                  </div>
                           <div class="col-md-10" role="main">

                             <ul class="admin_list-group">
                  

                              <?php if(is_array($admin_list)): $i = 0; $__LIST__ = $admin_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li >
                                 <img src="/thinkv_p/Public/admin/img/admin.jpg">

                                <h3><?php echo ($vo["user"]); ?> </h3>
                           <span class="label label-warning biaoshi"><?php echo getadminname($vo[pid],$vo[aid]);?></span>
                          <p> <a href="" date='<?php echo ($vo["id"]); ?>' date-logintime='<?php echo (date('Y-m-d H:i:s',$vo["logintime"])); ?>'  date-name='<?php echo ($vo["user"]); ?>'  class="btn btn-info edit">编辑修改</a>
                          </p>
                          </li><?php endforeach; endif; else: echo "" ;endif; ?>
                              <li>
                                <p><img src="/thinkv_p/Public/admin/img/addnew.png"></p>
                                <h3>您可以新增一个 </h3>
                                <p><a href="#" class='addnew btn btn-info'>添加管理员</a></p>
                              </li>

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
$.post('/thinkv_p/index.php/Home/Center/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>


<!-- 修改管理员-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">修改管理员信息</h4>
      </div>
      <div class="modal-body">
        
         
          <div class="admin_info">
            <img src="/thinkv_p/Public/admin/img/admin.jpg" class="img-circle "><h4 class=''>管理账号:<span id='adminname'>admin</span></h4><p class="">最后登录时间：<span id="lasttime"></span></p>
          </div>
          <form id="changecat">
           <input type="hidden" name='id' id='recipient-id' value=''>
          <div class="form-group">
            <label for="message-text" class="control-label">原密码:</label>
             <input type="password" name='old-password' class="form-control" id="exampleInputPassword1" placeholder="请输入原始密码">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">新密码:</label>
             <input type="password" class="form-control"  name='new-password' id="exampleInputPassword1" placeholder="请输入新密码">
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

<!-- 添加管理员 -->
<div class="modal fade" id="addModal" tabindex="-2" role="dialog" aria-labelledby="addModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加管理员</h4>
      </div>
      <div class="modal-body">
        <form id="addcat">
          <div class="form-group">
            <label for="recipient-name" class="control-label">用户名:</label>
            <input type="text" class="form-control" id="add-name" name='user' placeholder="请输入用户名">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">密码:</label>
             <input type="password" name='password' class="form-control" id="ps1" placeholder="请输入密码">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">确认密码:</label>
             <input type="password" class="form-control"  name='re-password' id="ps2" placeholder="请确认密码">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary toadd">立即添加</button>
      </div>
    </div>
  </div>
</div>




<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
//修改栏目
  $('.edit').click(function(){
    $('.shanchu').show();
    $('#exampleModal').modal('show');
      $('#recipient-id').val($(this).attr('date'));
      if($(this).attr('date')=='1'){
        $('.shanchu').hide();
      }
      $('#adminname').html($(this).attr('date-name'));
      $('#lasttime').html($(this).attr('date-logintime'));
      return false;
     
  })

  //添加管理员
  $('.addnew').click(function(){

    $('#addModal').modal('show');
    return false;
    
  })

$('.tochange').click(function() {

    var forname=$('#recipient-name').val();
   
    
    if(forname==''){
      alert("暂时无法修改");
      return false;
    }
     
     
else{


  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('center/editadmin/');?>",
                data:$('#changecat').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("修改失败");
                },
                success: function(data) {
                    if(data=='1'){
                         alert ('修改成功，即将重新登陆')
                     window.location.reload();
                    }
                    if(data=='2'){
                          alert ('原密码错误')
                    }
                    if(data=='3'){
                         alert ('修改失败')
                    }
                }
            });
  }
});

//添加管理员
 $('.toadd').click(function() {

    var user=$('#add-name').val();
      var ps1=$('#ps1').val();
        var ps2=$('#ps2').val();
    
    if(user==''){
      alert("请输入用户名");
      return false;
    }
    if(ps1==''){
      alert("请输入密码");
      return false;
    }
     if(ps2==''){
      alert("请确认密码");
      return false;
    }
    if(ps1!=ps2){
        alert("两次输入的密码不一致");
      return false;
    }
     
     
else{

  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('center/addadmin/');?>",
                data:$('#addcat').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("添加失败");
                },
                success: function(data) {
                   alert("添加成功");
                    window.location.reload();
                }
            });
  }
});

//删除管理员
 $('.shanchu').click(function(){
       var result = confirm('是否确定删除！');  
      if(result){  

        $('#exampleModal').modal('hide');
          
  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('center/deleteadmin/');?>",
                data:$('#changecat').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("删除失败");
                },
                success: function(data) {
                    window.location.reload();
                }
            }); 
      }else{  
          return false;  
      }  
 })

//删除系统配置项目
$('.ds').click(function(){
var aid=$(this).attr('date')
   var result = confirm('是否确定删除！');  
      if(result){  
          
  $.ajax({
                cache: true,
                type: "POST",
                url:"/thinkv_p/index.php/Home/Center/delete_setting/id/"+aid,
                async: false,
                error: function(request) {
                    alert("删除失败");
                      return false;  
                },
                success: function(data) {
                    window.location.reload();
                }
            }); 

      }else{  
          return false;  
      }  


})

//编辑系统项目
$('.editsys').click(function(){

  $('#sysModal').modal('show');

  $('#duiyingzhi').html($(this).attr('date-key'));
    $('#sys-id').val($(this).attr('date'));
   $('#sysvalue').val($(this).attr('date-value'));

    return false;

})

$('.tochangesys').click(function() {

    var forname=$('#sys-id').val();
   
    
    if(forname==''){
      alert("暂时无法修改");
      return false;
    }
     
     
else{

  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('center/edit_setting/');?>",
                data:$('#syscat').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("修改失败");
                },
                success: function(data) {
                    window.location.reload();
                }
            });
  }
});
//添加系统配置弹出
  $('.addnewsys').click(function(){

    $('#addsysModal').modal('show');
    return false;
    
  })

//添加系统配置
$('.toaddsys').click(function() {

    var forname=$('#add-info').val();
    var forvarname=$('#add-varname').val();
   
    
    if(forname==''){
      alert("必须添加描述");
      return false;
    }
     if(forvarname==''){
      alert("必须添加前台调用值");
      return false;
    }
     
     
else{

  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('center/add_setting/');?>",
                data:$('#addsys').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("添加失败");
                },
                success: function(data) {
                    window.location.reload();
                }
            });
  }
});


$('.tips').tooltip()



</script>

</body>

</html>