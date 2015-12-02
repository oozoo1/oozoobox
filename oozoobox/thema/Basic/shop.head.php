<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
if($is_demo) @include_once(THEMA_PATH.'/assets/demo.php'); // 데모
include_once(THEMA_PATH.'/assets/thema.php');
include_once(THEMA_PATH.'/sidebar.php'); // 사이드바

echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10">'.PHP_EOL; //김미혜: 반응형 viewport 설정

add_stylesheet('<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >',0); //김미혜: css추가 및 경로 설정
$top_message="情爱的客户， 今天紫外线太强了，必须使用防晒霜！ 〉〉〉去看看防晒霜";
?>


<script src="/oz_js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/oz_js/jquery.slides.min.js"></script>
<script type="text/javascript" src="/oz_js/jquery.als-1.7.min.js"></script>

<?php if($_SERVER['PHP_SELF']=="/index.php"){}else{ ?>
<script src="/oz_js/jquery.min.js"></script>
<? } ?>

<div class="wrapper <?php echo $at_set['font'];?><?php echo (G5_IS_MOBILE) ? ' mobile-font' : '';?> <?php echo $at_set['layout'];?>">


	<!--s: top광고--> <!--SW: 광고가 바뀔때마다 인라인 스타일 수정, 이미지 경로 수정 --->
    <div class="oz_top_con" style="height:90px; display:block; position:relative;">
	    <div style="background: rgb(255, 204, 1); left: 0px; width: 50%; height: 100%; position: absolute;"></div>
	    <div style="background: rgb(255, 204, 1); width: 50%; height: 100%; right: 0px; position: absolute;"></div>
	    <img width="990" height="90" style="margin: 0px auto; top: 0px; position: relative; z-index: 10;" src="/data/banner/1" alt="广告"/>
	    <a style="left: 0px ; top: 0px; width: 100%; height: 100%; display: block; position: absolute; z-index: 100;"  href="#"> <img width="100%" height="100%" src="/images/s.png"></a>
    </div>
    <!--e: top광고-->
    
            <!------s: 쇼핑몰 페이지--------><!--SW: 메인 전체를 감싸는 div가 있어야 함-->
            <div id="oz_mallpage">
                <!------s: top 상단 메뉴-------->
                <div id="oz_site_nav" role="navigation">
                    <div id="oz_sn_bd"> <!----- @media  있음------>
                        <div class="oz_sn_container">
                            <p class="oz_sn_prm_info">
                            	<em><a href="#"><?php echo "$top_message";?></a></em> <!--"고객님, 오늘은 자외선이 강하네요. 외출할때 반드시 썬크림을 사용하세요>>>썬크림보러가기"  SW: php가 필요할지도.. -->
                            </p>
                            <ul class="oz_sn_quick_menu">
                            <?php if($member[mb_id]){?>
                                <?php if($member['admin']) {?>
                                <li>
                                    <a href="<?php echo G5_ADMIN_URL;?>" target="_top">관리자+</a> <!--"관리자페이지"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <?php } ?>
                                <?php if($member['partner']) { ?>
                                <li>
                                    <a href="/shop/partner/" target="_top">마이샵</a> <!--"마이샵관리페이지"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <?php }else{ ?>
                                <li>
                                    <a href="/shop/partner/register.php" target="_top">입점신청</a> <!--"입점신청"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <?php } ?>
                                <li>
                                    <a href="#" target="_top">信息修改</a> <!--"자료수정"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_join">
                                    <a href="<?php echo $at_href['logout'];?>" target="_top" rel="nofollow">退出登录</a><!--"로그아웃"-->
                                </li>
                            <?php }else{ ?>
                                <li>
                                    <a href="/shop/partner/login.php" target="_top">입점자로그인</a> <!--"로그인하세요"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li>
                                    <a href="/bbs/login.php" target="_top">请登录</a> <!--"로그인하세요"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_join">
                                    <a href="/bbs/register.php" target="_top" rel="nofollow">免费注册</a><!--"회원가입하기"-->
                                </li>
                            <?php } ?>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="sn-cart">
                                    <a href="/shop/cart.php" target="_top" rel="nofollow">购物车</a> <!--"장바구니"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_myshopping">
                                    <a href="/shop/orderinquiry.php" target="_top">我的购物信息 </a><!--"내 쇼핑 정보"-->
                                    <!--SW: display:none 으로 되어 있는데 아마도 판매자로 로그인 하면 display:block으로 되지 않을까??-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->                        
                                <li class="oz_sn_delivery ">
                                    <a href="/shop/orderinquiry.php" target="_top">订单跟踪 </a><!--"배송정보"--> 
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_customcenter">
                                    <a href="#">客户服务</a><!--"고객센터"-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
                <!------e: top 상단 메뉴-------->
                
                <!--s: logo, 검색창-->
                <div id="oz_header">
                    <div class="oz_headerlayout"><!--@media 적용-->
                        <div class="oz_headercontent">
                            <!--s: logo-->
                            <h1 id="oz_mallLogo">
                                <span class="oz_mlogo">
                                    <a title="OOZOOBOX.com" href="#"><s></s>OOZOOBOX</a>
                                </span> 
                            </h1>
                            <!--e: logo-->
                            <!--s: 검색창, 배너-->
                            <div class="oz_header_extra">
                            	<!--s: 배너-->
                                <div class="oz_header_banner">
                                    <img src="/data/banner/25" alt="广告"/>
                                </div>
                                <!--e: 배너-->
                                <!--s:검색창-->
                                <div class="oz_mall_search" id="oz_mallSearch"><!--@media 적용-->
                                    <ul class="oz_event_query">
                                    	<li><a href="/?type=month"><font <?php if($_GET[type]=="month"){?> class="ck_font"<?php }?>>本月推选</font></a></li> <!--"이달의 베스트"-->
                                        <li><a href="/?type=sale"><font <?php if($_GET[type]=="sale"){?> class="ck_font"<?php }?>>优惠专区</font></a></li> <!--"이벤트"-->
                                        <li class="last"><a href="/?type=share"><font <?php if($_GET[type]=="share"){?> class="ck_font"<?php }?>>相互共享</font></a></li>  <!--"커뮤니티"-->
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
                
<?php if($_SERVER['PHP_SELF']=="/index.php"){}else{ ?>

<div id="oz_glo2">
	<div class="oz_glo2_bg">
    	<div class="oz_glo2_navbg">
            <ul id="nav">
                <li class="on">
                    <a href="#" class="first glo_1">给宝宝最好的</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="#" class="glo2_local">尿片</a></dd>
                            <dd><a href="#" class="glo2_local">食品</a></dd>
                            <dd><a href="#" class="glo2_local">保健食品</a></dd>
                            <dd><a href="#" class="glo2_local">童装</a></dd>
                            <dd><a href="#" class="glo2_local">母婴用品</a></dd>
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
                <li>
                    <a href="#" class="glo_2">白滑牛奶皮</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="#" class="glo2_local">面膜</a></dd>
                            <dd><a href="#" class="glo2_local">化妆水/乳液</a></dd>
                            <dd><a href="#" class="glo2_local">精华/护肤霜 </a></dd>
                            <dd><a href="#" class="glo2_local">彩妆</a></dd>
                            <dd><a href="#" class="glo2_local">套妆</a></dd>
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
                <li>
                    <a href="#" class="glo_3">津津有味</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="#" class="glo2_local">调料</a></dd>
                            <dd><a href="#" class="glo2_local">面类</a></dd>
                            <dd><a href="#" class="glo2_local">营养</a></dd>
                            <dd><a href="#" class="glo2_local">健康</a></dd>
                            <dd><a href="#" class="glo2_local">饼干</a></dd>
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
                <li>
                    <a href="#" class="glo_4">小生活必备</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="#" class="glo2_local">女士</a></dd>
                            <dd><a href="#" class="glo2_local">厨房</a></dd>
                            <dd><a href="#" class="glo2_local">洗澡</a></dd>
                            <dd><a href="#" class="glo2_local">其他</a></dd>                            
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
                <li>
                    <a href="#" class="glo_5">美丽的穿着</a>
                    <div class="second">
                     	<dl class="second_left">
                        	<dd><a href="#" class="glo2_local">女装</a></dd>
                            <dd><a href="#" class="glo2_local">男装</a></dd>
                            <dd><a href="#" class="glo2_local">儿童</a></dd>
                            <dd><a href="#" class="glo2_local">内衣</a></dd>
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
	var secondWidth = $('#oz_glo2 #nav2 .second').width();	
	$('#oz_glo2 #nav li').hover(function(){
		var index = $(this).index();
		$('#oz_glo2 .dot span').stop().animate({
			left:liWidth*index+'px'
		},200);
		$(this).addClass('on').siblings().removeClass('on');
		$(this).find('.second').fadeIn(100);
		$('#oz_glo2 #slide').stop().animate({
			height:'340px'
		},200);
	},function(){
		$(this).find('.second').fadeOut(200);
		$('#oz_glo2 #slide').stop().animate({
			height:'0'
		},400);
	});
});
</script>


<? } ?>      

 
            </div> 
            <!-----------e: HEADER-------------->    
        </div>
            <!------e: 쇼핑몰 페이지-------->
    
    
    
 
 
 
 
 
 
 
    
 	<!-- LNB -->   
	<?php /*?><aside>
		<div class="<?php echo $at_set['lnb'];?> at-lnb">
			<div class="container">
				<nav class="at-lnb-icon hidden-xs">
					<ul class="menu">
						<li>
							<a href="javascript://" onclick="this.style.behavior = 'url(#default#homepage)'; this.setHomePage('<?php echo $at_href['home'];?>');" class="at-tip" data-original-title="<nobr>시작페이지</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true">
								<i class="fa fa-bug fa-lg"></i><span class="sound_only">시작페이지</span>
							</a>
						</li>
						<li>
							<a href="javascript://" onclick="window.external.AddFavorite(parent.location.href,document.title);" class="at-tip" data-original-title="<nobr>북마크</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true">
								<i class="fa fa-bookmark-o fa-lg"></i><span class="sound_only">북마크</span>
							</a>
						</li>
						<li>
							<a href="<?php echo $at_href['rss'];?>" target="_blank" data-original-title="<nobr>RSS 구독</nobr>" class="at-tip" data-toggle="tooltip" data-placement="bottom" data-html="true">
								<i class="fa fa-rss fa-lg"></i><span class="sound_only">RSS 구독</span>
							</a>
						</li>
					</ul>
				</nav>

				<nav class="at-lnb-menu">
					<ul class="menu">
						<?php if($is_member) { ?>
                            <?php if($member['partner']) { ?>
                            <li><a href="/shop/partner/"><i class="fa fa-cog"></i>마이샵</a></li>
                            <?php }else{ ?>
                            <li><a href="/shop/partner/register.php"><i class="fa fa-power-off"></i>입점가입</a></li>
                            <?php } ?>
                            
							<li class="asideButton cursor"><a><i class="fa fa-user"></i><?php echo $member['mb_nick'];?></a></li>
							<?php if($member['response']) { ?>
								<li>
									<a href="<?php echo $at_href['response'];?>" target="_blank" class="win_memo">
										<i class="fa fa-retweet"></i>반응 <span class="count red"><?php echo number_format($member['response']);?></span>
									</a>
								</li>
							<?php } ?>
							<?php if($member['memo']) { ?>
								<li>
									<a href="<?php echo $at_href['memo'];?>" target="_blank" class="win_memo">
										<i class="fa fa-envelope-o"></i>쪽지 <span class="count blue"><?php echo number_format($member['memo']);?></span>
									</a>
								</li>
							<?php } ?>
							<?php if($member['admin']) {?>
								<li><a href="<?php echo G5_ADMIN_URL;?>"><i class="fa fa-cog"></i>관리</a></li>
							<?php } ?>
							<li>
								<a href="<?php echo $at_href['logout'];?>">
									<i class="fa fa-power-off"></i><span class="hidden-xs">로그아웃</span>
								</a>
							</li>
						<?php } else { ?>
                            <?php if($member['partner']) { ?>
                            <li><a href="/shop/partner/"><i class="fa fa-cog"></i>마이샵</a></li>
                            <?php }else{ ?>
                            <li><a href="/shop/partner/login.php"><i class="fa fa-power-off"></i>입점자로그인</a></li>
                            <?php } ?>
							<li  class="asideButton cursor"><a><i class="fa fa-power-off"></i>会员登录</a></li>
							<li><a href="<?php echo $at_href['reg'];?>"><i class="fa fa-sign-in"></i><span class="hidden-xs">会员</span>注册</a></li>
							<li><a href="<?php echo $at_href['lost'];?>" class="win_password_lost"><i class="fa fa-search"></i>找回密码</a></li>
						<?php } ?>
						<li class="hidden-xs"><a href="<?php echo $at_href['connect'];?>"><i class="fa fa-comments" title="현재 접속자"></i><?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb'] > 0) ? '(<span class="count orangered">'.number_format($stats['now_mb']).'</span>)' : ''; ?></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</aside><?php */?>




<?php /*?>	<header>
		<!-- Logo -->
		<div class="at-header">
			<div class="container">
				<?php // 로고 및 검색창 위치는 아래 padding-left 값으로 조정하시면 됩니다. ?>
				<div class="header-container" style="padding-left:27%;">
					<div class="header-logo text-center pull-left">
						<a href="<?php echo $at_href['home'];?>">
							OOZOOBOX
						</a>
						<div class="header-desc">
							세상을 바꾸는 작은힘 - 아미나
						</div>
					</div>

					<div class="header-search pull-left">
						<form name="tsearch" method="get" onsubmit="return tsearch_submit(this);" role="form" class="form">
						<input type="hidden" name="url"	value="<?php echo $at_href['isearch'];?>">
							<div class="input-group input-group-sm">
								<input type="text" name="stx" class="form-control input-sm" value="<?php echo $stx;?>">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-black"><i class="fa fa-search fa-lg"></i></button>
								</span>
							</div>
						</form>
						<?php echo apms_widget('basic-item-newsticker', 'shop-newsticker', 'interval=4000 new=red icon={아이콘:heart}'); // 뉴스티커 ?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="navbar <?php echo $at_set['menu'];?> at-navbar" role="navigation">

			<div class="text-center navbar-toggle-box">
				<button type="button" class="navbar-toggle btn btn-dark pull-left" data-toggle="collapse" data-target=".navbar-collapse">
					<i class="fa fa-bars"></i> <span class="font-12">MENU</span>
				</button>

				<div class="pull-right">
					<?php if(IS_YC) { // 영카트 이용시 ?>
						<a href="<?php echo $at_href['change'];?>" class="btn btn-dark">
							<?php if(IS_SHOP) { // 쇼핑몰일 때 ?>
								<i class="fa fa-users"></i>
								<span class="font-12">BBS</span>
							<?php } else { // 커뮤니티일 때 ?>
								<i class="fa fa-shopping-cart"></i>
								<span class="font-12">SHOP</span>
							<?php } ?>
						</a>
					<?php } ?>	
					<button type="button" class="navbar-toggle btn btn-dark asideButton">
						<i class="fa fa-outdent"></i>
					</button>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="container">
				<!-- Right Menu -->
				<div class="hidden-xs pull-right navbar-menu-right">
					<?php if(IS_YC) { // 영카트 이용시 ?>
						<a href="<?php echo $at_href['change'];?>" class="btn btn-dark">
							<?php if(IS_SHOP) { // 쇼핑몰일 때 ?>
								<i class="fa fa-users"></i>
								<span class="font-12">BBS</span>
							<?php } else { // 커뮤니티일 때 ?>
								<i class="fa fa-shopping-cart"></i>
								<span class="font-12">SHOP</span>
							<?php } ?>
						</a>
					<?php } ?>	
					<button type="button" class="btn btn-dark asideButton">
						<i class="fa fa-outdent"></i>
					</button>
				</div>
				<!-- Left Menu -->
				<div class="navbar-collapse collapse">
					<h4 class="visible-xs en lightgray" style="margin:0px; padding:10px 15px; line-height:30px;">
						<span class="cursor" data-toggle="collapse" data-target=".navbar-collapse">
							<i class="fa fa-arrow-circle-left fa-lg"></i> Close
						</span>
					</h4>
					<ul class="nav navbar-nav">
						<li<?php echo ($is_index) ? ' class="active"' : '';?>>
							<a href="<?php echo $at_href['main'];?>">메인</a>
						</li>
						<?php for ($i=1; $i < count($menu); $i++) { //메뉴출력 - 1번부터 출력?>
							<?php if($menu[$i]['is_sub']) { //서브메뉴가 있을 때 ?>
								<li class="dropdown<?php echo ($menu[$i]['on'] == "on") ? ' active' : '';?>">
									<a href="<?php echo $menu[$i]['href'];?>" class="dropdown-toggle" <?php echo(G5_IS_MOBILE) ? 'data-toggle="dropdown"' : 'data-hover="dropdown"';?> data-close-others="true"<?php echo $menu[$i]['target'];?>>
										<?php echo $menu[$i]['name'];?><i class="fa fa-circle <?php echo $menu[$i]['new'];?>"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-head<?php echo $pc_menu;?>">
										<ul class="pull-left">
										<?php 
											$smw1 = 1; //나눔 체크
											for($j=0; $j < count($menu[$i]['sub']); $j++) { 
										?>
											<?php if($menu[$i]['sub'][$j]['sp']) { //나눔 ?>
												</ul>
												<ul class="pull-left">
											<?php $smw1++; } // 나눔 카운트 ?>
											<?php if($menu[$i]['sub'][$j]['line']) { //구분라인 ?>
												<li class="line"><a><?php echo $menu[$i]['sub'][$j]['line'];?></a></li>
											<?php } ?>
											<?php if(!G5_IS_MOBILE && $menu[$i]['sub'][$j]['is_sub']) { //모바일이 아니고 서브메뉴가 있을 때 ?>
												<li class="dropdown-submenu<?php echo ($menu[$i]['sub'][$j]['on'] == "on") ? ' sub-on' : ' sub-off';?>">
													<a tabindex="-1" href="<?php echo $menu[$i]['sub'][$j]['href'];?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
														<?php echo $menu[$i]['sub'][$j]['name'];?><i class="fa fa-circle sub-<?php echo $menu[$i]['sub'][$j]['new'];?>"></i>
														<i class="fa fa-caret-right sub-caret pull-right"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-sub hidden-xs<?php echo $pc_menu;?>">
														<ul class="pull-left">
														<?php 
															$smw2 = 1; //나눔 체크
															for($k=0; $k < count($menu[$i]['sub'][$j]['sub']); $k++) { 
														?>
															<?php if($menu[$i]['sub'][$j]['sub'][$k]['sp']) { //나눔 ?>
																</ul>
																<ul class="pull-left">
															<?php $smw2++; } // 나눔 카운트 ?>
															<?php if($menu[$i]['sub'][$j]['sub'][$k]['line']) { //구분라인 ?>
																<li class="line-sub"><a><?php echo $menu[$i]['sub'][$j]['sub'][$k]['line'];?></a></li>
															<?php } ?>
															<li class="<?php echo ($menu[$i]['sub'][$j]['sub'][$k]['on'] == "on") ? 'sub-on' : 'sub-off';?>">
																<a tabindex="-1" href="<?php echo $menu[$i]['sub'][$j]['sub'][$k]['href'];?>"<?php echo $menu[$i]['sub'][$j]['sub'][$k]['target'];?>><?php echo $menu[$i]['sub'][$j]['sub'][$k]['name'];?></a>
															</li>
														<?php } ?>
														</ul>
														<?php $smw2 = ($smw2 > 1) ? 200 * $smw2 : 0; //서브메뉴 너비 ?>
														<div class="clearfix hidden-xs"<?php echo ($smw2) ? ' style="width:'.$smw2.'px;"' : '';?>></div>
													</div>
												</li>
											<?php } else { //서브메뉴가 없을 때 ?>
												<li class="<?php echo ($menu[$i]['sub'][$j]['on'] == "on") ? 'sub-on' : 'sub-off';?>">
													<a href="<?php echo $menu[$i]['sub'][$j]['href'];?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
														<?php echo $menu[$i]['sub'][$j]['name'];?><i class="fa fa-circle <?php echo $menu[$i]['sub'][$j]['new'];?>"></i>
													</a>
												</li>
											<?php } ?>
										<?php } ?>
										</ul>
										<?php $smw1 = ($smw1 > 1) ? 200 * $smw1 : 0; //서브메뉴 너비 ?>
										<div class="clearfix hidden-xs"<?php echo ($smw1) ? ' style="width:'.$smw1.'px;"' : '';?>></div>
									</div>
								</li>
							<?php } else { //서브메뉴가 없을 때 ?>
								<li<?php echo ($menu[$i]['on'] == "on") ? ' class="active"' : '';?>>
									<a href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?>>
										<?php echo $menu[$i]['name'];?><i class="fa fa-circle <?php echo $menu[$i]['new'];?>"></i>
									</a>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="navbar-menu-bar"></div>
		</div>
		<div class="clearfix"></div>
	</header><?php */?>
    
    
    
    
    

	<?php if($page_title) { // 페이지 타이틀 ?>
		<div class="page-title">
			<div class="container">
				<h2><?php echo ($bo_table) ? '<a href="'.G5_BBS_URL.'/board.php?bo_table='.$bo_table.'"><span>'.$page_title.'</span></a>' : $page_title;?></h2>
				<?php if($page_desc) { // 페이지 설명글 ?>
					<ol class="breadcrumb hidden-xs">
						<li class="active"><?php echo $page_desc;?></li>
					</ol>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

	<?php if($col_name) { ?>
		<div class="at-content">
			<div class="container">
			<?php if($col_name == "two") { ?>
				<div class="row">
					<div class="col-md-<?php echo $col_content;?><?php echo ($at_set['side']) ? ' pull-right' : '';?> contentArea">		
			<?php } ?>
	<?php } ?>
