<?php
include_once('./_common.php');
if ($is_admin == 'super' || $is_auth) {  
ob_start();
include_once('index.php');
$content = ob_get_contents();//取得php页面输出的全部内容
$fp = fopen("index.html", "w");
fwrite($fp, $content);
fclose($fp);
  echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	echo "<script>alert('HTML생성이 완료 되었습니다!');window.location='/'</script>";
}else{
	echo "<script>alert('您不是管理员');window.location='/'</script>";
}
?>
