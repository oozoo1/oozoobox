<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
include_once('./mypage_head.php');
?>
<script type="text/javascript"><!--自动检查账号是否被注册-->
	$(
	  function()
	  	{    
		//账号   jQuery(普通应用时推荐，简单易用)
    	$("#reg_mb_id").blur(function()
								 {        //文本框鼠标焦点消失事件
			 						$.get("./member_ck_id.php?user="+$("#reg_mb_id").val(),null,function(data)   //此处get方式 可换为post方式按需求调整，其他无需修改使用方式一样
      		 					 	{
          		  						$("#chk").html(data);   //向ID为chk的元素内添加html代码
       		 						}
			 						);
       	 						}
						)		
						
		//邮箱   jQuery(普通应用时推荐，简单易用)
    	$("#mb_email").blur(function()
								 {        //文本框鼠标焦点消失事件
			 						$.get("/bbs/member_ck_id.php?mail="+$("#mb_email").val(),null,function(data)   //此处get方式 可换为post方式按需求调整，其他无需修改使用方式一样
      		 					 	{
          		  						$("#email").html(data);   //向ID为chk的元素内添加html代码
       		 						}
			 						);
       	 						}
						)		
			
						
						     
		}
	)
</script> 
<style>
.wdivbox{box-shadow:0px 0px 20px 0px rgba(0,0,0,0.15); border:solid 1px #eee;}
.wheight{ padding:5px 10px 5px 10px;}
.winput{ border:solid 1px #e8e8e8; width:100%; height:34px; color:#666666;}
.winput1{ border:solid 1px #e8e8e8; width:80%; height:34px; color:#666666;}
</style>
<div class="wdivbox">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!-- 게시물 작성/수정 시작 { -->
      <form name="fitemrecommend" class="form-light padding-15" role="form" method="post" action="./itemrecommendmail.php" autocomplete="off" onsubmit="return fitemrecommend_check(this);">
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <input type="hidden" name="it_id" value="<?php echo $it_id; ?>">
      <tr>
        <td height="40" background="/images/title_bg_01.png" align="center"><span style="font-size:16px; font-weight:bold; color:#fff;">找朋友付款-看看你们的关系如何?</span></td>
      </tr>
      <tr>
        <td height="40">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100" height="100" align="center"><a href="/shop/item.php?it_id=<?=$_GET[it_id]?>&ca_id=<?=$_GET[ca_id]?>"><img src="/data/item/<?php echo $it['it_img1']; ?>" width="80" height="80" style="border:solid 1px #ddd;"></a></td>
              <td valign="top" style="line-height:20px; padding-top:10px;"><a href="/shop/item.php?it_id=<?=$_GET[it_id]?>&ca_id=<?=$_GET[ca_id]?>"><?php echo $it['it_name']; ?></a><br><?php echo $it['it_price']; ?> 元</td>
            </tr>
          </table>	
				</td>
      </tr>
      <?php if ($is_category) { ?>
      <tr>
        <td class="wheight">
            <select name="ca_name" id="ca_name" required class="winput">
                <option value="">&nbsp;&nbsp; 请选择分类</option>
                <?php echo $category_option ?>
            </select>
        </td>
      </tr>
      <? } ?>
      <tr>
        <td class="wheight"><input type="text" name="to_email" id="mb_email" required class="winput1" size="51" placeholder="   请输入邮箱地址"> <span id="email"></span></td>
      </tr>
      <tr>
        <td class="wheight"><input type="text" name="subject" id="subject" required class="winput" size="51" placeholder="   请输入标题"></td>
      </tr>
      <tr>
        <td class="wheight"><textarea name="content" id="content" rows=4 required class="winput" placeholder="   请输入内容,为了让朋友 付款 美言几句" style="height:100px;"></textarea></td>
      </tr>
      <tr>
        <td height="20" style="border-bottom:solid 1px #eee;"></td>
      </tr>
      <tr>
        <td class="wheight" height="100" align="center">
          <div class="text-center">
            <button type="submit" id="btn_submit" class="btn btn-color btn-sm">发送</button>
            <a href="/shop/item.php?it_id=<?=$_GET[it_id]?>&ca_id=<?=$_GET[ca_id]?>" class="btn btn-black btn-sm">取消</a>
          </div>
        </td>
      </tr>
      </form>
    </table>
</div>
<script>
function fitemrecommend_check(f) {
    return true;
}
</script>
<?php  include_once('./mypage_tail.php'); ?>