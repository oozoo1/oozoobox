<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

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
.r_input{border:solid 1px #d9d9d9; width:240px; height:31px; color:#bdbdbd;}
-->
</style>
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script> 
<script type="text/javascript"><!--自动检查账号是否被注册-->
	$(
	  function()
	  	{    
		//账号   jQuery(普通应用时推荐，简单易用)
    	$("#reg_mb_id").blur(function()
								 {        //文本框鼠标焦点消失事件
			 						$.get("./member_ck_id.php?user="+$("#reg_mb_id").val(),null,function(data)   //此处get方式 可换为post方式按需求调整，其他无需修改使用方式一样
      		 					 	{
          		  						$("#chk").html(data);   //向ID为chk的元素内添加html代码
       		 						}
			 						);
       	 						}
						)		
						
		//邮箱   jQuery(普通应用时推荐，简单易用)
    	$("#mb_email").blur(function()
								 {        //文本框鼠标焦点消失事件
			 						$.get("./member_ck_id.php?mail="+$("#mb_email").val(),null,function(data)   //此处get方式 可换为post方式按需求调整，其他无需修改使用方式一样
      		 					 	{
          		  						$("#email").html(data);   //向ID为chk的元素内添加html代码
       		 						}
			 						);
       	 						}
						)		
			
						
						     
		}
	)
</script> 
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
<form class="form-horizontal" role="form" name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off">
  <tr>
    <td height="162" colspan="2" valign="top" style="padding-top:20px;"><a href="/"><img src="<?=$skin_url?>/images/join_logo.png" border="0"></a></td>
  </tr>
  <tr>
    <td width="559" height="403" valign="top" background="<?=$skin_url?>/images/join_box_bg.png" style="padding-top:35px;">
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td><font style="font-family:微软雅黑; font-size:18px; color:#888888; font-weight:bold;">找回密码</font></td>
            <td align="right"></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td height="55"></td>
          </tr>
          <tr>
            <td height="230" valign="top" style="line-height:25px;">
            		亲爱的 <strong>用户</strong> 请输入您注册时填写的邮箱地址 <br>系统会自动发给你 账号和临时密码.<br>
                请输入邮箱地址<br>
                <input type="text" name="mb_email" id="mb_email" required class="form-control input-sm email" size="30" maxlength="100"><span id="email"></span><br>
                
            </td>
          </tr>
          <tr>
            <td height="30"></td>
          </tr>
        </table>
        <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td align="right"><button type="submit" id="btn_submit" class="btn btn-color">找回密码</button>
	    				<a href="<?php echo G5_URL ?>" class="btn btn-color" role="button">取消</a></td>
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
<!-- } 회원정보 찾기 끝 -->