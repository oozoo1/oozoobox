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




<div class="Event_bn">
	<img src="/images/bn_event_main02.png" />
</div>


<div class="EventGoods">
    <ul>
    <!---------------------------------------------------------------->
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
    <!---------------------------------------------------------------->        
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>
        <li class="Event_List">
            <div class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ 150</span>
                    <del>¥ 183</del>
                </span>
                <span class="like">1,231</span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결"></a>
        </li>        
                                
    </ul>
</div>



        
<?php  include_once('./_tail.php'); ?>
