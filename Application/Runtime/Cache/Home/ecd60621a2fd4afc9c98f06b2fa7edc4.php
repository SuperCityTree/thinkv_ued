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
<link rel="stylesheet" href="/he/Public/admin/css/toolkit.css">
<link rel="stylesheet" type="text/css" href="/he/Public/admin/weditor/css/wangEditor.min.css" />
<link href="/he/Public/admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script src="http://cdn.bootcss.com/jquery/2.0.1/jquery.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/he/Public/admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/he/Public/admin/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>


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
        <h3>编辑内容</h3>
        <p>您可以在该栏目内编辑文章内容</p>
      </div>
    </div>


    <div class="container bs-docs-container">



              <div class="row">

                        <div class="col-md-2 nav_left" role="complementary">
                                      <!-- 引用内容管理通用左侧类目 -->
                                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                <form action="<?php echo U('Content/Search');?>" method="GET"> 
                          <div class="input-group">
                              <input type="text" id='searchkey' name='key' class="form-control" placeholder="查找...">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class='glyphicon glyphicon-search'></span></button>
                              </span>

                            </div>
                  </form>
                                  <ul class="nav bs-docs-sidenav">
                                      <li>
                                       
                                        <ul class="nav">
                                          <li ><a href="<?php echo U('Content/index');?>" >首页管理</a></li>
                                           <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  <?php echo ($vo["thisone"]); ?> class='navouter'>
                                                   <a href="/he/index.php/Home/Content/<?php echo ($vo["module"]); ?>/cid/<?php echo ($vo["catid"]); ?>"><?php echo ($vo["catname"]); ?></a>
                                                   <ul class='innav'>
                                                     <?php $_result=getcategory('son',$vo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><li><a href="/he/index.php/Home/Content/<?php echo ($in["module"]); ?>/cid/<?php echo ($in["catid"]); ?>"><?php echo ($in["catname"]); ?></a></li>
                                                                    <ul class="ininnav">
                                                         <?php $_result=getcategory('son',$in[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inin): $mod = ($i % 2 );++$i;?><li><a href="/he/index.php/Home/Content/<?php echo ($inin["module"]); ?>/cid/<?php echo ($inin["catid"]); ?>"><?php echo ($inin["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                                          </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                                                      </ul>

                                                   </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                      </li>
                                  </ul>
                                </nav>
                              <script type="text/javascript">
                                
                                $('.navouter').hover(function(){
                                  $(this).find(".innav").stop(true,false).slideDown();
                                    
                                },function(){
                                      if(!$(this).hasClass('active')){
                                       $(this).find(".innav").stop(true,false).slideUp();
                                  }                                  
                                })


                              </script>
                        </div>

                         <div class="col-md-10" role="main">
<form action="<?php echo U('Content/edit');?>" method="POST">
    <div class="wenjian b">
                           
           

               <div class="row">
      <div class="col-md-8">
                           
              <div class="form-group">
                <label for="exampleInputEmail1">文章标题</label>
                <input type="text" class="form-control" name='title' placeholder="请输入文章标题" value="<?php echo ($news["title"]); ?>">
              </div>
               </div>
               <div class="col-md-4">
                           
              <div class="form-group">
                <label for="exampleInputEmail1">所属栏目</label>
                     <select  name="catid" class="form-control">
                     <?php if(!empty($category_sonlist)): if(is_array($category_sonlist)): $i = 0; $__LIST__ = $category_sonlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["catid"] == $thiscatid): ?><option value="<?php echo ($vo["catid"]); ?>"  selected="selected"><?php echo ($vo["catname"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($vo["catid"]); ?>" ><?php echo ($vo["catname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            <?php else: ?>
                            <option value="<?php echo ($catid); ?>"  selected="selected"><?php echo getcatname($catid);?></option><?php endif; ?>

                  </select>
              </div>
               </div>
                </div>

    </div>

    <div class="wenjian b">
    
      
      <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">文章封面</label><span class="pull-right text-info">建议尺寸：460*260px</span>
                      <p>
            <?php if($news["thumb"] != 'null'): ?><img src="<?php echo ($news["thumb"]); ?>" class="thumbnail litpic">
                                        <?php else: ?>
                                        <img src="/he/Public/admin/img/tub.png" class="thumbnail litpic"><?php endif; ?>
                                         </p>
        
        
          
            <p><a href="#" class="btn btn-success" data-toggle="modal" data-target="#gridSystemModal">上传封面图片</a></p>
                      <?php if($news["thumb"] != 'null'): ?><input type="hidden" value="<?php echo ($news["thumb"]); ?>" name='thumb' id='thumb'>
                                        <?php else: ?>
                                        

            <input type="hidden" value="/he/Public/admin/img/tub.png" name='thumb' id='thumb'><?php endif; ?>

          
        </div>
      </div>
      <div class="col-md-8">
      <div class="form-group">
        <label for="exampleInputEmail1">文章关键字</label>
        <input type="text" class="form-control" name='keywords' id="exampleInputEmail1" value='<?php echo ($news["keywords"]); ?>' placeholder="请输入文章关键字">
      </div>
        <div class="form-group">
        <label for="exampleInputEmail1">文章描述</label>
        <textarea class="form-control" rows="3" name='description' ><?php echo ($news["description"]); ?></textarea>
      </div>
    </div>
    </div>
          

            
          </div>
          <div class="wenjian b">

      <textarea id="editor" class='weditor' placeholder="Balabala" autofocus name='body' style="height:800px;max-height:2500px;"><?php echo ($news["content"]); ?></textarea>
          </div>

          <div class="wenjian b">

                 <div class="form-group">
                  <div class="col-sm-9">
                    <div class="checkbox">
               
                       <div class="checkbox">
                         <?php if($news["posids"] == '1'): ?><label>
                        <input type="checkbox" name='posids[]' value="1" checked="checked"> 推荐到首页
                      </label>
                      <label><input type="checkbox" name='posids[]' value="2"> 推荐到本栏目</label><?php endif; ?>
                           <?php if($news["posids"] == '2'): ?><label>
                        <input type="checkbox" name='posids[]' value="1" > 推荐到首页
                      </label>
                      <label><input type="checkbox" name='posids[]' value="2" checked="checked"> 推荐到本栏目</label><?php endif; ?>
                         <?php if($news["posids"] == '3'): ?><label>
                        <input type="checkbox" name='posids[]' value="1" checked="checked"> 推荐到首页
                      </label>
                      <label><input type="checkbox" name='posids[]' value="2" checked="checked"> 推荐到本栏目</label><?php endif; ?>
                         <?php if($news["posids"] == '0'): ?><label>
                        <input type="checkbox" name='posids[]' value="1" > 推荐到首页
                      </label>
                      <label><input type="checkbox" name='posids[]' value="2"> 推荐到本栏目</label><?php endif; ?>
                    </div>
                 

                    </div>
                  </div>





                </div>

                <div class="row showqi" style="display:block">
                    <div class="col-sm-4">
                             <div class="form-group">
                                      <label for="message-text" class="control-label">发布时间:</label>
                                      <input class="form-control form_datetime"   name='inputtime' placeholder="请填写发布时间" value="<?php echo ($news["updatetime"]); ?>">
                            </div>
                        </div>
                          <div class="col-sm-4">
                             <div class="form-group">
                                      <label for="message-text" class="control-label">排序:</label>
                                      <input class="form-control"    name='listorder' placeholder="请填写排序顺序" value="<?php echo ($news["listorder"]); ?>">
                            </div>
                        </div>

                        <div class="col-sm-4">
                             <div class="form-group">
                                      <label for="message-text" class="control-label">跳转链接:</label>
                                      <input class="form-control"   name='url' placeholder="请填写要跳转到的站外链接" value="<?php echo ($news["url"]); ?>">
                            </div>
                  </div>

                    <div class="notes">
                      <ol>
                        <li>发布时间不需要填写，系统会自动获取当前时间，如果填写，将按照您填写的时间进行显示</li>
                        <li>默认排序按照发布时间进行排序，如果填写排序，则填写的值越小，越排在前面</li>
                        <li>如果该篇文章需要直接跳转，请填写，如不需要，则不要填写。格式示例:http://cheerue.com/</li>
                        </ol>
                      </div>
 
                        </div>   

          </div>

      
           <input type="hidden" value="1" name='dopost'></input>
                  <input type="hidden" value="<?php echo ($news["id"]); ?>" name='id'></input>

           

          <div class="wenjian b">
            <button type="submit" class="btn btn-warning btn-lg btn-block">提交</button>

          </div>
                       
      
                              
                         </form>
                           
                      </div>
            

    

        </div>
        
        
        
      </div>
    </div>



</div>

<script type="text/javascript" src="/he/Public/admin/weditor/js/wangEditor.min.js"></script>
<script type="text/javascript">

  
    var textarea = $('.weditor');
    // 生成编辑器
    var editor = new wangEditor(textarea);
     // 上传图片（举例）
    editor.config.uploadImgUrl = '<?php echo U('Content/uploadimgfromeditor_w');?>';

    // 配置自定义参数（举例）
    editor.config.uploadParams = {
        token: 'abcdefg',
        user: 'wangfupeng1988'
    };

    // 设置 headers（举例）
    editor.config.uploadHeaders = {
        'Accept' : 'text/x-json'
    };

    editor.create();

     //生成时间
        $('.form_datetime').datetimepicker({
      language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
          showMeridian: 1
    });

        $('.next_open').click(function(){
            $('.showqi').slideToggle();
        })

</script>






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
              <span>上传封面</span>
  
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
    var url = '<?php echo U('Content/uploadimg');?>',
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
                    .prop('href', file.url).addClass("updone");
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
$.post('/he/index.php/Home/Content/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>