<?php
include_once('./_common.php');

if (!$is_member)
    die('你不是会员.');

if(!$it_id)
    die('商品信息有误.');

// 상품정보 체크
$sql = " select it_id from {$g5['g5_shop_item_table']} where it_id = '$it_id' ";
$row = sql_fetch($sql);

if(!$row['it_id'])
    die('商品信息不存在.');

$sql = " select wi_id from {$g5['g5_shop_wish_table']}
          where mb_id = '{$member['mb_id']}' and it_id = '$it_id' ";
$row = sql_fetch($sql);

if (!$row['wi_id']) {
    $sql = " insert {$g5['g5_shop_wish_table']}
                set mb_id = '{$member['mb_id']}',
                    it_id = '$it_id',
                    wi_time = '".G5_TIME_YMDHIS."',
                    wi_ip = '$REMOTE_ADDR' ";
    sql_query($sql);

    die('OK');
} else {
    die('已添加到收藏夹.');
}
?>