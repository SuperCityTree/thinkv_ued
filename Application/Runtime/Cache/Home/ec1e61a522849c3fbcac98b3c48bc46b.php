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
<link rel="stylesheet" type="text/css" href="/demo/Public/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/demo/Public/admin/css/admin.css">
<link rel="stylesheet" href="/demo/Public/admin/css/jquery.fileupload.css">
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
                                          <li ><a href="<?php echo U('Center/admin');?>" >管理员列表</a></li>
                                          <li class="active"><a href="<?php echo U('Center/setting');?>" >系统配置</a></li>
                                          <li ><a href="<?php echo U('Center/theme');?>" >主题配置</a></li>
                                        </ul>
                                      </li>
                                  </ul>
                                </nav>
                                  </div>
                           <div class="col-md-10 biglili" role="main">



             <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  系统基础设置项目
                </a>
              </h4>
            </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <ul class="list-group">
                  

                    <?php if(is_array($set_list_1)): $i = 0; $__LIST__ = $set_list_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["aid"] == 1): ?><li class="list-group-item syset" style="height:70px;"><i  class='tips' data-toggle="tooltip" data-placement="right" title="调用:<?php echo ($vo["varname"]); ?>"><?php echo ($vo["info"]); ?></i>
                          <?php if(getconfig('cfg_mode')=='Y'): ?><!-- 判断是否启用了开发模式 -->
                        <a href="" date='<?php echo ($vo["aid"]); ?>'  class="tn btn-danger pull-right btn-xs pull-right ds">删除</a><?php endif; ?>

                        <a href=""  date='<?php echo ($vo["aid"]); ?>' date-key='<?php echo ($vo["info"]); ?>'  date-value='<?php echo ($vo["value"]); ?>'   class="tn btn-info pull-right btn-xs pull-right editsyslogo mr20">编辑</a><span class='pull-right mr20'><img src="<?php echo ($vo["value"]); ?>" style="height:50px;"></span</li>
                      <?php else: ?>
                      <li class="list-group-item syset"><i  class='tips' data-toggle="tooltip" data-placement="right" title="调用:<?php echo ($vo["varname"]); ?>"><?php echo ($vo["info"]); ?></i>
                          <?php if(getconfig('cfg_mode')=='Y'): ?><!-- 判断是否启用了开发模式 -->
                        <a href="" date='<?php echo ($vo["aid"]); ?>'  class="tn btn-danger pull-right btn-xs pull-right ds">删除</a><?php endif; ?>

                        <a href=""  date='<?php echo ($vo["aid"]); ?>' date-key='<?php echo ($vo["info"]); ?>'  date-value='<?php echo ($vo["value"]); ?>'   class="tn btn-info pull-right btn-xs pull-right editsys mr20">编辑</a><span class='pull-right mr20'><?php echo ($vo["value"]); ?></span</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        系统扩展设置项目
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <?php if(is_array($set_list_2)): $i = 0; $__LIST__ = $set_list_2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item syset"><i  class='tips' data-toggle="tooltip" data-placement="right" title="调用:<?php echo ($vo["varname"]); ?>"><?php echo ($vo["info"]); ?></i>
                              <?php if(getconfig('cfg_mode')=='Y'): ?><!-- 判断是否启用了开发模式 --><a href="" date='<?php echo ($vo["aid"]); ?>'  class="tn btn-danger pull-right btn-xs pull-right ds">删除</a><?php endif; ?>
                        <a href=""  date='<?php echo ($vo["aid"]); ?>' date-key='<?php echo ($vo["info"]); ?>'  date-value='<?php echo ($vo["value"]); ?>'   class="tn btn-info pull-right btn-xs pull-right editsys mr20">编辑</a><span class='pull-right mr20'><?php echo (msubstr($vo["value"],0,50)); ?></span</li><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         用户自定义设置项目
        </a><a href="#" class='btn btn-warning pull-right btn-xs addnewsys'>添加配置项目</a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <?php if(is_array($set_list_3)): $i = 0; $__LIST__ = $set_list_3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item syset"><i  class='tips' data-toggle="tooltip" data-placement="right" title="调用:<?php echo ($vo["varname"]); ?>"><?php echo ($vo["info"]); ?></i>
                              <?php if(getconfig('cfg_mode')=='Y'): ?><!-- 判断是否启用了开发模式 -->
                              <a href="" date='<?php echo ($vo["aid"]); ?>'  class="tn btn-danger pull-right btn-xs pull-right ds">删除</a><?php endif; ?>
                        <a href=""  date='<?php echo ($vo["aid"]); ?>' date-key='<?php echo ($vo["info"]); ?>'  date-value='<?php echo ($vo["value"]); ?>'   class="tn btn-info pull-right btn-xs pull-right editsys mr20">编辑</a><span class='pull-right mr20'><?php echo ($vo["value"]); ?></span</li><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
</div>

         

                </div>
              

                   

             </div>
        
        
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
$.post('/demo/index.php/Home/Center/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>





<!-- 修改系统配置 -->
<div class="modal fade" id="sysModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">修改配置信息</h4>
      </div>
      <div class="modal-body">
        
         
          
          <form id="syscat">
           <input type="hidden" name='id' id='sys-id' value=''>
          <div class="form-group">
            <label for="message-text" class="control-label">对应值:<span id='duiyingzhi'></span></label>
             <input type="text" name='value' class="form-control" id="thumb" placeholder="请输入参数值" value=''>
          </div>
        
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary tochangesys">立即修改</button>
      </div>
    </div>
  </div>
</div>

<!-- 修改网站logo -->
<div class="modal fade" id="sysModallogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">修改配置信息</h4>
      </div>
      <div class="modal-body">
          <form id="syscat1">
           <input type="hidden" name='id' id='sys-id' value=''>
          <div class="form-group">
            <label for="message-text" class="control-label">对应值:<span id='duiyingzhi'></span></label>
             <div class="form-group">
          <label for="exampleInputEmail1">logo图片</label><span class="pull-right text-info">建议采用png格式图片</span>
                      <p>
            <?php if($logo["value"] != ''): ?><img src="<?php echo ($logo["value"]); ?>" class="thumbnail litpic">
                                        <?php else: ?>
                                        <img src="/demo/Public/admin/img/tub.png" class="thumbnail litpic"><?php endif; ?>
                                         </p>
                      <?php if($logo["value"] != ''): ?><input type="hidden" value="<?php echo ($logo["value"]); ?>" name='value' id='thumb'>
                                        <?php else: ?>
            <input type="hidden" value="/demo/Public/admin/img/tub.png" name='value' id='thumb'><?php endif; ?>
        </div>
        <div class="form-group">
          <div class="row">
      <div class="upbtn">         
          <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>更换logo</span>
  
              <input id="fileupload" type="file" name="files[]" >
          </span>
          <span>
              
              </span>
          </div>
          <div id="progress" class="progress">
              <div class="progress-bar progress-bar-success"></div>
          </div>

          <div id="files" class="files">

          </div>

           <div class="notes">
           <ol>
              <li>logo图片大小建议在200kb以下</li>
              <li>建议采用png透明图片进行处理，这样能够更好的适应网页</li>
            </ol>
             <input type="hidden" value=""  name="thumb" id='thumb'>
     </div>

           </div>
        </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary tochangesys">立即修改</button>
      </div>
    </div>
  </div>
</div>

<!-- 添加系统配置 -->
<div class="modal fade" id="addsysModal" tabindex="-2" role="dialog" aria-labelledby="addModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加自定义系统配置项目</h4>
      </div>
      <div class="modal-body">
        <form id="addsys">
  
          
          <div class="form-group">
            <label for="recipient-name" class="control-label">描述:</label>
            <input type="text" class="form-control" id="add-info" name='info' placeholder="请输入中文描述">
          </div>
           <div class="form-group">
            <label for="message-text" class="control-label">前台调用值:</label>
            <input type="text" class="form-control" id="add-varname" name='varname' placeholder="请输入英文字符串">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">参数值:</label>
            <input type="text" class="form-control" id="add-value" name='value' placeholder="请输入参数值">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary toaddsys">立即添加</button>
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
                url:"/demo/index.php/Home/Center/delete_setting/id/"+aid,
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
   $('#thumb').val($(this).attr('date-value'));

    return false;

})
//编辑网站logo
$('.editsyslogo').click(function(){

  $('#sysModallogo').modal('show');

  $('#duiyingzhi').html($(this).attr('date-key'));
    $('#sys-id').val($(this).attr('date'));


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
                data:$('#syscat1').serialize(),// 你的formid
                async: false,
                error: function(request) {
                    //alert("修改失败");
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


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/demo/Public/admin/js/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="/demo/Public/admin/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="/demo/Public/admin/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="/demo/Public/admin/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/demo/Public/admin/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/demo/Public/admin/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="/demo/Public/admin/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<!-- The File Upload validation plugin -->
<script src="/demo/Public/admin/js/jquery.fileupload-validate.js"></script>


<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '<?php echo U('Content/uploadimg');?>',
        uploadButton = $('<a/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('上传中...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('取消')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
            
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|)$/i,
        maxFileSize: 524288800,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<ul/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<li/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('a')
                .text('上传文件')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {


       
        $.each(data.result.files, function (index, file) {
            
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url).addClass("updone");
                $(data.context.children()[index])
                    .wrap(link);
                    $('.sure').attr('date',file.url)
                    $('.thumbnail').attr('src',file.url);
                       $('#thumb').val(file.url);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
        return false;
    }).on('fileuploadfail', function (e, data) {
     
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
$('.sure').click(function(){
    var val=$(this).attr('date')
    $('.thumbnail').attr('src',val);
    $('#thumb').val(val);
    $('#gridSystemModal').modal('hide')
})
</script> 
 
</body>

</html>