<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<?php if($category_option) { ?>
	<div class="clearfix h15 hidden-xs"></div>
<?php } ?>
<p>
	Total <b><?php echo number_format($total_count);?></b> Questions, Now <b><?php echo $page;?></b> Page
</p>
<div class="list-mobile font-14">
	<?php for ($i=0; $i<$list_cnt; $i++) { 
		$photo = apms_photo_url($list[$i]['mb_id']); // 회원사진
		$list_img = ($list_img_url) ? '<img src="'.$list_img_url.'" alt="" class="media-object">' : '<div class="media-object"><i class="fa fa-comment"></i></div>';
		$list_date = strtotime($list[$i]['qa_datetime']);	
	?>
		
		<div class="list-item media<?php echo $div_css;?>">
			<div class="list-img pull-left">
				<a href="<?php echo $list[$i]['href'] ?>">
					<?php if($photo) { ?>
						<img src="<?php echo $photo;?>" alt="">
					<?php } else { ?>
						<i class="fa fa-user"></i>
					<?php } ?>
				</a>
			</div>
			<div class="media-body">
				<strong class="media-heading">
					<a href="<?php echo $list[$i]['view_href'] ?>">
						<?php echo ($list[$i]['qa_status']) ? '<span class="red">[답변]</span>' : '<span class="blue">[문의]</span>';?>
						<?php echo $list[$i]['subject'] ?>
					</a>
				</strong>
			</div>
		</div>
	<?php } ?>
	<?php if (!$i) { ?>
		<div class="text-center text-muted list-none">게시물이 없습니다.</div>
	<?php } ?>
</div>
