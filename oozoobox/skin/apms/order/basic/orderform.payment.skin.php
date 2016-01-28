<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<section id="sod_frm_pay" class="order-payment">
	<div class="panel panel-default">
		<div class="panel-heading"><strong><i class="fa fa-check fa-lg"></i> 结算信息</strong></div>
		<div class="panel-body">
			<?php if($oc_cnt > 0) { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"><b>订单金额</b></label>
					<label class="col-sm-2 control-label">
						<span id="od_cp_price">0</span>元
					</label>
					<div class="col-sm-7">
						<input type="hidden" name="od_cp_id" value="">
						<div class="btn-group">
							<button type="button" id="od_coupon_btn" class="btn btn-black btn-sm">使用购物券</button>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if($sc_cnt > 0) { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"><b>运费优惠</b></label>
					<label class="col-sm-2 control-label">
						<span id="sc_cp_price">0</span>元
					</label>
					<div class="col-sm-7">
						<input type="hidden" name="sc_cp_id" value="">
						<div class="btn-group">
							<button type="button" id="sc_coupon_btn" class="btn btn-black btn-sm">使用优惠券</button>
						</div>
					</div>
				</div>
			<?php } ?>
			

			<?php if($is_none) { ?>
				<div class="alert alert-danger text-center">
					<?php if($default['as_point']) { ?>
						<b>没有积分.</b>
					<?php } else { ?>
						<b>결제할 방법이 없습니다.</b> 운영자에게 알려주시면 감사하겠습니다.
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"><b>支付方式</b></label>
					<div class="col-sm-10 radio-line">
						<?php if($is_kakaopay) { ?>
							 <label><input type="radio" id="od_settle_kakaopay" name="od_settle_case" value="KAKAOPAY"> <span class="kakaopay_icon">KAKAOPAY</span></label>
						<?php } ?>
						<?php if($is_po) { ?>
							 <label><input type="radio" id="od_settle_point" name="od_settle_case" value="포인트"> 积分结账</label>
						<?php } ?>
						<?php if($is_mu) { ?>
							<label><input name="od_settle_case" type="radio" id="od_settle_bank" value="支付宝" checked="checked"> 支付宝
				       </label>
						<?php } ?>

						<?php if($is_vbank) { ?>
							<label><input type="radio" id="od_settle_vbank" name="od_settle_case" value="가상계좌"> <?php echo $escrow_title;?>가상계좌</label>
						<?php } ?>

						<?php if($is_iche) { ?>
							<label><input type="radio" id="od_settle_iche" name="od_settle_case" value="계좌이체"> <?php echo $escrow_title;?>계좌이체</label>
						<?php } ?>

						<?php if($is_hp) { ?>
							<label><input type="radio" id="od_settle_hp" name="od_settle_case" value="휴대폰"> 휴대폰</label>
						<?php } ?>

						<?php if($is_card) { ?>
							<label><input type="radio" id="od_settle_card" name="od_settle_case" value="신용카드"> 신용카드</label>
						<?php } ?>

						<?php if($is_easy_pay) { ?>
							<label><input type="radio" id="od_settle_easy_pay" name="od_settle_case" value="간편결제"> <span class="<?php echo $pg_easy_pay_name;?>"><?php echo $pg_easy_pay_name;?></span></label>
						<?php } ?>
					</div>
				</div>

				<?php if($is_point) { ?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="od_temp_point"><b>사용 포인트</b></label>
						<div class="col-sm-2">
							<input type="hidden" name="max_temp_point" value="<?php echo $temp_point;?>">
							<div class="input-group">
								<input type="text" name="od_temp_point" value="0" id="od_temp_point" class="frm_input form-control input-sm" size="10">
								<span class="input-group-addon">점</span>
							</div>
						</div>
						<div class="col-sm-7 font-12">
							<span id="sod_frm_pt">
								보유포인트(<?php echo display_point($member['mb_point']);?>)중 <strong id="use_max_point">최대 <?php echo display_point($temp_point);?></strong>까지 사용 가능 
								(<?php echo $point_unit;?>점 단위로 입력)
							</span>
						</div>
					</div>
				<?php } ?>

				<?php if($is_mu) { ?>
					<div id="settle_bank" style="display:none">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="od_bank_account"><b>입금할 계좌</b></label>
							<div class="col-sm-4">
								<select name="od_bank_account" id="od_bank_account" class="form-control input-sm">
									<option value="">선택하십시오.</option>
									<?php echo $bank_account; ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="od_deposit_name"><b>입금자명</b></label>
							<div class="col-sm-2">
								<input type="text" name="od_deposit_name" id="od_deposit_name" class="form-control input-sm" size="10" maxlength="20">
							</div>
						</div>
					</div>
				<?php } ?>

			<?php } ?>
		</div>
	</div>
</section>
