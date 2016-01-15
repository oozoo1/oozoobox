<? 
	include_once('./_common.php');

?>
<meta charset="utf-8">
<style>
html, body, div, p, h1, h2, h3, h4, h5, h6, ul, ol, li, dl, dt, dd, table, th, td, form, fieldset, legend, input, textarea, button, select{margin:0; padding:0;}
body, input, textarea, select, button, table{font:12px/16px "Microsoft YaHei",arial,"宋体",Dotum,"돋움";}
img, fieldset{border:0;}
a, a:hover, a:active{cursor: pointer;}
table{border-collapse:collapse; border:0 none;}

#pop04_wrap {width:800px; height:550px; color:#666;}
.pop_tit {width:800px; margin-bottom:20px; border-bottom:1px solid #e7e7e7;}
.pop_tit h3 {width:100%; height:38px; background:url("/images/ico_popup04_h3.png") no-repeat 20px 12px; background-color:#fa9551; font-size:18px; color:#fff; padding:10px 0 0 50px; line-height:1.5;}
.pop_tit .pro_tit {width:100%; text-align:left; margin:20px 0 0 20px; line-height:20px;}
.pop_tit .pro_tit span {color:#416de9;}
.pop_tit .pro_tit span:hover {color:#ea5b0c;}

.pop04_content {position:relative; padding-right:8px; margin:18px 3px 0 13px; width:770px; height:500px; background:#fff;
overflow-y:scroll; scrollbar-face-color:#eee; scrollbar-highlight-color:#b8b8b8; scrollbar-3dlight-color:#fff; scrollbar-darkshadow-color:#fff; scrollbar-shadow-color:#b8b8b8; scrollbar-arrow-color:#b7b7b7; scrollbar-track-color:#eee;}
.order_detail_con {width:750px;}
.tbl_order_detail {table-layout:fixed; word-break:brake-word; word-wrap:break-word; width:100%; border-top:1px solid #999; border-bottom:1px solid #999;}
.tbl_order_detail thead th {padding:13px 0 6px; background:#eee;}
.tbl_order_detail tbody th {padding:9px 12px 7px 10px; border-top:1px solid #ddd; letter-spacing:-1px; text-align:left; vertical-align:top;}
.tbl_order_detail th {border-left: 1px solid #ddd; background:#eee;}
.tbl_order_detail th.first {border-left:0;}
.tbl_order_detail td {padding:9px 12px 7px 10px; border-top:1px solid #ddd; border-left:1px solid #ddd; vertical-align:top;}
.tbl_order_detail a {text-decoration:none; color:#333;}
.tbl_order_detail a.order_tit:hover {color:#ea5b0c;}
.tbl_order_detail td.price {padding-right:12px; padding-left:0px; color:#333; text-align:right;}
.tbl_order_detail td.seller {padding-right:0; padding-left:0px; text-align:center;}
.tbl_order_detail td.status {padding-right:0; padding-left:0px; text-align:center;}
.tbl_order_detail td.status .order_tracking {display:inline-block; margin-top:3px; padding-left:12px; background:url("/images/ico_tracking.png") no-repeat 0 3px; letter-spacing:-1px;}
.tbl_order_detail td.status .order_tracking:hover {background:url("/images/ico_tracking_o.png") no-repeat 0 3px;}
.tbl_order_detail td.status .order_tracking:hover a {color:#ea5b0c;}
.tbl_order_detail .order-number {color:#999; font-size:11px;}
.tbl_order_detail td.price .amount {margin-top:2px; padding-left:12px; text-align:right;}
.status_msg {display:block; margin-bottom:3px; color:#ec4f4a;}
.myoz_layer_column_left {float:left; width:368px;}
h4.in-layer-tit {font-size:14px; height:24px; margin:28px 0 0; padding-left:12px; border:0; color:#333;}
.myoz_layer_column_right {float:right; width:368px;}

.btn_close {text-align:center; margin-top:19px;}
.btn_close button {border:0;}
</style>
</head>

<body>

<div class="pass_confirm" id="pop04_wrap">
    <div class="pop_tit">
        <h3>주문상세정보</h3>
        <p class="pro_tit">
        결제번호 : <a><span>1234567890</span></a>
        <b style="margin:0 3px;"> | </b> 
        주문일자 : <a><span>2016년 01월 04일 </span></a>
        </p> 
    </div> 
    <div class="pop04_content">
    	<div class="order_detail_con">
	<? 
		$sql_cart = "SELECT * FROM g5_shop_cart WHERE od_id = '{$_GET[od_id]}'";
		$result = sql_query($sql_cart);
		
		for ($k=0; $row=sql_fetch_array($result); $k++){
		$sql1 = "SELECT it_id , it_img1 , it_name , pt_id , it_price FROM g5_shop_item WHERE it_id = '{$row[it_id]}'";
		$result1 = sql_query($sql1);
		$row_item=sql_fetch_array($result1);
		
  ?>  
							<table class="tbl_order_detail">
            	<colgroup>
                	<col width="13%"/>
                    <col width="auto"/>
                    <col width="14%"/>
                    <col width="11%"/>
                    <col width="9%"/>
                    <col width="13%"/>
                    <col width="13%"/>
                </colgroup>
                <thead>
                	<tr>
                    	<th class="first">상품번호<br>(주문번호)</th>
                        <th>상품명/주문옵션</th>
                        <th>상품금액<br></th>
                        <th>할인금액</th>
                        <th>배송비</th>
                        <th>판매자</th>
                        <th>주문상태</th>
                    </tr>
                </thead>
            	<tbody>
                    <tr class="first">
                        <td  rowspan="2">
                        <?=$row_item[it_id]?><br><span class="order-number">(<?=$_GET[od_id]?>)</span>
                        </td>   
                        <td>
                        	<a class="order_tit" href="/shop/item.php?it_id=<?=$row_item[it_id]?>" target="_parent"><?=$row_item[it_name]?></a>
                        </td>
                        <td class="price" rowspan="2">
                        	<strong class="num"><?=$row_item[it_price]?></strong>
                            원
                        </td>
                        <td class="price" rowspan="2">
                        	<strong>-0</strong>원
                        </td>
                        <td class="price" rowspan="2">
                        	<strong>0</strong>원
                        </td>   
                        <td class="seller" rowspan="2">
                        	<span>베이비제이</span>
                        </td>
                        <td class="status" rowspan="2"> 
                        	<strong class="status_msg">배송출발</strong>
                            <span class="order_tracking">
                            	<a href="#">배송추적</a> <!-------SW: 허걸!! "결제완료","상품준비중"일때는 없음--->
                            </span>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                    		<div><?=$row_item[it_name]?></div>
                        </td>
                    </tr>                                        
                </tbody>                
            </table>
         <? } ?>   
            <div class="myoz_layer_column_left">
            	<h4 class="in-layer-tit">배송지정보</h4>
                <table class="tbl_order_detail">
                	<colgroup>
                    	<col style="width:32%"/>
                        <col/>
                    </colgroup>
                    <tbody>
                    	<tr>
                        	<th class="first">받으시는 분</th>
                            <td>김미혜</td>
                        </tr>
                    	<tr>
                        	<th class="first">연락처</th>
                            <td>123456789</td>
                        </tr>
                    	<tr>
                        	<th class="first">주소</th>
                            <td>吉林 延边朝鲜族自治州 延吉市
                            长白路 东方公寓 香慧超市(原广客来超市)</td>
                        </tr>
                     	<tr>
                        	<th class="first">배송시 요구사항</th>
                            <td>빠른시일내에 배송부탁드립니다.</td>
                        </tr>                                                                       
                    </tbody>               	
                </table>
            </div>
						<div class="myoz_layer_column_right">
            	<h4 class="in-layer-tit">결제정보</h4>
                <table class="tbl_order_detail">
                	<colgroup>
                    	<col style="width:32%"/>
                        <col/>
                    </colgroup>
                    <tbody>
                    	<tr>
                        	<th class="first">최종 결제금액</th>
                            <td class="price">1000</td>
                        </tr>
                    	<tr>
                        	<th class="first">상품금액</th>
                            <td>123456789</td>
                        </tr>
                    	<tr>
                        	<th class="first">배송비</th>
                            <td>14444</td>
                        </tr>
                     	<tr>
                        	<th class="first">포인트</th>
                            <td>1000</td>
                        </tr>                                                                       
                    </tbody>
                	
                </table>          
       			 </div>
        
      </div>
    </div>       
</div>                            