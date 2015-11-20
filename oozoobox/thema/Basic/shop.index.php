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

?>



<!------s: 쇼핑몰 페이지--------><!--SW: main 전체를 감싸는 div-->
<div id="oz_mallpage2">
	<!--s: CONTENT-->
	<div id="oz_content">
    	
        
        <div class="category-con">
            <div class="category-inner-con">
                <!-- s: MAIN 글로벌메뉴-->
                <div id="oz_main_nav">
                
                    <ul class="tit">
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_01.png" alt="给宝宝最好的 icon"/></i><a>给宝宝最好的</a></h2><!--"내 아이에게 주고 싶은 가장 좋은 것"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">纸尿裤</a></dt><!--"기저귀"-->
                                        <!--<dd>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴</a>
                                            <i class="mod_subcate_line"></i>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴>하위메뉴</a>
                                        </dd>--><!--로컬 하위 메뉴 (추후 추가시 *css 수정 요)-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">食品</a></dt><!--"식품"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">营养食品</a></dt><!--"영양식품"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">衣服</a></dt><!--"옷"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">日用杂货</a></dt><!--"일용잡화"-->
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/glo_prm_01.png" alt="纸尿裤 广告"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_02.png" alt="白滑牛奶皮肤 ico"/></i><a>白滑牛奶皮肤</a></h2><!--"우유처럼 매끄러운 피부"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">面膜</a></dt><!--"마스크"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">化妆水/乳液</a></dt><!--"스킨/로션"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">精华/护肤霜</a></dt><!--"에센스/크림"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">彩妆</a></dt><!--"색조"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">套妆</a></dt><!--"세트상품"-->
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/glo_prm_02.png"  alt="白滑牛奶皮肤广告"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_03.png" alt="津津有味 icon"/></i><a>津津有味</a></h2><!--"입이 즐거워 진다"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">调料</a></dt><!--"조미료"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">面类</a></dt><!--"면류"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">饼干</a></dt><!--"과자"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">营养</a></dt><!--"영양"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">饮料</a></dt><!--"음료수"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">健康</a></dt><!--"건강"-->
                                    </dl>                            
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/glo_prm_03.png" alt="津津有味 广告"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_04.png" alt="小生活必备 icon"/></i><a>小生活必备</a></h2><!--"생활에 꼭 필요한 것"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">女士</a></dt><!--"여성용품"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">厨房</a></dt><!--"주방"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">洗澡</a></dt><!--"목욕"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">其他</a></dt><!--"기타"-->
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/glo_prm_04.png" alt="小生活必备 广告"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_05.png" alt="美丽的穿着 icon"/></i><a>美丽的穿着</a></h2><!--"아름다움을 입다"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">女装</a></dt><!--"여성복"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">男装</a></dt><!--"남성복"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">儿童</a></dt><!--"아동복"-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">内衣</a></dt><!--"내의"-->
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/glo_prm_05.png" alt="美丽的穿着 광고"/></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="mod_cate2">
                    </div> 
                </div> 
            </div>   
            <!-- e: MAIN 글로벌메뉴-->
            
            <!-- s: MAIN 배너 슬라이드-->
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
            <!-- e: MAIN 배너 슬라이드-->

    	</div>   
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
            speed: 400
          }
        }
      });
    });
  </script>