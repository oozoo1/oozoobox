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
                	<li><a href="/shop/mypage01_1.php">회원정보</a></li>
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
            修改电子邮件
            </h4>
			<div class="Change_email_inform">
            	<span>操作提示：</span>
                <p>
                    1. 此邮箱将接收密码找回，订单通知等敏感性安全服务及提醒使用，请务必填写正确地址。<br>
                    2. 设置提交后，系统将自动发送验证邮件到您绑定的信箱，您需在24小时内登录邮箱并完成验证。<br>
                    3. 更改邮箱时，请通过安全验证后重新输入新邮箱地址绑定。
                </p>
            </div>
            <div class="Change_email_address">
            	<form id="email_form">
                	<dl>
                    	<dt>绑定邮箱地址：</dt>
                        <dd><input name="email" class="text" id="email" type="text" maxlength="40" value="oozoobox1234@oozoobox.com"></dd>
                    </dl>
                    <dl class="send_email">
                    	<dt></dt>
                        <dd><button class="submit" type="button"><img src="/images/btn_My_certi.png" alt="认证邮箱地址"/></button></dd>
                    </dl>
                </form>
            </div>
        </div>
        <!--e: RIGHT CONTENTS-->
	</div>
</div>
<?php  include_once('./_tail.php'); ?>
