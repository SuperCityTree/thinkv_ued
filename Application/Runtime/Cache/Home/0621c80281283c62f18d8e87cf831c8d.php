<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="CheerUE">
<title>登陆页面-<?php echo ($cfg_webname); ?></title>
<link rel="stylesheet" type="text/css" href="/thinkv/Public/sui/semantic.min.css">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="icon" href="/favicon.ico">
</head>
<style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>


<body class='user_bg'>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">

      <div class="content">
        登陆管理中心
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" class="form-control" id="inputEmail3" name='account' placeholder="用户名">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
             <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name='pwd'>
          </div>
        </div>
        <div class="ui fluid large teal submit button  cm-login_submit">登陆</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      没有账号? <a href="#">注册一个</a>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="/thinkv/Public/sui/semantic.min.js"></script>
<script src="/thinkv/Public/sui/components/form.js"></script>
<script src="/thinkv/Public/sui/components/transition.js"></script>




<script type="text/javascript">





$('.cm-login_submit').click(function(){
    var account=$('#inputEmail3').val();
    var pwd=$('#inputPassword3').val();
    var remember;       
    if(account==''){
      alert('账号不能为空');
      return false;
    }        
    if(pwd==''){
      alert('密码不能为空');
      return false;
    }      

          if($("input[name='remember']").prop('checked')){
            remember=1;
          }else{
            remember="";
          }  

     var repage="<?php echo ($repage); ?>";
    $.post("<?php echo U('User/dologin');?>",{account:account,pwd:pwd,remember:remember,repage:repage},function(data){

        if(data==2){
          alert('账号或密码错误');   
          return false;
        }
        if(data==1){
          window.location.href="<?php echo U('Index/index');?>";
        }
          });   
  });

</script>




  </body>
</html>