<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

?>

<div class="mypost-skin">
<?php
	switch($mode) {
		case '4'	: $skin_file = 'item.use.skin.php'; break;
		default		: $skin_file = 'item.use.skin.php'; break;
	}
	include_once($skin_path.'/mypost/'.$skin_file);
?>
</div>
<?php if($total_count > 0) { ?>
	<div class="text-center">
		<ul class="pagination pagination-sm en" style="margin-top:10px;">
			<?php echo apms_paging($write_page_rows, $page, $total_page, $list_page); ?>
		</ul>
	</div>
<?php } ?>

<script>
$(function() {
	$("a.view_image").click(function() {
		window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
		return false;
	});
});
</script>