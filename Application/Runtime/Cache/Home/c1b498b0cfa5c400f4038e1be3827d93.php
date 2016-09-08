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
        <h3>控制台首页</h3>
        <p>您可以在该栏目选择您要进行的操作</p>
      </div>
    </div>

    <div class="container bs-docs-container">
              <div class="row">

        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 334px;">
            <a href="<?php echo U('Content/index');?>"  target="_blank" ><img class="lazy" src="/thinkv/Public/admin/img/content.png" width="300" height="150" ></a>
            <div class="caption">
              <h3>
                <a href="<?php echo U('Content/index');?>">内容管理</a>
              </h3>
              <p>
              您可以在本栏目编辑添加网站内容信息。
              </p>
              <br>
              <a href="<?php echo U('Content/index');?>" class="btn btn-primary btn-lg btn-block  btn-sm">立即进入</a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 334px;">
           <a href="<?php echo U('Category/index');?>"  target="_blank" ><img class="lazy" src="/thinkv/Public/admin/img/Category.png" width="300" height="150" ></a>
            <div class="caption">
              <h3>
                <a href="<?php echo U('Category/index');?>">栏目管理</a>
              </h3>
              <p>
              您可以在本栏目编辑修改网站栏目信息。
              </p>
               <br>
              <a href="<?php echo U('Category/index');?>" class="btn btn-primary btn-lg btn-block  btn-sm">立即进入</a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 334px;">
              <a href="<?php echo U('tools/index');?>"  target="_blank" ><img class="lazy" src="/thinkv/Public/admin/img/tools.png" width="300" height="150" ></a>
            <div class="caption">
              <h3>
              <a href="<?php echo U('tools/index');?>"  target="_blank" >工具及消息</a>
              </h3>
              <p>   您可以在本栏目中查看最新的消息反馈，修改广告内容。
              </p>
               <br>
              <a href="<?php echo U('tools/index');?>" class="btn btn-primary btn-lg btn-block  btn-sm">立即进入</a>
            </div>
          </div>
        </div>


        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3 ">
          <div class="thumbnail" style="height: 334px;">
        <a href="<?php echo U('Center/setting');?>/"  target="_blank" ><img class="lazy" src="/thinkv/Public/admin/img/sys.png" width="300" height="150" ></a>
            <div class="caption">
              <h3>
                 <a href="<?php echo U('Center/setting');?>/"  target="_blank" >系统设置</a>
              </h3>
              <p>您可以在本栏目中修改网站中的相关配置内容
              </p>
               <br>
              <a  href="<?php echo U('Center/setting');?>/" class="btn btn-primary btn-lg btn-block  btn-sm">立即进入</a>
            </div>
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
$.post('/thinkv/index.php/Home/Index/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>


</body>

</html>