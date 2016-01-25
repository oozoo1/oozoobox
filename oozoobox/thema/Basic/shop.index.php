<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 


// 데모 및 관리자 미리보기
//if($is_admin || $is_demo) {
//	$at_set['mfile'] = ($pvm) ? $pvm : $at_set['mfile'];
//}
//
//$main_file = THEMA_PATH.'/main/'.$at_set['mfile'].'.php';
//
//if(file_exists($main_file)) {
//	include_once($main_file);
//} else {
//	echo '<div class="text-muted text-center" style="padding:300px 0px;">Switcher에서 메인을 선택해 주세요.</div>';
//}

$sql = "SELECT * FROM g5_shop_category WHERE ca_id = '10' or ca_id = '20'  or ca_id = '30'  or ca_id = '40' or ca_id = '50'";
$result = sql_query($sql);
?>

<!------s: 쇼핑몰 페이지--------><!--SW: main 전체를 감싸는 div-->
<div id="oz_mallpage2">
	<!--s: CONTENT-->
	<div id="oz_content">
<?php if($_SERVER['PHP_SELF']=="/index.php" || $_SERVER['PHP_SELF']=="/write_html.php" || $_SERVER['PHP_SELF']=="/shop/index.php"){?>    	
        <!--s: MAIN 글로벌메뉴&MAIN 배너 슬라이드-->
        <div class="category-con">
            <div class="category-inner-con">
                <!--s: MAIN 글로벌메뉴-->
                <div id="oz_main_nav">
                
                    <ul class="tit">
                    <?php $a=1; for ($k=0; $row=sql_fetch_array($result); $k++){?>
                        <li class="mod_cate">
                            <a href="/shop/list.php?ca_id=<?=$row[ca_id]?>" class="main_global_list"><h2><i class="oz_main_glo_ico"><img src="/images/glo_icon_0<?=$a++?>.png" alt="给宝宝最好的 icon"/></i><span><?=$row[ca_name]?></span></h2></a><!--"내 아이에게 주고 싶은 가장 좋은 것"-->
                            <div class="mod_subcate">
                                <div class="mod_subcate_main">
                                <?php 
                                $category_sql = "SELECT * FROM g5_shop_category WHERE ca_order = '$row[ca_order]' and ca_id !='10' and ca_id !='20' and ca_id !='30' and ca_id !='40' and ca_id !='50'";
                                $category = sql_query($category_sql);
                                for ($i=0; $row_category=sql_fetch_array($category); $i++){
                                ?>
                                    <dl>
                                        <dt><a href="/shop/list.php?ca_id=<?=$row_category[ca_id]?>"><?=$row_category[ca_name]?></a></dt><!--"기저귀"-->
                                        <!--<dd>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴</a>
                                            <i class="mod_subcate_line"></i>
                                            <a href="http://sc.admin5.com/">로컬하위메뉴>하위메뉴</a>
                                        </dd>--><!--로컬 하위 메뉴 (추후 추가시 *css 수정 요)-->
                                    </dl>
                                 <?php } ?>
                                </div>
                                <div class="mod_subcate_side">
                                    <div class="mod_subcate_side_hd"></div>
                                    <? if($k=="0"){?>
                                    <a class="mod_subcate_gg"  href="/shop/bannerhit.php?bn_id=<?=$baner4['bn_id']?>&url=<?=urlencode($baner1['bn_url'])?>" <? if($baner4[bn_new_win]=="1"){?>target="_blank"<? } ?>><img src="<? if($baner4[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner4[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/></a>
                                    <? } ?>
                                    <? if($k=="1"){?>
                                    <a class="mod_subcate_gg"  href="/shop/bannerhit.php?bn_id=<?=$baner5['bn_id']?>&url=<?=urlencode($baner1['bn_url'])?>" <? if($baner5[bn_new_win]=="1"){?>target="_blank"<? } ?>><img src="<? if($baner5[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner5[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/></a>
                                    <? } ?>
                                    <? if($k=="2"){?>
                                    <a class="mod_subcate_gg"  href="/shop/bannerhit.php?bn_id=<?=$baner6['bn_id']?>&url=<?=urlencode($baner1['bn_url'])?>" <? if($baner6[bn_new_win]=="1"){?>target="_blank"<? } ?>><img src="<? if($baner6[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner6[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/></a>
                                    <? } ?>
                                    <? if($k=="3"){?>
                                    <a class="mod_subcate_gg"  href="/shop/bannerhit.php?bn_id=<?=$baner7['bn_id']?>&url=<?=urlencode($baner1['bn_url'])?>" <? if($baner7[bn_new_win]=="1"){?>target="_blank"<? } ?>><img src="<? if($baner7[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner7[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/></a>
                                    <? } ?>
                                    <? if($k=="4"){?>
                                    <a class="mod_subcate_gg"  href="/shop/bannerhit.php?bn_id=<?=$baner8['bn_id']?>&url=<?=urlencode($baner1['bn_url'])?>" <? if($baner8[bn_new_win]=="1"){?>target="_blank"<? } ?>><img src="<? if($baner8[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner8[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/></a>
                                    <? } ?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="mod_cate2">
                    </div> 
                </div> 
            </div>   
            <!--e: MAIN 글로벌메뉴-->
            
            <!--s: MAIN 배너 슬라이드-->
           <div class="oz_main_bn">
                <div id="slides">                
                <? for ($i=0; $baner3=sql_fetch_array($resultb3); $i++){ ?>  
                  <a href="/shop/bannerhit.php?bn_id=<?=$baner3['bn_id']?>&url=<?=urlencode($baner3['bn_url'])?>" <? if($baner3[bn_new_win]=="1"){?>target="_blank"<? } ?> style="background:<?=$baner3[bn_bg_color]?>;">
                      <div class="main_bn_con">
                          <div class="main_bn_con2">                               
                               <? if($baner3[bn_img2]){?>
                               <b class="text_bn" style="background: url('<? if($baner3[bn_img2]){?>http://data.oozoobox.com/data/banner/<?=$baner3[bn_img2]?><? }else{ ?>/images/ad_no.jpg<? } ?>') no-repeat left; ">
                               </b>
                               <? } ?>
                               <b class="back_bn" style="background: url('<? if($baner3[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner3[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>') no-repeat left;">
                               </b>   
                          </div>
                      </div>
                  </a>
                <? } ?>  
                </div>
            </div>
            <!--e: MAIN 배너 슬라이드-->
            
            <!--s: MAIN 슬라이드 상단 작은 배너-->
            <div class="small_banner_con">
<?php /*?>            <?php for ($i=0; $row3=sql_fetch_array($baner0_1); $i++){?>
            	<a class="small_banner" href="<?=$row3[bn_url]?>">
                	<img width="170" height="440" alt="" src="http://data.oozoobox.com/data/banner/<?=$row3[bn_id]?>"/>
                    <div class="small_banner_btn">
                    	<span class="btn_object">지금투표하러가기</span>
                    </div>
                </a>
            <?php } ?><?php */?> <!--SW: pro php 다시 한번 봐주세요. ^^-->
            	<a class="small_banner" href="/shop/bannerhit.php?bn_id=<?=$baner9['bn_id']?>&url=<?=urlencode($baner9['bn_url'])?>" <? if($baner9[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                	<img width="170" height="440" alt="" src="<? if($baner9[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner9[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                    <div class="small_banner_btn">
                    	<span class="btn_object">现在就去投票吧!</span>
                    </div>
                </a>           
            </div>
            <!--e: MAIN 슬라이드 상단 작은 배너-->
    	</div>
        <!--e: MAIN 글로벌메뉴&MAIN 배너 슬라이드-->
        <? } ?>
        <!--s: MAIN 네가지 약속--> 
        <div class="interact-con">
            <div class="module-body">
                <a class="interact-item" href="/shop/bannerhit.php?bn_id=<?=$baner10['bn_id']?>&url=<?=urlencode($baner10['bn_url'])?>" <? if($baner10[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                    <img src="http://data.oozoobox.com/data/banner/<?=$baner10[bn_img1]?>" onmouseover="this.src='http://data.oozoobox.com/data/banner/<?=$baner10[bn_img2]?>'" onmouseout="this.src='http://data.oozoobox.com/data/banner/<?=$baner10[bn_img1]?>'" alt=""/> 
                </a>
                <a class="interact-item" href="/shop/bannerhit.php?bn_id=<?=$baner11['bn_id']?>&url=<?=urlencode($baner11['bn_url'])?>" <? if($baner11[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                    <img src="http://data.oozoobox.com/data/banner/<?=$baner11[bn_img1]?>" onmouseover="this.src='http://data.oozoobox.com/data/banner/<?=$baner11[bn_img2]?>'" onmouseout="this.src='http://data.oozoobox.com/data/banner/<?=$baner11[bn_img1]?>'" alt=""/> 
                </a>
                <a class="interact-item" href="/shop/bannerhit.php?bn_id=<?=$baner12['bn_id']?>&url=<?=urlencode($baner12['bn_url'])?>" <? if($baner12[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                    <img src="http://data.oozoobox.com/data/banner/<?=$baner12[bn_img1]?>" onmouseover="this.src='http://data.oozoobox.com/data/banner/<?=$baner12[bn_img2]?>'" onmouseout="this.src='http://data.oozoobox.com/data/banner/<?=$baner12[bn_img1]?>'" alt=""/> 
                </a>
                <a class="interact-item" href="/shop/bannerhit.php?bn_id=<?=$baner13['bn_id']?>&url=<?=urlencode($baner13['bn_url'])?>" <? if($baner13[bn_new_win]=="1"){?>target="_blank"<? } ?> style="margin-right:0">
                    <img src="http://data.oozoobox.com/data/banner/<?=$baner13[bn_img1]?>" onmouseover="this.src='http://data.oozoobox.com/data/banner/<?=$baner13[bn_img2]?>'" onmouseout="this.src='http://data.oozoobox.com/data/banner/<?=$baner13[bn_img1]?>'" alt=""/> 
                </a>
            </div>
    	</div>
        <!--e: MAIN 네가지 약속--> 
        
        <!--s: MAIN 特色市场 특별매장-->
        <div class="oz_channel_con">
        	<div class="module_title">
            	特色市场
                <b class="title_deco">
                </b>
            </div>
            <div class="module_body">
            	<a class="big_chn" href="/shop/bannerhit.php?bn_id=<?=$baner14['bn_id']?>&url=<?=urlencode($baner14['bn_url'])?>" <? if($baner14[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                	<img src="<? if($baner14[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner14[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                </a>
                <div class="small_chn_con">
                	<a class="small_chn" href="/shop/bannerhit.php?bn_id=<?=$baner15['bn_id']?>&url=<?=urlencode($baner15['bn_url'])?>" <? if($baner15[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                    	<div class="title_chn">
                        	<h3 class="title"><?=$baner15[bn_alt]?></h3>
                            <h4 class="info"><?=$baner15[bn_memo]?></h4>
                        </div>
                        <img class="chn_pic_right" src="<? if($baner15[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner15[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                    </a>
                    <s class="seprate"></s> 
                    <a class="small_chn" href="/shop/bannerhit.php?bn_id=<?=$baner16['bn_id']?>&url=<?=urlencode($baner16['bn_url'])?>" <? if($baner16[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                    	<div class="title_chn">
                        	<h3 class="title"><?=$baner16[bn_alt]?></h3>
                            <h4 class="info"><?=$baner16[bn_memo]?></h4>
                        </div>
                        <img class="chn_pic_right" src="<? if($baner16[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner16[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                    </a>
                    <s class="seprate hidden_990"></s> 
                    <a class="small_chn hidden_990 last_chn" href="/shop/bannerhit.php?bn_id=<?=$baner17['bn_id']?>&url=<?=urlencode($baner17['bn_url'])?>" <? if($baner17[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                    	<div class="title_chn">
                        	<h3 class="title"><?=$baner17[bn_alt]?></h3>
                            <h4 class="info"><?=$baner17[bn_memo]?></h4>
                        </div>
                        <img class="chn_pic_right" src="<? if($baner17[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner17[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                    </a>
                    <a class="small_chn under_chn" href="/shop/bannerhit.php?bn_id=<?=$baner18['bn_id']?>&url=<?=urlencode($baner18['bn_url'])?>" <? if($baner18[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                        <img class="chn_pic_left" src="<? if($baner18[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner18[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                        <div class="title_chn_right">
                            <h3 class="title_right"><?=$baner18[bn_alt]?></h3>
                            <h4 class="info_right"><?=$baner18[bn_memo]?></h4>
                        </div>
                    </a>
                    <s class="seprate "></s> 
                    <a class="small_chn under_chn" href="/shop/bannerhit.php?bn_id=<?=$baner19['bn_id']?>&url=<?=urlencode($baner19['bn_url'])?>" <? if($baner19[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                        <img class="chn_pic_left" src="<? if($baner19[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner19[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                        <div class="title_chn_right">
                            <h3 class="title_right"><?=$baner19[bn_alt]?></h3>
                            <h4 class="info_right"><?=$baner19[bn_memo]?></h4>
                        </div>                      
                    </a>
                    <s class="seprate hidden_990"></s> 
                    <a class="small_chn hidden_990 under_chn" href="/shop/bannerhit.php?bn_id=<?=$baner20['bn_id']?>&url=<?=urlencode($baner20['bn_url'])?>" <? if($baner20[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                        <img class="chn_pic_left" src="<? if($baner20[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner20[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>"/>
                        <div class="title_chn_right">
                            <h3 class="title_right"><?=$baner20[bn_alt]?></h3>
                            <h4 class="info_right"><?=$baner20[bn_memo]?></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--e: MAIN 특별매장-->

        <!--s: FULL 광고 배너-->
		<div class="oz_full_banner" style="margin-top:30px;">
        	<ins id="oz_full_banner_outer" style="margin:0; padding:0; width:1620px; height:90px; display:inline-block;">
            	<a href="/shop/bannerhit.php?bn_id=<?=$baner21['bn_id']?>&url=<?=urlencode($baner21['bn_url'])?>" <? if($baner21[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                	<img width="1620" height="90" src="<? if($baner21[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner21[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>" border="0"/>
                </a>
            </ins>
        </div>
        <!--e: FULL 광고 배너-->
        
        <!--s: MAIN热门商品 인기상품-->
        <div class="oz_wonderful_con">
        	<div class="wonderful_title">
            	热门商品 
                <b class="title_deco">
                </b>
            </div>
            <div class="module_content">
 <!-------------------- 허걸 : s: UL 반복2번---------------- ------->
            	<ul class="wonderful_line">
 <!-------------------- 허걸:  s: 반복4번  마지막 하나만 다름------------->     
                    <? 
										for ($i=0; $row_main=sql_fetch_array($resultmain); $i++){ 										
										$sql = " select count(*) as cnt from {$g5['g5_shop_item_use_table']} where it_id = '{$row_main['it_id']}'";
										$row = sql_fetch($sql);
										$content_cnt=$row['cnt'];
										
										?>         
                  	<li class="<? if($i=="4" || $i=="9"){?>wonderful_item hidden_1366<? }else{ ?>wonderful_item<? } ?>">
                    	<div class="<? if($i=="4" || $i=="9"){?>card_item last_1920<? }else{ ?>card_item<? } ?>" href="#">
                        	<a href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>">
                                <span class="item_pic">
                                    <img width="100%" src="http://data.oozoobox.com/data/item/<?=$row_main[it_img1]?>"/>
                                </span>
                            </a>
                            <span class="wonderful_wish">
                                <a href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>">
                                    <span class="ico_wonderful_wish">	
                                    	<em><? echo number_format($row_main[it_8]);?></em>
                                    </span>
                                </a>
                            </span>                            
                            <span class="item_info">
                            	<a href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>">
                                    <span class="item_desc">
                                        <em title="CHANDO/自然堂【双11】雪润皙白水乳套装爽肤水乳液面膜 美白补水" class="item_name"><?=$row_main[it_name]?></em>
                                    </span>
                                </a>
                                <span class="item_detail">
                                	<a href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>">
                                        <span class="item_price">
                                            <i class="price_rmb">¥</i>
                                            <span class="price_integer"><?php echo number_format($row_main['it_price'],2); ?></span>
                                        </span>
                                    </a>
                                    <span class="item_tag">
                                    	<span class="wonderful_cart">
                                        	<a href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>">
                                            	<img width="100%" src="/images/wonderful_cart.png" onmouseover="this.src='/images/wonderful_cart_o.png'" onmouseout="this.src='/images/wonderful_cart.png'"/>
                                            </a>
                                        </span>
                                        <span class="wonderful_after">
                                        	<a href="/shop/item.php?it_id=<?=$row_main[it_id]?>&ca_id=<?=$row_main[ca_id]?>#detail_container">
                                        		<img width="100%" src="/images/wonderful_after.png" onmouseover="this.src='/images//wonderful_after_o.png'" onmouseout="this.src='/images//wonderful_after.png'"/>
                                            </a>
                                            <em><?=$content_cnt?></em>
                                        </span>
                                    </span>
                                </span>
                            </span>
                       </div>
                    </li> 
                    <? } ?>
<!--------------------------허걸 s: 마지막 하나------------------------------->        
                </ul>
 <!----------------------허걸: UL 반복 삭제해도 됨-------------------------->               
            </div>
        </div>
        <!--e: MAIN热门商品 인기상품-->
        
         <!--s: FULL 광고 배너 02-->
		<div class="oz_full_banner" style="margin-top:10px;">
        	<ins id="oz_full_banner_outer" style="margin:0; padding:0; width:1620px; height:90px; display:inline-block;">
            	<a href="/shop/bannerhit.php?bn_id=<?=$baner22['bn_id']?>&url=<?=urlencode($baner22['bn_url'])?>" <? if($baner22[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                	<img width="1620" height="90" src="<? if($baner22[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner22[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>" border="0"/>
                </a>
            </ins>
        </div>
        <!--e: FULL 광고 배너 02-->       
        
    	<!--s: MD 추천 상품-->
        <div class="oz_market_con">
        	<div class="market_title">
            	采购员推存
                <b class="title_deco">
                </b>
            </div>
            <div class="module_body">
            	<div class="market_line">
              <?

						// 쇼핑몰 메인출력
						$sqlmd = " select * from g5_write_mditem ORDER BY `g5_write_mditem`.`wr_datetime` DESC LIMIT 0 , 8";
						$resultmd = sql_query($sqlmd);
								for ($i=0; $row_md=sql_fetch_array($resultmd); $i++){ 										
								$sql = " select count(*) as cnt from {$g5['g5_shop_item_use_table']} where it_id = '{$row_md['wr_10']}'";
								$row = sql_fetch($sql);
								$content_cnt=$row['cnt'];
								
								$sqlfile="select * from g5_shop_banner where bo_table='mditem' and wr_id = '{$row_md['wr_id']}' and bf_no = '0'";
								$sqlimg=sql_query($sqlfile);
								$rowimg=sql_fetch_array($sqlimg);
								
                $dr_memo = cut_str($row_md[wr_content],95);
							?>
                	<div class="<? if($i=="3" || $i=="7"){?>market_item last_990<? }else{ ?>market_item<? } ?>">
                    	<a class="main_pic" href="/shop/item.php?it_id=<?=$row_md[wr_10]?>">
                        	<? if($rowimg[bf_file]){?><img src="http://data.oozoobox.com/data/file/mditem/<?=$rowimg[bf_file]?>" alt="<?php echo $img['alt'];?>"><? }else{ ?><img src="/images/noimg.png"><? } ?>
                        </a>
                        <a class="market_info" href="/shop/item.php?it_id=<?=$row_md[wr_10]?>">
                            <?=$dr_memo?>
                        </a>
                        <a class="market_good" href="/shop/item.php?it_id=<?=$row_md[wr_10]?>">
                                <span class="market_good_no"><?=$content_cnt?></span>
                        </a>
                        <div class="market_right">
                            <a href="/bbs/board.php?bo_table=mditem&sca=<?=urlencode("$row_md[ca_name]")?>">
                                <img width="100%" src="/images/md_go_01.png" onmouseover="this.src='/images/md_go_01_o.png'" onmouseout="this.src='/images/md_go_01.png'"/>
                            </a>
                        </div>
                    </div>
                <? } ?>                 
                </div>
<!------------------------------여기까지 반복--------------------------->                
            </div>
        </div>
        <!--e: MD 추천 상품-->

         <!--s: FULL 광고 배너 03-->
		<div class="oz_full_banner" style="margin-top:10px;">
        	<ins id="oz_full_banner_outer" style="margin:0; padding:0; width:1620px; height:90px; display:inline-block;">
            	<a href="/shop/bannerhit.php?bn_id=<?=$baner23['bn_id']?>&url=<?=urlencode($baner23['bn_url'])?>" <? if($baner23[bn_new_win]=="1"){?>target="_blank"<? } ?>>
                	<img width="1620" height="90" src="<? if($baner23[bn_img1]){?>http://data.oozoobox.com/data/banner/<?=$baner23[bn_img1]?><? }else{ ?>/images/ad_no.png<? } ?>" border="0"/>
                </a>
            </ins>
        </div>
        <!--e: FULL 광고 배너 03-->     
        <!--s: FOOTER_SUB-->
        <div class="footer_sub_wrap">   
            <div class="footer_sub">
                <div class="footer_menu">
                    <dl>
                        <dt class="menu_tit">客户服务</dt>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=2">消费者须知</a></dd>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=3">忘记密码</a></dd>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=5">查看已购买商品</a></dd>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=4">如何注册成为会员</a></dd>
                        <dd><a>我要买</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">买家服务中心</dt>
                        <dd>开店流程</dd> <!--입점절차-->
                        <dd>商品发布</dd> <!--상품등록-->
                        <dd>账户开通</dd> <!--회원가입-->
                        <dd>常见问题</dd> <!--FAQ-->
                    </dl>
                    <dl>
                        <dt class="menu_tit">支付方式 </dt>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=6">如何注册支付宝</a></dd>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=7">支付协议</a></dd>
                        <dd><a>支付方式</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">售后服务</dt>
                        <dd><a>换货/退款政策</a></dd>
                        <dd><a>联系卖家</a></dd>
                        <dd><a>退换货流程</a></dd>
                        <dd><a>售后服务</a></dd>
                    </dl>
                    <dl>
                        <dt class="menu_tit">客服中心</dt>
                        <dd><a>FAQ</a></dd>
                        <dd><a href="/bbs/board.php?bo_table=faq&wr_id=8">服务协议</a></dd>
                        <dd><a>会员修改个人资料</a></dd>
                        <dd><a>会员修改密码</a></dd>
                        <dd><a>修改收货地址</a></dd>
                    </dl>
                </div>
                <!--s: 제휴업체-->
                <div class="oz_partners">
                    <h3 class="oz_main_partners_tit">合作企业</h3>
                    <div class="partner_list">
                        <ul>
                            <li><a href="http://www.oozoo.co.kr" target="_blank"><img src="/images/partners/list_partner13.png" alt="롯데백화점"/></a></li>
                            <!--<li><a href="#" target="_blank"><img src="/images/partners/list_partner02.png" alt="신세계"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner03.png" alt="현대"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner04.png" alt="겔러리아"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner05.png" alt="홈플러스"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner06.png" alt="CJmall"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner07.png" alt="코카콜라"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner08.png" alt="마이크로소프트"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner09.png" alt="SK-2"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner10.png" alt="현대"/></a></li> 
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner11.png" alt="국민은행"/></a></li>
                            <li><a href="#" target="_blank"><img src="/images/partners/list_partner12.png" alt="한국"/></a></li>-->
                        </ul>
                    </div>
                </div>            
                <!--e: 제휴업체-->
                <!--s: 공지사항-->
                <div class="oz_main_news">
                    <h3 class="oz_main_news_tit">公告</h3>
                    <div class="oz_main_news_list">
                        <ul>
                            <li><a href="#" target="_blank">【官方公告】宇宙”物流预警“邀你备战大促！</a></li>
                            <li><a href="#" target="_blank">恭喜恭喜！EXO第二张迷你专辑获奖者名单公布！</a></li>
                            <li><a href="#" target="_blank">系统维护</a></li>
                            <li><a href="#" target="_blank">优秀博客 栏目正在准备中</a></li>
                            <li><a href="#" target="_blank">关于换货及退货的公告</a></li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
        <!--e: FOOTER_SUB-->    
    </div>
    <!--e:CONTENT-->
</div>
<!------e: 쇼핑몰 페이지-------->


<script type="text/javascript">
$("#oz_main_nav .tit").slide({
	type:"menu",
	titCell:".mod_cate",
	targetCell:".mod_subcate",
	delayTime:0,
	triggerTime:10,
	defaultPlay:false,
	returnDefault:true
});
</script>


  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 823,
        height: 500,
        navigation: {
          effect: "fade"
        },
		  play: {
          auto: true,
		  effect:"fade"
        },
        pagination: {
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 600
          }
        }
      });
    });
  </script>
  
<script type="text/javascript">
$(function(){

//#############첫번째 샘플
        $('.oz_main_news_list').Vnewsticker({
			speed: 700,         //스크롤 스피드
			pause: 4000,        //잠시 대기 시간
			mousePause: true,   //마우스 오버시 일시정지(true=일시정지)
			showItems: 1,       //스크롤 목록 갯수 지정(1=한줄만 보임)
			direction : "up"    //up=위로스크롤, 공란=아래로 스크롤
	});

});
</script>