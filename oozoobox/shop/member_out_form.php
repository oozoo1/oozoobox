<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/mypage.php"));


if($_POST[w]=="u"){

$mb_10   =$_POST[mb_10];
$mb_100  =$_POST[mb_100];
$mb_id   =$_POST[mb_id];
$mb_leave_date =date('Ymd');

$sql = " update g5_member
			set mb_10 = '{$mb_10}{$mb_100}',
				 mb_leave_date = '$mb_leave_date',
				 mb_level = '1'
				 where mb_id = '$mb_id'";
$sql_query=sql_query($sql);		
// 이호경님 제안 코드
session_unset(); // 모든 세션변수를 언레지스터 시켜줌
session_destroy(); // 세션해제함

// 자동로그인 해제 --------------------------------
set_cookie('ck_mb_id', '', 0);
set_cookie('ck_auto', '', 0);
// 자동로그인 해제 end --------------------------------
	echo "<script>alert('会员注销成功');window.location='/'</script>";


}else{
		$mb_ck = trim($_POST['mb_password']);
		$mb_pass=get_encrypt_string($mb_ck);
		
		if ($member[mb_password]=="$mb_pass") {}else{
				alert('您输入的 密码 有误 请重新输入！');
		}
}


$g5['title'] = get_text($member['mb_name']).'会员注销';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>
		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">可以查到 您的个人信息 订单历史记录。</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            注销会员
            </h4>
            <span class="My_leave_confirm">
                <p>感谢您使用OOZOO BOX.</p>
            </span>
            <table class="confirm_info">
                <colgroup>
                    <col width="25%"></col>
                    <col></col>
                </colgroup>
                <tbody>
                    <tr>
                        <th>注销账号确认</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>账号</th>
                        <td><?=$member[mb_id]?></td>
                    </tr>
                    <tr>
                        <th>姓名</th>
                        <td><?=$member[mb_name]?></td>
                    </tr>
                </tbody>
            </table>
            <form method="post" name="fregisterform" >
            <input type="hidden" name="mb_id" value="<?=$member[mb_id]?>">
            <input type="hidden" name="w" value="u">
            <div class="My_leave_paragraph04">
                <b>请选择 注销 OOZOOBOX 的理由?</b>
                <ul class="My_leave_reason">
                	<li><label><input type="radio" name="mb_10" value="不会经常使用"/> 不会经常使用</label></li>
                    <li><label><input type="radio" name="mb_10" value="缺乏会员优惠"/> 缺乏会员优惠</label></li>
                    <li><label><input type="radio" name="mb_10" value="个人信息泄露的担忧"/> 个人信息泄露的担忧</label></li>
                    <li><label><input type="radio" name="mb_10" value="价格不满"/> 价格不满</label></li>
                    <li><label><input type="radio" name="mb_10" value="商品 品质不满"/> 商品 品质不满</label></li>
                    <li><label><input type="radio" name="mb_10" value="发货慢"/> 发货慢</label></li>
                    <li><label><input type="radio" name="mb_10" value="需要重新注册"/> 需要重新注册</label></li> 
                    <li><label><input type="radio" name="mb_10" value="其他"/> 其他 <input type="text" class="text" name="mb_100"></label></li> 
                </ul>
            </div>
            <div class="send_pw">
                    <button>
                        <img src="/images/btn_pass_ok_02.png" alt="申请注销OOZOOBOX"/>
                    </button>
            </div>
            </form>                  
        </div>
        <!--e: RIGHT CONTENTS-->
<?php  include_once('./_tail.php'); ?>
