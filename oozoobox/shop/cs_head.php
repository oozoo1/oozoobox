<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/mypage.php"));

// 쿠폰
$cp_count = 0;
$sql = " select cp_id
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '전체회원' )
              and cp_start <= '".G5_TIME_YMD."'
              and cp_end >= '".G5_TIME_YMD."' ";
$res = sql_query($sql);

for($k=0; $cp=sql_fetch_array($res); $k++) {
    if(!is_used_coupon($member['mb_id'], $cp['cp_id']))
        $cp_count++;
}

$mb_homepage = set_http(get_text(clean_xss_tags($member['mb_homepage'])));
$mb_profile = ($member['mb_profile']) ? conv_content($member['mb_profile'],0) : '';
$mb_signature = ($member['mb_signature']) ? apms_content(conv_content($member['mb_signature'], 1)) : '';



include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
		<a href="/shop/cscenter.php"><h3 class="mp_tit">CUSTOMER CENTER <span class="mp_tit_small">服务中心</span></h3></a>
        <!--s: LEFT_NAVIGATION-->
        <div id="Left_Navigation">
        	<!--s: MypageMenu-->
        	<div class="MyMenu CSMenu">
            	<ul>
                	<li class="CS_menu">
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter01.png" alt="消费者帮助 Buyer FAQ"/>
                        </h4>
                        <ul class="MM_List" <? if($_GET[bo_table]=="buyerfaq" || $_SERVER['PHP_SELF']=="/shop/cscenter.php"){?>style="display:block"<? } ?>>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('회원관리')?>">회원관리</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('주문')?>">주문</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('결제')?>">결제</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('배송')?>">배송</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('취소/환불')?>">취소/환불</a></li>                    
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('포인트')?>">포인트</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('기타')?>">기타</a></li>
                        </ul>
                    </li>
                    <li class="CS_menu">
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter02.png" alt="商家帮助 Seller FAQ"/>
                        </h4>
                        <ul class="MM_List" <? if($_GET[bo_table]=="sellerfaq"){?>style="display:block"<? } ?>>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('회원관리')?>">회원관리</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('상품관리')?>">상품관리</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('배송')?>">배송</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('배송/취소/환불')?>">취소/환불</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('이용료/정산/부가세')?>">이용료/정산/부가세</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('광고/기획전')?>">광고/기획전</a></li>
                        </ul>
                    </li>
                    <!--<li class="CS_menu"> 
                    <h4 class="MM_tit">
                        <img src="/images/tit_cscenter03.png" alt="我的设置 Personal Info."/>
                    </h4>
                    <ul class="MM_List">
                        <li><a>상품문의</a></li>
                        <li><a>상품평 조회</a></li>
                        <li><a>상품평 쓰기</a></li>
                        <li><a>건의함 조회</a></li>
                        <li><a>신고 고발 조회</a></li>
                    </ul>
                    </li>-->
                    <li class="CS_menu"> 
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter04.png" alt="公告 Notice"/>
                        </h4>
                        <ul class="MM_List" <? if($_GET[bo_table]=="notice"){?>style="display:block"<? } ?>>
                            <li><a href="/bbs/board.php?bo_table=notice">전체보기</a></li>
                            <li><a href="/bbs/board.php?bo_table=notice&sca=<?=urlencode('OOZOOBOX소식')?>">OOZOOBOX 소식</a></li>
                            <li><a href="/bbs/board.php?bo_table=notice&sca=<?=urlencode('이벤트소식')?>">이벤트소식</a></li>
                            <li><a href="/bbs/board.php?bo_table=notice&sca=<?=urlencode('이벤트응모담청')?>">이벤트응모담청</a></li>
                        </ul> 
                    </li>
                </div>
                <!--e: MypageMenu-->
                <!--s: 고객센터 배너-->
                <div class="My_subsection">
                    <h4 class="MM_tit">
                        <img src="/images/tit_cscenter_quick.png" alt="Quick Finds"/>
                    </h4>
                    <ul class="Quickmenu">
                        <li><a href="/bbs/write.php?bo_table=qa"><i class="quick01"></i>문의하기</a></li>
                        <li><a><i class="quick02"></i>문의내역</a></li>
                        <li><a><i class="quick03"></i>내 ID찾기</a></li>
                        <li><a><i class="quick04"></i>비밀번호찾기</a></li>
                        <li><a><i class="quick05"></i>배송조회</a></li>
                        <li><a><i class="quick06"></i>내정보수정하기</a></li>
                    </ul> 
                </div>
            </ul>
            <!--e: 고객센터 배너-->
        </div>
        <!--e: LEFT_NAVIGATION-->
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<div class="cscenter_main_tit">