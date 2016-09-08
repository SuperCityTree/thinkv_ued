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
<link rel="stylesheet" href="/demo/Public/admin/css/toolkit.css">
<link rel="stylesheet" type="text/css" href="/demo/Public/admin/editor/css/simditor.css" />

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
        <h3>新增栏目设置</h3>
        <p>您可以在该栏目中添加新的栏目设置内容</p>
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
<form action="<?php echo U('content/addset');?>" method="POST">
		

		<div class="wenjian b">
		
  		
  		<div class="row">
		

		  <div class="col-md-12">
        <div class="form-group">
        <label for="recipient-name" class="control-label">所属设置组:</label>
          <select  name="catid" class="form-control"> 
                  <?php if(is_array($catlist)): $i = 0; $__LIST__ = $catlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["catid"] == $cid): ?><option value="<?php echo ($vo["catid"]); ?>"  selected="selected"><?php echo ($vo["catname"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo["catid"]); ?>" ><?php echo ($vo["catname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">标题</label>
		    <input type="text" class="form-control" name='name' id="exampleInputEmail1" placeholder="请输入标题">
		  </div>
      <div class="form-group">
        <label for="exampleInputEmail1">图片链接</label>
        <input type="text" class="form-control" name='img_link' id="exampleInputEmail1" placeholder="请输入链接">
      </div>
  <?php if(getconfig('cfg_mode')=='Y'): ?><div class="form-group">
    <?php else: ?>
    <div class="form-group" style="display: none"><?php endif; ?>
                <label for="exampleInputEmail1">调用符</label>
                <input type="text" class="form-control" name='value' id="exampleInputEmail1" required="required"  placeholder="请输入调用符 英文字符">
              </div>

              <div class="wenjian b">
              <div class="form-group">
                      <label for="exampleInputEmail1">资源上传区域</label>

                            <div id="import-drop-target" class="bs-dropzone">
                                <div class="import-header">
                                   <span class="btn btn-success fileinput-button">
                                      <i class="glyphicon glyphicon-plus"></i>
                                      <span>上传资源</span>
                          
                                      <input id="fileupload_meida" type="file" name="files[]" multiple="">
                                  </span>
                                </div>
                              
                                <p>点击上面的按钮，直接可以上传资源了，支持图片，视频，音乐文件上传</p>
                                <hr>
                                  <p><strong class="pull-left">单个文件大小不要超过20MB</strong><a href="javascript:void(0)" class="addmiaoshu pull-right" style="display:block">给图片添加描述</a><a href="javascript:void(0)" class='paixu pull-right' style="padding-right: 20px" data='1'>开启排序</a></p>

                                <div id="progress_media" class="progress"f>
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>

                                <div  class="files">
                                <ul id="files_media">
                                  

                                </ul>

                                </div>
                              </div>
            <div class="clear-fix"></div>
            

                              


                    </div>
  
          </div>

		</div>


		</div>
		      

		        
		      </div>

		       <input type="hidden" value="1" name='dopost'></input>
                    <input type="hidden" value="img" name='type'></input>

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
              <span>上传封面</span>
  
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



<script src="http://cdn.bootcss.com/jquery/2.0.1/jquery.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
<script type="text/javascript" src="/demo/Public/admin/js/jquery.dragsort-0.5.2.min.js"></script>



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


<script type="text/javascript">
  //资料上传
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
            
    $('#fileupload_meida').fileupload({
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
        previewMaxWidth: 250,
        previewMaxHeight: 250,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {

        data.context = $('<li/>').appendTo('#files_media');
        $.each(data.files, function (index, file) {
            var node = $('<div/>')
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
        $('#progress_media .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {


       
        $.each(data.result.files, function (index, file) {
        
                    //console.log(file.url);
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url).addClass("updone");
                $(data.context.children()[index])
                    .wrap(link);
                    var orgname=$(data.context.children()[index]).find("span").html();
                    var flielink_input="<input type='hidden' name='filelink[]' value="+file.url+">";
                    var fliename_input="<textarea name='filename[]' class='miaoshu' value="+orgname+">"+orgname+"</textarea>";
                    var flietype_input="<input type='hidden' name='filetype[]' value="+file.type+">";
                    var flieadd_input="<input type='hidden' name='fileadd[]' value='1'>";
                    var deleteimg="<a href='javascript:void(0)' class='updelete' data="+file.name+">删除</a>";
                   $(flielink_input).insertAfter(data.context.children()[index]);
                    $(fliename_input).insertAfter(data.context.children()[index]);
                     $(flietype_input).insertAfter(data.context.children()[index]);
                      $(flieadd_input).insertAfter(data.context.children()[index]);
                       $(deleteimg).insertAfter(data.context.children()[index]);


                     $(".addmiaoshu").show()

 /*$("#files_media").dragsort({ dragSelector: "li", dragBetween: true, placeHolderTemplate: "<canvas></span>" });*/
                //     $('#files_media').gridly('draggable', 'off').removeClass('dargable');
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

//给图片添加描述
$('.addmiaoshu').on('click',function(){

  $('.miaoshu').show().addClass('form-control');
  //$('#files_media').gridly('draggable', 'off').removeClass('dargable');
  return false;

})


//删除图片
$('body').on('click','.updelete',function(){
  var link=$(this).attr('data');
  $(this).parent('li').remove();

      $.post('<?php echo U('Content/delete_media_img');?>',{'name':link},function(data){
       consloe.log(data);
      });
       
 
      return false;

})

//添加一条网址资源
$('.addone').click(function(){
  var row=$(this).parent().prev('.row');

  row.after(row.clone());
  /* $('.addone').insertBefore(row);*/

})

$('.paixu').click(function(){
  if($(this).attr('data')=='1'){
    $("#files_media").dragsort({ dragSelector: "li", dragBetween: true });
    $(this).attr('data','2').html('关闭排序');
    $('.updelete').hide();
  }
  else{
    $("#files_media").dragsort("destroy");
    $(this).attr('data','1').html('开启排序');
    $('.updelete').show();
  }
})


$('.zjwz').click(function(){
    $('.showzj').slideToggle();
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
$.post('/demo/index.php/Home/Content/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>


</body>

</html>