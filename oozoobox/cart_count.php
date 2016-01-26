<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<?php
include_once('./_common.php');
$sql="select * from g5_shop_cart where mb_id = '$member[mb_id]' and ct_status = '쇼핑' and ct_select_time = '0000-00-00 00:00:00' LIMIT 0 , 1";
$sqlcart=sql_query($sql);
$rowcart=sql_fetch_array($sqlcart);

$ss_id=get_session('ss_cart_id');
if($ss_id){
	$s_cart_id = get_session('ss_cart_id');
}else{
  $s_cart_id = $rowcart[od_id];
}
$sql = " select a.ct_id,
				a.it_id,
				a.it_name,
				a.ct_price,
				a.ct_point,
				a.ct_qty,
				a.ct_status,
				a.ct_send_cost,
				a.it_sc_type,
				b.ca_id,
				b.ca_id2,
				b.ca_id3,
				b.pt_it,
				b.pt_msg1,
				b.pt_msg2,
				b.pt_msg3
		   from {$g5['g5_shop_cart_table']} a left join {$g5['g5_shop_item_table']} b on ( a.it_id = b.it_id )
		  where a.od_id = '$s_cart_id' ";
$sql .= " group by a.it_id ";
$sql .= " order by a.ct_id ";
$result = sql_query($sql);

$cart_count = sql_num_rows($result);
?>   
<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td style="color:#fff;"><?=$cart_count;?></td>
  </tr>
</table>
