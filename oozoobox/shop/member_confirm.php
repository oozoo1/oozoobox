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


///////////////////////////////////获取默认地址////////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM g5_shop_order_address WHERE mb_id = '$member[mb_id]' and ad_default = '1'";
$result = sql_query($sql);
$row=sql_fetch_array($result);
///////////////////////////////////获取默认地址////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////数据输入////////////////////////////////////////////////////////////////////////////
if($_POST[type]=="update"){
	$mb_id             =$member[mb_id];
	$mb_name           =$_POST[mb_name];
	$mb_sex            =$_POST[mb_sex];
	$mb_birth          ="$_POST[birth_y]|$_POST[birth_m]|$_POST[birth_d]";
	$mb_hp             =$_POST[mb_hp];
	$mb_tel            =$_POST[mb_tel];
	$mb_1              =$_POST[mb_1];
	
	$sql = " update g5_member
				set mb_name = '$mb_name',
				 mb_sex = '$mb_sex',
				 mb_birth = '$mb_birth',
				 mb_hp = '$mb_hp',
				 mb_tel = '$mb_tel',
				 mb_1 = '$mb_1'
				 where mb_id = '$mb_id' ";
	$sql_query=sql_query($sql);	
	
	echo "<script>alert('操作成功');window.location='./member_confirm.php'</script>";

}
//////////////////////////////////////数据输入////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////生日分段////////////////////////////////////////////////////////////////////////////
$ex1_filed = explode("|",$member[mb_birth]); 
$birth_y  = $ex1_filed[0];
$birth_m  = $ex1_filed[1];
$birth_d  = $ex1_filed[2];
//////////////////////////////////////生日分段////////////////////////////////////////////////////////////////////////////
?>
<!----------------------------------添加收货地址---开始------------------------------------------------------------------------------->
<style type="text/css">
    .linetd{font-size:12px;}
	.linediv{float:left; padding-right:5px;}
	.overlay{
		position:fixed;
		top:0px;
		bottom:0px;
		left:0px;
		right:0px;
		z-index:99999;
		opacity:0.3; filter: alpha(opacity=50); background-color:#000; 
	}

	.box{
		position:fixed;
		top:-500px;
		left:37%;
		right:37%;
		background-color:#fff;
		color:#7F7F7F;
		z-index:999999;
		}
		a.boxclose{
			float:right;
			width:50px;
			height:26px;				
			margin-top:-35px;
			cursor:pointer;
		}
#frmModifyPassword {font-family: "Microsoft YaHei",arial,"宋体";}
#layer_wrap {overflow:hidden; background-color:#FFFFFF;}
.pass_confirm {width:494px; height:300px; border:3px solid #e7e7e7;}
.inner {position:relative;}
.pop_tit {width:494px; height:110px; margin-bottom:20px; border-bottom:1px solid #e7e7e7;}
.pop_tit h3 {width:100%; height:38px; background-color:#fa9551; font-size:18px; color:#fff; padding:5px 0 0 20px;}
.pop_tit p {width:100%; display:inline-block; text-align:center; margin-top:10px;}
.pass_confirm .passbox {margin-left:80px; height:35px; color:#666;}
.pass_confirm span {width:115px; display:inline-block; margin-right:10px;}
.pass_confirm input.txt {height:21px; padding:2px 0 0 4px; border:1px solid #ccc; line-height:18px;}
.pass_confirm .ok_btn {position:absolute; width:96px; height:27px; left:200px; top:120px;}
#btnCheckSubmit {border:0; height:27px;}
</style>
    <div class="overlay" id="overlay" style="display:none;"></div>
    <div class="box" id="box">
        
	<form id="fregisterform" name="fregisterform" action="" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
		<div class="pass_confirm" id="layer_wrap">
        	<div class="pop_tit">
            	<h3>修改登陆密码</h3><a class="boxclose" id="boxclose"> 关闭</a>
                <p>띄어쓰기 없는 영문 대문자, 영문 소문자, 숫자,<br>
                특수기호 포함 8~16자 사용가능</p> 
            </div>
        	<div class="inner">
            	<div class="passbox">
                	<span>请输入现有的密码</span>
                    <input name="old_mb_password" class="txt" id="old_mb_password" required style="width:200px;" type="password"/>
                </div>
            	<div class="passbox">
                	<span>请输入新的密码</span>
                    <input name="mb_password" class="txt" id="reg_mb_password" style="width:200px;" required type="password" minlength="8" maxlength="16"/ title="密码">
                </div>
                <div class="passbox">
                	<span>请再输入新的密码</span>
                    <input name="mb_password_re" class="txt" id="reg_mb_password_re" style="width:200px;" required type="password" minlength="8" maxlength="16" title="密码"/>
                </div>
                <div class="ok_btn">
                    <input type="image" src="/images/btn_pass_ok.png"  id="btn_submit" accesskey="s" />
                </div>                
            </div>
        </div>
    </form>
        
    </div>                
<script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('#activator').click(function () {
				$('#overlay').fadeIn('fast', function () {
					$('#box').animate({ 'top': '150px' }, 500);
				});
			});
			$('#boxclose').click(function () {
				$('#box').animate({ 'top': '-500px' }, 500, function () {
					$('#overlay').fadeOut('fast');
				});
			});
		});
	});
</script>
<!----------------------------------添加收货地址--结束-------------------------------------------------------------------------------->

<script>
// submit 최종 폼체크
function fregisterform_submit(f)
{
	// 회원아이디 검사

	if (f.w.value == "") {
		if (f.mb_password.value.length < 3) {
			alert("密码请 输入3字符以上.");
			f.mb_password.focus();
			return false;
		}
	}

	if (f.mb_password.value != f.mb_password_re.value) {
		alert("两次密码输入不同.");
		f.mb_password_re.focus();
		return false;
	}

	if (f.mb_password.value.length > 0) {
		if (f.mb_password_re.value.length < 3) {
			alert("密码请 输入3字符以上.");
			f.mb_password_re.focus();
			return false;
		}
	}

	document.getElementById("btn_submit").disabled = "disabled";

	return true;
}
</script>



		<h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3>
		<? include ("member_left.php");?>   
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            我的基本消息
            </h4>
            <form action="" method="post">
            <input type="hidden" name="type" value="update" />
            <table class="My_Information" summary="기본정보 수정 입력 폼 입니다. 이름, 아이디, 비밀번호, 이메일, 휴대폰번호, 전화번호, 생년월일을 수정하실 수 있습니다.">
                <colgroup>
                	<col style="width:20%;"></col>
                    <col></col>
                </colgroup>
                <tbody>                
                	<tr style="border-top:2px solid #dfdfdf">
                    	<th>用户名称</th>
                        <td><?=$member[mb_id]?></td>
                    </tr>
                	<tr>
                    	<th>修改密码</th>
                        <td>
                        	<a href="#" id="activator"><img src="/images/btn_change_pw.png" alt="修改密码"/></a>
                        </td>
                    </tr> 
                    <tr>
                    	<th>邮箱</th>
                        <td>
                        	<?=$member[mb_email]?><a href="/shop/mypage01_1_1.php"><button id="btnChangeMail" type="button" style="margin-left:20px;"><img src="/images/btn_change_email.png" alt="修改电子邮件"/></button></a>
                        </td>
                    </tr>
                    <tr>
                    	<th>真实姓名</th>
                        <td>
                        	<input name="mb_name" class="txt" type="text" maxlength="20" value="<?=$member[mb_name]?>" title="姓名" style="width:370px">
                        </td>
                    </tr>
                    <tr>
                    	<th>性别</th>
                        <td>
                        	<label><input name="mb_sex" id="sex_1" type="radio" <? if($member[mb_sex]==""){ echo "checked=\"checked\"";}?> value=""> 保密</label>
                            <label><input name="mb_sex" id="sex_2" type="radio" <? if($member[mb_sex]=="F"){ echo "checked=\"checked\"";}?> style="margin-left:15px" value="F"> 女</label>
                            <label><input name="mb_sex" id="sex_3" type="radio" <? if($member[mb_sex]=="M"){ echo "checked=\"checked\"";}?> style="margin-left:15px" value="M"> 男</label>
                        </td>
                    </tr>
                    <tr>
                    	<th>出生年日</th>
                        <td>
                        	<select name="birth_y" title="选择出生年度" id="select_BirYear" style="width:80px">
                              <?php for ($y=1940; $y<=2016; $y++){?>
                            	<option value="<?=$y?>" <? if($y=="$birth_y"){ echo "selected=\"selected\"";}else if($y=="1988"){ echo "selected=\"selected\"";}?>><?=$y?></option>
                              <? } ?>  
                            </select> 年
                            <select name="birth_m" title="选择出生月" id="select_BirMonth" style="width:50px; margin-left:15px">
                              <?php for ($m=1; $m<=12; $m++){?>
                            	<option value="<?=$m?>" <? if($m=="$birth_m"){ echo "selected=\"selected\"";}?>><?=$m?></option>
                              <? } ?> 
                            </select> 月
                            <select name="birth_d" title="选择出生年日" id="select_BirDay" style="width:50px; margin-left:15px">
                              <?php for ($d=1; $d<=31; $d++){?>
                            	<option value="<?=$d?>" <? if($d=="$birth_d"){ echo "selected=\"selected\"";}?>><?=$d?></option>
                              <? } ?> 
                            </select> 日
                        </td>
                    </tr>  
                    <tr>
                    	<th>详细地址</th>
                        <td><?=$row[ad_addr1]?> - <?=$row[ad_addr2]?> - <?=$row[ad_addr3]?> - <?=$row[ad_jibeon]?><a href="/shop/member_address.php?w=u&id=<?=$row[ad_id]?>" style="margin-left:20px;"><img src="/images/btn_change_add.png" alt="修改地址"/></a></td>
                    </tr>  
                    <tr>
                    	<th>ＱＱ & 微信</th>
                        <td><input name="mb_1" class="txt" type="text" value="<?=$member[mb_1]?>" title="ＱＱ" style="width:370px" placeholder="请输入QQ号码 或 微信账号"></input></td>
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
            </div>
           </form>
        </div>
        <!--e: RIGHT CONTENTS-->



<?php  include_once('./_tail.php'); ?>
