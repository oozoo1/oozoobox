<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css" media="screen">', 0);
?>

<?php if($is_dhtml_editor) { ?>
	<style>
		#wr_content { border:0; display:none; }
	</style>
<?php } ?>
<style>
.wdivbox{box-shadow:0px 0px 20px 0px rgba(0,0,0,0.15); border:solid 1px #eee;}
.wheight{ padding:5px 10px 5px 10px;}
.winput{ border:solid 1px #e8e8e8; width:100%; height:34px; color:#666666;}
</style>
<div class="wdivbox">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" role="form" class="form-horizontal">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option_cnt = 0;
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<label class="control-label sp-label"><input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'> 공지</label>';
            $option_ctn++;
        }
    
        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<label class="control-label sp-label"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'> HTML</label>';
                $option_ctn++;
            }
        }
    
        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<label class="control-label sp-label"><input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'> 비밀글</label>';
                $option_ctn++;
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }
    
        if ($is_admin) {
            $main_checked = ($write['as_type']) ? ' checked' : '';
            $option .= "\n".'<label class="control-label sp-label"><input type="checkbox" id="as_type" name="as_type" value="1" '.$main_checked.'> 메인글</label>';
            $option_ctn++;
        }
    
        if ($is_mail) {
            $option .= "\n".'<label class="control-label sp-label"><input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'> 답변메일받기</label>';
            $option_ctn++;
        }
    }
    
    echo $option_hidden;
    ?>
      <tr>
        <td height="40" background="/images/title_bg.png" align="center"><span style="font-size:16px; font-weight:bold; color:#fff;"><?php echo $g5['title'] ?></span></td>
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
        <td class="wheight"><input type="text" name="wr_10" value="<?php echo $write[wr_10] ?>" id="wr_10" required class="winput" size="50" maxlength="255" placeholder="   请输入商品 it_id"></td>
      </tr>
      <tr>
        <td class="wheight"><input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="winput" size="50" maxlength="255" placeholder="   请输入标题"></td>
      </tr>
      <tr>
        <td class="wheight"><?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?></td>
      </tr>

      <tr>
        <td height="20" style="border-bottom:solid 1px #eee;"></td>
      </tr>
      <tr>
        <td class="wheight" height="100" align="center">
            <div class="write-btn pull-center">
                <button type="submit" id="btn_submit" accesskey="s" class="btn btn-color btn-sm"><i class="fa fa-check"></i> <b>작성완료</b></button>
                <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-black btn-sm" role="button">취소</a>
            </div>
        </td>
      </tr>
      </form>
    </table>
</div>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });
    <?php } ?>

	function html_auto_br(obj) {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f) {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }

	$(function(){
		$("#wr_content").addClass("form-control input-sm write-content");
	});
    </script>
</div>
<!-- } 게시물 작성/수정 끝 -->