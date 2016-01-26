<?php //추천상품 ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title><?php echo $config['cf_title']; ?> - 您的朋友 <?php echo $from_name; ?> 找您付款 购买此商品</title>
</head>

<?php
$cont_st = 'margin:0 auto 20px;width:94%;border:0';
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
                  <?php echo $config['cf_title'];?> - OOZOOBOX 找人付款功能
              </h1>
      
              <p style="<?php echo $cont_st; ?>">您的朋友 <b><?php echo $from_name; ?></b> 找你付款.</p>
      
              <div style="margin:0 0 10px;text-align:center">
                  <a href="<?php echo G5_SHOP_URL.'/item.php?it_id='.$it_id; ?>" target="_blank" style="display:inline-block;margin:0 0 10px"><?php echo $it_mimg; ?></a><br>
                  <?php echo $it_name; ?>
              </div>
      
              <p style="<?php echo $cont_st; ?>">
                  <br>
                  <strong><?php echo $subject; ?></strong>
              </p>
      
              <p style="<?php echo $cont_st; ?>"><?php echo $content; ?></p>
      
              <a href="<?php echo G5_SHOP_URL.'/item.php?it_id='.$it_id; ?>" target="_blank" style="<?php echo $ft_a_st; ?>">进入OOZOOBOX查看商品</a>
      
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
