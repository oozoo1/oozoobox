<?php
include_once('./_common.php');





$g5['title'] ='MD商品';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>

  <script type="text/javascript" src="/oz_js/jquery.tabslet.min.js"></script> <!--MD 탭메뉴--->

<article>
    <h4 class="md_title">MD介绍</h4>
    
    <div class='md_tabs md_tabs_animate'>
        <ul class='horizontal'>
            <li><a class="md_yong" href="#tab-1">金龙喆</a></li>
            <li><a class="md_go" href="#tab-2">高在赫</a></li>
            <li><a class="md_kim" href="#tab-3">金美慧</a></li>
            <li><a class="md_geol" href="#tab-4">许 杰</a></li>
        </ul>
        <div id="tab-1"><span>용 소개</span></div>
        <div id="tab-2"><span>고 소개</span></div>
        <div id="tab-3"><span>킴 소개</span></div>
        <div id="tab-4"><span>걸 소개</span></div>
    </div>
</article>




<script>
$('.md_tabs').tabslet({
  mouseevent: 'click',
  attribute: 'href',
  animation: true
});
</script>

        
<?php  include_once('./_tail.php'); ?>
