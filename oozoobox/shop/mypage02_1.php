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
		<h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            주문내역/배송조회
            </h4>
            
			<div class="text_box">
            	<p>고객님의 주문내역입니다.<br>
                주문내역을 클릭하시면 상세 주문내역 / 배송조회가 가능합니다.
                </p>
            </div>
            <div class="tap_view_period">
                <div class="order-period">
                    <div class="select_period">
                     <button>오늘</button>
                     <button>1주일</button>
                     <button>1개월</button>    
                     <button class="on">3개월</button>    <!--클릭했을 class명을 "on"으로 바꿔주면 됩니다-->
                     <button>6개월</button>    
                     <button>12개월</button>    
                     <button>이전 주문내역</button>                    
                    </div>
                    <span class="date">2015-10-06 ~ 2016-01-05</span>
                </div>
                <div class="order-search">
                    <input class="text" type="text" style="width:138px"/>
                    <input class="btn_search" type="submit" value="조회"/>
                </div>
            </div>
            <div class="orderview-option">
            	<select>
                	<option>입금확인중</option>
                    <option>결제완료</option>
                    <option>상품준비중</option>
                    <option>배송중/배송출발</option>
                    <option>배송완료</option>
                    <option>거래완료</option>
                </select>
            </div>
            <table class="order-list-table">
            	<colgroup>
                	<col style="width:172px"/>
                    <col style="width:auto"/>
                    <col style="width:101px"/>
                    <col style="width:101px"/>
                </colgroup>
                <thead>
                	<tr>
                    	<th class="first">주문일(결제번호)</th>
                        <th>상품평/주문옵션/주문번호</th>
                        <th>판매자</th>
                        <th>주문상태</th>
                    </tr>
                </thead>
                <tbody>
                	<!-------s: 01.결제완료일때---------->
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num">
                        	<div class="date-num">
                            	<strong>2016-01-04</strong>
                                <a>( <span>887634010</span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num">121</span>
                                </strong>
                            </div>
                            <div class="detail-link">
                            	<a class="link" onClick="window.open('/shop/popup/pop04.html', '', 'width=800, height=744, scrollbars=no')">주문상세보기</a>
                            </div>
                        </td>
                        <td class="product">
                        	<div class="product-block">
                            	<a class="product-thumbnail">
                                	<img src="/images/mypage_oder_list01.png" style="width:60px; height:60px" alt="상품01"/>
                                </a>
                                <div class="product-content">
                                	<div class="product-name">
                                    	<a>ddddddddddddddddddddd</a>
                                    </div>
                                    <div class="product-option">
                                    aaaaaaaaaaaaaaaaaaa
                                    </div>
                                    <div class="order-num">
                                        <span class="mp_label">주문번호</span>
                                    123456789
                                    </div>
                            	</div>
                            </div>
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
                    <tr>
                    	<td colspan="3" class="actions">
                        	<div class="links">
                                <a class="declaration">신고하기</a>
                            	<a class="link" onClick="window.open('/shop/popup/pop03.html', '', 'width=800, height=744, scrollbars=no')">판매자문의</a>
                            </div>
                            <div class="buttons">
                            	<a class="button">
                                <button class="cancel">주문취소</button>
                                <button class="orange">배송정보수정</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-------e: 01.결제완료일때---------->
                    <!-------s: 02.상품준비중일때---------->
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num">
                        	<div class="date-num">
                            	<strong>2016-01-04</strong>
                                <a>( <span>887634010</span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num">121</span>
                                </strong>
                            </div>
                            <div class="detail-link">
                            	<a class="link">주문상세보기</a>
                            </div>
                        </td>
                        <td class="product">
                        	<div class="product-block">
                            	<a class="product-thumbnail">
                                	<img src="/images/mypage_oder_list01.png" style="width:60px; height:60px" alt="상품01"/>
                                </a>
                                <div class="product-content">
                                	<div class="product-name">
                                    	<a>ddddddddddddddddddddd</a>
                                    </div>
                                    <div class="product-option">
                                    aaaaaaaaaaaaaaaaaaa
                                    </div>
                                    <div class="order-num">
                                        <span class="mp_label">주문번호</span>
                                    123456789
                                    </div>
                            	</div>
                            </div>
                        </td>
                        <td class="seller">
                        	<span class="seller-info">
                            	베이비제이
                            </span>
                        </td>
                        <td class="status">
                        	<strong class="status-msg">상품준비중</strong>
                            <span class="status-date">
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" class="actions">
                        	<div class="links">
                                <a class="declaration">신고하기</a>                            
                            	<a class="link" onClick="window.open('/shop/popup/pop03.html', '', 'width=800, height=744, scrollbars=no')">판매자문의</a>
                            </div>
                            <div class="buttons">
                            	<a class="button">
                                <button class="cancel">주문취소요청</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-------e: 02.상품준비중일때---------->
                    <!-------s: 03.배송중일때---------->
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num">
                        	<div class="date-num">
                            	<strong>2016-01-04</strong>
                                <a>( <span>887634010</span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num">121</span>
                                </strong>
                            </div>
                            <div class="detail-link">
                            	<a class="link">주문상세보기</a>
                            </div>
                        </td>
                        <td class="product">
                        	<div class="product-block">
                            	<a class="product-thumbnail">
                                	<img src="/images/mypage_oder_list01.png" style="width:60px; height:60px" alt="상품01"/>
                                </a>
                                <div class="product-content">
                                	<div class="product-name">
                                    	<a>ddddddddddddddddddddd</a>
                                    </div>
                                    <div class="product-option">
                                    aaaaaaaaaaaaaaaaaaa
                                    </div>
                                    <div class="order-num">
                                        <span class="mp_label">주문번호</span>
                                    123456789
                                    </div>
                            	</div>
                            </div>
                        </td>
                        <td class="seller">
                        	<span class="seller-info">
                            	베이비제이
                            </span>
                        </td>
                        <td class="status">
                        	<strong class="status-msg">배송중</strong>
                            <span class="tracking">
	                            <a>배송추척</a>
                            </span>
                            <br>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" class="actions">
                        	<div class="links">
                                <a class="declaration">신고하기</a>                            
                            	<a class="link" onClick="window.open('/shop/popup/pop03.html', '', 'width=800, height=744, scrollbars=no')">판매자문의</a>
                            </div>
                            <div class="buttons">
                            	<a class="button">
                                <button class="cancel">반품 / 취소요청</button>
                                <button class="orange">상품평 | 구매결정</button>                                                                
                                </a>
                            </div>
                        </td>
                    </tr>                    
                    <!-------e: 03.배송중일때---------->
                    <!-------s: 04.배송완료일때---------->
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num">
                        	<div class="date-num">
                            	<strong>2016-01-04</strong>
                                <a>( <span>887634010</span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num">121</span>
                                </strong>
                            </div>
                            <div class="detail-link">
                            	<a class="link">주문상세보기</a>
                            </div>
                        </td>
                        <td class="product">
                        	<div class="product-block">
                            	<a class="product-thumbnail">
                                	<img src="/images/mypage_oder_list01.png" style="width:60px; height:60px" alt="상품01"/>
                                </a>
                                <div class="product-content">
                                	<div class="product-name">
                                    	<a>ddddddddddddddddddddd</a>
                                    </div>
                                    <div class="product-option">
                                    aaaaaaaaaaaaaaaaaaa
                                    </div>
                                    <div class="order-num">
                                        <span class="mp_label">주문번호</span>
                                    123456789
                                    </div>
                            	</div>
                            </div>
                        </td>
                        <td class="seller">
                        	<span class="seller-info">
                            	베이비제이
                            </span>
                        </td>
                        <td class="status">
                        	<strong class="status-msg">배송완료</strong>
                            <span class="status-date">
								<span class="num">12-30</span>결정
                            </span>
                            <span class="tracking">
	                            <a>배송추척</a>
                            </span>                            
                            <br>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" class="actions">
                        	<div class="links">
                                <a class="declaration">신고하기</a>                            
                            	<a class="link" onClick="window.open('/shop/popup/pop03.html', '', 'width=800, height=744, scrollbars=no')">판매자문의</a>
                            </div>
                            <div class="buttons">
                            	<a class="button">
                                <button class="cancel">미수령</button>
                                <button class="cancel">반품신청</button>
                                <button class="orange">상품평 | 구매결정</button>                                                               
                                </a>
                            </div>
                        </td>
                    </tr>
					<!-------e: 04.배송완료일때---------->
                    <!-------s: 05.거래완료일때---------->
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num">
                        	<div class="date-num">
                            	<strong>2016-01-04</strong>
                                <a>( <span>887634010</span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num">121</span>
                                </strong>
                            </div>
                            <div class="detail-link">
                            	<a class="link">주문상세보기</a>
                            </div>
                        </td>
                        <td class="product">
                        	<div class="product-block">
                            	<a class="product-thumbnail">
                                	<img src="/images/mypage_oder_list01.png" style="width:60px; height:60px" alt="상품01"/>
                                </a>
                                <div class="product-content">
                                	<div class="product-name">
                                    	<a>ddddddddddddddddddddd</a>
                                    </div>
                                    <div class="product-option">
                                    aaaaaaaaaaaaaaaaaaa
                                    </div>
                                    <div class="order-num">
                                        <span class="mp_label">주문번호</span>
                                    123456789
                                    </div>
                            	</div>
                            </div>
                        </td>
                        <td class="seller">
                        	<span class="seller-info">
                            	베이비제이
                            </span>
                        </td>
                        <td class="status">
                        	<strong class="status-msg">거래완료</strong>
                            <span class="status-date">
                            구매결정일자
                            <br>
                            ( <span class="num">12-30</span>
                            결정 )
                            </span>
                            <br>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" class="actions">
                        	<div class="links">
                                <a class="declaration">신고하기</a>                            
                            	<a class="link" onClick="window.open('/shop/popup/pop03.html', '', 'width=800, height=744, scrollbars=no')">판매자문의</a>
                            </div>
                            <div class="buttons">
                            	<a class="button">
                                <button class="cancel">상품평작성하기</button>
                                </a>
                            </div>
                        </td>
                    </tr>                                          
                    <!-------e: 05.거래완료일때---------->                                 
                </tbody>
            </table>
            
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
