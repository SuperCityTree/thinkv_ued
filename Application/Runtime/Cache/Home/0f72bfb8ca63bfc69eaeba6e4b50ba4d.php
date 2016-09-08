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
<link rel="stylesheet" type="text/css" href="/he/Public/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/he/Public/admin/css/admin.css">
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
        <h3>广告组列表</h3>
        <p>本栏目显示所有的广告组分布</p>
      </div>
    </div>

    <div class="container bs-docs-container">
              <div class="row">

                        <div class="col-md-2 nav_left" role="complementary">
                                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                                 <ul class="nav bs-docs-sidenav">
                                      <li class='active'>
                                        <a href="<?php echo U('tools/ad/');?>">广告管理</a>
                                       
                                      </li>
                                         <li>
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

                         <div class="col-md-10 " role="main">
                         <div class="row pd20">

                         <div class="list-group">
                         <?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  class="list-group-item">
                          <a href="/he/index.php/Home/Tools/adlist/id/<?php echo ($vo["id"]); ?>" class="aleft"> <h4 class="list-group-item-heading"><?php echo ($vo["name"]); ?></h4>
                               <p class="list-group-item-text"><?php echo ($vo["des"]); ?></p></a>
                                <span class="pull-right"><a class="btn btn-warning xiugai" data='<?php echo ($vo["id"]); ?>' data-name='<?php echo ($vo["name"]); ?>' data-des='<?php echo ($vo["des"]); ?>'>修改</a></span>     <span  class="pull-right mr20"><a href="/he/index.php/Home/Tools/deleteadgroup/id/<?php echo ($vo["id"]); ?>" class="btn btn-danger">删除</a></span>
                                <div class="clearfix"></div>
                              </li><?php endforeach; endif; else: echo "" ;endif; ?>
                          
                          </div>
                          <p>     
                    <a class="btn btn-warning pull-right addad" type="button" >新增广告组</a>
                </p>


                          
                          </div>

                            
                    
                           
                    </div>
            

    

  
        
        
        
      </div>
    </div>



<!-- 添加广告组 -->
<div class="modal fade" id="addadModal" tabindex="-2" role="dialog" aria-labelledby="addModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加广告组</h4>
      </div>
      <div class="modal-body">
        <form id="addad">
  
          
          <div class="form-group">
            <label for="recipient-name" class="control-label">标题:</label>
            <input type="text" class="form-control" id="add-name" name='name' placeholder="请输入广告组名称">
          </div>
           <div class="form-group">
            <label for="message-text" class="control-label">描述:</label>
            <input type="text" class="form-control" id="add-des" name='des' placeholder="请输入广告组描述">
          </div>

       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary toaddad">立即添加</button>
      </div>
    </div>
  </div>
</div>

<!-- 修改广告组配置 -->
<div class="modal fade" id="sysModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">修改广告组信息</h4>
      </div>
      <div class="modal-body">
        
         
          
          <form id="syscat">
           <input type="hidden" name='id' id='adid' value=''>
          <div class="form-group">
            <label for="message-text" class="control-label">广告组名称:</label>
             <input type="text" name='name' class="form-control" id="adname" placeholder="请输入原始密码" value=''>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">广告组描述:<span id='duiyingzhi'></span></label>
             <input type="text" name='des' class="form-control" id="addes" placeholder="请输入原始密码" value=''>
          </div>
        
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary tochangad">立即修改</button>
      </div>
    </div>
  </div>
</div>



<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
  //添加系统配置弹出
  $('.addad').click(function(){

    $('#addadModal').modal('show');
    return false;
    
  })

//添加系统配置
$('.toaddad').click(function() {

    var forname=$('#add-name').val();
    var forvarname=$('#add-des').val();
   
    
    if(forname==''){
      alert("必须添加标题");
      return false;
    }
     if(forvarname==''){
      alert("必须添加描述");
      return false;
    }
     
     
else{

  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('tools/add_adGroup/');?>",
                data:$('#addad').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("添加失败");
                },
                success: function(data) {
                  if(data=='1'){

                    window.location.reload();
                  }
                  else{
                     alert("添加失败");
                  }
                }
            });
  }
});



//编辑系统项目
$('.xiugai').click(function(){

  $('#sysModal').modal('show');

  $('#adid').val($(this).attr('data'));
    $('#adname').val($(this).attr('data-name'));
  $('#addes').val($(this).attr('data-des'));

    return false;

})

$('.tochangad').click(function() {

    var forname=$('#adid').val();
   
    
    if(forname==''){
      alert("暂时无法修改");
      return false;
    }
     
     
else{

  $.ajax({
                cache: true,
                type: "POST",
                url:"<?php echo U('tools/edit_adGroup/');?>",
                data:$('#syscat').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    alert("修改失败");
                },
                success: function(data) {
                    if(data=='1'){
                    window.location.reload();
                  }
                  else{
                     alert("添加失败");
                  }
                }
            });
  }
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
$.post('/he/index.php/Home/Tools/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>


</body>

</html>