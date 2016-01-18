<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가


add_stylesheet('<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >',0); //김미혜: css추가 및 경로 설정
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$list_skin_url.'/style.css" media="screen">', 0);

echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10">'.PHP_EOL; //김미혜: 반응형 viewport 설정




// 높이
$img_h = apms_img_height($thumb_w, $thumb_h);

// 너비
$item_w = apms_img_width($list_mods);

// 간격
$gap_right = ($wset['gap_r'] == "") ? 10 : $wset['gap_r'];
$gap_bottom = ($wset['gap_b'] == "") ? 30 : $wset['gap_b'];

// 새상품
$new_item = ($wset['newtime']) ? $wset['newtime'] : 24;

$list_cnt = count($list);

/*include_once($list_skin_path.'/category.skin.php');*/ /*SW: MH 임시로 해놓음*/
?>

<?php /*?><style>
	.list-wrap .list-container { overflow:hidden; margin-right:<?php echo ($gap_right > 0) ? '-'.$gap_right : 0;?>px; margin-bottom:<?php echo ($gap_bottom > 15) ? 0 : 15;?>px; }
	.list-wrap .list-row { float:left; width:<?php echo $item_w;?>%; }
	.list-wrap .list-item { margin-right:<?php echo $gap_right;?>px; margin-bottom:<?php echo $gap_bottom;?>px; }
</style><?php */?>

<!--s: LIST 페이지-->
<div id="oz_list_content">
    <div class="oz_list_main">
    	<!--s: LIST 배너-->
    	<div class="oz_list_bn_wrap">
            <!--s: LIST 배너 01-->
            <div id="banner_tabs" class="flexslider">
                <ul class="slides">
                    <li>
                        <a title="상품이름" target="_blank" href="#">
                            <img width="100%" alt="" src="/images/img_list_bn_slide01.png">
                        </a>
                    </li>
                    <li>
                        <a title="상품이름"  target="_blank" href="#">
                            <img width="100%" alt="" src="/images/img_list_bn_slide02.png">
                        </a>
                    </li>
                </ul>
                <ol id="bannerctrl" class="flex-control-nav flex-control-paging">
                    <li><a>1</a></li>
                    <li><a>2</a></li>
                </ol>
            </div>
            <!--e: LIST 배너 01-->
            <!--s: LIST 배너 02-->
            <div class="oz_list_bn_slide_02">
                <img src="/images/img_list_bn02_slide01.png" alt="상품이름" width="100%"/>
            </div>
            <!--e: LIST 배너 02-->
            <!--s: LIST 배너 03-->
            <div id="lista1" class="als-container">
                <span class="als-prev"><img src="/images/mfrl.png" alt="prev" title="previous" /></span>
                <div class="als-viewport">
                    <ul class="als-wrapper">
                        <li class="als-item">
                            <a href="#"><img src="/images/img_list_bn03_slide01.png" alt="calculator" title="상품01" /></a>
                        </li>
                        <li class="als-item">
                            <a href="#"><img src="/images/img_list_bn03_slide02.png" alt="light bulb" title="상품02" /></a>
                        </li>
                        <li class="als-item">
                            <a href="#"><img src="/images/img_list_bn03_slide03.png" alt="card" title="card" /></a>
                        </li>
                        <li class="als-item">
                            <a href="#"><img src="/images/img_list_bn03_slide04.png" alt="card" title="card" /></a>
                        </li>
                        <li class="als-item">
                            <a href="#"><img src="/images/img_list_bn03_slide05.png" alt="card" title="card" /></a>
                        </li>                                                
                    </ul>
                </div>
                <span class="als-next"><img src="/images/mfrr.png" alt="next" title="next" /></span>
            </div>
            <!--e: LIST 배너 03-->
        </div>
        <!--e: LIST 배너-->
<!-----------------------------s: album형식------------------------->
        <!--s: LIST filter-->
        <div class="oz_filter" id="nv_list">
            <a title="点击后恢复默认排序" class="<?php if($_GET[sort]==''){?>filter_sort_on first<?php }else{ ?>filter_sort first<?php } ?>" href="<?php echo $list_sort_href; ?>&l_type=<?php echo $_GET[l_type] ?>&#nv_list">综合
                <i class="f_ico_arrow_d"></i>
            </a>     
            <a title="点击后按人气从高到低" class="<?php if($_GET[sort]=='it_type4'){?>filter_sort_on<?php }else{ ?>filter_sort<?php } ?>" href="<?php echo $list_sort_href; ?>it_type4&amp;sortodr=desc&l_type=<?php echo $_GET[l_type] ?>#nv_list">人气
                <i class="f_ico_arrow_d"></i>
            </a>
            <a class="<?php if($_GET[sort]=='it_type3'){?>filter_sort_on<?php }else{ ?>filter_sort<?php } ?>" href="<?php echo $list_sort_href; ?>it_type3&amp;sortodr=desc&l_type=<?php echo $_GET[l_type] ?>#nv_list" >新品
                <i class="f_ico_arrow_d"></i>
            </a>
            <a title="点击后按月销量从高到低" class="<?php if($_GET[sort]=='it_sum_qty'){?>filter_sort_on<?php }else{ ?>filter_sort<?php } ?>" href="<?php echo $list_sort_href; ?>it_sum_qty&amp;sortodr=desc&l_type=<?php echo $_GET[l_type] ?>#nv_list">销量
                <i class="f_ico_arrow_d"></i>
            </a>
            <a title="点击后按价格从低到高" class=<?php if($_GET[sort]=='it_price' and $_GET[sortodr]=='asc'){?>filter_sort_on<?php }else{ ?>filter_sort<?php } ?> href="<?php echo $list_sort_href; ?>it_price&amp;sortodr=asc&l_type=<?php echo $_GET[l_type] ?>#nv_list">价格
                <i class="f_ico_arrow_d"></i>
            </a>               
            <a title="点击后按价格从高到低" class="<?php if($_GET[sort]=='it_price' and $_GET[sortodr]=='desc'){?>filter_sort_on<?php }else{ ?>filter_sort<?php } ?>" href="<?php echo $list_sort_href; ?>it_price&amp;sortodr=desc&l_type=<?php echo $_GET[l_type] ?>#nv_list">价格
                <i class="f_ico_arrow_u"></i>
            </a>   
            <a class="filter_type_store" href="<?php echo $list_sort_href; ?>&l_type=album#nv_list">店铺
                <i class="ico_filter_type_store"></i>
            </a>    
            <a class="filter_type_big<?php if($_GET[l_type]!="list"){?>_on<?php } ?>" href="<?php echo $list_sort_href; ?>&sort=<?php echo $_GET[sort] ?>&sortodr=<?php echo $_GET[sortodr] ?>&l_type=album#nv_list">大图
                <i class="ico_filter_type_big"></i>
            </a>
            <a class="filter_type_small<?php if($_GET[l_type]=="list"){?>_on<?php } ?>" href="<?php echo $list_sort_href; ?>&sort=<?php echo $_GET[sort] ?>&sortodr=<?php echo $_GET[sortodr] ?>&l_type=list#nv_list">小图
                <i class="ico_filter_type_small"></i>
            </a>  
            <p class="ui-page-s">
                <b class="ui-page-s-len"><?php echo $page?>/<?php echo $total_page?></b>
                <!----a href="" title="上一页" class="ui-page-s-prev">&lt;</a> 
                <a href="" title="下一页" class="ui-page-s-next" href="#">&gt;</a!---->
            </p>
        </div>
		<!--e: LIST filter-->
        <?php if($_GET[l_type]!="list"){?>
        <!--s: album-->
        <div class="list_type_album">
            <ul class="list_album">
            <?php 
			for ($i=0; $i < $list_cnt; $i++) { 

				// 이미지
				$img = apms_it_thumbnail($list[$i], $thumb_w, $thumb_h, false, true);
				
				$sql = " select count(*) as cnt FROM g5_shop_cart WHERE it_id = '{$list[$i][it_id]}' and ct_status = '입금'";
				$rowcon = sql_fetch($sql);
				$total_count = $rowcon['cnt'];



			?>
                <li class="<?php if($i % 4 == 3){?>list_album_item last_item<?php }else{ ?>list_album_item<?php } ?>">
                    <div class="album_card">
                        <span class="album_item_pic">
                            <a href="<?php echo $list[$i]['href'];?>">
                            	<img width="100%" src="<?php echo $img['src'];?>" alt="<?php echo $list[$i]['it_name'];?>" title="<?php echo $list[$i]['it_name'];?>"/>
                            </a>                                
                        </span>
                        <a href="#" class="album_wish_plus">
                            <span class="album_ico_wish">
                                <em>13</em>
                            </span>
                        </a>
                        <span class="album_info">
                            <a href="<?php echo $list[$i]['href'];?>">
                                <span class="album_item_desc">
                                    <em title="<?php echo $list[$i]['it_name'];?>" class="album_item_name"><?php echo $list[$i]['it_name'];?></em>
                                </span>
                            </a>
                            <?php 
                            ?>
                            <a href="#">
                                <span class="album_item_shop">
                                    <em title="捞鱼猫旗舰店" class="album_ item_shop_name"><?php echo $list[$i]['pt_id'];?></em>
                                </span>
                            </a>
                            <span class="album_item_detail">
                                <a href="#">
                                    <span class="album_item_price">
                                        <i class="album_price_rmb">¥</i>
                                        <span class="album_price_integer"><?php echo ($list[$i]['it_tel_inq']) ? 'Call' : $list[$i]['it_price'];?></span>
                                    </span>
                                </a>
                                <span class="album_item_tag">
                                    <span class="album_item_buy">
                                        <a href="#">
                                            <span>月成交</span>
                                            <em><?=$total_count?></em>
                                            <span>笔</span>
                                        </a>
                                    </span>
                                    <span class="album_item_after">
                                        <a href="#">
                                            <span>评价</span>
                                            <em>8,141</em>
                                        </a>
                                    </span>
                                </span>
                            </span>                            
                        </span>
                    </div>
                </li>
                <?php } ?>                
                                               
            </ul>
        </div>
        <!--e: album-->
        <?php }else{  ?>
<!--s: LIST-->
        <div class="list_type_list">
            <ul class="list_list">
            <?php 
			for ($i=0; $i < $list_cnt; $i++) { 

				// 이미지
				$img = apms_it_thumbnail($list[$i], $thumb_w, $thumb_h, false, true);

			?>
                <li class="<?php if($i % 2 == 1){?>list_list_item last_item<?php }else{ ?>list_list_item<?php } ?>">
                    <div class="list_card">
                        <span class="list_item_pic">
                            <a href="#">
                            	<img width="100%" src="<?php echo $img['src'];?>" alt="<?php echo $list[$i]['it_name'];?>" title="<?php echo $list[$i]['it_name'];?>"/>
                            </a>                                
                        </span>
                        <span class="list_info">
                            <a href="#">
                                <span class="list_item_shop">
                                    <em title="捞鱼猫旗舰店" class="list_ item_shop_name">捞鱼猫旗舰店</em>
                                </span>
                            </a>                        
                            <a href="#">
                                <span class="list_item_desc">
                                    <em title="<?php echo $list[$i]['it_name'];?>" class="list_item_name"><?php echo $list[$i]['it_name'];?></em>
                                </span>
                            </a>
                            <span class="list_item_detail">
                                <a href="#">
                                    <span class="list_item_price">
                                        <i class="list_price_rmb">¥</i>
                                        <span class="list_price_integer"><?php echo ($list[$i]['it_tel_inq']) ? 'Call' : number_format($list[$i]['it_price']);?></span>
                                    </span>
                                </a>
                            </span>
                            <span class="list_item_tag">
                                <span class="list_item_buy">
                                    <a href="#">
                                    	<span class="list_ico_buy"></span>
                                        <span>月成交</span>
                                        <em>1,011</em>
                                        <span>笔</span>
                                    </a>
                                </span>
                                <span class="list_item_after">
                                    <a href="#">
                                    	<span class="list_ico_after"></span>
                                        <span>评价</span>
                                        <em>8,141</em>
                                        <span>件</span>
                                    </a>
                                </span>
                                <span class="list_item_wish">
                                    <a href="#">
                                    	<span class="list_ico_wish"></span>
                                        <span>喜欢</span>
                                        <em>8,141</em>
                                        <span>人</span>
                                    </a>
                                </span>                                    
                            </span>
                        </span>                            
                    </div>
                </li>
                <?php } ?>                  
            </ul>           
        </div>
        <!--e: LIST-->
        <?php }  ?>
		<div style="list-btn">
			<?php if($total_page > 1) { ?>
				<div class="list-page pull-left">
					<ul class="pagination pagination-sm en">
						<?php echo apms_paging($write_pages, $page, $total_page, $list_page); ?>
					</ul>
				</div>
			<?php } ?>
		</div>   
    </div>
</div>
<!--e: LIST 페이지-->


<script type="text/javascript">
$(function() { var bannerSlider = new Slider($('#banner_tabs'), { time: 5000,
        delay: 400,
        event: 'hover',
        auto: true,
        mode: 'fade',
        controller: $('#bannerctrl'),
        activeControllerCls: 'active'
    }); })
</script>

<!--list bn03-->
<script type="text/javascript">
	$(document).ready(function() 
	{
		$("#lista1").als({
			visible_items: 3,
			scrolling_items: 1,
			orientation: "horizontal",
			circular: "yes",
			autoscroll: "yes",
			interval: 5000,
			speed: 500,
			easing: "linear",
			direction: "left",
			start_from: 0
		});

	});
</script>
