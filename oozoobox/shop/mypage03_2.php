<?php
include_once('./_common.php');

$g5['title'] = '我的评论管理';
include_once('./_head.php');

$sql = " select count(*) as cnt from shop_item_use_table where mb_id = '$member[mb_id]'";
$resultmain = sql_query($sql);
$row = sql_fetch($sql);
$content_cnt=$row['cnt'];
?>
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">顾客的个人情报及订单详情等使用记录可以查询。</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            我的评论管理
            </h4> <?=$content_cont?>(条评论)
            
 
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
