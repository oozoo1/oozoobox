<?php
include_once('./_common.php');
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
		<a href="/shop/cscenter.php"><h3 class="mp_tit">CUSTOMER CENTER <span class="mp_tit_small">服务中心</span></h3></a>
        <!--s: LEFT_NAVIGATION-->
        <div id="Left_Navigation">
        	<!--s: MypageMenu-->
        	<div class="MyMenu CSMenu">
            	<ul>
                	<li class="CS_menu">
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter01.png" alt="消费者帮助 Buyer FAQ"/>
                        </h4>
                        <ul class="MM_List" <? if($_GET[bo_table]=="buyerfaq" || $_SERVER['PHP_SELF']=="/shop/cscenter.php"){?>style="display:block"<? } ?>>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('会员管理')?>">会员信息</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('订单')?>">订单</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('结算')?>">结算</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('快递')?>">快递</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('取消/退换')?>">取消/退换</a></li>                    
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('积分')?>">积分</a></li>
                            <li><a href="/bbs/board.php?bo_table=buyerfaq&sca=<?=urlencode('其他')?>">其他</a></li>
                        </ul>
                    </li>
                    <li class="CS_menu">
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter02.png" alt="商家帮助 Seller FAQ"/>
                        </h4>
                        <ul class="MM_List" <? if($_GET[bo_table]=="sellerfaq"){?>style="display:block"<? } ?>>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('会员管理')?>">会员管理</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('商品管理')?>">商品管理</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('发送/取消/退换')?>">发送/取消/退换</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('费用/结算/附加税')?>">费用/结算/附加税</a></li>
                            <li><a href="/bbs/board.php?bo_table=sellerfaq&sca=<?=urlencode('广告/策划')?>">广告/策划</a></li>
                        </ul>
                    </li>
                    <!--<li class="CS_menu"> 
                    <h4 class="MM_tit">
                        <img src="/images/tit_cscenter03.png" alt="我的设置 Personal Info."/>
                    </h4>
                    <ul class="MM_List">
                        <li><a>상품문의</a></li>
                        <li><a>상품평 조회</a></li>
                        <li><a>상품평 쓰기</a></li>
                        <li><a>건의함 조회</a></li>
                        <li><a>신고 고발 조회</a></li>
                    </ul>
                    </li>-->
                    <li class="CS_menu"> 
                        <h4 class="MM_tit">
                            <img src="/images/tit_cscenter04.png" alt="公告 Notice"/>
                        </h4>
                        <ul class="MM_List" <? if($_GET[bo_table]=="notice"){?>style="display:block"<? } ?>>
                            <li><a href="/bbs/board.php?bo_table=notice">查看全部</a></li>
                            <li><a href="/bbs/board.php?bo_table=notice&sca=<?=urlencode('OOZOOBOX소식')?>">OOZOOBOX 消息</a></li>
                            <li><a href="/bbs/board.php?bo_table=notice&sca=<?=urlencode('이벤트소식')?>">活动消息</a></li>
                            <li><a href="/bbs/board.php?bo_table=notice&sca=<?=urlencode('이벤트응모담청')?>">中奖名单</a></li>
                        </ul> 
                    </li>
                </div>
                <!--e: MypageMenu-->
                <!--s: 고객센터 배너-->
                <div class="My_subsection">
                    <h4 class="MM_tit">
                        <img src="/images/tit_cscenter_quick.png" alt="Quick Finds"/>
                    </h4>
                    <ul class="Quickmenu">
                        <li><a href="/bbs/write.php?bo_table=qa"><i class="quick01"></i>在线咨询</a></li>
                        <li><a href="/bbs/board.php?bo_table=qa&sca=&sop=and&sfl=mb_id%2C1&stx=<?=$member[mb_id]?>"><i class="quick02"></i>咨询记录</a></li>
                        <li><a href="/bbs/board.php?bo_table=itemqa&sca=&sop=and&sfl=mb_id%2C1&stx=<?=$member[mb_id]?>"><i class="quick02"></i>MD咨询记录</a></li>
                        <li><a href="/bbs/password_lost.php"><i class="quick03"></i>查找账号/密码</a></li>
                        <!---li><a><i class="quick05"></i>查询快递</a></li-->
                        <li><a href="/shop/member_confirm.php"><i class="quick06"></i>修改我的资料</a></li>
                    </ul> 
                </div>
            </ul>
            <!--e: 고객센터 배너-->
        </div>
        <!--e: LEFT_NAVIGATION-->
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<div class="cscenter_main_tit">