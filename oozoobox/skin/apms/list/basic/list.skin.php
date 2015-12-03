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
        <div class="oz_filter">
            <a title="点击后恢复默认排序" class="filter_sort first" href="#">综合
                <i class="f_ico_arrow_d"></i>
            </a>     
            <a title="点击后按人气从高到低" class="filter_sort" href="#">人气
                <i class="f_ico_arrow_d"></i>
            </a>
            <a class="filter_sort" href="#" >新品
                <i class="f_ico_arrow_d"></i>
            </a>
            <a title="点击后按月销量从高到低" class="filter_sort" href="#">销量
                <i class="f_ico_arrow_d"></i>
            </a>
            <a title="点击后按价格从低到高" class="filter_sort" href="#">价格
                <i class="f_ico_arrow_d"></i>
            </a>               
            <a title="点击后按价格从高到低" class="filter_sort" href="#">价格
                <i class="f_ico_arrow_u"></i>
            </a>   
            <a class="filter_type_store" href="#">店铺
                <i class="ico_filter_type_store"></i>
            </a>    
            <a class="filter_type_big_on" href="#">大图
                <i class="ico_filter_type_big"></i>
            </a>
            <a class="filter_type_small" href="#">小图
                <i class="ico_filter_type_small"></i>
            </a>  
            <p class="ui-page-s">
                <b class="ui-page-s-len">1/100</b>
                <a title="上一页" class="ui-page-s-prev">&lt;</a> 
                <a title="下一页" class="ui-page-s-next" href="#">&gt;</a>
            </p>
        </div>
		<!--e: LIST filter-->
        
        <!--s: album-->
        <div class="list_type_album">
            <ul class="list_album">
                <li class="list_album_item">
                    <div class="album_card">
                        <span class="album_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_01.png" alt="상품이름" title="상품이름"/>
                            </a>                                
                        </span>
                        <a href="#" class="album_wish_plus">
                            <span class="album_ico_wish">
                                <em>13</em>
                            </span>
                        </a>
                        <span class="album_info">
                            <a href="#">
                                <span class="album_item_desc">
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="album_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <a href="#">
                                <span class="album_item_shop">
                                    <em title="捞鱼猫旗舰店" class="album_ item_shop_name">捞鱼猫旗舰店</em>
                                </span>
                            </a>
                            <span class="album_item_detail">
                                <a href="#">
                                    <span class="album_item_price">
                                        <i class="album_price_rmb">¥</i>
                                        <span class="album_price_integer">59</span>
                                        <span class="album_price_decimal">.9</span>
                                    </span>
                                </a>
                                <span class="album_item_tag">
                                    <span class="album_item_buy">
                                        <a href="#">
                                            <span>月成交</span>
                                            <em>1,011</em>
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
                
                <li class="list_album_item">
                    <div class="album_card">
                        <span class="album_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_02.png" alt="상품이름" title="상품이름"/>
                            </a>                                
                        </span>
                        <a href="#" class="album_wish_plus">
                            <span class="album_ico_wish">
                                <em>13</em>
                            </span>
                        </a>
                        <span class="album_info">
                            <a href="#">
                                <span class="album_item_desc">
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="album_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <a href="#">
                                <span class="album_item_shop">
                                    <em title="捞鱼猫旗舰店" class="album_ item_shop_name">捞鱼猫旗舰店</em>
                                </span>
                            </a>
                            <span class="album_item_detail">
                                <a href="#">
                                    <span class="album_item_price">
                                        <i class="album_price_rmb">¥</i>
                                        <span class="album_price_integer">59</span>
                                        <span class="album_price_decimal">.9</span>
                                    </span>
                                </a>
                                <span class="album_item_tag">
                                    <span class="album_item_buy">
                                        <a href="#">
                                            <span>月成交</span>
                                            <em>1,011</em>
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
                <li class="list_album_item">
                    <div class="album_card">
                        <span class="album_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_03.png" alt="상품이름" title="상품이름"/>
                            </a>                                
                        </span>
                        <a href="#" class="album_wish_plus">
                            <span class="album_ico_wish">
                                <em>13</em>
                            </span>
                        </a>
                        <span class="album_info">
                            <a href="#">
                                <span class="album_item_desc">
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="album_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <a href="#">
                                <span class="album_item_shop">
                                    <em title="捞鱼猫旗舰店" class="album_ item_shop_name">捞鱼猫旗舰店</em>
                                </span>
                            </a>
                            <span class="album_item_detail">
                                <a href="#">
                                    <span class="album_item_price">
                                        <i class="album_price_rmb">¥</i>
                                        <span class="album_price_integer">59</span>
                                        <span class="album_price_decimal">.9</span>
                                    </span>
                                </a>
                                <span class="album_item_tag">
                                    <span class="album_item_buy">
                                        <a href="#">
                                            <span>月成交</span>
                                            <em>1,011</em>
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
                <li class="list_album_item last_item">
                    <div class="album_card">
                        <span class="album_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_04.png" alt="상품이름" title="상품이름"/>
                            </a>                                
                        </span>
                        <a href="#" class="album_wish_plus">
                            <span class="album_ico_wish">
                                <em>13</em>
                            </span>
                        </a>
                        <span class="album_info">
                            <a href="#">
                                <span class="album_item_desc">
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="album_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <a href="#">
                                <span class="album_item_shop">
                                    <em title="捞鱼猫旗舰店" class="album_ item_shop_name">捞鱼猫旗舰店</em>
                                </span>
                            </a>
                            <span class="album_item_detail">
                                <a href="#">
                                    <span class="album_item_price">
                                        <i class="album_price_rmb">¥</i>
                                        <span class="album_price_integer">59</span>
                                        <span class="album_price_decimal">.9</span>
                                    </span>
                                </a>
                                <span class="album_item_tag">
                                    <span class="album_item_buy">
                                        <a href="#">
                                            <span>月成交</span>
                                            <em>1,011</em>
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
            </ul>
        </div>
        <!--e: album-->
        
<!-------------------------s: LIST형식---------------------->
        <!--s: LIST filter-->
        <div class="oz_filter">
            <a title="点击后恢复默认排序" class="filter_sort first" href="#">综合
                <i class="f_ico_arrow_d"></i>
            </a>     
            <a title="点击后按人气从高到低" class="filter_sort" href="#">人气
                <i class="f_ico_arrow_d"></i>
            </a>
            <a class="filter_sort" href="#" >新品
                <i class="f_ico_arrow_d"></i>
            </a>
            <a title="点击后按月销量从高到低" class="filter_sort" href="#">销量
                <i class="f_ico_arrow_d"></i>
            </a>
            <a title="点击后按价格从低到高" class="filter_sort" href="#">价格
                <i class="f_ico_arrow_d"></i>
            </a>               
            <a title="点击后按价格从高到低" class="filter_sort" href="#">价格
                <i class="f_ico_arrow_u"></i>
            </a>   
            <a class="filter_type_store" href="#">店铺
                <i class="ico_filter_type_store"></i>
            </a>    
            <a class="filter_type_big" href="#">大图
                <i class="ico_filter_type_big"></i>
            </a>
            <a class="filter_type_small_on" href="#">小图
                <i class="ico_filter_type_small"></i>
            </a>  
            <p class="ui-page-s">
                <b class="ui-page-s-len">1/100</b>
                <a title="上一页" class="ui-page-s-prev">&lt;</a> 
                <a title="下一页" class="ui-page-s-next" href="#">&gt;</a>
            </p>
        </div>
		<!--e: LIST filter-->
        
        <!--s: LIST-->
        <div class="list_type_list">
            <ul class="list_list">
                <li class="list_list_item">
                    <div class="list_card">
                        <span class="list_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_01.png" alt="상품이름" title="상품이름"/>
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
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="list_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <span class="list_item_detail">
                                <a href="#">
                                    <span class="list_item_price">
                                        <i class="list_price_rmb">¥</i>
                                        <span class="list_price_integer">109</span>
                                        <span class="list_price_decimal">.00</span>
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
                <li class="list_list_item last_item">
                    <div class="list_card">
                        <span class="list_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_02.png" alt="상품이름" title="상품이름"/>
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
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="list_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <span class="list_item_detail">
                                <a href="#">
                                    <span class="list_item_price">
                                        <i class="list_price_rmb">¥</i>
                                        <span class="list_price_integer">109</span>
                                        <span class="list_price_decimal">.00</span>
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
            </ul>
 			<ul class="list_list">
                <li class="list_list_item">
                    <div class="list_card">
                        <span class="list_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_03.png" alt="상품이름" title="상품이름"/>
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
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="list_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <span class="list_item_detail">
                                <a href="#">
                                    <span class="list_item_price">
                                        <i class="list_price_rmb">¥</i>
                                        <span class="list_price_integer">109</span>
                                        <span class="list_price_decimal">.00</span>
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
                <li class="list_list_item last_item">
                    <div class="list_card">
                        <span class="list_item_pic">
                            <a href="#">
                            	<img width="100%" src="/images/list_album_04.png" alt="상품이름" title="상품이름"/>
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
                                    <em title="捞鱼猫新生儿秋冬宝宝棉衣服" class="list_item_name">捞鱼猫新生儿秋冬宝宝棉衣服</em>
                                </span>
                            </a>
                            <span class="list_item_detail">
                                <a href="#">
                                    <span class="list_item_price">
                                        <i class="list_price_rmb">¥</i>
                                        <span class="list_price_integer">109</span>
                                        <span class="list_price_decimal">.00</span>
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
            </ul>           
        </div>
        <!--e: LIST-->




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

<?php /*?><div class="list-wrap<?php echo (G5_IS_MOBILE) ? ' list-mobile' : '';?>">
	<div class="list-container">
		<?php 
			for ($i=0; $i < $list_cnt; $i++) { 

				$item_label = $cur_price = $dc = '';
				if($list[$i]['it_cust_price'] > 0 && $list[$i]['it_price'] > 0) {
					$dc = round((($list[$i]['it_cust_price'] - $list[$i]['it_price']) / $list[$i]['it_cust_price']) * 100);
					$cur_price = '<div class="cur-price"><strike>&nbsp;'.number_format($list[$i]['it_cust_price']).'</strike></div>';
				}

				if($list[$i]['it_id'] == $it_id) {
					$item_label = '<div class="label-cap bg-green">Now</div>';	
				} else if($dc || $list[$i]['it_type5']) {
					$item_label = '<div class="label-cap bg-red">DC</div>';	
				} else if($list[$i]['it_type3'] || $list[$i]['pt_num'] >= (G5_SERVER_TIME - ($new_item * 3600))) {
					$item_label = '<div class="label-cap bg-'.$wset['new'].'">New</div>';
				}

				// 이미지
				$img = apms_it_thumbnail($list[$i], $thumb_w, $thumb_h, false, true);

				// 아이콘
				$item_icon = item_icon($list[$i]);
				$item_icon = ($item_icon) ? '<div class="label-tack">'.$item_icon.'</div>' : '';

		?>
			<?php if($i > 0 && $i%$list_mods == 0) { ?>
				<div class="clearfix"></div>
			<?php } ?>
				<div class="list-row">
					<div class="list-item">
						<?php if($thumb_h) { // 이미지 높이값이 있을 경우?>
							<div class="imgframe">
								<div class="img-wrap" style="padding-bottom:<?php echo $img_h;?>%;">
									<?php echo $item_icon;?>
									<?php echo $item_label;?>
									<div class="img-item">

										<a href="<?php echo $list[$i]['href'];?>">
											<img src="<?php echo $img['src'];?>" alt="<?php echo $img['alt'];?>">
										</a>
										<?php if($dc) { ?>
											<div class="<?php echo ($cur_price) ? 'label-dc-cur' : 'label-dc';?> en">
												<?php echo $cur_price;?>
												<?php echo $dc;?>%
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="list-img">
								<?php echo $item_icon;?>
								<?php echo $item_label;?>
								<a href="<?php echo $list[$i]['href'];?>">
									<img src="<?php echo $img['src'];?>" alt="<?php echo $img['alt'];?>">
								</a>
								<?php if($dc) { ?>
									<div class="<?php echo ($cur_price) ? 'label-dc-cur' : 'label-dc';?> en">
										<?php echo $cur_price;?>
										<?php echo $dc;?>%
									</div>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if($wset['shadow']) echo apms_shadow($wset['shadow']); //그림자 ?>
						<div class="list-content">
							<?php if($wset['star']) { ?>
								<div class="list-star text-center">
									<?php echo apms_get_star($list[$i]['it_use_avg'], 'fa-2x '.$wset['scolor']); //평균별점 ?>
								</div>
							<?php } ?>
							<strong>
								<a href="<?php echo $list[$i]['href'];?>">
									<?php echo $list[$i]['it_name'];?>
								</a>
							</strong>
							<?php if($list[$i]['it_basic']) { ?>
								<div class="list-desc text-center text-muted">
									<?php echo $list[$i]['it_basic']; ?>
								</div>
							<?php } ?>
							<div class="list-details">
								<div class="pull-left en font-13 text-muted">
									<?php if($wset['cmt']) { ?>
										<i class="fa fa-comment"></i> 
										<?php echo ($list[$i]['pt_comment']) ? '<span class="red">'.number_format($list[$i]['pt_comment']).'</span>' : 0;?>
									<?php } ?>
									<?php if($wset['buy']) { ?>
										&nbsp;
										<i class="fa fa-shopping-cart"></i> <?php echo ($list[$i]['it_sum_qty']) ? '<span class="blue">'.number_format($list[$i]['it_sum_qty']).'</span>' : 0;?>
									<?php } ?>
									<?php if($list[$i]['it_point']) { ?>
										&nbsp;
										<i class="fa fa-gift"></i> 
										<span class="green"><?php echo ($list[$i]['it_point_type'] == 2) ? $list[$i]['it_point'].'%' : number_format(get_item_point($list[$i]));?></span>
									<?php } ?>
								</div>
								<div class="pull-right font-16 en">
									<b><?php echo ($list[$i]['it_tel_inq']) ? 'Call' : number_format($list[$i]['it_price']);?></b>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php if($wset['sns']) { ?>
								<div class="list-sns">
									<?php 
										$sns_url  = G5_SHOP_URL.'/item.php?it_id='.$list[$i]['it_id'];
										$sns_title = get_text($list[$i]['it_name'].' | '.$config['cf_title']);
										$sns_img = $list_skin_url.'/img';
										echo  get_sns_share_link('facebook', $sns_url, $sns_title, $sns_img.'/sns_fb_s.png').' ';
										echo  get_sns_share_link('twitter', $sns_url, $sns_title, $sns_img.'/sns_twt_s.png').' ';
										echo  get_sns_share_link('googleplus', $sns_url, $sns_title, $sns_img.'/sns_goo_s.png').' ';
										echo  get_sns_share_link('kakaostory', $sns_url, $sns_title, $sns_img.'/sns_kakaostory_s.png').' ';
										echo  get_sns_share_link('kakaotalk', $sns_url, $sns_title, $sns_img.'/sns_kakao_s.png').' ';
										echo  get_sns_share_link('naverband', $sns_url, $sns_title, $sns_img.'/sns_naverband_s.png').' ';
									?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	<?php if (!$i) { ?>
		<div class="text-center text-muted list-none">등록된 자료가 없습니다.</div>
	<?php } ?>
</div>

<div style="list-btn">
	<?php if($total_page > 1) { ?>
		<div class="list-page pull-left">
			<ul class="pagination pagination-sm en">
				<?php echo apms_paging($write_pages, $page, $total_page, $list_page); ?>
			</ul>
			<div class="clearfix"></div>
		</div>
	<?php } ?>
	<div class="pull-right">
		<div class="btn-group">
			<?php if ($is_event) { ?>
				<a class="btn btn-color btn-sm" href="./event.php"><i class="fa fa-gift"></i> 이벤트</a>
			<?php } ?>
			<?php if ($write_href) { ?>
				<a class="btn btn-black btn-sm" href="<?php echo $write_href;?>"><i class="fa fa-upload"></i><span class="hidden-xs"> 등록</span></a>
			<?php } ?>
			<?php if ($admin_href) { ?>
				<a class="btn btn-black btn-sm" href="<?php echo $admin_href;?>"><i class="fa fa-th-large"></i><span class="hidden-xs"> 관리</span></a>
			<?php } ?>
			<?php if ($config_href) { ?>
				<a class="btn btn-black btn-sm" href="<?php echo $config_href;?>"><i class="fa fa-cog"></i><span class="hidden-xs"> 설정</span></a>
			<?php } ?>
			<?php if($setup_href) { ?>
				<a class="btn btn-black btn-sm win_memo" href="<?php echo $setup_href;?>"><i class="fa fa-cogs"></i><span class="hidden-xs"> 스킨설정</span></a>
			<?php } ?>
			<?php if ($rss_href) { ?>
				<a class="btn btn-color btn-sm" title="카테고리 RSS 구독하기" href="<?php echo $rss_href;?>" target="_blank"><i class="fa fa-rss fa-lg"></i></a>
			<?php } ?>
		</div>
		<div class="h30"></div>
	</div>
	<div class="clearfix"></div>
</div>
<?php */?>