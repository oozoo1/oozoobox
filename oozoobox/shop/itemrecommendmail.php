<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');

if (!$is_member)
    alert_close('只有会员才可以使用此功能.');

// 스팸으로 인한 코드 수정 060809
//if (substr_count($to_email, "@") > 3) alert("최대 3명까지만 메일을 발송할 수 있습니다.");
if (substr_count($to_email, "@") > 1) alert('只能输入一个邮箱地址.');

if ($_SESSION["ss_recommend_datetime"] >= (G5_SERVER_TIME - 120))
    alert("您的动作太快 请坐下来 喝杯咖啡 再来试一试.");
set_session("ss_recommend_datetime", G5_SERVER_TIME);

$recommendmail_count = (int)get_session('ss_recommendmail_count') + 1;
if ($recommendmail_count > 3)
    alert_close('您可以将一定数量的连接后，只发送一个电子邮件.\\n\\n请登录或继续重新连接后发送电子邮件。');
set_session('ss_recommendmail_count', $recommendmail_count);

// 세션에 저장된 토큰과 폼값으로 넘어온 토큰을 비교하여 틀리면 메일을 발송할 수 없다.
if ($_POST["token"] && get_session("ss_token") == $_POST["token"]) {
    // 맞으면 세션을 지워 다시 입력폼을 통해서 들어오도록 한다.
    set_session("ss_token", "");
} else {
    alert_close("发送出错 请确认.");
    exit;
}

// 상품
$sql = " select * from {$g5['g5_shop_item_table']} where it_id = '$it_id' ";
$it = sql_fetch($sql);
if (!$it['it_id'])
    alert("商品信息有误.");

$subject = stripslashes($subject);
$content = nl2br(stripslashes($content));

$from_name = get_text($member['mb_name']);
$from_email = $member['mb_email'];
$it_id = $it['it_id'];
$it_name = $it['it_name'];
$it_mimg = get_it_image($it_id, $default['de_mimg_width'], $default['de_mimg_height']);

ob_start();
include G5_SHOP_PATH.'/mail/itemrecommend.mail.php';
$content = ob_get_contents();
ob_end_clean();

mailer($from_name, $from_email, $to_email, $subject, $content, 1);

echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script language="JavaScript">
alert("已发送给您的朋友");
window.close();
</script>
