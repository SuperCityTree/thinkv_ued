
// 焦点图
(function(d,D,v){d.fn.responsiveSlides=function(h){var b=d.extend({auto:!0,speed:1E3,timeout:7E3,pager:!1,nav:!1,random:!1,pause:!1,pauseControls:!1,prevText:"Previous",nextText:"Next",maxwidth:"",controls:"",namespace:"rslides",before:function(){},after:function(){}},h);return this.each(function(){v++;var e=d(this),n,p,i,k,l,m=0,f=e.children(),w=f.size(),q=parseFloat(b.speed),x=parseFloat(b.timeout),r=parseFloat(b.maxwidth),c=b.namespace,g=c+v,y=c+"_nav "+g+"_nav",s=c+"_here",j=g+"_on",z=g+"_s",
o=d("<ul class='"+c+"_tabs "+g+"_tabs' />"),A={"float":"left",position:"relative"},E={"float":"none",position:"absolute"},t=function(a){b.before();f.stop().fadeOut(q,function(){d(this).removeClass(j).css(E)}).eq(a).fadeIn(q,function(){d(this).addClass(j).css(A);b.after();m=a})};b.random&&(f.sort(function(){return Math.round(Math.random())-0.5}),e.empty().append(f));f.each(function(a){this.id=z+a});e.addClass(c+" "+g);h&&h.maxwidth&&e.css("max-width",r);f.hide().eq(0).addClass(j).css(A).show();if(1<
f.size()){if(x<q+100)return;if(b.pager){var u=[];f.each(function(a){a=a+1;u=u+("<li><a href='#' class='"+z+a+"'>"+a+"</a></li>")});o.append(u);l=o.find("a");h.controls?d(b.controls).append(o):e.after(o);n=function(a){l.closest("li").removeClass(s).eq(a).addClass(s)}}b.auto&&(p=function(){k=setInterval(function(){var a=m+1<w?m+1:0;b.pager&&n(a);t(a)},x)},p());i=function(){if(b.auto){clearInterval(k);p()}};b.pause&&e.hover(function(){clearInterval(k)},function(){i()});b.pager&&(l.bind("mouseover",function(a){a.preventDefault();
b.pauseControls||i();a=l.index(this);if(!(m===a||d("."+j+":animated").length)){n(a);t(a)}}).eq(0).closest("li").addClass(s),b.pauseControls&&l.hover(function(){clearInterval(k)},function(){i()}));if(b.nav){c="<a href='#' class='"+y+" prev'>"+b.prevText+"</a><a href='#' class='"+y+" next'>"+b.nextText+"</a>";h.controls?d(b.controls).append(c):e.after(c);var c=d("."+g+"_nav"),B=d("."+g+"_nav.prev");c.bind("mouseover",function(a){a.preventDefault();if(!d("."+j+":animated").length){var c=f.index(d("."+j)),
a=c-1,c=c+1<w?m+1:0;t(d(this)[0]===B[0]?a:c);b.pager&&n(d(this)[0]===B[0]?a:c);b.pauseControls||i()}});b.pauseControls&&c.hover(function(){clearInterval(k)},function(){i()})}}if("undefined"===typeof document.body.style.maxWidth&&h.maxwidth){var C=function(){e.css("width","100%");e.width()>r&&e.css("width",r)};C();d(D).bind("resize",function(){C()})}})}})(jQuery,this,0);
$(function() {
    $(".f1660x649").responsiveSlides({
        auto: true,
        pager: true,
        nav: false,
        speed: 700
    });
    $(".f292x85").responsiveSlides({
        auto: true,
        pager: true,
        nav: false,
        speed: 700
    });
});

//选项卡
var fgm = {
 $: function(id) {
  return typeof id === "object" ? id : document.getElementById(id);
 },
 $$: function(tagName, oParent) {
  return (oParent || document).getElementsByTagName(tagName);
 },
 $$$: function(className, element, tagName) {
  var i = 0, aClass = [], reClass = new RegExp("(^|\\s)" + className + "(\\s|$)"), aElement = fgm.$$(tagName || "*", element || document);
  for (i = 0; i < aElement.length; i++) reClass.test(aElement[i].className) && aClass.push(aElement[i]);
  return aClass;
 },
 index: function(element) {
  var aChildren = element.parentNode.children, i;
  for(i = 0; i < aChildren.length; i++) if(aChildren[i] === element) return i;
  return -1;
 },
 on: function(element, type, handler) {
  return element.addEventListener ? element.addEventListener(type, handler, !1) : element.attachEvent("on" + type, handler); 
 },
 bind: function(object, handler) {
  return function() {
   return handler.apply(object, arguments);
  }; 
 }
};
function Tab(id) {
 var that = this;
 this.obj = fgm.$(id);
 this.oTab = fgm.$$$("tab", this.obj)[0];
 this.aTab = fgm.$$("li", this.oTab);
 this.oSwitch = fgm.$$$("switchBtn", this.oTab)[0];
 this.oPrev = fgm.$$("a", this.oSwitch)[0];
 this.oNext = fgm.$$("a", this.oSwitch)[1];
 this.aItems = fgm.$$$("items", this.obj);
 this.iNow = 0;  
 fgm.on(this.oSwitch, "click", fgm.bind(this, this.fnClick));
 fgm.on(this.oTab, "mouseover", fgm.bind(this, this.fnMouseOver));
}
Tab.prototype = {
 fnMouseOver: function(ev) {
  var oEv = ev || event,
  oTarget = oEv.target || oEv.srcElement;
  oTarget.tagName.toUpperCase() === "LI" && (this.iNow = fgm.index(oTarget));
  this.fnSwitch();
 },
 fnClick: function(ev) {
  var oEv = ev || event,
  oTarget = oEv.target || oEv.srcElement,
  i;
  switch(fgm.index(oTarget)) {
   case 0:
    if(oTarget.className == "prev") {
     this.aTab[this.iNow].style.display = "block";
     this.iNow--; 
    };
    break;
   case 1:
    if(oTarget.className == "next") {     
     for(i = 0; i < this.iNow; i++) this.aTab[i].style.display = "none";
     this.iNow++; 
    };
    break;
  };
  this.aTab[this.iNow].style.display = "block";  
  this.fnSwitch(); 
 },
 fnSwitch: function() {
  for(var i = 0; i < this.aTab.length; i++) (this.aTab[i].className = "", this.aItems[i].style.display = "none"); 
  this.aTab[this.iNow].className = "current";
  this.aItems[this.iNow].style.display = "block";
  this.oPrev.className = this.iNow == 0 ? "prevNot" : "prev";
  this.oNext.className = this.iNow == this.aTab.length - 1 ? "nextNot" : "next";
 }
};
//应用
fgm.on(window, "load", function() {
 var aItem = fgm.$$$("newsxxk"),
 i = 0;
 for(; i < aItem.length; i++) new Tab(aItem[i]);
});

$(function() {
    //集体调用
    $(".form input").each(function(){
        $(this).setDefauleValue();
    });
			$("#key").setDefauleValue();
			$("#key2").setDefauleValue();
			$("#key3").setDefauleValue();

})
 
//设置input,textarea默认值
$.fn.setDefauleValue = function() {
    var defauleValue = $(this).val();
    $(this).val(defauleValue).css("color","#999");
 
    return this.each(function() {       
        $(this).focus(function() {
            if ($(this).val() == defauleValue) {
                $(this).val("").css("color","#000");//输入值的颜色
            }
        }).blur(function() {
            if ($(this).val() == "") {
                $(this).val(defauleValue).css("color","#999");//默认值的颜色
            }
        });
    });
}
//下拉菜单
$(function(){
	 $(".nav_li:has(div)").hover(function(){
	  $(this).children("div").stop(true,true).slideDown(300)
	  },function(){
	  $(this).children("div").stop(true,true).slideUp(1)
	  })
	});
//添加删除class
 $(document).ready(function () {
	$('.yy').mouseover(
	function () {
		$('.yy').addClass('cur');
	}
	
	);
	$('.yy').mouseout(
	function () {
		$('.yy').removeClass('cur');
	}
	);
	
	}); 
 $(document).ready(function () {
	$('.ewm').mouseover(
	function () {
		$('.ewm').addClass('cur');
	}
	
	);
	$('.ewm').mouseout(
	function () {
		$('.ewm').removeClass('cur');
	}
	);
	
	}); 

$(function (){
	$(".imglist li").each(function(index){//each变例，每一个a标签
		$(this).click(function(){//鼠标滑过a的时候
			$(".tabLb").addClass("dis")//给news添加样式dis
			$(".tabLb:eq("+index+")").removeClass("dis")//给对应news的index索引值删除dis样式
			$(".imglist li").removeClass("hover")//先删除所有的a的样式hover
			$(this).addClass("hover")//给对应的a添加样式hover
		})
	})
})

$(function() {
    //集体调用
    $(".form input").each(function(){
        $(this).setDefauleValue();
    });
    //单个调用
    $("#key5").setDefauleValue();
    $("#key6").setDefauleValue();
    $("#key7").setDefauleValue();
    $("#key4").setDefauleValue();
})
 
//设置input,textarea默认值
$.fn.setDefauleValue = function() {
    var defauleValue = $(this).val();
    $(this).val(defauleValue).css("color","#848484");
 
    return this.each(function() {       
        $(this).focus(function() {
            if ($(this).val() == defauleValue) {
                $(this).val("").css("color","#333");//输入值的颜色
            }
        }).blur(function() {
            if ($(this).val() == "") {
                $(this).val(defauleValue).css("color","#848484");//默认值的颜色
            }
        });
    });
}
//弹出层
//显示灰色JS遮罩层
function showBg(ct,content){
var bH=$(document).height();
var bW=$("body").width()+16;
var objWH=getObjWh(ct);
$("#fullbg").css({width:bW,height:bH,display:"block"});
var tbT=objWH.split("|")[0]+"px";
var tbL=objWH.split("|")[1]+"px";
$("#"+ct).css({top:tbT,left:tbL,display:"block"});
$(window).scroll(function(){resetBg()});
$(window).resize(function(){resetBg()});
}
function getObjWh(obj){
var st=document.documentElement.scrollTop;//滚动条距顶部的距离
var sl=document.documentElement.scrollLeft;//滚动条距左边的距离
var ch=document.documentElement.clientHeight;//屏幕的高度
var cw=document.documentElement.clientWidth;//屏幕的宽度
var objH=$("#"+obj).height();//浮动对象的高度
var objW=$("#"+obj).width();//浮动对象的宽度
var objT=Number(st)+(Number(ch)-Number(objH))/2;
var objL=Number(sl)+(Number(cw)-Number(objW))/2;
return objT+"|"+objL;
}
function resetBg(){
var fullbg=$("#fullbg").css("display");
if(fullbg=="block"){
var bH2=$(document).height();
var bW2=$("body").width()+16;
$("#fullbg").css({width:bW2,height:bH2});
var objV=getObjWh("dialog");
var tbT=objV.split("|")[0]+"px";
var tbL=objV.split("|")[1]+"px";
$("#dialog").css({top:tbT,left:tbL});
}
}

//关闭灰色JS遮罩层和操作窗口
function closeBg(){
$("#fullbg").css("display","none");
$("#dialog").css("display","none");
}



$(function (){
	$(".zhaoping ul li .tittle").each(function(index){//each变例，每一个a标签
		$(this).click(function(){//鼠标滑过a的时候
			$(".yincang:eq("+index+")").removeClass("dis")//给对应news的index索引值删除dis样式
			$(".zhaoping ul li .tittle .down").removeClass("dis")//先删除所有的a的样式hover
			$(".zhaoping ul li .tittle .down:eq("+index+")").addClass("dis")//给对应的a添加样式hover
		})
	})
	$(".yincang .up span").each(function(index){//each变例，每一个a标签
		$(this).click(function(){//鼠标滑过a的时候
			$(".yincang:eq("+index+")").addClass("dis")//给news添加样式dis
			$(".zhaoping ul li .tittle .down:eq("+index+")").removeClass("dis")//先删除所有的a的样式hover
		})
	})
})

$(function(){
	$(".nav li:has(div)").hover(function(){
		$(this).children("div").stop(true,true).slideDown(300)
		},function(){
		$(this).children("div").stop(true,true).slideUp(300)
		})
		
})

$(function (){
	$(".nav li").each(function(index){//each变例，每一个a标签
		$(this).mousemove(function(){//鼠标滑过a的时候式
			$(this).addClass("hover")//给对应的a添加样式hover
		})
		$(this).mouseout(function(){//鼠标滑过a的时候式
			$(".nav li").removeClass("hover")//先删除所有的a的样式hover
		})
	})
})