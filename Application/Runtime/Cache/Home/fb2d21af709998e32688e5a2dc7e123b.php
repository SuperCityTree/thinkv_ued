<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
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
        <h3>微信管理</h3>
        <p>您可以在本栏目中进行微信的相关设置管理</p>
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
                                  <form action="<?php echo U('Weixin/setadd');?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">AppID(应用ID)</label>
                                        <input type="text" class="form-control" name='appid'  placeholder="" value="<?php echo ($set["appid"]); ?>">
                                        </div>
                                         <div class="form-group">
                                          <label for="exampleInputEmail1">AppSecret(应用密钥)</label>
                                           <input type="text" class="form-control" name='appsecret'  placeholder="" value="<?php echo ($set["appsecret"]); ?>">
                                         </div>
                                         <input type="hidden"  name='id' value="<?php echo ($set["id"]); ?>">
                                          <div class="wenjian b">
                                            <button type="submit" class="btn btn-warning btn-lg btn-block">修改</button>
                            
                                          </div>
                                          </form>
                                     <!--right end-->
                                 </div>
               </ul>
           </nav>
      
    </div>
</div>
</div>




<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
    //修改栏目
    $('.edit').click(function () {

        if ($(this).attr('date-see')) {
            $('.shanchu').show()
        }
        else {
            $('.shanchu').hide()
        }
        $('#exampleModal').modal('show');
        $('#recipient-id').val($(this).attr('date'));
        $('#recipient-name').val($(this).attr('date-name'));
        $('#message-text').html($(this).attr('date-description'));
        $('#listorder').val($(this).attr('date-order'));
        $('#module_edit').val($(this).attr('date-m'));
        var see = $(this).attr('date-see')
        if (see == '2') {
            $('#inlineRadio2').attr("checked", "checked");
        }
        else {
            $('#inlineRadio1').attr("checked", "checked");
        }
    })

    //添加栏目
    $('.addnew').click(function () {

        $('#addModal').modal('show');
        return false;

    })


    $('.tochange').click(function () {

        var forname = $('#recipient-name').val();


        if (forname == '') {
            alert("栏目名称");
            return false;
        }


        else {


            $.ajax({
                cache: true,
                type: "POST",
                url: "<?php echo U('category/edit/');?>",
                data: $('#changecat').serialize(),// 你的formid
                async: false,
                error: function (request) {
                    alert("修改失败");
                },
                success: function (data) {
                    window.location.reload();
                }
            });
        }
    });


    $('.toadd').click(function () {

        var forname = $('#add-name').val();

        if (forname == '') {
            alert("栏目名称");
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
                url: "<?php echo U('category/delete/');?>",
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
$.post('/thinkv/index.php/Home/Weixin/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>