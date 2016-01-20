<?php
$sub_menu = '100000';
include_once('./_common.php');

check_demo();

if ($W == 'd')
    auth_check($auth[$sub_menu], "d");
else
    auth_check($auth[$sub_menu], "w");



////图片1 开始///
$f1=$_FILES['bn_img1'];
$filetype1=date("YmdHis");
$fileimg1="1";
$file_name1 =$filetype1."_".$fileimg1;
 if($f1['name']){
   $dest_dir='../../data/banner/';

	 $board_type=strtolower(substr($f1['name'],(strrpos($f1['name'],'.')+1)));
	 $brd_file1=$file_name1.".".$board_type;
	  
	  $dest=$dest_dir.$brd_file1;

	  $r1=move_uploaded_file($f1['tmp_name'],$dest);

  }

if($brd_file1){
	$imgfile1="$brd_file1";
	////删除图片1 开始///
	$file_delete = "../../data/banner/$_POST[b_img1]";   
	@unlink($file_delete);
}else{
	$imgfile1="$_POST[b_img1]";
}



////图片2 开始///
$f2=$_FILES['bn_img2'];
$filetype2=date("YmdHis");
$fileimg2="2";
$file_name2 =$filetype2."_".$fileimg2;
 if($f2['name']){
   $dest_dir='../../data/banner/';

	 $board_type=strtolower(substr($f2['name'],(strrpos($f2['name'],'.')+1)));
	 $brd_file2=$file_name2.".".$board_type;
	  
	  $dest=$dest_dir.$brd_file2;

	  $r2=move_uploaded_file($f2['tmp_name'],$dest);

  }
if($brd_file2){
	$imgfile2="$brd_file2";
	////删除图片1 开始///
	$file_delete = "../../data/banner/$_POST[b_img2]";   
	@unlink($file_delete);
}else{
	$imgfile2="$_POST[b_img2]";
}





if ($w=="")
{

    sql_query(" alter table {$g5['g5_shop_banner_table']} auto_increment=1 ");

    $sql = " insert into {$g5['g5_shop_banner_table']}
                set bn_alt        = '$bn_alt',
                    bn_memo       = '$bn_memo',
                    bn_url        = '$bn_url',
                    bn_device     = '$bn_device',
                    bn_position   = '$bn_position',
                    bn_border     = '$bn_border',
                    bn_new_win    = '$bn_new_win',
                    bn_begin_time = '$bn_begin_time',
                    bn_end_time   = '$bn_end_time',
                    bn_time       = '$now',
										bn_bg_color   = '$bn_bg_color',
										bn_img1       = '$imgfile1',
										bn_img2       = '$imgfile2',
                    bn_hit        = '0',
                    bn_order      = '$bn_order' ";
    sql_query($sql);

    $bn_id = sql_insert_id();
}
else if ($w=="u")
{
    $sql = " update {$g5['g5_shop_banner_table']}
                set bn_alt        = '$bn_alt',
                    bn_memo       = '$bn_memo',
                    bn_url        = '$bn_url',
                    bn_device     = '$bn_device',
                    bn_position   = '$bn_position',
                    bn_border     = '$bn_border',
                    bn_new_win    = '$bn_new_win',
                    bn_begin_time = '$bn_begin_time',
                    bn_end_time   = '$bn_end_time',
										bn_bg_color   = '$bn_bg_color',
										bn_img1       = '$imgfile1',
										bn_img2       = '$imgfile2',
                    bn_order      = '$bn_order'
              where bn_id = '$bn_id' ";
    sql_query($sql);
		
		if($_POST[bn_img1_del]){
			$file_delete = "../../data/banner/$_POST[b_img1]";   
			@unlink($file_delete);
				$sql = " update {$g5['g5_shop_banner_table']}
										set bn_img1        = ''
									where bn_id = '$bn_id' ";
				sql_query($sql);
		}
		
		if($_POST[bn_img2_del]){
			$file_delete = "../../data/banner/$_POST[b_img2]";   
			@unlink($file_delete);
				$sql = " update {$g5['g5_shop_banner_table']}
										set bn_img2        = ''
									where bn_id = '$bn_id' ";
				sql_query($sql);
		}
		
}
else if ($w=="d")
{
    @unlink(G5_DATA_PATH."/banner/$bn_id");

    $sql = " delete from {$g5['g5_shop_banner_table']} where bn_id = $bn_id ";
    $result = sql_query($sql);
}


if ($w == "" || $w == "u")
{
    if ($_FILES['bn_bimg']['name']) upload_file($_FILES['bn_bimg']['tmp_name'], $bn_id, G5_DATA_PATH."/banner");

    goto_url("./bannerform.php?w=u&amp;bn_id=$bn_id");
} else {
    goto_url("./bannerlist.php");
}
?>
