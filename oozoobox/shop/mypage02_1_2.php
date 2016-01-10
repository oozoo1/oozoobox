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
            	<img src="/images/mypage02_1_1_step02.png" alt="Step02"/>
            </div>

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
            <div class="basicbtns">
            	<a href="/shop/mypage02_1_1.php"><button><img src="/images/btn_my_before.png" alt="上一部"/></button></a>
                <a href="/shop/mypage02_1_3.php"><button><img src="/images/btn_my_next.png" alt="下一部"/></button></a>
            </div>                    
            
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
