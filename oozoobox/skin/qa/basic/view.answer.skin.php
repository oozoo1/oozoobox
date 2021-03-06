<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<div class="div-title-wrap">
	<div class="div-title"><i class="fa fa-comment fa-lg lightgray"></i> <b><?php echo get_text($answer['qa_subject']); ?></b></div>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="ans-content">
	<?php echo conv_content($answer['qa_content'], $answer['qa_html']); ?>
</div>

<p class="text-right text-muted">
	<i class="fa fa-clock-o"></i> <?php echo apms_datetime(strtotime($answer['qa_datetime']), 'Y.m.d H:i'); //시간 ?>
</p>

<div class="ans-btn">
	<a href="<?php echo $rewrite_href; ?>" class="btn btn-color btn-sm pull-left"><i class="fa fa-comments"></i> 추가질문</a>
	<?php if($answer_update_href) { ?>
		<a href="<?php echo $answer_update_href; ?>" class="btn btn-black btn-sm"><i class="fa fa-plus"></i> 답변수정</a>
	<?php } ?>
	<?php if($answer_delete_href) { ?>
		<a href="<?php echo $answer_delete_href; ?>" class="btn btn-black btn-sm" onclick="del(this.href); return false;"><i class="fa fa-times"></i> 답변삭제</a>
	<?php } ?>
</div>
