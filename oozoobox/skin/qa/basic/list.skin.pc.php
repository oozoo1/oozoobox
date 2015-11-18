<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 6;
if ($is_checkbox) $colspan++;

?>

<div class="table-responsive">
	<table class="div-table table list-pc bg-white">
	<thead>
	<tr class="list-head">
	<?php if ($is_checkbox) { ?>
		<th scope="col">
			<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
			<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
		</th>
	<?php } ?>
	<th scope="col">번호</th>
	<th scope="col">분류</th>
	<th scope="col">제목</th>
	<th scope="col">글쓴이</th>
	<th scope="col">상태</th>
	<th scope="col">등록일</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$n = $list_cnt;
	for ($i=0; $i<$list_cnt; $i++) {
	?>
	<tr>
		<?php if ($is_checkbox) { ?>
			<td class="text-center">
				<label for="chk_qa_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject']; ?></label>
				<input type="checkbox" name="chk_qa_id[]" value="<?php echo $list[$i]['qa_id'] ?>" id="chk_qa_id_<?php echo $i ?>">
			</td>
		<?php } ?>
		<td class="text-center font-11"><?php echo ($list[$i]['num']) ? $list[$i]['num'] : $n; ?></td>
		<td class="text-center text-muted font-11"><?php echo $list[$i]['category']; ?></td>
		<td class="list-subject">
			<a href="<?php echo $list[$i]['view_href']; ?>">
				<img src="<?php echo $skin_url;?>/img/icon_<?php echo ($list[$i]['qa_status'] ? 'a' : 'q'); ?>.gif" alt="">
				<?php echo $list[$i]['subject']; ?>
				<?php echo $list[$i]['icon_file']; ?>
			</a>
		</td>
		<td><b><?php echo $list[$i]['name']; ?></b></td>
		<td class="text-center font-11 <?php echo ($list[$i]['qa_status'] ? 'red' : 'text-muted'); ?>"><?php echo ($list[$i]['qa_status'] ? '답변완료' : '답변대기'); ?></td>
		<td class="text-right en font-11"><?php echo apms_datetime(strtotime($list[$i]['qa_datetime'])); ?></td>
	</tr>
	<?php $n--;} ?>

	<?php if ($i == 0) { echo '<tr><td colspan="'.$colspan.'" class="text-center text-muted list-none">게시물이 없습니다.</td></tr>'; } ?>
	</tbody>
	</table>
</div>
