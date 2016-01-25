<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="/skin/apms/item/shop/style.css" media="screen">', 0);

if($is_orderable) echo '<script src="'.$item_skin_url.'/shop.js"></script>'.PHP_EOL;

//////////////////////////////////点赞开始/////////////////////////////////////////////////////
		$mb_id=$_GET[mb];
		$it_id=$_GET[it_id];	

		if($_GET[type]=="yes"){
		if (!$member['mb_id'])
    alert('会员才可以点赞哦！.');
		//////////////////누루기전/////////////////////////			
				$it_8=$it[it_8]+1;
				
				$sql = " insert into g5_shop_item_good
							set mb_id = '$mb_id',
								 it_id = '$it_id',								 
								 good_time = '".G5_TIME_YMDHIS."'";
				sql_query($sql);	
				
				$sql = " update g5_shop_item
							set it_8 = '$it_8'
							 where it_id = '$it_id' ";
				$sql_query=sql_query($sql);	
		
				echo "<script>alert('感谢您点赞！');window.location='/shop/item.php?it_id=$_GET[it_id]&ca_id=$_GET[ca_id]'</script>";
		
		}else if($_GET[type]=="no"){
		if (!$member['mb_id'])
    alert('会员才可以点赞哦！.');		
		//////////////////누루기후/////////////////////////
				$it_8=$it[it_8]-1;
				
				$sql_del="delete from  g5_shop_item_good where it_id='$it_id' and mb_id='$mb_id' ";
				$query_del=sql_query($sql_del);
				
				
				$sql = " update g5_shop_item
							set it_8 = '$it_8'
							 where it_id = '$it_id' ";
				$sql_query=sql_query($sql);			
		
		
				echo "<script>alert('您的赞已被收回！');window.location='/shop/item.php?it_id=$_GET[it_id]&ca_id=$_GET[ca_id]'</script>";
		}
		
$sqlgood = "SELECT * FROM g5_shop_item_good WHERE mb_id = '$member[mb_id]' and it_id='$it_id'";
$resultgood = sql_query($sqlgood);
$row_good=sql_fetch_array($resultgood);

/////////////////////////////////////////////////////点赞结束/////////////////////////////////////////////////////////


// 이미지처리
$j=0;
$thumbnails = array();
$item_image = '';
$item_image_href = '';
for($i=1; $i<=10; $i++) {
	if(!$it['it_img'.$i])
		continue;

	$thumb = get_it_thumbnail($it['it_img'.$i], 72, 72);

	if($thumb) {
		$org_url = G5_DATA_URL.'/item/'.$it['it_img'.$i];
		$img = apms_thumbnail($org_url, 418, 418, false, true);
		$thumb_url = ($img['src']) ? $img['src'] : $org_url;
		if($j == 0) {
			$item_image = $thumb_url; // 큰이미지
			$item_image_href = G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;ca_id='.$ca_id.'&amp;no='.$i; // 큰이미지 주소
		}
		$thumbnails[$j] = '<a href="#" ref="'.$thumb_url.'" class="thumb_item_image popup_item_image">'.$thumb.'<span class="sound_only"> '.$i.'번째 이미지 새창</span></a>';
		$j++;
	}
}

// 카운팅
$it_comment_cnt = ($it['pt_comment'] > 0) ? ' <b class="orangered en">'.number_format($it['pt_comment']).'</b>' : '';
$it_use_cnt = ($item_use_count > 0) ? ' <b class="orangered en">'.number_format($item_use_count).'</b>' : '';
$it_qa_cnt = ($item_qa_count > 0) ? ' <b class="orangered en">'.number_format($item_qa_count).'</b>' : '';

// 판매자
$is_seller = ($it['pt_id'] && $it['pt_id'] != $config['cf_admin']) ? true : false;


$sql = " select wi_id from {$g5['g5_shop_wish_table']}
          where mb_id = '{$member['mb_id']}' and it_id = '$it_id' ";
$row = sql_fetch($sql);

?>


<!--s: 상세보기-->
    	<!--s: 상세보기 제품 사진, 가격정보-->
    	<div class="detail_good">
        	<!--s: 제품 사진 보기-->
        	<div class="detail_good_pic">
                <div class="item-image">

                <div id="flyItem" class="fly_item"><img src="images/item-pic.jpg" width="40" height="40"></div>

                <? if($it[it_1]){?>
                    <iframe height=409 width=409 src="http://player.youku.com/embed/<?=$it[it_1]?>==" frameborder=0 allowfullscreen></iframe>           
                    <? }else{ ?>
                    <a href="<?php echo $item_image_href;?>" id="item_image_href" class="popup_item_image" target="_blank">
                        <img id="item_image" src="<?php echo $item_image;?>" alt="" width="418">
                    </a>
                    <? } ?>
                    <?php if($wset['shadow']) echo apms_shadow($wset['shadow']); //그림자 ?>
                </div>
                <ul class="detail_good_slide_small">  
                    <div class="item-thumb text-center">
						<?php for($i=0; $i < 5; $i++) { ?>
                            <li><?=$thumbnails[$i]?></li>
                        <? } ?>
                    </div>
                </ul>
                <script>
                    $(function(){
                        $(".thumb_item_image").hover(function() {
                            var img = $(this).attr("ref");
                            var url = $(this).attr("href");
                            $("#item_image").attr("src", img);
                            $("#item_image_href").attr("href", url);
                            return true;
                        });
                        // 이미지 크게보기
                        $(".popup_item_image").click(function() {
                            var url = $(this).attr("href");
                            var top = 10;
                            var left = 10;
                            var opt = 'scrollbars=yes,top='+top+',left='+left;
                
                            return false;
                        });
                    });
                </script>    
            </div>
            <!--e: 제품 사진 보기-->

            <!--s: 제품 가격 정보-->
            <div class="detail_good_info">
                <div class="detail_good_info">
                    <h3><?php echo stripslashes($it['it_name']); // 상품명 ?></h3>
                    <?php if($it['it_basic']) { // 기본설명 ?>
                        <p class="help-block"><?php echo $it['it_basic']; ?></p>
                    <?php } ?>
                    <form name="fitem" method="post" action="<?php echo $action_url; ?>" class="form item-form" role="form" onsubmit="return fitem_submit(this);">
                    <input type="hidden" name="it_id[]" value="<?php echo $it_id; ?>">
                    <input type="hidden" name="it_msg1[]" value="<?php echo $it['pt_msg1']; ?>">
                    <input type="hidden" name="it_msg2[]" value="<?php echo $it['pt_msg2']; ?>">
                    <input type="hidden" name="it_msg3[]" value="<?php echo $it['pt_msg3']; ?>">
                    <input type="hidden" name="sw_direct">
                    <input type="hidden" name="url">
        
                    <table class="div-table table">
                    <col width="120">
                    <tbody>
                    <?php if ($it['it_use_avg']) { ?>
                        <tr>
                            <th scope="row">满意度</th>
                            <td><?php echo apms_get_star($it['it_use_avg'],'fa-lg red'); //평균별점 ?>
                            	<div class="u_like_module">
                                  <? if($row_good[mb_id]){?>
                                  <a class="btn_u_like on" href="/shop/item.php?it_id=<?=$_GET[it_id]?>&ca_id=<?=$_GET[ca_id]?>&mb=<?=$member[mb_id]?>&type=no">
                                    	<span class="ico_u"></span>
                                        <em class="u_cnt"><? echo number_format($it[it_8]*1);?></em> <!--누른 후-->
                                  </a>  
                                  <? }else{ ?>
                                	<a class="btn_u_like" href="/shop/item.php?it_id=<?=$_GET[it_id]?>&ca_id=<?=$_GET[ca_id]?>&mb=<?=$member[mb_id]?>&type=yes">
                                    	<span class="ico_u"></span>
                                        <em class="u_cnt"><? echo number_format($it[it_8]*1);?></em> <!--누르기 전-->
                                  </a>                                 
                                	<? } ?>                              
                                </div>
                                <? if (!$row['wi_id']) {?>
                                <a href="#" onclick="apms_wishlist('<?php echo $it['it_id']; ?>'); return false;"><img src="/images/detail_btn_wishlist.png" onMouseOver="this.src='/images/detail_btn_wishlist_o.png'"  onMouseOut="this.src='/images/detail_btn_wishlist.png'" alt="收藏关注商品"/></a><? }else{ ?>
                                <img src="/images/detail_btn_wishlist_o.png" alt="收藏关注商品"/>
                                <? } ?>
                            </td>
                        </tr>
                    <?php } ?>
                        <tr class="good_info_scrap"><th scope="row">分享</th><td>
                            <div class="bshare-custom">
                            <a title="分享到QQ空间" class="bshare-qzone">QQ空间</a><a title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a>
                            <a title="分享到人人网" class="bshare-renren">人人网</a><a title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a>
                            <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
                            <script src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh" type="text/javascript" charset="utf-8"></script>
                            <script src="http://static.bshare.cn/b/bshareC0.js" type="text/javascript" charset="utf-8"></script>
                        </td></tr>
                    <?php if ($it['it_maker']) { ?>
                        <tr><th scope="row">制造商</th><td><?php echo $it['it_maker']; ?></td></tr>
                    <?php } ?>
                    <?php if ($it['it_origin']) { ?>
                        <tr><th scope="row">原产地</th><td><?php echo $it['it_origin']; ?></td></tr>
                    <?php } ?>
                    <?php if ($it['it_brand']) { ?>
                        <tr><th scope="row">品牌</th><td><?php echo $it['it_brand']; ?></td></tr>
                    <?php } ?>
                    <?php if ($it['it_model']) { ?>
                        <tr><th scope="row">型号</th><td><?php echo $it['it_model']; ?></td></tr>
                    <?php } ?>
                    <?php if (!$it['it_use']) { // 판매가능이 아닐 경우 ?>
                        <tr><th scope="row">价格</th><td>停止销售</td></tr>
                    <?php } else if ($it['it_tel_inq']) { // 전화문의일 경우 ?>
                        <tr><th scope="row">价格</th><td>电话咨询</td></tr>
                    <?php } else { // 전화문의가 아닐 경우?>
                        <?php if ($it['it_cust_price']) { ?>
                            <tr><th scope="row">市场价格</th><td><?php echo number_format($it['it_cust_price'],2); ?></td></tr>
                        <?php } // 시중가격 끝 ?>
                        <tr><th scope="row">价格</th><td>
                                <?php echo display_price(get_price($it)); ?>
                                <input type="hidden" id="it_price" value="<?php echo get_price($it); ?>">
                        </td></tr>
                    <?php } ?>
                    <?php
                        /* 재고 표시하는 경우 주석 해제
                        <tr><th scope="row">재고수량</th><td><?php echo number_format(get_it_stock_qty($it_id)); ?> 개</td></tr>
                        */
                    ?>
                    <?php if ($config['cf_use_point']) { // 포인트 사용한다면 ?>
                        <tr>
                        <th scope="row">积分</th>
                        <td>
                            <?php
                                if($it['it_point_type'] == 2) {
                                    echo '购买价格(套餐除外) '.$it['it_point'].'%';
                                } else {
                                    $it_point = get_item_point($it);
                                    echo number_format($it_point).'分';
                                }
                            ?>
                        </td>
                        </tr>
                    <?php } ?>
                    <?php if($it['it_buy_min_qty']) { ?>
                        <tr><th>最少购买量</th><td><?php echo number_format($it['it_buy_min_qty']); ?> 件</td></tr>
                    <?php } ?>
                    <?php if($it['it_buy_max_qty']) { ?>
                        <tr><th>最多购买量</th><td><?php echo number_format($it['it_buy_max_qty']); ?> 件</td></tr>
                    <?php } ?>
                    <?php
                        $ct_send_cost_label = '邮费';
        
                        if($it['it_sc_type'] == 1)
                            $sc_method = '包邮';
                        else {
                            if($it['it_sc_method'] == 1)
                                $sc_method = '货到付款';
                            else if($it['it_sc_method'] == 2) {
                                $ct_send_cost_label = '<label for="ct_send_cost">邮费</label>';
                                $sc_method = '<select name="ct_send_cost" id="ct_send_cost" class="form-control input-sm">
                                                  <option value="0">购买时 支付</option>
                                                  <option value="1">货到时 支付</option>
                                              </select>';
                            }
                            else
                                $sc_method = '购买时 支付';
                        }
                    ?>
                    <tr>
                        <th><?php echo $ct_send_cost_label; ?></th><td><?php echo $sc_method; ?></td>
                    </tr>
                    </tbody>
                    </table>
        
                    <div id="item_option">
                        <?php if($option_item) { ?>
                            <p>&nbsp; <b><i class="fa fa-check-square-o fa-lg"></i> 선택옵션</b></p>
                            <table class="div-table table">
                            <col width="120">
                            <tbody>
                            <?php echo $option_item; // 선택옵션	?>
                            </tbody>
                            </table>
                        <?php }	?>
        
                        <?php if($supply_item) { ?>
                            <p>&nbsp; <b><i class="fa fa-check-square-o fa-lg"></i> 추가옵션</b></p>
                            <table class="div-table table">
                            <col width="120">
                            <tbody>
                            <?php echo $supply_item; // 추가옵션 ?>
                            </tbody>
                            </table>
                        <?php }	?>
        
                        <?php if ($is_orderable) { ?>
                            <div id="it_sel_option">
                                <?php
                                if(!$option_item) {
                                    if(!$it['it_buy_min_qty'])
                                        $it['it_buy_min_qty'] = 1;
                                ?>
                                    <ul id="it_opt_added" class="list-group">
                                        <li class="it_opt_list list-group-item">
                                            <input type="hidden" name="io_type[<?php echo $it_id; ?>][]" value="0">
                                            <input type="hidden" name="io_id[<?php echo $it_id; ?>][]" value="">
                                            <input type="hidden" name="io_value[<?php echo $it_id; ?>][]" value="<?php echo $it['it_name']; ?>">
                                            <input type="hidden" class="io_price" value="0">
                                            <input type="hidden" class="io_stock" value="<?php echo $it['it_stock_qty']; ?>">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <label>
                                                        <span class="it_opt_subj"><?php echo $it['it_name']; ?></span>
                                                        <span class="it_opt_prc"><span class="sound_only">(+0元)</span></span>
                                                    </label>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group">
                                                        <label for="ct_qty_<?php echo $i; ?>" class="sound_only">수량</label>
                                                        <input type="text" name="ct_qty[<?php echo $it_id; ?>][]" value="<?php echo $it['it_buy_min_qty']; ?>" id="ct_qty_<?php echo $i; ?>" class="form-control input-sm" size="5">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="it_qty_plus btn btn-black btn-sm"><i class="fa fa-plus-circle fa-lg"></i><span class="sound_only">증가</span></button>
                                                            <button type="button" class="it_qty_minus btn btn-black btn-sm"><i class="fa fa-minus-circle fa-lg"></i><span class="sound_only">감소</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($it['pt_msg1']) { ?>
                                                <div style="margin-top:10px;">
                                                    <input type="text" name="pt_msg1[<?php echo $it_id; ?>][]" class="form-control input-sm" placeholder="<?php echo $it['pt_msg1'];?>">
                                                </div>
                                            <?php } ?>
                                            <?php if($it['pt_msg2']) { ?>
                                                <div style="margin-top:10px;">
                                                    <input type="text" name="pt_msg2[<?php echo $it_id; ?>][]" class="form-control input-sm" placeholder="<?php echo $it['pt_msg2'];?>">
                                                </div>
                                            <?php } ?>
                                            <?php if($it['pt_msg3']) { ?>
                                                <div style="margin-top:10px;">
                                                    <input type="text" name="pt_msg3[<?php echo $it_id; ?>][]" class="form-control input-sm" placeholder="<?php echo $it['pt_msg3'];?>">
                                                </div>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                    <script>
                                    $(function() {
                                        price_calculate();
                                    });
                                    </script>
                                <?php } ?>
                            </div>
                            <!-- 총 구매액 -->
                            <h4 style="text-align:right; margin-bottom:15px;">
                                选择商品 合算 : <span id="it_tot_price">0元</span>
                            </h4>
                        <?php } ?>
                    </div>
        
                    <?php if($is_soldout) { ?>
                        <p id="sit_ov_soldout">재고가 부족하여 구매할 수 없습니다.</p>
                    <?php } ?>
        
                    <?php if ($is_orderable) { ?>
                    
                    	<? if($member[mb_id]){?>                    
                        <div class="choice-control">
                            <input type="image" onclick="document.pressed=this.value;" src="/images/detail_btn_01.png" value="바로구매">
                            <input type="image" onclick="document.pressed=this.value;" src="/images/detail_btn_02.png" value="장바구니">

                            <a href="#" onclick="apms_wishlist('<?php echo $it['it_id']; ?>'); return false;">
                                <button id="btnAddToWishList" type="button">
                                    <img alt="MD询问(MD에게 묻기)" src="/images/detail_btn_03.png" title="MD询问(MD에게 묻기)"/>
                                </button>
                            </a>
                            <a href="/shop/itemrecommend.php?it_id=<?php echo $it['it_id']; ?>&ca_id=<?php echo $ca_id; ?>">
                                    <img alt="找人付款" src="/images/detail_btn_04.png" title="找人付款"/>
                            </a>                                      
                        </div>                        
                      <? }else{ ?>
                        <div class="choice-control">
                            <a href="#" onClick="javascript:if(confirm('您还不是网站会员 是否要登陆网站？')){document.location.href='/bbs/login.php?url=<?=urlencode("{$_SERVER[PHP_SELF]}?{$_SERVER[QUERY_STRING]}")?>'};">
                                <button id="btnAddToWishList" type="button">
                                    <img alt="立即购买" src="/images/detail_btn_01.png" title="立即购买"/>
                                </button>
                            </a>
                            <a href="#" onClick="javascript:if(confirm('您还不是网站会员 是否要登陆网站？')){document.location.href='/bbs/login.php?url=<?=urlencode("{$_SERVER[PHP_SELF]}?{$_SERVER[QUERY_STRING]}")?>'};">
                                <button id="btnAddToWishList" type="button">
                                    <img alt="载入购物车" src="/images/detail_btn_02.png" title="购物车"/>
                                </button>
                            </a>
                            <a href="#" onclick="apms_wishlist('<?php echo $it['it_id']; ?>'); return false;">
                                <button id="btnAddToWishList" type="button">
                                    <img alt="MD询问(MD에게 묻기)" src="/images/detail_btn_03.png" title="MD询问(MD에게 묻기)"/>
                                </button>
                            </a>
                            <a href="#" onClick="javascript:if(confirm('您还不是网站会员 是否要登陆网站？')){document.location.href='/bbs/login.php?url=<?=urlencode("{$_SERVER[PHP_SELF]}?{$_SERVER[QUERY_STRING]}")?>'};">
                                <button id="btnAddToSend" type="button">
                                    <img alt="软磨硬泡(조르기)" src="/images/detail_btn_04.png" title="软磨硬泡(조르기)"/>
                                </button>
                            </a>                                       
                        </div>                         
                      <? } ?>  
                        
                        
						<?php /*?>     
                        <div class="detail_seller_store" style="padding-left: 3px;"><br>
                            <a href="<?php echo $at_href['myshop'];?>?id=<?php echo $author['mb_id'];?>">
                                <img alt="进入店铺" src="/images/btn_allitem_thisshop.png"/>
                            </a>          
                        </div><?php */?>  <!--상점 가기-->     
                                         
                    <?php } if(!$is_orderable && $it['it_soldout'] && $it['it_stock_sms']) { ?>
                        <div style="text-align:center; padding:12px 0;">
                            <button type="button" onclick="popup_stocksms('<?php echo $it['it_id']; ?>','<?php echo $ca_id; ?>');" class="btn btn-primary">재입고알림(SMS)</button>
                        </div>
                    <?php } ?>
                    </form>
        
                    <script>
                        // BS3
                        $(function() {
                            $("select.it_option").addClass("form-control input-sm");
                            $("select.it_supply").addClass("form-control input-sm");
                        });
        
                        // 재입고SMS 알림
                        function popup_stocksms(it_id, ca_id) {
                            url = "./itemstocksms.php?it_id=" + it_id + "&ca_id=" + ca_id;
                            opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
                            popup_window(url, "itemstocksms", opt);
                        }
        
                        // 바로구매, 장바구니 폼 전송
                        function fitem_submit(f) {
                            if (document.pressed == "장바구니") {
                                f.sw_direct.value = 0;
                            } else { // 바로구매
                                f.sw_direct.value = 1;
                            }
        
                            // 판매가격이 0 보다 작다면
                            if (document.getElementById("it_price").value < 0) {
                                alert("전화로 문의해 주시면 감사하겠습니다.");
                                return false;
                            }
        
                            if($(".it_opt_list").size() < 1) {
                                alert("선택옵션을 선택해 주십시오.");
                                return false;
                            }
        
                            var val, io_type, result = true;
                            var sum_qty = 0;
                            var min_qty = parseInt(<?php echo $it['it_buy_min_qty']; ?>);
                            var max_qty = parseInt(<?php echo $it['it_buy_max_qty']; ?>);
                            var $el_type = $("input[name^=io_type]");
        
                            $("input[name^=ct_qty]").each(function(index) {
                                val = $(this).val();
        
                                if(val.length < 1) {
                                    alert("수량을 입력해 주십시오.");
                                    result = false;
                                    return false;
                                }
        
                                if(val.replace(/[0-9]/g, "").length > 0) {
                                    alert("수량은 숫자로 입력해 주십시오.");
                                    result = false;
                                    return false;
                                }
        
                                if(parseInt(val.replace(/[^0-9]/g, "")) < 1) {
                                    alert("수량은 1이상 입력해 주십시오.");
                                    result = false;
                                    return false;
                                }
        
                                io_type = $el_type.eq(index).val();
                                if(io_type == "0")
                                    sum_qty += parseInt(val);
                            });
        
                            if(!result) {
                                return false;
                            }
        
                            if(min_qty > 0 && sum_qty < min_qty) {
                                alert("선택옵션 개수 총합 "+number_format(String(min_qty))+"개 이상 주문해 주십시오.");
                                return false;
                            }
        
                            if(max_qty > 0 && sum_qty > max_qty) {
                                alert("선택옵션 개수 총합 "+number_format(String(max_qty))+"개 이하로 주문해 주십시오.");
                                return false;
                            }
        
                            if (document.pressed == "장바구니") {
                                $.post("./itemcart.php", $(f).serialize(), function(error) {
                                    if(error != "OK") {
                                        alert(error.replace(/\\n/g, "\n"));
                                        return false;
                                    } else {
                                        if(confirm("장바구니에 담겼습니다.\n\n바로 확인하시겠습니까?")) {
                                            document.location.href = "./cart.php";
                                        }
                                    }
                                });
                                return false;
                            } else {
                                return true;
                            }
                        }
        
                        // Wishlist
                        function apms_wishlist(it_id) {
                            if(!it_id) {
                                alert("商品信息有误.");
                                return false;
                            }
        
                            $.post("./itemwishlist.php", { it_id: it_id },	function(error) {
                                if(error != "OK") {
                                    alert(error.replace(/\\n/g, "\n"));
                                    return false;
                                } else {
                                    if(confirm("已添加到收藏夹.\n\n是否要进入收藏夹?")) {
                                        document.location.href = "./wishlist.php";
                                    }
                                }
                            });
        
                            return false;
                        }
        
                        // Recommend
                        function apms_recommend(it_id, ca_id) {
                            if (!g5_is_member) {
                                alert("只有会员才可以推荐.");
                            } else {
                                url = "./itemrecommend.php?it_id=" + it_id + "&ca_id=" + ca_id;
                                opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
                                popup_window(url, "itemrecommend", opt);
                            }
                        }
                    </script>
                </div>
            <!--e: 제품 가격 정보-->
        </div>
        <!--e: 상세보기 제품 사진, 가격정보-->

        <!--s:상세보기 제품 정보, 게시판-->
        <div id="detail_container">
            <ul class="detail_tabs">
                <li id="li_1" class="active" rel="detail_tab1">商品详情</li>
                <li id="li_2" rel="detail_tab2">用户评价 <span class="tap_no">(110)</span></li>
                <!--<li id="li_3" rel="detail_tab3">询问/回复</li>-->
                <!--<li id="li_4" rel="detail_tab4">卖家信息</li>-->
                <li id="li_5" rel="detail_tab5">取消/换货/退货 <span class="tap_no">(18)</span></li>
            </ul>
                        
            <div class="detail_tab_container">
            	<!--s: #tab1 商品详情 "상품상세보기" -->
                <div id="detail_tab1" class="detail_tab_content">
					<div class="tab_content_warp">
                    	<h4 class="description">商品详情 <span class="strap">Description</span></h4>
						<?php if ($it['pt_explan']) { // 구매회원에게만 추가로 보이는 상세설명 ?>
                            <div class="well"><?php echo apms_explan($it['pt_explan']); ?></div>
                        <?php } ?>
                        <?php echo apms_explan($it['it_explan']); ?>
                    </div>
                    <a class="btnAfter" href="#detail_container">
                        <img alt="去看看用户评价(후기보러가기)" src="/images/detail_btn_tab1.png" title="去看看用户评价(후기보러가기)" onclick="fn_CtlDsp('detail_tab1','detail_tab2','li_2')"/>
                    </a>
                </div>
                <!--e: #tab1 商品详情 "상품상세보기" -->
                <!--s: #tab2 用户评价 "상품후기" -->
                <div id="detail_tab2" class="detail_tab_content">                
									<div class="tab_content_warp">
                        <h4 class="tab_content_tit">用户评价 <span class="strap">Comment</span></h4>
                        <div class="tab2_view_after">
                        	
                           
                            
                            <!--s: 후기 리스트-->
                            <ul id="tab2_after_comment">
                            	<?php include_once('./itemuse.php'); ?>
							</ul>
                            <!--s: 후기 리스트-->                        
                        </div>
                    </div>
                     <a class="btnAfter" href="#detail_container">
                        <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png" onclick="fn_CtlDsp('detail_tab2','detail_tab1', 'li_1')"/>
                    </a>         
                </div>
                <!--e: #tab2 用户评价 "상품후기" -->
                
<!---------------------------불필요-------------------------------->                
                <!--s: #tab3 询问/回复 "질문과 답변"-->
                <!--<div id="detail_tab3" class="detail_tab_content">
					<div class="tab_content_warp">
                        <h4 class="tab_content_tit">询问/回复  <span class="strap">Question & Answer</span></h4>
						<!--s: QnA search 버튼-->
                        <!--<div class="tab_qna_act">
                        	<button id="btnWriteQna" type="button">
                            	<img src="/images/detail_btn_tab3_qna.png" alt="询问 질문하기"/>
                            </button>
                            <form id="QnaSearch" action=""  method="" autocomplete="off">
                            	<span class="search-area">
                                	<input name="Keyword" class="txt" id="txtQnaKeyword" type="text">
                                    </input>
                                    <button id="btnQnaSearch" type="submit">
                                    	<img src="/images/detail_btn_tab3_search.png" alt="检索 검색하기"/>
                                    </button>
                                </span>
                            	<button id="btnFilter" type="button">
                                	<img src="/images/detail_btn_tab3_myquestion.png" alt="察看我询问的 내가 쓴글 보기"/>
                                </button>
                                <button id="btnShowALLQna" type="button">
                                	<img src="/images/detail_btn_tab3_allquestion.png" alt="察看全部 QnA 전부보기"/>
                                </button>
                            </form>
                        </div>-->
                        <!--e: QnA search 버튼-->
                        <!--s: QnA wirte-->
                        <!--<form class="tab3_qna_write" id="qna_write_panel" style="display:none;" action="" method="post" autocomplete="off" >
                        	<p class="section">
                            	<label for="select_subject-write">分类</label>
                                <input type="radio" name="radio" class="select" id="1" value="1" checked="checked"/> 상품
                                <input type="radio" name="radio" class="select" id="2" value="2" /> 배송
                                <input type="radio" name="radio" class="select" id="3" value="3" /> 반품/취소/환불
                                <input type="radio" name="radio" class="select" id="4" value="4" /> 기타
                            </p>                        
                        	<p class="section">
                            	<label for="subject-write">题目</label>
                                <input name="subject" class="txt" id="subject-write" style="width:630px;" type="text" size="90"></input>
                            </p>
                        	<p class="c_subject">
                            	<label for="text-write">内容</label>
                                <textarea name="body" id="text-write" rows="6" cols="120"></textarea>
                                <button class="regist-btn" type="">提问</button>
                            </p>                            
                        </form>-->
                        <!--e: QnA wirte-->
                        <!--s: QnA list-->
                        <!--<table class="tab3_qnalist" summary="판매자들이 입력한 정보를 보여주는 공간입니다.">
                        	<colgroup>
                            	<col width="60px"></col>
                                <col width="60px"></col>
                                <col width="430px"></col>
                                <col width="100px"></col>
                                <col width="100px"></col>
                            	<col width="100px"></col>                           
                            </colgroup>
                            <thead>
                            	<tr>
                                	<th scope="col">번호</th>
                                    <th scope="col">유형</th>
                                    <th scope="col">제목</th>
                                    <th scope="col">아이디</th>
                                    <th scope="col">답변상태</th>
                                    <th scope="col">작성일</th>
                                </tr>
                            </thead>
                            <tbody id="tblQnAList">
                            	<tr class="question">
                                	<td>2</td>
                                    <td><상품></td>
                                    <td class="subject">
                                    	<a class="view-qna-detail">재입고 문의</a>
                                    </td>
                                    <td>khjk**</td>
                                    <td class="answer-stats">
                                    	<img src="/images/icon_answer_complete.png" alt="답변완료"/>
                                    </td>
                                    <td>2015-12-03</td>
                                </tr>
                                <tr class="answer">
                                	<td colspan="5">
                                    <p class="answer_question">이 상품 재입고는 언제쯤 되나요?<br>
                                    그리고 재입고 알림 신청은 어디서 하는건가요? </p>
                                    <div class="answer_wrap">
                                    	<p class="answer_answer">안녕하세요 고객님. 상품 담당자입니다.<br><br>
                                        현재 대략적인 일정이 나오지 않아서 예약 판매를 하지 않는데요,<br>
                                        조만간 일정이 정해지면 판매 시작 하겠습니다.<br><br>
                                        [재입고 알림신청]을 해주시면 예약 주문시 재고 등록되었다고 안내 메일이 발송 될 거예요.<br><br>
                                        문의주셔서 감사합니다.<br>
                                        편안한 하루 되세요.
                                        </p>
                                    </div>
                                    </td>
                                </tr>      
                            	<tr class="question">
                                	<td>1</td>
                                    <td><배송></td>
                                    <td class="subject">
                                    	<a class="view-qna-detail">배송문의</a>
                                    </td>
                                    <td>everlist**</td>
                                    <td class="answer-stats">
                                    	<img src="/images/icon_answer_waiting.png" alt="미답변"/>
                                    </td>
                                    <td>2015-11-27</td>
                                </tr>
                                <tr class="answer">
                                	<td colspan="5">
                                    <p class="answer_question">저두여~~언제 배송 되나요 기다리다 목이 기린 되겠져여 ㅋㅋ</p>
                                    <div class="answer_wrap">
                                    	<p class="answer_answer">안녕하세요 고객님. 상품 담당자입니다.<br><br>
                                        27일 출고되었으니 송장조회 확인 부탁드립니다.<br><br>
                                        문의주셔서 감사합니다.<br>
                                        편안한 하루 되세요.
                                        </p>
                                    </div>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>-->
                        <!--e: QnA list-->
                    <!--</div>
                    <a href="#">
                        <button id="btnAfter" type="submit">
                            <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png"/>
                        </button>
                    </a>                             
                </div>-->
                <!--e: #tab3 询问/回复 "질문과 답변"-->
<!-----------------------여기까지 불필요------------------------->                
                
                
                <!--s: #tab4 卖家信息 "판매자 정보"-->
                <div id="detail_tab4" class="detail_tab_content">
                	<div class="tab_content_warp">
                        <h4 class="tab_content_tit">卖家信息  <span class="strap">Sellers Information</span></h4>
                       	<table class="tab_seller" summary="판매자들이 입력한 정보를 보여주는 공간입니다.">
                        	<colgroup>
                            	<col width="18%"></col>
                                <col width="82%"></col>
                            </colgroup>
                            <tbody>
                            	<tr>
                                	<th scope="row">卖家</th>
                                    <td>홈플러스 온라인몰</td>
                                </tr>
                            	<tr>
                                	<th scope="row">商户/代表人</th>
                                    <td>홈플러스(주)/도성환</td>
                                </tr>
                            	<tr>
                                	<th scope="row">联系方式</th>
                                    <td>1577-3355</td>
                                </tr> 
                             	<tr>
                                	<th scope="row">CS咨询时间</th>
                                    <td>09시~18시</td>
                                </tr> 
                             	<tr>
                                	<th scope="row">电子邮件</th>
                                    <td>ehmp224@homeplus.co.kr</td>
                                </tr>                               
                            	<tr>
                                	<th scope="row">传真</th>
                                    <td>02-3459-8005</td>
                                </tr> 
                            	<tr>
                                	<th scope="row">商业号码</th>
                                    <td>220-81-603348</td>
                                </tr>
                            	<tr>
                                	<th scope="row">通信销售申报号码</th>
                                    <td>강남-1872</td>
                                </tr>
                                <tr>
                                	<th scope="row">营业所在地</th>
                                    <td>서울 강남구 테헤란로 301 (역삼동, 상정개발17층)</td>
                                </tr>                                                                                                                                                  
                            </tbody>
                        </table>
                    </div>
                    <a class="btnAfter" href="#detail_container">
                        <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png" onclick="fn_CtlDsp('detail_tab4','detail_tab1','li_1')"/>
                    </a>                    
                </div>
                <!--e: #tab4 卖家信息 "판매자 정보"-->
                <!--s: #tab5 取消/换货/退货 "교환/환불정책"-->
                <div id="detail_tab5" class="detail_tab_content">
                	<div class="tab_content_warp">
                        <h4 class="tab_content_tit">取消/换货/退货  <span class="strap">Return Policy</span></h4>
                        <span class="return_title">换货/退款政策</span>
                        <ul class="detail_tab_return">
                            <p>我们将在收到退回的货物后，给您退货和换货。因为是进口商品，将需要花费大量的时间和费用，所以请慎重决定。<br></p>
                            <p class="tab_return_paragraph"><b>申请退换货之前，请确认以下注意事项。</b></p>
                            <li>退货及退款申请仅限购买者。</li>                        
                        	<li>请务必在收货后3个工作日以内完成在线申请，以便我们在系统中进行记录；并且需要申请退货时，请务必在收货后7个工作日以内，将货物返回物流中心。</li>
                            <li>如因购买者自身原因需要退货的情况，运费由客户负担。</li>
                            <li>如因商品质量问题需要退款的情况，请顾客先垫付配送费，我们收货确认后将进行退款处理。</li>
                            <li>商品配送中取消订单的情况，退款将在商品回收后进行处理。但此前交易时产生的汇款手续费及各种手续费将无法返回，请注意。</li>                            
                            <li>销售时标注有“不可退货”的商品，将不能因为顾客自身原因进行退货/退款。</li>                            
                            <li>因顾客意外失误产生的损坏，将不能进行退换货。 </li>
                              
                            <p class="tab_return_paragraph"><b>不可退换货情况</b></p>            
                            <li>收到商品后，7个工作日内（公休日/节假日除外）没有将其返还到达物流中心的情况。</li>                        
                        	<li>收货后包装不是最初配送状态的情况。（包括赠品）</li>
                            <li>商品留有适用痕迹（化妆品，食品等），或者产品有磨损痕迹（香水味等）的情况。</li>
                            <li>商品留有洗濯痕迹的情况。</li>
                            <li>针织类、浅色类、细致材质、饰品，不可退换货。</li>                            
                            <li>商品断货的情况。</li>                            
                            <li>订单制作及手工制作鞋的情况。</li>                
                            <li>没有通过在线申请退换货后发送的情况。</li>                        
                        	<li>证书或商品标签清除，损坏的情况。</li>
                            <li>根据商品特征没有商品标签，说明书，表证书配送时，不能以此为理由退换货。</li>
                            
                            <p class="tab_return_paragraph"><b>退货 (顾客自身原因时)</b><br>
                            如若因商品质量问题/配送失误产生退货时，可以100%退款；但因购买者不喜欢或者其他个人问题不能使用时，退货运费将由顾客承担。(国际运费及国内，韩国当地运费)</p>            
                            <li>退货费用 : 国内运费+国际运费+韩国当地运费+关税 </li>                        

                            <p class="tab_return_paragraph"><b>换货</b><br>因配送失误，需要换货的情况下，所有的费用由盼达网来承担。  一般换货，请在收货后的七个工作日内提出申请，并且费用将由买家承担。<br>
                            换货费用 : (国内运费+国际运费+韩国当地运费+关税) X 2 <br>
                            <b>可以换货情况</b></p>
                            <li>同一商品尺寸</li>                        
                        	<li>同一商品颜色</li>
                            <li>顾客喜好变更换货 </li>
                            
                            <p class="tab_return_paragraph"><b>退款</b></p>
                            <li>申请退款从收货后，3日以内通过在线申请完成，但以下情况下退款费用不需要顾客承担。<br>
                            1) 配送时发生商品损坏的情况。<br>
                            2) 配送的商品和订购的不同或有质量问题的情况。<br>
                            以上事由退款，将在收回商品后处理退款。（包括赠品等）</li>
                            <li>国际配送前退货时，韩国当地运费由顾客承担。<br>
                            顾客承担费用：韩国当地费用</li>
                            <li>国际配送后申请退款时国际运费+韩国当地运费由顾客承担。<br>
                            顾客承担费用: 国际运费+韩国当地运费+关税</li>
                            <li>签收商品后申请退款时国际运费，韩国当地运费，国内运费由顾客承担，这将在商品回收后减取费用后，进行退款。<br>
                            顾客承担费用: 国际运费+韩国当地运费+国内运费+关税</li>
                            <li>退款时不可退还手续费，请注意。 </li>    
                            
                            <p class="tab_return_paragraph"><b>断货情况</b></p>
                            <li>若商品断货时，负责人会第一时间通过便条方式通知顾客，并退款至预付款，会员可以在我的账户中查询相关状态。</li>              
                        </ul>
                        
                        <hr>
                        <span class="return_title">售后服务</span>
                        <ul class="detail_tab_return">
                            <p class="tab_return_paragraph"><b>OOZOOBOX郑重承诺：</b><br>
                            自客户收到商品之日起（以签收日期为准），7日内提供退换货服务。<br>
                            请注意：限时特卖商品暂不提供换货，只提供退货服务。</p>
                                                        
							<p class="tab_return_paragraph"><b>特别说明：</b><br>
                            退回商品须未经穿着，商品及包装须和OOZOOBOX出售时一样，商品吊牌及配件齐全。如有发票及赠品，需一同寄回。<br>
                            出于安全和卫生考虑，贴身用品如：内裤、内衣套装（文胸+内裤）、泳装、袜子（包括丝袜、连裤袜、运动袜、打底裤），一经签收，非质量问题不予退换货，请您谅解。<br>
                            <b>以下情况将不提供退换货服务：</b></p>
							<li>任何非OOZOOBOX出售的商品; </li>
                           	<li>已使用的商品（如商品在使用过程中发生质量问题，则按照三包中的相关规定执行）；</li>
                            <li>任何因非正常使用及保管导致损坏的商品（包括但不仅限于：不适合雨天穿着，不适合水洗，碰酸、碱、油等腐蚀性物质，触碰硬物、尖锐物体做不属于/不适合鞋款设计功能的运动、长时间高强度运动、人为破坏或经过不适当修理造成损坏等）；</li>
                           	<li>商品的外包装破损，包裹填充物/品牌包装箱或外包装袋/鞋盒外直接缠胶带，商品附件、说明书、保修单、标签等有缺失。若商品有吊牌，请您不要剪掉或损坏吊牌，吊牌被剪掉或损坏，会直接影响退换服务</li>
                            <li>已开具发票的商品，未将发票退回。</li>
                            <li>购买时有赠品的商品，未将赠品退回。</li>
                            <li>赠品不享受退换货服务（有质量问题除外）。</li>
                            <li>已经标明为残次品或处理品的。</li>
                            <li>出于安全和卫生考虑，贴身用品如:内裤、内衣套装（文胸+内裤）、泳装、袜子（包括丝袜、连裤袜、运动袜、打底裤），一经签收，非质量问题不予退换货。 </li>
                            <li>数码配件类商品原厂包装打开，一次性封贴或胶条破损，产品已使用无质量问题不予退换货。</li>
                            
                            <p class="tab_return_paragraph"><b>办理退换货商品的退回方式：</b></p>
                            <li>客户自行将商品邮寄回物流中心。</li>
                            <li>寄回地址：请您务必按照在线退换货申请中提供的地址寄回，或咨询OOZOOBOX客服。</li>
                            
                            <p class="tab_return_paragraph"><b>关于寄回商品运费的说明：</b><br>
                            如果由于产品本身质量问题造成的退换货，运费由OOZOOBOX承担，最多报销20元运费。在我们接到您退回的商品后，<br>会有专人为您办理。<br>
                            由于款式、颜色、尺码、个人喜好等原因造成的退换货，将商品寄回到OOZOOBOX仓库的运费由客户自行承担，<br>再次发出的运费由OOZOOBOX公司承担。<br>

                            <b>&nbsp;&nbsp;&nbsp;注：</b>
                            </p>
                          	<li>图片及信息仅供参考，不属质量问题。因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，不属于质量问题，一切以实物为准。</li>
                            <li>OOZOOBOX不支持“到付”服务，请不要选择“到付”形式将商品寄回，请您谅解。</li>
                          	<li>商品发生退换货时，订单运费将不予返还，请您谅解。</li>
                        </ul>
                        <br><br><br><br><br>
                    </div>
                    <a class="btnAfter" href="#detail_container">
                        <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png" onclick="fn_CtlDsp('detail_tab5','detail_tab1','li_1')"/>
                    </a>                 
                </div>
                <!--e: #tab5 取消/换货/退货 "교환/환불정책"-->              
                
            </div>
        	<!-- .tab_container -->
            
            <div class="relation-area">
            	<h3>相关推荐</h3>
                <ul class="relation-pro">
                	<li>
                    	<a href="#"><img src="/images/detail_rel01.png" alt="관련상품01"/></a>
                    </li>
                	<li>
                    	<a href="#"><img src="/images/detail_rel01.png" alt="관련상품01"/></a>
                    </li>
                	<li>
                    	<a href="#"><img src="/images/detail_rel01.png" alt="관련상품01"/></a>
                    </li> 
                	<li>
                    	<a href="#"><img src="/images/detail_rel01.png" alt="관련상품01"/></a>
                    </li>               
                </ul>
            </div>
        </div> 
        <!--e: 상세보기 제품 정보-->        



<script>
$(document).ready(function(){
  $("#btnWriteQna").click(function(){
    $("#qna_write_panel").toggle();
  });
});
</script>


<script>
    $(document).ready(
        function()
        { 
		$('.answer').hide();
            $('.question')
                .append(' <span></span>');
            var toggleAnswer = function toggleAnswer(question, showAnswer)
            { 
			var $answer = $(question).next('tr');
                var updateText = function()
                                 {
                                    var text = $answer.is(':visible') ? ' ' : '';
                                    $(question).find('span').html(text);
                                 }
                var method = null;
                if(arguments.length > 1)
                {
					 method = showAnswer === true ? 'show' : 'hide';
                }
                else
                {
                    method = $answer.is(':visible') ? 'hide' : 'show';
                }

                $answer[method]('fast', updateText);
            };
            $('.question').click(function(){ toggleAnswer(this);});
            $('#openClose').click(
                function() 
                { 
                    var showAnswer = $(this).html().toLowerCase().indexOf('open') != -1 ? true : false;
                    $('.question').each(function() { toggleAnswer(this, showAnswer); });
                    $(this).html(showAnswer ? 'Close All' : 'Open All'); 
                    return false;
                } 
            );

        }
     );
</script>

<script>
$(function () {

    $(".detail_tab_content").hide();
    $(".detail_tab_content:first").show();

    $("ul.detail_tabs li").click(function () {
        $("ul.detail_tabs li").removeClass("active").css({"color": "#333", "border-top":"3px solid #fff"});
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css({"color": "#f47a22", "border-top":"3px solid #f47a22"});
        $(".detail_tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });
});
	
	
function fn_CtlDsp(NtabID,TtabID,li_ID){
	// 하단 바로가기 버튼 클릭시 상황에 맞게 div 및 탭텍스트 색상 컨트롤
	// NtabID : 현재탭의 ID, TtabID : 타겟탭의 ID, li_ID : 타겟li의 ID

	//해당탭의 div를 활서화 시킨다.
	document.getElementById(NtabID).style.display = "none";
	document.getElementById(TtabID).style.display = "block";
	//$("#" + TtabID).fadeIn()	;			//rel값의 탭을 활성화 시킨다.
	
	//전체 탭의 색을 없앤 후 해당 ID의 탭만 색을 준단.
	$("ul.detail_tabs li").removeClass("active").css({"color": "#333", "border-top":"3px solid #fff"});
	$("#"+li_ID).addClass("active").css({"color": "#f47a22", "border-top":"3px solid #f47a22"});
}
	
</script>





<?php include_once('./itemlist.php'); // 분류목록 ?>
