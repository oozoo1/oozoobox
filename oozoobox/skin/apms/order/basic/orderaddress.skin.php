<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$skin_url.'/style.css" media="screen">', 0);

// 목록헤드
if(isset($wset['ahead']) && $wset['ahead']) {
	add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/head/'.$wset['ahead'].'.css" media="screen">', 0);
	$head_class = 'list-head';
} else {
	$head_class = (isset($wset['acolor']) && $wset['acolor']) ? 'tr-head border-'.$wset['acolor'] : 'tr-head border-black';
}

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
echo "<script>document.location.href='/shop/orderaddress.php'</script>";





}
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
		z-index:100;
		opacity:0.3; filter: alpha(opacity=30); background-color:#000; 
	}

	.box{
		position:fixed;
		top:-500px;
		left:30%;
		right:30%;
		background-color:#fff;
		color:#7F7F7F;
		padding:20px;
		z-index:101;
		}
		a.boxclose{
			float:right;
			width:26px;
			height:26px;				
			margin-top:-20px;
			cursor:pointer;
		}
</style>
<a href="#" id="activator" class="btn btn-color btn-sm">添加收货地址</a>
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
                    <select onChange="getCity(this)" name="ad_addr1" required style="width:110px; border:solid 1px #cccccc; padding:10px; margin-right:5px;">
                    <? if($member[mb_addr1]){?>
                        <option value=""><?=$member[mb_addr1]?></option>
                    <? }else{ ?>
                        <option value="">请选择--省</option>
                    <? } ?>
                    </select>
                    <select onChange="getCity(this)" name="ad_addr2" required style="width:110px; border:solid 1px #cccccc; padding:10px; margin-right:5px;">
                    <? if($member[mb_addr2]){?>
                        <option value=""><?=$member[mb_addr2]?></option>
                    <? }else{ ?>
                        <option value="">请选择--市</option>
                    <? } ?>                                
                    </select>
                    <select onChange="getCity(this)" name="ad_addr3" required style="width:110px; border:solid 1px #cccccc; padding:10px;">
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
<!----------------------------------添加收货地址--结束-------------------------------------------------------------------------------->


<form class="form" role="form" name="forderaddress" method="post" action="<?php echo $action_url; ?>" autocomplete="off">
<div id="sod_addr">
	<div class="table-responsive">
		<table class="div-table table">
		<tbody>
		<tr class="<?php echo $head_class;?>">
            <th scope="col">
                <label for="chk_all" class="sound_only">全部选择</label>
                <span><input type="checkbox" name="chk_all" id="chk_all"></span>
            </th>
            <th scope="col"><span>收货地址 标题</span></th>
            <th scope="col"><span>默认</span></th>
            <th scope="col"><span>收货人</span></th>
            <th scope="col"><span>电话号码</span></th>
            <th scope="col"><span>地址</span></th>
            <th scope="col"><span class="last">管理</span></th>
        </tr>
        <?php for($i=0; $i < count($list); $i++) { ?>
			<tr<?php echo ($i == 0) ? ' class="tr-line"' : '';?>>
				<td class="text-center">
					<input type="hidden" name="ad_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['ad_id'];?>">
					<label for="chk_<?php echo $i;?>" class="sound_only">배송지선택</label>
					<input type="checkbox" name="chk[]" value="<?php echo $i;?>" id="chk_<?php echo $i;?>">
				</td>
				<td class="text-center">
					<label for="ad_subject<?php echo $i;?>" class="sound_only">배송지명</label>
					<input type="text" name="ad_subject[<?php echo $i; ?>]" id="ad_subject<?php echo $i;?>" class="form-control input-sm" size="12" maxlength="20" value="<?php echo $list[$i]['ad_subject']; ?>">
				</td>
				<td class="text-center">
					<label for="ad_default<?php echo $i;?>" class="sound_only">기본배송지</label>
					<input type="radio" name="ad_default" value="<?php echo $list[$i]['ad_id'];?>" id="ad_default<?php echo $i;?>" <?php if($list[$i]['ad_default']) echo 'checked="checked"';?>>
				</td>
				<td class="text-center"><?php echo $list[$i]['ad_name']; ?></td>
				<td class="text-center"><?php echo $list[$i]['ad_tel']; ?><br><?php echo $list[$i]['ad_hp']; ?></td>
				<td><?php echo $list[$i]['print_addr']; ?></td>
				<td class="text-center">
					<input type="hidden" value="<?php echo $list[$i]['addr']; ?>">
					<button type="button" class="sel_address btn btn-color btn-xs" title="선택"><i class="fa fa-check fa-lg"></i><span class="sound_only">선택</span></button>
					<a href="<?php echo $list[$i]['del_href']; ?>" class="del_address btn btn-black btn-xs" title="삭제"><i class="fa fa-times fa-lg"></i><span class="sound_only">삭제</span></a>
				</td>
			</tr>
        <?php } ?>
        </tbody>
        </table>
    </div>

	<div style="margin:0px 20px 20px;">
		<div class="pull-left">
			<input type="submit" name="act_button" value="선택수정" id="btn_submit" class="btn btn-color btn-sm">
			<button type="button" onclick="self.close();" class="btn btn-black btn-sm">닫기</button>
		</div>

		<?php if($total_count > 0) { ?>
			<div class="pull-right">
				<ul class="pagination pagination-sm" style="margin-top:0; padding-top:0;">
					<?php echo apms_paging($write_pages, $page, $total_page, $address_page); ?>
				</ul>
			</div>
		<?php } ?>

		<div class="clearfix"></div>
	</div>
</div>
</form>

<script>
$(function() {
    $(".sel_address").on("click", function() {
        var addr = $(this).siblings("input").val().split(String.fromCharCode(30));

        var f = window.opener.forderform;
        f.od_b_name.value        = addr[0];
        f.od_b_tel.value         = addr[1];
        f.od_b_hp.value          = addr[2];
        f.od_b_zip.value         = addr[3] + addr[4];
        f.od_b_addr1.value       = addr[5];
        f.od_b_addr2.value       = addr[6];
        f.od_b_addr3.value       = addr[7];
        f.od_b_addr_jibeon.value = addr[8];
        f.ad_subject.value       = addr[9];

        var zip1 = addr[3].replace(/[^0-9]/g, "");
        var zip2 = addr[4].replace(/[^0-9]/g, "");

        if(zip1 != "" && zip2 != "") {
            var code = String(zip1) + String(zip2);

            if(window.opener.zipcode != code) {
                window.opener.zipcode = code;
                window.opener.calculate_sendcost(code);
            }
        }

        window.close();
    });

    $(".del_address").on("click", function() {
        return confirm("배송지 목록을 삭제하시겠습니까?");
    });

    // 전체선택 부분
    $("#chk_all").on("click", function() {
        if($(this).is(":checked")) {
            $("input[name^='chk[']").attr("checked", true);
        } else {
            $("input[name^='chk[']").attr("checked", false);
        }
    });

    $("#btn_submit").on("click", function() {
        if($("input[name^='chk[']:checked").length==0 ){
            alert("수정하실 항목을 하나 이상 선택하세요.");
            return false;
        }
    });

});
</script>
