<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$item_skin_url.'/style.css" media="screen">', 0);

if($is_orderable) echo '<script src="'.$item_skin_url.'/shop.js"></script>'.PHP_EOL;

// 이미지처리
$j=0;
$thumbnails = array();
$item_image = '';
$item_image_href = '';
for($i=1; $i<=10; $i++) {
	if(!$it['it_img'.$i])
		continue;

	$thumb = get_it_thumbnail($it['it_img'.$i], 72, 72);

	if($thumb) {
		$org_url = G5_DATA_URL.'/item/'.$it['it_img'.$i];
		$img = apms_thumbnail($org_url, 418, 418, false, true);
		$thumb_url = ($img['src']) ? $img['src'] : $org_url;
		if($j == 0) {
			$item_image = $thumb_url; // 큰이미지
			$item_image_href = G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;ca_id='.$ca_id.'&amp;no='.$i; // 큰이미지 주소
		}
		$thumbnails[$j] = '<a href="#" ref="'.$thumb_url.'" class="thumb_item_image popup_item_image">'.$thumb.'<span class="sound_only"> '.$i.'번째 이미지 새창</span></a>';
		$j++;
	}
}

// 카운팅
$it_comment_cnt = ($it['pt_comment'] > 0) ? ' <b class="orangered en">'.number_format($it['pt_comment']).'</b>' : '';
$it_use_cnt = ($item_use_count > 0) ? ' <b class="orangered en">'.number_format($item_use_count).'</b>' : '';
$it_qa_cnt = ($item_qa_count > 0) ? ' <b class="orangered en">'.number_format($item_qa_count).'</b>' : '';

// 판매자
$is_seller = ($it['pt_id'] && $it['pt_id'] != $config['cf_admin']) ? true : false;

?>


<!--s: 상세보기-->
<div id="oz_detail_wrap">
	<!--s: 상세보기 wrap-->
    <div class="oz_detail_main">
    	<!--s: 상세보기 제품 사진, 가격정보-->
    	<div class="detail_good">
        	<!--s: 제품 사진 보기-->
        	<div class="detail_good_pic">
            	<div class="detail_good_slide_big">
				<div class="item-image">				            
                <? if($it[it_1]){?>
                <iframe height=409 width=409 src="http://player.youku.com/embed/<?=$it[it_1]?>==" frameborder=0 allowfullscreen></iframe>           
                <? }else{ ?>
				<a href="#" id="item_image_href" class="popup_item_image">
				<img id="item_image" src="<?php echo $item_image;?>" alt="">
				</a>
                <? } ?>
					<?php if($wset['shadow']) echo apms_shadow($wset['shadow']); //그림자 ?>
				</div>
                </div>
                <ul class="detail_good_slide_small">
                	<div class="item-thumb text-center">
                	<?php for($i=0; $i < 5; $i++) {  ?><li><?php echo $thumbnails[$i]; ?></li><?php } ?>
                	</div>
					<script>
					$(function(){
						$(".thumb_item_image").hover(function() {
							var img = $(this).attr("ref");
							var url = $(this).attr("href");
							$("#item_image").attr("src", img);
							$("#item_image_href").attr("href", url);
							return true;
						});
						// 이미지 크게보기
						$(".popup_item_image").click(function() {
							var url = $(this).attr("href");
							var top = 10;
							var left = 10;
					
							return false;
						});
					});
					</script>
                </ul>                
            </div>
            <!--e: 제품 사진 보기-->

            <!--s: 제품 가격 정보-->
            <div class="detail_good_info">
                <h3><?php echo stripslashes($it['it_name']); // 상품명 ?></h3>
                <table summary="해당상품에 대한 정보 및 옵션선택 영역입니다. 원산지, 판매국가, 배송구분, 스크랩, 추가정보 항목과 해당 상품에 대한 옵션선택 및 가격정보 바로구매, 장바구니 담기 위시리스트 등록 기능이 있습니다." class="detail_good_etc">
                    <colgroup>
                        <col style="width:65px;"><?php echo $it['it_basic']; ?>
                        <col>
                    </colgroup>
					<form name="fitem" method="post" action="<?php echo $action_url; ?>" class="form item-form" role="form" onsubmit="return fitem_submit(this);">
					<input type="hidden" name="it_id[]" value="<?php echo $it_id; ?>">
					<input type="hidden" name="it_msg1[]" value="<?php echo $it['pt_msg1']; ?>">
					<input type="hidden" name="it_msg2[]" value="<?php echo $it['pt_msg2']; ?>">
					<input type="hidden" name="it_msg3[]" value="<?php echo $it['pt_msg3']; ?>">
					<input type="hidden" name="sw_direct">
					<input type="hidden" name="url">
                    <tbody>
                        <tr class="good_info_satisfy">
                            <th scope="row">满意度</th>
                            <td>
                                <span class="good_info_satisfy_grade">96%</span>
                                <span class="good_info_satisfy_star">
                                	<span style="width: 96%"></span>
                                </span>
                            </td>
                        </tr>
                        <tr class="good_info_scrap">
                            <th scope="row">简报</th>
                            <td>
                                <a href="#">
                                	<img alt="qq" src="/images/detail_sns_01.png"/>
                                </a> 
                                <a href="#">
                                	<img class="space" alt="人人网" src="/images/detail_sns_02.png"/>
                                </a>
                                <a href="#">
                                	<img class="space" alt="微博" src="/images/detail_sns_03.png"/>
                                </a> 
                                <a href="#">
                                	<img class="space" alt="微信" src="/images/detail_sns_04.png"/>
                                </a>                                
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">送货</th>
                            <td>商店</td>
                        </tr>
                        <tr>
                            <th scope="row" class="option-select">
                            	选择
              		        </th>
                            <td class="option-all">
                                <div class="position-relative">
                                    <select title="옵션선택" id="btnChoiceOption">
                                        <option value="01" selected="selected">상품이름1</option>
                                        <option value="02">상품이름2</option>
                                        <option value="03">상품이름3</option>
                                        <option value="04">상품이름4</option>
                                    </select>                       
                                    <div class="detail_total_price">
                                        <div class="detail_total_price_info">
                                            <span class="detail_total">选择商品 合算 :</span> 
                                            <span class="item_total_price">
                                                <i class="price_rmb">¥</i>
                                                <span class="price_integer" id="it_tot_price"><?php echo display_price(get_price($it)); ?>
						<input type="hidden" id="it_price" value="<?php echo get_price($it); ?>"></span>
                                            </span> 
                                        </div>
                                    </div>
                                    <div class="choice-control">
                                        <a href="#">
                                            <button id="btnBuyNow" type="submit">
                                                <img alt="立即购买(바로구매)" src="/images/detail_btn_01.png" title="立即购买(바로구매)"/>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button id="btnAddToCart" type="button">
                                                <img alt="加入购物车(장바구니 담기)" src="/images/detail_btn_02.png" title="加入购物车(장바구니 담기)"/>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button id="btnAddToWishList" type="button">
                                                <img alt="MD询问(MD에게 묻기)" src="/images/detail_btn_03.png" title="MD询问(MD에게 묻기)"/>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button id="btnAddToSend" type="button">
                                                <img alt="软磨硬泡(조르기)" src="/images/detail_btn_04.png" title="软磨硬泡(조르기)"/>
                                            </button>
                                        </a>                                       
                                    </div>
                                    <div class="detail_seller_store" style="padding-left: 3px;"><br>
                                        <a href="#">
                                            <img alt="进入店铺" src="/images/btn_allitem_thisshop.png"/>
                                        </a>          
                                    </div>
                            	</div>
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>
            <!--e: 제품 가격 정보-->
        </div>
        <!--e: 상세보기 제품 사진, 가격정보-->

        <!--s:상세보기 제품 정보, 게시판-->
        <div id="detail_container">
            <ul class="detail_tabs">
                <li class="active" rel="detail_tab1">商品详情</li>
                <li rel="detail_tab2">用户评价 <span class="tap_no">(110)</span></li>
                <li rel="detail_tab3">询问/回复</li>
                <li rel="detail_tab4">卖家信息</li>
                <li rel="detail_tab5">取消/换货/退货 <span class="tap_no">(18)</span></li>
            </ul>
                        
            <div class="detail_tab_container">
            	<!--s: #tab1 商品详情 "상품상세보기" -->
                <div id="detail_tab1" class="detail_tab_content">
					<div class="tab_content_warp">
                        <h4 class="description">商品详情  <span class="strap">Description</span></h4>
                        <img src="/images/detail_01_01.png" alt="상품소개01"/>
                        <img src="/images/detail_01_02.png" alt="상품소개02"/>
                        <img src="/images/detail_01_03.png" alt="상품소개03"/>
                        <img src="/images/detail_01_04.png" alt="상품소개04"/>
                    </div>
                    <a href="#">
                        <button id="btnAfter" type="submit">
                            <img alt="去看看用户评价(후기보러가기)" src="/images/detail_btn_tab1.png" title="去看看用户评价(후기보러가기)"/>
                        </button>
                    </a>
                </div>
                <!--e: #tab1 商品详情 "상품상세보기" -->
                <!--s: #tab2 用户评价 "상품후기" -->
                <div id="detail_tab2" class="detail_tab_content">
					<div class="tab_content_warp">
                        <h4 class="tab_content_tit">用户评价 <span class="strap">Comment</span></h4>
                        <p class="tab2_titcomment">상품평은 구매완료 후 <a href="#" class="linkmyafter">수취확인</a>에서 작성하실 수 있습니다. 광고, 비방 제품과 관계없는 애용, 타 사이트 및 가격비교, 기타 통신예절에 어긋나거나 OOZOO BOX의 취지와 맞지 않은 글은 예고없이 삭제 및 수정될 수 있습니다.</p>
                        <div class="tab2_view_after">
                            <a href="#">
                                <button id="btnWriteAfter" type="submit">
                                    <img alt="去制作用户评价(후기작성하러가기)" src="/images/btn_tab2_writeafter.png" title="去制作用户评价(후기작성하러가기)"/>
                                </button>
                            </a>
                            <!--s: 후기 리스트-->
                            <ul id="tab2_after_comment">
                            	<!-- 후기 1--->
                                <li>
                                	<p class="after_comment_number">111</p><!-- 번호 --->
                                    <div class="after_information"> <!-- 내용--->
                                    	<p class="after_talk">
                                        	각각 기능이 다른데, 혹시 각각의 가능별로 빈들을 불류한 제품은 추가 계획이 없나요? <br>
                                        </p>
                                        <p class="after_writer">
                                            <span class="after_writer_nick">ykc** </span><span class="after_writer_place">, 상해</span><!--작성자 & 지역-->
                                            <span class="after_writer_bar">|</span>2015-11-13 20:15:12 <!--날짜-->
                                        </p>
                                        <p class="after_reply"> <!-- 판매자 답변-->
                                        	안녕하세요, 엔엠씨입니다 ^__^ <br>
                                            먼저, 저희 엔엠씨에 많은 관심을 가져주셔서 정말 감사드립니다.<br> 
                                            문의하신 화산콩(마그마빈) 클렌저의 색상별 생산 여부는<br>
                                            아직 계획되어 있지 않은 점 참조 부탁드립니다.<br>
                                            또한, 고객님의 의견을 수렴하여 더욱 개선되어지는 엔엠씨 화장품이 될 것을 약속드리겠습니다~!<br>
                                            행복한 월요일 보내세요~<br>
                                            감사합니다 ^^ 
                                            <span class="after_reply_date">2015-08-24 09:40:18</span>
                                        </p>
                                    </div>
                                    <dl class="after_info"> <!-- 작성자 정보--->
                                    	<dt>평점</dt> <!--만족도-->
                                        <dd>
                                        	<span class="after_satisfy_grade">매우만족</span>
                                            <span class="after_satisfy_star"></span>
                                        </dd>
                                        <dt>직업</dt><dd>주부</dd> <!--직업-->
                                        <dt>나이</dt><dd>35세</dd> <!--나이-->
                                        <dt>성별</dt><dd>여</dd>  <!--성별-->
                                        <dt class="frequency">사용빈도</dt><dd class="frequency_sub">매일</dd> <!--사용빈도-->
                                    </dl>                                    
                            	</li>
								<!-- 후기 2--->
                                <li>
                                	<p class="after_comment_number"><!-- 번호 --->
                                    110
                                    </p>
                                    <div class="after_information"> <!-- 내용--->
                                    	<p class="after_talk">
                                        	후기를 썼던것 같은데 없는거 보니 착각인가봐요..ㅋㅋ<br>
                                            거품이 생각보다 많이 안나서 쪼끔 실망스럽지만<br> 
                                            그래도 세정력은 괜찮네요ㅎㅎ<br>
                                            다음 제품 개발할 때는 향을 조금이라도 추가 해주셨음 좋겠어요~ 
                                        </p>
                                        <p class="after_writer">
                                            <span class="after_writer_nick">ykc** </span><span class="after_writer_place">, 상해</span><!--작성자 & 지역-->
                                            <span class="after_writer_bar">|</span>2015-11-13 20:15:12 <!--날짜-->
                                        </p>
                                        <p class="after_reply"> <!-- 판매자 답변-->
                                        	안녕하세요, 엔엠씨입니당 ^0^<br>
                                            저희 엔엠씨를 이용해주셔서 정말 감사드립니당~!<br> 
                                            고객님의 의견을 수렴하여 더욱 개선되어지는 엔엠씨 화장품이 될 것을 약속드리겠습니다~!<br>
                                            행복한 하루 보내세용^7^
                                            <span class="after_reply_date">2015-08-24 09:40:18</span>
                                        </p>
                                    </div>
                                    <dl class="after_info"> <!-- 작성자 정보--->
                                    	<dt>평점</dt> <!--만족도-->
                                        <dd>
                                        	<span class="after_satisfy_grade">매우만족</span>
                                            <span class="after_satisfy_star"></span>
                                        </dd>
                                        <dt>직업</dt><dd>주부</dd> <!--직업-->
                                        <dt>나이</dt><dd>35세</dd> <!--나이-->
                                        <dt>성별</dt><dd>여</dd>  <!--성별-->
                                        <dt class="frequency">사용빈도</dt><dd class="frequency_sub">매일</dd> <!--사용빈도-->
                                    </dl>                                    
                            	</li>
							</ul>
                            <!--s: 후기 리스트-->                        
                        </div>
                    </div>
                    <a href="#">
                        <button id="btnAfter" type="submit">
                            <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png"/>
                        </button>
                    </a>         
                </div>
                <!--e: #tab2 用户评价 "상품후기" -->
                <!--s: #tab3 询问/回复 "질문과 답변"-->
                <div id="detail_tab3" class="detail_tab_content">
					<div class="tab_content_warp">
                        <h4 class="tab_content_tit">询问/回复  <span class="strap">Question & Answer</span></h4>
						<!--s: QnA search 버튼-->
                        <div class="tab_qna_act">
                        	<button id="btnWriteQna" type="button">
                            	<img src="/images/detail_btn_tab3_qna.png" alt="询问 질문하기"/>
                            </button>
                            <form id="QnaSearch" action=""  method="" autocomplete="off">
                            	<span class="search-area">
                                	<input name="Keyword" class="txt" id="txtQnaKeyword" type="text">
                                    </input>
                                    <button id="btnQnaSearch" type="submit">
                                    	<img src="/images/detail_btn_tab3_search.png" alt="检索 검색하기"/>
                                    </button>
                                </span>
                            	<button id="btnFilter" type="button">
                                	<img src="/images/detail_btn_tab3_myquestion.png" alt="察看我询问的 내가 쓴글 보기"/>
                                </button>
                                <button id="btnShowALLQna" type="button">
                                	<img src="/images/detail_btn_tab3_allquestion.png" alt="察看全部 QnA 전부보기"/>
                                </button>
                            </form>
                        </div>
                        <!--e: QnA search 버튼-->
                        <!--s: QnA wirte-->
                        <form class="tab3_qna_write" id="qna_write_panel" style="display:none;" action="" method="post" autocomplete="off" >
                        	<p class="section">
                            	<label for="subject-write">题目</label>
                                <input name="subject" class="txt" id="subject-write" style="width:630px;" type="text" size="90"></input>
                            </p>
                        	<p class="c_subject">
                            	<label for="text-write">内容</label>
                                <textarea name="body" id="text-write" rows="6" cols="120"></textarea>
                                <button class="regist-btn" type="">提问</button>
                            </p>                            
                        </form>
                        <!--e: QnA wirte-->
                        <!--s: QnA list-->
                        <table class="tab3_qnalist" summary="판매자들이 입력한 정보를 보여주는 공간입니다.">
                        	<colgroup>
                            	<col width="90px"></col>
                                <col width="460px"></col>
                                <col width="100px"></col>
                                <col width="100px"></col>
                            	<col width="100px"></col>                           
                            </colgroup>
                            <thead>
                            	<tr>
                                	<th scope="col">번호</th>
                                    <th scope="col">제목</th>
                                    <th scope="col">아이디</th>
                                    <th scope="col">답변상태</th>
                                    <th scope="col">작성일</th>
                                </tr>
                            </thead>
                            <tbody id="tblQnAList">
                            	<tr class="question">
                                	<td>2</td>
                                    <td class="subject">
                                    	<a class="view-qna-detail">재입고 문의</a>
                                    </td>
                                    <td>khjk**</td>
                                    <td class="answer-stats">
                                    	<img src="/images/icon_answer_complete.png" alt="답변완료"/>
                                    </td>
                                    <td>2015-12-03</td>
                                </tr>
                                <tr class="answer">
                                	<td colspan="5">
                                    <p class="answer_question">이 상품 재입고는 언제쯤 되나요?<br>
                                    그리고 재입고 알림 신청은 어디서 하는건가요? </p>
                                    <div class="answer_wrap">
                                    	<p class="answer_answer">안녕하세요 고객님. 상품 담당자입니다.<br><br>
                                        현재 대략적인 일정이 나오지 않아서 예약 판매를 하지 않는데요,<br>
                                        조만간 일정이 정해지면 판매 시작 하겠습니다.<br><br>
                                        [재입고 알림신청]을 해주시면 예약 주문시 재고 등록되었다고 안내 메일이 발송 될 거예요.<br><br>
                                        문의주셔서 감사합니다.<br>
                                        편안한 하루 되세요.
                                        </p>
                                    </div>
                                    </td>
                                </tr>      
                            	<tr class="question">
                                	<td>1</td>
                                    <td class="subject">
                                    	<a class="view-qna-detail">배송문의</a>
                                    </td>
                                    <td>everlist**</td>
                                    <td class="answer-stats">
                                    	<img src="/images/icon_answer_waiting.png" alt="미답변"/>
                                    </td>
                                    <td>2015-11-27</td>
                                </tr>
                                <tr class="answer">
                                	<td colspan="5">
                                    <p class="answer_question">저두여~~언제 배송 되나요 기다리다 목이 기린 되겠져여 ㅋㅋ</p>
                                    <div class="answer_wrap">
                                    	<p class="answer_answer">안녕하세요 고객님. 상품 담당자입니다.<br><br>
                                        27일 출고되었으니 송장조회 확인 부탁드립니다.<br><br>
                                        문의주셔서 감사합니다.<br>
                                        편안한 하루 되세요.
                                        </p>
                                    </div>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                        <!--e: QnA list-->
                    </div>
                    <a href="#">
                        <button id="btnAfter" type="submit">
                            <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png"/>
                        </button>
                    </a>                             
                </div>
                <!--e: #tab3 询问/回复 "질문과 답변"-->
                <!--s: #tab4 卖家信息 "판매자 정보"-->
                <div id="detail_tab4" class="detail_tab_content">
                	<div class="tab_content_warp">
                        <h4 class="tab_content_tit">卖家信息  <span class="strap">Sellers Information</span></h4>
                       	<table class="tab_seller" summary="판매자들이 입력한 정보를 보여주는 공간입니다.">
                        	<colgroup>
                            	<col width="18%"></col>
                                <col width="82%"></col>
                            </colgroup>
                            <tbody>
                            	<tr>
                                	<th scope="row">卖家</th>
                                    <td>홈플러스 온라인몰</td>
                                </tr>
                            	<tr>
                                	<th scope="row">商户/代表人</th>
                                    <td>홈플러스(주)/도성환</td>
                                </tr>
                            	<tr>
                                	<th scope="row">联系方式</th>
                                    <td>1577-3355</td>
                                </tr> 
                             	<tr>
                                	<th scope="row">CS咨询时间</th>
                                    <td>09시~18시</td>
                                </tr> 
                             	<tr>
                                	<th scope="row">电子邮件</th>
                                    <td>ehmp224@homeplus.co.kr</td>
                                </tr>                               
                            	<tr>
                                	<th scope="row">传真</th>
                                    <td>02-3459-8005</td>
                                </tr> 
                            	<tr>
                                	<th scope="row">商业号码</th>
                                    <td>220-81-603348</td>
                                </tr>
                            	<tr>
                                	<th scope="row">通信销售申报号码</th>
                                    <td>강남-1872</td>
                                </tr>
                                <tr>
                                	<th scope="row">营业所在地</th>
                                    <td>서울 강남구 테헤란로 301 (역삼동, 상정개발17층)</td>
                                </tr>                                                                                                                                                  
                            </tbody>
                        </table>
                    </div>
                    <a href="#">
                        <button id="btnAfter" type="submit">
                            <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png"/>
                        </button>
                    </a>                    
                </div>
                <!--e: #tab4 卖家信息 "판매자 정보"-->
                <!--s: #tab5 取消/换货/退货 "교환/환불정책"-->
                <div id="detail_tab5" class="detail_tab_content">
                	<div class="tab_content_warp">
                        <h4 class="tab_content_tit">取消/换货/退货  <span class="strap">Return Policy</span></h4>
                        <span class="return_title">换货/退款政策</span>
                        <ul class="detail_tab_return">
                            <p>我们将在收到退回的货物后，给您退货和换货。因为是进口商品，将需要花费大量的时间和费用，所以请慎重决定。<br></p>
                            <p class="tab_return_paragraph"><b>申请退换货之前，请确认以下注意事项。</b></p>
                            <li>退货及退款申请仅限购买者。</li>                        
                        	<li>请务必在收货后3个工作日以内完成在线申请，以便我们在系统中进行记录；并且需要申请退货时，请务必在收货后7个工作日以内，将货物返回物流中心。</li>
                            <li>如因购买者自身原因需要退货的情况，运费由客户负担。</li>
                            <li>如因商品质量问题需要退款的情况，请顾客先垫付配送费，我们收货确认后将进行退款处理。</li>
                            <li>商品配送中取消订单的情况，退款将在商品回收后进行处理。但此前交易时产生的汇款手续费及各种手续费将无法返回，请注意。</li>                            
                            <li>销售时标注有“不可退货”的商品，将不能因为顾客自身原因进行退货/退款。</li>                            
                            <li>因顾客意外失误产生的损坏，将不能进行退换货。 </li>
                              
                            <p class="tab_return_paragraph"><b>不可退换货情况</b></p>            
                            <li>收到商品后，7个工作日内（公休日/节假日除外）没有将其返还到达物流中心的情况。</li>                        
                        	<li>收货后包装不是最初配送状态的情况。（包括赠品）</li>
                            <li>商品留有适用痕迹（化妆品，食品等），或者产品有磨损痕迹（香水味等）的情况。</li>
                            <li>商品留有洗濯痕迹的情况。</li>
                            <li>针织类、浅色类、细致材质、饰品，不可退换货。</li>                            
                            <li>商品断货的情况。</li>                            
                            <li>订单制作及手工制作鞋的情况。</li>                
                            <li>没有通过在线申请退换货后发送的情况。</li>                        
                        	<li>证书或商品标签清除，损坏的情况。</li>
                            <li>根据商品特征没有商品标签，说明书，表证书配送时，不能以此为理由退换货。</li>
                            
                            <p class="tab_return_paragraph"><b>退货 (顾客自身原因时)</b><br>
                            如若因商品质量问题/配送失误产生退货时，可以100%退款；但因购买者不喜欢或者其他个人问题不能使用时，退货运费将由顾客承担。(国际运费及国内，韩国当地运费)</p>            
                            <li>退货费用 : 国内运费+国际运费+韩国当地运费+关税 </li>                        

                            <p class="tab_return_paragraph"><b>换货</b><br>因配送失误，需要换货的情况下，所有的费用由盼达网来承担。  一般换货，请在收货后的七个工作日内提出申请，并且费用将由买家承担。<br>
                            换货费用 : (国内运费+国际运费+韩国当地运费+关税) X 2 <br>
                            <b>可以换货情况</b></p>
                            <li>同一商品尺寸</li>                        
                        	<li>同一商品颜色</li>
                            <li>顾客喜好变更换货 </li>
                            
                            <p class="tab_return_paragraph"><b>退款</b></p>
                            <li>申请退款从收货后，3日以内通过在线申请完成，但以下情况下退款费用不需要顾客承担。<br>
                            1) 配送时发生商品损坏的情况。<br>
                            2) 配送的商品和订购的不同或有质量问题的情况。<br>
                            以上事由退款，将在收回商品后处理退款。（包括赠品等）</li>
                            <li>国际配送前退货时，韩国当地运费由顾客承担。<br>
                            顾客承担费用：韩国当地费用</li>
                            <li>国际配送后申请退款时国际运费+韩国当地运费由顾客承担。<br>
                            顾客承担费用: 国际运费+韩国当地运费+关税</li>
                            <li>签收商品后申请退款时国际运费，韩国当地运费，国内运费由顾客承担，这将在商品回收后减取费用后，进行退款。<br>
                            顾客承担费用: 国际运费+韩国当地运费+国内运费+关税</li>
                            <li>退款时不可退还手续费，请注意。 </li>    
                            
                            <p class="tab_return_paragraph"><b>断货情况</b></p>
                            <li>若商品断货时，负责人会第一时间通过便条方式通知顾客，并退款至预付款，会员可以在我的账户中查询相关状态。</li>              
                        </ul>
                        
                        <hr>
                        <span class="return_title">售后服务</span>
                        <ul class="detail_tab_return">
                            <p class="tab_return_paragraph"><b>OOZOOBOX郑重承诺：</b><br>
                            自客户收到商品之日起（以签收日期为准），7日内提供退换货服务。<br>
                            请注意：限时特卖商品暂不提供换货，只提供退货服务。</p>
                                                        
							<p class="tab_return_paragraph"><b>特别说明：</b><br>
                            退回商品须未经穿着，商品及包装须和OOZOOBOX出售时一样，商品吊牌及配件齐全。如有发票及赠品，需一同寄回。<br>
                            出于安全和卫生考虑，贴身用品如：内裤、内衣套装（文胸+内裤）、泳装、袜子（包括丝袜、连裤袜、运动袜、打底裤），一经签收，非质量问题不予退换货，请您谅解。<br>
                            <b>以下情况将不提供退换货服务：</b></p>
							<li>任何非OOZOOBOX出售的商品; </li>
                           	<li>已使用的商品（如商品在使用过程中发生质量问题，则按照三包中的相关规定执行）；</li>
                            <li>任何因非正常使用及保管导致损坏的商品（包括但不仅限于：不适合雨天穿着，不适合水洗，碰酸、碱、油等腐蚀性物质，触碰硬物、尖锐物体做不属于/不适合鞋款设计功能的运动、长时间高强度运动、人为破坏或经过不适当修理造成损坏等）；</li>
                           	<li>商品的外包装破损，包裹填充物/品牌包装箱或外包装袋/鞋盒外直接缠胶带，商品附件、说明书、保修单、标签等有缺失。若商品有吊牌，请您不要剪掉或损坏吊牌，吊牌被剪掉或损坏，会直接影响退换服务</li>
                            <li>已开具发票的商品，未将发票退回。</li>
                            <li>购买时有赠品的商品，未将赠品退回。</li>
                            <li>赠品不享受退换货服务（有质量问题除外）。</li>
                            <li>已经标明为残次品或处理品的。</li>
                            <li>出于安全和卫生考虑，贴身用品如:内裤、内衣套装（文胸+内裤）、泳装、袜子（包括丝袜、连裤袜、运动袜、打底裤），一经签收，非质量问题不予退换货。 </li>
                            <li>数码配件类商品原厂包装打开，一次性封贴或胶条破损，产品已使用无质量问题不予退换货。</li>
                            
                            <p class="tab_return_paragraph"><b>办理退换货商品的退回方式：</b></p>
                            <li>客户自行将商品邮寄回物流中心。</li>
                            <li>寄回地址：请您务必按照在线退换货申请中提供的地址寄回，或咨询OOZOOBOX客服。</li>
                            
                            <p class="tab_return_paragraph"><b>关于寄回商品运费的说明：</b><br>
                            如果由于产品本身质量问题造成的退换货，运费由OOZOOBOX承担，最多报销20元运费。在我们接到您退回的商品后，<br>会有专人为您办理。<br>
                            由于款式、颜色、尺码、个人喜好等原因造成的退换货，将商品寄回到OOZOOBOX仓库的运费由客户自行承担，<br>再次发出的运费由OOZOOBOX公司承担。<br>

                            <b>&nbsp;&nbsp;&nbsp;注：</b>
                            </p>
                          	<li>图片及信息仅供参考，不属质量问题。因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，不属于质量问题，一切以实物为准。</li>
                            <li>OOZOOBOX不支持“到付”服务，请不要选择“到付”形式将商品寄回，请您谅解。</li>
                          	<li>商品发生退换货时，订单运费将不予返还，请您谅解。</li>
                        </ul>
                        <br><br><br><br><br>
                    </div>
                    <a href="#">
                        <button id="btnAfter" type="submit">
                            <img alt="상품 설명 보기" src="/images/detail_btn_tab2.png"/>
                        </button>
                    </a>                 
                </div>
                <!--e: #tab5 取消/换货/退货 "교환/환불정책"-->              
                
            </div>
        	<!-- .tab_container -->
        </div> 
        <!--e: 상세보기 제품 정보-->        
    </div>
    <!--e: 상세보기 wrap-->
</div>
<!--e: 상세보기-->



<script>
$(document).ready(function(){
  $("#btnWriteQna").click(function(){
    $("#qna_write_panel").toggle();
  });
});
</script>


<script>
    $(document).ready(
        function()
        { 
		$('.answer').hide();
            $('.question')
                .append(' <span></span>');
            var toggleAnswer = function toggleAnswer(question, showAnswer)
            { 
			var $answer = $(question).next('tr');
                var updateText = function()
                                 {
                                    var text = $answer.is(':visible') ? ' ' : '';
                                    $(question).find('span').html(text);
                                 }
                var method = null;
                if(arguments.length > 1)
                {
					 method = showAnswer === true ? 'show' : 'hide';
                }
                else
                {
                    method = $answer.is(':visible') ? 'hide' : 'show';
                }

                $answer[method]('fast', updateText);
            };
            $('.question').click(function(){ toggleAnswer(this);});
            $('#openClose').click(
                function() 
                { 
                    var showAnswer = $(this).html().toLowerCase().indexOf('open') != -1 ? true : false;
                    $('.question').each(function() { toggleAnswer(this, showAnswer); });
                    $(this).html(showAnswer ? 'Close All' : 'Open All'); 
                    return false;
                } 
            );

        }
     );
</script>

<script>
$(function () {

    $(".detail_tab_content").hide();
    $(".detail_tab_content:first").show();

    $("ul.detail_tabs li").click(function () {
        $("ul.detail_tabs li").removeClass("active").css({"color": "#333", "border-top":"3px solid #fff"});
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css({"color": "#f47a22", "border-top":"3px solid #f47a22"});
        $(".detail_tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });
});
</script>



<?php include_once('./itemlist.php'); // 분류목록 ?>
