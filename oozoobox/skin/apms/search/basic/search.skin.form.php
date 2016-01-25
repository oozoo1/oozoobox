<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<style>
.sc_title_off{float:left;padding:12px 20px 12px 20px; border-left:solid 1px #f5f5f5; border-right:solid 1px #f5f5f5; color:#6d6d6d;}
.sc_title_on{float:left;padding:12px 20px 12px 20px; border-left:solid 1px #fff; border-right:solid 1px #e5e5e5; color:#ff5500; background-color:#ffffff;}
.sc_title_on2{float:left;padding:12px 20px 12px 20px; border-left:solid 1px #e5e5e5; border-right:solid 1px #e5e5e5; color:#ff5500; background-color:#ffffff;}
.sc_input{ width:45px; height:21px; border:solid 1px #e8e8e8; color:#6d6d6d;}

</style>
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
<form id="frmdetailsearch" name="frmdetailsearch" class="form-horizontal" role="form">
<input type="hidden" name="qsort" id="qsort" value="<?php echo $qsort ?>">
<input type="hidden" name="qorder" id="qorder" value="<?php echo $qorder ?>">
<input type="hidden" name="qcaid" id="qcaid" value="<?php echo $qcaid ?>">
  <tr>
    <td bgcolor="#f5f5f5" style="border:solid 1px #e8e8e8;">
      <table width="988" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td>
            <a href="/shop/search.php?qsort=&qorder=desc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><div class="<? if($_GET[qsort]==""){ echo "sc_title_on"; }else{ echo "sc_title_off"; } ?>">综合</div></a>
            <a href="/shop/search.php?qsort=it_sum_qty&qorder=desc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><div class="<? if($_GET[qsort]=="it_sum_qty"){ echo "sc_title_on2"; }else{ echo "sc_title_off"; } ?>">销量</div></a>
            <a href="/shop/search.php?qsort=it_price&qorder=desc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><div class="<? if($_GET[qsort]=="it_price" and $_GET[qorder]=="desc"){ echo "sc_title_on2"; }else{ echo "sc_title_off"; } ?>">价格从高到底</div></a>
            <a href="/shop/search.php?qsort=it_price&qorder=asc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><div class="<? if($_GET[qsort]=="it_price" and $_GET[qorder]=="asc"){ echo "sc_title_on2"; }else{ echo "sc_title_off"; } ?>">价格从底到高</div></a>
            <a href="/shop/search.php?qsort=it_use_avg&qorder=desc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><div class="<? if($_GET[qsort]=="it_use_avg"){ echo "sc_title_on2"; }else{ echo "sc_title_off"; } ?>">评价</div></a>
            <a href="/shop//search.php?qsort=it_update_time&qorder=desc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><div class="<? if($_GET[qsort]=="it_update_time"){ echo "sc_title_on2"; }else{ echo "sc_title_off"; } ?>">上市时间</div></a>
          </td>
          <td width="118"><input type="text" name="qfrom" value="<?php echo $qfrom; ?>" id="ssch_qfrom" class="sc_input" size="10" placeholder=" ¥"> - <input type="text" name="qto" value="<?php echo $qto; ?>" id="ssch_qto" class="sc_input" size="10" placeholder=" ¥"></td>
          <td width="34"><button type="submit" style="border:solid 0px;"><img src="/images/sc_bt.png"></button></td>
          <td width="43"><a href="/shop/search.php?qsort=&qorder=desc&qcaid=&qname=1&qexplan=1&qid=1&qtag=1&qfrom=&qto=&q=<?=$_GET[q]?>"><img src="/images/sc_c.png"></a></td>
        </tr>
      </table>    
    </td>
  </tr>
</form>
</table>