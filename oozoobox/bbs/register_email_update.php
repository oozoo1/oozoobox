<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');

$mb_id    = trim($_POST['mb_id']);
$mb_email = trim($_POST['mb_email']);

$sql = " select mb_name, mb_datetime from {$g5['member_table']} where mb_id = '{$mb_id}' and mb_email_certify <> '' ";
$mb = sql_fetch($sql);


$sql = " select count(*) as cnt from {$g5['member_table']} where mb_id <> '{$mb_id}' and mb_email = '$mb_email' ";
$row = sql_fetch($sql);
if ($row['cnt']) {
    alert("{$mb_email} 已注册的邮箱.\\n\\n请使用其他邮箱.");
}

// 인증메일 발송
$subject = '['.$config['cf_title'].'] 邮箱信息验证.';

$mb_name = $mb['mb_name'];
$mb_datetime = $mb['mb_datetime'] ? $mb['mb_datetime'] : G5_TIME_YMDHIS;
$mb_md5 = md5($mb_id.$mb_email.$mb_datetime);
$certify_href = G5_BBS_URL.'/email_certify.php?mb_id='.$mb_id.'&amp;mb_md5='.$mb_md5;

ob_start();
include_once ('./register_form_update_mail3.php');
$content = ob_get_contents();
ob_end_clean();

mailer($config['cf_admin_email_name'], $config['cf_admin_email'], $mb_email, $subject, $content, 1);

$sql = " update {$g5['member_table']} set mb_email = '$mb_email' where mb_id = '$mb_id' ";
sql_query($sql);

alert("验证邮件已发送到 {$mb_email} 邮箱 .\\n\\n请稍后确认 {$mb_email} 邮箱里的 验证信息.", G5_URL);
?>