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
            	<img src="/images/mypage02_1_5_step01.png" alt="Step01"/>
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
            <h4 class="strapline">2. 취소사유 <span class="explain">(포인트가 적용 되었던 결제금액으로 환불되며, 전체 취소할 경우 포인트는 자동환불 됩니다.)</span></h4>    
            <table class="order-list-table order-cancel-table">
            	<colgroup>
                	<col style="width:50%"/>
                    <col/>
                </colgroup>
                <thead>
                	<tr>
                        <th class="first">취소사유</th>
                        <th>상품취소 상세내용 입력</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="separate">
                    	<td class="pro">
                        	<ul>
                            	<li>
                                    <span class="radio-wrap">
                                        <input type="radio"/> OOZOOBOX내 다른 상품으로 재 주문
                                    </span>
                                </li>
                            	<li>
                                    <span class="radio-wrap">
                                        <input type="radio"/> 타사이트 상품 주문
                                    </span>
                                </li>
                            	<li>
                                    <span class="radio-wrap">
                                        <input type="radio"/> 구매의사가 없어짐
                                    </span>
                                </li>
                            	<li>
                                    <span class="radio-wrap">
                                        <input type="radio"/> 동일 상품 재 주문 (주문정보수정)
                                    </span>
                                </li>
                            	<li>
                                    <span class="radio-wrap">
                                        <input type="radio"/> 기타(구매자 책임 사유)
                                    </span>
                                </li>
                            </ul>
                        </td>
                        <td class="pro">
                        	<div class="cancel_textbox">
                            	<textarea class="cancel_textbox" type="text"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-------e: 취소할 상품 선택---------->
                </tbody>
            </table>
 			
            <h4 class="strapline">3. 반품할 물건을 이미 보내셨나요?</h4>    	            
            <div class="rtstit-radio">
            	<span class="radio-wrap">
                	<input name="ca_name2" class="design-radio" type="radio"/> 예
                </span>
                <span class="radio-wrap">
                	<input name="ca_name2" class="design-radio" type="radio" checked="checked"/> 아니오
                </span>
            	<div class="radio_detail">ddddddd</div>
            
            </div>
            
            
            
            <div class="basicbtns">
            	<a href="/shop/mypage02_1_6.php"><button><img src="/images/btn_pass_ok_02.png"></button></a>
                <a href="/shop/mypage.php"><button><img src="/images/btn_my_cancel.png"></button></a>
            </div>                    
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
