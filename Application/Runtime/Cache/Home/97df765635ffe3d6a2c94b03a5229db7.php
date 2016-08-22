<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
<title>第一起启动，系统配置</title>
<link rel="stylesheet" type="text/css" href="/he/Public/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/he/Public/admin/css/admin.css">
<link href="/he/Public/admin/css/bootstrap-switch.css" rel="stylesheet">

<script src="http://cdn.bootcss.com/jquery/2.0.1/jquery.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script src="../Public/admin/js/bootstrap-switch.js"></script>



</head>
<body>

    

    <div class="bs-docs-header" id="content" tabindex="-1" style="height:300px;">
      <div class="container anztitile">
      <p><img src="/he/Public/admin/img/thinkv.png" class='img-circle'></p>
        <h3>欢迎使用网站管理后台</h3>
              <p>请进行下列设置，以方便您对网站的进行操作</p>
    </div>



    <div class="container bs-docs-container" style="width:500px">
    <div class="row installset" >
<form action="<?php echo U('Set/doset');?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">您的网站名称</label>
    <input type="text" name='cfg_webname' id="host" class="form-control" placeholder="您的网站名称" value="<?php echo getconfig('cfg_webname');?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">网站关键字</label>
    <input type="text" name='cfg_keywords' id="name" class="form-control" placeholder="请用几个关键字概括您的网站，半角逗号隔开" value="<?php echo getconfig('cfg_keywords');?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">网站简介</label>
    <textarea  placeholder="用50字描述您的网站" name='cfg_description' class="form-control" ><?php echo getconfig('cfg_description');?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">网站客服电话</label>
    <input type="text" name="web_tel"  class="form-control"  placeholder="请输入网站客服电话" value="<?php echo getconfig('web_tel');?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">接收网站反馈邮箱</label>
    <input type="text" name="emailhr" class="form-control"  placeholder="请输入您的常用邮箱，方便接收反馈" value="<?php echo getconfig('emailhr');?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">办公地址</label>
    <input type="text" name="cfg_address"  class="form-control"  placeholder="请输入您的办公地址" value="<?php echo getconfig('cfg_address');?>">
  </div>
<input type="hidden" name="cfg_start"   value="N">
  
  <button class="btn btn-success btn-block " h>确定并进入下一步</button> 
</form>

              </div>
</div>

<script type="text/javascript">

</script>

</body>

</html>