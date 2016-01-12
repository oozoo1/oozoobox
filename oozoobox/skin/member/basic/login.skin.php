<?php
if (!defined('_GNUBOARD_')) exit; //禁止单独访问此页

// add_stylesheet('css 文本', 显示顺序); 数字越小的优先显示
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<script type="text/javascript">
// 엠파스 로긴 참고
var bReset = true;
function chkReset(f)
{
    if (bReset) { if ( f.mb_id.value == '请输入用户名' ) f.mb_id.value = ''; bReset = false; }
    document.getElementById("pw1").style.display = "none";
    document.getElementById("pw2").style.display = "";
}
</script>
<!-- 登录开始 { --><style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	 background-color:#f6c801;
}

-->
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="760" style="background:url(/images/login_bg.png) no-repeat center bottom;">    
        <table width="914" border="0" cellspacing="0" cellpadding="0" align="center">          
          <tr>
            <td width="624" bgcolor="#ffffff">&nbsp;</td>
      <td width="380" height="487" valign="top" bgcolor="#ffffff" style="position:static; box-shadow:1px 1px 1px 1px #cccccc; padding:38px;">
                <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
                <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
                <input type="hidden" name="url" value='<?php echo $login_url ?>'>
                  <tr>
                    <td width="100" height="24" style="color:#555; font-size:1.3em;">欢迎登录</td>
                    <td width="20"></td>
                    <td><div style="border-bottom:solid 1px #555; width:100%;"></div></td>
                  </tr>
                  <tr>
                    <td height="22" colspan="3"></td>
                  </tr>
                  <tr>
                    <td height="41" colspan="3">
                    <input id="mb_id" name="mb_id" type="text" class="input" value='请输入用户名' style="border:solid 1px #dedede; background-image:url(/images/login_id_bg.png); color:#aaaaaa; width:300px; height:40px; padding-left:50px;"  onMouseOver='chkReset(this.form);' onFocus='chkReset(this.form);'/>
                    </td>
                  </tr>
                  <tr>
                    <td height="27" colspan="3"></td>
                  </tr>
                  <tr>
                    <td height="41" colspan="3" id=pw1>
                    <input id="mb_password" name="mb_password" type="text" class="input" value='请输入密码' style="border:solid 1px #dedede; background-image:url(/images/login_pw_bg.png); color:#aaaaaa; width:300px; height:40px; padding-left:50px;" onMouseOver='chkReset(this.form);' onfocus='chkReset(this.form);'/>
                    </td>
                    <td height="41" colspan="3" id=pw2 style='display:none;'>
                    <input id="mb_password" name="mb_password" type="password" class="input" style="border:solid 1px #dedede; background-image:url(/images/login_pw_bg.png); color:#aaaaaa; width:300px; height:40px; padding-left:50px;"/>
                    </td>
                  </tr>                  
                  <tr>
                    <td height="27" colspan="3"></td>
                  </tr>
                  <tr>
                    <td height="41" colspan="3"><input type="submit" value="  登  录  " class="left"  style="background-color:#fd5c02; width:300px; height:40px; border:0; font-weight:bold; color:#fff;"/></td>
                  </tr>
                  </form>
                </table>
                <table width="300" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" height="45"><a href="./register.php" style="color:#4d4b4c;">还没有帐号?立即注册</a></td>
                    <td align="right"><a href="<?php echo G5_BBS_URL ?>/password_lost.php" style="color:#4d4b4c;" target="_blank" >忘记密码</a></td>
                  </tr>
                </table>                
            </td>
          </tr>
        </table>
    </td>
  </tr>
</table>
<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("开启自动登录功能后系统将会记住您的登录信息.\n\n请勿在网吧等公共场所设备上开启此功能\n\n点击确定开启自动登录功能");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
<!-- } 登录结束 -->