<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

if(USE_G5_THEME && defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}

// Page Iframe Modal
if(APMS_PIM) {
	include_once(G5_PATH.'/head.sub.php');
	@include_once(THEMA_PATH.'/head.sub.php');
	return;
}

//Change Mode
$as_href['pc_mobile'] = (G5_DEVICE_BUTTON_DISPLAY) ? get_device_change_url() : '';

// Head Sub
include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

$page_title = apms_fa($page_title);
$page_desc = apms_fa($page_desc);
$menu = apms_auto_menu(); //자동메뉴
$menu = apms_multi_menu($menu, $at['id'], $at['multi']);

if($is_member) thema_member();

//Statistics
$stats = apms_stats();


if(file_exists(THEMA_PATH.'/shop.head.php')) {
	include_once(THEMA_PATH.'/shop.head.php');
} else {
	include_once(THEMA_PATH.'/head.php');
}

?>
