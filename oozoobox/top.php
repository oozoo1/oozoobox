<?php
include_once('./_common.php');
$t_day     =date('Y-m-d');

$sqltoday = " select a.*
				from todaytext a
				   , todaytext_ct b
			   where a.t_ct = b.id
				 and b.ct_date = '$t_day' LIMIT 0 , 1";
$todaytext = sql_query($sqltoday);
$today=sql_fetch_array($todaytext);

if($today[id]){
	$top_message="$today[t_content]";
	$today_link="$today[t_link]";
}else{
	$top_message="情爱的客户， 今天紫外线太强了，必须使用防晒霜！ 〉〉〉去看看防晒霜";
	$today_link="/shop/list.php?ca_id=10";
}

?>
						<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >
            <div id="oz_mallpage">
                <!------s: top 상단 메뉴-------->
                <div id="oz_site_nav" role="navigation">
                    <div id="oz_sn_bd"> <!----- @media  있음------>
                        <div class="oz_sn_container">
                            <p class="oz_sn_prm_info">
                            	<em><a href="<?=$today_link?>" <? if($today[t_target]){?>target="_blank"<? } ?>><?php echo "$top_message";?></a></em> <!--"고객님, 오늘은 자외선이 강하네요. 외출할때 반드시 썬크림을 사용하세요>>>썬크림보러가기"  SW: php가 필요할지도.. -->
                            </p>
                            <ul class="oz_sn_quick_menu">
                            <?php if($member[mb_id]){?>
                                <?php if($member[mb_id]=="admin") {?>
                                <li>
                                    <a href="<?php echo G5_ADMIN_URL;?>" target="_parent">관리자+</a> <!--"관리자페이지"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <?php } ?>
                                <?php if($member['partner']) { ?>
                                <li>
                                    <a href="/shop/partner/" target="_parent">마이샵</a> <!--"마이샵관리페이지"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <?php }else{ ?>
                                <li>
                                    <a href="/shop/partner/register.php" target="_parent">입점신청</a> <!--"입점신청"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <?php } ?>
                                <li>
                                    <a class="top_quick01" href="/shop/mypage.php" target="_parent">我的信息</a> <!--"자료수정"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_join">
                                    <a class="top_quick02" href="/bbs/logout.php" target="_parent" rel="nofollow">退出登录</a><!--"로그아웃"-->
                                </li>
                            <?php }else{ ?>
                                <li>
                                    <a href="/shop/partner/login.php" target="_parent">입점자로그인</a> <!--"로그인하세요"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li>
                                    <a class="top_quick03" href="/bbs/login.php" target="_parent">请登录</a> <!--"로그인하세요"-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_join">
                                    <a class="top_quick04" href="/bbs/register.php" target="_parent" rel="nofollow">免费注册</a><!--"회원가입하기"-->
                                </li>
                            <?php } ?>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="sn-cart">
                                <? if($member[mb_id]){?>
                                    <a class="top_quick05" href="/shop/cart.php" target="_parent" rel="nofollow">购物车</a> <!--"장바구니"-->
                                <? }else{ ?>
                                <a class="top_quick05" href="#" onClick="javascript:if(confirm('您还不是网站会员 是否要登陆网站？')){document.location.href='/bbs/login.php?url=<?=urlencode("/shop/cart.php")?>'};">购物车</a> <!--"장바구니"-->
                                <? } ?>
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_myshopping">
                                    <a class="top_quick06" href="/shop/orderinquiry.php" target="_parent">我的购物信息 </a><!--"내 쇼핑 정보"-->
                                    <!--SW: display:none 으로 되어 있는데 아마도 판매자로 로그인 하면 display:block으로 되지 않을까??-->
                                </li>
                                <li class="oz_sn_separator"></li> <!--oz_site_nav의 세로줄-->
                                <li class="oz_sn_customcenter">
                                    <a class="top_quick07" href="/shop/cscenter.php" target="_parent">客户服务</a><!--"고객센터"-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>             