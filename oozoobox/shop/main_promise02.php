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

<link rel="stylesheet" type="text/css" href="/md/styles.css">
 <!--MD 탭메뉴--->

  <!-- JS -->
  <script type="text/javascript" src="/md/jquery.tabslet.min.js"></script>
  <!-- JS ends -->





      <div class="row">
        <div class="twelve columns">
          <article>
            <h4>MD介绍</h4>

            <div class='tabs tabs_animate'>
              <ul class='horizontal'>
                <li><a class="md_yong" href="#tab-1">金龙喆</a></li>
                <li><a class="md_go" href="#tab-2">高在赫</a></li>
                <li><a class="md_kim" href="#tab-3">金美慧</a></li>
                <li><a class="md_geol" href="#tab-4">许 杰</a></li>
              </ul>
              <div id='tab-1'><span>용 소개</span></div>
              <div id='tab-2'><span>고 소개</span></div>
              <div id='tab-3'><span>킴 소개</span></div>
              <div id='tab-4'><span>걸 소개</span></div>
            </div>
          </article>
        </div>
      </div>



<script>
$('.tabs').tabslet({
  mouseevent: 'click',
  attribute: 'href',
  animation: true
});
</script>

        
<?php  include_once('./_tail.php'); ?>
