<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

if($header_skin)
	include_once('./header.php');


$ex1_filed = explode("|",$write[wr_1]); 
$ext1_00  = $ex1_filed[0];
$ext1_01  = $ex1_filed[1];
$ext1_02  = $ex1_filed[2];
$ext1_03  = $ex1_filed[3];
$ext1_04  = $ex1_filed[4];
$ext1_05  = $ex1_filed[5];
$ext1_06  = $ex1_filed[6];
$ext1_07  = $ex1_filed[7];
$ext1_08  = $ex1_filed[8];
$ext1_09  = $ex1_filed[9];
?>
<script type="text/javascript"  src="/js/ct.js"></script>  
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script> 
<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
	<script src="<?php echo G5_JS_URL ?>/certify.js"></script>
<?php } ?>





<style type="text/css">
<!--
html { overflow-y: scroll; }
body,td,th {
	font-size: 12px; font-family:微软雅黑;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(<?=$skin_url?>/images/login_bg.jpg);
	background-repeat: repeat-x;
	background-color: #eeeeee;
}
/*** 기본버튼 **/
.btn.btn-color { 
	border: 1px solid #f47a22; 
	border-image: none; 
	color: rgb(255, 255, 255) !important; 
	background-color: #f5944f; 
	background-image: none;
	padding:10px 20px 10px 20px;
}
.btn.active.btn-color, .btn.btn-color:hover, .btn.btn-color:focus, .btn.btn-color:active { 
	border-color: #f47a22; 
	color: rgb(255, 255, 255) !important; 
	background-color: #f47a22; 
	background-image: none; 
	padding:10px 20px 10px 20px;
}
.r_input{border:solid 1px #d9d9d9; width:240px; height:31px; color:#bdbdbd;}
-->
</style>
<script type="text/javascript"><!--自动检查账号是否被注册-->
	$(
	  function()
	  	{    
		//账号   jQuery(普通应用时推荐，简单易用)
    	$("#reg_mb_id").blur(function()
								 {        //文本框鼠标焦点消失事件
			 						$.get("./member_ck_id.php?user="+$("#reg_mb_id").val(),null,function(data)   //此处get方式 可换为post方式按需求调整，其他无需修改使用方式一样
      		 					 	{
          		  						$("#chk").html(data);   //向ID为chk的元素内添加html代码
       		 						}
			 						);
       	 						}
						)		
						
		//邮箱   jQuery(普通应用时推荐，简单易用)
    	$("#reg_mb_email").blur(function()
								 {        //文本框鼠标焦点消失事件
			 						$.get("./member_ck_id.php?e_mail="+$("#reg_mb_email").val(),null,function(data)   //此处get方式 可换为post方式按需求调整，其他无需修改使用方式一样
      		 					 	{
          		  						$("#email").html(data);   //向ID为chk的元素内添加html代码
       		 						}
			 						);
       	 						}
						)		
			
						
						     
		}
	)
</script> 
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
<form class="form-horizontal register-form" role="form" id="fregisterform" name="fregisterform" action="<?php echo $action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="mb_nick" value="<? echo date("Ymdhis");?>">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="url" value="<?php echo $urlencode ?>">
	<input type="hidden" name="agree" value="<?php echo $agree ?>">
	<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
	<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
	<input type="hidden" name="cert_no" value="">
	<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
	<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
		<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
		<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
	<?php }  ?>
  <tr>
    <td height="162" colspan="2" valign="top" style="padding-top:20px;"><a href="/"><img src="<?=$skin_url?>/images/join_logo.png" border="0"></a></td>
  </tr>
  <tr>
    <td width="559" height="438" valign="top" background="<?=$skin_url?>/images/join_box_bg.png" style="padding-top:35px;">
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td><font style="font-family:微软雅黑; font-size:18px; color:#888888; font-weight:bold;">基本注册信息</font></td>
            <td align="right"><a href="/bbs/login.php"><img src="<?=$skin_url?>/images/join_login_bt.png" border="0"></a></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td height="35"></td>
          </tr>
          <tr>
            <td>
              <table width="420" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="100" height="50"><img src="<?=$skin_url?>/images/join_title_01.png"></td>
                  <td><input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> minlength="3" maxlength="20" class="r_input" placeholder="请输入,英文,数字,用户名"></td>
                  <td width="70" align="left"><span id="chk"></span></td>
                </tr>
                <tr>
                  <td width="100" height="50"><img src="<?=$skin_url?>/images/join_title_02.png"></td>
                  <td><input type="text" id="reg_mb_name" name="mb_name" <?php echo $required ?> <?php echo $readonly; ?> class="r_input" size="10" placeholder="请输入真实姓名"></td>
                  <td width="70" align="left"><span id="chk"></span></td>
                </tr>
                <tr>
                  <td height="50"><img src="<?=$skin_url?>/images/join_title_03.png"></td>
                  <td><input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="r_input" minlength="3" maxlength="20" placeholder="请输入密码"></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td height="50"><img src="<?=$skin_url?>/images/join_title_04.png"></td>
                  <td><input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="r_input" minlength="3" maxlength="20" onKeyUp="validate()"  placeholder="请再次输入密码"></td>
                  <td align="left"><span id="tishi"></span></td>
                </tr>
                <tr>
                  <td height="50"><img src="<?=$skin_url?>/images/join_title_05.png"></td>
                  <td><input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="r_input" size="70" maxlength="100" placeholder="请输入E-mail地址"></td>
                  <td><span id="email"></span></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td height="30"></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td style="color:#727272;" align="left">
              <label>
                <input name="mb_mailling" type="checkbox" id="reg_mb_mailling" value="1" checked="checked">
                同意接收邮件服务.
              </label>
              <label>
                <input name="mb_open" type="checkbox" id="reg_mb_open" value="1" checked="checked">
                其他会员 可看到您的个人信息.
              </label>
            </td>
            <td align="right"><button type="submit" class="btn btn-color">下一步</button></td>
          </tr>
        </table>
    </td>
    <td align="center" valign="top"><img src="<?=$skin_url?>/images/join_font.png"></td>
  </tr>
  <tr>
    <td align="center" height="50"><img src="<?=$skin_url?>/images/join_bottom_img.png"></td>
    <td></td>
  </tr>
<script>
		function validate() {
				var pw1 = document.getElementById("reg_mb_password").value;
				var pw2 = document.getElementById("reg_mb_password_re").value;
				if(pw1 == pw2) {
						document.getElementById("tishi").innerHTML="<img src=\"images/member_ck_ok.gif\" class=\"t1\"/>";
						document.getElementById("submit").disabled = false;
				}
				else {
						document.getElementById("tishi").innerHTML="<font color=red>两次不同</font>";
					document.getElementById("submit").disabled = true;
				}
		}
</script>
</form>
</table>
<script>
$(function() {
	$("#reg_zip_find").css("display", "inline-block");

	<?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
	// 아이핀인증
	$("#win_ipin_cert").click(function() {
		if(!cert_confirm())
			return false;

		var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
		certify_win_open('kcb-ipin', url);
		return;
	});

	<?php } ?>
	<?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
	// 휴대폰인증
	$("#win_hp_cert").click(function() {
		if(!cert_confirm())
			return false;

		<?php
		switch($config['cf_cert_hp']) {
			case 'kcb':
				$cert_url = G5_OKNAME_URL.'/hpcert1.php';
				$cert_type = 'kcb-hp';
				break;
			case 'kcp':
				$cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
				$cert_type = 'kcp-hp';
				break;
			case 'lg':
				$cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
				$cert_type = 'lg-hp';
				break;
			default:
				echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
				echo 'return false;';
				break;
		}
		?>

		certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
		return;
	});
	<?php } ?>
});

// submit 최종 폼체크
function fregisterform_submit(f)
{
	// 회원아이디 검사
	if (f.w.value == "") {
		var msg = reg_mb_id_check();
		if (msg) {
			alert(msg);
			f.mb_id.select();
			return false;
		}
	}

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

	// 이름 검사
	if (f.w.value=="") {
		if (f.mb_name.value.length < 1) {
			alert("请输入真实姓名.");
			f.mb_name.focus();
			return false;
		}

		/*
		var pattern = /([^가-힣\x20])/i;
		if (pattern.test(f.mb_name.value)) {
			alert("이름은 한글로 입력하십시오.");
			f.mb_name.select();
			return false;
		}
		*/
	}

	<?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
	// 본인확인 체크
	if(f.cert_no.value=="") {
		alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
		return false;
	}
	<?php } ?>

	// 닉네임 검사
	if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
		var msg = reg_mb_nick_check();
		if (msg) {
			alert(msg);
			f.reg_mb_nick.select();
			return false;
		}
	}

	// E-mail 검사
	if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
		var msg = reg_mb_email_check();
		if (msg) {
			alert(msg);
			f.reg_mb_email.select();
			return false;
		}
	}

	<?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
	// 휴대폰번호 체크
	var msg = reg_mb_hp_check();
	if (msg) {
		alert(msg);
		f.reg_mb_hp.select();
		return false;
	}
	<?php } ?>

	if (typeof f.mb_icon != "undefined") {
		if (f.mb_icon.value) {
			if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
				alert("회원아이콘이 gif 파일이 아닙니다.");
				f.mb_icon.focus();
				return false;
			}
		}
	}

	if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
		if (f.mb_id.value == f.mb_recommend.value) {
			alert("본인을 추천할 수 없습니다.");
			f.mb_recommend.focus();
			return false;
		}

		var msg = reg_mb_recommend_check();
		if (msg) {
			alert(msg);
			f.mb_recommend.select();
			return false;
		}
	}

	<?php echo chk_captcha_js();  ?>

	document.getElementById("btn_submit").disabled = "disabled";

	return true;
}
</script>
