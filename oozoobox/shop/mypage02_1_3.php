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
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">顾客的个人情报及订单详情等使用记录可以查询。</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            주문취소
            </h4>            

            <div class="My_leave_step04">
            	<span class="msg_big">
                <span class="red">취소신청</span>이 완료되었습니다.
                </span>
                <span class="msg_small">
               판매자 취소 승인 후 고객님께 환불됩니다.
                </span>
                <div class="basicbtns">
                    <a href="/shop/orderinquiry.php"><button><img src="/images/btn_Gomypage02_1.png" alt="Go mypage02_1"/></button></a>
                    <a href="/"><button><img src="/images/btn_Gohome.png" alt="首页"/></button></a>
                </div>    
            </div>
            
                
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
