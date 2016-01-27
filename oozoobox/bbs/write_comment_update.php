<?php
define('G5_CAPTCHA', true);
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

// 090710
if (substr_count($wr_content, "&#") > 50) {
    alert('请勿在内容中使用代码或特殊符号.');
    exit;
}

$w = $_POST["w"];
$wr_name  = trim($_POST['wr_name']);
$wr_email = '';
if (!empty($_POST['wr_email']))
	$wr_email = get_email_address(trim($_POST['wr_email']));

// 비회원의 경우 이름이 누락되는 경우가 있음
if ($is_guest) {
    if ($wr_name == '')
        alert('请输入名称.');
    if(!chk_captcha())
        alert('您输入的验证码错误，请重新输入.');
}

if ($w == "c" || $w == "cu") {
    if ($member['mb_level'] < $board['bo_comment_level'])
        alert('评论您没有发表主题权限.');
}
else
    alert('w值传递错误.');

// 세션의 시간 검사
// 4.00.15 - 댓글 수정시 연속 게시물 등록 메시지로 인한 오류 수정
if ($w == 'c' && $_SESSION['ss_datetime'] >= (G5_SERVER_TIME - $config['cf_delay_sec']) && !$is_admin)
    alert('您发帖速度太快了，请休息一下~.');

set_session('ss_datetime', G5_SERVER_TIME);

$wr = get_write($write_table, $wr_id);
if (empty($wr['wr_id']))
    alert("未找到您访问的内容\\n您访问的内容可能已经被删除或移动到其他栏目.");


// "인터넷옵션 > 보안 > 사용자정의수준 > 스크립팅 > Action 스크립팅 > 사용 안 함" 일 경우의 오류 처리
// 이 옵션을 사용 안 함으로 설정할 경우 어떤 스크립트도 실행 되지 않습니다.
//if (!trim($_POST["wr_content"])) die ("내용을 입력하여 주십시오.");

$is_new = true;
$is_ajax = false;
$is_response = true;
@include_once($board_skin_path.'/write_comment_update.head.skin.php');

if ($is_member)
{
    $mb_id = $member['mb_id'];
    // 4.00.13 - 실명 사용일때 댓글에 닉네임으로 입력되던 오류를 수정
	$wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
    $wr_password = $member['mb_password'];
	if($member['mb_open']) {
	    $wr_email = addslashes($member['mb_email']);
	    $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
	} else {
	    $wr_email = '';
	    $wr_homepage = '';
	}
    $as_level = (int)$member['as_level'];
}
else
{
    $mb_id = '';
    $wr_password = get_encrypt_string($wr_password);
    $as_level = 1;
}

if ($w == 'c') // 댓글 입력
{
    /*
    if ($member[mb_point] + $board[bo_comment_point] < 0 && !$is_admin)
        alert('보유하신 포인트('.number_format($member[mb_point]).')가 없거나 모자라서 댓글쓰기('.number_format($board[bo_comment_point]).')가 불가합니다.\\n\\n포인트를 적립하신 후 다시 댓글을 써 주십시오.');
    */
    // 댓글쓰기 포인트설정시 회원의 포인트가 음수인 경우 댓글을 쓰지 못하던 버그를 수정 (곱슬최씨님)
    $tmp_point = ($member['mb_point'] > 0) ? $member['mb_point'] : 0;
    if ($tmp_point + $board['bo_comment_point'] < 0 && !$is_admin)
        alert('当前积分('.number_format($member['mb_point']).')不足支付发表评论所需的积分('.number_format($board['bo_comment_point']).').\\n\\n请获取更多积分后重试.');

    // 댓글 답변
	$response_flag = '';
	$as_re_mb = '';
	$as_re_name = '';
    if ($comment_id) {
		$response_flag = 'reply';
		$sql = " select wr_id, mb_id, wr_comment, wr_comment_reply, wr_name from $write_table
                    where wr_id = '$comment_id' ";
        $reply_array = sql_fetch($sql);
        if (!$reply_array['wr_id'])
            alert('没有找到您要回复的评论内容\\n\\n此内容可能在您编辑回复时已被删除.');

        $tmp_comment = $reply_array['wr_comment'];

        if (strlen($reply_array['wr_comment_reply']) == 5)
            alert('回帖数量已达到回帖限制\\n\\n仅允许回复5层.');

        $reply_len = strlen($reply_array['wr_comment_reply']) + 1;
        if ($board['bo_reply_order']) {
            $begin_reply_char = 'A';
            $end_reply_char = 'Z';
            $reply_number = +1;
            $sql = " select MAX(SUBSTRING(wr_comment_reply, $reply_len, 1)) as reply
                        from $write_table
                        where wr_parent = '$wr_id'
                        and wr_comment = '$tmp_comment'
                        and SUBSTRING(wr_comment_reply, $reply_len, 1) <> '' ";
        }
        else
        {
            $begin_reply_char = 'Z';
            $end_reply_char = 'A';
            $reply_number = -1;
            $sql = " select MIN(SUBSTRING(wr_comment_reply, $reply_len, 1)) as reply
                        from $write_table
                        where wr_parent = '$wr_id'
                        and wr_comment = '$tmp_comment'
                        and SUBSTRING(wr_comment_reply, $reply_len, 1) <> '' ";
        }
        if ($reply_array['wr_comment_reply'])
            $sql .= " and wr_comment_reply like '{$reply_array['wr_comment_reply']}%' ";
        $row = sql_fetch($sql);

        if (!$row['reply'])
            $reply_char = $begin_reply_char;
        else if ($row['reply'] == $end_reply_char) // A~Z은 26 입니다.
            alert('回帖数量已达到回帖限制\\n\\n仅允许回复26层.');
        else
            $reply_char = chr(ord($row['reply']) + $reply_number);

        $tmp_comment_reply = $reply_array['wr_comment_reply'] . $reply_char;

		// 원글쓴이
		$as_re_name = $reply_array['wr_name'];
		$as_re_mb = $reply_array['mb_id'];
    }
    else
    {
        $sql = " select max(wr_comment) as max_comment from $write_table
                    where wr_parent = '$wr_id' and wr_is_comment = 1 ";
        $row = sql_fetch($sql);
        //$row[max_comment] -= 1;
        $row['max_comment'] += 1;
        $tmp_comment = $row['max_comment'];
        $tmp_comment_reply = '';
    }

	//럭키포인트
	$as_lucky = ($board['as_lucky']) ? apms_lucky('', $bo_table, $wr_id) : 0;

    $wr_subject = get_text(stripslashes($wr['wr_subject']));

    $sql = " insert into $write_table
                set ca_name = '".addslashes($wr['ca_name'])."',
                     wr_option = '$wr_secret',
                     wr_num = '{$wr['wr_num']}',
                     wr_reply = '',
                     wr_parent = '$wr_id',
                     wr_is_comment = 1,
                     wr_comment = '$tmp_comment',
                     wr_comment_reply = '$tmp_comment_reply',
                     wr_subject = '',
                     wr_content = '$wr_content',
                     mb_id = '$mb_id',
                     wr_password = '$wr_password',
                     wr_name = '$wr_name',
                     wr_email = '$wr_email',
                     wr_homepage = '$wr_homepage',
                     wr_datetime = '".G5_TIME_YMDHIS."',
                     wr_last = '',
                     wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                     as_level = '$as_level',
					 as_lucky = '$as_lucky',
                     as_re_mb = '$as_re_mb',
					 as_re_name = '$as_re_name',
					 as_icon = '$as_icon',
					 wr_1 = '$wr_1',
                     wr_2 = '$wr_2',
                     wr_3 = '$wr_3',
                     wr_4 = '$wr_4',
                     wr_5 = '$wr_5',
                     wr_6 = '$wr_6',
                     wr_7 = '$wr_7',
                     wr_8 = '$wr_8',
                     wr_9 = '$wr_9',
                     wr_10 = '$wr_10' ";
    sql_query($sql);

    $comment_id = sql_insert_id();

    // 원글에 댓글수 증가 & 마지막 시간 반영
    sql_query(" update $write_table set wr_comment = wr_comment + 1, wr_last = '".G5_TIME_YMDHIS."' where wr_id = '$wr_id' ");
	sql_query(" update {$g5['board_new_table']} set as_comment = as_comment + 1 where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ", false);

    // 새글 INSERT
    if($is_new) sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id, as_lucky, as_re_mb ) values ( '$bo_table', '$comment_id', '$wr_id', '".G5_TIME_YMDHIS."', '{$member['mb_id']}', '{$as_lucky}', '{$as_re_mb}' ) ");

    // 댓글 1 증가
    sql_query(" update {$g5['board_table']} set bo_count_comment = bo_count_comment + 1 where bo_table = '$bo_table' ");

	// APMS : 내글반응 등록
	if($is_response) {
		apms_response('wr', 'comment', '', $bo_table, $wr_id, $wr_subject, $wr['mb_id'], $member['mb_id'], $wr_name, $comment_id);

		if($response_flag == 'reply') { //대댓글일 때
			$pre_comment = sql_fetch(" select mb_id from {$write_table} where wr_parent = '$wr_id' and wr_is_comment = 1 and wr_comment_reply = '".substr($tmp_comment_reply,0,-1)."' "); 
			apms_response('wr', 'comment_reply', '', $bo_table, $wr_id, $wr_subject, $pre_comment['mb_id'], $member['mb_id'], $wr_name, $comment_id);
		}
	}

    // 포인트 부여
    insert_point($member['mb_id'], $board['bo_comment_point'], "{$board['bo_subject']} {$wr_id}-{$comment_id} 댓글쓰기", $bo_table, $comment_id, '댓글');

    // 메일발송 사용
    if ($config['cf_email_use'] && $board['bo_use_email'])
    {
        // 관리자의 정보를 얻고
        $super_admin = get_admin('super');
        $group_admin = get_admin('group');
        $board_admin = get_admin('board');

        $wr_content = nl2br(get_text(stripslashes("原文\n{$wr['wr_subject']}\n\n\n评论\n$wr_content")));

        $warr = array( ''=>'输入', 'u'=>'修改', 'r'=>'回复', 'c'=>'评论 ', 'cu'=>'修改评论' );
        $str = $warr[$w];

        $subject = '['.$config['cf_title'].'] '.$board['bo_subject'].' 论坛版块新发表 '.$str.'内容.';
        // 4.00.15 - 메일로 보내는 댓글의 바로가기 링크 수정
        $link_url = G5_BBS_URL."/board.php?bo_table=".$bo_table."&amp;wr_id=".$wr_id."&amp;".$qstr."#c_".$comment_id;

        include_once(G5_LIB_PATH.'/mailer.lib.php');

        ob_start();
        include_once ('./write_update_mail.php');
        $content = ob_get_contents();
        ob_end_clean();

        $array_email = array();
        // 게시판관리자에게 보내는 메일
        if ($config['cf_email_wr_board_admin']) $array_email[] = $board_admin['mb_email'];
        // 게시판그룹관리자에게 보내는 메일
        if ($config['cf_email_wr_group_admin']) $array_email[] = $group_admin['mb_email'];
        // 최고관리자에게 보내는 메일
        if ($config['cf_email_wr_super_admin']) $array_email[] = $super_admin['mb_email'];

        // 원글게시자에게 보내는 메일
        if ($config['cf_email_wr_write']) $array_email[] = $wr['wr_email'];

        // 댓글 쓴 모든이에게 메일 발송이 되어 있다면 (자신에게는 발송하지 않는다)
        if ($config['cf_email_wr_comment_all']) {
            $sql = " select distinct wr_email from {$write_table}
                        where wr_email not in ( '{$wr['wr_email']}', '{$member['mb_email']}', '' )
                        and wr_parent = '$wr_id' ";
            $result = sql_query($sql);
            while ($row=sql_fetch_array($result))
                $array_email[] = $row['wr_email'];
        }

        // 중복된 메일 주소는 제거
        $unique_email = array_unique($array_email);
        $unique_email = array_values($unique_email);
        for ($i=0; $i<count($unique_email); $i++) {
            mailer($wr_name, $wr_email, $unique_email[$i], $subject, $content, 1);
        }
    }

    // SNS 등록
    include_once("./write_comment_update.sns.php");
    if($wr_facebook_user || $wr_twitter_user) {
        $sql = " update $write_table
                    set wr_facebook_user = '$wr_facebook_user',
                        wr_twitter_user  = '$wr_twitter_user'
                    where wr_id = '$comment_id' ";
        sql_query($sql);
    }
}
else if ($w == 'cu') // 댓글 수정
{
    $sql = " select mb_id, wr_password, wr_comment, wr_comment_reply from $write_table
                where wr_id = '$comment_id' ";
    $comment = $reply_array = sql_fetch($sql);
    $tmp_comment = $reply_array['wr_comment'];

    $len = strlen($reply_array['wr_comment_reply']);
    if ($len < 0) $len = 0;
    $comment_reply = substr($reply_array['wr_comment_reply'], 0, $len);
    //print_r2($GLOBALS); exit;

    if ($is_admin == 'super') // 최고관리자 통과
        ;
    else if ($is_admin == 'group') { // 그룹관리자
        $mb = get_member($comment['mb_id']);
        if (chk_multiple_admin($member['mb_id'], $group['gr_admin'])) { // 자신이 관리하는 그룹인가?
            if ($member['mb_level'] >= $mb['mb_level']) // 자신의 레벨이 크거나 같다면 통과
                ;
            else
                alert('그룹관리자의 권한보다 높은 회원의 댓글이므로 수정할 수 없습니다.');
        } else
            alert('자신이 관리하는 그룹의 게시판이 아니므로 댓글을 수정할 수 없습니다.');
    } else if ($is_admin == 'board') { // 게시판관리자이면
        $mb = get_member($comment['mb_id']);
        if (chk_multiple_admin($member['mb_id'], $board['bo_admin'])) { // 자신이 관리하는 게시판인가?
            if ($member['mb_level'] >= $mb['mb_level']) // 자신의 레벨이 크거나 같다면 통과
                ;
            else
                alert('评论作者等级高于您的等级，您没有编辑权限.');
        } else
            alert('由于您没有当前版块管理权限所以不能进行编辑.');
    } else if ($member['mb_id']) {
        if ($member['mb_id'] != $comment['mb_id'])
            alert('您没有编辑权限.');
    } else {
        if($comment['wr_password'] != $wr_password)
            alert('您没有修改评论权限.');
    }

    $sql = " select count(*) as cnt from $write_table
                where wr_comment_reply like '$comment_reply%'
                and wr_id <> '$comment_id'
                and wr_parent = '$wr_id'
                and wr_comment = '$tmp_comment'
                and wr_is_comment = 1 ";
    $row = sql_fetch($sql);
    if ($row['cnt'] && !$is_admin)
        alert('此内容已有关联评论，不能进行编辑修改.');

    $sql_ip = "";
    if (!$is_admin)
        $sql_ip = " , wr_ip = '{$_SERVER['REMOTE_ADDR']}' ";

    $sql_secret = "";
    if ($wr_secret)
        $sql_secret = " , wr_option = '$wr_secret' ";

    $sql = " update $write_table
                set wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
					 as_icon = '$as_icon',
                     wr_1 = '$wr_1',
                     wr_2 = '$wr_2',
                     wr_3 = '$wr_3',
                     wr_4 = '$wr_4',
                     wr_6 = '$wr_6',
                     wr_7 = '$wr_7',
                     wr_8 = '$wr_8',
                     wr_9 = '$wr_9',
                     wr_10 = '$wr_10',
                     wr_option = '$wr_option'
                     $sql_ip
                     $sql_secret
              where wr_id = '$comment_id' ";
    sql_query($sql);
}

// 자동 글추천/비추천 기능
if ($board['as_good'] && isset($wr_good)) {
	if (($board['bo_use_good'] && $wr_good == 'good') || ($board['bo_use_nogood'] && $wr_good == 'nogood')) {
		if($is_member && $w != 'cu' && $wr['mb_id'] != $member['mb_id']) {
			// 내역확인
			$row = sql_fetch(" select bg_flag from {$g5['board_good_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and mb_id = '{$member['mb_id']}' and bg_flag in ('good', 'nogood') ");
			if (!$row['bg_flag']) {
				sql_query(" update {$write_table} set wr_{$wr_good} = wr_{$wr_good} + 1 where wr_id = '{$wr_id}' ");
				sql_query(" update {$g5['board_new_table']} set as_{$wr_good} = as_{$wr_good} + 1 where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ", false);
				sql_query(" insert {$g5['board_good_table']} set bo_table = '{$bo_table}', wr_id = '{$wr_id}', mb_id = '{$member['mb_id']}', bg_flag = '{$wr_good}', bg_datetime = '".G5_TIME_YMDHIS."' ");
			}
		}
	}
}

// 사용자 코드 실행
@include_once($board_skin_path.'/write_comment_update.skin.php');
@include_once($board_skin_path.'/write_comment_update.tail.skin.php');

delete_cache_latest($bo_table);

if($pim) $qstr .= '&amp;pim='.$pim;

goto_url('./board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr['wr_parent'].'&amp;'.$qstr.'&amp;#c_'.$comment_id);
?>
