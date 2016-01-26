<?php //고객님께 ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title><?php echo $config['cf_title']; ?> - 订单提示邮件</title>
</head>

<?php
$cont_st = 'margin:0 auto 20px;width:94%;border:0;border-collapse:collapse';
$caption_st = 'padding:0 0 5px;font-weight:bold';
$th_st = 'padding:5px;border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9;background:#f5f6fa;text-align:left';
$td_st = 'padding:5px;border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9';
$empty_st = 'padding:30px;border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9;text-align:center';
$ft_a_st = 'display:block;padding:30px 0;background:#484848;color:#fff;text-align:center;text-decoration:none';
?>

<body>
<table border="0" cellspacing="0" cellpadding="0" align="center" width="630">
  <tr>
    <td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/left_top.png"></td>
    <td height="18" background="http://data.oozoobox.com/images/mail/top_bg.png" style="background-repeat: repeat-x;"></td>
    <td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/right_top.png"></td>
  </tr>
  <tr>
    <td width="21" valign="top" background="http://data.oozoobox.com/images/mail/left_bg.png"></td>
    <td height="600" valign="top">
        <div style="width:600px;border:10px solid #fff;">
            <div style="border:1px solid #dedede">
                <h1 style="margin:0 0 20px;padding:30px 30px 20px;background:#f7f7f7;color:#555;font-size:1.4em">
                    <?php echo $config['cf_title'];?> - 您的订单已确认.
                </h1>
        
                <p style="<?php echo $cont_st; ?>">
                    <strong>订单号码 <?php echo $od_id; ?></strong><br>
                    本邮件 <?php echo G5_TIME_YMDHIS; ?> (<?php echo get_yoil(G5_TIME_YMDHIS); ?>)发送.
                </p>
        
                <table style="<?php echo $cont_st; ?>">
                <caption style="<?php echo $caption_st; ?>"> 订单内容</caption>
                <colgroup>
                    <col style="width:130px">
                    <col>
                </colgroup>
                <tbody>
                <?php for ($i=0; $i<count($list); $i++) { ?>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">商品名称</th>
                    <td style="<?php echo $td_st; ?>"><a href="<?php echo G5_SHOP_URL.'/item.php?it_id='.$list[$i]['it_id']; ?>" target="_blank" style="text-decoration:none"><span style="display:inline-block;vertical-align:middle"><?php echo $list[$i]['it_simg']; ?></span> <?php echo $list[$i]['it_name']; ?></a></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">价格</th>
                    <td style="<?php echo $td_st; ?>"><?=number_format($list[$i]['ct_price'],2)?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">套餐 </th>
                    <td style="<?php echo $td_st; ?>"><?php echo $list[$i]['it_opt']; ?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">小计</th>
                    <td style="<?php echo $td_st; ?>"><?=number_format($list[$i]['stotal_price'],2)?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">积分</th>
                    <td style="<?php echo $td_st; ?>"><? echo $dr_memo = str_replace("점","分",stripslashes(strip_tags($list[$i]['stotal_point'])));?></td>
                </tr>
                <?php } ?>
        
                <?php if ($od_send_cost > 0) { // 배송비가 있다면 ?>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">运费</th>
                    <td style="<?php echo $td_st; ?>"><?php echo display_price($od_send_cost); ?></td>
                </tr>
                <?php } ?>
        
                <?php if ($od_send_cost2 > 0) { // 추가배송비가 있다면 ?>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">附加运费</th>
                    <td style="<?php echo $td_st; ?>"><?php echo display_price($od_send_cost2); ?></td>
                </tr>
                <?php } ?>
        
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">总计</th>
                    <td style="<?php echo $td_st; ?>"><?=number_format($ttotal_price,2)?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">积分总计</th>
                    <td style="<?php echo $td_st; ?>"><?=$ttotal_point ?></td>
                </tr>
                </tbody>
                </table>      
        
                <table style="<?php echo $cont_st; ?>">
                <caption style="<?php echo $caption_st; ?>">收货人信息</caption>
                <colgroup>
                    <col style="width:130px">
                    <col>
                </colgroup>
                <tbody>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">姓名</th>
                    <td style="<?php echo $td_st; ?>"><?php echo $od_b_name; ?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">电话号码</th>
                    <td style="<?php echo $td_st; ?>"><?php echo $od_b_tel; ?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">手机号码</th>
                    <td style="<?php echo $td_st; ?>"><?php echo $od_b_hp; ?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">地址</th>
                    <td style="<?php echo $td_st; ?>"><?php echo sprintf("(%s%s)", $od_b_zip1, $od_b_zip2).' '.print_address($od_b_addr1, $od_b_addr2, $od_b_addr3, $od_b_addr_jibeon); ?></td>
                </tr>
                <tr>
                    <th scope="row" style="<?php echo $th_st; ?>">留言</th>
                    <td style="<?php echo $td_st; ?>"><?php echo $od_memo; ?></td>
                </tr>
                </tbody>
                </table>
        
                <p style="<?php echo $cont_st; ?>">信息如有修改 请与 <b><?php echo  $default['de_admin_company_tel']; ?></b>取得联系.</p>
        
                <a href="<?php echo G5_SHOP_URL.'/orderinquiry.php'; ?>" target="_blank" style="<?php echo $ft_a_st; ?>">确认订单</a>
        
            </div>
        </div>
    </td>
    <td width="21" valign="top" background="http://data.oozoobox.com/images/mail/right_bg.png"></td>
  </tr>
  <tr>
    <td width="21" height="18"><img src="http://data.oozoobox.com/images/mail/left_bottom.png"></td>
    <td height="18" background="http://data.oozoobox.com/images/mail/bottom_bg.png"></td>
    <td height="18"><img src="http://data.oozoobox.com/images/mail/right_bottom.png"></td>
  </tr>
</table>
</body>
</html>
