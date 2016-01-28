<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');

if ($is_member) {
    alert('您一登录.');
}

$email = trim($_POST['mb_email']);

if (!$email)
    alert_close('邮箱地址错误.');

$sql = " select count(*) as cnt from {$g5['member_table']} where mb_email = '$email' ";
$row = sql_fetch($sql);
if ($row['cnt'] > 1)
    alert('相同的邮箱信息存在 2件以上.\\n\\n请联系客服中心.');

$sql = " select mb_no, mb_id, mb_name, mb_nick, mb_email, mb_datetime from {$g5['member_table']} where mb_email = '$email' ";
$mb = sql_fetch($sql);
if (!$mb['mb_id'])
    alert('账户不存在.');
else if (is_admin($mb['mb_id']))
    alert('管理员账户禁止查询.');

// 임시비밀번호 발급
$change_password = rand(100000, 999999);
$mb_lost_certify = get_encrypt_string($change_password);

// 어떠한 회원정보도 포함되지 않은 일회용 난수를 생성하여 인증에 사용
$mb_nonce = md5(pack('V*', rand(), rand(), rand(), rand()));

// 임시비밀번호와 난수를 mb_lost_certify 필드에 저장
$sql = " update {$g5['member_table']} set mb_lost_certify = '$mb_nonce $mb_lost_certify' where mb_id = '{$mb['mb_id']}' ";
sql_query($sql);

// 인증 링크 생성
$href = G5_BBS_URL.'/password_lost_certify.php?mb_no='.$mb['mb_no'].'&amp;mb_nonce='.$mb_nonce;

$subject = "[".$config['cf_title']."] 找回会员登录信息";

$content = "";
$content .= '<table border="0" cellspacing="0" cellpadding="0" align="center" width="630"><tr><td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/left_top.png"></td><td height="18" background="http://data.oozoobox.com/images/mail/top_bg.png" style="background-repeat: repeat-x;"></td><td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/right_top.png"></td></tr><tr><td width="21" valign="top" background="http://data.oozoobox.com/images/mail/left_bg.png"></td><td height="600" valign="top">';
$content .= '<div style="margin:30px auto;width:600px;border:10px solid #f7f7f7">';
$content .= '<div style="border:1px solid #dedede">';
$content .= '<h1 style="padding:30px 30px 0;background:#f7f7f7;color:#555;font-size:1.4em">';
$content .= '会员信息找回指南';
$content .= '</h1>';
$content .= '<span style="display:block;padding:10px 30px 30px;background:#f7f7f7;text-align:right">';
$content .= '<a href="'.G5_URL.'" target="_blank">'.$config['cf_title'].'</a>';
$content .= '</span>';
$content .= '<p style="margin:20px 0 0;padding:30px 30px 30px;border-bottom:1px solid #eee;line-height:1.7em">';
$content .= addslashes($mb['mb_name'])." (".addslashes($mb['mb_nick']).")"." 会员账户在".G5_TIME_YMDHIS."申请了会员登录信息找回操作<br>";
$content .= '为了确保会员账户安全我们使用加密方式储存您的重要信息，为了使您可以重新登录网站我们向您创建了临时登录密码<br>';
$content .= '请您使用临时密码登录网站或点击 <span style="color:#ff3061"><strong>更改密码</strong> 进行修改密码操作</span><br>';
$content .= '完成设置后您的会员账号将使用新的密码<br>';
$content .= '以下加密链接地址仅能使用一次，如因其他原因点击后未能修改，您需要重新申请找回操作（如无法点击链接请复制地址到浏览器），如您未申请找回密码操作请直接忽略此邮件！';
$content .= '</p>';
$content .= '<p style="margin:0;padding:30px 30px 30px;border-bottom:1px solid #eee;line-height:1.7em">';
$content .= '<span style="display:inline-block;width:100px">会员ID</span> '.$mb['mb_id'].'<br>';
$content .= '<span style="display:inline-block;width:100px">临时密码</span> <strong style="color:#ff3061">'.$change_password.'</strong>';
$content .= '</p>';
$content .= '<a href="'.$href.'" target="_blank" style="display:block;padding:30px 0;background:#484848;color:#fff;text-decoration:none;text-align:center">更改密码</a>';
$content .= '</div>';
$content .= '</div>';
$content .= '</td><td width="21" valign="top" background="http://data.oozoobox.com/images/mail/right_bg.png"></td></tr><tr><td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/left_bottom.png"></td><td height="18" background="http://data.oozoobox.com/images/mail/bottom_bg.png"></td><td height="18"><img src="http://data.oozoobox.com/images/mail/right_bottom.png"></td></tr></table>';

mailer($config['cf_admin_email_name'], $config['cf_admin_email'], $mb['mb_email'], $subject, $content, 1);
alert("{$email} 已向您的邮箱发送找回会员信息指南邮件\\n\\n请根据邮件内容进行操作", G5_URL.'');
?>
