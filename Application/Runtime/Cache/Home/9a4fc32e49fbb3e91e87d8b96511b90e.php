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
<link rel="stylesheet" href="/he/Public/admin/css/jquery.fileupload.css">
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
        <h3>水印管理</h3>
        <p>本栏目可以设定水印相关操作</p>
      </div>
    </div>

    <div class="container bs-docs-container">
              <div class="row">

                        <div class="col-md-2 nav_left" role="complementary">
                                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                                 <ul class="nav bs-docs-sidenav">
                                      <li >
                                        <a href="<?php echo U('tools/ad/');?>">广告管理</a>
                                       
                                      </li>
                                         <li>
                                        <a href="<?php echo U('tools/msg/');?>">反馈消息<?php echo getmsgunread();?></a>
                                      
                                      </li>
                                        <li>
                                        <a href="<?php echo U('tools/add_sy/');?>" class='active'>水印管理</a>
                                        
                                      </li>
                                             <li>
                                        <a href="<?php echo U('tools/bakdate');?>">数据库备份</a>
                                        
                                      </li>
                                         <li><a  href="#" class="ui primary button clearbtn">清除缓存</a></li>
                                  </ul>
                                </nav>
                        </div>

                         <div class="col-md-10 " role="main">

                            <div class="col-md-10" role="main">
<form action="<?php echo U('tools/add_sy');?>" method="POST">
    

    <div class="wenjian b">
    
      
      <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">水印图片</label>
           <?php if($sy["newimg"] != 'null'): ?><img src="<?php echo ($sy["newimg"]); ?>" class="thumbnail litpicad">
                                        <?php else: ?>
                                        <img src="/he/Public/admin/img/tub.png" class="thumbnail litpicad"><?php endif; ?>
                                         </p>
            <p><a href="#" class="btn btn-success" data-toggle="modal" data-target="#gridSystemModal">上传封面图片</a></p>
                      <?php if($sy["newimg"] != 'null'): ?><input type="hidden" value="<?php echo ($sy["newimg"]); ?>" name='newimg' id='thumb'>
                                        <?php else: ?>
                                        

            <input type="hidden" value="/he/Public/admin/img/tub.png" name='newimg' id='thumb'><?php endif; ?>

            
            
        </div>
      </div>
       

      <div class="col-md-8">
        <div class="form-group">
        <label for="recipient-name" class="control-label">水印方向:</label>
          <select  name="waterpos" class="form-control"> 
                          <?php if($sy["waterpos"] == 1): ?><option value="1"  selected='selected'>左上角水印</option>
                          <?php else: ?>
                          <option value="1" >左上角水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 2): ?><option value="2"  selected='selected'>上居中水印</option>
                          <?php else: ?>
                         <option value="2"  >上居中水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 3): ?><option value="3"  selected='selected'>右上角水印</option>
                          <?php else: ?>
                           <option value="3"  >右上角水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 4): ?><option value="4"  selected='selected'>左居中水印</option>
                          <?php else: ?>
                         <option value="4"  >左居中水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 5): ?><option value="5"  selected='selected'>居中水印</option>
                          <?php else: ?>
                         <option value="5"  >居中水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 6): ?><option value="6"  selected='selected'>右居中水印</option>
                          <?php else: ?>
                         <option value="6"  >右居中水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 7): ?><option value="7"  selected='selected'>左下角水印</option>
                          <?php else: ?>
                          <option value="7"  >左下角水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 8): ?><option value="8"  selected='selected'>下居中水印</option>
                          <?php else: ?>
                         <option value="8"  >下居中水印</option><?php endif; ?>
                          <?php if($sy["waterpos"] == 9): ?><option value="9"  selected='selected'>右下角水印</option>
                          <?php else: ?>
                         <option value="9"  >右下角水印</option><?php endif; ?>
                           
                            
                           
                           
                            
                            
                           
                           
                            
                   
                            
                 
          </select>
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1">水印透明度</label>
        <select  name="diaphaneity" class="form-control"> 
                           <?php if($sy["diaphaneity"] != null): ?><option value="<?php echo ($sy["diaphaneity"]); ?>"  selected='selected'><?php echo ($sy["diaphaneity"]); ?>%透明度</option> 
                            <option value="100" >100%透明度</option>
                            <option value="90"  >90%透明度</option>
                            <option value="80"  >80%透明度</option>
                            <option value="70"  >70%透明度</option>
                            <option value="60"  >60%透明度</option>
                            <option value="50"  >50%透明度</option>
                            <option value="40"  >40%透明度</option>
                            <option value="30"  >30%透明度</option>
                            <option value="20"  >20%透明度</option>
                            <option value="10"  >10%透明度</option><?php endif; ?>
                                       
          </select>
      </div>
         <div class="form-group">
                <label for="exampleInputEmail1">启用范围</label>
                <div class="checkbox">
                 <?php if(($sy["markup"] == 1) AND ($sy["marwz"] == 1) ): ?><label>
              <input type="checkbox" name="markup"  value="1" checked="checked"> 文章缩略图
            </label>
             <label>
              <input type="checkbox" name="marwz" value="1" checked="checked"> 文章内容
            </label><?php endif; ?>
            <?php if(($sy["markup"] == 1) AND ($sy["marwz"] == 0) ): ?><label>
              <input type="checkbox" name="markup"  value="1" checked="checked"> 文章缩略图
            </label>
             <label>
              <input type="checkbox" name="marwz" value="1" > 文章内容
            </label><?php endif; ?>
            
            <?php if(($sy["markup"] == 0) AND ($sy["marwz"] == 1)): ?><label>
              <input type="checkbox" name="markup"  value="1"> 文章缩略图
            </label>
             <label>
              <input type="checkbox" name="marwz" value="1"  checked="checked"> 文章内容
            </label><?php endif; ?>
            
             <?php if(($sy["markup"] == 0) AND ($sy["marwz"] == 0)): ?><label>
              <input type="checkbox" name="markup" value="1" > 文章缩略图
            </label>
             <label>
              <input type="checkbox" name="marwz" value="1" > 文章内容
            </label><?php endif; ?>
            
          </div>
                
              </div>
    </div>
    </div>
          

            
          </div>

           <input type="hidden" value="1" name='dopost'></input>

          <div class="wenjian b">
            <button type="submit" class="btn btn-warning btn-lg btn-block">提交</button>

          </div>                   
                         </form>
                           
                      </div>    
                    </div>
            

    

  
        
        
        
      </div>
    </div>

<div class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" id='gridSystemModal'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">图片库</h4>
      </div>
      <div class="modal-body" >
<div class="row">
      <div class="upbtn">       
          <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>上传水印图片</span>
  
              <input id="fileupload" type="file" name="files[]" multiple>
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
              <li>文章缩略图仅支持图片格式上传</li>
              <li>图片建议压缩到1mb以下</li>
              <li>如果文件过大，请自行压缩解决，推荐使用Adobe PhotoShop 就行处理</li>
            </ol>
             <input type="hidden" value=""  name="thumb" id='thumb'>
   </div>

           </div>
       
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary sure" date=''>确定</button>
      </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
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


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/he/Public/admin/js/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="/he/Public/admin/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="/he/Public/admin/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="/he/Public/admin/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/he/Public/admin/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/he/Public/admin/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="/he/Public/admin/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<!-- The File Upload validation plugin -->
<script src="/he/Public/admin/js/jquery.fileupload-validate.js"></script>



<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = "/he/index.php/Home/Content/uploadimg/mark/1",
        uploadButton = $('<button/>')
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
        acceptFileTypes: /(\.|\/)(gif|pdf|jpe?g|png|docx?)$/i,
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
            data.context.find('button')
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
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
                    $('.sure').attr('date',file.url)
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