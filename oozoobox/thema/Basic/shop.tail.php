
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<!-- .wrapper -->
<?php if($_SERVER['PHP_SELF']=="/index.php" || $_SERVER['PHP_SELF']=="/shop/list.php"){}else{ ?>
	</div>
</div>
<? } ?>
<div id="footer">
	<ul class="footer_link">
    	<li><a>메인</a></li>
    	<li><a>회사소개</a></li>    
    	<li><a>연락처</a></li>
    	<li><a>배송</a></li>
    	<li><a>제휴문의</a></li>   
    	<li><a>채용안내</a></li>
    	<li><a>고객센터</a></li>
    	<li><a>이용약관</a></li>         
    </ul>
    <div class="footer_info">
    	<p>
        OOZOOBOX | 대표：이하준 | 地址 :  서울시 영등포구 의사당대로 38  더샵아일랜드파크 101동 913호 | 邮政编码 ：07236 <br>
        联系电话 ：+82-2-1234-1234 / +82-70-1234-1234 | FAX : +82-50-1234-1234 <br>
        배송지/환송지 주소：（07236) 서울시 영등포구 국회대로62길 21 동성빌딩 10층 <br>
        사업자등록증 ：107-86-81797 | 통신판매신고업 ：제2015-서울영등포-1249호 <br>
        상담시간: 월~금 9:00 ~ 14:30 | 고객센터 : +82-2-1234-1234<br>
         Copyright © 2015 OZOOBOX.com 版权所有 
        </p>
    </div>

</div>
<!-- JavaScript -->
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/bs3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.ui.totop.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.custom.js"></script>
<?php if($at_set['header']) { ?>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/jquery.custom.sticky.js"></script>
<?php } ?>

<?php if($is_admin || $is_demo) include_once(THEMA_PATH.'/assets/switcher.php'); //Style Switcher ?>

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/respond.js"></script>
<![endif]-->