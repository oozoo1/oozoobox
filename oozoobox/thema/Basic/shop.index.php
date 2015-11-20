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
                </div>s
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
        
        <!--s: MAIN 특별매장-->
        <div class="oz_channel_con">
        	<div class="module-title">
            	特色市场
                <b class="title_deco">
                </b>
            </div>
            <div class="module_body">
            	<a class="big_chn" href="#">
                	<img src=""/>
                </a>
                <div class="small_chn_con">
                	<a class="small_chn">
                    	<div class="title_chn">
                        	<h3 class="title">焕新频道</h3>
                        </div>
                        <img src=""/>
                    </a>
                    <s class="seprate"></s> 
                </div>
            </div>
        </div>
        <!--e: MAIN 특별매장-->
        
        
        
    
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