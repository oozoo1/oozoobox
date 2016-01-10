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
		<a href="/shop/cscenter.php"><h3 class="mp_tit">CUSTOMER CENTER <span class="mp_tit_small">服务中心</span></h3></a>
        <!--s: LEFT_NAVIGATION-->
        <div id="Left_Navigation">
        	<!--s: MypageMenu-->
        	<div class="MyMenu CSMenu">
            	<ul>
                	<li class="CS_menu">
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter01.png" alt="消费者帮助 Buyer FAQ"/>
                        </h4>
                        <ul class="MM_List" style="display:block">
                            <li><a>회원관리</a></li>
                            <li><a>주문</a></li>
                            <li><a>결제</a></li>
                            <li><a>배송</a></li>
                            <li><a>취소/환불</a></li>                    
                            <li><a>포인트</a></li>
                            <li><a>기타</a></li>
                        </ul>
                    </li>
                    <li class="CS_menu">
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter02.png" alt="商家帮助 Seller FAQ"/>
                        </h4>
                        <ul class="MM_List">
                            <li><a>회원관리</a></li>
                            <li><a>상품관리</a></li>
                            <li><a>배송</a></li>
                            <li><a>취소/환불</a></li>
                            <li><a>이용료/정산/부가세</a></li>
                            <li><a>광고/기획전</a></li>
                        </ul>
                    </li>
                    <!--<li class="CS_menu"> 
                    <h4 class="MM_tit">
                        <img src="/images/tit_cscenter03.png" alt="我的设置 Personal Info."/>
                    </h4>
                    <ul class="MM_List">
                        <li><a>상품문의</a></li>
                        <li><a>상품평 조회</a></li>
                        <li><a>상품평 쓰기</a></li>
                        <li><a>건의함 조회</a></li>
                        <li><a>신고 고발 조회</a></li>
                    </ul>
                    </li>-->
                    <li class="CS_menu"> 
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter04.png" alt="公告 Notice"/>
                        </h4>
                        <ul class="MM_List">
                            <li><a>전체보기</a></li>
                            <li><a>OOZOOBOX 소식</a></li>
                            <li><a href="#">이벤트소식</a></li>
                            <li><a href="#">이벤트응모담청</a></li>
                        </ul> 
                    </li>
                </div>
                <!--e: MypageMenu-->
                <!--s: 고객센터 배너-->
                <div class="My_subsection">
                    <h4 class="MM_tit">
                        <img src="/images/tit_cscenter_quick.png" alt="Quick Finds"/>
                    </h4>
                    <ul class="Quickmenu">
                        <li><a><i class="quick01"></i>문의하기</a></li>
                        <li><a><i class="quick02"></i>문의내역</a></li>
                        <li><a><i class="quick03"></i>내 ID찾기</a></li>
                        <li><a><i class="quick04"></i>비밀번호찾기</a></li>
                        <li><a><i class="quick05"></i>배송조회</a></li>
                        <li><a><i class="quick06"></i>내정보수정하기</a></li>
                    </ul> 
                </div>
            </ul>
            <!--e: 고객센터 배너-->
        </div>
        <!--e: LEFT_NAVIGATION-->
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<div class="cscenter_main_tit"> 
            	<img src="/images/cs_main_title.png" alt="客户服务 1544-1234 AM 9:00 ~ PM 4:30 점심시간 PM 1:00 ~ PM 2:00
토/일/공휴일 휴무"/>
			</div>
            <dl class="inquiry-search">
                <dt>
                    <label for="inquirySearch">
                        자주찾는 문의
                    </label>
                </dt>
                <dd class="search-input" sizcache="5" sizset="49">
                    <p class="input-box">
                        <input name="" title="자주찾는 문의" class="txt" type="text" placeholder="문의사항을 입력하세요"/>
                    </p>
                    <a><button class="btn_search">검색</button></a>
                </dd>
            </dl>
            <!--s: CS_Main_FAQ-->
			<div class="cs_main_faq">
            	<h3 class="cs_main_title">FAQ</h3>
				<ul>
                	<li>
                    	<a><p class="faq_subject">회원가입은 어디서 하나요?</p></a>
                        <p class="category">[加入]</p>
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>
                    </li>                    
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>
                    <li>
                        <a><p class="faq_subject">怎样注册为会员呢？</p></a>
                        <p class="category">[加入]</p>                    
                    </li>                    
                </ul>
            </div>
            <!--e: CS_Main_FAQ-->
            
            <div class="cs_main_etc">
                <!--s: CS_Main_Notice-->
                <div class="cs_main_notice">
                    <h3 class="cs_main_title">공지사항</h3>
                    <ul>
                        <li>
                            <a><p class="cs_subject">우주박스오픈</p></a>
                            <p class="cs_category">[OOZOOBOX]</p>                    
                        </li>
                        <li>
                            <a><p class="cs_subject">怎样注册为会员呢？</p></a>
                            <p class="cs_category">[이벤트]</p>                    
                        </li>
                        <li>
                            <a><p class="cs_subject">우주박스오픈</p></a>
                            <p class="cs_category">[OOZOOBOX]</p>                    
                        </li>
                        <li>
                            <a><p class="cs_subject">怎样注册为会员呢？</p></a>
                            <p class="cs_category">[이벤트]</p>                    
                        </li>
                         <li>
                            <a><p class="cs_subject">우주박스오픈</p></a>
                            <p class="cs_category">[OOZOOBOX]</p>                    
                        </li>                              
                    </ul>
                </div>
                <!--e: CS_Main_Notice-->
               
                <!--s: CS_1:1 상담신청-->
                    <div class="cs_box_counsel">
                        <h3 class="cs_main_title">1:1 <span class="blue">상담</span> 신청하기</h3>
						<div class="explain">
                        	<p>광고, 비방 제품과 관계없는 애용, 타 사이트와의 가격<br>
                            비교, 기타 통신 예절에 어긋나거나 OOZOOBOX의<br>
                            취지에 맞지 않는 글은 예고없이 삭제 될 수 있습니다.</p>
                        	<p class="attention">한번 등록한 상담내용은 수정이 불가능 합니다.<br>
                            1:1상담은 24시간 신청가능하며 접수된 내용은<br>
                            빠른 시간내에 답변을 드리겠습니다.</p>
                        </div>
                        <a class="btn_request">
                        	<button>1:1상담신청</button>
                        </a>
                    </div>
                <!--e: CS_1:1 상담신청--> 
                       
            </div>


            
            
            
            
        </div>
        <!--e: RIGHT CONTENTS-->
        
  <script>
    // html dom 이 다 로딩된 후 실행된다.
    $(document).ready(function(){
        // menu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $(".CS_menu>h4").click(function(){
            var submenu = $(this).next("ul");
 
            // submenu 가 화면상에 보일때는 위로 보드랍게 접고 아니면 아래로 보드랍게 펼치기
            if( submenu.is(":visible") ){
                submenu.slideUp();
            }else{
                submenu.slideDown();
            }
        });
    });
</script>      
        
        
<?php  include_once('./_tail.php'); ?>
