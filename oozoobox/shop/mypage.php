<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/mypage.php"));

// 쿠폰
$cp_count = 0;
$sql = " select cp_id
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '전체회원' )
              and cp_start <= '".G5_TIME_YMD."'
              and cp_end >= '".G5_TIME_YMD."' ";
$res = sql_query($sql);

for($k=0; $cp=sql_fetch_array($res); $k++) {
    if(!is_used_coupon($member['mb_id'], $cp['cp_id']))
        $cp_count++;
}

$mb_homepage = set_http(get_text(clean_xss_tags($member['mb_homepage'])));
$mb_profile = ($member['mb_profile']) ? conv_content($member['mb_profile'],0) : '';
$mb_signature = ($member['mb_signature']) ? apms_content(conv_content($member['mb_signature'], 1)) : '';



$g5['title'] = get_text($member['mb_name']).'님 마이페이지';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
<div id="oz_detail_wrap">
    <div class="oz_detail_main">
		<h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3>
        <!--s: LEFT_NAVIGATION-->
        <div id="Left_Navigation">
        	<!--s: MypageMenu-->
        	<div class="MyMenu">
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox01.png" alt="我的信息 My Information"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="/shop/mypage01_1.php">회원정보</a></li>
                    <li><a href="/shop/mypage01_2.php">주소록</a></li>
                    <li><a href="/shop/mypage01_3.php">개인정보이용내역</a></li>
                    <li><a href="/shop/mypage01_4.php">회원등급</a></li>
                </ul>
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox02.png" alt="购买信息 Shopping Info"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="/shop/mypage02_1.php">주문내역/배송조회</a></li>
                    <li><a href="/shop/mypage02_2.php">결제대기</a></li>
                    <li><a href="/shop/mypage02_3.php">주문취소내역</a></li>
                    <li><a href="/shop/mypage02_4.php">교환/환불내역</a></li>
                    <li><a href="/shop/mypage02_5.php">장바구니</a></li>
                    <li><a href="/shop/mypage02_6.php">위시리스트</a></li>
                </ul> 
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox03.png" alt="我的活动 My Activity"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="#">상품문의</a></li>
                    <li><a href="#">상품평 조회</a></li>
                    <li><a href="#">상품평 쓰기</a></li>
                    <li><a href="#">건의함 조회</a></li>
                    <li><a href="#">신고 고발 조회</a></li>
                </ul>  
            	<h4 class="MM_tit">
                	<img src="/images/tit_myozbox04.png" alt="我的优惠 OOZOOBOX Event"/>
                </h4>
                <ul class="MM_List">
                	<li><a href="#">쿠폰</a></li>
                    <li><a href="#">포인트</a></li>
                    <li><a href="#">이벤트 응모 담청</a></li>
                </ul> 
			</div>
            <!--e: MypageMenu-->
            <!--s: 고객센터 배너-->
            <div class="My_subsection">
            	<img src="/images/my_bn_cs_center.png" alt="CS_CENTER"/>
            </div>
            <!--e: 고객센터 배너-->
        </div>
        <!--e: LEFT_NAVIGATION-->
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<!--s: 내 정보 BAR-->
        	<div class="My_info">
            	<div class="My_info_bar">
                	<div class="My_baseinfo">
                    	<a class="My_picframe" href="#"><!--사진 올리는 창-->
                        	<img src="/images/my_picture.png" alt="My picture"/>
                        </a>
                        <span class="My_nickname">
                        	<a href="#">
                            	<em>MEI HUI<!--별명--></em>(sapiens11)<!--ID-->
                            </a>
                        </span>
                        <span class="My_grade">
                        	<a href="#">
                            	<img src="/images/my_grade_vip.png" alt="vip"/>
                                <em>회원님은  현재 VIP회원입니다.</em>
                            </a>
                        </span>
					</div>
                    <a class="My_address" href="#"> <!--주소수정하는 창으로-->
                        <em>我的收货地址</em>
                        <i></i>
                    </a>	                    
                </div>
                <div class="My_Shopping_info">
                    <ul>
                        <li>
                        	<a href="#"><span>待付款<em>1</em></span></a>
                        </li>
                        <li>
                        	<a href="#"><span>待发货<em>2</em></span></a>
                        </li>
                        <li>
                        	<a href="#"><span>待收货<em>1</em></span></a>
                        </li>
                        <li>
                        	<a href="#"><span>待评价<em>1</em></span></a>
                        </li>
                        <li>
                        	<a href="#"><span>退款<em>1</em></span></a>
                        </li>
                    </ul>
                </div>                
            </div>
            <!--e: 내 정보 BAR-->
            <!--s: 猜你喜欢-->
			<div class="oz_guess_like">
            	<div class="right_tit_bar"> 
            		<span class="light_orange">OOZOOBOX</span> 猜你喜欢
                    <a class="more_item">
                    	<span><i></i>换一组</span>
                    </a>                	
                </div>
                <div class="guess_like_content">
                	<div class="inner_content">
<!------------------------s: 반복------------------------>
                        <div class="guess_like_item">
                        	<div class="guess_pic">
                            	<a class="guess_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="guess_item">
                            	<a class="guess_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒居家装饰纸抽可爱卡通手纸盒</a>
                                <a class="guess_subtit">正品思埠天使之魅蓝莓面膜戴莱美</a>
                                <span class="guess_price">¥118</span>
                            </div>
                        </div>
<!------------------------e: 반복------------------------>
                        
                        <!------------------------ s: 날리기------------------------->
                        <div class="guess_like_item">
                        	<div class="guess_pic">
                            	<a class="guess_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="guess_item">
                            	<a class="guess_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒居家装饰纸抽可爱卡通手纸盒</a>
                                <a class="guess_subtit">正品思埠天使之魅蓝莓面膜戴莱美</a>
                                <span class="guess_price">¥118</span>
                            </div>
                        </div>
                        <div class="guess_like_item">
                        	<div class="guess_pic">
                            	<a class="guess_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="guess_item">
                            	<a class="guess_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒居家装饰纸抽可爱卡通手纸盒</a>
                                <a class="guess_subtit">正品思埠天使之魅蓝莓面膜戴莱美</a>
                                <span class="guess_price">¥118</span>
                            </div>
                        </div>
                        <div class="guess_like_item">
                        	<div class="guess_pic">
                            	<a class="guess_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="guess_item">
                            	<a class="guess_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒居家装饰纸抽可爱卡通手纸盒</a>
                                <a class="guess_subtit">正品思埠天使之魅蓝莓面膜戴莱美</a>
                                <span class="guess_price">¥118</span>
                            </div>
                        </div>
                        <div class="guess_like_item">
                        	<div class="guess_pic">
                            	<a class="guess_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="guess_item">
                            	<a class="guess_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒居家装饰纸抽可爱卡通手纸盒</a>
                                <a class="guess_subtit">正品思埠天使之魅蓝莓面膜戴莱美</a>
                                <span class="guess_price">¥118</span>
                            </div>
                        </div>   
                        <!------------------------ e: 날리기------------------------->                      
                    </div>
                </div>
            </div>           
            <!--e: 猜你喜欢-->

            <!--s:OOZOOBOX推荐-->
			<div class="oz_selection">
            	<div class="right_tit_bar"> 
            		<span class="light_orange">OOZOOBOX</span> 的跟单员为你量身推荐 
                    <a class="more_item">
                    	<span><i></i>换一组</span>
                    </a>                	
                </div>
                <div class="guess_like_content">
                	<div class="inner_content">
<!------------------------s: 반복------------------------>
                        <div class="selection_like_item">
                        	<div class="selection_pic">
                            	<a class="selection_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="selection_item">                       
                            	<a class="selection_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒</a>
                                <div class="md_selection">
                                    <img src="/images/md_selection_pic_01.png" alt="MD照片"/>
                                    <a class="selection_txt">正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美</a>
                                </div>
                            </div>
                        </div>
<!------------------------e: 반복------------------------>
                        
                        <!------------------------ s: 날리기------------------------->
                        <div class="selection_like_item">
                        	<div class="selection_pic">
                            	<a class="selection_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="selection_item">                       
                            	<a class="selection_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒</a>
                                <div class="md_selection">
                                    <img src="/images/md_selection_pic_02.png" alt="MD照片"/>
                                    <a class="selection_txt">正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美</a>
                                </div>
                            </div>
                        </div>
                        <div class="selection_like_item">
                        	<div class="selection_pic">
                            	<a class="selection_pic_link">
                                 	<img src="/images/guess_pic_01.png" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="selection_item">                       
                            	<a class="selection_tit">nici纸巾抽纸巾盒车内车载纸巾收纳盒</a>
                                <div class="md_selection">
                                    <img src="/images/md_selection_pic_03.png" alt="MD照片"/>
                                    <a class="selection_txt">正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美正品思埠天使之魅蓝莓面膜戴莱美</a>
                                </div>
                            </div>
                        </div>
                        <!------------------------ e: 날리기------------------------->                      
                    </div>
                </div>
            </div>  
 			<!--e:OOZOOBOX推荐-->
        </div>
        <!--e: RIGHT CONTENTS-->
        
        
        
        
	</div>
</div>

<?php  include_once('./_tail.php'); ?>
