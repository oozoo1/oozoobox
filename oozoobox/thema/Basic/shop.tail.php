<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
		<?php if($col_name) { ?>
			<?php if($col_name == "two") { ?>
					</div>
					<div class="col-md-<?php echo $col_side;?><?php echo ($at_set['side']) ? ' pull-left' : '';?> sideArea">
						<?php include_once(THEMA_PATH.'/shop.side.php'); ?>
					</div>
				</div>
			<?php } ?>
			</div><!-- .container -->
		</div><!-- .at-content -->
	<?php } ?>

	<footer class="at-footer">
		<div class="at-map">
			<div class="container">
				<ul>
					<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=intro"><i class="fa fa-leaf"></i> <span>关于我们</span></a></li> 
					<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=provision"><i class="fa fa-check-circle"></i> <span>使用条款</span></a></li> 
					<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=privacy"><i class="fa fa-plus-circle"></i> <span>法律声明及隐私权政策</span></a></li>
					<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=noemail"><i class="fa fa-ban"></i> <span>禁止收集个人信息</span></a></li>
					<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=guide"><i class="fa fa-info-circle"></i> <span>站内导航</span></a></li>
					<li><a href="<?php echo $at_href['secret'];?>"><i class="fa fa-question-circle"></i> <span>有问必答</span></a></li>
					<li class="pull-right"><a href="<?php echo $as_href['pc_mobile'];?>"><i class="fa fa-tablet"></i> <span><?php echo (G5_IS_MOBILE) ? 'PC' : '手机';?>版</span></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="at-copyright">
			<div class="container">
				<div class="media">
					<div class="footer-logo pull-left">
						<i class="fa fa-leaf fa-4x"></i>
					</div>
					<div class="media-body">
						<ul>
							<li><b><?php echo $default['de_admin_company_name']; ?></b></li>
							<li>地址 : <?php echo $default['de_admin_company_addr']; ?></li>
							<li>法人代表 : <?php echo $default['de_admin_company_owner']; ?></li>
							<li>电话 : <span><?php echo $default['de_admin_company_tel']; ?></span></li>
							<li>营业执照号码 : <span><?php echo $default['de_admin_company_saupja_no']; ?></span></li>
							<li><a href="http://www.ftc.go.kr/info/bizinfo/communicationList.jsp" target="_blank">合法公司查询</a></li>
							<li>电子商城号码 : <?php echo $default['de_admin_tongsin_no']; ?></li>
							<li>个人信息保护负责人 : <?php echo $default['de_admin_info_name']; ?></li>
							<li>E-mail : <span><?php echo $default['de_admin_info_email']; ?></span></li>
							<li><span class="copyright">&copy; All Rights Reserved.</span></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- .wrapper -->

<!-- JavaScript -->
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/bs3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.ui.totop.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.custom.js"></script>
<?php if($at_set['header']) { ?>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.custom.sticky.js"></script>
<?php } ?>

<?php if($is_admin || $is_demo) include_once(THEMA_PATH.'/assets/switcher.php'); //Style Switcher ?>

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/respond.js"></script>
<![endif]-->