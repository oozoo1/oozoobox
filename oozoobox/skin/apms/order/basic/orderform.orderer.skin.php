<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(USE_G5_THEME && defined('G5_THEME_PATH')) {
    require_once(G5_SHOP_PATH.'/yc/orderaddress.php');
    return;
}

if(!$is_member)
    alert_close('회원이시라면 회원로그인 후 이용해 주십시오.');

if($w == 'd') {
    $sql = " delete from {$g5['g5_shop_order_address_table']} where mb_id = '{$member['mb_id']}' and ad_id = '$ad_id' ";
    sql_query($sql);
    goto_url($_SERVER['SCRIPT_NAME']);
}

$sql_common = " from {$g5['g5_shop_order_address_table']} where mb_id = '{$member['mb_id']}' ";

$sql = " select count(ad_id) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            $sql_common
            order by ad_default desc, ad_id desc
            limit $from_record, $rows";

$result = sql_query($sql);

if(!sql_num_rows($result))
    echo "<script>alert('没有 地址信息 请填写 地址信息');window.location='./member_address.php'</script>";

$list = array();

$sep = chr(30);
for($i=0; $row=sql_fetch_array($result); $i++) {
	$list[$i] = $row;
	$list[$i]['addr'] = $row['ad_name'].$sep.$row['ad_tel'].$sep.$row['ad_hp'].$sep.$row['ad_zip1'].$sep.$row['ad_zip2'].$sep.$row['ad_addr1'].$sep.$row['ad_addr2'].$sep.$row['ad_addr3'].$sep.$row['ad_jibeon'].$sep.$row['ad_subject'];

	$list[$i]['addr'] = get_text($list[$i]['addr']);
	$list[$i]['ad_name'] = get_text($list[$i]['ad_name']);
	$list[$i]['ad_subject'] = get_text($list[$i]['ad_subject']);
	$list[$i]['del_href'] = $_SERVER['SCRIPT_NAME'].'?w=d&amp;ad_id='.$row['ad_id'];
	$list[$i]['print_addr'] = print_address($row['ad_addr1'], $row['ad_addr2'], $row['ad_addr3'], $row['ad_jibeon']);

}


$pid = ($pid) ? $pid : ''; // Page ID
$at = apms_page_thema($pid);
include_once(G5_LIB_PATH.'/apms.thema.lib.php');

$skin_row = array();
$skin_row = apms_rows('order_'.MOBILE_.'skin, order_'.MOBILE_.'set');
$order_skin_path = G5_SKIN_PATH.'/apms/order/'.$skin_row['order_'.MOBILE_.'skin'];
$order_skin_url = G5_SKIN_URL.'/apms/order/'.$skin_row['order_'.MOBILE_.'skin'];

// 스킨설정
$wset = array();
if($skin_row['order_'.MOBILE_.'set']) {
	$wset = apms_unpack($skin_row['order_'.MOBILE_.'set']);
}
?>
<script type="text/javascript"  src="/js/ct.js"></script>  
<?php if(!$is_orderform) { //주문서가 필요없는 주문일 때 ?>


<?php } else { ?>

	

	<!-- 받으시는 분 입력 시작 { -->
	<section id="sod_frm_taker">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><i class="fa fa-truck fa-lg"></i> 收货人</strong><strong style="float:right;"> <a href="/shop/orderaddress.php" target="_blank">管理收货地址</a></strong></div>
			<div class="panel-body">
 
<? if($_GET[type_ad]){?>

                <table style="width:100%;" border="0" cellspacing="0" cellpadding="0">
				<?php for($i=0; $i < count($list); $i++) { ?>
                <? if($list[$i][ad_id]=="$_GET[type_ad]"){?>
                
                <!-- 주문하시는 분 입력 시작 { -->
                <input type="hidden" name="od_name" value="<?=$list[$i]['ad_name']?>">
                <input type="hidden" name="od_tel" value="<?=$list[$i]['ad_tel']?>">
                <input type="hidden" name="od_hp" value="<?=$list[$i]['ad_hp']?>">
                <input type="hidden" name="od_email" value="<?php echo $member['mb_email']; ?>">
                <input type="hidden" name="od_add1" value="<?=$list[$i]['ad_addr1']?>">
                <input type="hidden" name="od_add2" value="<?=$list[$i]['ad_addr2']?>">
                <input type="hidden" name="od_add3" value="<?=$list[$i]['ad_addr3']?>">
                <input type="hidden" name="od_addr_jibeon" value="<?=$list[$i]['ad_jibeon']?>">
                <!-- } 주문하시는 분 입력 끝 -->
                <!-- 받으시는 분 입력 시작 { -->                
                <input type="hidden" name="od_b_name" required maxlength="20" value="<?=$list[$i]['ad_name']?>">
                <input type="hidden" name="od_b_tel" required maxlength="20" value="<?=$list[$i]['ad_tel']?>">
                <input type="hidden" name="od_b_hp"  value="<?=$list[$i]['ad_hp']?>">
                <input type="hidden" name="od_b_zip" required size="6" maxlength="6" value="<?=$list[$i]['ad_subject']?>">
                <input type="hidden" name="od_b_addr1" required size="60" placeholder="기본주소" value="<?=$list[$i]['ad_addr1']?>">
                <input type="hidden" name="od_b_addr2" size="50" placeholder="상세주소" value="<?=$list[$i]['ad_addr2']?>">
                <input type="hidden" name="od_b_addr3" size="50" readonly="readonly" placeholder="참고항목" value="<?=$list[$i]['ad_addr3']?>">
                <input type="hidden" name="od_b_addr_jibeon" value="<?=$list[$i]['ad_jibeon']?>">
                <!-- 받으시는 분 입력 끝 { -->
                <? } ?>
                  <tr>
                    <td style="width:80px;"><? if($list[$i][ad_id]=="$_GET[type_ad]"){?><b>寄送至</b><?  } ?></td>
                    <td><input name="ad_sel_addr" type="checkbox" value="<?=$list[$i]['ad_id']?>" <? if($list[$i][ad_id]=="$_GET[type_ad]"){?>checked="checked"<? } ?> disabled="disabled"></td>
                    <td>&nbsp;</td>
                    <td style="text-align:left; <? if($list[$i][ad_id]=="$_GET[type_ad]"){?>font-weight:bold; font-size:14px;<? } ?>"><a href="/shop/orderform.php?sw_direct=1&type_ad=<?=$list[$i][ad_id]?>"><span style="color:#333333;"><?php echo $list[$i]['print_addr']; ?> <?php echo $list[$i]['ad_jibeon']; ?> （<?=$list[$i]['ad_name']?> 收）</span> <span style="color:#bbb;"><?php echo $list[$i]['ad_hp']; ?></span></a></td>
                    <td>修改本地址</td>
                  </tr>                  
                <? } ?>
                </table>
                
 <? }else{ ?>
 
                <table style="width:100%;" border="0" cellspacing="0" cellpadding="0">
				<?php for($i=0; $i < count($list); $i++) { ?>
                <? if($list[$i]['ad_default']){?>   
                
                <!-- 주문하시는 분 입력 시작 { -->
                <input type="hidden" name="od_name" value="<?=$list[$i]['ad_name']?>">
                <input type="hidden" name="od_tel" value="<?=$list[$i]['ad_tel']?>">
                <input type="hidden" name="od_hp" value="<?=$list[$i]['ad_hp']?>">
                <input type="hidden" name="od_email" value="<?php echo $member['mb_email']; ?>">
                <input type="hidden" name="od_add1" value="<?=$list[$i]['ad_addr1']?>">
                <input type="hidden" name="od_add2" value="<?=$list[$i]['ad_addr2']?>">
                <input type="hidden" name="od_add3" value="<?=$list[$i]['ad_addr3']?>">
                <input type="hidden" name="od_addr_jibeon" value="<?=$list[$i]['ad_jibeon']?>">
                <!-- } 주문하시는 분 입력 끝 -->
                <!-- 받으시는 분 입력 시작 { -->               
                <input type="hidden" name="od_b_name" required maxlength="20" value="<?=$list[$i]['ad_name']?>">
                <input type="hidden" name="od_b_tel" required maxlength="20" value="<?=$list[$i]['ad_tel']?>">
                <input type="hidden" name="od_b_hp"  value="<?=$list[$i]['ad_hp']?>">
                <input type="hidden" name="od_b_zip" required size="6" maxlength="6" value="<?=$list[$i]['ad_subject']?>">
                <input type="hidden" name="od_b_addr1" required size="60" placeholder="기본주소" value="<?=$list[$i]['ad_addr1']?>">
                <input type="hidden" name="od_b_addr2" size="50" placeholder="상세주소" value="<?=$list[$i]['ad_addr2']?>">
                <input type="hidden" name="od_b_addr3" size="50" readonly="readonly" placeholder="참고항목" value="<?=$list[$i]['ad_addr3']?>">
                <input type="hidden" name="od_b_addr_jibeon" value="<?=$list[$i]['ad_jibeon']?>">
                <!-- 받으시는 분 입력 끝 { -->
                <? } ?>
                  <tr>
                    <td style="width:80px;"><? if($list[$i]['ad_default']){?><b>寄送至</b><?  } ?></td>
                    <td><input name="ad_sel_addr" type="checkbox" value="<?=$list[$i]['ad_id']?>" <? if($list[$i]['ad_default']){?>checked="checked"<? } ?> disabled="disabled"></td>
                    <td>&nbsp;</td>
                    <td style="text-align:left; <? if($list[$i]['ad_default']){?>font-weight:bold; font-size:14px;<? } ?>"><a href="/shop/orderform.php?sw_direct=1&type_ad=<?=$list[$i][ad_id]?>"><span style="color:#333333;"><?php echo $list[$i]['print_addr']; ?> <?php echo $list[$i]['ad_jibeon']; ?> （<?=$list[$i]['ad_name']?> 收）</span> <span style="color:#bbb;"><?php echo $list[$i]['ad_hp']; ?></span></a></td>
                    <td>修改本地址</td>
                  </tr>                  
                <? } ?>
                </table>
 
 
 
 
 <br />

 
 
 <? } ?>
 
 
 
 
 
            


				<div class="form-group">
					<label class="col-sm-2 control-label" for="od_memo"><b>快递留言</b></label>
					<div class="col-sm-8">
						<textarea name="od_memo" rows=3 id="od_memo" class="form-control input-sm"></textarea>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- } 받으시는 분 입력 끝 -->
<?php } ?>