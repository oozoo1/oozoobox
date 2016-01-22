<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

// 목록헤드
if(isset($wset['ivhead']) && $wset['ivhead']) {
	add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/head/'.$wset['ivhead'].'.css" media="screen">', 0);
	$head_class = 'list-head';
} else {
	$head_class = (isset($wset['ivcolor']) && $wset['ivcolor']) ? 'tr-head border-'.$wset['ivcolor'] : 'tr-head border-black';
}

// 헤더 출력
if($header_skin)
	include_once('./header.php');

?>

<div class="well well-sm">
	<i class="fa fa-shopping-cart fa-lg"></i> 订单号码 : <strong><?php echo $od_id; ?></strong>
</div>

<div class="table-responsive">
	<table class="div-table table bsk-tbl bg-white">
	<tbody>
	<tr class="<?php echo $head_class;?>">
		<th scope="col"><span>图片</span></th>
		<th scope="col"><span>商品名称 / 套餐选项</span></th>
		<th scope="col"><span>数量</span></th>
		<th scope="col"><span>价格</span></th>
		<th scope="col"><span>小计</span></th>
		<th scope="col"><span>积分</span></th>
	</tr>
	<?php for($i=0; $i < count($item); $i++) { ?>
		<?php for($k=0; $k < count($item[$i]['opt']); $k++) { ?>
			<?php if($k == 0) { ?>
				<tr<?php echo ($i == 0) ? ' class="tr-line"' : '';?>>
					<td class="text-center" rowspan="<?php echo $item[$i]['rowspan']; ?>">
						<div class="item-img">
							<?php echo get_it_image($item[$i]['it_id'], 50, 50); ?>
							<div class="item-type"><?php echo $item[$i]['pt_it']; ?></div>
						</div>
					</td>
					<td colspan="7"><a href="./item.php?it_id=<?php echo $item[$i]['it_id']; ?>"><strong><?php echo $item[$i]['it_name']; ?></strong></a></td>
				</tr>
			<?php } ?>
			<tr>
				<td><?php echo $item[$i]['opt'][$k]['ct_option']; ?></td>
				<td class="text-center"><?php echo number_format($item[$i]['opt'][$k]['ct_qty']); ?></td>
				<td class="text-right"><?php echo number_format($item[$i]['opt'][$k]['opt_price'],2); ?></td>
				<td class="text-right"><?php echo number_format($item[$i]['opt'][$k]['ct_qty']*$item[$i]['opt'][$k]['opt_price'],2); ?></td>
				<td class="text-right"><?php echo number_format($item[$i]['opt'][$k]['point'],2); ?></td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
	</table>
</div>

<div class="well">
	<div class="row">
		<div class="col-xs-6">订单总价</div>
		<div class="col-xs-6 text-right">
			<strong><?php echo number_format($od['od_cart_price'],2); ?> 元</strong>
		</div>
		<?php if($od['od_cart_coupon'] > 0) { ?>
			<div class="col-xs-6">商品 打折</div>
			<div class="col-xs-6 text-right">
				<strong><?php echo number_format($od['od_cart_coupon'],2); ?> 元</strong>
			</div>
		<?php } ?>
		<?php if($od['od_coupon'] > 0) { ?>
			<div class="col-xs-6">金额 打折</div>
			<div class="col-xs-6 text-right">
				<strong><?php echo number_format($od['od_coupon'],2); ?> 元</strong>
			</div>
		<?php } ?>

		<?php if ($od['od_send_cost'] > 0) { ?>
			<div class="col-xs-6">运费</div>
			<div class="col-xs-6 text-right">
				<strong><?php echo number_format($od['od_send_cost'],2); ?> 元</strong>
			</div>
		<?php } ?>

		<?php if($od['od_send_coupon'] > 0) { ?>
			<div class="col-xs-6">运费 打折</div>
			<div class="col-xs-6 text-right">
				<strong><?php echo number_format($od['od_send_coupon'],2); ?> 元</strong>
			</div>
		<?php } ?>

		<?php if ($od['od_send_cost2'] > 0) { ?>
			<div class="col-xs-6">附加运费</div>
			<div class="col-xs-6 text-right">
				<strong><?php echo number_format($od['od_send_cost2'],2); ?> 元</strong>
			</div>
		<?php } ?>

		<?php if ($od['od_cancel_price'] > 0) { ?>
			<div class="col-xs-6">取消金额</div>
			<div class="col-xs-6 text-right">
				<strong><?php echo number_format($od['od_cancel_price'],2); ?> 元</strong>
			</div>
		<?php } ?>

		<div class="col-xs-6 red"> <b>总价</b></div>
		<div class="col-xs-6 text-right red">
			<strong><?php echo number_format($tot_price,2); ?> 元</strong>
		</div>

		<div class="col-xs-6"> 积分</div>
		<div class="col-xs-6 text-right">
			<strong><?php echo number_format($tot_point,2); ?> 分</strong>
		</div>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading"><strong><i class="fa fa-star fa-lg"></i> 结算信息</strong></div>
	<div class="table-responsive">
		<table class="div-table table bsk-tbl bg-white">
		<col width="120">
		<tbody>
		<tr>
			<th scope="row">订单号码</th>
			<td><?php echo $od_id; ?></td>
		</tr>
		<tr>
			<th scope="row">订单日期</th>
			<td><?php echo $od['od_time']; ?></td>
		</tr>
		<tr>
			<th scope="row">支付方式</th>
			<td><?php echo ($easy_pay_name ? $easy_pay_name.'('.$od['od_settle_case'].')' : $od['od_settle_case']); ?></td>
		</tr>
		<tr class="active">
			<th scope="row">结算金额</th>
			<td><?php echo $od_receipt_price; ?></td>
		</tr>
		<?php if($od['od_receipt_price'] > 0) {	?>
			<tr>
				<th scope="row">结算日期</th>
				<td><?php echo $od['od_receipt_time']; ?></td>
			</tr>
		<?php } ?>
		<?php if($app_no_subj) { // 승인번호, 휴대폰번호, 거래번호 ?>
			<tr>
				<th scope="row"><?php echo $app_no_subj; ?></th>
				<td><?php echo $app_no; ?></td>
			</tr>
		<?php } ?>
		<?php if ($od['od_receipt_point'] > 0) { ?>
			<tr>
				<th scope="row">使用积分</th>
				<td><?php echo display_point($od['od_receipt_point']); ?></td>
			</tr>
		<?php } ?>
		<?php if ($od['od_refund_price'] > 0) { ?>
			<tr>
				<th scope="row">退还金额</th>
				<td><?php echo display_price($od['od_refund_price']); ?></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>

<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="90">
        <form name=alipayment action="/alipay/alipayapi.php" method=post target="_blank">
        <input type="hidden" size="30" name="WIDout_trade_no" value="<?=$od_id?>" title="订单号码" />
        <input type="hidden" size="30" name="WIDsubject" value="OOZOOBOX" title="订单名称" />
        <input type="hidden" size="30" name="WIDprice" value="<?php echo number_format($tot_price,2); ?>" title="付款金额" />
        <input type="hidden" size="30" name="WIDbody" value="OOZOOBOX" title="订单描述"/>
        <input type="hidden" size="30" name="WIDshow_url" value="http://dev.oozoobox.com/shop/orderinquiryview.php?od_id=<?=$_GET[od_id]?>" title="订单地址" />
        <input type="hidden" size="30" name="WIDreceive_name" value="<?php echo get_text($od['od_b_name']); ?>" title="收货人" />
        <input type="hidden" size="30" name="WIDreceive_address" value="<?=$od['od_b_addr1']?> - <?=$od['od_b_addr2']?> - <?=$od['od_b_addr3']?> - <?=$od['od_b_addr_jibeon']?>" title="收货地址" />
        <input type="hidden" size="30" name="WIDreceive_zip" value="100000" title="邮政编码"/>
        <input type="hidden" size="30" name="WIDreceive_phone" value="<?php echo get_text($od['od_b_tel']); ?>" title="收货人电话"/>
        <input type="hidden" size="30" name="WIDreceive_mobile" value="<?php echo get_text($od['od_b_hp']); ?>" title="收货人手机"/>
        <button class="btn btn-black btn-sm" type="submit" style="text-align:center; padding:10px 20px 10px 20px;">确认支付</button>
        </form>        
    </td>
    <td width="10"></td>
    <td>
      <div class="text-center">
        <button type="button" data-toggle="collapse" href="#sod_fin_cancelfrm" aria-expanded="false" aria-controls="sod_fin_cancelfrm" class="btn btn-black btn-sm" style="text-align:center; padding:10px 20px 10px 20px; background-color:#ddd;"><font color="#242424">取消订单</font></button>
      </div>
    </td>
  </tr>
</table>
		<div class="h15"></div>

		<div id="sod_fin_cancelfrm" class="collapse">
			<div class="well">
      
				<form class="form" role="form" method="post" action="./orderinquirycancel.php" onsubmit="return fcancel_check(this);">
				<input type="hidden" name="od_id"  value="<?php echo $od['od_id']; ?>">
				<input type="hidden" name="token"  value="<?php echo $token; ?>">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">取消理由</span>
						<input type="text" name="cancel_memo" id="cancel_memo" required class="form-control input-sm" size="40" maxlength="100">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-black btn-sm">取消订单</button>
						</span>
					</div>
				</form>
			</div>
		</div>


<?php if ($is_account_test) { ?>
	<div class="alert alert-danger">
		관리자가 가상계좌 테스트를 한 경우에만 보입니다.
	</div>

	<form class="form" role="form" method="post" action="http://devadmin.kcp.co.kr/Modules/Noti/TEST_Vcnt_Noti_Proc.jsp" target="_blank">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><i class="fa fa-cog fa-lg"></i> 모의입금처리</strong></div>
			<div class="table-responsive">
				<table class="div-table table bsk-tbl bg-white">
				<col width="120">
				<tbody>
				<tr>
					<th scope="col"><label for="e_trade_no">KCP 거래번호</label></th>
					<td><input type="text" name="e_trade_no" value="<?php echo $od['od_tno']; ?>" class="form-control input-sm"></td>
				</tr>
				<tr>
					<th scope="col"><label for="deposit_no">입금계좌</label></th>
					<td><input type="text" name="deposit_no" value="<?php echo $deposit_no; ?>" class="form-control input-sm"></td>
				</tr>
				<tr>
					<th scope="col"><label for="req_name">입금자명</label></th>
					<td><input type="text" name="req_name" value="<?php echo $od['od_deposit_name']; ?>" class="form-control input-sm"></td>
				</tr>
				<tr>
					<th scope="col"><label for="noti_url">입금통보 URL</label></th>
					<td><input type="text" name="noti_url" value="<?php echo G5_SHOP_URL; ?>/settle_kcp_common.php" class="form-control input-sm"></td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
		<div id="sod_fin_test" class="text-center">
			<input type="submit" value="입금통보 테스트" class="btn btn-color btn-sm">
		</div>
	</form>
<?php } ?>

<script>
function fcancel_check(f) {
    if(!confirm("确定取消商品订单吗？"))
        return false;

    var memo = f.cancel_memo.value;
    if(memo == "") {
        alert("请填写取消理由！");
        return false;
    }

    return true;
}
</script>
