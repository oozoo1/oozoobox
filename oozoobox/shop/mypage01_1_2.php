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
            OOZOOBOX 注销
            </h4>
            <div class="My_leave_paragraph01">
            	<h5>申请注销帐号</h5>
                <p>회원탈퇴란, OOZOOBOX사이트에 대한 이용해지를 의미합니다. OOZOOBOX에서 발송하는 광고성 이메일의 경우
                회원탈퇴 요청 접수 후 24시간 이내에 발송이 중지됩니다. <br>
                다만, 드물게 데이터 처리사정상 일부 지연될 수 있으니 혹 회원탈퇴 요청 후 48시간이 지난 후에 광고성 이메일/SMS를 접
                수하시는 경우 당사에 연락하여 주시기 바랍니다
                </p>
            </div>
            <div class="My_leave_paragraph02">
            	<ul><span>회원탈퇴시 유의사항</span>
                	<li>회원탈퇴를 위해선 아래 3가지 조건 확인이 필요합니다.<br>
                    - 판매 또는 구매가 진행중인 상품이 없어야 합니다.<br>
                    - 가상계좌 잔액이 없어야 합니다.<br>
                    - 회원탈퇴 시 보유하고 계신 쿠폰은 즉시 소멸되며,<br>
                    &nbsp;&nbsp;동일한 아이디로 재가입 하더라도 복원되지 않습니다.
                    </li>
                    <li>동일한 아이디로 재가입시 판매자 닉네임은 그대로 유지됩니다.</li>
                    <li></li>
                </ul>
            </div>
            <div class="My_leave_paragraph02" style="margin-left:15px;">
            	<ul><span>탈퇴회원 회원정보 보존기간</span>
                	<li>회원탈퇴가 완료되더라도 판/구매자의 권익을 보호하기 위해 다음과 
                    같이 회원정보가 일정기간 보존됨을 알려드립니다. </li>
                    <li>관계 법령에 의거하여 보존이 필요한 경우에 한하여 보존됩니다.<br>
                    - 계약 및 청약철회 등에 관한 기록 : 5년<br>
                    - 대금결제 및 재화등의 공급에 관한 기록 : 5년<br>
                    - 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년<br>
                    - 부정이용 등에 관한 기록 : 1년</li>
                </ul>
            </div>
            <div class="My_leave_paragraph01">
            	<h5>申请注销条件</h5>
                <p>회원탈퇴란, OOZOOBOX사이트에 대한 이용해지를 의미합니다. OOZOOBOX에서 발송하는 광고성 이메일의 경우
                회원탈퇴 요청 접수 후 24시간 이내에 발송이 중지됩니다. <br>
                다만, 드물게 데이터 처리사정상 일부 지연될 수 있으니 혹 회원탈퇴 요청 후 48시간이 지난 후에 광고성 이메일/SMS를 접
                수하시는 경우 당사에 연락하여 주시기 바랍니다.
                </p>
            </div>
            <div class="tbl_My_leave">
            	<table>
                	<colgroup span="1">
                        <col width="80" span="1"></col>
                        <col width="115" span="1"></col>
                        <col width="62" span="1"></col>
                        <col width="62" span="1"></col>
                        <col width="280" span="1"></col>
                        <col width="136" span="1"></col> 
                    </colgroup>
                    <tbody>
                    	<tr>
                        	<th class="leftline" rowspan="2" colspan="2">구분</th>
                            <th  colspan="2">재가입기준</th>
                            <th rowspan="2">비고</th>
                            <th rowspan="2">재가입유예기간</th>
                        </tr>
                        <tr>
                        	<th>새로운 ID</th>
                            <th>동일 ID</th>
                        </tr>
                        <tr>
                        	<td class="leftline" colspan="2">거래내역이 없는 회원</td>
                            <td class="txtc">O</td>
                            <td class="txtc">X</td>
                            <td>예전 사용했던 아이디로 재가입 불가능, 새로운 아이디로만 가입 가능</td>
                            <td class="txtc" rowspan="4">
                            	본인인증이 완료된<br>
                                회원은 탈퇴 후<br>
                                7일 경과 후<br>
                                재가입 가능
                            </td>
                        </tr>
                        <tr>
                        	<td class="leftline" rowspan="2">거래내역이 있는 회원</td>
                            <td>개인구매회원</td>
                            <td class="txtc">O</td>
                            <td class="txtc">X</td>
                            <td>개인구매회원의 경우 항상 새로운 아이디로만 가입 가능</td>
                        </tr>
                        <tr>
                        	<td>개인판구매회원</td>
                            <td class="txtc">X</td>
                            <td class="txtc">O</td>
                            <td>동일한 아이디로 재가입 할 경우 예전 아이디실적이 그대로 반영됨</td>
                        </tr>   
                        <tr>
                        	<td class="leftline" colspan="2">영구정지 회원</td>
                            <td class="txtc">X</td>
                            <td class="txtc">X</td>
                            <td>영구정지회원은 재가입 자체가 불가능함</td>
                        </tr>                                                 
                    </tbody>
               	</table>
            </div>
            <div class="basicbtn">
            	<a href="/shop/mypage01_1_3.php"><button id="btnSubmit" type="submit"><img src="/images/btn_pass_ok_02.png"/></button></a>
            </div>
        </div>
        <!--e: RIGHT CONTENTS-->
<?php  include_once('./_tail.php'); ?>
