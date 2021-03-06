<?php
// 会员注册欢迎邮件
if (!defined('_GNUBOARD_')) exit; //禁止单独访问此页
?>

<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>会员注册欢迎邮件</title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" align="center" width="630">
  <tr>
    <td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/left_top.png"></td>
    <td height="18" background="http://data.oozoobox.com/images/mail/top_bg.png" style="background-repeat: repeat-x;"></td>
    <td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/right_top.png"></td>
  </tr>
  <tr>
    <td width="21" valign="top" background="http://data.oozoobox.com/images/mail/left_bg.png"></td>
    <td height="600" valign="top">
      <div style="width:600px;border:10px solid #f7f7f7">
          <div style="border:1px solid #dedede">
              <h1 style="padding:30px 30px 0;background:#f7f7f7;color:#555;font-size:1.4em">
                  会员注册欢迎邮件
              </h1>
              <span style="display:block;padding:10px 30px 30px;background:#f7f7f7;text-align:right">
                  <a href="<?php echo G5_URL ?>" target="_blank"><?php echo $config['cf_title'] ?></a>
              </span>
              <p style="margin:20px 0 0;padding:30px 30px 50px;min-height:200px;height:auto !important;height:200px;border-bottom:1px solid #eee">
                  恭喜您！<b><?php echo $mb_name ?></b>注册成为会员！<br>
                  会员登录ID : <b><?php echo $mb_id ?></b><br>
                  会员名称 : <?php echo $mb_name ?><br>
                  注册昵称 : <?php echo $mb_nick ?><br>
                  推荐人ID : <?php echo $mb_recommend ?>
              </p>
              <a href="<?php echo G5_ADMIN_URL ?>/member_form.php?w=u&amp;mb_id=<?php echo $mb_id ?>" style="display:block;padding:30px 0;background:#484848;color:#fff;text-decoration:none;text-align:center">查看会员信息</a>
          </div>
      </div>
    </td>
    <td width="21" valign="top" background="http://data.oozoobox.com/images/mail/right_bg.png"></td>
  </tr>
  <tr>
    <td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/left_bottom.png"></td>
    <td height="18" background="http://data.oozoobox.com/images/mail/bottom_bg.png"></td>
    <td height="18"><img src="http://data.oozoobox.com/images/mail/right_bottom.png"></td>
  </tr>
</table>
</body>
</html>
