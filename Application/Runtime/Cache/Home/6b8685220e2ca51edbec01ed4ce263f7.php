<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
<title>完成配置</title>
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
        <h3>完成配置</h3>
              <p>恭喜您，已经完成配置</p>
    </div>



    <div class="container bs-docs-container" style="width:500px;text-align: center;">
    <div class="row installset" >
            <a href="<?php echo U('Index/index');?>" class="btn btn-primary btn-lg" style="margin-right:50px;">去管理网站</a>
              <a href="<?php echo getconfig('cfg_indexurl');?>" class="btn btn-success btn-lg" target="new">查看网站前台</a>
    </div>
</div>

<script type="text/javascript">

</script>

</body>

</html>