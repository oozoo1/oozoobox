<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 wset[배열키] 형태로 등록
// 모바일 설정값은 동일 배열키에 배열변수만 wmset으로 지정 → wmset[배열키]

?>

<div class="tbl_head01 tbl_wrap">
	<table>
	<caption>위젯설정</caption>
	<colgroup>
		<col class="grid_2">
		<col>
	</colgroup>
	<thead>
	<tr>
		<th scope="col">구분</th>
		<th scope="col">설정</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td align="center">스타일</td>
		<td>
			<?php echo help('밀리초(ms)는 천분의 1초입니다. ex) 5초 = 5000ms');?>
			<select name="wset[effect]">
				<?php echo apms_carousel_options($wset['effect']);?>
			</select>
			<input type="text" name="wset[interval]" value="<?php echo $wset['interval']; ?>" class="frm_input" size="4"> ms
			간격
		</td>
	</tr>
	<tr>
		<td align="center">글아이콘</td>
		<td>
			<input type="text" name="wset[icon]" id="fcon" value="<?php echo ($wset['icon']);?>" size="30" class="frm_input"> 
			<a href="<?php echo G5_BBS_URL;?>/ficon.php?fid=fcon" class="btn_frmline win_scrap">아이콘 선택</a>
		</td>
	</tr>
	<tr>
		<td align="center">추출갯수</td>
		<td>
			<input type="text" name="wset[rows]" value="<?php echo $wset['rows']; ?>" class="frm_input" size="3"> 개 - PC
			&nbsp;
			<input type="text" name="wmset[rows]" value="<?php echo $wmset['rows']; ?>" class="frm_input" size="3"> 개 - 모바일
			&nbsp;
			<input type="text" name="wset[page]" value="<?php echo $wset['page'];?>" size="3" class="frm_input"> 페이지 자료
		</td>
	</tr>
	<tr>
		<td align="center">추출유형</td>
		<td>
			<select name="wset[type]">
				<?php echo apms_item_type_options($wset['type']);?>
			</select>
			추출
		</td>
	</tr>
	<tr>
		<td align="center">분류지정</td>
		<td>
			<input type="text" name="wset[ca_id]" value="<?php echo $wset['ca_id']; ?>" size="20" class="frm_input">
			(분류는 1개만 지정가능, 분류코드 입력)
		</td>
	</tr>
	<tr>
		<td align="center">제외분류</td>
		<td>
			<input type="text" name="wset[ex_ca]" value="<?php echo $wset['ex_ca']; ?>" size="20" class="frm_input">
			(제외분류는 1개만 지정가능, 분류코드 입력)
		</td>
	</tr>
	<tr>
		<td align="center">새아이템</td>
		<td>
			<input type="text" name="wset[newtime]" value="<?php echo ($wset['newtime']);?>" size="4" class="frm_input"> 시간 이내 등록 아이템
			&nbsp;
			색상
			<select name="wset[new]">
				<?php echo apms_color_options($wset['new']);?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="center">정렬설정</td>
		<td>
			<select name="wset[sort]">
				<?php echo apms_item_rank_options($wset['sort']);?>
			</select>
			&nbsp;
			랭크표시
			<select name="wset[rank]">
				<option value=""<?php echo get_selected('', $wset['rank']); ?>>표시안함</option>
				<?php echo apms_color_options($wset['rank']);?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="center">기간설정</td>
		<td>
			<select name="wset[term]">
				<?php echo apms_term_options($wset['term']);?>
			</select>
			&nbsp;
			<input type="text" name="wset[dayterm]" value="<?php echo $wset['dayterm'];?>" size="4" class="frm_input"> 일전까지 자료(일자지정 설정시 적용)
		</td>
	</tr>
	<tr>
		<td align="center">파트너지정</td>
		<td>
			<?php echo help('파트너아이디를 콤마(,)로 구분해서 복수 등록 가능');?>
			<input type="text" name="wset[pt_list]" value="<?php echo $wset['pt_list']; ?>" size="46" class="frm_input">
			&nbsp;
			<label><input type="checkbox" name="wset[ex_pt]" value="1"<?php echo ($wset['ex_pt']) ? ' checked' : '';?>> 제외하기</label>
		</td>
	</tr>
	<tr>
		<td align="center">캐시사용</td>
		<td>
			<input type="text" name="wset[cache]" value="<?php echo $wset['cache']; ?>" class="frm_input" size="4"> 초 간격으로 캐싱
		</td>
	</tr>
	</tbody>
	</table>
</div>