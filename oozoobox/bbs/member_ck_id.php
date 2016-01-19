<?php //检测帐号是否被注册的AJAX部分
@header("Content-type:text/html;charset=UTF-8");
include('_common.php');//加载配置文件

//GET方式获取数据（取决于异步提交时提交方式）
if($_GET['user'])
{
   $user=$_GET['user'];    
    //此处可进行数据库匹配，本次省略直接判断
	$sql="select mb_id from g5_member where mb_id='$user'";//判断用户是否已经存在
	$result=sql_query($sql);
	$num_rows=sql_fetch_array($result);	
    if($num_rows>0)
	{		
		echo "<img src=\"images/member_ck_no.gif\" class=\"t1\"/>";
	}
    else
	{
		echo "<img src=\"images/member_ck_ok.gif\" class=\"t1\"/>";
	}
}


//GET方式获取数据（取决于异步提交时提交方式）
if($_GET['old_pass'])
{
  $user=$_GET['old_pass']; 
	$mb_password = get_encrypt_string($user); 
    //此处可进行数据库匹配，本次省略直接判断
	$sql="select mb_id , mb_password from g5_member where mb_id='$member[mb_id]'";//判断用户是否已经存在
	$result=sql_query($sql);
	$num_rows=sql_fetch_array($result);	
    if($mb_password=="$num_rows[mb_password]")
	{		
		echo "<img src=\"/bbs/images/member_ck_ok.gif\" class=\"t1\"/>";
	}
    else
	{
		echo "<img src=\"/bbs/images/member_ck_no.gif\" class=\"t1\"/>";
	}
}

	
if($_GET['e_mail'])
{
  $reg_mb_email=$_GET['e_mail'];    
    //此处可进行数据库匹配，本次省略直接判断

						if (!preg_match("/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/", $reg_mb_email)){
								echo "<font color=red>格式不正确</font>";
						}else{

							// 邮箱重复验证
			
								$sql="select mb_email from g5_member where mb_email='$reg_mb_email'";//判断用户是否已经存在
								$result=sql_query($sql);
								$num_rows=sql_fetch_array($result);	
									if($num_rows>0)
								{		
									echo "<font color=red>已被注册</font>";
								}
									else
								{
									echo "<img src=\"/bbs/images/member_ck_ok.gif\" class=\"t1\"/>";
								}
								
					 }

}
if($_GET['mail'])
{
  $mb_email=$_GET['mail'];    
    //此处可进行数据库匹配，本次省略直接判断

						if (!preg_match("/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/", $mb_email)){
								echo "<font color=red>格式不正确</font>";
						}else{
									echo "<img src=\"/bbs/images/member_ck_ok.gif\" class=\"t1\"/>";
								}

}
?>