<?php
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

if (!$is_member) {
	if($move) {
	    alert("회원만 작성 가능합니다.");
	} else {
	    alert_close("회원만 작성 가능합니다.");
	}
}

$w     = trim($_REQUEST['w']);
$it_id = trim($_REQUEST['it_id']);
$iq_id = trim($_REQUEST['iq_id']);

// 상품정보체크
$sql = " select it_id, ca_id, pt_id from {$g5['g5_shop_item_table']} where it_id = '$it_id' ";
$row = sql_fetch($sql);
if(!$row['it_id']) {
	if($move) {
		alert('자료가 존재하지 않습니다.');
	} else {
		alert_close('자료가 존재하지 않습니다.');
	}
}

$ca_id = ($ca_id) ? $ca_id : $row['ca_id'];

if (!$is_admin && $row['pt_id'] != $member['mb_id']) {
	if($move) {
		alert("자신이 등록한 상품의 문의글에 대한 답글만 가능합니다.");
	} else {
		alert_close("자신이 등록한 상품의 문의글에 대한 답글만 가능합니다.");
	}
}

$sql = " select *
           from {$g5['g5_shop_item_qa_table']} a
           left join {$g5['member_table']} b on (a.mb_id = b.mb_id)
          where iq_id = '$iq_id' $qa_sql ";
$qa = sql_fetch($sql);

if (!$qa['iq_id']) {
	if($move) {
		alert('등록된 자료가 없습니다.');
	} else {
		alert_close('등록된 자료가 없습니다.');
	}
}

$qa['iq_question'] = apms_content(conv_content($qa['iq_question'], 1));
$qa['name'] = apms_sideview($qa['mb_id'], get_text($qa['iq_name']), $qa['mb_email'], $qa['mb_homepage']);
$qa['photo'] = apms_photo_url($qa['mb_id']);

// Page ID
$pid = ($pid) ? $pid : 'iqa';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$skin_row = array();
$skin_row = apms_rows('qa_'.MOBILE_.'rows, qa_'.MOBILE_.'skin, qa_'.MOBILE_.'set');
$skin_name = $skin_row['qa_'.MOBILE_.'skin'];

// 스킨설정
$wset = array();
if($skin_row['qa_'.MOBILE_.'set']) {
	$wset = apms_unpack($skin_row['qa_'.MOBILE_.'set']);
}

// 데모
if($is_demo) {
	@include (THEMA_PATH.'/assets/demo.config.php');
}

$skin_path = G5_SKIN_PATH.'/apms/qa/'.$skin_name;
$skin_url = G5_SKIN_URL.'/apms/qa/'.$skin_name;

if($move) {
	include_once('./_head.php');
} else {
	include_once(G5_PATH.'/head.sub.php');
	@include_once(THEMA_PATH.'/head.sub.php');
}

$is_dhtml_editor = false;
// 모바일에서는 DHTML 에디터 사용불가
if ($config['cf_editor'] && !G5_IS_MOBILE) {
    $is_dhtml_editor = true;
}
$editor_html = editor_html('iq_answer', get_text($qa['iq_answer'], 0), $is_dhtml_editor);
$editor_js = '';
$editor_js .= get_editor_js('iq_answer', $is_dhtml_editor);
$editor_js .= chk_editor_js('iq_answer', $is_dhtml_editor);

include_once($skin_path.'/qansform.skin.php');

if($move) {
	include_once('./_tail.php');
} else {
	@include_once(THEMA_PATH.'/tail.sub.php');
	include_once(G5_PATH.'/tail.sub.php');
}
?>