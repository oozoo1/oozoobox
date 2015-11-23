<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 


// 데모 및 관리자 미리보기
//if($is_admin || $is_demo) {
//	$at_set['mfile'] = ($pvm) ? $pvm : $at_set['mfile'];
//}
//
//$main_file = THEMA_PATH.'/main/'.$at_set['mfile'].'.php';
//
//if(file_exists($main_file)) {
//	include_once($main_file);
//} else {
//	echo '<div class="text-muted text-center" style="padding:300px 0px;">Switcher에서 메인을 선택해 주세요.</div>';
//}
$sql = "SELECT * FROM g5_shop_category WHERE ca_id = '10' or ca_id = '20'  or ca_id = '30'  or ca_id = '40' or ca_id = '50'";
$result = sql_query($sql);
?>



<!------s: 쇼핑몰 페이지--------><!--SW: main 전체를 감싸는 div-->
<div id="oz_mallpage2">
	<!--s: CONTENT-->
	<div id="oz_content">
    	
        <!--s: MAIN 글로벌메뉴&MAIN 배너 슬라이드-->
        <div class="category-con">
            <div class="category-inner-con">
                <!--s: MAIN 글로벌메뉴-->
                <div id="oz_main_nav">
                
                    <ul class="tit">
                    <?php $k=1; for ($i=0; $row=sql_fetch_array($result); $i++){?>
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_0<?=$k++?>.png" alt="给宝宝最好的 icon"/></i><a><?=$row[ca_name]?></a></h2><!--"내 아이에게 주고 싶은 가장 좋은 것"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                <?php 
                                $category_sql = "SELECT * FROM g5_shop_category WHERE ca_order = '$row[ca_order]' and ca_id !='10' and ca_id !='20' and ca_id !='30' and ca_id !='40' and ca_id !='50'";
                                $category = sql_query($category_sql);
                                for ($i=0; $row_category=sql_fetch_array($category); $i++){
                                ?>
                                    <dl>
                                        <dt><a href="/shop/list.php?ca_id=<?=$row_category[ca_id]?>"><?=$row_category[ca_name]?></a></dt><!--"기저귀"-->
                                        <!--<dd>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴</a>
                                            <i class="mod_subcate_line"></i>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴>하위메뉴</a>
                                        </dd>--><!--로컬 하위 메뉴 (추후 추가시 *css 수정 요)-->
                                    </dl>
                                 <?php } ?>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/glo_prm_<?=$row[ca_id]?>.png" alt="纸尿裤 广告"/></a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="mod_cate2">
                    </div> 
                </div> 
            </div>   
            <!--e: MAIN 글로벌메뉴-->
            
            <!--s: MAIN 배너 슬라이드-->
           <div class="oz_main_bn">
                <div id="slides">
                  <a href="#" style="background:rgb(255,204,0);">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="back_bn" style="background: url('/images/main_bn_back01.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                  <a href="#" style="background:rgb(232,232,232);">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="text_bn" style="background: url('/images/main_bn_text02.png') no-repeat left; ">
                               </b>
                               <b class="back_bn" style="background: url('/images/main_bn_back02.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                  <a href="#" style="background:rgb(1,48,119);">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="text_bn" style="background: url('/images/main_bn_text03.png') no-repeat left;">
                               </b>
                               <b class="back_bn" style="background: url('/images/main_bn_back03.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                  <a href="#" style="background:rgb(232,232,232);">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="back_bn" style="background: url('/images/main_bn_back04.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                </div>
            </div>
            <!--e: MAIN 배너 슬라이드-->
            
            <!--s: MAIN 슬라이드 상단 작은 배너-->
            <div class="small_banner_con">
            	<a class="small_banner" href="#">
                	<img width="170" height="440" alt="" src="/images/small_banner01.png"/>
                    <div class="small_banner_btn">
                    	<span class="btn_object">지금투표하러가기</span>
                    </div>
                </a>
            </div>
            <!--e: MAIN 슬라이드 상단 작은 배너-->
    	</div>
        <!--e: MAIN 글로벌메뉴&MAIN 배너 슬라이드-->
        
        <!--s: MAIN 네가지 약속--> 
        <div class="interact-con">
            <div class="module-body">
                <a class="interact-item" href="#">
                    <img src="images/main_promise_01.png" alt=""/> 
                </a>
                <a class="interact-item" href="#">
                    <img src="images/main_promise_02.png" alt=""/> 
                </a>
                <a class="interact-item" href="#">
                    <img src="images/main_promise_03.png" alt=""/> 
                </a>
                <a class="interact-item" href="#" style="margin-right:0">
                    <img src="images/main_promise_04.png" alt=""/> 
                </a>
            </div>
    	</div>
        <!--e: MAIN 네가지 약속--> 
        
        <!--s: MAIN 特色市场 특별매장-->
        <div class="oz_channel_con">
        	<div class="module_title">
            	特色市场
                <b class="title_deco">
                </b>
            </div>
            <div class="module_body">
            	<a class="big_chn" href="#">
                	<img src="/images/big_chn_01.png"/>
                </a>
                <div class="small_chn_con">
                	<a class="small_chn">
                    	<div class="title_chn">
                        	<h3 class="title">时尚</h3>
                            <h4 class="info">한국은 지금<br>어떤 옷이 유행할까</h4>
                        </div>
                        <img class="chn_pic_right" src="/images/small_chn_01.png"/>
                    </a>
                    <s class="seprate"></s> 
                    <a class="small_chn">
                    	<div class="title_chn">
                        	<h3 class="title">食品</h3>
                            <h4 class="info">오늘 저녁 밥상이<br>다채로워 진다<br>음식의 모든 것</h4>
                        </div>
                        <img class="chn_pic_right" src="/images/small_chn_02.png"/>
                    </a>
                    <s class="seprate hidden_990"></s> 
                    <a class="small_chn hidden_990">
                    	<div class="title_chn">
                        	<h3 class="title">推荐商品</h3>
                            <h4 class="info">당신만을 위한<br>맞춤상품!<br>지금 추천해 드려요</h4>
                        </div>
                        <img class="chn_pic_right" src="/images/small_chn_03.png"/>
                    </a>
                    <a class="small_chn">
                        <img class="chn_pic_left" src="/images/small_chn_04.png"/>
                        <div class="title_chn_right">
                            <h3 class="title_right">化妆品</h3>
                            <h4 class="info_right">소중한 당신을<br>더욱 특별하게</h4>
                        </div>
                    </a>
                    <s class="seprate "></s> 
                    <a class="small_chn">
                        <img class="chn_pic_left" src="/images/small_chn_05.png"/>
                        <div class="title_chn_right">
                            <h3 class="title_right">日常用品</h3>
                            <h4 class="info_right">작은 변화가<br>일상을 바꾸다</h4>
                        </div>                      
                    </a>
                    <s class="seprate hidden_990"></s> 
                    <a class="small_chn hidden_990">
                        <img class="chn_pic_left" src="/images/small_chn_06.png"/>
                        <div class="title_chn_right">
                            <h3 class="title_right">特价</h3>
                            <h4 class="info_right">OOZOOBOX의 특가제품을<br>만나는 특별한 기회를<br>놓치지 마세요</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--e: MAIN 특별매장-->

        <!--s: FULL 광고 배너-->
		<div class="oz_full_banner" style="margin-top:10px;">
        	<ins id="oz_full_banner_outer" style="margin:0; padding:0; width:1620px; height:90px; display:inline-block;">
            	<a href="#" targer="_blank">
                	<img width="1620" height="90" src="/images/full_banner_02.jpg" border="0"/>
                </a>
            </ins>
        </div>
        <!--e: FULL 광고 배너-->
        
        <!--s: MAIN热门商品 인기상품-->
        <div class="oz_wonderful_con">
        	<div class="wonderful_title">
            	特色市场
                <b class="title_deco">
                </b>
            </div>
            <div class="module_content">
 <!-------------------- 허걸 : s: UL 반복2번---------------- ------->
            	<ul class="wonderful_line">
 <!-------------------- 허걸:  s: 반복4번  마지막 하나만 다름------------->              
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_01.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li> 
<!----------------------허걸:  e: 여기까지 반복 4번--------------------------->        
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_02.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="特供新款 魅斑2015秋冬女装欧洲站大牌A字裙收腰显瘦通勤连衣裙子" class="item_name">特供新款 魅斑2015秋冬女装欧洲站大牌A字裙收腰显瘦通勤连衣裙子</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">550</span>
                                            <span class="price_decimal"></span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>  
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_03.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>  
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_04.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>  
                  	
<!--------------------------허걸 s: 마지막 하나------------------------------->
                    <li class="wonderful_item hidden_1366">
                    	<div class="card_item last_1920" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_05.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li> 
 <!-------------------------허걸 e: 마지막 하나----------------------------->                 
                </ul>                
 <!------------------------ 허걸: e: UL 반복2번---------------------- ------->
             	
                <ul class="wonderful_line">  
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_06.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li> 
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_07.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="特供新款 魅斑2015秋冬女装欧洲站大牌A字裙收腰显瘦通勤连衣裙子" class="item_name">特供新款 魅斑2015秋冬女装欧洲站大牌A字裙收腰显瘦通勤连衣裙子</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">550</span>
                                            <span class="price_decimal"></span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>  
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_08.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>  
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_09.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>  
                    <li class="wonderful_item hidden_1366">
                    	<div class="card_item last_1920" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_10.png"/>
                                </span>
                            </a>
                            <span class="item_info">
                            	<a href="#">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name">CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水</em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="#">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="#">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_wish">
                                        	<a href="#">
                                        		<img width="100%" src="/images/wonderful_wish.png" onmouseover="this.src='/images/wonderful_wish_o.png'" onmouseout="this.src='/images/wonderful_wish.png'"/>
                                            </a>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>         
                </ul>
 <!----------------------허걸: UL 반복 삭제해도 됨-------------------------->               
            </div>
        </div>
        <!--e: MAIN热门商品 인기상품-->
        
         <!--s: FULL 광고 배너 02-->
		<div class="oz_full_banner" style="margin-top:10px;">
        	<ins id="oz_full_banner_outer" style="margin:0; padding:0; width:1620px; height:90px; display:inline-block;">
            	<a href="#" targer="_blank">
                	<img width="1620" height="90" src="/images/full_banner_03.jpg" border="0"/>
                </a>
            </ins>
        </div>
        <!--e: FULL 광고 배너 02-->       
        
    	<!--s: MD 추천 상품-->
        <div class="oz_market_con">
        	<div class="market_title">
            	采购员推存
                <b class="title_deco">
                </b>
            </div>
            <div class="module_body">
            	<div class="market_line">
                	<div class="market_item">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_01.png"/>
                        </a>
                        <a href="#">
                            <span class="market_info">
                                날이 많이 추워졌어요.<br>
                                김이 모락모락 나는 라면 한 그릇과<br>
                                오늘 저녁은 함께 할래요! 
                            </span>
                        </a>
                        <a href="#">
                        	<span class="market_good">
                            </span>
                        </a>
                        <a href="#">
                        	<img src=""/>
                        </a>
                    </div>
                </div>
            </div>
        	
        
        </div>
        <!--e: MD 추천 상품-->
    
    
    
    
    </div>
    <!--e:CONTENT-->
</div>
<!------e: 쇼핑몰 페이지-------->



<script type="text/javascript">
$("#oz_main_nav .tit").slide({
	type:"menu",
	titCell:".mod_cate",
	targetCell:".mod_subcate",
	delayTime:0,
	triggerTime:10,
	defaultPlay:false,
	returnDefault:true
});
</script>


  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 823,
        height: 500,
        navigation: {
          effect: "fade"
        },
		  play: {
          auto: true,
		  effect:"fade"
        },
        pagination: {
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 600
          }
        }
      });
    });
  </script>