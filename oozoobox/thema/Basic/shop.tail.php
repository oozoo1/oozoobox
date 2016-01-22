<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
$s_cart_id = get_session('ss_cart_id');
$sql = " select a.ct_id,
				a.it_id,
				a.it_name,
				a.ct_price,
				a.ct_point,
				a.ct_qty,
				a.ct_status,
				a.ct_send_cost,
				a.it_sc_type,
				b.ca_id,
				b.ca_id2,
				b.ca_id3,
				b.pt_it,
				b.pt_msg1,
				b.pt_msg2,
				b.pt_msg3
		   from {$g5['g5_shop_cart_table']} a left join {$g5['g5_shop_item_table']} b on ( a.it_id = b.it_id )
		  where a.od_id = '$s_cart_id' ";
$sql .= " group by a.it_id ";
$sql .= " order by a.ct_id ";
$result = sql_query($sql);

$cart_count = sql_num_rows($result);

?>
<!-- .wrapper -->
<?php if($_SERVER['PHP_SELF']=="/index.php" || $_SERVER['PHP_SELF']=="/write_html.php" || $_SERVER['PHP_SELF']=="/shop/index.php" || $_SERVER['PHP_SELF']=="/shop/list.php" || $_SERVER['PHP_SELF']=="/bbs/login.php"){}else{ ?>
	</div>
</div>
<? } ?>
<div id="footer">
	<ul class="footer_link">
    	<li><a href="/">首页</a></li>
    	<li><a>公司介绍</a></li>    
    	<li><a>联系我们</a></li>
    	<li><a>配送方式 </a></li>
    	<li><a>合作咨询</a></li>   
    	<li><a>招聘指南 </a></li>
    	<li><a>客户服务</a></li>
    	<li><a>服务协议</a></li>         
    </ul>
    <div class="footer_info">
    	<p>
        OOZOOBOX | 대표：李荷俊 | 地址 : 韩国首尔特别市永登浦区议事堂大街38 101/913| 邮政编码 ：07236 <br>
        联系电话 ：+82-2-1234-1234 / +82-70-1234-1234 | FAX : +82-50-1234-1234 <br>
        发货和退货地址：韩国首尔特别市永登浦区国会大街62路 21 10楼| 邮政编码 ：07236<br>
        公司营业执照号 ：107-86-81797 | 通信销售申报号码 ：제2015-서울영등포-1249호 <br>
        服务时间: 周一到周六 08:00 ~ 17:00 | 服务热线 : +82-2-1234-1234<br>
         Copyright © 2015 OZOOBOX.com 版权所有 <br>
         <a href="http://m.kuaidi100.com" target="_blank" style="color:#fff">快递查询</a>
        </p>
    </div>

</div>

<!--右侧贴边导航quick_links.js控制-->
<div class="mui-mbar-tabs">
	<div class="quick_link_mian">
		<div class="quick_links_panel">
			<div class="quick_links">
				<li>
					<a href="#" class="my_qlinks"><i class="setting"></i></a>
					<div class="ibar_login_box status_login">
						<div class="login_btnbox">
							<a href="/shop/orderinquiry.php" class="login_order">我的订单</a>
							<a href="/shop/wishlist.php" class="login_favorite">我的收藏</a>
						</div>
						<i class="icon_arrow_white"></i>
					</div>
				</li>
				<li>
					<a href="/shop/cart.php" class="message_list" ><i class="message"></i><div class="span">购物车</div><span class="cart_num"><?=$cart_count?></span></a>
				</li>
				<li>
					<a href="/shop/member_todayview.php" class="mpbtn_histroy"><i class="zuji"></i></a>
					<div class="mp_tooltip">我的足迹<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="/shop/wishlist.php" class="mpbtn_wdsc"><i class="wdsc"></i></a>
					<div class="mp_tooltip">我的收藏<i class="icon_arrow_right_black"></i></div>
				</li>
			</div>
			<div class="quick_toggle">
				<li>
					<a href="/shop/cscenter.php"><i class="kfzx"></i></a>
					<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#none"><i class="mpbtn_qrcode"></i></a>
					<div class="mp_qrcode" style="display:none;"><img src="/shop/images/weixin_code_145.png" width="148" height="148" title="扫描微信公众平台 关注我们 可以随时联系到我们在线客服！" /><i class="icon_arrow_white"></i></div>
				</li>
				<li><a href="#top" class="return_top"><i class="top"></i></a></li>
			</div>
		</div>
		<div id="quick_links_pop" class="quick_links_pop hide"></div>
	</div>
</div>


<!--[if lte IE 8]>
<script src="js/ieBetter.js"></script>
<![endif]-->

<script type="text/javascript" src="/shop/js/parabola.js"></script>
<script type="text/javascript">
	$(".quick_links_panel li").mouseenter(function(){
		$(this).children(".mp_tooltip").animate({left:-92,queue:true});
		$(this).children(".mp_tooltip").css("visibility","visible");
		$(this).children(".ibar_login_box").css("display","block");
	});
	$(".quick_links_panel li").mouseleave(function(){
		$(this).children(".mp_tooltip").css("visibility","hidden");
		$(this).children(".mp_tooltip").animate({left:-121,queue:true});
		$(this).children(".ibar_login_box").css("display","none");
	});
	$(".quick_toggle li").mouseover(function(){
		$(this).children(".mp_qrcode").show();
	});
	$(".quick_toggle li").mouseleave(function(){
		$(this).children(".mp_qrcode").hide();
	});

</script>

<!-- JavaScript -->
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/bs3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.bootstrap-hover-dropdown.min.js"></script>
<?php if($at_set['header']) { ?>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.custom.sticky.js"></script>
<?php } ?>


<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/respond.js"></script>
<![endif]-->