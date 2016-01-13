<?php
include_once('./_common.php');

if(USE_G5_THEME && defined('G5_THEME_PATH')) {
    require_once(G5_SHOP_PATH.'/yc/orderinquiry.php');
    return;
}

define("_ORDERINQUIRY_", true);

$od_pwd = get_encrypt_string($od_pwd);

// 회원인 경우
if ($is_member)
{
    $sql_common = " from {$g5['g5_shop_order_table']} where mb_id = '{$member['mb_id']}' ";
}
else if ($od_id && $od_pwd) // 비회원인 경우 주문서번호와 비밀번호가 넘어왔다면
{
    $sql_common = " from {$g5['g5_shop_order_table']} where od_id = '$od_id' and od_pwd = '$od_pwd' ";
}
else // 그렇지 않다면 로그인으로 가기
{
    goto_url(G5_BBS_URL.'/login.php?url='.urlencode(G5_SHOP_URL.'/orderinquiry.php'));
}

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

// 비회원 주문확인시 비회원의 모든 주문이 다 출력되는 오류 수정
// 조건에 맞는 주문서가 없다면
if ($total_count == 0)
{
    if ($is_member) // 회원일 경우는 메인으로 이동
        alert('주문이 존재하지 않습니다.', G5_SHOP_URL);
    else // 비회원일 경우는 이전 페이지로 이동
        alert('주문이 존재하지 않습니다.');
}

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

// 비회원 주문확인의 경우 바로 주문서 상세조회로 이동
if (!$is_member)
{
    $sql = " select od_id, od_time, od_ip from {$g5['g5_shop_order_table']} where od_id = '$od_id' and od_pwd = '$od_pwd' ";
    $row = sql_fetch($sql);
    if ($row['od_id']) {
        $uid = md5($row['od_id'].$row['od_time'].$row['od_ip']);
        set_session('ss_orderview_uid', $uid);
        goto_url(G5_SHOP_URL.'/orderinquiryview.php?od_id='.$row['od_id'].'&amp;uid='.$uid);
    }
}

$list = array();

$limit = " limit $from_record, $rows ";
$sql = " select *
		   from {$g5['g5_shop_order_table']}
		  where mb_id = '{$member['mb_id']}'
		  order by od_id desc
		  $limit ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
	$uid = md5($row['od_id'].$row['od_time'].$row['od_ip']);

	switch($row['od_status']) {
		case '주문':
			$od_status = '입금확인중';
			break;
		case '입금':
			$od_status = '입금완료';
			break;
		case '준비':
			$od_status = '상품준비중';
			break;
		case '배송':
			$od_status = '상품배송';
			break;
		case '완료':
			$od_status = '배송완료';
			break;
		default:
			$od_status = '주문취소';
			break;
	}
	
	$list[$i] = $row;
	$list[$i]['od_href'] = G5_SHOP_URL.'/orderinquiryview.php?od_id='.$row['od_id'].'&amp;uid='.$uid;
	$list[$i]['od_total_price'] = $row['od_cart_price'] + $row['od_send_cost'] + $row['od_send_cost2'];
	$list[$i]['od_status'] = $od_status;
}

$write_pages = G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'];
$list_page = $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page=';

// Page ID
$pid = ($pid) ? $pid : 'inquiry';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$skin_row = array();
$skin_row = apms_rows('order_'.MOBILE_.'skin, order_'.MOBILE_.'set');
$order_skin_path = G5_SKIN_PATH.'/apms/order/'.$skin_row['order_'.MOBILE_.'skin'];
$order_skin_url = G5_SKIN_URL.'/apms/order/'.$skin_row['order_'.MOBILE_.'skin'];

// 스킨설정
$wset = array();
if($skin_row['order_'.MOBILE_.'set']) {
	$wset = apms_unpack($skin_row['order_'.MOBILE_.'set']);
}

$g5['title'] = '주문내역조회';
include_once('./_head.php');

$skin_path = $order_skin_path;
$skin_url = $order_skin_url;

// 셋업
$setup_href = '';
if(is_file($skin_path.'/setup.skin.php') && ($is_demo || $is_admin == 'super')) {
	$setup_href = './skin.setup.php?skin=order';
}

?>
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3></a>
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
                    <?php for ($i=0; $i < count($list); $i++) { ?>
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num">
                        	<div class="date-num">
                            	<strong><?php echo $list[$i]['od_time']; ?></strong>
                                <a>( <span><?php echo $list[$i]['od_id']; ?></span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num"><?php echo $list[$i]['od_total_price']; ?></span>
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
                            	<a href="/shop/mypage02_1_1.php" class="button">
                                	<button class="cancel">주문취소</button>
                                </a>
                                <a class="button">
                                	<button class="orange">배송정보수정</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <? } ?>
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
                            	<a href="/shop/mypage02_1_4.php" class="button">
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
                                <a href="/shop/mypage02_1_5.php" class="button"><button class="cancel">반품 / 취소요청</button></a>
                                <a onClick="window.open('/shop/popup/pop05.html', '', 'width=660, height=535, scrollbars=no')" class="button"><button class="orange">상품평 | 구매결정</button></a>
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
                            	
                                <a onClick="window.open('/shop/popup/pop09.html', '', 'width=500, height=530, scrollbars=no')" class="button"><button class="cancel">미수령</button></a>
                                <a href="/shop/mypage02_1_5.php" class="button"><button class="cancel">반품신청</button></a>
                                <a onClick="window.open('/shop/popup/pop05.html', '', 'width=660, height=535, scrollbars=no')" class="button"><button class="orange">상품평 | 구매결정</button></a>                                                               
                                </a>
                            </div>
                        </td>
                    </tr>
					<!-------e: 04.배송완료일때---------->
                    <!-------s: 05.미수령을 눌렀을때---------->
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
                        	<strong class="status-msg">미수령신고</strong>
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
                            	
                                <a class="button"><button class="cancel">미수령신고철회</button></a> <!--경고창 : "미수령신고를 철회하시겠습니?"-->
                                <a href="/shop/mypage02_1_5.php" class="button"><button class="cancel">반품신청</button></a>
                                <a onClick="window.open('/shop/popup/pop05.html', '', 'width=660, height=535, scrollbars=no')" class="button"><button class="orange">상품평 | 구매결정</button></a>
                            </div>
                        </td>
                    </tr>                                          
                    <!-------e: 05.미수령을 눌렀을때---------->    
                    <!-------s: 06.반품신청을 눌렀을때---------->
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
                        	<strong class="status-msg">반품신청</strong>
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
                            	
                                <a class="button"><button class="cancel">반품신청철회</button></a> <!--경고창 : 반품신청을 철회하시겠습니까?"-->
                                <a href="/shop/mypage02_1_8.php" class="button"><button class="orange">반품정보수정</button></a>                                                               
                                
                            </div>
                        </td>
                    </tr>                                          
                    <!-------e: 06.반품신청을 눌렀을때---------->
                    <!-------s: 07.거래완료일때---------->
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
                            	<a class="button" onClick="window.open('/shop/popup/pop07.html', '', 'width=600, height=760, scrollbars=no')" >
                                <button class="cancel">상품평작성하기</button>
                                </a>
                            </div>
                        </td>
                    </tr>                                          
                    <!-------e: 07.거래완료일때---------->                                                     
                </tbody>
            </table>
            
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
