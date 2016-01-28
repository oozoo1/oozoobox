<?php
include_once('./_common.php');

if (get_session('ss_direct'))
    $tmp_cart_id = get_session('ss_cart_direct');
else
    $tmp_cart_id = get_session('ss_cart_id');

if (get_cart_count($tmp_cart_id) == 0)// 장바구니에 담기
    die("购物车 没有商品 .\n\n请到我的我的购物信息里确认是否已下订单.");

$keep_term = $default['de_cart_keep_term'];
if(!$keep_term)
    $keep_term = 15; // 기본값 15일

if(defined('G5_CART_STOCK_LIMIT'))
    $cart_stock_limit = G5_CART_STOCK_LIMIT;
else
    $cart_stock_limit = 3;

// 기준 시간을 초과한 경우 체크
if($cart_stock_limit > 0) {
    if($cart_stock_limit > $keep_term * 24)
        $cart_stock_limit = $keep_term * 24;

    $stocktime = G5_SERVER_TIME - (3600 * $cart_stock_limit);

    $sql = " select count(*) as cnt
                from {$g5['g5_shop_cart_table']}
                where od_id = '$tmp_cart_id'
                  and ct_status = '쇼핑'
                  and ct_select = '1'
                  and UNIX_TIMESTAMP(ct_select_time) > '$stocktime' ";
    $row = sql_fetch($sql);

    if(!$row['cnt'])
        die("购买信息 超过".$cart_stock_limit."小时 以上 购买信息无法确认.\n\n 请到 我的购物信息确认.");
}

// 재고체크
$sql = " select *
            from {$g5['g5_shop_cart_table']}
            where od_id = '$tmp_cart_id'
              and ct_select = '1'
              and ct_status = '쇼핑' ";
$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++) {
    $ct_qty = $row['ct_qty'];

    if(!$row['io_id'])
        $it_stock_qty = get_it_stock_qty($row['it_id']);
    else
        $it_stock_qty = get_option_stock_qty($row['it_id'], $row['io_id'], $row['io_type']);

    if ($ct_qty > $it_stock_qty)
    {
        $item_option = $row['it_name'];
        if($row['io_id'])
            $item_option .= '('.$row['ct_option'].')';

        die($item_option." 库存数量不足.\n\n现有数量 : " . number_format($it_stock_qty) . " 件");
    }
}

die("");
?>