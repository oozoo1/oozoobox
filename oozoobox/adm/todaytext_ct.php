<?php
$sub_menu = "100100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$token = get_token();

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');


$g5['title'] = '오늘한마디구분';
///////////////////////////////////////////    写入内容   ///////////////////////////////////////
if($_POST[w]=="w"){
		$ct_subject_kr       =$_POST[ct_subject_kr];
		$ct_subject_cn       =$_POST[ct_subject_cn];
		$ct_date          	 =$_POST[ct_date];
		
		$sql = " insert into todaytext_ct
					set ct_subject_kr = '$ct_subject_kr',
						 ct_subject_cn = '$ct_subject_cn',
						 ct_date = '$ct_date'";
		sql_query($sql);	
		
			echo "<script>alert('작성완료 되었습니다!');window.location='./todaytext_ct.php'</script>";
		
}


///////////////////////////////////////////    修改内容   ///////////////////////////////////////
if($_POST[w]=="u"){

		$ct_subject_kr       =$_POST[ct_subject_kr];
		$ct_subject_cn       =$_POST[ct_subject_cn];
		$ct_date          	 =$_POST[ct_date];
		
		$sql = " update todaytext_ct
					set ct_subject_kr = '$ct_subject_kr',
						 ct_subject_cn = '$ct_subject_cn',
						 ct_date = '$ct_date'
						 where id = '$_GET[id]'";
		$sql_query=sql_query($sql);		

	echo "<script>alert('정상적으로 수정되었습니다!');window.location='./todaytext_ct.php?w=u&id=$_GET[id]'</script>";

}

///////////////////////////////////////////    修改内容   ///////////////////////////////////////
if($_GET[w]=="d"){

$sql_del="delete from  todaytext_ct where id='$_GET[id]'";
$query_del=sql_query($sql_del);
echo "<script>alert('정상적으로 삭제되었습니다!');window.location='./todaytext_ct.php'</script>";
}


///////////////////////////////////////////    구분 리스트   ///////////////////////////////////////
$sql = "SELECT * FROM todaytext_ct";
$result = sql_query($sql);

///////////////////////////////////////////    리스트   ///////////////////////////////////////
$sql_common = " from todaytext_ct ";
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함


///////////////////////////////////////////    내용수정 출력   ///////////////////////////////////////
$sqlview = "SELECT * FROM todaytext_ct WHERE id =$_GET[id]";
$viewsql = sql_query($sqlview);
$view=sql_fetch_array($viewsql);

include_once ('./admin.head.php');

?>
<? if($_GET[w]=="w" || $_GET[w]=="u"){?>
<style type="text/css">
    .linetd{ padding:10px; font-size:12px;}
	.linediv{float:left; padding-right:5px;}
	.overlay{
		position:fixed;
		top:0px;
		bottom:0px;
		left:0px;
		right:0px;
		z-index:99999;
		opacity:0.3; filter: alpha(opacity=50); background-color:#000; 
	}

	.box{
		position:fixed;
		top:-500px;
		left:30%;
		right:30%;
		background-color:#fff;
		color:#7F7F7F;
		padding:20px;
		z-index:999999;
		border:solid 5px #eee;
		}
		a.boxclose{
			float:right;
			width:26px;
			height:26px;				
			margin-top:-20px;
			cursor:pointer;
		}
</style>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <form name="fregisterform" action="" method="post">
  <input type="hidden" name="w" value="<?=$_GET[w]?>" />
    <tr>
      <td align="right" class="linetd" width="120">한문</td>
      <td style="padding:10px;"><input name="ct_subject_kr" type="text" class="form-control input-sm" style="border:solid 1px #ced9de; background-color:#f6f9fa; width:300px; height:30px;" value="<?=$view[ct_subject_kr]?>" required="required" role="combobox" placeholder="한문 내용입력하십시오" /></td>
    </tr>
    <tr>
      <td align="right" class="linetd">중문</td>
      <td style="padding:10px;">
      <input name="ct_subject_cn" type="text" style="border:solid 1px #ced9de; background-color:#f6f9fa; width:300px; height:30px;" value="<?=$view[ct_subject_cn]?>" required="required" role="combobox" placeholder="중문 내용입력하십시오" />
      </td>
    </tr>
    <tr>
      <td align="right" class="linetd">날짜</td>
      <td style="padding:10px;">
      <input name="ct_date" type="text" style="border:solid 1px #ced9de; background-color:#f6f9fa; width:120px; height:30px;" value="<?=$view[ct_date]?>" required="required" role="combobox" placeholder="例：2016-01-01" />
      </td>
    </tr>
    <tr>
      <td align="right" class="linetd"></td>
      <td height="60" style="padding-left:10px; text-align:left;" class="btn_confirm01 btn_confirm"><input type="submit" value=" 确认保存 " class="btn_submit" /></td>
    </tr>
  </form>
  </table>
<? }else{ ?>
  <div style="float:right;" class="btn_confirm01 btn_confirm"><a href="./todaytext_ct.php?w=w"><button class="btn_submit">추가하기</button></a></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40" width="260" style="padding-left:10px;" bgcolor="#f6f9fa"><b>한문</b></td>
      <td width="260" bgcolor="#f6f9fa" style="padding-left:10px;"><b>중문</b></td>
      <td bgcolor="#f6f9fa" style="padding-left:10px;"><b>날짜</b></td>
      <td width="60" align="center" bgcolor="#f6f9fa"><b>수정</b></td>
      <td width="60" align="center" bgcolor="#f6f9fa"><b>삭제</b></td>
    </tr>
    <? 
			$sql = " select * from todaytext_ct
						order by ct_date desc
						limit $from_record, $rows  ";
			$result = sql_query($sql);
			for ($i=0; $row=sql_fetch_array($result); $i++) {
		?>
    <tr>
      <td height="30" style="padding-left:10px;"><?=$row['ct_subject_kr']?></td>
      <td style="padding-left:10px;"><?php echo $row['ct_subject_cn']; ?></td>
      <td style="padding-left:10px;"><?php echo $row['ct_date']; ?></td>
      <td align="center"><a href="todaytext_ct.php?w=u&id=<?=$row[id]?>" style="color:#00a2e5; font-weight:bold;">수정</a></td>
      <td align="center"><a href="todaytext_ct.php?w=d&id=<?=$row[id]?>" style="color:#d60000; font-weight:bold;">삭제</a></td>
    </tr>
    <? } ?>
  </table>
<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>
<? } ?>






<?
include_once ('./admin.tail.php');
?>
