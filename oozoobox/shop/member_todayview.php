<?php
include_once('./_common.php');

// 쿠폰
$cp_count = 0;
$sql = " select cp_id
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '全部会员' )
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



$g5['title'] = get_text($member['mb_name']).'今天浏览的足迹';
include_once('./_head.php');

?>
<!----------------------------------添加收货地址---开始------------------------------------------------------------------------------->


		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            我的足迹
            </h4>
            <div class="text_box">
            	<p>
                	자주 사용하시는 배송지를 주소록에 등록해두시면 보다 편리하게 이용할 수 있습니다.<br>
                    최대 20개까지 등록하실 수 있습니다.
                </p>
            </div>
<?php
$tv_idx = get_session("ss_tv_idx");

$tv_div['top'] = 0;
$tv_div['img_width'] = 176;
$tv_div['img_height'] = 176;
$tv_div['img_length'] = 100; // 한번에 보여줄 이미지 수

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
?>
<style>
.imgline{ float:left; margin:5px; text-align:center;}
.txtline{ line-height:40px;}
</style>
<!-- 오늘 본 상품 시작 { -->
        <?php if ($tv_idx) { // 오늘 본 상품이 1개라도 있을 때 ?>
        <?php
        $tv_tot_count = 0;
        $k = 0;
        for ($i=1;$i<=$tv_idx;$i++)
        {
            $tv_it_idx = $tv_idx - ($i - 1);
            $tv_it_id = get_session("ss_tv[$tv_it_idx]");

            $rowx = sql_fetch(" select it_id, it_name, it_price from {$g5['g5_shop_item_table']} where it_id = '$tv_it_id' ");
            if(!$rowx['it_id'])
                continue;

            if ($tv_tot_count % $tv_div['img_length'] == 0) $k++;

            $it_name = get_text($rowx['it_name']);
            $img = get_it_image($tv_it_id, $tv_div['img_width'], $tv_div['img_height'], $tv_it_id, '', $it_name);

            if ($tv_tot_count == 0) echo '<ul id="stv_ul">'.PHP_EOL;
            echo '<div class="imgline">'.PHP_EOL;
            echo $img;
            echo '<br>';
			echo '<span class="txtline">';
            echo cut_str($it_name, 10, '').PHP_EOL;
			echo '</span>';
			echo '<br>';
			echo '<span class="txtline">';
            echo $rowx[it_price];
			echo ' 元';
			echo '</span>';
            echo '</div>'.PHP_EOL;

            $tv_tot_count++;
        }
        if ($tv_tot_count > 0) echo '</ul>'.PHP_EOL;
        ?>

        

        <?php } else { // 오늘 본 상품이 없을 때 ?>

        <p>없음</p>

        <?php } ?>

<!-- } 오늘 본 상품 끝 -->
        </div>
        <!--e: RIGHT CONTENTS-->
<?php  include_once('./_tail.php'); ?>
