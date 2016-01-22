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



$g5['title'] = get_text($member['mb_name']).'订单取消';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            주문취소
            </h4>
            
			<div class="Cancel_Step">
            	<img src="/images/mypage02_1_1_step01.png" alt="Step01"/>
            </div>
           
            <h4 class="strapline">1. 취소할 상품 선택 <span class="explain">(함께 결제하신 상품들입니다. 취소하고자하는 상품을 선택해주세요.)</span></h4>
			<!-------s: 취소할 상품 선택---------->
            <table class="order-list-table order-cancel-table">
            	<colgroup>
                	<col style="width:9%"/>
                	<col/>
                    <col style="width:16%"/>
                    <col style="width:20%"/>
                    <col style="width:16%"/>
                </colgroup>
                <thead>
                	<tr>
                    	<th class="first">
                        	<span class="checkbox-wrap">
                            	<input type="checkbox"/>
                            </span>
                        </th>
                        <th>주문일(결제번호)</th>
                        <th>결제금액</th>
                        <th>판매자</th>
                        <th>주문상태</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="separate">
                    	<td>
                            <span class="checkbox-wrap">
                                <input type="checkbox"/>
                            </span>
                        </td>
                        <td class="pro">
                            <a>ddddddddddddddddddddd</a>
                            <div class="product-block">
                                <div class="product-option">
                                	aaaaaaaaaaaaaaaaaaa
                                </div>
                                <div class="order-num">
                                    <span class="mp_label">주문번호</span>
                                    123456789
                                </div>
                            </div>
                        </td>
                        <td class="pay">
                            	1347
                        </td>                        
                        <td class="seller">
                        	<span class="seller-info">
                            	베이비제이
                            </span>
                        </td>
                        <td class="status">
                        	<strong class="status-msg">결제완료</strong>
                        </td>
                    </tr>
                    <!-------e: 취소할 상품 선택---------->
                </tbody>
            </table>

            <div class="basicbtns">
            	<a href="/shop/mypage02_1.php"><button><img src="/images/btn_my_before.png"></button></a>
                <a href="/shop/mypage02_1_2.php"><button><img src="/images/btn_my_next.png"></button></a>
            </div>                    
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
