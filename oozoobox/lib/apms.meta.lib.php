<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$seometa = array();
if($is_seometa == 'view') { //게시물
	$seometa['subject'] = apms_get_text($write['wr_subject']);
	$seometa['description'] = apms_cut_text($write['wr_content'], 200);
	$seometa['creator'] = apms_get_text($write['wr_name']);
	$seometa['keyword'] = apms_seo_keyword($write['as_tag'], $write['ca_name']);
	$seometa['type'] = 'article';
	$seometa['url'] = '/bbs/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id;
	$seometa['img'] = apms_wr_thumbnail($bo_table, $write, 0, 0); // 썸네일
} else if($is_seometa == 'it') { // 상품
	$seometa['subject'] = apms_get_text($it['it_name']);
	$seometa['description'] = ($it['it_basic']) ? apms_get_text($it['it_basic']) : apms_cut_text($it['it_explan'], 200);
	$seometa['creator'] = ($author['mb_nick']) ? $author['mb_nick'] : $seometa['publisher'];
	$seometa['keyword'] = apms_seo_keyword($it['pt_tag']);
	$seometa['type'] = 'product';
	$seometa['url'] = '/shop/item.php?it_id='.$it['it_id'];
	$seometa['img'] = apms_it_thumbnail($it, 0, 0, false, true);
} else if($is_seometa == 'iqa') { //상품문의
	$seometa['subject'] = apms_get_text($view['iq_subject']);
	$seometa['description'] = apms_cut_text($view['iq_content'], 200);
	$seometa['creator'] = apms_get_text($view['iq_name']);
	$seometa['keyword'] = apms_seo_keyword($view['pt_tag']);
	$seometa['type'] = 'article';
	$seometa['url'] = '/shop/itemqaview.php?iq_id='.$iq_id;
	$seometa['img'] = apms_it_write_thumbnail($view['it_id'], $view['iq_content'], 0, 0);
} else if($is_seometa == 'iuse') { //상품후기
	$seometa['subject'] = apms_get_text($view['is_subject']);
	$seometa['description'] = apms_cut_text($view['is_content'], 200);
	$seometa['creator'] = apms_get_text($view['is_name']);
	$seometa['keyword'] = apms_seo_keyword($view['pt_tag']);
	$seometa['type'] = 'article';
	$seometa['url'] = '/shop/itemuseview.php?is_id='.$is_id;
	$seometa['img'] = apms_it_write_thumbnail($view['it_id'], $view['is_content'], 0, 0);
} else if($is_seometa == 'page') { // 페이지
	$seometa['subject'] = $at['subject'];
	$seometa['description'] = $seo_page_desc;
	$seometa['creator'] = ($config['cf_admin_email_name']) ? $config['cf_admin_email_name'] : $config['cf_title'];
	$seometa['keyword'] = APMS_SEO_KEYWORD;
	$seometa['type'] = 'website';
	$seometa['url'] = '/bbs/page.php?hid='.$hid;
	$seometa['img']['src'] = $seo_page_img;
} else if($is_seometa == 'content') { // 컨텐츠
	$seometa['subject'] = $at['subject'];
	$seometa['description'] = $seo_page_desc;
	$seometa['creator'] = ($config['cf_admin_email_name']) ? $config['cf_admin_email_name'] : $config['cf_title'];
	$seometa['keyword'] = APMS_SEO_KEYWORD;
	$seometa['type'] = 'website';
	$seometa['url'] = '/bbs/content.php?co_id='.$co_id;
	$seometa['img']['src'] = $seo_page_img;
} else {
	$seometa['subject'] = '';
	$seometa['desc'] = (APMS_SEO_DESCRIPTION) ? htmlspecialchars(APMS_SEO_DESCRIPTION) : $seometa['title'];
	$seometa['creator'] = ($config['cf_admin_email_name']) ? $config['cf_admin_email_name'] : $config['cf_title'];
	$seometa['keyword'] = APMS_SEO_KEYWORD;
	$seometa['type'] = 'website';
	$seometa['url'] = '';
	$seometa['img']['src'] = '';
}

$seometa['title'] = str_replace("\"", "'", $g5_head_title);
$seometa['publisher'] = str_replace("\"", "'", apms_get_text($config['cf_title']));
$seometa['creator'] = str_replace("\"", "'", $seometa['creator']);
$seometa['description'] = ($seometa['description']) ? str_replace("\"", "'", $seometa['description']) : '';

?>
<meta name="title" content="<?php echo $seometa['title'];?>" />
<?php if($seometa['subject']) { ?>
<meta name="subject" content="<?php echo str_replace("\"", "'", $seometa['subject']);?>" />
<?php } ?>
<meta name="publisher" content="<?php echo $seometa['publisher'];?>" />
<meta name="author" content="<?php echo $seometa['publisher'];?>" />
<meta name="robots" content="index,follow" />
<?php if($seometa['keyword']) { ?>
<meta name="keywords" content="<?php echo str_replace("\"", "'", $seometa['keyword']);?>" />
<?php } ?>
<?php if($seometa['description']) { ?>
<meta name="description" content="<?php echo $seometa['description'];?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $seometa['title'];?>"/>
<meta property="og:site_name" content="<?php echo $seometa['publisher'];?>" />
<meta property="og:author" content="<?php echo $seometa['publisher'];?>" />
<meta property="og:type" content="<?php echo $seometa['type'];?>" />
<?php if($seometa['img']['src']) { $dr_memo = str_replace("dev","www",stripslashes(strip_tags($seometa['img']['src'])));?>
<meta property="og:image" content="<?php echo $dr_memo;?>" />
<?php } ?>
<?php if($seometa['description']) { ?>
<meta property="og:description" content="<?php echo $seometa['description'];?>" />
<?php } ?>
<?php if($seometa['url']) { ?>
<meta property="og:url" content="<?php echo $seometa['url'];?>" />
<link rel="canonical" href="<?php echo $seometa['url'];?>" />
<?php } ?>
