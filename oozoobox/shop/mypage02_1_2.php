<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/mypage.php"));

// 쿠폰
$cp_count = 0;
$sql = " select cp_id
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '전체회원' )
              and cp_start <= '".G5_TIME_YMD."'
              and cp_end >= '".G5_TIME_YMD."' ";
$res = sql_query($sql);

for($k=0; $cp=sql_fetch_array($res); $k++) {
    if(!is_used_coupon($member['mb_id'], $cp['cp_id']))
        $cp_count++;
}

$mb_homepage = set_http(get_text(clean_xss_tags($member['mb_homepage'])));
$mb_profile = ($member['mb_profile']) ? conv_content($member['mb_profile'],0) : '';
$mb_signature = ($member['mb_signature']) ? apms_content(conv_content($member['mb_signature'], 1)) : '';



$g5['title'] = get_text($member['mb_name']).'님 마이페이지';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">顾客的个人情报及订单详情等使用记录可以查询。</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            订单取消
            </h4>

            <h4 class="strapline">2. 取消理由 <span class="explain">(使用过的 积分全部会 清零/不退还)</span></h4>    
            <form class="form" role="form" method="post" action="./orderinquirycancel.php" onsubmit="return fcancel_check(this);">
            <input type="hidden" name="od_id"  value="<?=$_GET[od_id]?>">
            <table class="order-list-table order-cancel-table">
                <thead>
                	<tr>
                        <th>取消理由</th>
                    </tr>
                </thead>
                <tbody>                
                    <tr class="separate">                    	
                        <td class="pro">
                        	<div class="cancel_textbox">
                            <textarea name="cancel_memo" cols="40" class="cancel_textbox" id="cancel_memo" required="required"></textarea>
                          </div>
                        </td>
                    </tr>
                    <!-------e: 취소할 상품 선택---------->
                </tbody>
            </table>
            <div class="basicbtns">
            	<button type="submit" ><img src="/images/btn_my_next.png" alt="上一部"/></button>
            </div>                    
            </form>
        </div>
        <!--e: RIGHT CONTENTS-->

<?php  include_once('./_tail.php'); ?>
