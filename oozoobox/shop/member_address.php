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


//////////////////////////////地址写入///////////////////////////////////////////////////////////////////////
if($_POST[type]=="new"){

$ad_addr1          =$_POST[ad_addr1];
$ad_addr2          =$_POST[ad_addr2];
$ad_addr3          =$_POST[ad_addr3];
$ad_jibeon         =$_POST[ad_jibeon];
$ad_subject        =$_POST[ad_subject];
$ad_name           =$_POST[ad_name];
$ad_hp             =$_POST[ad_hp];
$ad_tel            ="{$_POST[ext1_00]}-{$_POST[ext1_01]}-{$_POST[ext1_02]}";
$mb_id             ="$member[mb_id]";


//////////////////    地址一   ///////////////////////////////////////
$ex1_filed = explode(",",$ad_addr1); 
$ext1_00  = $ex1_filed[0];

$sql1 = "SELECT * FROM destoon_area WHERE areaid = '$ext1_00'";
$result1 = sql_query($sql1);
$row1=sql_fetch_array($result1);


//////////////////    地址二   ///////////////////////////////////////
$ex2_filed = explode(",",$ad_addr2); 
$ext2_00  = $ex2_filed[0];

$sql2 = "SELECT * FROM destoon_area WHERE areaid = '$ext2_00'";
$result2 = sql_query($sql2);
$row2=sql_fetch_array($result2);


//////////////////    地址三   ///////////////////////////////////////
$ex3_filed = explode(",",$ad_addr3); 
$ext3_00  = $ex3_filed[0];

$sql3 = "SELECT * FROM destoon_area WHERE areaid = '$ext3_00'";
$result3 = sql_query($sql3);
$row3=sql_fetch_array($result3);


$sql = " insert into g5_shop_order_address
			set mb_id = '$mb_id',
				 ad_addr1 = '{$row1[areaname]}',
				 ad_addr2 = '{$row2[areaname]}',
				 ad_addr3 = '{$row3[areaname]}',
				 ad_jibeon = '$ad_jibeon',
				 ad_subject = '$ad_subject',
				 ad_name = '$ad_name',
				 ad_hp = '$ad_hp',
				 ad_tel = '$ad_tel'";
sql_query($sql);	

	echo "<script>alert('添加成功');window.location='./member_address.php'</script>";

}
////////////////////////////////////////////////////////////地址修改///////////////////////////////////////////////////////////////
if($_POST[type]=="update"){

$ad_addr1          =$_POST[ad_addr1];
$ad_addr2          =$_POST[ad_addr2];
$ad_addr3          =$_POST[ad_addr3];
$ad_jibeon         =$_POST[ad_jibeon];
$ad_subject        =$_POST[ad_subject];
$ad_name           =$_POST[ad_name];
$ad_hp             =$_POST[ad_hp];
$ad_tel            ="{$_POST[ext1_00]}-{$_POST[ext1_01]}-{$_POST[ext1_02]}";
$mb_id             ="$member[mb_id]";


//////////////////    地址一   ///////////////////////////////////////
$ex1_filed = explode(",",$ad_addr1); 
$ext1_00  = $ex1_filed[0];

$sql1 = "SELECT * FROM destoon_area WHERE areaid = '$ext1_00'";
$result1 = sql_query($sql1);
$row1=sql_fetch_array($result1);


//////////////////    地址二   ///////////////////////////////////////
$ex2_filed = explode(",",$ad_addr2); 
$ext2_00  = $ex2_filed[0];

$sql2 = "SELECT * FROM destoon_area WHERE areaid = '$ext2_00'";
$result2 = sql_query($sql2);
$row2=sql_fetch_array($result2);


//////////////////    地址三   ///////////////////////////////////////
$ex3_filed = explode(",",$ad_addr3); 
$ext3_00  = $ex3_filed[0];

$sql3 = "SELECT * FROM destoon_area WHERE areaid = '$ext3_00'";
$result3 = sql_query($sql3);
$row3=sql_fetch_array($result3);


$sql = " update g5_shop_order_address
			set mb_id = '$mb_id',
				 ad_addr1 = '{$row1[areaname]}',
				 ad_addr2 = '{$row2[areaname]}',
				 ad_addr3 = '{$row3[areaname]}',
				 ad_jibeon = '$ad_jibeon',
				 ad_subject = '$ad_subject',
				 ad_name = '$ad_name',
				 ad_hp = '$ad_hp',
				 ad_tel = '$ad_tel'
				 where ad_id = '$_POST[id]' and mb_id = '$member[mb_id]'";
$sql_query=sql_query($sql);		

	echo "<script>alert('修改成功');window.location='./member_address.php'</script>";

}

////////////////////////////////////////////////////////////删除地址///////////////////////////////////////////////////////////////
if($_GET[w]=="d"){

$sql_del="delete from  g5_shop_order_address where ad_id='$_GET[id]' and mb_id='$member[mb_id]' ";
$query_del=sql_query($sql_del);
echo "<script>alert('删除成功');window.location='./member_address.php'</script>";
}



////////////////////////////////////////////////////////////设为默认地址///////////////////////////////////////////////////////////////
if($_GET[type]=="default"){
	$sql = " update g5_shop_order_address
				set ad_default = '1'
				 where ad_id = '$_GET[id]' ";
	$sql_query=sql_query($sql);	
	
	$sql = " update g5_shop_order_address
				set ad_default = '0'
				 where ad_id = '$_GET[old]' ";
	$sql_query=sql_query($sql);	
	
	echo "<script>alert('操作成功');window.location='./member_address.php'</script>";
	

}





$sql = "SELECT * FROM g5_shop_order_address WHERE mb_id = '$member[mb_id]'";
$result = sql_query($sql);
?>
<!----------------------------------添加收货地址---开始------------------------------------------------------------------------------->
<script type="text/javascript"  src="/js/ct.js"></script>  
<style type="text/css">
    .linetd{ padding:10px; font-size:12px;}
	.linediv{float:left; padding-right:5px;}
	.overlay{
		position:fixed;
		top:0px;
		bottom:0px;
		left:0px;
		right:0px;
		z-index:99999;
		opacity:0.3; filter: alpha(opacity=50); background-color:#000; 
	}

	.box{
		position:fixed;
		top:-500px;
		left:30%;
		right:30%;
		background-color:#fff;
		color:#7F7F7F;
		padding:20px;
		z-index:999999;
		border:solid 5px #eee;
		}
		a.boxclose{
			float:right;
			width:26px;
			height:26px;				
			margin-top:-20px;
			cursor:pointer;
		}
</style>
<? if($_GET[w]=="u"){}else{?>
    <div class="overlay" id="overlay" style="display:none;"></div>
    <div class="box" id="box">
        <a class="boxclose" id="boxclose"> <span class="btn btn-black btn-sm">关闭</span></a>
      <h3>添加收货地址</h3>
        <table width="726" border="0" cellspacing="0" cellpadding="0" align="center">
        <form name="fregisterform" action="" method="post">
        <input type="hidden" name="type" value="new" />
          <tr>
            <td width="70" align="right" class="linetd">所在地区 *</td>
            <td>
                <div id="sel" style="width:400px;">
                    <select onChange="getCity(this)" name="ad_addr1" required style=" border:solid 1px #cccccc; margin-right:5px;">
                    <? if($member[mb_addr1]){?>
                        <option value=""><?=$member[mb_addr1]?></option>
                    <? }else{ ?>
                        <option value="">请选择--省</option>
                    <? } ?>
                    </select>
                    <select onChange="getCity(this)" name="ad_addr2" required style="border:solid 1px #cccccc; margin-right:5px;">
                    <? if($member[mb_addr2]){?>
                        <option value=""><?=$member[mb_addr2]?></option>
                    <? }else{ ?>
                        <option value="">请选择--市</option>
                    <? } ?>                                
                    </select>
                    <select onChange="getCity(this)" name="ad_addr3" required style="border:solid 1px #cccccc;">
                    <? if($member[mb_addr3]){?>
                        <option value=""><?=$member[mb_addr3]?></option>
                    <? }else{ ?>
                        <option value="">请选择--镇</option>
                    <? } ?>
                    </select> 
                </div>    
            </td>
          </tr>
          <tr>
            <td align="right" class="linetd">详细地址 *</td>
            <td><textarea name="ad_jibeon" class="form-control input-sm" id="mq" required style="width:318px; height:60px;" accesskey="s" role="combobox" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息"></textarea></td>
          </tr>
          <tr>
            <td align="right" class="linetd">邮政编码 *</td>
            <td><input name="ad_subject" type="text" class="form-control input-sm" required id="mq" style="width:200px; height:20px;" accesskey="s" value="" role="combobox" placeholder="如您不清楚邮递区号，请填写000000" /></td>
          </tr>
          <tr>
            <td align="right" class="linetd">收货人姓名 *</td>
            <td><input name="ad_name" type="text" class="form-control input-sm" required id="mq" style="width:200px; height:20px;" accesskey="s" value="" role="combobox" placeholder="长度不超过25个字符" /></td>
          </tr>
          <tr>
            <td align="right" class="linetd">手机号码 *</td>
            <td><input name="ad_hp" type="text" class="form-control input-sm" required id="mq" style="width:200px; height:20px;" accesskey="s" value="" maxlength="11" role="combobox" placeholder="手机号码必须填写" /></td>
          </tr>
          <tr>
            <td align="right" class="linetd">电话号码 *</td>
            <td>
                <div class="linediv">
                    <input name="ext1_00" type="text" class="form-control input-sm" required id="mq" style="width:40px; height:20px;" accesskey="s" value="" maxlength="4" role="combobox" placeholder="区号" /> 
                </div>
                <div class="linediv">
                    <input name="ext1_01" type="text" class="form-control input-sm" required id="mq" style="width:60px; height:20px;" accesskey="s" value="" maxlength="8" role="combobox" placeholder="电话号码" />
                </div>
                <div class="linediv">
                    <input name="ext1_02" type="text" class="form-control input-sm" required id="mq" style="width:46px; height:20px;" accesskey="s" value="" maxlength="6" role="combobox" placeholder="分机" />
                </div>    
            </td>
          </tr>
          <tr>
            <td align="right" class="linetd"></td>
            <td height="60"><input type="submit" value=" 确认保存 " class="btn btn-color btn-sm" /></td>
          </tr>
        </form>
        </table>  
        
    </div>                
<script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('#activator').click(function () {
				$('#overlay').fadeIn('fast', function () {
					$('#box').animate({ 'top': '150px' }, 500);
				});
			});
			$('#boxclose').click(function () {
				$('#box').animate({ 'top': '-500px' }, 500, function () {
					$('#overlay').fadeOut('fast');
				});
			});
		});
	});
</script>
<? } ?>
<!----------------------------------添加收货地址--结束-------------------------------------------------------------------------------->

		<a href="/shop/mypage.php"><h3 class="mp_tit">MY OOZOOBOX <span class="mp_tit_small">고객님의 개인정보, 주문 내역 등의 이용 기록을 조회할 수 있습니다.</span></h3></a>
		<? include ("member_left.php");?>   
        
        <!--s: RIGHT CONTENTS-->
        <div class="My_container">
        	<h4 class="Mypage_tit">
            我的收货地址
            </h4>
            <div class="text_box">
            	<p>
                	자주 사용하시는 배송지를 주소록에 등록해두시면 보다 편리하게 이용할 수 있습니다.<br>
                    최대 20개까지 등록하실 수 있습니다.
                </p>
            </div>
            <? 
				if($_GET[w]=="u"){
				$sql = "SELECT * FROM g5_shop_order_address WHERE ad_id = '$_GET[id]'";
				$view_ = sql_query($sql);
				$view=sql_fetch_array($view_);
				
				$ex1_filed = explode("-",$view[ad_tel]); 
				$tel_1  = $ex1_filed[0];
				$tel_2  = $ex1_filed[1];
				$tel_3  = $ex1_filed[2];
			?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <form name="fregisterform" action="" method="post">
                <input type="hidden" name="type" value="update" />
                <input type="hidden" name="id" value="<?=$_GET[id]?>" />
                  <tr>
                    <td colspan="2" class="linetd" style="background-color:#FF9900; color:#fff; font-weight:bold;">修改地址</td>
                  </tr>
                  <tr>
                    <td width="70" align="right" class="linetd">所在地区 *</td>
                    <td>
                        <div id="sel" style="width:400px;">
                            <select onChange="getCity(this)" name="ad_addr1" required style=" border:solid 1px #cccccc; margin-right:5px;">
                            <? if($member[mb_addr1]){?>
                                <option value=""><?=$view[ad_addr1]?></option>
                            <? }else{ ?>
                                <option value="">请选择--省</option>
                            <? } ?>
                            </select>
                            <select onChange="getCity(this)" name="ad_addr2" required style="border:solid 1px #cccccc; margin-right:5px;">
                            <? if($member[mb_addr2]){?>
                                <option value=""><?=$view[ad_addr2]?></option>
                            <? }else{ ?>
                                <option value="">请选择--市</option>
                            <? } ?>                                
                            </select>
                            <select onChange="getCity(this)" name="ad_addr3" required style="border:solid 1px #cccccc;">
                            <? if($member[mb_addr3]){?>
                                <option value=""><?=$view[ad_addr3]?></option>
                            <? }else{ ?>
                                <option value="">请选择--镇</option>
                            <? } ?>
                            </select> 
                        </div>                   
                      </td>
                  </tr>
                  <tr>
                    <td align="right" class="linetd">详细地址 *</td>
                    <td><textarea name="ad_jibeon" class="form-control input-sm" id="mq" required style="width:318px; height:60px;" accesskey="s" role="combobox" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息"><?=$view[ad_jibeon]?></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" class="linetd">邮政编码 *</td>
                    <td><input name="ad_subject" type="text" class="form-control input-sm" required id="mq" style="width:200px; height:20px;" accesskey="s" value="<?=$view[ad_subject]?>" role="combobox" placeholder="如您不清楚邮递区号，请填写000000" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="linetd">收货人姓名 *</td>
                    <td><input name="ad_name" type="text" class="form-control input-sm" required id="mq" style="width:200px; height:20px;" accesskey="s" value="<?=$view[ad_name]?>" role="combobox" placeholder="长度不超过25个字符" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="linetd">手机号码 *</td>
                    <td><input name="ad_hp" type="text" class="form-control input-sm" required id="mq" style="width:200px; height:20px;" accesskey="s" value="<?=$view[ad_hp]?>" maxlength="11" role="combobox" placeholder="手机号码必须填写" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="linetd">电话号码 *</td>
                    <td>
                        <div class="linediv">
                            <input name="ext1_00" type="text" class="form-control input-sm" required id="mq" style="width:40px; height:20px;" accesskey="s" value="<?=$tel_1?>" maxlength="4" role="combobox" placeholder="区号" /> 
                        </div>
                        <div class="linediv">
                            <input name="ext1_01" type="text" class="form-control input-sm" required id="mq" style="width:60px; height:20px;" accesskey="s" value="<?=$tel_2?>" maxlength="8" role="combobox" placeholder="电话号码" />
                        </div>
                        <div class="linediv">
                            <input name="ext1_02" type="text" class="form-control input-sm" required id="mq" style="width:46px; height:20px;" accesskey="s" value="<?=$tel_3?>" maxlength="6" role="combobox" placeholder="分机" />
                        </div>                    </td>
                  </tr>
                  <tr>
                    <td align="right" class="linetd"></td>
                    <td height="60"><input type="submit" value=" 确认修改 " class="btn btn-color btn-sm" /></td>
                  </tr>
                </form>
                </table>  
            <? }else{ ?>
                <div class="btn_wrap" style="text-align:right">
                    <a href="#" id="activator">
                        <img src="/images/btn_addaddress.png" alt="添加地址"/>
                    </a>
                </div>
            
				<div class="My_Page_boardlist">
            	<table class="tbl_board_style">
                	<colgroup>
                    	<col style="width:8%"/>
                        <col style="width:25%"/>
                        <col style="width:22%"/>
                        <col style="width:9%"/>
                        <col style="width:14%"/>
                        <col style="width:10%"/>
                        <col/>
                    </colgroup>
                    <thead>
                        <tr>
                        	<th>收货人</th>
                            <th>所在地区</th>
                            <th>详细地址</th>
                            <th>邮编</th>
                            <th>电话/手机</th>
                            <th>操作</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbl_board_place">
                    <? 
						$sql = "SELECT * FROM g5_shop_order_address WHERE mb_id = '$member[mb_id]' and ad_default = '1'";
						$old_ = sql_query($sql);
						$old=sql_fetch_array($old_);
					
						for ($i=0; $row=sql_fetch_array($result); $i++){
							$ex1_filed = explode("-",$row[ad_tel]); 
							$tel1  = $ex1_filed[0];
							$tel2  = $ex1_filed[1];
							$tel3  = $ex1_filed[2];
					?>
                    	<tr <? if($row[ad_default]=="1"){?>class="address_hover"<? } ?>>
                        	<td><?=$row[ad_name]?></td>
                            <td><?=$row[ad_addr1]?> <?=$row[ad_addr2]?> <?=$row[ad_addr3]?></td>
                            <td><?=$row[ad_jibeon]?></td>
                            <td><?=$row[ad_subject]?> </td>
                            <td><?=$tel1?>-<?=$tel2?> <br><?=$row[ad_hp]?></td>
                            <td>
                            	<a href="/shop/member_address.php?w=u&id=<?=$row[ad_id]?>">修改</a>
                                |
                                <a href="/shop/member_address.php?w=d&id=<?=$row[ad_id]?>">删除</a>
                            </td>
                            <td>
								<? if($row[ad_default]=="1"){?>
                            	<span class="add_fix">
                                	默认地址
                                </span>
                                <? }else{ ?>
                                <a href="/shop/member_address.php?type=default&id=<?=$row[ad_id]?>&old=<?=$old[ad_id]?>">
                                <span class="add_fix">
                                设为默认
                                </span>
                                </a>
                                <? } ?>
                            </td>
                        </tr>
                   <? } ?>                                                                 
                  </tbody>
                </table>
            </div>   
            <? } ?>    
        </div>
        <!--e: RIGHT CONTENTS-->
<?php  include_once('./_tail.php'); ?>
