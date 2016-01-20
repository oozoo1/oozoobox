<?php
//==============================================================================
// 쇼핑몰 배너 시작
//==============================================================================


$sqlb1 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a1' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb1 = sql_query($sqlb1);
$baner1=sql_fetch_array($resultb1);

$sqlb2 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a2' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb2 = sql_query($sqlb2);
$baner2=sql_fetch_array($resultb2);

$sqlb3 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a3' order by bn_order, bn_id ASC LIMIT 0 , 4 ";
$resultb3 = sql_query($sqlb3);

$sqlb4 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a4' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb4 = sql_query($sqlb4);
$baner4=sql_fetch_array($resultb4);

$sqlb5 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a5' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb5 = sql_query($sqlb5);
$baner5=sql_fetch_array($resultb5);

$sqlb6 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a6' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb6 = sql_query($sqlb6);
$baner6=sql_fetch_array($resultb6);

$sqlb7 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a7' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb7 = sql_query($sqlb7);
$baner7=sql_fetch_array($resultb7);

$sqlb8 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a8' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb8 = sql_query($sqlb8);
$baner8=sql_fetch_array($resultb8);

$sqlb9 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a9' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb9 = sql_query($sqlb9);
$baner9=sql_fetch_array($resultb9);

$sqlb10 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a10' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb10 = sql_query($sqlb10);
$baner10=sql_fetch_array($resultb10);

$sqlb11 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a11' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb11 = sql_query($sqlb11);
$baner11=sql_fetch_array($resultb11);

$sqlb12 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a12' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb12 = sql_query($sqlb12);
$baner12=sql_fetch_array($resultb12);

$sqlb13 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a13' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb13 = sql_query($sqlb13);
$baner13=sql_fetch_array($resultb13);

$sqlb14 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a14' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb14 = sql_query($sqlb14);
$baner14=sql_fetch_array($resultb14);

$sqlb15 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a15' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb15 = sql_query($sqlb15);
$baner15=sql_fetch_array($resultb15);

$sqlb16 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a16' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb16 = sql_query($sqlb16);
$baner16=sql_fetch_array($resultb16);

$sqlb17 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a17' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb17 = sql_query($sqlb17);
$baner17=sql_fetch_array($resultb17);

$sqlb18 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a18' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb18 = sql_query($sqlb18);
$baner18=sql_fetch_array($resultb18);

$sqlb19 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a19' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb19 = sql_query($sqlb19);
$baner19=sql_fetch_array($resultb19);

$sqlb20 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a20' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb20 = sql_query($sqlb20);
$baner20=sql_fetch_array($resultb20);

$sqlb21 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a21' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb21 = sql_query($sqlb21);
$baner21=sql_fetch_array($resultb21);

$sqlb22 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a22' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb22 = sql_query($sqlb22);
$baner22=sql_fetch_array($resultb22);

$sqlb23 = " select * from {$g5['g5_shop_banner_table']} where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = 'a23' order by bn_order, bn_id ASC LIMIT 0 , 1 ";
$resultb23 = sql_query($sqlb23);
$baner23=sql_fetch_array($resultb23);

//==============================================================================

// 쇼핑몰 배너 모음 끝
//==============================================================================
// 쇼핑몰 메인출력
$sqlmain = " select * from g5_shop_item where it_10 = '1' ORDER BY `g5_shop_item`.`it_order` ASC LIMIT 0 , 10";
$resultmain = sql_query($sqlmain);

?>