<?php
$sub_menu = "100800";
include_once("./_common.php");

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.", G5_URL);


echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
echo "<script>";
	$Tp = $_GET["tp"];
	if ('B' == $Tp) {	//메인백업
		echo "window.location='/write_html_b.php'";
	}else if ('N' == $Tp){	//메인생성
		//echo "window.location='/write_html.php'";
	}else if ('R' == $Tp){	//메인복원
		echo "window.location='/write_html_r.php'";
	}
echo "</script>";

$g5['title'] = "메인페이지 Html생성.";
include_once("./admin.head.php");
?>
<table id="box" cellspacing="0" cellpadding="10" boder="0">
<tr>
	<td colspan="2">현재 등록되어 있는 정보로 메인의 html을 생성 합니다.</td>
</tr>
<tr>
	<td colspan="2">생성 하실때 1건만 백업 해 놓으니 신중히 하시기 바랍니다. 최근 1건만 복원이 가능 합니다.</td>
</tr>
<tr>
      <td width="50%" height="50" align="right"><a href="write_html.php?tp=B">생성</a></td>
      <td width="50%" height="50" align="left"><a href="write_html.php?tp=R">복원</a></td>
</tr>
</table>

<?php
include_once("./admin.tail.php");
?>
