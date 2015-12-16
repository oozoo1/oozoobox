                                                                                                                                              <?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);
add_stylesheet('<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >',0); //김미혜: css추가 및 경로 설정

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

<?php echo $head_class;?>
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
        	<div class="content1">
            	<h4><span class="blue">OOZOO BOX</span> 配送商品</h4>
                <table summary="장바구니에 선택한 상품이 없을 때 표시되는 영역입니다.">
                	<colgroup>
                    	<col width="47"></col>
                        <col width=""></col>
                        <col width="105"></col>
                        <col width="105"></col>
                        <col width="120"></col>
                        <col width="95"></col>
                    </colgroup>
                    <thead>
                    	<tr>
                        	<th scope="col"></th>
                            <th scope="col">商品</th>
                            <th scope="col">单价（元）</th>
                            <th scope="col">数量</th>
                            <th scope="col">小计（元）</th>
                            <th scope="col">操作</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                        	<td style="height:120px;" colspan="6">장바구니에 담겨있는 상품이 없습니다.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- e: 장바구니 상품 없음-->
		<!-- s: 장바구니 상품 있음-->
        <div id="order_item">
        	<!-- s: 장바구니 상품 있음: 01. OOZOO BOX -->
        	<div class="content1">
            	<h4><span class="blue">OOZOO BOX</span> 配送商品</h4>
                <table class="tblPlaceHolder" summary="장바구니에 선택한 상품이 있을 떄 표시되는 영역입니다.">
                	<colgroup>
                    	<col width="47"></col>
                        <col width=""></col>
                        <col width="105"></col>
                        <col width="105"></col>
                        <col width="120"></col>
                        <col width="95"></col>
                    </colgroup>
                    <thead>
                    	<tr>
                        	<th scope="col">
                            	<label class="hidden-text" for="all_check">상품 전체 선택 </label>
                                <input name="prdcheck" class="order_all_check" type="checkbox"></input>
                            </th>
                            <th scope="col">商品</th>
                            <th scope="col">单价（元）</th>
                            <th scope="col">数量</th>
                            <th scope="col">小计（元）</th>
                            <th scope="col">操作</th>                            
                        </tr>
                    </thead>
                    <tbody><!---------- oozoobox상품일 때 여기만 반복 : tbody------------------>
                    	<tr>
                        	<td>
                            	<label class="hidden-text" for="product_check">상품 선택</label>
                                <input name="prdcheck" class="prdcheck" type="checkbox"></input> 
                            </td>
                            <td class="order_subject" >
                            	<a onclick="window.open('/','_blank'); return false;" href="#">
                                	<img src="/images/order_item_01.png" alt="상품이미지"/>
                                </a>
                                <div>
                                	<a onclick="window.open('/','_blank'); return false;" href="#">
                                    	<strong>[zoffoli] EAST SEA GLOBE - 1. DESK GLOBE ON FLAT WOOD BASE </strong>
                                    </a>
                                    <span> 수급 안정 / 결제 완료 후 5일 이내 / CJ대한통운 </span>
                                </div>
                            </td>
                            <td>178,000원</td>
                            <td>
                            	<select name="ordercount">
                                	<option value="1" selected="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>         
                                	<option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>                                                                        
                                </select>
                            </td>
                            <td>178,000원</td>
                            <td class="order_btn">
                            	<button name="btnLaterBuyPart" id="btnLaterBuyPart" type="button">
                                	<img alt="나중에 주문하기" src="/images/btn_order_later.png"/>
                                </button>
                            	<button name="btnWishlistPart" id="btnWishlistPart" type="button">
                                	<img alt="위시리스트담기" src="/images/btn_order_wishlist.png"/>
                                </button>
                            	<button name="btnDeletePart" id="btnDeletePart" type="button">
                                	<img alt="삭제하기" src="/images/btn_order_delete.png"/>
                                </button>                                                                
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td class="save" colspan="6">
                            	<button name="btnMoreProduct" class="more_ozbox" type="button" value="0">배송비 절약상품 보기</button>
                                <p class="order_delivery">배송비 ¥44.00 / ¥500.00원 이상 무료 배송</p>
                            </td>
                        </tr>
                        <tr>
                        	<td class="order_sum" colspan="6">
                            	<span class="order_article">商品数量</span>
                                <span class="order_price">1</span>
                                <span class="order_article">个</span>
                                <img class="order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                                <span class="order_article">商品金额</span>
                                <span class="order_price">¥49.00</span>
                                <img class="order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                                <span class="order_article">运费</span>
                                <span class="order_price">¥44.00</span>
                            </td>                                
                        </tr>
                        <tr>
                        	<td class="merge" colspan="6">
                        	<span class="order_article_b">总计</span>
                            <span class="order_price">93.00</span>
                            <span class="order_article">元</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
       		<!-- e: 장바구니 상품 있음: 01. OOZOO BOX-->                   
        	<!-- s: 장바구니 상품 있음: 02. 商店 -->
        	<div class="content2">
            	<h4><span class="blue">商店</span> 配送商品</h4>
                <table class="tblPlaceHolder" summary="장바구니에 선택한 상품이 있을 떄 표시되는 영역입니다.">
                	<colgroup>
                    	<col width="47"></col>
                        <col width=""></col>
                        <col width="105"></col>
                        <col width="105"></col>
                        <col width="120"></col>
                        <col width="95"></col>
                    </colgroup>
                    <thead>
                    	<tr>
                        	<th scope="col">
                            	<label class="hidden-text" for="all_check">상품 전체 선택 </label>
                                <input name="prdcheck" class="order_all_check" type="checkbox"></input>
                            </th>
                            <th scope="col">商品</th>
                            <th scope="col">单价（元）</th>
                            <th scope="col">数量</th>
                            <th scope="col">小计（元）</th>
                            <th scope="col">操作</th>                            
                        </tr>
                    </thead>
                    <tbody><!---------- 같은 업체상품일 때 여기만 반복: tbody------------------>
                    	<tr>
                        	<td>
                            	<label class="hidden-text" for="product_check">상품 선택</label>
                                <input name="prdcheck" class="prdcheck" type="checkbox"></input> 
                            </td>
                            <td class="order_subject" >
                            	<a onclick="window.open('/','_blank'); return false;" href="#">
                                	<img src="/images/order_item_01.png" alt="상품이미지"/>
                                </a>
                                <div>
                                	<a onclick="window.open('/','_blank'); return false;" href="#">
                                    	<strong>[zoffoli] EAST SEA GLOBE - 1. DESK GLOBE ON FLAT WOOD BASE </strong>
                                    </a>
                                    <span> 수급 안정 / 결제 완료 후 5일 이내 / CJ대한통운 </span>
                                </div>
                            </td>
                            <td>178,000원</td>
                            <td>
                            	<select name="ordercount">
                                	<option value="1" selected="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>         
                                	<option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>                                                                        
                                </select>
                            </td>
                            <td>178,000원</td>
                            <td class="order_btn">
                            	<button name="btnLaterBuyPart" id="btnLaterBuyPart" type="button">
                                	<img alt="나중에 주문하기" src="/images/btn_order_later.png"/>
                                </button>
                            	<button name="btnWishlistPart" id="btnWishlistPart" type="button">
                                	<img alt="위시리스트담기" src="/images/btn_order_wishlist.png"/>
                                </button>
                            	<button name="btnDeletePart" id="btnDeletePart" type="button">
                                	<img alt="삭제하기" src="/images/btn_order_delete.png"/>
                                </button>                                                                
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td class="save" colspan="6">
                            	<button name="btnMoreProduct" class="more_ozbox" type="button" value="0">배송비 절약상품 보기</button>
                                <p class="order_delivery">배송비 ¥44.00 / ¥500.00원 이상 무료 배송</p>
                            </td>
                        </tr>
                        <tr>
                        	<td class="order_sum" colspan="6">
                            	<span class="order_article">商品数量</span>
                                <span class="order_price">1</span>
                                <span class="order_article">个</span>
                                <img class="order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                                <span class="order_article">商品金额</span>
                                <span class="order_price">¥49.00</span>
                                <img class="order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                                <span class="order_article">运费</span>
                                <span class="order_price">¥44.00</span>
                            </td>                                
                        </tr>
                        <tr>
                        	<td class="merge" colspan="6">
                        	<span class="order_article_b">总计</span>
                            <span class="order_price">93.00</span>
                            <span class="order_article">元</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        	<!-- e: 장바구니 상품 있음: 02. 商店 -->             
        	<!-- s: 장바구니 상품 합계 -->
        	<div class="content3">
            	<div class="total_price">
                	<p>
                        <span class="order_article01">总商店数</span>
                        <span class="order_price">2</span>
                        <span class="order_article">家</span>
                        <span class="order_article01">总商品数</span>
                        <span class="order_price">2</span>
                        <span class="order_article">个</span>
                        <span class="order_article01">商品总计</span>
                        <span class="order_price">98.00</span>
                        <span class="order_article">元</span>         
                    </p>
                    <p>
                        <span class="order_article01">运费总计</span>
                        <span class="order_price">88.00</span>
                        <span class="order_article">元</span>
                    </p>
                    <p class="total_last_sum">
                        <span class="order_article_b">结算总额</span>
                        <span class="order_price">196.00</span>
                        <span class="order_article">元</span>
                    </p>
                </div>
                <div class="btn_area">
                	<button class="select" id="btnCheckAll" type="button">
                    	<img src="/images/btn_CheckAll.png" alt="全部选择"/>
                    </button>
                	<button class="select" id="btnUnCheckAll" type="button">
                    	<img src="/images/btn_UnCheckAll.png" alt="取消选择"/>
                    </button>      
                	<button class="aleft11 select01" id="btnCheckLater" type="button">
                    	<img src="/images/btn_CheckLater.png" alt="选择商品以后再订购"/>
                    </button>
                	<button class="aleft11 select01" id="btnCheckAddWishlist" type="button">
                    	<img src="/images/btn_CheckAddWishlist.png" alt="选择商品放入关注商品"/>
                    </button>
                	<button class="aleft11 select" id="btnCheckDelete" type="button">
                    	<img src="/images/btn_CheckDelete.png" alt="删除选择"/>
                    </button>                                                                          
                </div>
                <div class="btn_area01">
                	<button class="select" id="btnAllOrder" style="margin-right:20px;" type="button">
                    	<img src="/images/btn_AllOrder.png" alt="立即订购"/>
                    </button>
                	<button class="select" id="btnCheckOrder" style="margin-right:20px;" type="button">
                    	<img src="/images/btn_select_order.png" alt="继续购物"/>
                    </button>                         
                	<button class="select" id="btnList" type="button">
                    	<img src="/images/btn_List.png" alt="继续购物"/>
                    </button>              
                </div>
            </div> 
        	<!-- e: 장바구니 상품 합계 -->              
        </div>
        <!-- e: 장바구니 상품 있음-->
        
       <!--s: 关注商品 & 选择商品以后再订购-->    
        <div id="order_item2">
        	<div class="content4">
                <ul class="order_tabs">
                    <li class="active" rel="order_tab1" id="tab01">关注商品</li>
                    <li rel="order_tab2" id="tab02">选择商品以后再订购</li>
                </ul>
                <div class="order_tab_container">
                    <!--s: 关注商品-->
                    <div id="order_tab1" class="order_tab_content"><br>
                        <div class="select-product list" style="width:950px;">
                        	<p class="fleft">위시리스트 폴더
                            	<select name="sltWishLIstFolder" id="sltWishListFolder">
                                	<option value="">선택하세요</option>
                                    <option value="">기본폴터</option>
                                    <option value="">갖고 싶은 것</option>
                                    <option value="">바로 살 것</option>
                                </select>
                            </p>
                        </div>
                        <div class="prd-list-type01-wrap wishlist" style="min-height:80px;">
                        	<ul class="clear-obj01" id="ulWishListPlace" style="width:990px; padding-left:0px;">
                            	<li style="width:990px; text-align:center;">폴더를 선택해 주세요</li>
                            </ul>
                        	<ul class="clear-obj02" id="ulWishListPlace" style="width:990px; padding-left:0px;">
                            	<li style="width:990px; text-align:center;">등록된 상품이 없습니다.</li>
                            </ul>
                        	<ul class="clear-obj03" id="ulWishListPlace" style="width:990px; padding-left:0px;">
                            	<!----------첫번째 상품----------->
                                <li class="first_child">
                                	<span class="check-area">
                                    	<input name="chkItemNo" class="check" id="chkItemNo" type="checkbox"></input>
                                    </span>
                                    <a onclick="window.open('/','_blank'); return false;" href="#">
                                        <img class="thumb" src="/images/order_wish_item01.png" alt="상품이미지"/>
                                        <span class="information">
                                        	<em class="spot">
                                            	<span class="label-ozbox deliverylabel">OOZOOBOX</span>
                                                업체 소믹 GX16레인보우 LED 키보드 -화이트 
                                            </em>
                                            <span class="desc">내 취향에 맞게 바꾸는 37가지 DIY 키 캡 </span>
                                        </span>
                                        <strong class="price">25,900원</strong>
                                    </a>
                                </li>
                                <!----------두번째 상품----------->
                            	<li>
                                	<span class="check-area">
                                    	<input name="chkItemNo" class="check" id="chkItemNo" type="checkbox"></input>
                                    </span>
                                    <a onclick="window.open('/','_blank'); return false;" href="#">
                                        <img class="thumb" src="/images/order_wish_item01.png" alt="상품이미지"/>
                                        <span class="information">
                                        	<em class="spot">
                                            	<span class="label-ozbox deliverylabel">OOZOOBOX</span>
                                                업체 소믹 GX16레인보우 LED 키보드 -화이트 
                                            </em>
                                            <span class="desc">내 취향에 맞게 바꾸는 37가지 DIY 키 캡 </span>
                                        </span>
                                        <strong class="price">25,900원</strong>
                                    </a>
                                </li>
                                <!----------세번째 상품----------->
                            	<li>
                                	<span class="check-area">
                                    	<input name="chkItemNo" class="check" id="chkItemNo" type="checkbox"></input>
                                    </span>
                                    <a onclick="window.open('/','_blank'); return false;" href="#">
                                        <img class="thumb" src="/images/order_wish_item01.png" alt="상품이미지"/>
                                        <span class="information">
                                        	<em class="spot">
                                            	<span class="label-ozbox deliverylabel">OOZOOBOX</span>
                                                업체 소믹 GX16레인보우 LED 키보드 -화이트 
                                            </em>
                                            <span class="desc">내 취향에 맞게 바꾸는 37가지 DIY 키 캡 </span>
                                        </span>
                                        <strong class="price">25,900원</strong>
                                    </a>
                                </li>
                                <!----------네번째 상품----------->
                            	<li>
                                	<span class="check-area">
                                    	<input name="chkItemNo" class="check" id="chkItemNo" type="checkbox"></input>
                                    </span>
                                    <a onclick="window.open('/','_blank'); return false;" href="#">
                                        <img class="thumb" src="/images/order_wish_item01.png" alt="상품이미지"/>
                                        <span class="information">
                                        	<em class="spot">
                                            	<span class="label-ozbox deliverylabel">OOZOOBOX</span>
                                                업체 소믹 GX16레인보우 LED 키보드 -화이트 
                                            </em>
                                            <span class="desc">내 취향에 맞게 바꾸는 37가지 DIY 키 캡 </span>
                                        </span>
                                        <strong class="price">25,900원</strong>
                                    </a>
                                </li>
                                <!----------두번째 줄 첫번째 상품----------->
                                <li class="first_child">
                                	<span class="check-area">
                                    	<input name="chkItemNo" class="check" id="chkItemNo" type="checkbox"></input>
                                    </span>
                                    <a onclick="window.open('/','_blank'); return false;" href="#">
                                        <img class="thumb" src="/images/order_wish_item01.png" alt="상품이미지"/>
                                        <span class="information">
                                        	<em class="spot">
                                            	<span class="label-ozbox deliverylabel">OOZOOBOX</span>
                                                업체 소믹 GX16레인보우 LED 키보드 -화이트 
                                            </em>
                                            <span class="desc">내 취향에 맞게 바꾸는 37가지 DIY 키 캡 </span>
                                        </span>
                                        <strong class="price">25,900원</strong>
                                    </a>
                                </li>
                            </ul>  
                            <!--e:버튼-->                                                                
                        </div>  
                    </div>
                    <!--e: 关注商品-->
                    <!--s: 选择商品以后再订购-->
                    <div id="order_tab2" class="order_tab_content">
                        <table class="tblPlaceHolder" summary="장바구니에 선택한 상품이 있을 떄 표시되는 영역입니다.">
                            <colgroup>
                                <col width="47"></col>
                                <col width=""></col>
                                <col width="105"></col>
                                <col width="105"></col>
                                <col width="120"></col>
                                <col width="95"></col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <label class="hidden-text" for="all_check">상품 전체 선택 </label>
                                        <input name="prdcheck" class="order_all_check" type="checkbox"></input>
                                    </th>
                                    <th scope="col">商品</th>
                                    <th scope="col">单价（元）</th>
                                    <th scope="col">数量</th>
                                    <th scope="col">小计（元）</th>
                                    <th scope="col">操作</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="hidden-text" for="product_check">상품 선택</label>
                                        <input name="prdcheck" class="prdcheck" type="checkbox"></input> 
                                    </td>
                                    <td class="order_subject" >
                                        <a onclick="window.open('/','_blank'); return false;" href="#">
                                            <img src="/images/order_item_01.png" alt="상품이미지"/>
                                        </a>
                                        <div>
                                            <a onclick="window.open('/','_blank'); return false;" href="#">
                                                <strong>[zoffoli] EAST SEA GLOBE - 1. DESK GLOBE ON FLAT WOOD BASE </strong>
                                            </a>
                                            <span> 수급 안정 / 결제 완료 후 5일 이내 / CJ대한통운 </span>
                                        </div>
                                    </td>
                                    <td>178,000원</td>
                                    <td>
                                        <select name="ordercount">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>         
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>                                                                        
                                        </select>
                                    </td>
                                    <td>178,000원</td>
                                    <td class="order_btn">
                                        <button name="btnLaterBuyPart" id="btnLaterBuyPart" type="button">
                                            <img alt="나중에 주문하기" src="/images/btn_order_later.png"/>
                                        </button>
                                        <button name="btnWishlistPart" id="btnWishlistPart" type="button">
                                            <img alt="위시리스트담기" src="/images/btn_order_wishlist.png"/>
                                        </button>
                                        <button name="btnDeletePart" id="btnDeletePart" type="button">
                                            <img alt="삭제하기" src="/images/btn_order_delete.png"/>
                                        </button>                                                                
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="order_sum" colspan="6">
                                        <span class="order_article">商品数量</span>
                                        <span class="order_price">1</span>
                                        <span class="order_article">个</span>
                                        <span class="order_article01">商品金额</span>
                                        <span class="order_price">¥49.00</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>                        
                    </div>
                    <!--e: 选择商品添加购物车-->
                </div>
                <!--e: 위시리스트, 나중에 주문하기 content-->
                <div class="btn_area">
                    <button class="select" id="btnLCheckAll" type="button">
                        <img src="/images/btn_CheckAll.png" alt="全部选择"/>
                    </button>
                    <button class="select" id="btnLUnCheckAll" type="button">
                        <img src="/images/btn_UnCheckAll.png" alt="取消选择"/>
                    </button>      
                    <button class="aleft11 select01" id="btnLCheckLater" type="button">
                        <img src="/images/btn_Check_cart_01.png" alt="选择商品添加购物车"/>
                    </button>
                    <button class="aleft11 select01" id="btnLCheckAddWishlist" type="button">
                        <img src="/images/btn_CheckAddWishlist.png" alt="选择商品放入关注商品"/>
                    </button>
                    <button class="aleft11 select" id="btnLCheckDelete" type="button">
                        <img src="/images/btn_CheckDelete.png" alt="删除选择"/>
                    </button>              
                </div>     
            </div>
            <!--위시리스트, 나중에 주문하기 wrap--> 
        </div>
        <!--e: 위시리스트, 나중에 주문하기-->
    </div>   
        <!----------------------------------STEP 01------------------------------------->
    
    <div class="oz_order_main oz_pay">        
        <div style="width:990px; height:150px; display:block; float:left;"></div> <!---임시 div  추후 삭제 --->
        
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
        	<h4>결제시 주의사항 <span class="order_notice_small">결제하실때 아래 사항을 꼭 확인해 주세요</span></h4>
            <ul>
            	<li>- 정확한 주문을 위해 주문상품과 금액을 꼭 확인하시고, 수령인 및 배송지 정보를 정확하게 입력하시기 바랍니다.</li>
                <li>- 직접 취소가 가능한 내역은 `我的购物信息 > 我的订单` 에서 확인 가능하며, 불가한 내역은 고객센터로 문의해 주세요.</li>
            </ul>            
        </div>

		<div class="content2">
            <h4><span class="blue">01. 商品</span>清单</h4>
            <table class="tblPlaceHolder" summary="장바구니에 선택한 상품이 있을 떄 표시되는 영역입니다.">
                <colgroup>
                    <col width="47"></col>
                    <col width=""></col>
                    <col width="105"></col>
                    <col width="105"></col>
                    <col width="120"></col>
                    <col width="95"></col>
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">商品</th>
                        <th scope="col">单价（元）</th>
                        <th scope="col">数量</th>
                        <th scope="col">小计（元）</th>
                        <th scope="col">操作</th>                            
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="order_subject" colspan="2">
                            <a onclick="window.open('/','_blank'); return false;" href="#">
                                <img src="/images/order_item_01.png" alt="상품이미지"/>
                            </a>
                            <div>
                                <a onclick="window.open('/','_blank'); return false;" href="#">
                                    <strong>[zoffoli] EAST SEA GLOBE - 1. DESK GLOBE ON FLAT WOOD BASE </strong>
                                </a>
                                <span> 수급 안정 / 결제 완료 후 5일 이내 / CJ대한통운 </span>
                            </div>
                        </td>
                        <td>178,000원</td>
                        <td>1</td>
                        <td>178,000원</td>
                        <td>업체배송</td>
                    </tr>
                </tbody>
            </table>
			<!-- 장바구니 합계-->
        </div>
		
		<div class="content2">
        	<h4><span class="blue">02. 专用</span>优惠</h4> 
            <ul class="order_notice step02_order_notice">
                <li>- 보유하신 무료배송 포인트로 배송비를 차감할 수 있습니다. (2,500원 단위 사용 가능)</li>
                <li>- F포인트는 주문금액 할인에 사용할 수 있으며 주문 금액의 최대 20%까지 사용 가능합니다. (100원 단위 사용 가능)</li>
                <li>- 아트캐쉬는 주문금액 할인에 사용할 수 있습니다. (100원 단위 사용 가능)</li>
            </ul>
            <div class="order_point">
            	<strong class="oozoopoint">OOZOOBOX POINT 사용하기</strong>
                <input name="ozPoint" class="txt" id="txtozPoint" style="float:left; width:100px; margin:15px 0 0 10px; display:inline-block;" type="text" maxlength="7" value="0"></input>
                <span>POINT</span>
                <button name="useozPoint" id="useozPoint" type="button" style="width:38px; margin:12px 0 0 80px; display:inline-block;"><img src="/images/btn_use_ozpoint.png"/></button>
                <button name="useAllozPoint" id="useAllozPoint" type="button"  style="width:38px; margin:12px 0 0 7px; display:inline-block;" ><img src="/images/btn_use_all_ozpoint.png"/></button>
            </div>     
            <div class="total_price step02_total_price">
                <p>
                    <span class="order_article01">总商店数</span>
                    <span class="order_price">2</span>
                    <span class="order_article">家</span>
                    <img class="order_plus step02_order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                    <span class="order_article01">总商品数</span>
                    <span class="order_price">2</span>
                    <span class="order_article">个</span>
                    <img class="order_plus step02_order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                    <span class="order_article01">商品总计</span>
                    <span class="order_price">98.00</span>
                    <span class="order_article">元</span>         
                </p>
                <p>
                    <img class="order_plus" alt="상품금액" src="/images/ico_order_minus.png"/>
                    <span class="order_article01 order_red">POINT</span>
                    <span class="order_price order_red">88.00</span>
                    <span class="order_article order_red">元</span>
                    <img class="order_plus  step02_order_plus" alt="상품금액" src="/images/ico_order_plus.png"/>
                    <span class="order_article01">运费总计</span>
                    <span class="order_price">88.00</span>
                    <span class="order_article">元</span>
                </p>
                <p class="total_last_sum">
                    <span class="order_article_b">结算总额</span>
                    <span class="order_price">196.00</span>
                    <span class="order_article">元</span>
                </p>
            </div>
        </div>
        <!--포인트 사용 및 총계-->
        
        <!--s: Step 02-收货人信息-->
        <div class="content3">
        	<h4><span class="blue">03. 收货人</span>信息</h4>
            <table class="delivery" summary="배송지, 수령인, 핸드폰 번호, 전화 번호, 주소, 요청사항등 배송을 확인 할 수 있습니다.">
            	<colgroup>
                	<col width="20%"></col>
                    <col width="80%"></col>
                </colgroup>
                <tbody>
                	<tr>
                    	<th scope="row">
                        	배송지 선택
                        </th>
                        <td class="input">
                        	<label>
                            	<input class="check" type="radio"> 회원정보</input>
                            </label>
                        	<label>
                            	<input class="check" type="radio"> 최근배송지</input>
                            </label>
                        	<label>
                            	<input class="check" type="radio"> 새로운 주소</input>
                            </label>    
                        	<label>
                            	<input class="check" type="radio"> 주소록선택</input>
                            </label>                                                                                
                        </td>
                    </tr>
                    <tr>
                    	<th scope="row">
                        	<label>收货人姓名</label>
                        </th>
                        <td class="input">
                        	<input name="FullName" title="收货人姓名" class="txt" id="tbFullName" style="width:197px;" type="text" maxlength="16"></input>
                        </td>
                    </tr>
                    <tr>
                    	<th scope="row">
                        	<label>所在地区</label>
                        </th>
                        <td class="input">
                        	<select class="address">
                            	<option>-请选择-</option>
                                <option value="1">北京</option>
                                <option value="2">天津</option>
                                <option value="3">河北</option>
                                <option value="4">山西</option>
                                <option value="5">内蒙古</option>
                                <option value="6">辽宁</option>
                                <option value="7">吉林</option>
                                <option value="8">黑龙江</option>
                                <option value="9">上海</option>
                                <option value="10">江苏</option>
                                <option value="11">浙江</option>
                                <option value="12">安徽</option>
                                <option value="13">福建</option>
                                <option value="14">江西</option>
                                <option value="15">山东</option>
                                <option value="16">河南</option>
                                <option value="17">湖北</option>
                                <option value="18">湖南</option>
                                <option value="19">广东</option>
                                <option value="20">广西</option>
                                <option value="21">海南</option>
                                <option value="22">重庆</option>
                                <option value="23">四川</option>
                                <option value="24">贵州</option>
                                <option value="25">云南</option>
                                <option value="26">西藏</option>
                                <option value="27">陕西</option>
                                <option value="28">甘肃</option>
                                <option value="29">青海</option>
                                <option value="30">宁夏</option>
                                <option value="31">新疆</option>
                                <option value="32">台湾</option>
                                <option value="33">香港</option>
                                <option value="34">澳门</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<th scope="row">
                        	<label>详细地址</label>
                        </th>
                        <td class="input">
                        	<input name="Address" title="详细地址" class="txt" id="tbAddress" style="width:570px;" type="text" maxlength="16"></input>
                            <p>请填写真实地址，不需要重复填写所在地区</p>
                        </td>
                    </tr>
                    <tr>
                    	<th scope="row">
                        	<label>邮政编码</label>
                        </th>
                        <td class="input">
                        	<input name="PostalCode" title="邮政编码" class="txt" id="tbPostalCode" style="width:197px;" type="text" maxlength="16"></input>
                        </td>
                    </tr>                                         
                       <tr>
                    	<th scope="row">
                        	<label>手机号码</label>
                        </th>
                        <td class="input">
                        	<span class="ng-binding" >+86</span>
                        	<input name="Mobile" title="手机号码" class="txt" id="tbMobile" style="width:171px;" type="text" maxlength="12"></input>
                        </td>
                    </tr> 
 					<tr>
                    	<th scope="row">
                        	<label>요청사항</label>
                        </th>
                        <td class="input">
                        	<input name="Message" title="요청사항" class="txt" id="tbMessage" style="width:570px;" type="text"></input>
                            <p>요청사항 내용 중 [취소요청, 옵션변경] 은 적용이 되지 않습니다. 해당 내용은 고객센터로 문의해 주세요. </p>
                        </td>
                    </tr>                                        
                    <tr>
                        <td class="input savead" colspan="2">
                        	<input name="SaveAddress" title="手机号码" class="check" id="tbSaveAddress" type="checkbox" > 设置为默认收货地址（设置后奖自动选中该收货地址）</input>
                        </td>
                    </tr>                  
                </tbody>
            </table>         
        </div>
        
        <div class="content3">
        	<h4><span class="blue">04. 支付</span>方式<span class="order_notice_small">결제하실때 아래 사항을 꼭 확인해 주세요</span></h4>

            <ul>
            	<li>- 一些税收规定均按照中国海关相关条例。</li>
                <li>- 货物被海关扣押时，由买家承担相关税收。若拒绝缴税，要求退款时，货物产生的相关邮费由买家承担。</li>
            </ul>
            
           	<ul class="payment-list">
            	<li payment_code="alipay">
                	<label for="pay_alipay">
                    	<i></i>
                    	<div class="logo" for="pay_2">
                         	<img src="/images/logo_pay_alipay.png"/>
                        </div>
                    </label>
                </li>
            	<li payment_code="unionpay">
                	<label for="pay_union">
                    	<i></i>
                    	<div class="logo" for="pay_3">
                         	<img src="/images/logo_pay_unionpay.png"/>
                        </div>
                    </label>
                </li>                
            </ul>        
            
            <div class="btn_area02">
                <button class="select" id="btnPay" style="margin-right:20px; border:0;" type="button">
                    <img src="/images/btn_pay.png" alt="立即订购"/>
                </button>
                <button class="select" id="btnReturnCart" style="margin-right:20px; border:0;" type="button">
                    <img src="/images/btn_returncart.png" alt="返回购物车"/>
                </button>                                   
        	</div>
        </div>
    </div>
    <!--e: 장바구니 wrap-->
    <div class="oz_order_main">        
    	<h3 class="order_tit"> 购买<span class="order_small">YOUR ORDER</span></h3>
        <div class="order_step">
            <h3 class="order_step_tit">
                <img src="/images/h3_order_step_tit.png" alt="购买顺序"/>
            </h3>
            <ol class="STEP03">
            	<li>我的购物车</li>
                <li>提交订单</li>
                <li>支付成功</li> 
            </ol>
    	</div>
        <div class="step03_success">
        	<img src="/images/step03_success.png" alt="支付成功"/>
        </div>
        <div class="step03_infocart">
            <button class="select" id="btnInfoCart">
            	<img src="/images/btn_step03_infocart.png" alt="察看我的购物信息"/>
            </button>
        </div>
    </div>    
</div>
<!--e: 장바구니-->



<script>
$(document).ready(function(){
	$('div.content1 .order_all_check').click(function(){
		$('div.content1 .prdcheck').prop('checked',this.checked);
	});
	$('div.content2 .order_all_check').click(function(){
		$('div.content2 .prdcheck').prop('checked',this.checked);
	});	

		// 체크 박스 모두 체크
		$("#btnCheckAll").click(function() {
			$("input[name=prdcheck]:checkbox").each(function() {
				$(this).attr("checked", true);
			});
		});

		// 체크 박스 모두 해제
		$("#btnUnCheckAll").click(function() {
			$("input[name=prdcheck]:checkbox").each(function() {
				$(this).attr("checked", false);
			});
		});
	
});
</script>


<script><!-- tab 열고 닫기-->
$(function () {

    $(".order_tab_content").hide();
    $(".order_tab_content:first").show();

    $("ul.order_tabs li").click(function () {
        $("ul.order_tabs li").removeClass("active").css({"color": "#333", "background-color":"#eeeeee"});
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css({"color": "#fff", "background-color":"#12599f"});
        $(".order_tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });
});
</script>
       
<script><!-- 버튼 보이기 닫기--->
$(document).ready(function(){
	$(".content4 #btnLCheckAddWishlist").hide();
    $(".content4 #tab01").click(function(){
        $(".content4 #btnLCheckAddWishlist").hide();
    });
    $(".content4 #tab02").click(function(){
        $(".content4 #btnLCheckAddWishlist").show();
    });
});
</script>


<!-- 지불방식 --->
<script type="text/javascript">
$(function(){
	$('.payment-list > li').on('click',function(){
		$('.payment-list > li').removeClass('using');
		$(this).addClass('using');
		$('#payment_code').val($(this).attr('payment_code'));});
		$('#next_button').on('click',function(){
			if($('#payment_code').val()==''){showDialog('请选择支付方式','error','','','','','','','','',2);return false;}
$('#buy_form').submit();});});
</script>


<?php /*?>
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
		<table class="div-table table bsk-tbl bg-white">
        <tbody>
        <tr class="<?php echo $head_class;?>">
            <th scope="col">
                <label for="ct_all" class="sound_only">상품 전체</label>
                <span><input type="checkbox" name="ct_all" value="1" id="ct_all" checked="checked"></span>
            </th>
			<th scope="col"><span>이미지</span></th>
            <th scope="col"><span>상품명</span></th>
            <th scope="col"><span>총수량</span></th>
            <th scope="col"><span>판매가</span></th>
            <th scope="col"><span>소계</span></th>
            <th scope="col"><span>포인트</span></th>
            <th scope="col"><span class="last">배송비</span></th>
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
						<button type="button" class="btn btn-primary btn-sm btn-block mod_options">선택사항수정</button>
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
            <tr><td colspan="8" class="text-center text-muted"><p style="padding:50px 0;">장바구니가 비어 있습니다.</p></td></tr>
		<?php } ?>
        </tbody>
        </table>
    </div>

    <?php if ($tot_price > 0 || $send_cost > 0) { ?>
		<div class="well bg-white">
			<div class="row">
				<?php if ($send_cost > 0) { // 배송비가 0 보다 크다면 (있다면) ?>
					<div class="col-xs-6">배송비</div>
					<div class="col-xs-6 text-right">
						<strong><?php echo number_format($send_cost); ?> 원</strong>
					</div>
				<?php } ?>
				<?php if ($tot_price > 0) { ?>
					<div class="col-xs-6"> 총계 가격/포인트</div>
					<div class="col-xs-6 text-right">
						<strong><?php echo number_format($tot_price); ?> 원 / <?php echo number_format($tot_point); ?> 점</strong>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

    <div style="margin-bottom:15px; text-align:center;">
        <?php if ($i == 0) { ?>
	        <a href="<?php echo G5_SHOP_URL; ?>/" class="btn btn-color btn-sm">계속하기</a>
        <?php } else { ?>
			<input type="hidden" name="url" value="./orderform.php">
			<input type="hidden" name="records" value="<?php echo $i; ?>">
			<input type="hidden" name="act" value="">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<button type="button" onclick="return form_check('buy');" class="btn btn-color btn-block btn-lg"><i class="fa fa-check-square fa-lg"></i> 주문하기</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="btn-group btn-group-justified">
						<div class="btn-group">
							<a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $continue_ca_id; ?>" class="btn btn-black btn-block btn-sm"><i class="fa fa-cart-plus"></i> 계속하기</a>
						</div>
						<div class="btn-group">
							<button type="button" onclick="return form_check('seldelete');" class="btn btn-black btn-block btn-sm"><i class="fa fa-times"></i> 선택삭제</button>
						</div>
						<div class="btn-group">
							<button type="button" onclick="return form_check('alldelete');" class="btn btn-black btn-block btn-sm"><i class="fa fa-trash"></i> 비우기</button>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		<?php } ?>
    </div>

</form>

<?php if($setup_href) { ?>
	<p class="text-center">
		<a class="btn btn-color btn-sm win_memo" href="<?php echo $setup_href;?>">
			<i class="fa fa-cogs"></i> 스킨설정
		</a>
	</p>
<?php } ?>

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
<?php */?>