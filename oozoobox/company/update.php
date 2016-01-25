<?php
include_once('./_common.php');

if($_POST[type]=="update"){
	$subject      =$_POST[subject];
	$email        =$_POST[email];
	$tel          =$_POST[tel];
	$content      =$_POST[content];
	$ip           =$_SERVER["SERVER_ADDR"];
	$datetime     =date("Y-m-d H:i:s");
	
	$sql = " insert into company
				set subject = '$subject',
					 email = '$email',
					 tel = '$tel',
					 content = '$content',
					 ip = '$ip',
					 datetime = '$datetime'";
	sql_query($sql);	
	
	echo "<script>alert('제휴문의 정상적으로 처리되었습니다 감사합니다!');window.location='/company/'</script>";

}?>