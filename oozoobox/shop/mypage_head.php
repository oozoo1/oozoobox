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




include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>

		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">顾客的个人情报及订单详情等使用记录可以查询。</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        <? if($_GET[bo_table]=="free" || $_GET[bo_table]=="event"){?>
        <h4 class="Mypage_tit">
        <? if($_GET[sca]){ echo $_GET[sca];}else{echo"获奖列表";}?>
        </h4>
        <? } ?>
        	<!--s: 내 정보 BAR-->
          <? if($_GET[bo_table]=="free" || $_GET[bo_table]=="event" || $_GET[it_id]){?>
          
          <? }else{ ?>
        	<div class="My_info">
          <? } ?>