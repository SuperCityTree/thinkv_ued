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
<link rel="stylesheet" type="text/css" href="/demo/Public/admin/weditor/css/wangEditor.min.css" />
<link rel="stylesheet" href="/demo/Public/admin/css/jquery.fileupload.css">

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
        <h3>内容管理</h3>
        <p>您可以在本栏目内自定义设置内容，管理文档内容等</p>
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
                                                   <a href="/demo/index.php/Home/Content/<?php echo ($vo["module"]); ?>/cid/<?php echo ($vo["catid"]); ?>"><?php echo ($vo["catname"]); ?></a>
                                                   <ul class='innav'>
                                                     <?php $_result=getcategory('son',$vo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><li><a href="/demo/index.php/Home/Content/<?php echo ($in["module"]); ?>/cid/<?php echo ($in["catid"]); ?>"><?php echo ($in["catname"]); ?></a></li>
                                                                    <ul class="ininnav">
                                                         <?php $_result=getcategory('son',$in[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inin): $mod = ($i % 2 );++$i;?><li><a href="/demo/index.php/Home/Content/<?php echo ($inin["module"]); ?>/cid/<?php echo ($inin["catid"]); ?>"><?php echo ($inin["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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

                             <!-- 引用广告组设置公共模块 -->
                              <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  本栏目页面设置组
                </a>

                  <a href="/demo/index.php/Home/Content/addset/cid/<?php echo ($catid); ?>/type/text" class="btn btn-warning pull-right" type="button" >新增文字类型</a><a  href="/demo/index.php/Home/Content/addset/cid/<?php echo ($catid); ?>/type/img" class="btn btn-warning pull-right mr20" type="button" >新增图片类型</a>
                 <div class="clearfix"></div>
              </h4>
            </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <ul class="list-group">
                  

                    <?php if(is_array($catset_list)): $i = 0; $__LIST__ = $catset_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item catset"><i  class='tips' data-toggle="tooltip" data-placement="right" title="调用:<?php echo ($vo["value"]); ?>"><?php echo ($vo["name"]); ?></i><a href="" date='<?php echo ($vo["id"]); ?>'  class="tn btn-danger pull-right btn-xs pull-right ds">删除</a>
                        <a href="/demo/index.php/Home/Content/editset/cid/<?php echo ($catid); ?>/id/<?php echo ($vo["id"]); ?>"  date='<?php echo ($vo["aid"]); ?>' date-key='<?php echo ($vo["info"]); ?>'  date-value='<?php echo ($vo["value"]); ?>'   class="tn btn-info pull-right btn-xs pull-right editsys mr20">编辑</a><span class='pull-right mr20'>
                        <?php if($vo["type"] == img): if(is_array($vo["img"])): $i = 0; $__LIST__ = $vo["img"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["link"]); ?>" class="sss"><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php else: ?>
                         <?php echo (msubstr($vo["text"],0,30)); endif; ?>
                        </span</li><?php endforeach; endif; else: echo "" ;endif; ?>



                </ul>
                <div class="clearfix"></div>
    </div>
  </div>
  <script type="text/javascript">
      //删除系统配置项目
$('.ds').click(function(){
var aid=$(this).attr('date')
   var result = confirm('是否确定删除！');  
      if(result){  
          
  $.ajax({
                cache: true,
                type: "POST",
                url:"/demo/index.php/Home/content/delete_setcat/id/"+aid,
                async: false,
                error: function(request) {
                    alert("删除失败");
                      return false;  
                },
                success: function(data) {
                  // window.location.reload();
                }
            }); 

      }else{  
          return false;  
      }  


})

$('.tips').tooltip()


  </script>
                    

                              <!-- 引用子栏目公共模块 -->
                              <!--  <div class="row " style="margin-bottom: 20px;">
                           <div class="btn-group btn-group-justified subcat" role="group" aria-label="Justified button group">
                            <a href="#}" class="btn btn-default active" role="button"><?php echo ($catinfo["catname"]); ?></a>
                             </div>
  </div> -->

<div class="row" style="margin-left: 0px;">
  <h4>|<?php echo ($catinfo["catname"]); ?></h4>
</div>

                              <!-- 引用单页内容模板 -->
                                <?php if(!empty($page)): ?><div class="row pd20">

                                          <?php if(is_array($page)): $i = 0; $__LIST__ = $page;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="bs-callout-info">
                                        <h5>内容区域<?php echo ($i); ?>
                                                <?php if(getconfig('cfg_mode')=='Y'): ?><span class="glyphicon glyphicon-remove pull-right deletepage" aria-hidden="true" link='/demo/index.php/Home/Content/delete_page/cid/<?php echo ($vo["catid"]); ?>/id/<?php echo ($vo["id"]); ?>'></span><?php endif; ?>

                                        </h5>
                                                            <form action="<?php echo U('Content/edit_page');?>" method="POST">
                                                                <div class="wenjian b ">

                                                                <div class="row">
                                                                <div class="col-md-12">

                                                                <div class="form-group">
                                                                <input type="text" class="form-control" name='title' placeholder="请输入标题" required="required" value="<?php echo ($vo["title"]); ?>">
                                                                </div>
                                                                </div>
                                                          
                                                                </div>
                                                                </div>

                                                               


                                                          
                                                                <div class="wenjian b">
                                                        
                                                                <textarea class="weditor" placeholder="Balabala" autofocus name='content'  required="required" style="height:800px;max-height:2500px;"><?php echo ($vo["content"]); ?></textarea>
                                                             
                                                                </div>

                                                                 <div class="wenjian b" style="margin-bottom:50px">

                                                            <?php if($vo["thumb"] != ''): ?><span class="shouqimore glyphicon glyphicon-menu-up">收起更多设置</span>
                                                                        
                                                                        <div class="row moresetpage">
                                                                        <?php else: ?>
                                                                        <span class="shouqimore glyphicon glyphicon-menu-down">弹开更多设置</span>
                                                                        
                                                                        <div class="row moresetpage" style="display:none"><?php endif; ?>

                                                                        <div class="col-md-4">
                                                                          <div class="form-group">
                                                                            <label for="exampleInputEmail1">单页封面</label>
                                                                             

                                                                                <?php if($vo["thumb"] != ''): ?><img src="<?php echo ($vo["thumb"]); ?>" class="thumbnail litpic">
                                                                      <?php else: ?>
                                                                      <img src="/demo/Public/admin/img/tub.png" class="thumbnail litpic"><?php endif; ?>
                                                                       </p>

                                                                              <p><a href="#" class="btn btn-success" data-toggle="modal" data-target="#gridSystemModal">上传单页封面</a></p>
                                                                              <input type="hidden" value="<?php echo ($vo["thumb"]); ?>" name='thumb' id='thumb'>
                                                                          </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                        <div class="form-group">
                                                                          <label for="exampleInputEmail1">单页关键字</label>
                                                                          <input type="text" class="form-control" name='keywords' id="exampleInputEmail1"  value='<?php echo ($vo["keywords"]); ?>' placeholder="请输入文章关键字">
                                                                        </div>
                                                                          <div class="form-group">
                                                                          <label for="exampleInputEmail1">单页描述</label>
                                                                          <textarea class="form-control" rows="3" name='description'  value='<?php echo ($vo["description"]); ?>'  placeholder="请输入文章描述信息(若不填写，将自动抓取文章信息)"><?php echo ($vo["description"]); ?></textarea>
                                                                        </div>
                                                                      </div>
                                                                      </div>
                                                                            

                                                                              
                                                                            </div>
                                                      
                                                                <input type="hidden" value="1" name='dopost'></input>
                                                                  <input type="hidden" value="<?php echo ($vo["catid"]); ?>" name='catid'></input>
                                                                 <input type="hidden" value="<?php echo ($vo["id"]); ?>" name='id'></input>

                                                                <div class="wenjian b">
                                                                <button type="submit" class="btn btn-warning btn-lg btn-block">提交</button>

                                                                </div>
                                                          </div>  
                                                    </form><?php endforeach; endif; else: echo "" ;endif; ?>
                                                   <div class="clearfix"></div>

                                                    <?php if(getconfig('cfg_mode')=='Y'): ?><!-- 判断是否启用了开发模式 -->
                                                              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <h4>还需要添加一个？</h4>
                                                                <p>如果您觉得不够用，可以点击再次添加一个</p>
                                                                <p>
                                                                 
                                                                  <a href='/demo/index.php/Home/Content/add_page/cid/<?php echo ($catid); ?>' class="btn btn-default">再来一个</a>
                                                                </p>
                                                              </div><?php endif; ?>

                                      </div>

                                      <script type="text/javascript" src="/demo/Public/admin/weditor/js/wangEditor.min.js"></script>

                                      <script type="text/javascript">

                                                $('.weditor').each(function(){
                                                   var textarea = $(this);
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
                                                })

                                                
                                           $('.deletepage').click(function(){
                                                       var result = confirm('是否确定删除！');  
                                                            if(result){  
                                                                window.location.href=$(this).attr('link'); 
                                                            }else{  
                                                                return false;  
                                                            }  
                                           })
                                           $('.shouqimore').click(function(){
                                            if($(this).hasClass('glyphicon-menu-up')){
                                              $(this).removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down').html('弹开更多设置').next('.row').slideUp();
                                                  return false;
                                                }
                                                else{
                                                    $(this).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up').html('收起更多设置').next('.row').slideDown();
                                                  return false;
                                                }
                                           })
                                                 
                                              </script>

                                   <?php else: ?>

                                    <?php if(getconfig('cfg_mode')=='Y'): ?><!-- 判断是否启用了开发模式 -->
                                          <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h4>该栏目暂时没单页信息</h4>
                                            <p>如果您在本栏目拥有大量文字，可以在本栏目添加一个单页</p>
                                            <p>
                                             
                                              <a href='/demo/index.php/Home/Content/add_page/cid/<?php echo ($catid); ?>' class="btn btn-default">添加一个</a>
                                            </p>
                                          </div><?php endif; endif; ?>






                            


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
$.post('/demo/index.php/Home/Content/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
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
</body>

</html>