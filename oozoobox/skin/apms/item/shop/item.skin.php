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

	$thumb = get_it_thumbnail($it['it_img'.$i], 60, 60);

	if($thumb) {
		$org_url = G5_DATA_URL.'/item/'.$it['it_img'.$i];
		$img = apms_thumbnail($org_url, 600, 600, false, true);
		$thumb_url = ($img['src']) ? $img['src'] : $org_url;
		if($j == 0) {
			$item_image = $thumb_url; // 큰이미지
			$item_image_href = G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;ca_id='.$ca_id.'&amp;no='.$i; // 큰이미지 주소
		}
		$thumbnails[$j] = '<a href="'.G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;ca_id='.$ca_id.'&amp;no='.$i.'" ref="'.$thumb_url.'" target="_blank" class="thumb_item_image popup_item_image">'.$thumb.'<span class="sound_only"> '.$i.'번째 이미지 새창</span></a>';
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
                	<img src="/images/detail_good_slide_big_01.png" alt="슬라이드 큰 이미지"/>
                </div>
                <ul class="detail_good_slide_small">
                	<li><img src="/images/detail_good_slide_small_01.png" alt="슬라이드 작은 이미지"/></li>
                    <li><img src="/images/detail_good_slide_small_02.png" alt="슬라이드 작은 이미지"/></li>
                    <li><img src="/images/detail_good_slide_small_03.png" alt="슬라이드 작은 이미지"/></li>
                    <li><img src="/images/detail_good_slide_small_04.png" alt="슬라이드 작은 이미지"/></li>
                    <li class="last"><img src="/images/detail_good_slide_small_05.png" alt="슬라이드 작은 이미지"/></li>
                </ul>
            </div>
            <!--e: 제품 사진 보기-->

            <!--s: 제품 가격 정보-->
            <div class="detail_good_info">
                <h3>Plum Organics 菠菜苹果甘蓝口味磨牙饼干 84克</h3>
                <table summary="해당상품에 대한 정보 및 옵션선택 영역입니다. 원산지, 판매국가, 배송구분, 스크랩, 추가정보 항목과 해당 상품에 대한 옵션선택 및 가격정보 바로구매, 장바구니 담기 위시리스트 등록 기능이 있습니다." class="good_info_satisfy">
                    <colgroup>
                        <col style="width:65px;">
                        <col>
                    </colgroup>
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
                            <th scope="row">
                            	<label for="option-select">选择</label>
                            </th>
                            <td>
                                <div class="position-relative">
                                    <select title="옵션선택" id="btnChoiceOption">
                                        <option value="01" selected="selected">01시</option>
                                        <option value="02">02시</option>
                                        <option value="03">03시</option>
                                        <option value="04">04시</option>
                                        <option value="05">05시</option>
                                        <option value="06">06시</option>
                                        <option value="07">07시</option>
                                        <option value="08">08시</option>
                                        <option value="09">09시</option>
                                        <option value="10">10시</option>
                                        <option value="11">11시</option>
                                        <option value="12">12시</option>
                                        <option value="13">13시</option>
                                    </select>                       
                                </div>
                                <p class="detail_total_price">
                                    <div class="detail_total_price_info">
                                        <span class="detail_total">选择商品 合算 :</span> 
                                        <span class="item_total_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer">59</span>
                                            <span class="price_decimal">.9</span>
                                        </span> 
                                    </div>                                  
                                </p>
                                <div class="choice-control">
                                    <button id="btnBuyNow" type="submit">
                                    <img alt="바로구매" src="/images/detail_btn_01.png"/>
                                    </button>
                                    <button id="btnAddToCart" type="button">
                                    <img alt="장바구니 담기" src="/images/detail_btn_02.png"/>
                                    </button>
                                    <button id="btnAddToWishList" type="button">
                                    <img alt="위시 리스트" src="/images/detail_btn_03.png"/>
                                    </button>
                                    <button id="btnAddToSend" type="button">
                                    <img alt="조르기" src="/images/detail_btn_04.png"/>
                                    </button>                                       
                                </div>
                                <div style="padding-left: 3px;"><br>
                                    <a href="#">
                                    	<img alt="이 업체상품 모두보기" src=""/>
                                    </a>          
                                </div>
                            </td>
                        </tr>
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
                <li rel="detail_tab5">取消/换货/退货</li>
            </ul>
                        
            <div class="detail_tab_container">
            	<!--s: 商品详情(상품상세보기) -->
                <div id="detail_tab1" class="detail_tab_content">
					<div class="tab_content_warp">
                        <h4 class="description">商品详情  <span class="strap">Description</span></h4>
                        <img src="/images/detail_01_01.png" alt="상품소개01"/>
                        <img src="/images/detail_01_02.png" alt="상품소개02"/>
                        <img src="/images/detail_01_03.png" alt="상품소개03"/>
                        <img src="/images/detail_01_04.png" alt="상품소개04"/>
                    </div>
                    <button id="btnAfter" type="submit">
                    	<img alt="후기보러가기" src="/images/detail_btn_tab1.png"/>
                    </button>
                </div>
                <!--e: 商品详情(상품상세보기) -->
                <div id="detail_tab2" class="detail_tab_content">
                    
                    <a id='openClose' href='#'>Open All</a>                    
                    
                    <div class='question'>Question 1</div>
                    <div class='answer'>Answer 1</div>
                    
                    <div class='question'>Question 2</div>
                    <div class='answer'>Answer 2</div>
                    
                    <div class='question'>Question 3</div>
                    <div class='answer'>Answer 3</div>

                </div>
                <!-- #tab2 -->
                <div id="detail_tab3" class="detail_tab_content">
                	3333Halo: Reach is the culmination of the superlative combat, sensational multiplayer, and seamless online integration that are the hallmarks of this superb series.
                </div>
                <!-- #tab3 -->
                <div id="detail_tab4" class="detail_tab_content">탭4</div>
                <!-- #tab4 -->
                <div id="detail_tab5" class="detail_tab_content">탭5</div>
                <!-- #tab5 -->                
                
            </div>
        	<!-- .tab_container -->
        </div> 
        <!--e: 상세보기 제품 정보-->        
    </div>
    <!--e: 상세보기 wrap-->
</div>
<!--e: 상세보기-->




<script>
    $(document).ready(
        function()
        {
            //Hide all the answers on page load.
            $('.answer').hide();

            //For all questions, add 'open'/'close' text.
            //You can replace it with an image if you like. 
            //This way, you don't need to specify img tag in your HTML for each question.
            $('.question')
                .append(' <span>[ open ]</span>');


            //Now there are two ways to toggle the visibility of answer.
            //Either click on the question OR click on Open All / Close All link.
            //To use the same code for both instances, we will create
            //a function which will take the 'question' div and toggle the answer for it.
            //Advantage of this approach is that the code to toggle the answer is in
            //one place.

            //By default, this function will try to toggle the status of the answer
            //i.e. if it's visible, hide it otherwise show it.
            //This function will take a second argument called 'showAnswer'.
            //If this argument is passed, it overrides the toggle behavior.
            //If 'showAnswer' is true, answer is shown.
            //If it's false, answer is hidden.
            //This second parameter will be used by the 'openAll', 'closeAll' links.
            var toggleAnswer = function toggleAnswer(question, showAnswer)
            {
                //The way I have structured the HTML, answer DIV is right after 
                //question DIV.
                var $answer = $(question).next('div');

                //Animation callback, after the animation is done, we want to 
                //switch the 'text' to display what could the user do with the question.
                //Once again, you can change this code to show open/close image.
                var updateText = function()
                                 {
                                    var text = $answer.is(':visible') ? ' [close] ' : ' [open] ';
                                    $(question).find('span').html(text);
                                 }

                var method = null;

                if(arguments.length > 1)
                {
                    //If the function was called with two arguments, use the second
                    //argument to decide whether to show or hide.
                    method = showAnswer === true ? 'show' : 'hide';
                }
                else
                {
                    //Second argument was not passed, simply toggle the answer.
                    method = $answer.is(':visible') ? 'hide' : 'show';
                }

                $answer[method]('fast', updateText);
            };

            //On each question click, toggle the answer. 
            //If you have noticed, I didn't enclose both Q&A inside one DIV.
            //The way you have done if user clicks on the answer, answer will collapse.
            //This may not be desirable as user may want to copy the answer
            //and he won't be able to.
            $('.question').click(function(){ toggleAnswer(this);});

            //We will reuse the same toggleAnswer method in openAll, closeAll 
            //handling. This way, if you want to change behavior of how the question/answers
            //are toggled, you can do it in one place.
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
