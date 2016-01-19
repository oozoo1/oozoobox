<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

if($header_skin)
	include_once('./header.php');
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
-->
</style>
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
<form  name="fregister" id="fregister" action="<?php echo $action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off" class="form" role="form">
<input type="hidden" name="agree" value="1" id="agree11">
  <tr>
    <td height="162" colspan="2" valign="top" style="padding-top:20px;"><a href="/"><img src="<?=$skin_url?>/images/join_logo.png" border="0"></a></td>
  </tr>
  <tr>
    <td width="559" height="438" valign="top" background="<?=$skin_url?>/images/join_box_bg.png" style="padding-top:35px;">
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td><font style="font-family:微软雅黑; font-size:18px; color:#888888; font-weight:bold;">会员注册协议</font></td>
            <td align="right"><a href="/bbs/login.php"><img src="<?=$skin_url?>/images/join_login_bt.png"></a></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td height="45"></td>
          </tr>
          <tr>
            <td><textarea class="form-control input-sm" rows="10" readonly style="border:solid 1px #d9d9d9; width:420px; height:240px; color:#a0a0a0;"><?php echo get_text($config['cf_stipulation']) ?></textarea></td>
          </tr>
          <tr>
            <td height="30"></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td style="color:#727272;" align="right"><label><input type="checkbox" name="agree2" value="1" id="agree21"> 我同意<font style="font-weight:bold; color:#0a97cd;">《OOZOOBOX注册协议》</font></label></td>
            <td align="right"><button type="submit" class="btn btn-color">下一步</button></td>
          </tr>
        </table>
    </td>
    <td align="center" valign="top"><img src="<?=$skin_url?>/images/join_font.png"></td>
  </tr>
  <tr>
    <td align="center" height="50"><img src="<?=$skin_url?>/images/join_bottom_img.png"></td>
    <td></td>
  </tr>
</form>
</table>
<script>
    function fregister_submit(f) {
        if (!f.agree2.checked) {
            alert("同意 会员注册协议后 才可以进行下一步.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
</script>
