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
                	<li><a href="/shop/mypage01.php">회원정보</a></li>
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
            我的基本消息
            </h4>
            <table class="My_Information" summary="기본정보 수정 입력 폼 입니다. 이름, 아이디, 비밀번호, 이메일, 휴대폰번호, 전화번호, 생년월일을 수정하실 수 있습니다.">
                <colgroup>
                	<col style="width:20%;"></col>
                    <col></col>
                </colgroup>
                <tbody>
                	<tr style="border-top:2px solid #dfdfdf">
                    	<th>用户名称</th>
                        <td>KIM MI HYE</td>
                    </tr>
                	<tr>
                    	<th>修改密码</th>
                        <td>
                        	<a onClick="window.open('/shop/popup/pop01.html', '', 'width=500, height=320, scrollbars=no')"><button id="btnChangePass" type="button"><img src="/images/btn_change_pw.png" alt="修改密码"/></button></a>
                        </td>
                    </tr> 
                    <tr>
                    	<th>邮箱</th>
                        <td>
                        	oozoobox1234@oozoobox.com<a href="/shop/mypage01_1.php"><button id="btnChangeMail" type="button" style="margin-left:20px;"><img src="/images/btn_change_email.png" alt="修改电子邮件"/></button></a>
                        </td>
                    </tr>
                    <tr>
                    	<th>真实姓名</th>
                        <td>
                        	<input name="memver_OwnName" class="txt" type="text" maxlength="20" value="金美慧" title="姓名" style="width:370px"></input>
                        </td>
                    </tr>
                    <tr>
                    	<th>性别</th>
                        <td>
                        	<input name="member_sex" type="radio" value="3"> 保密</input>
                            <input name="member_sex" type="radio" checked="checked"  style="margin-left:15px" value="2"> 女</input>
                            <input name="member_sex" type="radio" style="margin-left:15px" value="1"> 男</input>
                        </td>
                    </tr>
                    <tr>
                    	<th>出生年日</th>
                        <td>
                        	<select name="BirthYear" title="选择出生年度" id="select_BirYear" style="width:125px"></select> 年
                            <select name="BirthMonth" title="选择出生月" id="select_BirMonth" style="width:80px; margin-left:15px"></select> 月
                            <select name="BirthDay" title="选择出生年日" id="select_BirDay" style="width:80px; margin-left:15px"></select> 日
                        </td>
                    </tr>  
                    <tr>
                    	<th>所在地区</th>
                        <td><input name="memver_OwnName" class="txt" type="text" maxlength="20" value="地址" title="姓名" style="width:370px"></input><a><button id="btnChangeAdd" type="button" style="margin-left:20px;"><img src="/images/btn_change_add.png" alt="修改地址"/></button></a></td>
                    </tr>  
                    <tr>
                    	<th>ＱＱ</th>
                        <td><input name="memver_OwnName" class="txt" type="text" value="1234567" title="姓名" style="width:370px"></input></td>
                    </tr>                                                                                                            
                </tbody>
            </table>
          	<div class="btn_wrap">
            	<button class="btn_join" id="btnSubmit" type="submit">
                	<img src="/images/btn_my_confirm.png" alt="确认"/>
                </button>
            	<a href="/shop/mypage.php">
                    <button class="btn_DisAgree" id="btn_DisAgree" type="button">
                        <img src="/images/btn_my_cancel.png" alt="取消"/>
                    </button>
                </a>
                <a href="/shop/mypage01_2.php">
                    <button class="btn_join" id="btnSubmit" type="button">
                        <img src="/images/btn_my_leave.png" alt="注销帐号"/>
                    </button>
                </a>                        
            </div>
        </div>
        <!--e: RIGHT CONTENTS-->
	</div>
</div>


<?php  include_once('./_tail.php'); ?>
