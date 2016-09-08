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
<link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/css/admin.css">
<link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/editor/css/simditor.css" />
<link rel="stylesheet" type="text/css" href="/thinkv/Public/admin/editor/css/simditor-fullscreen.css" />
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
                                                   <a href="/thinkv/index.php/Home/Content/<?php echo ($vo["module"]); ?>/cid/<?php echo ($vo["catid"]); ?>"><?php echo ($vo["catname"]); ?></a>
                                                   <ul class='innav'>
                                                     <?php $_result=getcategory('son',$vo[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><li><a href="/thinkv/index.php/Home/Content/<?php echo ($in["module"]); ?>/cid/<?php echo ($in["catid"]); ?>"><?php echo ($in["catname"]); ?></a></li>
                                                                    <ul class="ininnav">
                                                         <?php $_result=getcategory('son',$in[catid]);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inin): $mod = ($i % 2 );++$i;?><li><a href="/thinkv/index.php/Home/Content/<?php echo ($inin["module"]); ?>/cid/<?php echo ($inin["catid"]); ?>"><?php echo ($inin["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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

                  <a href="/thinkv/index.php/Home/Content/addset/cid/<?php echo ($catid); ?>/type/text" class="btn btn-warning pull-right" type="button" >新增文字类型</a><a  href="/thinkv/index.php/Home/Content/addset/cid/<?php echo ($catid); ?>/type/img" class="btn btn-warning pull-right mr20" type="button" >新增图片类型</a>
                 <div class="clearfix"></div>
              </h4>
            </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <ul class="list-group">
                  

                    <?php if(is_array($catset_list)): $i = 0; $__LIST__ = $catset_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item catset"><i  class='tips' data-toggle="tooltip" data-placement="right" title="调用:<?php echo ($vo["value"]); ?>"><?php echo ($vo["name"]); ?></i><a href="" date='<?php echo ($vo["id"]); ?>'  class="tn btn-danger pull-right btn-xs pull-right ds">删除</a>
                        <a href="/thinkv/index.php/Home/Content/editset/cid/<?php echo ($catid); ?>/id/<?php echo ($vo["id"]); ?>"  date='<?php echo ($vo["aid"]); ?>' date-key='<?php echo ($vo["info"]); ?>'  date-value='<?php echo ($vo["value"]); ?>'   class="tn btn-info pull-right btn-xs pull-right editsys mr20">编辑</a><span class='pull-right mr20'>
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
                url:"/thinkv/index.php/Home/content/delete_setcat/id/"+aid,
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

                              <!-- 引用媒体列表 -->
                               <div class="row " style="margin-bottom: 20px;">
 <?php if(!empty($media_list)): if(is_array($media_list)): $i = 0; $__LIST__ = $media_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-4 col-lg-4 media_outer">
                                      <h3><?php echo ($vo["title"]); ?></h3>
                                      <div class="media_list">
                                     <?php if(!empty($vo["thumb"])): ?><img src="<?php echo ($vo["thumb"]); ?>">
                                          <?php else: ?>
                                           <img src="/thinkv/Public/admin/img/nopic.png"><?php endif; ?>
                                      </div>
                                      <p> <a class="dodelete pull-left" link='/thinkv/index.php/Home/Content/media_delete/id/<?php echo ($vo["id"]); ?>' role="button"><span class='glyphicon glyphicon-trash'></span></a><a class="btn btn-default pull-right " href="/thinkv/index.php/Home/Content/edit_media/cid/<?php echo ($vo["catid"]); ?>/id/<?php echo ($vo["id"]); ?>" role="button">编辑</a><a class="btn btn-success pull-right  mr20" href="/thinkv/index.php/Ue/Show/index/cid/<?php echo ($vo["catid"]); ?>/aid/<?php echo ($vo["id"]); ?>" role="button" target="new">前台预览</a></p>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
  <?php else: ?> 
  <div class="alert alert-warning alert-dismissible subcat" role="alert" style="margin-top: 30px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    暂无任何信息
                                                  </div><?php endif; ?>
                                       <?php echo ($page); ?>

  <p style="margin-top: 30px;"> <a class="btn btn-success pull-right  mr20" href="/thinkv/index.php/Home/Content/add_media/cid/<?php echo ($catid); ?>" role="button">发布新资源</a></p>

  </div>


                              


                    </div>
            
        </div>

      </div>
    </div>



<script type="text/javascript">
  

//删除操作点击确认
$('.dodelete').click(function(){
       var result = confirm('是否确定删除！');  
      if(result){  

          window.location.href=$(this).attr('link'); 
      }else{  
          return false;  
      }  
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
$.post('/thinkv/index.php/Home/Content/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
</script>

</body>

</html>