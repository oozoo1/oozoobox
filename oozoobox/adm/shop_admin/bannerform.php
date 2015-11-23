<?php
$sub_menu = '500500';
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

<div class="tbl_frm01 tbl_wrap">
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
            <select name="bn_position" id="bn_position">
                <option value="main_top" <?php echo get_selected($bn['bn_position'], 'main_top'); ?>>메인TOP</option>
                
                <option>--------------------</option>
                
                <option value="main_tops1" <?php echo get_selected($bn['bn_position'], 'main_tops1'); ?>>메인탑슬라이드1</option>
                <option value="main_tops2" <?php echo get_selected($bn['bn_position'], 'main_tops2'); ?>>메인탑슬라이드2</option>
                <option value="main_tops3" <?php echo get_selected($bn['bn_position'], 'main_tops3'); ?>>메인탑슬라이드3</option>
                <option value="main_tops4" <?php echo get_selected($bn['bn_position'], 'main_tops4'); ?>>메인탑슬라이드4</option>
                <option value="main_tops5" <?php echo get_selected($bn['bn_position'], 'main_tops5'); ?>>메인탑슬라이드5</option>
                <option>--------------------</option>
                <option value="main1_left" <?php echo get_selected($bn['bn_position'], 'main1_left'); ?>>메인1좌</option>
                <option value="main1_right" <?php echo get_selected($bn['bn_position'], 'main1_right'); ?>>메인1우</option>
                <option value="main2_left" <?php echo get_selected($bn['bn_position'], 'main2_left'); ?>>메인2좌</option>
                <option value="main2_right" <?php echo get_selected($bn['bn_position'], 'main2_right'); ?>>메인2우</option>
                <option value="main3_left" <?php echo get_selected($bn['bn_position'], 'main3_left'); ?>>메인3좌</option>
                <option value="main3_right" <?php echo get_selected($bn['bn_position'], 'main3_right'); ?>>메인3우</option>
                <option value="main4_left" <?php echo get_selected($bn['bn_position'], 'main4_left'); ?>>메인4좌</option>
                <option value="main4_right" <?php echo get_selected($bn['bn_position'], 'main4_right'); ?>>메인4우</option>
                <option value="main5_left" <?php echo get_selected($bn['bn_position'], 'main5_left'); ?>>메인5좌</option>
                <option value="main5_right" <?php echo get_selected($bn['bn_position'], 'main5_right'); ?>>메인5우</option>
                <option>--------------------</option>
                <option value="baner0_1" <?php echo get_selected($bn['bn_position'], 'baner0_1'); ?>>메인배너A</option>
                <option>--------------------</option>
                <option value="menu_1" <?php echo get_selected($bn['bn_position'], 'menu_1'); ?>>메뉴배너1</option>
                <option value="menu_2" <?php echo get_selected($bn['bn_position'], 'menu_2'); ?>>메뉴배너2</option>
                <option value="menu_3" <?php echo get_selected($bn['bn_position'], 'menu_3'); ?>>메뉴배너3</option>
                <option value="menu_4" <?php echo get_selected($bn['bn_position'], 'menu_4'); ?>>메뉴배너4</option>
                <option value="menu_5" <?php echo get_selected($bn['bn_position'], 'menu_5'); ?>>메뉴배너5</option>
                <option>--------------------</option>
                <option value="baner1_1" <?php echo get_selected($bn['bn_position'], 'baner1_1'); ?>>배너A1</option>
                <option value="baner1_2" <?php echo get_selected($bn['bn_position'], 'baner1_2'); ?>>배너A2</option>
                <option value="baner1_3" <?php echo get_selected($bn['bn_position'], 'baner1_3'); ?>>배너A3</option>
                <option value="baner1_4" <?php echo get_selected($bn['bn_position'], 'baner1_4'); ?>>배너A4</option>
                <option>--------------------</option>
                <option value="baner2_1" <?php echo get_selected($bn['bn_position'], 'baner2_1'); ?>>배너B1</option>
                <option value="baner2_2" <?php echo get_selected($bn['bn_position'], 'baner2_2'); ?>>배너B2</option>
                <option value="baner2_3" <?php echo get_selected($bn['bn_position'], 'baner2_3'); ?>>배너B3</option>
                <option value="baner2_4" <?php echo get_selected($bn['bn_position'], 'baner2_4'); ?>>배너B4</option>
                <option value="baner2_5" <?php echo get_selected($bn['bn_position'], 'baner2_5'); ?>>배너B5</option>
                <option value="baner2_6" <?php echo get_selected($bn['bn_position'], 'baner2_6'); ?>>배너B6</option>
                <option value="baner2_7" <?php echo get_selected($bn['bn_position'], 'baner2_7'); ?>>배너B7</option>
                
       		</select> <a href="img/ad.jpg" rel="lightbox[ostec]">위치확인하기</a>
        </td>
    </tr>
    <tr>
        <th scope="row">이미지</th>
        <td>
            <input type="file" name="bn_bimg">
            <?php
            $bimg_str = "";
            $bimg = G5_DATA_PATH."/banner/{$bn['bn_id']}";
            if (file_exists($bimg) && $bn['bn_id']) {
                $size = @getimagesize($bimg);
                if($size[0] && $size[0] > 750)
                    $width = 750;
                else
                    $width = $size[0];

                echo '<input type="checkbox" name="bn_bimg_del" value="1" id="bn_bimg_del"> <label for="bn_bimg_del">삭제</label>';
                $bimg_str = '<img src="'.G5_DATA_URL.'/banner/'.$bn['bn_id'].'" width="200">';
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
