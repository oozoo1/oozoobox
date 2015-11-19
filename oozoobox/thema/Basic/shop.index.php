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
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_01.png" alt="给宝宝最好的 icon"/></i><a>给宝宝最好的</a></h2>
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">纸尿裤</a></dt>
                                        <!--<dd>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴</a>
                                            <i class="mod_subcate_line"></i>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴>하위메뉴</a>
                                        </dd>--><!--로컬 하위 메뉴 (추후 추가시 *css 수정 요)-->
                                    </dl>
                                    <dl>
                                        <dt><a href="#">食品</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">营养食品</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">衣服</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">日用杂货</a></dt>
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd">광고</div>
                                    <a class="mod_subcate_gg" href="#"><img src="/images/0.jpg"  alt="纸尿裤 광고"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_02.png" alt="白滑牛奶皮肤 icon"/></i><a>白滑牛奶皮肤</a></h2>
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">面膜</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">化妆水/乳液</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">精华/护肤霜</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">彩妆</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">套妆</a></dt>
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd">광고</div>
                                    <a class="mod_subcate_gg" href="#"><img src="images/0.jpg"  alt="白滑牛奶皮肤 광고"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_03.png" alt="津津有味 icon"/></i><a>津津有味</a></h2>
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">调料</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">面类</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">饼干</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">营养</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">饮料</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">健康</a></dt>
                                    </dl>                            
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd">광고</div>
                                    <a class="mod_subcate_gg" href="#"><img src="images/0.jpg" alt="津津有味 광고"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_04.png" alt="小生活必备 icon"/></i><a>小生活必备</a></h2>
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">女士</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">厨房</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">洗澡</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">其他</a></dt>
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd">광고</div>
                                    <a class="mod_subcate_gg" href="#"><img src="images/0.jpg" alt="小生活必备 광고"/></a>
                                </div>
                            </div>
                        </li>
                        
                        <li class="mod_cate">
                            <h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_05.png" alt="美丽的穿着 icon"/></i><a>美丽的穿着</a></h2>
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                    <dl>
                                        <dt><a href="#">女装</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">男装</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">儿童</a></dt>
                                    </dl>
                                    <dl>
                                        <dt><a href="#">内衣</a></dt>
                                    </dl>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd">광고</div>
                                    <a class="mod_subcate_gg" href="#"><img src="images/0.jpg" alt="美丽的穿着 광고"/></a>
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
                  <a href="#">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="text_bn" style="background: url('/images/main_bn_text01.png') no-repeat left;">
                               </b>
                               <b class="back_bn" style="background: url('/images/main_bn_back01.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                  <a href="#">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="text_bn" style="background: url('/images/main_bn_text01.png') no-repeat left;">
                               </b>
                               <b class="back_bn" style="background: url('/images/main_bn_back01.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                  <a href="#">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="text_bn" style="background: url('/images/main_bn_text01.png') no-repeat left;">
                               </b>
                               <b class="back_bn" style="background: url('/images/main_bn_back01.jpg') no-repeat left;">
                               </b>
                          </div>
                      </div>
                  </a>
                  <a href="#">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">
                               <b class="text_bn" style="background: url('/images/main_bn_text01.png') no-repeat left;">
                               </b>
                               <b class="back_bn" style="background: url('/images/main_bn_back01.jpg') no-repeat left;">
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