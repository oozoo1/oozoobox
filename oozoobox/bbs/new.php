<?php
include_once('./_common.php');

// Page ID
$pid = ($pid) ? $pid : 'new';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$g5['title'] = '새글';
include_once('./_head.php');

$skin_path = $new_skin_path;
$skin_url = $new_skin_url;

$sql_common = " from {$g5['board_new_table']} a, {$g5['board_table']} b, {$g5['group_table']} c where a.bo_table = b.bo_table and b.gr_id = c.gr_id and b.bo_use_search <> '0' and b.bo_use_search <= '{$member['mb_level']}' ";

$gr_id = isset($_GET['gr_id']) ? $_GET['gr_id'] : "";
if ($gr_id) {
    $sql_common .= " and b.gr_id = '$gr_id' ";
}

$view = isset($_GET['view']) ? $_GET['view'] : "";

if ($view == "w")
    $sql_common .= " and a.wr_id = a.wr_parent ";
else if ($view == "c")
    $sql_common .= " and a.wr_id <> a.wr_parent ";
else
    $view = '';

$mb_id = isset($_GET['mb_id']) ? ($_GET['mb_id']) : '';
$mb_id = substr(preg_replace('#[^a-z0-9_]#i', '', $mb_id), 0, 20);

if ($mb_id) {
    $sql_common .= " and a.mb_id = '{$mb_id}' ";
}
$sql_order = " order by a.bn_id desc ";

$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = G5_IS_MOBILE ? $config['cf_mobile_page_rows'] : $config['cf_new_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$group_option = '';
$sql = " select gr_id, gr_subject from {$g5['group_table']} order by gr_id ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $group_option .= "<option value=\"".$row['gr_id']."\">".$row['gr_subject'].'</option>';
}

$group_select = '<label for="gr_id" class="sound_only">그룹</label><select name="gr_id" id="gr_id"><option value="">전체그룹';
$group_select .= $group_option;
$group_select .= '</select>';

$list = array();
$sql = " select a.*, b.bo_subject, c.gr_subject, c.gr_id {$sql_common} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $tmp_write_table = $g5['write_prefix'].$row['bo_table'];

    if ($row['wr_id'] == $row['wr_parent']) {

        // 원글
        $comment = "";
        $comment_link = "";
        $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
        $list[$i] = $row2;

        $name = apms_sideview($row2['mb_id'], get_text(cut_str($row2['wr_name'], $config['cf_cut_name'])), $row2['wr_email'], $row2['wr_homepage'], $row2['as_level']);
        // 당일인 경우 시간으로 표시함
		$wr_datetime = $row2['wr_datetime'];
		$datetime = substr($row2['wr_datetime'],0,10);
        $datetime2 = $row2['wr_datetime'];
        if ($datetime == G5_TIME_YMD) {
            $datetime2 = substr($datetime2,11,5);
        } else {
            $datetime2 = substr($datetime2,5,5);
        }

    } else {

        // 코멘트
        $comment = '[코] ';
        $comment_link = '#c_'.$row['wr_id'];
        $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_parent']}' ");
        $row3 = sql_fetch(" select mb_id, wr_name, wr_email, wr_homepage, wr_datetime, wr_comment_reply, as_level, wr_5 from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
        $list[$i] = $row2;
        $list[$i]['wr_id'] = $row['wr_id'];
        $list[$i]['mb_id'] = $row3['mb_id'];
        $list[$i]['wr_name'] = $row3['wr_name'];
        $list[$i]['wr_email'] = $row3['wr_email'];
        $list[$i]['wr_homepage'] = $row3['wr_homepage'];
		$list[$i]['reply_name'] = ($row3['wr_comment_reply'] && $row3['wr_5']) ? $row3['wr_5'] : '';

        $name = apms_sideview($row3['mb_id'], get_text(cut_str($row3['wr_name'], $config['cf_cut_name'])), $row3['wr_email'], $row3['wr_homepage'], $row3['as_level']);
        // 당일인 경우 시간으로 표시함
		$wr_datetime = $row3['wr_datetime'];
        $datetime = substr($row3['wr_datetime'],0,10);
        $datetime2 = $row3['wr_datetime'];
        if ($datetime == G5_TIME_YMD) {
            $datetime2 = substr($datetime2,11,5);
        } else {
            $datetime2 = substr($datetime2,5,5);
        }

    }

    $list[$i]['gr_id'] = $row['gr_id'];
    $list[$i]['bo_table'] = $row['bo_table'];
    $list[$i]['name'] = $name;
    $list[$i]['comment'] = $comment;
    $list[$i]['href'] = './board.php?bo_table='.$row['bo_table'].'&amp;wr_id='.$row2['wr_id'].$comment_link;
    $list[$i]['wr_datetime'] = $wr_datetime;
	$list[$i]['datetime'] = $datetime;
    $list[$i]['datetime2'] = $datetime2;

    $list[$i]['gr_subject'] = $row['gr_subject'];
    $list[$i]['bo_subject'] = $row['bo_subject'];
    $list[$i]['wr_subject'] = $row2['wr_subject'];
}

$write_pages = get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "?gr_id=$gr_id&amp;view=$view&amp;mb_id=$mb_id&amp;page=");
$write_page_rows = (G5_IS_MOBILE) ? $config['cf_mobile_pages'] : $config['cf_write_pages'];
$list_page = "?gr_id=$gr_id&amp;view=$view&amp;mb_id=$mb_id&amp;page=";

// 스킨설정
$wset = (G5_IS_MOBILE) ? apms_skin_set('new_mobile') : apms_skin_set('new');

$setup_href = '';
if(is_file($skin_path.'/setup.skin.php') && ($is_demo || $is_admin == 'super')) {
	$setup_href = './skin.setup.php?skin=new';
}

include_once($skin_path.'/new.skin.php');

include_once('./_tail.php');
?>
