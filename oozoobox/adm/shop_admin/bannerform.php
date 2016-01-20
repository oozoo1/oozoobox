<?php
$sub_menu = '100000';
include_once('./_common.php');

auth_check($auth[$sub_menu], "w");

$html_title = '배너';
$g5['title'] = $html_title.'관리';

if ($w=="u")
{
    $html_title .= ' 수정';
    $sql = " select * from {$g5['g5_shop_banner_table']} where bn_id = '$bn_id' ";
    $bn = sql_fetch($sql);
}
else
{
    $html_title .= ' 입력';
    $bn['bn_url']        = "http://www.oozoobox.com";
    $bn['bn_begin_time'] = date("Y-m-d 00:00:00", time());
    $bn['bn_end_time']   = date("Y-m-d 00:00:00", time()+(60*60*24*31));
}

// 접속기기 필드 추가
if(!sql_query(" select bn_device from {$g5['g5_shop_banner_table']} limit 0, 1 ")) {
    sql_query(" ALTER TABLE `{$g5['g5_shop_banner_table']}`
                    ADD `bn_device` varchar(10) not null default '' AFTER `bn_url` ", true);
    sql_query(" update {$g5['g5_shop_banner_table']} set bn_device = 'pc' ", true);
}

include_once (G5_ADMIN_PATH.'/admin.head.php');
?>
<style type="text/css">
#mbOverlay { position:fixed; z-index:9998; top:0; left:0; width:100%; height:100%; background-color:#000; cursor:pointer; }
#mbCenter { height:557px; position:absolute; z-index:9999; left:50%; background-color:#fff; -moz-border-radius:10px; -webkit-border-radius:10px; -moz-box-shadow:0 10px 40px rgba(0, 0, 0, 0.70); -webkit-box-shadow:0 10px 40px rgba(0, 0, 0, 0.70); }
#mbCenter.mbLoading { background:#fff url(img/WhiteLoading.gif) no-repeat center; -moz-box-shadow:none; -webkit-box-shadow:none; }
#mbImage { left:0; top:0; font-family:Myriad, Verdana, Arial, Helvetica, sans-serif; line-height:20px; font-size:12px; color:#fff; text-align:left; background-position:center center; background-repeat:no-repeat; padding:10px; }
</style>
<script type="text/javascript" src="js/mootools-core.js"></script>
<script type="text/javascript" src="js/mediabox.js"></script>
<form name="fbanner" action="./bannerformupdate.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="bn_id" value="<?php echo $bn_id; ?>">
<input type="hidden" name="b_img1" value="<?php echo $bn['bn_img1']; ?>">
<input type="hidden" name="b_img2" value="<?php echo $bn['bn_img2']; ?>">

<div class="tbl_frm01 tbl_wrap">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" valign="top">
        <table>
        <caption><?php echo $g5['title']; ?></caption>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="bn_position">출력위치</label></th>
            <td>
                <?php echo help("분류선택해주세요!"); ?>
                <select name="bn_position" id="bn_position" style="width:100px;">
                    <option value="a1" <?php echo get_selected($bn['bn_position'], 'a1'); ?><? if($_GET[ct]=="a1"){?>selected="selected"<? } ?>>A-1</option>
                    <option value="a2" <?php echo get_selected($bn['bn_position'], 'a2'); ?><? if($_GET[ct]=="a2"){?>selected="selected"<? } ?>>A-2</option>
                    <option value="a3" <?php echo get_selected($bn['bn_position'], 'a3'); ?><? if($_GET[ct]=="a3"){?>selected="selected"<? } ?>>A-3</option>
                    <option value="a4" <?php echo get_selected($bn['bn_position'], 'a4'); ?><? if($_GET[ct]=="a4"){?>selected="selected"<? } ?>>A-4</option>
                    <option value="a5" <?php echo get_selected($bn['bn_position'], 'a5'); ?><? if($_GET[ct]=="a5"){?>selected="selected"<? } ?>>A-5</option>
                    <option value="a6" <?php echo get_selected($bn['bn_position'], 'a6'); ?><? if($_GET[ct]=="a6"){?>selected="selected"<? } ?>>A-6</option>
                    <option value="a7" <?php echo get_selected($bn['bn_position'], 'a7'); ?><? if($_GET[ct]=="a7"){?>selected="selected"<? } ?>>A-7</option>
                    <option value="a8" <?php echo get_selected($bn['bn_position'], 'a8'); ?><? if($_GET[ct]=="a8"){?>selected="selected"<? } ?>>A-8</option>
                    <option value="a9" <?php echo get_selected($bn['bn_position'], 'a9'); ?><? if($_GET[ct]=="a9"){?>selected="selected"<? } ?>>A-9</option>
                    <option value="a10" <?php echo get_selected($bn['bn_position'], 'a10'); ?><? if($_GET[ct]=="a10"){?>selected="selected"<? } ?>>A-10</option>
                    <option value="a11" <?php echo get_selected($bn['bn_position'], 'a11'); ?><? if($_GET[ct]=="a11"){?>selected="selected"<? } ?>>A-11</option>
                    <option value="a12" <?php echo get_selected($bn['bn_position'], 'a12'); ?><? if($_GET[ct]=="a12"){?>selected="selected"<? } ?>>A-12</option>
                    <option value="a13" <?php echo get_selected($bn['bn_position'], 'a13'); ?><? if($_GET[ct]=="a13"){?>selected="selected"<? } ?>>A-13</option>
                    <option value="a14" <?php echo get_selected($bn['bn_position'], 'a14'); ?><? if($_GET[ct]=="a14"){?>selected="selected"<? } ?>>A-14</option>
                    <option value="a15" <?php echo get_selected($bn['bn_position'], 'a15'); ?><? if($_GET[ct]=="a15"){?>selected="selected"<? } ?>>A-15</option>
                    <option value="a16" <?php echo get_selected($bn['bn_position'], 'a16'); ?><? if($_GET[ct]=="a16"){?>selected="selected"<? } ?>>A-16</option>
                    <option value="a17" <?php echo get_selected($bn['bn_position'], 'a17'); ?><? if($_GET[ct]=="a17"){?>selected="selected"<? } ?>>A-17</option>
                    <option value="a18" <?php echo get_selected($bn['bn_position'], 'a18'); ?><? if($_GET[ct]=="a18"){?>selected="selected"<? } ?>>A-18</option>
                    <option value="a19" <?php echo get_selected($bn['bn_position'], 'a19'); ?><? if($_GET[ct]=="a19"){?>selected="selected"<? } ?>>A-19</option>
                    <option value="a20" <?php echo get_selected($bn['bn_position'], 'a20'); ?><? if($_GET[ct]=="a20"){?>selected="selected"<? } ?>>A-20</option>
                    <option value="a21" <?php echo get_selected($bn['bn_position'], 'a21'); ?><? if($_GET[ct]=="a21"){?>selected="selected"<? } ?>>A-21</option>
                    <option value="a22" <?php echo get_selected($bn['bn_position'], 'a22'); ?><? if($_GET[ct]=="a22"){?>selected="selected"<? } ?>>A-22</option>
                    <option value="a23" <?php echo get_selected($bn['bn_position'], 'a23'); ?><? if($_GET[ct]=="a23"){?>selected="selected"<? } ?>>A-23</option>               
              </select>
            </td>
        </tr>
        <tr>
            <th scope="row">이미지1</th>
            <td>
                <input type="file" name="bn_img1">
                <?php
                $bimg_str = "";
                $bimg = G5_DATA_PATH."/banner/{$bn['bn_img1']}";
                if (file_exists($bimg) && $bn['bn_img1']) {
                    $size = @getimagesize($bimg);
                    if($size[0] && $size[0] > 750)
                        $width = 750;
                    else
                        $width = $size[0];
    
                    echo '<input type="checkbox" name="bn_img1_del" value="1" id="bn_img1_del"> <label for="bn_img1_del">삭제</label>';
                    $bimg_str = '<img src="'.G5_DATA_URL.'/banner/'.$bn['bn_img1'].'" width="200">';
                }
                if ($bimg_str) {
                    echo '<div class="banner_or_img">';
                    echo $bimg_str;
                    echo '</div>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">이미지2</th>
            <td>
                <input type="file" name="bn_img2">
                <?php
                $bimg_str = "";
                $bimg = G5_DATA_PATH."/banner/{$bn['bn_img2']}";
                if (file_exists($bimg) && $bn['bn_img2']) {
                    $size = @getimagesize($bimg);
                    if($size[0] && $size[0] > 750)
                        $width = 750;
                    else
                        $width = $size[0];
    
                    echo '<input type="checkbox" name="bn_img2_del" value="1" id="bn_img2_del"> <label for="bn_img2_del">삭제</label>';
                    $bimg_str = '<img src="'.G5_DATA_URL.'/banner/'.$bn['bn_img2'].'" width="200">';
                }
                if ($bimg_str) {
                    echo '<div class="banner_or_img">';
                    echo $bimg_str;
                    echo '</div>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_alt">배경색상</label></th>
            <td>
                <?php echo help("img 태그의 alt, title 에 해당되는 내용입니다.\n배너에 마우스를 오버하면 이미지의 설명이 나옵니다."); ?>
                <input type="text" name="bn_bg_color" value="<?php echo $bn['bn_bg_color']; ?>" id="bn_alt" class="frm_input" size="10" placeholder=" #000000" style="background-color:<?php echo $bn['bn_bg_color']; ?>;">
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_alt">배너제목</label></th>
            <td>
                <?php echo help("img 태그의 alt, title 에 해당되는 내용입니다.\n배너에 마우스를 오버하면 이미지의 설명이 나옵니다."); ?>
                <input type="text" name="bn_alt" value="<?php echo $bn['bn_alt']; ?>" id="bn_alt" class="frm_input" size="80">
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_alt">배너내용</label></th>
            <td>
                <?php echo help("내용필요하신배너만 입력합니다!"); ?>
                <textarea name="bn_memo" class="frm_input" id="bn_memo"><?php echo $bn['bn_memo']; ?></textarea>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_url">링크</label></th>
            <td>
                <?php echo help("배너클릭시 이동하는 주소입니다."); ?>
                <input type="text" name="bn_url" size="80" value="<?php echo $bn['bn_url']; ?>" id="bn_url" class="frm_input">
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_device">접속기기</label></th>
            <td>
                <?php echo help('배너를 표시할 접속기기를 선택합니다.'); ?>
                <select name="bn_device" id="bn_device">
                    <option value="both"<?php echo get_selected($bn['bn_device'], 'both', true); ?>>PC와 모바일</option>
                    <option value="pc"<?php echo get_selected($bn['bn_device'], 'pc'); ?>>PC</option>
                    <option value="mobile"<?php echo get_selected($bn['bn_device'], 'mobile'); ?>>모바일</option>
            </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_border">테두리</label></th>
            <td>
                 <?php echo help("배너이미지에 테두리를 넣을지를 설정합니다.", 50); ?>
                <select name="bn_border" id="bn_border">
                    <option value="0" <?php echo get_selected($bn['bn_border'], 0); ?>>사용안함</option>
                    <option value="1" <?php echo get_selected($bn['bn_border'], 1); ?>>사용</option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_new_win">새창</label></th>
            <td>
                <?php echo help("배너클릭시 새창을 띄울지를 설정합니다.", 50); ?>
                <select name="bn_new_win" id="bn_new_win">
                    <option value="0" <?php echo get_selected($bn['bn_new_win'], 0); ?>>사용안함</option>
                    <option value="1" <?php echo get_selected($bn['bn_new_win'], 1); ?>>사용</option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_begin_time">시작일시</label></th>
            <td>
                <?php echo help("배너 게시 시작일시를 설정합니다."); ?>
                <input type="text" name="bn_begin_time" value="<?php echo $bn['bn_begin_time']; ?>" id="bn_begin_time" class="frm_input"  size="21" maxlength="19">
                <input type="checkbox" name="bn_begin_chk" value="<?php echo date("Y-m-d 00:00:00", time()); ?>" id="bn_begin_chk" onclick="if (this.checked == true) this.form.bn_begin_time.value=this.form.bn_begin_chk.value; else this.form.bn_begin_time.value = this.form.bn_begin_time.defaultValue;">
                <label for="bn_begin_chk">오늘</label>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_end_time">종료일시</label></th>
            <td>
                <?php echo help("배너 게시 종료일시를 설정합니다."); ?>
                <input type="text" name="bn_end_time" value="<?php echo $bn['bn_end_time']; ?>" id="bn_end_time" class="frm_input" size=21 maxlength=19>
                <input type="checkbox" name="bn_end_chk" value="<?php echo date("Y-m-d 23:59:59", time()+60*60*24*31); ?>" id="bn_end_chk" onclick="if (this.checked == true) this.form.bn_end_time.value=this.form.bn_end_chk.value; else this.form.bn_end_time.value = this.form.bn_end_time.defaultValue;">
                <label for="bn_end_chk">오늘+31일</label>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="bn_order">출력 순서</label></th>
            <td>
               <?php echo help("배너를 출력할 때 순서를 정합니다. 숫자가 작을수록 먼저 출력됩니다."); ?>
               <?php echo order_select("bn_order", $bn['bn_order']); ?>
            </td>
        </tr>
        </tbody>
        </table>
    </td>
    <td valign="top"><img src="img/ad.jpg"></td>
  </tr>
</table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./bannerlist.php">목록</a>
</div>

</form>
<script type="text/javascript">
Mediabox.scanPage = function() {
  var links = $$("a").filter(function(el) {
    return el.rel && el.rel.test(/^lightbox/i);
  });
  $$(links).mediabox({/* Put custom options here */}, null, function(el) {
    var rel0 = this.rel.replace(/[[]|]/gi," ");
    var relsize = rel0.split(" ");
    return (this == el) || ((this.rel.length > 8) && el.rel.match(relsize[1]));
  });
};
window.addEvent("domready", Mediabox.scanPage);
</script>
<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
