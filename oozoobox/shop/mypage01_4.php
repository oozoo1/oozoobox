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



$g5['title'] = get_text($member['mb_name']).'님 마이페이지';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
<div id="oz_detail_wrap">
    <div class="oz_detail_main">
		<h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3>
        <!--s: LEFT_NAVIGATION-->
        <div id="Left_Navigation">
        	<!--s: MypageMenu-->
        	<div class="MyMenu">
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox01.png" alt="我的信息 My Information"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="/shop/mypage01.php">회원정보</a></li>
                    <li><a href="#">주소록</a></li>
                    <li><a href="#">개인정보이용내역</a></li>
                    <li><a href="#">회원등급</a></li>
                </ul>
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox02.png" alt="购买信息 Shopping Info"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="#">주문내역/배송조회</a></li>
                    <li><a href="#">결제대기</a></li>
                    <li><a href="#">주문취소내역</a></li>
                    <li><a href="#">교환/환불내역</a></li>
                    <li><a href="#">장바구니</a></li>
                    <li><a href="#">위시리스트</a></li>
                </ul> 
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox03.png" alt="我的活动 My Activity"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="#">상품문의</a></li>
                    <li><a href="#">상품평 조회</a></li>
                    <li><a href="#">상품평 쓰기</a></li>
                    <li><a href="#">건의함 조회</a></li>
                    <li><a href="#">신고 고발 조회</a></li>
                </ul>  
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox04.png" alt="我的优惠 OOZOOBOX Event"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="#">쿠폰</a></li>
                    <li><a href="#">포인트</a></li>
                    <li><a href="#">이벤트 응모 담청</a></li>
                </ul> 
			</div>
            <!--e: MypageMenu-->
            <!--s: 고객센터 배너-->
            <div class="My_subsection">
            	<img src="/images/my_bn_cs_center.png" alt="CS_CENTER"/>
            </div>
            <!--e: 고객센터 배너-->
        </div>
        <!--e: LEFT_NAVIGATION-->
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            회원탈퇴 신청
            </h4>
            <span class="My_leave_confirm">
                <p>그동안 OOZOOBOX를 이용해 주셔서 감사합니다.</p>
            </span>
            <table class="confirm_info">
                <colgroup>
                    <col width="25%"></col>
                    <col></col>
                </colgroup>
                <tbody>
                    <tr>
                        <th>탈퇴아이디 확인</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>아이디</th>
                        <td>oozooboxID12345</td>
                    </tr>
                    <tr>
                        <th>이름</th>
                        <td>KIM MI HYE</td>
                    </tr>
                </tbody>
            </table>
            <div class="My_leave_paragraph04">
                <b>OOZOOBOX를 탈퇴하시는 이유는 무엇인가요?</b>
                <ul class="My_leave_reason">
                	<li><input type="radio"/> 사이트 이용빈도 낮음</li>
                    <li><input type="radio"/> 회원가입혜택 부족</li>
                    <li><input type="radio"/> 개인정보 유출 우려</li>
                    <li><input type="radio"/> 가격불만</li>
                    <li><input type="radio"/> 상품품질불만</li>
                    <li><input type="radio"/> 배송지연</li>
                    <li><input type="radio"/> 재 가입을 위해서</li> 
                    <li><input type="radio"/> 기타 <input type="text" class="text"></li> 
                </ul>
            </div>
            <div class="send_pw">
                <a onClick="window.open('/shop/popup/pop02.html', '', 'width=400, height=560, scrollbars=no')"><button id="btnChangePass" type="button">
                    <button>
                        <img src="/images/btn_pass_ok_02.png" alt="申请注销OOZOOBOX"/>
                    </button>
                </a>
            </div>                  
        </div>
        <!--e: RIGHT CONTENTS-->
	</div>
</div>
<?php  include_once('./_tail.php'); ?>
