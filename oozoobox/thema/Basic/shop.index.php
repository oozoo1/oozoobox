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
<?php if($_SERVER['PHP_SELF']=="/index.php"){?>    	
        <!--s: MAIN 글로벌메뉴&MAIN 배너 슬라이드-->
        <div class="category-con">
            <div class="category-inner-con">
                <!--s: MAIN 글로벌메뉴-->
                <div id="oz_main_nav">
                
                    <ul class="tit">
                    <?php $k=1; $a=2; for ($i=0; $row=sql_fetch_array($result); $i++){?>
                        <li class="mod_cate">
                            <a href="/shop/list.php?ca_id=<?=$row[ca_id]?>" class="main_global_list"><h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_0<?=$k++?>.png" alt="给宝宝最好的 icon"/></i><span><?=$row[ca_name]?></span></h2></a><!--"내 아이에게 주고 싶은 가장 좋은 것"-->
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
                                    <a class="mod_subcate_gg" href="/shop/list.php?ca_id=<?=$row[ca_id]?>"><img src="/data/banner/<?=$a++?>"/></a>
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
<?php /*?>            <?php for ($i=0; $row3=sql_fetch_array($baner0_1); $i++){?>
            	<a class="small_banner" href="<?=$row3[bn_url]?>">
                	<img width="170" height="440" alt="" src="/data/banner/<?=$row3[bn_id]?>"/>
                    <div class="small_banner_btn">
                    	<span class="btn_object">지금투표하러가기</span>
                    </div>
                </a>
            <?php } ?><?php */?> <!--SW: pro php 다시 한번 봐주세요. ^^-->
            	<a class="small_banner">
                	<img width="170" height="440" alt="" src="/images/small_banner01.png"/>
                    <div class="small_banner_btn">
                    	<span class="btn_object">现在就去投票吧!</span>
                    </div>
                </a>           
            </div>
            <!--e: MAIN 슬라이드 상단 작은 배너-->
    	</div>
        <!--e: MAIN 글로벌메뉴&MAIN 배너 슬라이드-->
        <? } ?>
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
                <a class="interact-item" href="/shop/cscenter.php" style="margin-right:0">
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
                            <h4 class="info">为您实时解析<br>韩国最新时尚<br>流行服饰</h4>
                        </div>
                        <img class="chn_pic_right" src="/images/small_chn_01.png"/>
                    </a>
                    <s class="seprate"></s> 
                    <a class="small_chn">
                    	<div class="title_chn">
                        	<h3 class="title">食品</h3>
                            <h4 class="info">您今天的晚餐桌<br>将变得更加丰富。<br>关于美食的一切</h4>
                        </div>
                        <img class="chn_pic_right" src="/images/small_chn_02.png"/>
                    </a>
                    <s class="seprate hidden_990"></s> 
                    <a class="small_chn hidden_990 last_chn">
                    	<div class="title_chn">
                        	<h3 class="title">推荐商品</h3>
                            <h4 class="info">为了独一无二的<br>您的定制商品！<br>现在开始向您推荐！</h4>
                        </div>
                        <img class="chn_pic_right" src="/images/small_chn_03.png"/>
                    </a>
                    <a class="small_chn under_chn">
                        <img class="chn_pic_left" src="/images/small_chn_04.png"/>
                        <div class="title_chn_right">
                            <h3 class="title_right">化妆品</h3>
                            <h4 class="info_right">为了让尊贵的您<br>变得更与众不同</h4>
                        </div>
                    </a>
                    <s class="seprate "></s> 
                    <a class="small_chn under_chn">
                        <img class="chn_pic_left" src="/images/small_chn_05.png"/>
                        <div class="title_chn_right">
                            <h3 class="title_right">日常用品</h3>
                            <h4 class="info_right">从细节开始<br>改变您的日常生活</h4>
                        </div>                      
                    </a>
                    <s class="seprate hidden_990"></s> 
                    <a class="small_chn hidden_990 under_chn">
                        <img class="chn_pic_left" src="/images/small_chn_06.png"/>
                        <div class="title_chn_right">
                            <h3 class="title_right">特价</h3>
                            <h4 class="info_right">请不要错过<br>OOZOOBOX物<br>美价廉的特别商品企划!</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--e: MAIN 특별매장-->

        <!--s: FULL 광고 배너-->
		<div class="oz_full_banner" style="margin-top:30px;">
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
            	热门商品 
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>13</em>
                                    </span>
                                </a>
                            </span>                            
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
                                            <em>101</em>
                                        </span>
                                    </span>
                                </span>
                            </span>
                       </div>
                    </li> 
<!----------------------허걸:  e: 여기까지 반복 4번--------------------------->        
                  	<li class="wonderful_item">
                    	<div class="card_item" href="#">
                        	<a href="#">
                                <span class="item_pic">
                                    <img width="100%" src="/images/item_pic_02.png"/>
                                </span>
                            </a>
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>13</em>
                                    </span>
                                </a>
                            </span>   
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
                                            <em>1010</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>0</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>1011</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>13</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>1111</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>5</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>102</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>13</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>145</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>7</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>55</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>13</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>66</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>13</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>445</em>
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
                            <span class="wonderful_wish">
                                <a href="#">
                                    <span class="ico_wonderful_wish">	
                                    	<em>6</em>
                                    </span>
                                </a>
                            </span>                               
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
                                            <em>89</em>
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
                        <a class="market_info" href="#">
                            气温突降的寒夜里，<br>
                            今天晚餐来碗<br>
                            热气腾腾的拉面怎么样？
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_01.png" onmouseover="this.src='/images/md_go_01_o.png'" onmouseout="this.src='/images/md_go_01.png'"/>
                            </a>
                        </div>
                    </div>
                    <div class="market_item">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_02.png"/>
                        </a>
                        <a class="market_info" href="#">
                            回家的路上买上辛拉面回去吃？<br>
                            今天爸爸下班回家的脚步<br>
                            声格外轻快。
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_02.png" onmouseover="this.src='/images/md_go_02_o.png'" onmouseout="this.src='/images/md_go_02.png'"/>
                            </a>
                        </div>
                    </div>
                	<div class="market_item">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_03.png"/>
                        </a>
                        <a class="market_info" href="#">
                            宝宝干爽的小屁屁，<br>
                            看这笑得格外开怀的小脸，<br>
                            看来今天的心情也很好呢！
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_03.png" onmouseover="this.src='/images/md_go_03_o.png'" onmouseout="this.src='/images/md_go_03.png'"/>
                            </a>
                        </div>
                    </div>                    
                	<div class="market_item last_990">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_04.png"/>
                        </a>
                        <a class="market_info" href="#">
                        为了您的健康，<br>
                        供应新鲜的黄色食品和红色食品。
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_04.png" onmouseover="this.src='/images/md_go_04_o.png'" onmouseout="this.src='/images/md_go_04.png'"/>
                            </a>
                        </div>
                    </div>                    
                </div>
<!-------------------------허걸: 아래는 반복--------------------------->
                <div class="market_line">
                	<div class="market_item">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_01.png"/>
                        </a>
                        <a class="market_info" href="#">
                            气温突降的寒夜里，<br>
                            今天晚餐来碗<br>
                            热气腾腾的拉面怎么样？
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_01.png" onmouseover="this.src='/images/md_go_01_o.png'" onmouseout="this.src='/images/md_go_01.png'"/>
                            </a>
                        </div>
                    </div>
                    
                    <div class="market_item">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_02.png"/>
                        </a>
                        <a class="market_info" href="#">
                            回家的路上买上辛拉面回去吃？<br>
                            今天爸爸下班回家的脚步<br>
                            声格外轻快。
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_02.png" onmouseover="this.src='/images/md_go_02_o.png'" onmouseout="this.src='/images/md_go_02.png'"/>
                            </a>
                        </div>
                    </div>
                	
                    <div class="market_item">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_03.png"/>
                        </a>
                        <a class="market_info" href="#">
                        为了您的健康，<br>
                        供应新鲜的黄色食品和红色食品。
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_03.png" onmouseover="this.src='/images/md_go_03_o.png'" onmouseout="this.src='/images/md_go_03.png'"/>
                            </a>
                        </div>
                    </div>                    
                	<div class="market_item last_990">
                    	<a class="main_pic" href="#">
                        	<img src="/images/md_04.png"/>
                        </a>
                        <a class="market_info" href="#">
                        为了您的健康，<br>
                        供应新鲜的黄色食品和红色食品。
                        </a>
                        <a class="market_good" href="#">
                                <span class="market_good_no">2,501</span>
                        </a>
                        <div class="market_right">
                            <a href="#">
                                <img width="100%" src="/images/md_go_04.png" onmouseover="this.src='/images/md_go_04_o.png'" onmouseout="this.src='/images/md_go_04.png'"/>
                            </a>
                        </div>
                    </div>                    
                </div>
<!------------------------------여기까지 반복--------------------------->                
            </div>
        </div>
        <!--e: MD 추천 상품-->

         <!--s: FULL 광고 배너 03-->
		<div class="oz_full_banner" style="margin-top:10px;">
        	<ins id="oz_full_banner_outer" style="margin:0; padding:0; width:1620px; height:90px; display:inline-block;">
            	<a href="#" targer="_blank">
                	<img width="1620" height="90" src="/images/full_banner_01.jpg" border="0"/>
                </a>
            </ins>
        </div>
        <!--e: FULL 광고 배너 03-->     
        <!--s: FOOTER_SUB-->
        <div class="footer_sub_wrap">   
            <div class="footer_sub">
                <div class="footer_menu">
                    <dl>
                        <dt class="menu_tit">客户服务</dt>
                        <dd><a>消费者须知</a></dd>
                        <dd><a>忘记密码</a></dd>
                        <dd><a>查看已购买商品</a></dd>
                        <dd><a>如何注册成为会员</a></dd>
                        <dd><a>我要买</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">판매자센터</dt>
                        <dd><a>입점관리</a></dd>
                        <dd><a>관련상품등록</a></dd>
                        <dd><a>상품올리기</a></dd>
                        <dd><a>입점신청</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">支付方式 </dt>
                        <dd><a>如何注册支付宝</a></dd>
                        <dd><a>支付协议</a></dd>
                        <dd><a>支付方式</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">售后服务</dt>
                        <dd><a>换货/退款政策</a></dd>
                        <dd><a>联系卖家</a></dd>
                        <dd><a>退换货流程</a></dd>
                        <dd><a>售后服务</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">客服中心</dt>
                        <dd><a>FAQ</a></dd>
                        <dd><a>服务协议</a></dd>
                        <dd><a>会员修改个人资料</a></dd>
                        <dd><a>会员修改密码</a></dd>
                        <dd><a>修改收货地址</a></dd>
                    </dl>
                </div>
                <!--s: 제휴업체-->
                <div class="oz_partners">
                    <h3 class="oz_main_partners_tit">合作企业</h3>
                    <div class="partner_list">
                        <ul>
                            <li><a href="http://www.oozoo.co.kr" target="_blank"><img src="/images/partners/list_partner13.png" alt="롯데백화점"/></a></li>
                            <!--<li><a href="#" target="_blank"><img src="/images/partners/list_partner02.png" alt="신세계"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner03.png" alt="현대"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner04.png" alt="겔러리아"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner05.png" alt="홈플러스"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner06.png" alt="CJmall"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner07.png" alt="코카콜라"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner08.png" alt="마이크로소프트"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner09.png" alt="SK-2"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner10.png" alt="현대"/></a></li> 
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner11.png" alt="국민은행"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner12.png" alt="한국"/></a></li>-->
                        </ul>
                    </div>
                </div>            
                <!--e: 제휴업체-->
                <!--s: 공지사항-->
                <div class="oz_main_news">
                    <h3 class="oz_main_news_tit">公告</h3>
                    <div class="oz_main_news_list">
                        <ul>
                            <li><a href="#" target="_blank">【官方公告】宇宙”物流预警“邀你备战大促！</a></li>
                            <li><a href="#" target="_blank">恭喜恭喜！EXO第二张迷你专辑获奖者名单公布！</a></li>
                            <li><a href="#" target="_blank">系统维护</a></li>
                            <li><a href="#" target="_blank">优秀博客 栏目正在准备中</a></li>
                            <li><a href="#" target="_blank">关于换货及退货的公告</a></li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
        <!--e: FOOTER_SUB-->    
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
  
<script type="text/javascript">
$(function(){

//#############첫번째 샘플
        $('.oz_main_news_list').Vnewsticker({
			speed: 700,         //스크롤 스피드
			pause: 4000,        //잠시 대기 시간
			mousePause: true,   //마우스 오버시 일시정지(true=일시정지)
			showItems: 1,       //스크롤 목록 갯수 지정(1=한줄만 보임)
			direction : "up"    //up=위로스크롤, 공란=아래로 스크롤
	});

});
</script>

<?php  include_once('./shop/_tail.php'); ?>