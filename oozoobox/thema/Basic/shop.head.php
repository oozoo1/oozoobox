<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
if($is_demo) @include_once(THEMA_PATH.'/assets/demo.php'); // 데모
include_once(THEMA_PATH.'/assets/thema.php');
include_once(THEMA_PATH.'/sidebar.php'); // 사이드바
include_once(G5_LIB_PATH.'/banner.lib.php');//배너
echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10">'.PHP_EOL; //김미혜: 반응형 viewport 설정

add_stylesheet('<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >',0); //김미혜: css추가 및 경로 설정
	
	//주소뒤에 붙는 파리미터.
	$get_sort     = "sort=" .$_GET[sort];							//정렬기준
	$get_sortodr  = "sortodr=" .$_GET[sortodr];						//정렬방법
	$get_l_type   = "l_type=" .$_GET[l_type];						//앨범형,리스트형
	$get_parm_all = $get_sort."&".$get_sortodr."&".$get_l_type;		//종합
?>
<? if($_SERVER['HTTP_HOST']=="localhost"){}else{?>
<script type='text/javascript'>
    (function(m, ei, q, i, a, j, s) {
        m[a] = m[a] || function() {
            (m[a].a = m[a].a || []).push(arguments)
        };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = i;
        s.parentNode.insertBefore(j, s)
    })(window, document, 'script', '//eco-api.meiqia.com/dist/meiqia.js', '_MEIQIA');
    _MEIQIA('entId', 5768);
</script>
<? } ?>


<link rel="stylesheet" type="text/css" href="/shop/css/base.css" />
<script type="text/javascript" src="/shop/js/common.js"></script>
<div class="wrapper <?php echo $at_set['font'];?><?php echo (G5_IS_MOBILE) ? ' mobile-font' : '';?> <?php echo $at_set['layout'];?>">

<?php if($_SERVER['PHP_SELF']=="/index.php"){?>
	<script src="/oz_js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
	<script src="/oz_js/jquery.slides.min.js"></script>
	<script src="/oz_js/jquery.als-1.7.min.js"></script>
	<script src="/oz_js/jquery.newsticker.js"></script>

<?php }else{ ?>
<script src="/oz_js/jquery.min.js"></script><!--list global menu-->
<script src="/oz_js/slider.js"></script><!--list bn01-->
<script type="text/javascript" src="/oz_js/jquery.als-1.7.min.js"></script>
<? } ?>

<?php /*?><?php if($_SERVER['PHP_SELF']=="/index.php"){?>

<style>
@media screen and (-ms-high-contrast:active), all and (-ms-high-contrast:none)
{ #oz_site_nav .oz_sn_container { top: 1px;}
}

@media all and (min-width:1910px)
{#oz_sn_bd { width: 1640px;}
.oz_headerlayout {width: 1640px;}
#oz_mallSearch {width: 900px; margin-right: 40px;}
#oz_mallSearch #mq {width: 799px;}
}
@media all and (max-width:1910px) and (min-width:1261px)
{#oz_site_nav #oz_sn_bd { left: -15px;}
#oz_sn_bd { width: 1200px;}
.oz_headerlayout {width: 1200px;}
#oz_header #oz_mallSearch {width: 500px;}
#oz_header #oz_mallSearch #mq {width: 399px;}
}
@media all and (max-width:1260px)
{#oz_sn_bd { width: 1004px;}
.oz_headerlayout {width: 1004px;}
}
</style>
<?php */?>

<?php /*?><? }else if($_SERVER['PHP_SELF']=="/shop/list.php"){?>

<style>
@media screen and (-ms-high-contrast:active), all and (-ms-high-contrast:none)
{ #oz_site_nav .oz_sn_container { top: 1px;}
}

@media all and (min-width:1910px)
{
#oz_sn_bd { width: 1640px;}
}

@media all and (max-width:1910px) and (min-width:1261px)
{#oz_site_nav #oz_sn_bd { left:-15px;}
#oz_sn_bd { width: 1200px;}
.oz_headerlayout {width: 1200px;}
 #oz_mallSearch {width: 500px;}
#oz_mallSearch #mq {width: 399px;}
}
@media all and (max-width:1260px)
{#oz_sn_bd { width: 1004px;}
.oz_headerlayout {width: 1004px;}
}

@media all and (min-width:1260px)
{ .oz_glo2_navbg {width:1190px; position:relative;}
#oz_glo2 ul li{ width:238px; }
#oz_glo2 ul li a{ width:238px;}
#oz_glo2 ul li a.glo_1{position:absolute; top:0px; left:0;}
#oz_glo2 ul li a.glo_2{position:absolute; top:0px; left:239px;}
#oz_glo2 ul li a.glo_3{position:absolute; top:0px; left:477px;}
#oz_glo2 ul li a.glo_4{position:absolute; top:0px; left:715px;}
#oz_glo2 ul li a.glo_5{position:absolute; top:0px; left:953px;}
#oz_glo2 ul li .second{ width:1190px;}
#oz_glo2 ul li .second .second_left {float:left; width:204px; padding-left:50px;}

#oz_glo2 .dot{ width:1190px;height:8px; line-height:8px; position:absolute; left:0px; top:34px;}
#oz_glo2 .dot ul{width:1190px; height:8px; line-height:8px; position:relative;}
#oz_glo2 .dot ul span{ width:238px; height:8px; background:url('/images/dot.png') no-repeat center center; display:block; position:absolute; left:0; top:0;}

}
@media all and (min-width:1260px)
{ .whatbuy-head {width:830px;}
.whatbuy-head .title {width:800px;}
}
</style><?php */?>


<?php /*?><? }else{?>
<style>
@media screen and (-ms-high-contrast:active), all and (-ms-high-contrast:none)
{ #oz_site_nav .oz_sn_container { top: 1px;}
}

@media all and (min-width:1910px)
{
#oz_sn_bd { width: 1640px;}
}


@media all and (max-width:1910px) and (min-width:1261px)
{#oz_site_nav #oz_sn_bd { left:0;}
#oz_sn_bd { width: 1200px;}
.oz_headerlayout {width: 1004px;}
}
@media all and (max-width:1260px)
{#oz_sn_bd { width: 1004px;}
.oz_headerlayout {width: 1004px;}
}
</style>
<? } ?><?php */?>

	<!--s: top광고--> <!--SW: 광고가 바뀔때마다 인라인 스타일 수정, 이미지 경로 수정 --->   
	<div id="tableDiv"></div>    
    <!-- 
    <div class="oz_top_con" style="height:80px; display:block; position:relative;" id="float_mask">
        <div style="position:absolute; z-index:999999999; width: 60px;margin-top: 25px; right:10%; float:right;">
                <a onClick="closeFootAd()" href="#" title="我知道了"><img src="/images/close.png"></a>
        </div>
        <div style="background: rgb(255, 204, 1); left: 0px; width: 50%; height: 100%; position: absolute;"></div>
        <div style="background: rgb(255, 204, 1); width: 50%; height: 100%; right: 0px; position: absolute;"></div>      
        <img width="990" height="80" style="margin: 0px auto; top: 0px; position: relative; z-index: 10;" src="<? if($baner1[bn_img1]){?>/data/banner/<?=$baner1[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>" alt="广告"/>
        <a style="left: 0px ; top: 0px; width: 100%; height: 100%; display: block; position: absolute; z-index: 100;"  href="/shop/bannerhit.php?bn_id=<?=$baner1['bn_id']?>&url=<?=urlencode($baner1['bn_url'])?>" <? if($baner1[bn_new_win]=="1"){?>target="_blank"<? } ?>> <img width="100%" height="100%" src="/images/s.png"></a>
    -->
    </div>   
<script>
//////////////////////////////////////////////////顶部广告代码
//window.onload = function(){
//	if(getCookie("footad")==0){
//		document.getElementById("float_mask").style.display="none";
//	}else{
//		document.getElementById("float_mask").style.display="block";
//	}
//}

//상단 광고배너를 동적으로 생성 S ==============================
var str = '';
str += '        <!--s: top광고--> <!--SW: 광고가 바뀔때마다 인라인 스타일 수정, 이미지 경로 수정 --->   ';
if(getCookie("footad")==0){
	str += '        <div class="oz_top_con" style="height:80px; display:none; position:relative;" id="float_mask">';
}else{
	str += '        <div class="oz_top_con" style="height:80px; display:block; position:relative;" id="float_mask">';
}
str += '            <div style="position:absolute; z-index:999999999; width: 60px;margin-top: 25px; right:10%; float:right;">';
str += '                    <a onClick="closeFootAd()" href="#" title="我知道了"><img src="/images/close.png"></a>';
str += '            </div>';
str += '            <div style="background: rgb(255, 204, 1); left: 0px; width: 50%; height: 100%; position: absolute;"></div>';
str += '            <div style="background: rgb(255, 204, 1); width: 50%; height: 100%; right: 0px; position: absolute;"></div>      ';
str += '            <img width="990" height="80" style="margin: 0px auto; top: 0px; position: relative; z-index: 10;" src="/data/banner/20160120161127_1.png" alt="广告"/>';
str += '            <a style="left: 0px ; top: 0px; width: 100%; height: 100%; display: block; position: absolute; z-index: 100;"  href="/shop/bannerhit.php?bn_id=1&url=http%3A%2F%2Fwww.oozoobox.com" > <img width="100%" height="100%" src="/images/s.png"></a>';
str += '        </div>';
$("#tableDiv").html(str);
//상단 광고배너를 동적으로 생성 E ==============================
	
//关闭底部广告
function closeFootAd() {
	document.getElementById("float_mask").style.display="none";
	setCookie("footad","0"); 
}
   
//设置cookie 
function setCookie(name,value){ 
    var exp = new Date();  
    exp.setTime(exp.getTime() + 1*60*60*1000);//有效期1小时 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 
//取cookies函数 
function getCookie(name){ 
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)")); 
    if(arr != null) return unescape(arr[2]); return null; 
} 
//////////////////////////////////////////////////顶部广告代码
</script>
<!-------------------------------------------------------------顶固广告样式--------------------------------------------------------------------> 
    <!--e: top광고-->
    
            <!------s: 쇼핑몰 페이지--------><!--SW: 메인 전체를 감싸는 div가 있어야 함-->
								 <iframe runat="server" src="/top.php" width="100%" height="33" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
   
                <!------e: top 상단 메뉴-------->
                
                <!--s: logo, 검색창-->
                <div id="oz_header">
                    <div class="oz_headerlayout"><!--@media 적용-->
                        <div class="oz_headercontent">
                            <!--s: logo-->
                            <h1 id="oz_mallLogo">
                                <span class="oz_mlogo">
                                    <a title="OOZOOBOX.com" href="/"><s></s>OOZOOBOX</a>
                                </span> 
                            </h1>
                            <!--e: logo-->
                            <!--s: 검색창, 배너-->
                            <div class="oz_header_extra">
                            	<!--s: 배너-->
                                <div class="oz_header_banner">
                                    <a href="/shop/bannerhit.php?bn_id=<?=$baner2['bn_id']?>&url=<?=urlencode($baner2['bn_url'])?>" <? if($baner2[bn_new_win]=="1"){?>target="_blank"<? } ?>><img src="<? if($baner2[bn_img1]){?>/data/banner/<?=$baner2[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>" alt="广告"/></a>
                                </div>
                                <!--e: 배너-->
                                <!--s:검색창-->
                                <div class="oz_mall_search" id="oz_mallSearch"><!--@media 적용-->
                                    <ul class="oz_event_query">
                                    	<li><a href="/shop/main_event02.php"><font <?php if($_GET[type]=="month"){?> class="ck_font"<?php }?>>本月推选</font></a></li> <!--"이달의 베스트"-->
                                        <li><a href="/shop/main_event03.php"><font <?php if($_GET[type]=="sale"){?> class="ck_font"<?php }?>>优惠专区</font></a></li> <!--"이벤트"-->
                                        <li class="last"><a href="/shop/main_event04.php"><font <?php if($_GET[type]=="share"){?> class="ck_font"<?php }?>>相互共享</font></a></li>  <!--"커뮤니티"-->
                                    </ul>

                                    <form name="oz_searchTop" class="oz_mallSearch_form oz_clearfix" action="#" target="_top" acceptcharset="gbk">
                                        <input type="hidden" name="type" value="<?php echo $_GET[type];?>">
                                        <fieldset>
                                            <legend>天猫搜索</legend> 
                                            <div class="oz_mallSearch_input oz_clearfix">
                                                <div class="s-combobox">
                                                    <div class="s-combobox-input-wrap">
                                                        <input name="q" title="请输入搜索文字" class="s-combobox-input" id="mq"  role="combobox" accesskey="s" placeholder="请输入搜索文字" value="<?php echo $_GET[q];?>"></input>
                                                    </div>
                                                </div>
                                                <button type="submit">搜索<s></s></button>
                                            </div>
                                    	</fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                <!--e: 로고, 검색창-->
                
<?php if($_SERVER['PHP_SELF']=="/index.php" || $_SERVER['PHP_SELF']=="/write_html.php" || $_SERVER['PHP_SELF']=="/shop/index.php"){}else{ ?>

<div id="oz_glo2">
	<div class="oz_glo2_bg">
    	<div class="oz_glo2_navbg">
            <ul id="nav">
                <li id="on_cho_ko1">
                    <a href="/shop/list.php?ca_id=10&<?php echo $get_parm_all?>" class="first glo_1">给宝宝最好的</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=1010&<?php echo $get_parm_all?>" class="glo2_local">尿片</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1020&<?php echo $get_parm_all?>" class="glo2_local">食品</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1030&<?php echo $get_parm_all?>" class="glo2_local">保健食品</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1040&<?php echo $get_parm_all?>" class="glo2_local">童装</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1050&<?php echo $get_parm_all?>" class="glo2_local">母婴用品</a></dd>
                        </dl>
                        <!--s:GLOBAL2 MD추천상품-->
                        <div class="gol2_md_pro">
                            <div class="whatbuy-head">
                                <div class="title">
									특별상품
                                </div>
                                <div class="img-box"> 
                                    <a href="#">
                                    	<img onerror="if(this.src=='http://pics.auction.co.kr/common/img_error300.gif') return; this.src='http://pics.auction.co.kr/common/img_error130.gif';" style="height:200px; width:260px" alt="MD" src="/images/top_glo_md_01.png"/>
                                    </a> 
                                    <div class="icon-check">
                                    	<img alt="top 글로벌 MD 상품" src="/images/ico_top_glo_md_01.png"/>
                                    </div>
                                </div>
                                <div class="rating-area">
                                    <p class="tit">捞鱼猫新生儿秋冬宝宝棉衣服</p>
                                    <p class="price"><span>¥</span>105.00</p>
                                    <div class="sns-wallpaper">
                                        <span>
                                            <a href="#">
                                            	<img alt="상품상세정보" src="/images/btn_top_glo_md_detail.png"/>
                                            </a>
                                        </span> 
                                        <span>
                                            <a onclick="javascript:favoriteItemOpenSingleRegist(this.parentNode, 'B282487011', '4470', 'http://sell3.auction.co.kr');" href="javascript:void(0);">
                                            	<img alt="관심상품등록" src="/images/btn_top_glo_md_wish.png"/>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="satisfy-area">
                                        <div class="satisfy">
                                        	만족도
                                            <strong>
                                                100
                                                <em>%</em>
                                            </strong>
                                        </div>
                                        <dl class="rating">
                                            <dd>
                                                <span class="list-title">상품평</span>
                                                7건 
                                            </dd>
                                            <dd>
                                                <span class="list-title">상품</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                            <dd>
                                                <span class="list-title">가격</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--e:GLOBAL2 MD추천상품-->         
                    </div>
                </li>
                <li id="on_cho_ko2">
                    <a href="/shop/list.php?ca_id=20&<?php echo $get_parm_all?>" class="glo_2">白滑牛奶皮</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=2010&<?php echo $get_parm_all?>" class="glo2_local">面膜</a></dd>
                            <dd><a href="/shop/list.php?ca_id=2020&<?php echo $get_parm_all?>" class="glo2_local">化妆水/乳液</a></dd>
                            <dd><a href="/shop/list.php?ca_id=2030&<?php echo $get_parm_all?>" class="glo2_local">精华/护肤霜 </a></dd>
                            <dd><a href="/shop/list.php?ca_id=2040&<?php echo $get_parm_all?>" class="glo2_local">彩妆</a></dd>
                            <dd><a href="/shop/list.php?ca_id=2050&<?php echo $get_parm_all?>" class="glo2_local">套妆</a></dd>
                        </dl> 
                        <!--s:GLOBAL2 MD추천상품-->
                        <div class="gol2_md_pro">
                            <div class="whatbuy-head">
                                <div class="title">
									특별상품
                                </div>
                                <div class="img-box"> 
                                    <a href="#">
                                    	<img onerror="if(this.src=='http://pics.auction.co.kr/common/img_error300.gif') return; this.src='http://pics.auction.co.kr/common/img_error130.gif';" style="height:200px; width:260px" alt="MD" src="/images/top_glo_md_02.png"/>
                                    </a> 
                                    <div class="icon-check">
                                    	<img alt="top 글로벌 MD 상품" src="/images/ico_top_glo_md_01.png"/>
                                    </div>
                                </div>
                                <div class="rating-area">
                                    <p class="tit">捞鱼猫新生儿秋冬宝宝棉衣服</p>
                                    <p class="price"><span>¥</span>105.00</p>
                                    <div class="sns-wallpaper">
                                        <span>
                                            <a href="#">
                                            	<img alt="상품상세정보" src="/images/btn_top_glo_md_detail.png"/>
                                            </a>
                                        </span> 
                                        <span>
                                            <a onclick="javascript:favoriteItemOpenSingleRegist(this.parentNode, 'B282487011', '4470', 'http://sell3.auction.co.kr');" href="javascript:void(0);">
                                            	<img alt="관심상품등록" src="/images/btn_top_glo_md_wish.png"/>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="satisfy-area">
                                        <div class="satisfy">
                                        	만족도
                                            <strong>
                                                100
                                                <em>%</em>
                                            </strong>
                                        </div>
                                        <dl class="rating">
                                            <dd>
                                                <span class="list-title">상품평</span>
                                                7건 
                                            </dd>
                                            <dd>
                                                <span class="list-title">상품</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                            <dd>
                                                <span class="list-title">가격</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--e:GLOBAL2 MD추천상품-->                                               
                    </div>
                </li>
                <li id="on_cho_ko3">
                    <a href="/shop/list.php?ca_id=30&<?php echo $get_parm_all?>" class="glo_3">津津有味</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=3010&<?php echo $get_parm_all?>" class="glo2_local">调料</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3020&<?php echo $get_parm_all?>" class="glo2_local">面类</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3030&<?php echo $get_parm_all?>" class="glo2_local">营养</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3040&<?php echo $get_parm_all?>" class="glo2_local">健康</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3050&<?php echo $get_parm_all?>" class="glo2_local">饼干</a></dd>
                        </dl>
<!--s:GLOBAL2 MD추천상품-->
                        <div class="gol2_md_pro">
                            <div class="whatbuy-head">
                                <div class="title">
									특별상품
                                </div>
                                <div class="img-box"> 
                                    <a href="#">
                                    	<img onerror="if(this.src=='http://pics.auction.co.kr/common/img_error300.gif') return; this.src='http://pics.auction.co.kr/common/img_error130.gif';" style="height:200px; width:260px" alt="MD" src="/images/top_glo_md_03.png"/>
                                    </a> 
                                    <div class="icon-check">
                                    	<img alt="top 글로벌 MD 상품" src="/images/ico_top_glo_md_01.png"/>
                                    </div>
                                </div>
                                <div class="rating-area">
                                    <p class="tit">捞鱼猫新生儿秋冬宝宝棉衣服</p>
                                    <p class="price"><span>¥</span>105.00</p>
                                    <div class="sns-wallpaper">
                                        <span>
                                            <a href="#">
                                            	<img alt="상품상세정보" src="/images/btn_top_glo_md_detail.png"/>
                                            </a>
                                        </span> 
                                        <span>
                                            <a onclick="javascript:favoriteItemOpenSingleRegist(this.parentNode, 'B282487011', '4470', 'http://sell3.auction.co.kr');" href="javascript:void(0);">
                                            	<img alt="관심상품등록" src="/images/btn_top_glo_md_wish.png"/>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="satisfy-area">
                                        <div class="satisfy">
                                        	만족도
                                            <strong>
                                                100
                                                <em>%</em>
                                            </strong>
                                        </div>
                                        <dl class="rating">
                                            <dd>
                                                <span class="list-title">상품평</span>
                                                7건 
                                            </dd>
                                            <dd>
                                                <span class="list-title">상품</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                            <dd>
                                                <span class="list-title">가격</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--e:GLOBAL2 MD추천상품-->                                                                              
                    </div>
                </li>
                <li id="on_cho_ko4">
                    <a href="/shop/list.php?ca_id=50&<?php echo $get_parm_all?>" class="glo_4">小生活必备</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=5010&<?php echo $get_parm_all?>" class="glo2_local">女士</a></dd>
                            <dd><a href="/shop/list.php?ca_id=5020&<?php echo $get_parm_all?>" class="glo2_local">厨房</a></dd>
                            <dd><a href="/shop/list.php?ca_id=5030&<?php echo $get_parm_all?>" class="glo2_local">洗澡</a></dd>
                            <dd><a href="/shop/list.php?ca_id=5040&<?php echo $get_parm_all?>" class="glo2_local">其他</a></dd>                            
                        </dl>
<!--s:GLOBAL2 MD추천상품-->
                        <div class="gol2_md_pro">
                            <div class="whatbuy-head">
                                <div class="title">
									특별상품
                                </div>
                                <div class="img-box"> 
                                    <a href="#">
                                    	<img onerror="if(this.src=='http://pics.auction.co.kr/common/img_error300.gif') return; this.src='http://pics.auction.co.kr/common/img_error130.gif';" style="height:200px; width:260px" alt="MD" src="/images/top_glo_md_04.png"/>
                                    </a> 
                                    <div class="icon-check">
                                    	<img alt="top 글로벌 MD 상품" src="/images/ico_top_glo_md_01.png"/>
                                    </div>
                                </div>
                                <div class="rating-area">
                                    <p class="tit">捞鱼猫新生儿秋冬宝宝棉衣服</p>
                                    <p class="price"><span>¥</span>105.00</p>
                                    <div class="sns-wallpaper">
                                        <span>
                                            <a href="#">
                                            	<img alt="상품상세정보" src="/images/btn_top_glo_md_detail.png"/>
                                            </a>
                                        </span> 
                                        <span>
                                            <a onclick="javascript:favoriteItemOpenSingleRegist(this.parentNode, 'B282487011', '4470', 'http://sell3.auction.co.kr');" href="javascript:void(0);">
                                            	<img alt="관심상품등록" src="/images/btn_top_glo_md_wish.png"/>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="satisfy-area">
                                        <div class="satisfy">
                                        	만족도
                                            <strong>
                                                100
                                                <em>%</em>
                                            </strong>
                                        </div>
                                        <dl class="rating">
                                            <dd>
                                                <span class="list-title">상품평</span>
                                                7건 
                                            </dd>
                                            <dd>
                                                <span class="list-title">상품</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                            <dd>
                                                <span class="list-title">가격</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--e:GLOBAL2 MD추천상품-->                                                      
                    </div>
                </li>
                <li id="on_cho_ko5">
                    <a href="/shop/list.php?ca_id=40&<?php echo $get_parm_all?>" class="glo_5">美丽的穿着</a>
                    <div class="second">
                     	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=4010&<?php echo $get_parm_all?>" class="glo2_local">女装</a></dd>
                            <dd><a href="/shop/list.php?ca_id=4020&<?php echo $get_parm_all?>" class="glo2_local">男装</a></dd>
                            <dd><a href="/shop/list.php?ca_id=4030&<?php echo $get_parm_all?>" class="glo2_local">儿童</a></dd>
                            <dd><a href="/shop/list.php?ca_id=4040&<?php echo $get_parm_all?>" class="glo2_local">内衣</a></dd>
                        </dl> 
<!--s:GLOBAL2 MD추천상품-->
                        <div class="gol2_md_pro">
                            <div class="whatbuy-head">
                                <div class="title">
									특별상품
                                </div>
                                <div class="img-box"> 
                                    <a href="#">
                                    	<img onerror="if(this.src=='http://pics.auction.co.kr/common/img_error300.gif') return; this.src='http://pics.auction.co.kr/common/img_error130.gif';" style="height:200px; width:260px" alt="MD" src="/images/top_glo_md_05.png"/>
                                    </a> 
                                    <div class="icon-check">
                                    	<img alt="top 글로벌 MD 상품" src="/images/ico_top_glo_md_01.png"/>
                                    </div>
                                </div>
                                <div class="rating-area">
                                    <p class="tit">捞鱼猫新生儿秋冬宝宝棉衣服</p>
                                    <p class="price"><span>¥</span>105.00</p>
                                    <div class="sns-wallpaper">
                                        <span>
                                            <a href="#">
                                            	<img alt="상품상세정보" src="/images/btn_top_glo_md_detail.png"/>
                                            </a>
                                        </span> 
                                        <span>
                                            <a onclick="javascript:favoriteItemOpenSingleRegist(this.parentNode, 'B282487011', '4470', 'http://sell3.auction.co.kr');" href="javascript:void(0);">
                                            	<img alt="관심상품등록" src="/images/btn_top_glo_md_wish.png"/>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="satisfy-area">
                                        <div class="satisfy">
                                        	만족도
                                            <strong>
                                                100
                                                <em>%</em>
                                            </strong>
                                        </div>
                                        <dl class="rating">
                                            <dd>
                                                <span class="list-title">상품평</span>
                                                7건 
                                            </dd>
                                            <dd>
                                                <span class="list-title">상품</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                            <dd>
                                                <span class="list-title">가격</span>
                                                <span class="star-rating">
                                                	<span style="width: 100%">100%</span>
                                                </span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--e:GLOBAL2 MD추천상품-->                                                    
                    </div>
                </li>                                   
            </ul>
    		<div class="dot"><ul><span></span></ul></div>           
        </div>
    </div>

    <div id="slide"></div>
</div>

    
    
<script>
$(function(){
	var liWidth = $('#oz_glo2 #nav li').width();
	var secondWidth = $('#oz_glo2 #nav .second').width();


	var ca_idNo = <?php if($ca_id){
							echo $ca_id;
						}else{
							echo "10";
						}
					?>;
						
	if(ca_idNo > 999){
		//2뎁스 메뉴로 내려갈시 ca_id가 4자리임.(2010 || 2020 || 3010)
		ca_idNo = Math.floor(ca_idNo / 1000);
	}else{
		//1뎁스 메뉴일경우 ca_id가 2자리임.(10 || 20 || 30)
		ca_idNo = Math.floor(ca_idNo / 10);
	}

	//메뉴순서가 변경되어 있음 (10 || 20 || 30 || 50 || 40)
	if(ca_idNo == 4){
		ca_idNo = 5;
	}else if(ca_idNo == 5){
		ca_idNo = 4;
	}
	
	//탑메뉴 초기 선택 S ================================================================
	//메뉴선택 표시 설정 
	$(eval("on_cho_ko"+ca_idNo)).addClass('on');
	
	//하단 삼각형 백그라운드 left위치 설정 
	$('#oz_glo2 .dot span').stop().animate({
		left:liWidth*(ca_idNo-1)+'px'
	},200);
	//탑메뉴 초기 선택 E ================================================================
	
	$('#oz_glo2 #nav li').hover(
		function(){
			//마우스 오버시
			var index = $(this).index();
			$('#oz_glo2 .dot span').stop().animate({
				left:liWidth*index+'px'
			},200);
			$(this).addClass('on').siblings().removeClass('on');
			$(this).find('.second').fadeIn(200);
			$('#oz_glo2, #slide').stop().animate({
				height:'340px'
			},200);
		},
		function(){
			//마우스 아웃시
			$(this).find('.second').fadeOut(200);
			$('#oz_glo2, #slide').stop().animate({
				height:'43px'
			},200);
		});
	});
</script>


<? } ?>      

 
            </div> 
            <!-----------e: HEADER-------------->    
        </div>
            <!------e: 쇼핑몰 페이지-------->
    
<?php if($_SERVER['PHP_SELF']=="/index.php" || $_SERVER['PHP_SELF']=="/write_html.php" || $_SERVER['PHP_SELF']=="/shop/index.php" || $_SERVER['PHP_SELF']=="/shop/list.php" || $_SERVER['PHP_SELF']=="/bbs/login.php"){}else{ ?>
<div id="oz_detail_wrap">
	<div class="oz_detail_main">
<? } ?>