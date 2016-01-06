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
            核实密码
            </h4>
			<div class="Change_email_inform">
            	<span>비밀번호 재확인</span>
                <p>
                    안전한 사용을 위해 비밀번호를 다시 한번 입력해주세요
                </p>
            </div>
            <div class="My_leave_step03">
            	<form id="login_form">
                	<dl>
                    	<dt>用户名 ：</dt>
                        <dd><input name="id" class="text" id="ID" type="text" maxlength="40" value="oozooboxID12345"></dd>
                    	<dt>密&nbsp;&nbsp; 码 ：</dt>
                        <dd><input name="pw" class="text" id="pw" type="password" maxlength="40" value=""></dd>
                    </dl>
                </form>
                <div class="send_pw">
                    <a href="/shop/mypage01_1_4.php">
                        <button>
                            <img src="/images/btn_pass_ok_02.png" alt="认证密码"/>
                        </button>
                    </a>
                </div>
            </div>            
        </div>
        <!--e: RIGHT CONTENTS-->
<?php  include_once('./_tail.php'); ?>
