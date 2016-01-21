<?php
include_once('./mypage_head.php');

$sql1 = " select count(*) as cnt from g5_shop_order where mb_id = '$member[mb_id]' and od_status='주문'";
$row1 = sql_fetch($sql1);

$sql2 = " select count(*) as cnt from g5_shop_order where mb_id = '$member[mb_id]' and od_status='결제'";
$row2 = sql_fetch($sql2);

$sql3 = " select count(*) as cnt from g5_shop_order where mb_id = '$member[mb_id]' and od_status='배송'";
$row3 = sql_fetch($sql3);

$sql4 = " select count(*) as cnt from g5_shop_order where mb_id = '$member[mb_id]' and od_status='완료'";
$row4 = sql_fetch($sql4);

$sql5 = " select count(*) as cnt from g5_shop_order where mb_id = '$member[mb_id]' and od_status='취소'";
$row5 = sql_fetch($sql5);




?>

            	<div class="My_info_bar">
                	<div class="My_baseinfo">
                    	<a class="My_picframe" href="#"><!--사진 올리는 창-->
                        	<img src="/images/my_picture.png" alt="My picture"/>
                        </a>
                        <span class="My_nickname">
                        	<a href="#">
                            	<em><?=$member[mb_name]?><!--별명--></em>(<?=$member[mb_id]?>)<!--ID-->
                            </a>
                        </span>
                        <span class="My_grade">
                        	<a href="#">
                            	<img src="/images/my_grade_vip.png" alt="vip"/>
                                <em>您的等级<b> <?=$member[mb_level]?> </b>级</em>
                            </a>
                        </span>
					</div>
                    <a class="My_address" href="/shop/member_address.php"> <!--주소수정하는 창으로-->
                        <em>我的收货地址</em>
                        <i></i>
                    </a>	                    
                </div>
                <div class="My_Shopping_info">
                    <ul>
                        <li>
                        	<a href="/shop/orderinquiry.php?type=1&oldtime="><span>待付款<em><?=$row1['cnt'];?></em></span></a>
                        </li>
                        <li>
                        	<a href="/shop/orderinquiry.php?type=2&oldtime="><span>待发货<em><?=$row2['cnt'];?></em></span></a>
                        </li>
                        <li>
                        	<a href="/shop/orderinquiry.php?type=4&oldtime="><span>待收货<em><?=$row3['cnt'];?></em></span></a>
                        </li>
                        <li>
                        	<a href="/shop/orderinquiry.php?type=5&oldtime="><span>待评价<em><?=$row4['cnt'];?></em></span></a>
                        </li>
                        <li>
                        	<a href="/shop/orderinquiry.php?type=7&oldtime="><span>退款<em><?=$row5['cnt'];?></em></span></a>
                        </li>
                    </ul>
                </div>                
            </div>
            <!--e: 내 정보 BAR-->
            <iframe runat="server" src="/myhit.php" width="100%" height="750" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>

            <!--s:OOZOOBOX推荐-->
						<iframe runat="server" src="/mdhit.php" width="100%" height="420" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
<?php  include_once('./mypage_tail.php'); ?>