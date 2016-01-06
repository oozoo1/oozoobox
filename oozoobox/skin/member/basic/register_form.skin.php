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
<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
	<script src="<?php echo G5_JS_URL ?>/certify.js"></script>
<?php } ?>

<form class="form-horizontal register-form" role="form" id="fregisterform" name="fregisterform" action="<?php echo $action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
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

	<div class="panel panel-default">
		<div class="panel-heading"><strong><i class="fa fa-star fa-lg"></i> 网站注册内容</strong></div>
		<div class="panel-body">

			<div class="form-group has-feedback text-gap">
				<label class="col-sm-2 control-label" for="reg_mb_id"><b>아이디</b><strong class="sound_only">必填项</strong></label>
				<div class="col-sm-3">
					<input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> class="form-control input-sm" minlength="3" maxlength="20">
					<span class="fa fa-check form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8 text-muted">
					<div id="msg_mb_id"></div>
					只能输入 英文, 数字, _ 符号 . 请输入 最少 3字符以上.
				</div>
			</div>

			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label" for="reg_mb_password"><b>密码</b><strong class="sound_only">必填项</strong></label>
				<div class="col-sm-3">
					<input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="form-control input-sm" minlength="3" maxlength="20">
					<span class="fa fa-lock form-control-feedback"></span>
				</div>
				<label class="col-sm-2 control-label" for="reg_mb_password_re"><b>密码确认</b><strong class="sound_only">必填项</strong></label>
				<div class="col-sm-3">
					<input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="form-control input-sm" minlength="3" maxlength="20">
					<span class="fa fa-check form-control-feedback"></span>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><strong><i class="fa fa-user fa-lg"></i> 个人资料</strong></div>
		<div class="panel-body">

			<div class="form-group has-feedback text-gap">
				<label class="col-sm-2 control-label" for="reg_mb_name"><b>姓名</b><strong class="sound_only">必填项</strong></label>
				<div class="col-sm-3">
					<input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> class="form-control input-sm" size="10">
					<span class="fa fa-check form-control-feedback"></span>
				</div>
				<?php if($config['cf_cert_use']) { ?>
					<div class="col-sm-7">
						<div class="cert-btn">
							<?php 
								if($config['cf_cert_ipin'])
									echo '<button type="button" id="win_ipin_cert" class="btn btn-black btn-sm">아이핀 본인확인</button>'.PHP_EOL;
								if($config['cf_cert_hp'])
									echo '<button type="button" id="win_hp_cert" class="btn btn-black btn-sm">휴대폰 본인확인</button>'.PHP_EOL;
							?>
						</div>
					</div>
				<?php } ?>
			</div>

			<?php if($config['cf_cert_use']) { ?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8 text-muted">
						<?php
						if ($config['cf_cert_use'] && $member['mb_certify']) {
							if($member['mb_certify'] == 'ipin')
								$mb_cert = '아이핀';
							else
								$mb_cert = '휴대폰';
						?>
							<span class="black" id="msg_certify">
								[<strong><?php echo $mb_cert; ?> 본인확인</strong><?php if ($member['mb_adult']) { ?> 및 <strong>성인인증</strong><?php } ?> 완료]
							</span>
						<?php } ?>
						아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.
						<noscript>본인확인을 위해서는 자바스크립트 사용이 가능해야합니다.</noscript>
					</div>
				</div>
			<?php } ?>

			<?php if ($req_nick) {  ?>
				<div class="form-group has-feedback text-gap">
					<label class="col-sm-2 control-label" for="reg_mb_nick"><b>昵称</b><strong class="sound_only">必填项</strong></label>
					<div class="col-sm-3">
						<input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick']) ? get_text($member['mb_nick']) : ''; ?>">
						<input type="text" name="mb_nick" value="<?php echo isset($member['mb_nick']) ? get_text($member['mb_nick']) : ''; ?>" id="reg_mb_nick" required class="form-control input-sm nospace" size="10" maxlength="20">
						<span class="fa fa-user form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8 text-muted">
						<div id="msg_mb_nick"></div>
						为了避免 邮件遗失 请输入真实姓名 <?php echo (int)$config['cf_nick_modify'] ?>日内 你将无法修改 姓名.
					</div>
				</div>
			<?php }  ?>

			<div class="form-group has-feedback<?php echo ($config['cf_use_email_certify']) ? ' text-gap' : '';?>">
				<label class="col-sm-2 control-label" for="reg_mb_email"><b>E-mail</b><strong class="sound_only">必填项</strong></label>
				<div class="col-sm-5">
					<input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
					<input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="form-control input-sm email" size="70" maxlength="100">
					<span class="fa fa-envelope form-control-feedback"></span>
				</div>
			</div>
			<?php if ($config['cf_use_email_certify']) {  ?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8 text-muted">
						<?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
						<?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
					</div>
				</div>
			<?php }  ?>

			<?php if ($config['cf_use_homepage']) {  ?>
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="reg_mb_homepage"><b>个人主页</b><?php if ($config['cf_req_homepage']){ ?><strong class="sound_only">必填项</strong><?php } ?></label>
					<div class="col-sm-5">
						<input type="text" name="mb_homepage" value="<?php echo get_text($member['mb_homepage']) ?>" id="reg_mb_homepage" <?php echo $config['cf_req_homepage']?"required":""; ?> class="form-control input-sm" size="70" maxlength="255">
						<span class="fa fa-home form-control-feedback"></span>
					</div>
				</div>
			<?php }  ?>

			<?php if ($config['cf_use_tel']) {  ?>
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="reg_mb_tel"><b>电话号码</b><?php if ($config['cf_req_tel']) { ?><strong class="sound_only">必填项</strong><?php } ?></label>
					<div class="col-sm-3">
						<input type="text" name="mb_tel" value="<?php echo get_text($member['mb_tel']) ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> class="form-control input-sm" maxlength="20">
						<span class="fa fa-phone form-control-feedback"></span>
					</div>
				</div>
			<?php }  ?>

			<?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="reg_mb_hp"><b>手机号码</b><?php if ($config['cf_req_hp']) { ?><strong class="sound_only">必填项</strong><?php } ?></label>
					<div class="col-sm-3">
						<input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="form-control input-sm" maxlength="20">
						<span class="fa fa-mobile form-control-feedback"></span>
						<?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
							<input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
						<?php } ?>
					</div>
				</div>
			<?php }  ?>
            <? if($w=="u"){?>
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label"><b>地址</b><strong class="sound_only">필수</strong></label>
					<div class="col-sm-8">
                        <div id="sel" style="width:400px;">
                            <select onChange="getCity(this)" name="mb_addr1" required style="width:110px; border:solid 1px #cccccc; padding:10px; margin-right:5px;">
                            <? if($member[mb_addr1]){?>
                                <option value=""><?=$member[mb_addr1]?></option>
                            <? }else{ ?>
                                <option value="">请选择--省</option>
                            <? } ?>
                            </select>
                            <select onChange="getCity(this)" name="mb_addr2" required style="width:110px; border:solid 1px #cccccc; padding:10px; margin-right:5px;">
                            <? if($member[mb_addr2]){?>
                                <option value=""><?=$member[mb_addr2]?></option>
                            <? }else{ ?>
                                <option value="">请选择--市</option>
                            <? } ?>                                
                            </select>
                            <select onChange="getCity(this)" name="mb_addr3" required style="width:110px; border:solid 1px #cccccc; padding:10px;">
                            <? if($member[mb_addr3]){?>
                                <option value=""><?=$member[mb_addr3]?></option>
                            <? }else{ ?>
                                <option value="">请选择--镇</option>
                            <? } ?>
                            </select> 
                        </div>
					</div>
				</div>
             <? } ?>   
                

		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><strong><i class="fa fa-cog fa-lg"></i> 其他内容</strong></div>
		<div class="panel-body">

			<?php if ($config['cf_use_signature']) {  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="reg_mb_signature"><b>心情一句话</b><?php if ($config['cf_req_signature']){ ?><strong class="sound_only">必填项</strong><?php } ?></label>
					<div class="col-sm-8">
						<textarea name="mb_signature" rows=5 id="reg_mb_signature" <?php echo $config['cf_req_signature']?"required":""; ?> class="form-control input-sm"><?php echo $member['mb_signature'] ?></textarea>
					</div>
				</div>
			<?php }  ?>

			<?php if ($config['cf_use_profile']) {  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="reg_mb_profile"><b>个人简介</b><?php if ($config['cf_req_profile']){ ?><strong class="sound_only">必填项</strong><?php } ?></label>
					<div class="col-sm-8">
						<textarea name="mb_profile" rows=5 id="reg_mb_profile" <?php echo $config['cf_req_profile']?"required":""; ?> class="form-control input-sm"><?php echo $member['mb_profile'] ?></textarea>
					</div>
				</div>
			<?php }  ?>

			<?php if ($config['cf_use_member_icon'] && $member['mb_level'] >= $config['cf_icon_level']) {  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="reg_mb_profile"><b>회원아이콘</b></label>
					<div class="col-sm-8">
						<input type="file" name="mb_icon" id="reg_mb_icon">
						<?php if ($w == 'u' && file_exists($mb_icon_path)) {  ?>
							<label for="del_mb_icon">
								<img src="<?php echo $mb_icon_url ?>" alt="회원아이콘">
								<input type="checkbox" name="del_mb_icon" value="1" id="del_mb_icon"> 삭제
							</label>
						<?php }  ?>
						<span class="help-block">
							이미지 크기는 가로 <?php echo $config['cf_member_icon_width'] ?>픽셀, 세로 <?php echo $config['cf_member_icon_height'] ?>픽셀 이하로 해주세요.
							gif만 가능하며 용량 <?php echo number_format($config['cf_member_icon_size']) ?>바이트 이하만 등록됩니다.
						</span>
					</div>
				</div>
			<?php }  ?>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="reg_mb_mailling"><b>邮件服务</b></label>
				<div class="col-sm-8">
					<label class="control-label">
						<input type="checkbox" name="mb_mailling" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?>>
						同意接收邮件服务.
					</label>
				</div>
			</div>

			<?php if ($config['cf_use_hp']) {  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="reg_mb_sms"><b>短信服务</b></label>
					<div class="col-sm-8">
						<label class="control-label">
							<input type="checkbox" name="mb_sms" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?>>
							同意接收短信服务.
						</label>
					</div>
				</div>
			<?php }  ?>

			<?php if (isset($member['mb_open_date']) && $member['mb_open_date'] <= date("Y-m-d", G5_SERVER_TIME - ($config['cf_open_modify'] * 86400)) || empty($member['mb_open_date'])) { // 정보공개 수정일이 지났다면 수정가능  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="reg_mb_open"><b>公开个人信息</b></label>
					<div class="col-sm-8">
						<label class="control-label">
							<input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>">
							<input type="checkbox" name="mb_open" value="1" <?php echo ($w=='' || $member['mb_open'])?'checked':''; ?> id="reg_mb_open">
							其他会员 可看到您的个人信息.
						</label>
						<span class="help-block">
							公开个人信息后将 <?php echo (int)$config['cf_open_modify'] ?>日内 无法关闭公开内容.
						</span>
					</div>
				</div>
			<?php } else {  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"><b>정보공개</b></label>
					<div class="col-sm-8">
						<span class="help-block">
							정보공개는 수정후 <?php echo (int)$config['cf_open_modify'] ?>일 이내, <?php echo date("Y년 m월 j일", isset($member['mb_open_date']) ? strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400:G5_SERVER_TIME+$config['cf_open_modify']*86400); ?> 까지는 변경이 안됩니다.<br>
							이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
						</span>
						<input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>">
					</div>
				</div>
			<?php } ?>

			<?php if ($w == "" && $config['cf_use_recommend']) {  ?>
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" for="reg_mb_recommend"><b>推荐人账号</b></label>
					<div class="col-sm-3">
						<input type="text" name="mb_recommend" id="reg_mb_recommend" class="form-control input-sm">
						<span class="fa fa-user form-control-feedback"></span>
					</div>
				</div>
			<?php }  ?>
		</div>
	</div>

	<div class="text-center" style="margin:30px 0px;">
		<button type="submit" id="btn_submit" class="btn btn-color" accesskey="s"><?php echo $w==''?'会员注册':'信息修改'; ?></button>
		<a href="<?php echo G5_URL ?>" class="btn btn-black" role="button">取消</a>
	</div>

</form>

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
