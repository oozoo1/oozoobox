<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<div class="oz_order_main">
    <h3 class="order_tit"> 购买<span class="order_small">YOUR ORDER</span></h3>
    <div class="order_step">
        <h3 class="order_step_tit">
            <img src="/images/h3_order_step_tit.png" alt="购买顺序"/>
        </h3>
        <ol class="STEP02">
            <li>我的购物车</li>
            <li>提交订单</li>
            <li>支付成功</li> 
        </ol>
    </div>
    <div class="order_notice">
        <h4>购买时 注意事项 <span class="order_notice_small">购买时 请注意 以下事项</span></h4>
        <ul>
            <li>- 为了确保您的资金问题 请再次确认 商品金额, 请再次确认 收货地址 和收货人的信息 是否正确.</li>
            <li>- 取消订单内容可以在 `我的购物信息 > 我的订单` 里面确认, 不能确认的 请联系客服！.</li>
        </ul>            
    </div>








<div class="table-responsive order-item">
	<table id="sod_list" class="div-table table bg-white bsk-tbl">
	<tbody>
	<tr class="<?php echo $head_class;?>">
		<th scope="col"><span>图片</span></th>
		<th scope="col"><span>商品</span></th>
		<th scope="col"><span>数量</span></th>
		<th scope="col"><span>价格</span></th>
		<th scope="col"><span>代金卷</span></th>
		<th scope="col"><span>小计</span></th>
		<th scope="col"><span>积分</span></th>
	</tr>
	<?php for($i=0; $i < count($item); $i++) { ?>
		<tr<?php echo ($i == 0) ? ' class="tr-line"' : '';?>>
			<td class="text-center">
				<div class="item-img">
					<?php echo get_it_image($item[$i]['it_id'], 70, 70); ?>
					<div class="item-type"><?php echo $item[$i]['pt_it']; ?></div>
				</div>
			</td>
			<td>
				<input type="hidden" name="it_id[<?php echo $i; ?>]"    value="<?php echo $item[$i]['hidden_it_id']; ?>">
				<input type="hidden" name="it_name[<?php echo $i; ?>]"  value="<?php echo $item[$i]['hidden_it_name']; ?>">
				<input type="hidden" name="it_price[<?php echo $i; ?>]" value="<?php echo $item[$i]['hidden_sell_price']; ?>">
				<input type="hidden" name="cp_id[<?php echo $i; ?>]" value="<?php echo $item[$i]['hidden_cp_id']; ?>">
				<input type="hidden" name="cp_price[<?php echo $i; ?>]" value="<?php echo $item[$i]['hidden_cp_price']; ?>">
				<?php if($default['de_tax_flag_use']) { ?>
					<input type="hidden" name="it_notax[<?php echo $i; ?>]" value="<?php echo $item[$i]['hidden_it_notax']; ?>">
				<?php } ?>
				<b><?php echo $item[$i]['it_name']; ?></b>
				<?php if($item[$i]['it_options']) { ?>
					<div class="well well-sm"><?php echo $item[$i]['it_options'];?></div>
				<?php } ?>
			</td>
			<td class="text-center"><?php echo $item[$i]['qty']; ?></td>
			<td class="text-right"><?php echo number_format($item[$i]['ct_price'],2); ?></td>
			<td class="text-center">
				<?php if($item[$i]['is_coupon']) { ?>
					<div class="btn-group">
						<button type="button" class="cp_btn btn btn-black btn-xs">使用</button>
					</div>
				<?php } ?>
			</td>
			<td class="text-right"><b><?php echo $item[$i]['total_price']; ?></b></td>
			<td class="text-right"><?php echo $item[$i]['point']; ?></td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
</div>

<?php if ($goods_count) $goods .= ' 外 '.$goods_count.'件'; ?>

<!-- 주문상품 합계 시작 { -->
<div class="well">
	<div class="row">
		<div class="col-xs-6">结算价格</div>
		<div class="col-xs-6 text-right">
			<strong><?php echo number_format($tot_sell_price,2); ?> 元</strong>
		</div>
		<?php if($it_cp_count > 0) { ?>
			<div class="col-xs-6">代金卷</div>
			<div class="col-xs-6 text-right">
				<strong id="ct_tot_coupon">0 元</strong>
			</div>
		<?php } ?>
		<div class="col-xs-6">运费</div>
		<div class="col-xs-6 text-right">
			<strong><?php echo number_format($send_cost,2); ?> 元</strong>
		</div>
	</div>

	<div class="row">
		<?php $tot_price = $tot_sell_price + $send_cost; // 총계 = 주문상품금액합계 + 배송비 ?>
		<div class="col-xs-6 red"> <b>总计金额</b></div>
		<div class="col-xs-6 text-right red">
			<strong id="ct_tot_price"><?php echo number_format($tot_price,2); ?> 元</strong>
		</div>
	</div>

	<div class="row">	
		<div class="col-xs-6"> 积分</div>
		<div class="col-xs-6 text-right">
			<strong><?php echo number_format($tot_point,2); ?> 分</strong>
		</div>
	</div>
</div>
