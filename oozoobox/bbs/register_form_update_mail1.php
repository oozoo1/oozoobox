<?php
// 회원가입축하 메일 (회원님께 발송)
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>恭喜你 成为 OOZOOBOX 会员</title>
</head>

<body>

<div style="margin:30px auto;width:600px;border:10px solid #f7f7f7">
    <div style="border:1px solid #dedede">
        <h1 style="padding:30px 30px 0;background:#f7f7f7;color:#555;font-size:1.4em">
            亲爱的 <strong><?php echo $mb_name ?></strong> 用户 真心的祝贺您 成功注册OOZOOBOX.
        </h1>
        <span style="display:block;padding:10px 30px 30px;background:#f7f7f7;text-align:right">
            <a href="<?php echo G5_URL ?>" target="_blank"><?php echo $config['cf_title'] ?></a>
        </span>
        <p style="margin:20px 0 0;padding:30px 30px 50px;min-height:200px;height:auto !important;height:200px;border-bottom:1px solid #eee">
            <b><?php echo $mb_name ?></b> 用户您好,您已成为OOZOOBOX 会员<br>
            您每一次访问OOZOOBOX 是给我工作人员 最佳的工作动力! 我们会继续努力!.<br>
            <?php if ($config['cf_use_email_certify']) { ?>请点击下面 <strong>链接来完成 </strong>您的邮箱验证.<br><?php } ?>
            감사합니다.
        </p>

        <?php if ($config['cf_use_email_certify']) { ?>
        <a href="<?php echo $certify_href ?>" target="_blank" style="display:block;padding:30px 0;background:#484848;color:#fff;text-decoration:none;text-align:center">验证邮箱</a>
        <?php } else { ?>
        <a href="<?php echo G5_URL ?>" target="_blank" style="display:block;padding:30px 0;background:#484848;color:#fff;text-decoration:none;text-align:center">进入OOZOOBOX</a>
        <?php } ?>
    </div>
</div>

</body>
</html>
