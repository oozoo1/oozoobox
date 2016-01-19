<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

if($header_skin)
	include_once('./header.php');


$ex1_filed = explode("@",$mb[mb_email]); 
$ext1_00  = $ex1_filed[1];

?>
<style type="text/css">
<!--
html { overflow-y: scroll; }
body,td,th {
	font-size: 12px; font-family:微软雅黑;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(<?=$skin_url?>/images/login_bg.jpg);
	background-repeat: repeat-x;
	background-color: #eeeeee;
}
/*** 기본버튼 **/
.btn.btn-color { 
	border: 1px solid #f47a22; 
	border-image: none; 
	color: rgb(255, 255, 255) !important; 
	background-color: #f5944f; 
	background-image: none;
	padding:10px 20px 10px 20px;
}
.btn.active.btn-color, .btn.btn-color:hover, .btn.btn-color:focus, .btn.btn-color:active { 
	border-color: #f47a22; 
	color: rgb(255, 255, 255) !important; 
	background-color: #f47a22; 
	background-image: none; 
	padding:10px 20px 10px 20px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="162" colspan="2" valign="top" style="padding-top:20px;"><a href="/"><img src="<?=$skin_url?>/images/join_logo.png" border="0"></a></td>
  </tr>
  <tr>
    <td width="559" height="438" valign="top" background="<?=$skin_url?>/images/join_box_bg.png" style="padding-top:35px;">
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td><font style="font-family:微软雅黑; font-size:18px; color:#888888; font-weight:bold;">恭喜您 注册成功</font></td>
            <td align="right"></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td height="55"></td>
          </tr>
          <tr>
            <td height="240" valign="top" style="line-height:25px;">
            		亲爱的 <strong><?php echo $mb['mb_name'] ?></strong> 用户 真心的祝贺您 成功注册OOZOOBOX.<br>
                请您登入您的邮箱 确认验证信息.<br>
                账号：<?php echo $mb['mb_id'] ?><br>
                邮箱地址：<?php echo $mb['mb_email'] ?><br>
                如果您输入的邮箱地址有误 <a href="/bbs/register_email.php?mb_id=<?php echo $mb['mb_id'] ?>" style=" font-size:14px; font-weight:bold; color:#0066cc;">《请修改您的邮箱地址》</a><br>
                您的密码 已被加密成 单向加密 除了您本人 任何人会知道您的密码 请您放心!<br>
                <b>如果您 忘记了您的 账号或者密码</b> <br>
                不要担心 可以使用 <?php echo $mb['mb_email'] ?> 初始化您的密码 请不要担心!<br>
            </td>
          </tr>
          <tr>
            <td height="30"></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td align="right"><a href="http://mail.<?=$ext1_00?>" class="btn btn-color" role="button" target="_blank">去邮箱验证我的信息</a></td>
          </tr>
        </table>
    </td>
    <td align="center" valign="top"><img src="<?=$skin_url?>/images/join_font.png"></td>
  </tr>
  <tr>
    <td align="center" height="50"><img src="<?=$skin_url?>/images/join_bottom_img.png"></td>
    <td></td>
  </tr>
</table>