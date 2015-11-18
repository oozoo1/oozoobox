<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<!-- Hidden Sidebar -->
<aside id="asideMenu" class="at-sidebar en">
	<div class="close-box asideButton" title="Hide sidebar">
		<i class="fa fa-chevron-right"></i>
	</div>
	<div class="sidebar-wrap">
		<?php if($is_member) { //Login ?>
			<div class="profile-box">
				<div class="profile">
					<a href="<?php echo $at_href['myphoto'];?>" target="_blank" class="win_memo" title="上传照片">
						<div class="profile-photo pull-left">
							<?php echo ($member['photo']) ? '<img src="'.$member['photo'].'" alt="">' : '<i class="fa fa-user"></i>'; //사진 ?>
						</div>
					</a>
					<h3><?php echo $member['mb_nick'];?></h3>
					<p><?php echo $member['grade'];?></p>
					<div class="clearfix"></div>
				</div>

				<?php if($member['admin'] || $member['partner']) { ?>
					<div class="btn-group btn-group-justified">
						<?php if($member['partner']) { ?>
							<a href="<?php echo $at_href['myshop'];?>" class="btn btn-upload btn-sm"><i class="fa fa-shopping-cart"></i> 마이샵</a>
						<?php } ?>
						<?php if($member['admin']) { ?>
							<a href="<?php echo G5_ADMIN_URL;?>" class="btn btn-admin btn-sm"><i class="fa fa-cog"></i> 管理员</a>
						<?php } ?>
					</div>
				<?php } ?>

				<div class="at-tip" data-original-title="达到<?php echo number_format($member['exp_up']);?>分时 自动升级." data-toggle="tooltip" data-placement="top" data-html="true" style="padding:15px 0px;">
					<div class="div-progress progress progress-striped" style="margin:0px; background: #444;">
						<div class="progress-bar progress-bar-exp" role="progressbar" aria-valuenow="<?php echo round($member['exp_per']);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($member['exp_per']);?>%;">
							<span class="sr-only">
								Lv.<?php echo $member['level'];?> <span class="font-11">(<?php echo $member['exp_per'];?>%)</span>
							</span>
						</div>
					</div>
					<div class="sr-score pull-right" style="color:#fff; margin-top:-28px;"><?php echo number_format($member['exp']);?> (<?php echo $member['exp_per'];?>%)</div>
				</div>
			</div>

			<h5 class="sidebar-title">My Menu</h5>
			<div class="sidebar-nav <?php echo (G5_IS_MOBILE) ? 'font-14' : 'font-12';?>">
				<ul>
					<li>
						<a href="<?php echo $at_href['point'];?>" target="_blank" class="win_point">
							<span class="badge bg-blue pull-right"><?php echo number_format($member['mb_point']);?></span>
							<i class="fa fa-gift"></i> <?php echo AS_MP;?>
						</a>
					</li>
					<?php if($member['as_date']) { // 기간제 회원 ?>
						<li>
							<a>
								<span class="white pull-right">
									<?php echo date("Y.m.d H:i", $member['as_date']);?>
									(<?php echo number_format(($member['as_date'] - G5_SERVER_TIME) / 86400);?>일)
								</span>
								<i class="fa fa-download"></i> 프리미엄
							</a>		
						</li>
					<?php } ?>
					<li>
						<a href="<?php echo $at_href['response'];?>" target="_blank" class="win_memo">
							<?php if ($member['response']) { ?>
								<span class="badge bg-violet pull-right"><?php echo number_format($member['response']);?></span>
							<?php } ?>
							<i class="fa fa-retweet"></i> 我发布的
						</a>		
					</li>
					<li>
						<a href="<?php echo $at_href['memo'];?>" target="_blank" class="win_memo">
							<?php if ($member['memo']) { ?>
								<span class="badge bg-green pull-right"><?php echo number_format($member['memo']);?></span>
							<?php } ?>
							<i class="fa fa-envelope-o"></i> 短消息
						</a>		
					</li>
					<li>
						<a href="<?php echo $at_href['follow'];?>" target="_blank" class="win_memo">
							<i class="fa fa-users"></i> 我攒的内容
						</a>		
					</li>
					<li>
						<a href="<?php echo $at_href['scrap'];?>" target="_blank" class="win_scrap">
							<i class="fa fa-inbox"></i> 收藏夹
						</a>		
					</li>
					<?php if(IS_YC) { //영카트 ?>
						<li>
							<a href="<?php echo $at_href['coupon']; ?>" target="_blank" class="win_point">
								<i class="fa fa-book"></i> 代金卷
							</a>
						</li>
						<li>
							<a href="<?php echo $at_href['shopping']; ?>" target="_blank" class="win_memo">
								<i class="fa fa-shopping-cart"></i> 购物信息
							</a>
						</li>
						<li>
							<a href="<?php echo $at_href['wishlist']; ?>">
								<i class="fa fa-heart"></i> 关注
							</a>
						</li>
					<?php } ?>
					<li>
						<a href="<?php echo $at_href['mypage']; ?>">
							<i class="fa fa-user"></i> 个人中心
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['mypost']; ?>" target="_blank" class="win_memo">
							<i class="fa fa-pencil"></i> 管理内容
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['myphoto'];?>" target="_blank" class="win_memo">
							<i class="fa fa-camera"></i> 上传照片
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['edit'];?>">
							<i class="fa fa-pencil"></i> 修改信息
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['leave'];?>" class="leave-me">
							<i class="fa fa-sign-out"></i> 退出会员
						</a>
					</li>
				</ul>

				<div style="padding:15px 20px 0px;">
					<a href="<?php echo $at_href['logout'];?>" class="btn btn-color btn-block btn-sm">
						<i class="fa fa-power-off"></i> 退出登录
					</a>
				</div>
			</div>

		<?php } else { //Logout ?>

			<div class="sidebar-box">
				<form name="loginbox" method="post" action="<?php echo $at_href['login_check'];?>" onsubmit="return amina_login(this);" autocomplete="off" role="form" class="form">
				<input type="hidden" name="url" value="<?php echo $urlencode; ?>">
					<div class="form-group">	
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user gray"></i></span>
							<input type="text" name="mb_id" id="mb_id" class="form-control input-sm" itemname="账号" placeholder="账号">
						</div>
					</div>
					<div class="form-group">	
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock gray"></i></span>
							<input type="password" name="mb_password" id="mb_password" class="form-control input-sm" itemname="密码" placeholder="密码">
						</div>
					</div>	
					<div class="form-group">
						<button type="submit" class="btn btn-color btn-block">快速登录</button>                      
					</div>	
					<label><input type="checkbox" name="auto_login" value="1" id="remember_me" class="remember-me"> 保存登陆信息</label>
				</form>
			</div>

			<h5 class="sidebar-title">Member</h5>
			<div class="sidebar-nav">
				<ul>
					<li><a href="<?php echo $at_href['reg'];?>"><i class="fa fa-sign-in"></i> 会员注册</a></li>
					<li><a href="<?php echo $at_href['lost'];?>" class="win_password_lost"><i class="fa fa-search"></i> 忘记密码</a></li>
				</ul>
			</div>
		<?php } //End ?>

		<?php if(IS_YC) { //영카트 ?>
			<h5 class="sidebar-title">Shopping</h5>
			<div class="sidebar-nav">
				<ul>
					<li><a href="<?php echo $at_href['cart']; ?>"><i class="fa fa-shopping-cart"></i> 购物车</a></li>
					<li><a href="<?php echo $at_href['inquiry']; ?>"><i class="fa fa-truck"></i> 订单/查询</a></li>
					<li><a href="<?php echo $at_href['ppay']; ?>"><i class="fa fa-ticket"></i> 个人结账</a></li>
					<li><a href="<?php echo $at_href['secret'];?>"><i class="fa fa-user-secret"></i> 1:1客服</a>
					</li>
				</ul>
			</div>
		<?php } ?>

		<h5 class="sidebar-title">Search</h5>
		<div class="sidebar-nav">
			<ul>
				<li><a href="<?php echo $at_href['faq'];?>"><i class="fa fa-question-circle"></i> 有问必答</a></li>
				<?php if(IS_YC) { ?>
					<li><a href="<?php echo $at_href['isearch'];?>"><i class="fa fa-shopping-cart"></i> 商品搜索</a></li>
					<li><a href="<?php echo $at_href['iuse']; ?>"><i class="fa fa-pencil"></i> 评论查询</a></li>
					<li><a href="<?php echo $at_href['iqa']; ?>"><i class="fa fa-comments-o"></i> Q & A</a></li>
				<?php } ?>	
				<li><a href="<?php echo $at_href['search'];?>"><i class="fa fa-search"></i> 虚拟商品搜索</a></li>
				<li><a href="<?php echo $at_href['tag'];?>"><i class="fa fa-tags"></i> Tag Box</a></li>
			</ul>
		</div>

		<h5 class="sidebar-title">Misc</h5>
		<div class="sidebar-nav">
			<ul>
				<li><a href="<?php echo $at_href['new'];?>"><i class="fa fa-refresh"></i> 新产品</a></li>
				<li><a href="<?php echo $at_href['connect'];?>"><i class="fa fa-link"></i> 在线人数</a></li>
			</ul>
		</div>
	</div>
</aside>
