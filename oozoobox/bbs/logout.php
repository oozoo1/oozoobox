<?php
include_once('./_common.php');

// 이호경님 제안 코드
unset($_SESSION['ss_mb_id']);
unset($_SESSION['ss_mb_key']);
// 자동로그인 해제 --------------------------------
set_cookie('ck_mb_id', '', 0);
set_cookie('ck_auto', '', 0);
// 자동로그인 해제 end --------------------------------

if ($url) {
    $p = @parse_url($url);
    if ($p['scheme'] || $p['host']) {
        alert('url没有指定域名.');
    }

    if($url == 'shop')
        $link = G5_SHOP_URL;
    else
        $link = $url;
} else if ($bo_table) {
    $link = G5_BBS_URL.'/board.php?bo_table='.$bo_table;
} else {
    $link = G5_URL;
}

goto_url($link);
?>
