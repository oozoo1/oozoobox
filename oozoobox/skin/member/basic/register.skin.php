<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

if($header_skin)
	include_once('./header.php');

?>

<div class="alert alert-info" role="alert">
	<strong><i class="fa fa-exclamation-circle fa-lg"></i> 您在申请注册流程中点击同意前，会员注册协议 与 《法律声明及隐私权政策》.</strong>
</div>

<form  name="fregister" id="fregister" action="<?php echo $action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off" class="form" role="form">
	<div class="panel panel-default">
		<div class="panel-heading"><strong><i class="fa fa-file-text-o fa-lg"></i> 会员注册协议</strong></div>
		<div class="panel-body">
			<?php if($provision) { ?>
				<div class="register-term">
					<?php echo $provision; ?>
				</div>
			<?php } else { ?>
				<textarea class="form-control input-sm" rows="10" readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
			<?php } ?>
		</div>
		<div class="panel-footer">
            <label><input type="checkbox" name="agree" value="1" id="agree11"> 同意以上协议.</label>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><i class="fa fa-user fa-lg"></i> 法律声明及隐私权政策</strong>
		</div>
		<?php if($privacy) { ?>
			<div class="panel-body">
				<div class="register-term">
					<?php echo $privacy; ?>
				</div>
			</div>
		<?php } ?>

		<div class="panel-footer">
            <label><input type="checkbox" name="agree2" value="1" id="agree21"> 同意以上协议.</label>
		</div>
	</div>

    <div class="text-center">
        <button type="submit" class="btn btn-color">下一步</button>
    </div>
</form>

<script>
    function fregister_submit(f) {
        if (!f.agree.checked) {
            alert("同意 会员注册协议后 才可以进行下一步.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("同意 法律声明及隐私权政策协议后 才可以进行下一步.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
</script>
