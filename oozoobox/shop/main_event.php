<?php
include_once('./_common.php');
if ($_GET['type']=="10" || $_GET['type']=="20" || $_GET['type']=="30" || $_GET['type']=="40" || $_GET['type']=="50" || $_GET['type']=="hit" || $_GET['type']=="hot" || $_GET['type']=="50"){}else{alert('活动结束.');}

$event_img=$_GET[type];

$g5['title'] ='OOZOOBOX活动';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;


if($_GET[type]="hit" || $_GET[type]="hot"){
	$ca_id="";
}else{
	$ca_id=" where ca_id = '{$_GET[type]}'";
}

$num=rand(12,15);
$sqlmain = " select * from g5_shop_item $ca_id order by rand() limit $num";
$resultmain = sql_query($sqlmain);

?>




<div class="Event_bn">
	<img src="/images/event/event_<?=$event_img?>.jpg" />
</div>


<div class="EventGoods">
    <ul>
    <!---------------------------------------------------------------->
	<? 
  for ($i=0; $row_main=sql_fetch_array($resultmain); $i++){ 										
  $sql = " select count(*) as cnt from {$g5['g5_shop_item_use_table']} where it_id = '{$row_main['it_id']}'";
  $row = sql_fetch($sql);
  $content_cnt=$row['cnt'];
  
  ?>       
        <li class="Event_List">
            <div class="EventPic"><img src="http://data.oozoobox.com/data/item/<?=$row_main[it_img1]?>" alt="SK_2"/></div>
            <div class="EventGood_info">
                <span class="price">
                    <span class="original_price">¥ <?php echo number_format($row_main['it_price'],2); ?></span>
                    <del>¥ <?php echo number_format($row_main['it_cust_price'],2); ?></del>
                </span>
                <span class="like"><? echo number_format($row_main[it_8]*1);?></span>
                <span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span>
            </div>
            <span class="Event_go_detail"><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></span>
            <a class="Event_link_url" title="상품자세히보기연결" href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>"></a>
        </li>
  <? } ?>
    <!---------------------------------------------------------------->        
          
    </ul>
</div>



        
<?php  include_once('./_tail.php'); ?>
