<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
if($is_demo) @include_once(THEMA_PATH.'/assets/demo.php'); // 데모

echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10">'.PHP_EOL; //김미혜: 반응형 viewport 설정

add_stylesheet('<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >',0); //김미혜: css추가 및 경로 설정
$top_message="情爱的客户， 今天紫外线太强了，必须使用防晒霜！ 〉〉〉去看看防晒霜";
?>


<script src="/oz_js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/oz_js/jquery.slides.min.js"></script>
<script src="/oz_js/jquery.als-1.7.min.js"></script>
<script src="/oz_js/jquery.newsticker.js"></script>


<link rel="stylesheet" type="text/css" href="/shop/css/base.css" />
<script type="text/javascript" src="/shop/js/common.js"></script>
<script type="text/javascript" src="/shop/js/quick_links.js"></script>

<?php if($_SERVER['PHP_SELF']=="/index.php"){}else{ ?>
<script src="/oz_js/jquery.min.js"></script><!--list global menu-->
<script src="/oz_js/slider.js"></script><!--list bn01-->
<script type="text/javascript" src="/oz_js/jquery.als-1.7.min.js"></script>
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
                                    <a href="/shop/member_confirm.php" target="_top">信息修改</a> <!--"자료수정"-->
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
                                    <a href="/shop/cscenter.php">客户服务</a><!--"고객센터"-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
                <!------e: top 상단 메뉴-------->
                
                <!--s: logo, 검색창-->
                <div id="oz_header">
                <?php if($_SERVER['PHP_SELF']=="/index.php"){?>
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
                    <? }else{ ?>
                    <!-----------------------헤더 메인이 아닐때----------------->
                    
                    <div class="oz_headerlayout_02"><!--@media 적용-->
                        <div class="oz_headercontent_02">
                            <!--s: logo-->
                            <h1 id="oz_mallLogo_02">
                                <span class="oz_mlogo_02">
                                    <a title="OOZOOBOX.com" href="/"><s></s>OOZOOBOX</a>
                                </span> 
                            </h1>
                            <!--e: logo-->
                            <!--s: 검색창, 배너-->
                            <div class="oz_header_extra_02">
                            	<!--s: 배너-->
                                <div class="oz_header_banner_02">
                                    <img src="/data/banner/25" alt="广告"/>
                                </div>
                                <!--e: 배너-->
                                <!--s:검색창-->
                                <div class="oz_mall_search_02" id="oz_mallSearch_02"><!--@media 적용-->
                                    <ul class="oz_event_query_02">
                                    	<li><a href="/?type=month"><font <?php if($_GET[type]=="month"){?> class="ck_font"<?php }?>>本月推选</font></a></li> <!--"이달의 베스트"-->
                                        <li><a href="/?type=sale"><font <?php if($_GET[type]=="sale"){?> class="ck_font"<?php }?>>优惠专区</font></a></li> <!--"이벤트"-->
                                        <li class="last"><a href="/?type=share"><font <?php if($_GET[type]=="share"){?> class="ck_font"<?php }?>>相互共享</font></a></li>  <!--"커뮤니티"-->
                                    </ul>

                                    <form name="oz_searchTop" class="oz_mallSearch_form oz_clearfix_02" action="#" target="_top" acceptcharset="gbk">
                                        <input type="hidden" name="type" value="<?php echo $_GET[type];?>">
                                        <fieldset>
                                            <legend>天猫搜索</legend> 
                                            <div class="oz_mallSearch_input_02 oz_clearfix_02">
                                                <div class="s-combobox_02">
                                                    <div class="s-combobox-input-wrap_02">
                                                        <input name="q" title="请输入搜索文字" class="s-combobox-input_02" id="mq_02"  role="combobox" accesskey="s" placeholder="请输入搜索文字" value="<?php echo $_GET[q];?>"></input>
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
                    <? } ?>





                <!--e: 로고, 검색창-->
                
<?php if($_SERVER['PHP_SELF']=="/index.php"){}else{ ?>

<div id="oz_glo2">
	<div class="oz_glo2_bg">
    	<div class="oz_glo2_navbg">
            <ul id="nav">
                <li class="on">
                    <a href="/shop/list.php?ca_id=10" class="first glo_1">给宝宝最好的</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=1010" class="glo2_local">尿片</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1020" class="glo2_local">食品</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1030" class="glo2_local">保健食品</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1040" class="glo2_local">童装</a></dd>
                            <dd><a href="/shop/list.php?ca_id=1050" class="glo2_local">母婴用品</a></dd>
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
                    <a href="/shop/list.php?ca_id=20" class="glo_2">白滑牛奶皮</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=2010" class="glo2_local">面膜</a></dd>
                            <dd><a href="/shop/list.php?ca_id=2020" class="glo2_local">化妆水/乳液</a></dd>
                            <dd><a href="/shop/list.php?ca_id=2030" class="glo2_local">精华/护肤霜 </a></dd>
                            <dd><a href="/shop/list.php?ca_id=2040" class="glo2_local">彩妆</a></dd>
                            <dd><a href="/shop/list.php?ca_id=2050" class="glo2_local">套妆</a></dd>
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
                    <a href="/shop/list.php?ca_id=30" class="glo_3">津津有味</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=3010" class="glo2_local">调料</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3020" class="glo2_local">面类</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3030" class="glo2_local">营养</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3040" class="glo2_local">健康</a></dd>
                            <dd><a href="/shop/list.php?ca_id=3050" class="glo2_local">饼干</a></dd>
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
                    <a href="/shop/list.php?ca_id=50" class="glo_4">小生活必备</a>
                    <div class="second">
                    	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=5010" class="glo2_local">女士</a></dd>
                            <dd><a href="/shop/list.php?ca_id=5020" class="glo2_local">厨房</a></dd>
                            <dd><a href="/shop/list.php?ca_id=5030" class="glo2_local">洗澡</a></dd>
                            <dd><a href="/shop/list.php?ca_id=5040" class="glo2_local">其他</a></dd>                            
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
                    <a href="/shop/list.php?ca_id=40" class="glo_5">美丽的穿着</a>
                    <div class="second">
                     	<dl class="second_left">
                        	<dd><a href="/shop/list.php?ca_id=4010" class="glo2_local">女装</a></dd>
                            <dd><a href="/shop/list.php?ca_id=4020" class="glo2_local">男装</a></dd>
                            <dd><a href="/shop/list.php?ca_id=4030" class="glo2_local">儿童</a></dd>
                            <dd><a href="/shop/list.php?ca_id=4040" class="glo2_local">内衣</a></dd>
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
	$('#oz_glo2 #nav li').hover(function(){
		var index = $(this).index();
		$('#oz_glo2 .dot span').stop().animate({
			left:liWidth*index+'px'
		},200);
		$(this).addClass('on').siblings().removeClass('on');
		$(this).find('.second').fadeIn(200);
		$('#oz_glo2, #slide').stop().animate({
			height:'340px'
		},200);
	},function(){
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
    
<?php if($_SERVER['PHP_SELF']=="/index.php" || $_SERVER['PHP_SELF']=="/shop/list.php"){}else{ ?>
<div id="oz_detail_wrap">
	<div class="oz_detail_main">
<? } ?>