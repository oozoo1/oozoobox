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
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            주문취소
            </h4>
            
			<div class="Cancel_Step">
            	<img src="/images/mypage02_1_5_step02.png" alt="Step02"/>
            </div>
           
            <h4 class="strapline">1. 반품할 상품</h4>
			<!-------s: 취소할 상품 선택---------->
            <table class="order-list-table order-cancel-table">
            	<colgroup>
                	<col/>
                    <col style="width:32%"/>
                </colgroup>
                <thead>
                	<tr>
                    	<th class="first">상품명</th>
                        <th>결제금액</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="separate">
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
                        <td class="pay" style="padding-right:15px;">
                            	1347
                        </td>                        
                    </tr>
                    <tr>
                    	<td></td>
                        <td>
                        	<div class="refund-total">
                                환불예정 금액:  
                                <span class="price">
                                    <strong>1347</strong>원
                                </span>
                            </div>
                        </td>
                    </tr>                    
                    <!-------e: 취소할 상품 선택---------->
                </tbody>
            </table>
            <h4 class="strapline">2. 환불정보확인</h4>    
            <table class="order-list-table refund-table">
            	<colgroup>
                    <col style="width:13%"/>
                	<col style="width:19%"/>
                    <col/>
                </colgroup>
                <tbody>
                	<tr>
                        <th>결제수단</th>
                        <td>비씨카드/일시불</td>
                        <td class="payment">
                            <strong>신용카드 승인취소</strong>
                            <br><br>
                            (카드사에서는 4~5일 이후에 확인가능)
                        </td>
                    </tr>
                </tbody>
            </table>

            
            
            <div class="basicbtns">
            	<a href="/shop/mypage02_1.php"><img src="/images/btn_my_before.png"></a>
                <a href="/shop/mypage02_1_7.php"><img src="/images/btn_my_next.png"></a>
            </div>                    
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
