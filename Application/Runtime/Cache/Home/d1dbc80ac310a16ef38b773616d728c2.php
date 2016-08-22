<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properties -->
    <title>栏目管理_<?php echo ($cfg_webname); ?></title>
    <link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/css/admin.css">
    <link rel="stylesheet" href="/thinkv/Public/admin/css/jquery.fileupload.css"></head>

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
        <h3>栏目管理</h3>
        <p>您可以在本栏目中自由修改栏目名称等信息</p>
      </div>
    </div>
    <div class="container bs-docs-container">
      <div class="row">
        <div class="list-group catedit gridly" style="float:left;margin-bottom:20px">
          <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["son"] == 0): ?><a href="#" class="list-group-item active" data-toggle="tooltip" data-placement="left" title="栏目id:<?php echo ($vo["catid"]); ?>"><?php echo ($vo["catname"]); ?>
                <span class="edit" date="<?php echo ($vo["catid"]); ?>" date-p="<?php echo ($vo["parentid"]); ?>" date-see='<?php echo ($vo["usable_type"]); ?>' date-m='<?php echo ($vo["module"]); ?>' date-name='<?php echo ($vo["catname"]); ?>' date-description='<?php echo ($vo["description"]); ?>' date-order='<?php echo ($vo["listorder"]); ?>' date-style='<?php echo ($vo["style"]); ?>' date-image='<?php echo ($vo["image"]); ?>' date-keyword='<?php echo ($vo["keyword"]); ?>' date-url='<?php echo ($vo["url"]); ?>' date-catdir='<?php echo ($vo["catdir"]); ?>'  >修改</span>
                <span>顶级栏目</span>
                <?php if($vo["usable_type"] == 2): ?><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span><?php endif; ?>
                <?php if($vo["linktop"] != 0): ?><span class="glyphicon glyphicon-link" aria-hidden="true"></span><?php endif; ?>
                <?php else: ?>
                <a href="#" class="list-group-item" data-toggle="tooltip" data-placement="left" title="栏目id:<?php echo ($vo["catid"]); ?>">
                  <?php if($vo["son"] == 1): ?>&nbsp;&nbsp;└<?php echo ($vo["catname"]); ?>
                    <?php else: ?>
                    <if condition="$vo.son eq 2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└<?php echo ($vo["catname"]); endif; ?>
                    <span class="edit" date="<?php echo ($vo["catid"]); ?>" date-p="<?php echo ($vo["parentid"]); ?>" date-see='<?php echo ($vo["usable_type"]); ?>' date-m='<?php echo ($vo["module"]); ?>' date-name='<?php echo ($vo["catname"]); ?>' date-description='<?php echo ($vo["description"]); ?>' date-order='<?php echo ($vo["listorder"]); ?>' date-link='<?php echo ($vo["linktop"]); ?>' date-style='<?php echo ($vo["style"]); ?>' date-image='<?php echo ($vo["image"]); ?>' date-keyword='<?php echo ($vo["keyword"]); ?>'  date-url='<?php echo ($vo["url"]); ?>'  <?php if($vo["son"] == 2): ?>date-three='<?php echo ($vo["son"]); ?>'<?php endif; ?>>修改</span>
                  <?php if($vo["son"] == 1): ?><span>二级栏目</span>
                    <?php else: ?>
                    <if condition="$vo.son eq 2">
                      <span>三级栏目</span><?php endif; ?>
                    <?php if($vo["usable_type"] == 2): ?><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span><?php endif; ?>
                    <?php if($vo["linktop"] != 0): ?><span class="glyphicon glyphicon-link" aria-hidden="true"></span><?php endif; endif; ?>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="">
          <a href="" class="btn btn-success pull-right addnew">添加栏目</a></div>
      </div>
    </div>
    </div>
    <!-- 修改栏目 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">基础配置</a></li>
              <li role="presentation">
                <a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">进阶配置</a></li>
                <li role="presentation">
                  <a href="#link2" aria-controls="link2" role="tab" data-toggle="tab">跳转配置</a></li>
            </ul>
          </div>
          <div class="modal-body">
            <form id="changecat">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home2">
                  <input type="hidden" name='catid' id='recipient-id' value=''>
                  <div class="form-group" id="topshow">
                    <label for="recipient-name" class="control-label">所属栏目:</label>
                    <select name="arrparentid" class="form-control changecat" id='parentid_top'>
                      <option value='0'>顶级栏目</option>
                      <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["son"] == 0): ?><option value="<?php echo ($vo["catid"]); ?>" date='<?php echo ($vo["module"]); ?>'><?php echo ($vo["catname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <label for="recipient-name" class="control-label next_row" style="margin-top:10px;">二级分类:</label>
                    <select name="parentid" id="erji2" class="form-control next_row show_next" id='parentid'></select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">栏目名称:</label>
                    <input type="text" class="form-control" id="recipient-name" name='catname'></div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                        <label for="ecipient-name" class="control-label">模型类型:</label>
                        <select class="form-control changemodule" name='module' id="module_edit">
                          <option value='page'>单页模块</option>
                          <option value='news'>新闻模块</option>
                          <option value='media'>媒体模块</option>
                          <option value='product'>产品模块</option>
                          <option value='hr'>招聘模型</option></select>
                      </div>
                      <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                        <label for="ecipient-name" class="control-label">模型模板:</label>
                        <select class="form-control changemb" name='style' id='style'>
                          <?php if(is_array($styledata)): $i = 0; $__LIST__ = $styledata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["0"]); ?>'><?php echo ($vo["0"]); ?>.<?php echo ($vo["1"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                 <div class="form-group">
                    <div class="row" style="padding:0px">
                      <div class="col-md-6 linktopshow" style="display: none;">
                        <label for="ecipient-name" class="control-label" style="width: 100%;">顶级直接连接:</label>
                        <input type="checkbox" name='linktop' value='1' id='linktop'>上级直接跳到本栏目</div>


                      <div class="col-md-6" style="margin-bottom:10px">
                        <label for="message-text" class="control-label "  style="width:100%;">栏目显示:</label>
                        <input  type="checkbox" checked="checked"   value="1"  name='usable_type'  id='usable_type' >   隐藏栏目
                        </div>

                      <div class="col-md-6 ">
                        <label for="message-text" class="control-label ">栏目排序:</label>
                        <input type="text" class="form-control" id='listorder' name='listorder' style="width: 80px;height: 30px;"></div>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile2">
                  <div class="form-group">
                    <label for="message-text" class="control-label">栏目关键字1:</label>
                    <input class="form-control" id="message-keyword" name='keyword'></div>
                      <div class="form-group">
                    <label for="recipient-name" class="control-label">栏目英文名称:</label>
                    <input type="text" class="form-control" id="add—catdir" name='catdir'>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">栏目描述:</label>
                    <textarea class="form-control" id="message-text" name='description'></textarea>
                  </div>
                  <div class="row">
                    <div class="upbtn">
                      <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>上传栏目封面</span>
                        <input id="fileupload" type="file" name="files[]"></span>
                      <span></span>
                    </div>
                    <div id="progress" class="progress">
                      <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <div id="files" class="files">
                      <img src="" id="showimg" style="display:none" width="100">
                      <a class="btn btn-danger yincangtu pullright" style="display:none">删除封面</a></div>
                    <div class="notes">
                      <ol>
                        <li>文章缩略图仅支持图片格式上传</li>
                        <li>图片建议压缩到1mb以下</li>
                        <li>如果文件过大，请自行压缩解决，推荐使用Adobe PhotoShop 就行处理</li></ol>
                      <input class="cimage" type="hidden" name="image"></div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="link2">
                  <div class="row">
                  <div class="form-group">
                    <label for="message-text" class="control-label">跳转链接:</label>
                    <input class="form-control" id='linkurl'  name='url' placeholder="请填写要跳转到的站外链接">
                  </div>

                    <div class="notes">
                      <ol>
                        <li>如果该栏目需要跳转到其他站外链接，请填写</li>
                        <li>如果不需要跳转，请留空</li>
                        <li>填写格式示例:http://cheerue.com/</li>
                        </ol>

                      </div>

                  </div>
                  </div>

              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-danger pull-left shanchu">删除</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            <button type="button" class="btn btn-primary tochange">立即修改</button></div>
        </div>
      </div>
    </div>
    <!-- 添加栏目 -->
    <div class="modal fade" id="addModal" tabindex="-2" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">基础配置</a></li>
              <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">进阶配置</a></li>
              <li role="presentation">
                <a href="#link" aria-controls="profile" role="tab" data-toggle="tab">跳转配置</a>
              </li>

            </ul>
          </div>
          <div class="modal-body">
            <form id="addcat">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">所属栏目:</label>
                    <select name="arrparentid" class="form-control changecat">
                      <option value='0'>顶级栏目</option>
                      <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["son"] == 0): ?><option value="<?php echo ($vo["catid"]); ?>" date='<?php echo ($vo["module"]); ?>' date-style='<?php echo ($vo["style"]); ?>'><?php echo ($vo["catname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <label for="recipient-name" class="control-label next_row" style="margin-top:10px;">二级分类:</label>
                    <select name="parentid" id="erji" class="form-control next_row show_next changestyle" >
                          <option value='0'>顶级栏目</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">栏目名称:</label>
                    <input type="text" class="form-control" id="add-name" name='catname'></div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                        <label for="ecipient-name" class="control-label">模型类型:</label>
                        <select class="form-control changemodule" name='module'>
                          <option value='page'>单页模块</option>
                          <option value='news'>新闻模块</option>
                          <option value='media'>媒体模块</option>
                          <option value='product'>产品模块</option>
                          <option value='hr'>招聘模型</option></select>
                      </div>
                      <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                        <label for="ecipient-name" class="control-label">模型模板:</label>
                        <select class="form-control changemb" name='style' id="newmoban">
                          <?php if(is_array($styledata)): $i = 0; $__LIST__ = $styledata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["0"]); ?>'><?php echo ($vo["0"]); ?>.<?php echo ($vo["1"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row" > 
                      <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;margin-bottom:10px">
                        <label for="message-text" class="control-label " style="width:100%;">顶级直接连接:</label>
                        
                          <input type="checkbox" name='linktop' value='1'>上级栏目直接跳转到本栏目
                      </div>

                     <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;margin-bottom:10px"">
                                           <label class="control-label " style="width:100%;"> 
                                              栏目显示
                                            </label>
<input type="checkbox" name='usable_type' value='2'>隐藏栏目
                          </div>

                      <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                        <label for="message-text" class="control-label ">栏目排序:</label>
                        <input type="text" class="form-control" id='listorder' name='listorder' style="width:80px"></div>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                  <div class="form-group">
                    <label for="message-text" class="control-label">栏目关键字:</label>
                    <textarea class="form-control" id="add-text" name='keyword'></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">栏目英文名称:</label>
                    <input type="text" class="form-control" id="add—dir" name='catdir'>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">栏目描述:</label>
                    <textarea class="form-control" id="add-text" name='description'></textarea>
                  </div>
                  <div class="row">
                    <div class="upbtn">
                      <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>上传栏目封面</span>
                        <input id="fileupload" type="file" name="files[]"></span>
                      <span></span>
                    </div>
                    <div id="progress" class="progress">
                      <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <div id="files" class="files"></div>
                    <div class="notes">
                      <ol>
                        <li>文章缩略图仅支持图片格式上传</li>
                        <li>图片建议压缩到1mb以下</li>
                        <li>如果文件过大，请自行压缩解决，推荐使用Adobe PhotoShop 就行处理</li></ol>
                      <input class="cimage" type="hidden" name="image"></div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="link">
                  <div class="row">
                  <div class="form-group">
                    <label for="message-text" class="control-label">跳转链接:</label>
                    <input class="form-control"  name='url' placeholder="请填写要跳转到的站外链接">
                  </div>

                    <div class="notes">
                      <ol>
                        <li>如果该栏目需要跳转到其他站外链接，请填写</li>
                        <li>如果不需要跳转，请留空</li>
                        <li>填写格式示例:http://cheerue.com/</li>
                        </ol>

                      </div>

                  </div>
                  </div>


              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            <button type="button" class="btn btn-primary toadd">立即添加</button></div>
        </div>
      </div>
    </div>
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">$('.list-group-item').tooltip();
      //修改栏目
      $('.edit').click(function() {

         
        // if ($(this).attr('date-see')) {
        //   $('.shanchu').show()
        // } else {
        //   $('.shanchu').hide()
        // }
        $('#exampleModal').modal('show');
        $('#recipient-id').val($(this).attr('date'));
        $('#recipient-name').val($(this).attr('date-name'));
        $('#message-text').html($(this).attr('date-description'));
        $('#listorder').val($(this).attr('date-order'));
        $('#module_edit').val($(this).attr('date-m'));
        $('#parentid').val($(this).attr('date-p'));
        $('#style').val($(this).attr('date-style'));
        //alert ($this.attr('date-url'))
        $('#linkurl').val($(this).attr('date-url'));
        $('#usable_type').val($(this).attr('date-see'));
        // console.log($(this).attr('date-keyword'));
        $('#add—catdir').val($(this).attr('date-catdir'));
        $('#message-keyword').val($(this).attr('date-keyword'));
        if ($(this).attr('date-image')) {
          $('#showimg').attr('src', $(this).attr('date-image')).show();
          $(".yincangtu").show();
           
        }
        
        //判断是否为顶级栏目
        var data_p = $(this).attr('date-p');
        if (parseInt(data_p) < 1) {
          $('#parentid_top').val('0');
        } else {

          if (parseInt($(this).attr('date-three'))) {
            $.ajax({
              cache: true,
              type: "POST",
              url: "/thinkv/index.php/Home/category/checktop/cid/" + data_p,
              async: true,
              error: function(request) {
                alert("稍候再试");
              },
              success: function(data) {
                $('#parentid_top').val(data).change();
                $('#erji2').val(data_p);
              }
            })
          } else {
            $('#parentid_top').val(data_p);
            $.ajax({
              cache: true,
              type: "POST",
              url: "/thinkv/index.php/Home/category/getnext/cid/" + data_p,
              async: true,
              error: function(request) {
                alert("稍候再试");
              },
              success: function(data) {
                $("#erji").html(data);
                $("#erji2").html(data);
              }
            });
          }

          $('.next_row ').show()

        }

        var link = parseInt($(this).attr('date-link'));
          
        if (link >= 0) {
          $('.linktopshow').show();
          if (link > 0) {
            $('#linktop').attr('checked', 'checked')
          } else {

            $('#linktop').removeAttr('checked')
          }
        } else {
          $('.linktopshow').hide();
          $('#inlineRadio1').attr("checked", "checked");
        }

        var see =$(this).attr('date-see');
        if (see == '2') {

          $('#usable_type').attr("checked", "checked");
        }else{
           $('#usable_type').removeAttr('checked')
        }


      })

      //添加栏目
      $('.addnew').click(function() {

        $('#addModal').modal('show');
        return false;

      })

      $('.tochange').click(function() {

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
            data: $('#changecat').serialize(),
            // 你的formid
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

      $('.toadd').click(function() {

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
            data: $('#addcat').serialize(),
            // 你的formid
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

      $('.shanchu').click(function() {
        var result = confirm('是否确定删除！');
        if (result) {

          $('#exampleModal').modal('hide');

          $.ajax({
            cache: true,
            type: "POST",
            url: "<?php echo U('category/delete/');?>",
            data: $('#changecat').serialize(),
            // 你的formid
            async: false,
            error: function(request) {
              alert("删除失败");
            },
            success: function(data) {
              if (data == '2') {
                alert("该栏目下面还有子栏目，需调整后才能删除");
              } else {
                window.location.reload();
              }

            }
          });
        } else {
          return false;
        }
      })

      $('.changecat').change(function() {
        // console.log( $(this).find("option:selected").attr('date'))
        var select_option = $(this).find("option:selected");

        $('#module').val(select_option.attr('date'));
        $('#newmoban').val(select_option.attr('date-style'));
        if (select_option.val() > 0) {
          $('.next_row').show();
          $.ajax({
            cache: true,
            type: "POST",
            url: "/thinkv/index.php/Home/category/getnext/cid/" + select_option.val(),
            async: false,
            error: function(request) {
              alert("稍候再试");
            },
            success: function(data) {
              $("#erji").html(data);
              $("#erji2").html(data);
           
            }
          });

        } else {
          $("#erji").html("<option value='0'>首页</option>");
          $('.next_row').hide();
        }
      })

      $('.changestyle').change(function() {
        var changeval=$(this).find("option:selected").attr('date-style');
        if(changeval){
          $('#newmoban').val(changeval);
        }
      })

      $(".changemodule").change(function() {
        $(".changemb").val($(this).val());

      })</script>
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
$.post('/thinkv/index.php/Home/Category/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="/thinkv/Public/admin/js/jquery.ui.widget.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="/thinkv/Public/admin/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="/thinkv/Public/admin/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="/thinkv/Public/admin/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/thinkv/Public/admin/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/thinkv/Public/admin/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/thinkv/Public/admin/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <!-- The File Upload validation plugin -->
    <script src="/thinkv/Public/admin/js/jquery.fileupload-validate.js"></script>
    <script>/*jslint unparam: true, regexp: true */
      /*global window, $ */
      $(function() {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '<?php echo U('Content/uploadimg');?>',
        uploadButton = $('<a/>').addClass('btn btn-primary pull-right').prop('disabled', true).text('上传中...').on('click',
        function() {
          var $this = $(this),
          data = $this.data();
          $this.off('click').text('取消').on('click',
          function() {
            $this.remove();
            data.abort();
          });
          data.submit().always(function() {
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
          disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
          previewMaxWidth: 100,
          previewMaxHeight: 100,
          previewCrop: true
        }).on('fileuploadadd',
        function(e, data) {
          data.context = $('<ul/>').appendTo('#files');
          $.each(data.files,
          function(index, file) {
            var node = $('<li/>').append($('<span/>').text(file.name));
            if (!index) {
              node.append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
            $("#showimg").hide();
            $(".yincangtu").hide()
          });
        }).on('fileuploadprocessalways',
        function(e, data) {
          var index = data.index,
          file = data.files[index],
          node = $(data.context.children()[index]);
          if (file.preview) {
            node.prepend(file.preview);
          }
          if (file.error) {
            node.append($('<span class="text-danger"/>').text(file.error));
          }
          if (index + 1 === data.files.length) {
            data.context.find('a').text('上传文件').prop('disabled', !!data.files.error);
          }
        }).on('fileuploadprogressall',
        function(e, data) {
          var progress = parseInt(data.loaded / data.total * 100, 10);
          $('#progress .progress-bar').css('width', progress + '%');
        }).on('fileuploaddone',
        function(e, data) {

          $.each(data.result.files,
          function(index, file) {

            if (file.url) {
              var link = $('<a>').attr('target', '_blank').prop('href', file.url).addClass("updone");
              $(data.context.children()[index]).wrap(link);

              $(".cimage").val(file.url);

            } else if (file.error) {
              var error = $('<span class="text-danger"/>').text(file.error);
              $(data.context.children()[index]).append('<br>').append(error);
            }
          });
          return false;
        }).on('fileuploadfail',
        function(e, data) {

          $.each(data.files,
          function(index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index]).append('<br>').append(error);
          });
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined: 'disabled');
      });
      $('.yincangtu').click(function() {
        $("#showimg").hide();
        $(this).hide();
        $('.cimage').val("")
      })</script>
  </body>

</html>