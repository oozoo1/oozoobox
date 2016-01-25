<?php
include_once('./_common.php');

$g5['title'] = '优惠券';
include_once('./_head.php');

$skin_path = $order_skin_path;
$skin_url = $order_skin_url;

// 셋업
$setup_href = '';
if(is_file($skin_path.'/setup.skin.php') && ($is_demo || $is_admin == 'super')) {
	$setup_href = './skin.setup.php?skin=order';
}

?>
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">顾客的个人情报及订单详情等使用记录可以查询。</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            优惠券
            </h4>
            
            <img src="/images/comingsoon.png" alt="很抱歉为您的使用造成不便。目前网页正在准备中。我们将尽快为您带来更优质的服务。"/>
            
            
<?php /*?>			<div class="text_box">
            	<p>고객님의 주문내역입니다.<br>
                주문내역을 클릭하시면 상세 주문내역 / 배송조회가 가능합니다.
                </p>
            </div>
            <div class="tap_view_period">
                <div class="order-period">
                    <div class="select_period">
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=1"><button<? if($oldtime=="1"){?> class="on"<? } ?>>오늘</button></a>
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=2"><button<? if($oldtime=="2"){?> class="on"<? } ?>>1주일</button></a>
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=3"><button<? if($oldtime=="3"){?> class="on"<? } ?>>1개월</button></a>    
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=4"><button<? if($oldtime=="4"){?> class="on"<? } ?>>3개월</button></a>    <!--클릭했을 class명을 "on"으로 바꿔주면 됩니다-->
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=5"><button<? if($oldtime=="5"){?> class="on"<? } ?>>6개월</button></a>    
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=6"><button<? if($oldtime=="6"){?> class="on"<? } ?>>12개월</button></a>    
                     <a href="<?=$_SERVER['PHP_SELF']?>?type=<?=$_GET[type]?>&oldtime=7"><button<? if($oldtime=="7"){?> class="on"<? } ?>>이전 주문내역</button></a>                    
                    </div>
                    <span class="date">2015-10-06 ~ 2016-01-05</span>
                </div>
                <div class="order-search">
                <form method="get">
                    <input class="text" name="sc" value="<?=$_GET[sc]?>" type="text" style="width:138px; height:22px;"/>
                    <input class="btn_search" type="submit" value="조회"/>
                </form>
                </div>
            </div>
            <div class="orderview-option">
            	<select language=javascript onchange= "location.href=this.value"> 
                	<option value="<?=$_SERVER['PHP_SELF']?>?type=1&oldtime=<?=$_GET[oldtime]?>" <? if($_GET[type]=="1"){echo "selected";}?>>입금확인중</option>
                    <option value="<?=$_SERVER['PHP_SELF']?>?type=2&oldtime=<?=$_GET[oldtime]?>" <? if($_GET[type]=="2"){echo "selected";}?>>결제완료</option>
                    <option value="<?=$_SERVER['PHP_SELF']?>?type=3&oldtime=<?=$_GET[oldtime]?>" <? if($_GET[type]=="3"){echo "selected";}?>>상품준비중</option>
                    <option value="<?=$_SERVER['PHP_SELF']?>?type=4&oldtime=<?=$_GET[oldtime]?>" <? if($_GET[type]=="4"){echo "selected";}?>>배송중/배송출발</option>
                    <option value="<?=$_SERVER['PHP_SELF']?>?type=5&oldtime=<?=$_GET[oldtime]?>" <? if($_GET[type]=="5"){echo "selected";}?>>배송완료</option>
                    <option value="<?=$_SERVER['PHP_SELF']?>?type=6&oldtime=<?=$_GET[oldtime]?>" <? if($_GET[type]=="6"){echo "selected";}?>>거래완료</option>
                </select>
            </div>
            <table class="order-list-table">
            	<colgroup>
                	<col style="width:172px"/>
                    <col style="width:auto"/>
                    <col style="width:101px"/>
                    <col style="width:101px"/>
                </colgroup>
                <thead>
                	<tr>
                    	<th class="first">주문일(결제번호)</th>
                        <th>상품평/주문옵션/주문번호</th>
                        <th>판매자</th>
                        <th>주문상태</th>
                    </tr>
                </thead>
                <tbody>
<!------------------------s: 01.결제완료일때  (1개)------------------------->
										<?php
                    for ($i=0; $i < count($list); $i++) { 
                    ?>
                    <tr class="separate">
                    	<td rowspan="2" class="date-payment-num"> <!--상품수 *2해주세요-->
                        	<div class="date-num">
                            	<strong><?php echo substr($list[$i]['od_time'],2,14); ?> (<?php echo get_yoil($list[$i]['od_time']); ?>)</strong>
                                <a>( <span><?=$list[$i][od_id]?></span> )</a>
                            </div>
                            <div class="total-charge">
                            결제금액
                            	<strong class="charge">
                                	¥<span class="num"><?=$list[$i][od_cart_price]?></span>
                                </strong>
                            </div>
                            <div class="detail-link">
                            	<a class="link" onClick="window.open('/shop/popup/pop04.html', '', 'width=800, height=744, scrollbars=no')">주문상세보기</a>
                            </div>
                        </td>
                        <!--상품1-->
                        <td class="product">
												<? 
                        $sql_cart = "SELECT * FROM g5_shop_cart WHERE od_id = '{$list[$i][od_id]}'";
                        $result = sql_query($sql_cart);
                        
                        for ($k=0; $row=sql_fetch_array($result); $k++){
                        $sql1 = "SELECT it_id , it_img1 , it_name , pt_id FROM g5_shop_item WHERE it_id = '{$row[it_id]}'";
                        $result1 = sql_query($sql1);
                        $row_item=sql_fetch_array($result1);
                        
                        ?>
                        	<div class="product-block">
                            	<a class="product-thumbnail" href="/shop/item.php?it_id=<?=$row_item[it_id]?>">
                                	<img src="/data/item/<?=$row_item[it_img1]?>" style="width:60px; height:60px" alt="상품01"/>
                                </a>
                                <div class="product-content">
                                	<div class="product-name">
                                    	<a href="/shop/item.php?it_id=<?=$row_item[it_id]?>"><?=$row_item[it_name]?></a>
                                    </div>
                                    <div class="product-option">
                                    <?=$row_item[it_name]?>
                                    </div>
                                    <div class="order-num">
                                        <span class="mp_label">주문번호</span>
                                    <?=$row_item[it_id]?>
                                    </div>
                            	</div>
                            </div>
                            <div style="border-bottom:solid 1px #ddd; height:10px; "></div>
                        <? echo "<br>"; } ?>
                        </td>
                        <td class="seller">
                        	<span class="seller-info">
                            	<?=$row_item[pt_id]?>
                            </span>
                        </td>
                        <td class="status">
                        	<strong class="status-msg">
															<?															
															  $item_old_time=strtotime("{$list[$i]['od_receipt_time']}");
																
																$time_8 = $item_old_time+60*60*24*8; //기간 8일
																$time8=date('Y-m-d', $time_8); 
																
																$time_9 = $item_old_time+60*60*24*9; //기간 8일
																$time9=date('Y-m-d', $time_9); 
																
																if($todaytime =="$time8" || $todaytime =="$time9"){
                                echo  "미수령신고";
																}else{
																echo  $list[$i][od_status];
																}
                              ?>
                          </strong>
                          <? if($list[$i][od_status]=="상품배송중"){?>
                            <span class="tracking">
                                <a>배송추척</a>
                            </span>
                          <? } ?>
                          <? if($list[$i][od_status]=="거래완료"){?>
                            <span class="status-date">
                            구매결정일자
                            <br>
                            ( <span class="num">12-30</span>
                            결정 )
                            </span>
                          <? } ?>
                          
                          <? if($list[$i][od_status]=="결제대기중"){?>
                          <br><br>
                              <form name=alipayment action="/alipay/alipayapi.php" method=post target="_blank">
                              <input type="hidden" size="30" name="WIDout_trade_no" value="<?=$list[$i][od_id]?>" title="订单号码" />
                              <input type="hidden" size="30" name="WIDsubject" value="OOZOOBOX" title="订单名称" />
                              <input type="hidden" size="30" name="WIDprice" value="<?=$list[$i][od_cart_price]?>" title="付款金额" />
                              <input type="hidden" size="30" name="WIDbody" value="OOZOOBOX" title="订单描述"/>
                              <input type="hidden" size="30" name="WIDshow_url" value="http://dev.oozoobox.com/shop/orderinquiryview.php?od_id=<?=$list[$i][od_id]?>" title="订单地址" />
                              <input type="hidden" size="30" name="WIDreceive_name" value="<?=$list[$i][od_b_name]?>" title="收货人" />
                              <input type="hidden" size="30" name="WIDreceive_address" value="<?=$list[$i]['od_b_addr1']?> - <?=$list[$i]['od_b_addr2']?> - <?=$list[$i]['od_b_addr3']?> - <?=$list[$i]['od_b_addr_jibeon']?>" title="收货地址" />
                              <input type="hidden" size="30" name="WIDreceive_zip" value="100000" title="邮政编码"/>
                              <input type="hidden" size="30" name="WIDreceive_phone" value="<?php echo get_text($list[$i]['od_b_tel']); ?>" title="收货人电话"/>
                              <input type="hidden" size="30" name="WIDreceive_mobile" value="<?php echo get_text($list[$i]['od_b_hp']); ?>" title="收货人手机"/>
                              <button class="btn btn-black btn-sm" type="submit" style="text-align:center; padding:5px 10px 5px 10px;">确认支付</button>
                              </form>   
                          <? } ?>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="3" class="actions">
                        	<div class="links">
                                <a class="declaration">신고하기</a>
                            	<a class="link" onClick="window.open('/shop/popup/pop03.html', '', 'width=800, height=744, scrollbars=no')">판매자문의</a>
                            </div>
                            <div class="buttons">
                            
                            <? if($list[$i][od_status]=="결제대기중" || $list[$i][od_status]=="상품준비중" || $list[$i][od_status]=="결제완료"){ ?>
                              <a href="/shop/mypage02_1_1.php" class="button">
                              	<button class="cancel">주문취소요청</button>
                              </a>
                              <a class="button">
                               	<button class="orange">배송정보수정</button>
                              </a>
                            <? } ?>
                            
                            <? if($list[$i][od_status]=="상품배송중"){ ?>
                            	<a onClick="window.open('/shop/popup/pop05.html', '', 'width=660, height=535, scrollbars=no')" class="button"><button class="orange">상품평 | 구매결정</button></a>
                            <? } ?>
														
                            <? if($list[$i][od_status]=="거래완료"){ ?>
                              <a class="button" onClick="window.open('/shop/popup/pop07.html', '', 'width=600, height=760, scrollbars=no')" >
                              <button class="cancel">상품평작성하기</button>
                              </a>
                            <? } ?>

														<? if($list[$i][od_status]=="상품배송중"){ ?>
                           	 <a href="/shop/mypage02_1_5.php" class="button"><button class="cancel">반품 / 취소요청</button></a>
                            <? } ?>
                            
                            </div>
                        </td>
                    </tr>                   

<!-------------------s: 02.상품준비중일때 (1개)----------------------->
                    <? } ?>                                             
                </tbody>
            </table>
            
<div class="text-center">
	<ul class="pagination pagination-sm en">
		<?php echo apms_paging($write_pages, $page, $total_page, $list_page); ?>
	</ul>
</div><?php */?>

        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
