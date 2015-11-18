<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

$list_cnt = count($list);

?>
<div class="div-title-wrap">
	<div class="div-title"><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=<?php echo $bo_table ?>"><b><?php echo $bo_subject; ?></b></a></div>
	<div class="div-sep-wrap">
		<div class="div-sep sep-bold"></div>
	</div>
</div>

<div class="group-board">
	<ul>
	<?php for ($i=0; $i < $list_cnt; $i++) {  ?>
		<li>
			<a href="<?php echo $list[$i]['href'];?>">
				<?php if($list[$i]['wr_comment']) { ?>
					<span class="pull-right count red"><?php echo number_format($list[$i]['wr_comment']);?></span>
				<?php } ?>
				<span class="icon<?php echo ($list[$i]['icon_new']) ? ' red' : ' text-muted';?>">
					<i class="fa fa-caret-right"></i>
				</span>
				<?php echo $list[$i]['subject'];?>
			</a> 
		</li>
	<?php } ?>
	</ul>
</div>
<?php if($list_cnt == 0) { ?>
	<p class="text-muted text-center">글이 없습니다.</p>
<?php } ?>
