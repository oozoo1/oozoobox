<?php
$sub_menu = '100000';
include_once('./_common.php');

auth_check($auth[$sub_menu], "r");

$g5['title'] = '배너관리';
include_once (G5_ADMIN_PATH.'/admin.head.php');

if($_GET[type]){
	$type="WHERE bn_position = '{$_GET[type]}'";
}

$sql_common = " from {$g5['g5_shop_banner_table']} $type";

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
?>
<style>
.bt_type_off{padding:10px 15px 10px 15px; background-color:#eee; border:solid 1px #ccc; margin-left:5px;}
.bt_type_on{padding:10px 15px 10px 15px; background-color:#ddd; border:solid 1px #ccc; margin-left:5px;}
</style>
<div class="local_ov01 local_ov">
    등록된 배너 <?php echo $total_count; ?>개
</div>
<div style="float:left; padding:8px;"></div>
<? for ($i=1; $i<=23; $i++) { ?>
  <div class="<? if($_GET[type]=="a$i"){?>bt_type_on<? }else{ ?>bt_type_off<? } ?>" style="float:left;" >
      <a href="./bannerlist.php?type=a<?=$i?>">A-<?=$i?></a>
  </div>
<? } ?>
<div class="btn_add01 btn_add">
    <a href="./bannerform.php?ct=<?=$_GET[type]?>">배너추가</a>
</div>

<div class="tbl_head02 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col" id="th_id">ID</th>
        <th scope="col" id="th_dvc">이미지</th>
        <th scope="col" id="th_loc">위치</th>
        <th scope="col" id="th_st">시작일시</th>
        <th scope="col" id="th_end">종료일시</th>
        <th scope="col" id="th_odr">출력순서</th>
        <th scope="col" id="th_hit">조회</th>
        <th scope="col" id="th_mng">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = " select * from {$g5['g5_shop_banner_table']} $type
          order by bn_order, bn_id desc
          limit $from_record, $rows  ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        // 테두리 있는지
        $bn_border  = $row['bn_border'];
        // 새창 띄우기인지
        $bn_new_win = ($row['bn_new_win']) ? 'target="_blank"' : '';

        $bimg = G5_DATA_PATH.'/banner/'.$row['bn_img1'];
        if(file_exists($bimg)) {
            $size = @getimagesize($bimg);
            if($size[0] && $size[0] > 400)
                $width = 300;
            else
                $width = $size[0];

            $bn_img = "";
            if ($row['bn_url'] && $row['bn_url'] != "http://")
                $bn_img .= '<a href="'.$row['bn_url'].'" '.$bn_new_win.'>';
            $bn_img .= '<img src="'.G5_DATA_URL.'/banner/'.$row['bn_img1'].'" width="'.$width.'" alt="'.$row['bn_alt'].'"></a>';
        }

        switch($row['bn_device']) {
            case 'pc':
                $bn_device = 'PC';
                break;
            case 'mobile':
                $bn_device = '모바일';
                break;
            default:
                $bn_device = 'PC와 모바일';
                break;
        }

        $bn_begin_time = substr($row['bn_begin_time'], 2, 14);
        $bn_end_time   = substr($row['bn_end_time'], 2, 14);

        $bg = 'bg'.($i%2);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td headers="th_id" class="td_num"><?php echo $row['bn_id']; ?></td>
        <td headers="th_dvc"><?php echo $bn_img; ?></td>
        <td headers="th_loc" align="center"><?php echo $row['bn_position']; ?></td>
        <td headers="th_st" class="td_datetime"><?php echo $bn_begin_time; ?></td>
        <td headers="th_end" class="td_datetime"><?php echo $bn_end_time; ?></td>
        <td headers="th_odr" class="td_num"><?php echo $row['bn_order']; ?></td>
        <td headers="th_hit" class="td_num"><?php echo $row['bn_hit']; ?></td>
        <td headers="th_mng" class="td_mngsmall">
            <a href="./bannerform.php?w=u&amp;bn_id=<?php echo $row['bn_id']; ?>">수정</a></li>
            <a href="./bannerformupdate.php?w=d&amp;bn_id=<?php echo $row['bn_id']; ?>" onclick="return delete_confirm();">삭제</a>
        </td>
    </tr>
    <?php
    }
    if ($i == 0) {
    echo '<tr><td colspan="8" class="empty_table">자료가 없습니다.</td></tr>';
    }
    ?>
    </tbody>
    </table>

</div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<script>
$(function() {
    $(".sbn_img_view").on("click", function() {
        $(this).closest(".td_img_view").find(".sbn_image").slideToggle();
    });
});
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
