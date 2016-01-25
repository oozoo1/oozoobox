<?php
$sub_menu = "100100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$token = get_token();

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');


$g5['title'] = '제휴문의';



///////////////////////////////////////////    修改内容   ///////////////////////////////////////
if($_GET[w]=="d"){

$sql_del="delete from  company where id='$_GET[id]'";
$query_del=sql_query($sql_del);
echo "<script>alert('정상적으로 삭제되었습니다!');window.location='./company.php'</script>";
}

///////////////////////////////////////////    리스트   ///////////////////////////////////////
$sql_common = " from company ";
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함


include_once ('./admin.head.php');

?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="55" height="45" align="center" bgcolor="#f6f9fa"><b>No.</b></td>
      <td width="120" align="center" bgcolor="#f6f9fa"><b>제안자</b></td>
      <td width="160" bgcolor="#f6f9fa" style="padding-left:10px;"><b>E-mail</b></td>
      <td width="120" bgcolor="#f6f9fa" style="padding-left:10px;"><b>연락처</b></td>
      <td bgcolor="#f6f9fa" style="padding-left:10px;"><b>제휴내용</b></td>
      <td width="60" align="center" bgcolor="#f6f9fa"><b>삭제</b></td>
    </tr>
    <? 
			$sql = " select * from company
						order by datetime desc
						limit $from_record, $rows  ";
			$result = sql_query($sql);
			for ($i=0; $row=sql_fetch_array($result); $i++) {
		?>
    <tr>
      <td height="40" align="center"><?php echo $row['id']; ?></td>
      <td align="center"><?=$row_ct['subject']?></td>
      <td style="padding-left:10px;"><?php echo $row['email']; ?></td>
      <td style="padding-left:10px;"><?php echo $row['tel']; ?></td>
      <td style="padding-left:10px;"><?php echo $row['content']; ?></td>
      <td align="center"><a href="company.php?w=d&id=<?=$row[id]?>" style="color:#d60000; font-weight:bold;">삭제</a></td>
    </tr>
    <? } ?>
  </table>
<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>






<?
include_once ('./admin.tail.php');
?>
