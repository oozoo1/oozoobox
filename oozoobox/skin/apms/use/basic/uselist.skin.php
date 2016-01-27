<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

// 헤더 출력
if($header_skin)
	include_once('./header.php');

if(!$wset['cont']) $wset['cont'] = 120;

$list_cnt = count($list);

?>
<style>
.sc_title_off{float:left;padding:12px 15px 12px 15px; border-left:solid 1px #f5f5f5; border-right:solid 1px #f5f5f5; color:#6d6d6d; border-right:solid 1px #e5e5e5;}
.sc_input{ width:45px; height:21px; border:solid 1px #e8e8e8; color:#6d6d6d;}

</style>
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
<form class="form" role="form" method="get" action="./itemuselist.php">
  <tr>
    <td bgcolor="#f5f5f5" style="border:solid 1px #e8e8e8;">
      <table width="988" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td>
            <div class="sc_title_off">
              <select name="ca_id" id="ca_id" class="form-control input-sm">
                <option value="">分类</option>
                <?php echo apms_category($ca_id);?>
              </select>
            </div>
            <div class="sc_title_off">
              <select name="sfl" id="sfl" class="form-control input-sm" style="width:120px;">
                <option value="">选择</option>
                <option value="b.it_name"    <?php echo get_selected($sfl, "b.it_name", true); ?>>商品名称</option>
                <option value="a.it_id"      <?php echo get_selected($sfl, "a.it_id"); ?>>商品号码</option>
                <option value="a.is_subject" <?php echo get_selected($sfl, "a.is_subject"); ?>>标题</option>
                <option value="a.is_name"    <?php echo get_selected($sfl, "a.is_id"); ?>>发布人</option>
                <option value="a.mb_id"      <?php echo get_selected($sfl, "a.mb_id"); ?>>发布人账号</option>
              </select>
            </div>
            <div class="sc_title_off">
							<input type="text" name="stx" value="<?php echo $stx; ?>" id="stx" style="height:28px; width:120px; border:solid 1px #ddd;" placeholder="搜索内容">
            </div>
          </td>          
          <td width="34"><button type="submit" style="border:solid 0px;"><img src="/images/sc_bt.png"></button></td>
          <td width="43"><a href="/shop/itemuselist.php"><img src="/images/sc_c.png"></a></td>
        </tr>
      </table>    
    </td>
  </tr>
</form>
</table>


<div class="div-box-light"> 
	总共 <b><?php echo number_format($total_count);?></b>个评论.
</div>

<div class="h20"></div>

<div class="use-media">	
	<?php 
		for ($i=0; $i < $list_cnt; $i++) { 
			// 이미지
			$img = apms_it_write_thumbnail($list[$i]['it_id'], $list[$i]['is_content'], 80, 80);
			$img['src'] = ($img['src']) ? $img['src'] : $list[$i]['is_photo'];
	?>
		<div class="div-title-wrap">
			<div class="div-title">
				<strong>
					<a href="<?php echo $list[$i]['is_href']; ?>">
						<?php echo $list[$i]['is_num']; ?>.<?php echo $list[$i]['is_subject']; ?>
					</a>
				</strong>
			</div>
			<div class="div-sep-wrap">
				<div class="div-sep sep-thin"></div>
			</div>
		</div>

		<div class="media">
			<div class="photo pull-left">
				<a href="<?php echo $list[$i]['is_href']; ?>">
					<?php echo ($img['src']) ? '<img src="'.$img['src'].'" alt="'.$img['src'].'">' : '<i class="fa fa-user"></i>'; ?>
				</a>
			</div>
			<div class="media-body">
				<div class="media-info text-muted">
					<?php echo apms_get_star($list[$i]['is_score'],'red font-14'); //별점 ?>
					<span class="sp"></span>
					<i class="fa fa-user"></i>
					<?php echo $list[$i]['is_name']; ?>
					<span class="hidden-xs">
						<span class="sp"></span>
						<i class="fa fa-clock-o"></i>
						<time datetime="<?php echo date('Y-m-d\TH:i:s+09:00', $list[$i]['is_time']) ?>"><?php echo apms_datetime($list[$i]['is_time'], 'Y.m.d H:i');?></time>
					</span>
				</div>
				<div class="media-content">
					<a href="<?php echo $list[$i]['is_href']; ?>">
						<span class="text-muted"><?php echo apms_cut_text($list[$i]['is_content'], $wset['cont'], '… <span class="font-11 text-muted">더보기</span>'); ?></span>
					</a>
				</div>
				<div class="media-heading">
					<a href="<?php echo $list[$i]['it_href']; ?>">
						<span class="font-11 text-muted"><i class="fa fa-cube"></i> <?php echo $list[$i]['it_name']; ?></span>
					</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<?php if(!$i) { ?>
	<div class="use-none text-center text-muted">没有内容.</div>
<?php } ?>

<div class="text-center">
	<ul class="pagination pagination-sm">
		<?php echo apms_paging($write_pages, $page, $total_page, $list_page); ?>
	</ul>
</div>

<?php if ($is_admin || $setup_href) { ?>
	<div class="text-center">
		<?php if($is_admin) { ?>
			<a class="btn btn-black btn-sm" href="<?php echo G5_ADMIN_URL;?>/apms_admin/apms.admin.php?ap=thema"><i class="fa fa-cog"></i> 설정</a>
		<?php } ?>
		<?php if($setup_href) { ?>
			<a class="btn btn-color btn-sm win_memo" href="<?php echo $setup_href;?>"><i class="fa fa-cogs"></i> 스킨설정</a>
		<?php } ?>
		<div class="h30"></div>
	</div>
<?php } ?>