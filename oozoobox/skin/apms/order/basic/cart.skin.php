<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

// 목록헤드
if(isset($wset['chead']) && $wset['chead']) {
	add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/head/'.$wset['chead'].'.css" media="screen">', 0);
	$head_class = 'list-head';
} else {
	$head_class = (isset($wset['ccolor']) && $wset['ccolor']) ? 'tr-head border-'.$wset['ccolor'] : 'tr-head border-black';
}

// 헤더 출력
if($header_skin)
	include_once('./header.php');

?>

<script src="<?php echo $skin_url;?>/shop.js"></script>

<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
		<div id="mod_option_box"></div>
	  </div>
    </div>
  </div>
</div>

<form name="frmcartlist" id="sod_bsk_list" method="post" action="<?php echo $action_url; ?>" class="form" role="form">
    <div class="table-responsive">
<!--s: 장바구니--> 
<div id="#oz_order_wrap">
	<!--s: 장바구니 wrap-->
    <div class="oz_order_main">
    	<h3 class="order_tit"> 购买<span class="order_small">YOUR ORDER</span></h3>
        <div class="order_step">
            <h3 class="order_step_tit">
                <img src="/images/h3_order_step_tit.png" alt="购买顺序"/>
            </h3>
            <ol>
            	<li>我的购物车</li>
                <li>提交订单</li>
                <li>支付成功</li> 
            </ol>
    	</div>
        <div class="order_notice">
        	<h4>주문 전 확인사항  <span class="order_notice_small">장바구니에 담겨진 제품을 구입하실때 아래 사향을 꼭 확인해 주십시오</span></h4>
            <ul>
            	<li>- OOZOOBOX에서 배송되는 제품과 商店에서 배송되는 제품은 서로 다른 장바구니에 담겨지며, 다른 장바구니에 담긴 제품들은 묶음 배송이 되지 않습니다.</li>
                <li>- 다른 장바구니에 담긴 제품들은 각기 다른 배송업체, 날짜, 시간에 배송될 수 있으며 각각의 장바구니에 배송료가 별도로 부과됩니다.</li>
                <li>- 장바구니에 담긴 상품 중 일정기간이 지난 후 구매시 실 구매가격과 차이가 발생할 수 있습니다.</li>
            </ul>
        	<h4>꼭 읽어보세요!</h4>
            <ul>
            	<li>- 직접 취소가 가능한 내역은 `我的购物信息 > 我的订单` 에서 확인 가능하며, 불가한 내역은 고객센터로 문의해 주세요.</li>
                <li>- 결제 전, 선택 상품의 옵션과 수량을 다시 한 번 확인 부탁드립니다.</li>
                <li>- 장바구니의 상품은 30일간 보관됩니다.</li>
            </ul>            
        </div>
        <!-- s: 장바구니 상품 없음-->
        <div id="order_no_item">
        	<div class="content2">                 
                <table class="div-table table bsk-tbl bg-white">
                <tbody>
                <tr class="<?php echo $head_class;?>">
                    <th scope="col">
                        <label for="ct_all" class="sound_only">상품 전체</label>
                        <span><input type="checkbox" name="ct_all" value="1" id="ct_all" checked="checked"></span>
                    </th>
                    <th scope="col"><span>图片</span></th>
                    <th scope="col"><span>商品</span></th>
                    <th scope="col"><span>数量</span></th>
                    <th scope="col"><span>价格</span></th>
                    <th scope="col"><span>小计</span></th>
                    <th scope="col"><span>积分</span></th>
                    <th scope="col"><span class="last">运费</span></th>
                </tr>
                <?php for($i=0;$i < count($item); $i++) { ?>
                    <tr<?php echo ($i == 0) ? ' class="tr-line"' : '';?>>
                        <td class="text-center">
                            <label for="ct_chk_<?php echo $i; ?>" class="sound_only">상품</label>
                            <input type="checkbox" name="ct_chk[<?php echo $i; ?>]" value="1" id="ct_chk_<?php echo $i; ?>" checked="checked">
                        </td>
                        <td class="text-center">
                            <div class="item-img">
                                <?php echo get_it_image($item[$i]['it_id'], 100, 100); ?>
                                <div class="item-type">
                                    <?php echo $item[$i]['pt_it']; ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" name="it_id[<?php echo $i; ?>]" value="<?php echo $item[$i]['it_id']; ?>">
                            <input type="hidden" name="it_name[<?php echo $i; ?>]" value="<?php echo get_text($item[$i]['it_name']); ?>">
                            <a href="./item.php?it_id=<?php echo $item[$i]['it_id'];?>">
                                <b><?php echo stripslashes($item[$i]['it_name']); ?></b>
                            </a>
                            <?php if($item[$i]['it_options']) { ?>
                                <div class="well well-sm"><?php echo $item[$i]['it_options'];?></div>
                                <button type="button" class="btn btn-primary btn-sm btn-block mod_options">选项/数量 修改</button>
                            <?php } ?>
                        </td>
                        <td class="text-center"><?php echo number_format($item[$i]['qty']); ?></td>
                        <td class="text-right"><?php echo number_format($item[$i]['ct_price']); ?></td>
                        <td class="text-right"><span id="sell_price_<?php echo $i; ?>"><?php echo number_format($item[$i]['sell_price']); ?></span></td>
                        <td class="text-right"><?php echo number_format($item[$i]['point']); ?></td>
                        <td class="text-center"><?php echo $item[$i]['ct_send_cost']; ?></td>
                    </tr>
                <?php } ?>
                <?php if ($i == 0) { ?>
                    <tr><td colspan="8" class="text-center text-muted"><p style="padding:50px 0;">购物车 没有东西了！ 快去抢购吧！.</p></td></tr>
                <?php } ?>
                </tbody>
                <?php if ($tot_price > 0 || $send_cost > 0) { ?>
                <tfoot>
                        <?php if ($send_cost > 0) { // 배송비가 0 보다 크다면 (있다면) ?>
                    	<tr>
                        	<td class="save" colspan="8">
                            	<button name="btnMoreProduct" class="more_ozbox" type="button" value="0">배송비 절약상품 보기</button>
                                <p class="order_delivery"><?php echo number_format($send_cost); ?> 元</p>
                            </td>
                        </tr>
                        <? } ?>
                        <tr>
                        	<td class="order_sum" colspan="8">
                                <img class="order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                                <span class="order_article">商品金额</span>
                                <span class="order_price">¥<?php echo number_format($tot_price-$send_cost); ?> </span>
                                <img class="order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                                <span class="order_article">运费</span>
                                <span class="order_price">¥<?php echo number_format($send_cost); ?></span>
                            </td>                                
                        </tr>
                        <tr>
                        	<td class="merge" colspan="8">
                        	<span class="order_article_b">结算总额</span>
                            <span class="order_price"><?php echo number_format($tot_price); ?></span>
                            <span class="order_article">元</span>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } ?>
                </table>
                </div>
            </div>
        </div>
        
        <div style="margin-bottom:15px; text-align:center;">
            <?php if ($i == 0) { ?>
                <a href="<?php echo G5_SHOP_URL; ?>/" class="btn btn-color btn-sm">继续购物</a>
            <?php } else { ?>
                <input type="hidden" name="url" value="./orderform.php">
                <input type="hidden" name="records" value="<?php echo $i; ?>">
                <input type="hidden" name="act" value="">
                    <div class="btn_area01">
                        <button class="select" id="btnAllOrder" onclick="return form_check('buy');" style="margin-right:20px;" type="button">
                            <img src="/images/btn_AllOrder.png" alt="立即订购"/>
                        </button>
                        <button class="select" id="btnCheckOrder" onclick="return form_check('buy');"  style="margin-right:20px;" type="button">
                            <img src="/images/btn_select_order.png" alt="选择购物"/>
                        </button>                         
                        <button class="select" id="btnList" type="button">
                            <a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $continue_ca_id; ?>"><img src="/images/btn_List.png" alt="继续购物"/></a>
                        </button>              
                    </div><br />

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $continue_ca_id; ?>" class="btn btn-black btn-block btn-sm"><i class="fa fa-cart-plus"></i> 继续购物</a>
                                </div>
                                <div class="btn-group">
                                    <button type="button" onclick="return form_check('seldelete');" class="btn btn-black btn-block btn-sm"><i class="fa fa-times"></i> 选择删除</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" onclick="return form_check('alldelete');" class="btn btn-black btn-block btn-sm"><i class="fa fa-trash"></i> 清空购物车</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
            <?php } ?>
        </div>
</div>
</div>
</form>
<script>
	$(function() {
		var close_btn_idx;

		// 선택사항수정
		$(".mod_options").click(function() {
			var it_id = $(this).closest("tr").find("input[name^=it_id]").val();
			var $this = $(this);
			close_btn_idx = $(".mod_options").index($(this));
			$('#cartModal').modal('show');
			$.post(
				"./cartoption.php",
				{ it_id: it_id },
				function(data) {
					$("#mod_option_form").remove();
					//$this.after("<div id=\"mod_option_frm\"></div>");
					$("#mod_option_box").html(data);
					price_calculate();
				}
			);
		});

		// 모두선택
		$("input[name=ct_all]").click(function() {
			if($(this).is(":checked"))
				$("input[name^=ct_chk]").attr("checked", true);
			else
				$("input[name^=ct_chk]").attr("checked", false);
		});

		// 옵션수정 닫기
	    $(document).on("click", "#mod_option_close", function() {
			$('#cartModal').modal('hide');
			//$("#mod_option_frm").remove();
			$("#mod_option_form").remove();
			$(".mod_options").eq(close_btn_idx).focus();
		});
		$("#win_mask").click(function () {
			$('#cartModal').modal('hide');
			//$("#mod_option_frm").remove();
			$("#mod_option_form").remove();
			$(".mod_options").eq(close_btn_idx).focus();
		});

	});

	function form_check(act) {
		var f = document.frmcartlist;
		var cnt = f.records.value;

		if (act == "buy")
		{
			if($("input[name^=ct_chk]:checked").size() < 1) {
				alert("주문하실 상품을 하나이상 선택해 주십시오.");
				return false;
			}

			f.act.value = act;
			f.submit();
		}
		else if (act == "alldelete")
		{
			f.act.value = act;
			f.submit();
		}
		else if (act == "seldelete")
		{
			if($("input[name^=ct_chk]:checked").size() < 1) {
				alert("삭제하실 상품을 하나이상 선택해 주십시오.");
				return false;
			}

			f.act.value = act;
			f.submit();
		}

		return true;
	}
</script>
