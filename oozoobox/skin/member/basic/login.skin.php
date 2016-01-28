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
<script language="javascript"> 
function changeEnter(){ 
    if(event.keyCode==13){event.keyCode=9;} 
} 
function setFocus()
{
		document.getElementById("mb_id").focus()
}
</script> 
<!-- 登录开始 { -->
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
<body onLoad="setFocus()">
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
<form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post">
<input type="hidden" name="url" value='<?php echo $login_url ?>'>
  <tr>
    <td height="162" valign="top" style="padding-top:20px;"><a href="/"><img src="<?=$skin_url?>/images/join_logo.png" border="0"></a></td>
  </tr>
  <tr>
    <td height="438" valign="top" background="<?=$skin_url?>/images/join_login_bg.png" style="padding:23px;">
      <table width="944" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="574" height="390" valign="top"><a href="/shop/list.php?ca_id=10" target="_blank"><img src="<?=$skin_url?>/images/login_ad.png" border="0"></a></td>
          <td width="370" valign="top">
              <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><font style="font-family:微软雅黑; font-size:18px; color:#888888; font-weight:bold;">会员登录</font></td>
                  <td align="right"><a href="/bbs/register.php"><img src="<?=$skin_url?>/images/join_bt_join.png"></a></td>
                </tr>
              </table>
              <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td height="45"></td>
                </tr>
                <tr>
                  <td>
                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="50"><input name="mb_id" type="text" id="mb_id" class="input" OnKeyDown="changeEnter()" style="border:solid 1px #dedede; background-image:url(/images/login_id_bg.png); color:#aaaaaa; width:300px; height:40px; padding-left:50px; ime-mode:inactive;"/></td>
                        </tr>
                        <tr>
                          <td height="50"><input name="mb_password" type="password" id="mb_password" class="input" OnKeyDown="changeEnter()" style="border:solid 1px #dedede; background-image:url(/images/login_pw_bg.png); color:#aaaaaa; width:300px; height:40px; padding-left:50px;"/></td>
                        </tr>
                        <tr>
                          <td height="70"><input type="submit" value="  登  录  " class="left"  style="background-color:#fd5c02; width:300px; height:40px; border:0; font-weight:bold; color:#fff;"/></td>
                        </tr>
                        <tr>
                          <td height="70">
                            <table width="300" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" height="45"><a href="./register.php" style="color:#4d4b4c;">还没有帐号?立即注册</a></td>
                                <td align="right"><a href="<?php echo G5_BBS_URL ?>/password_lost.php" style="color:#4d4b4c;" target="_blank" >忘记密码</a></td>
                              </tr>
                            </table>                          </td>
                        </tr>
                    </table>                  </td>
                </tr>
                <tr>
                  <td height="30"></td>
                </tr>
              </table>          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="50" align="center"><img src="<?=$skin_url?>/images/join_bottom_img.png"></td>
  </tr>
</form>
</table>
<script>
// submit 最终检测确认
function fregisterform_submit(f)
{
		// 会员ID 检查
		if (f.mb_id.value == "") {
//				var msg = mb_id_check();
				if (msg) {
						alert(msg);
						f.mb_id.focus();
						//f.mb_id.select();
						return false;
				}
		}else{
				//var msg = mb_id_check();
				if(!/^[a-zA-Z0-9]{1,}$/gi.test(document.getElementById("mb_id").value)) {
					alert('只能输入英文或者数字！');					 
					f.mb_id.focus();
					document.getElementById("mb_id").value="";
					return false;
				}	
		}

		if (f.mb_password.value == "") {
				alert('密码不能为空');
				if (f.mb_password.value.length < 4) {
						alert("密码必须输入4个以上字符组成");
						f.mb_password.focus();
						return false;
				}
		}

		document.getElementById("btn_submit").disabled = "disabled";

		return true;
}
</script>
<!-- } 登录结束 -->
</body>