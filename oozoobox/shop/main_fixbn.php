<?php
include_once('./_common.php');





$g5['title'] ='MD商品';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>



<div id="MainEvent02">
	<img src="/images/event_vote.png" alt="投票"/>
    <div class="event_vote">
    	<div class="vote01"><input type="radio"/><span> 金惠珍</span></div>
        <div class="vote02"><input type="radio"/><span> 闵夏莉</span></div>
        <textarea class="event_vote_txt" placeholder="请您写一下儿选择的理由"></textarea>
        <div class="btn_event_vote">
            <a>
                <img src="/images/event02_vote_13.png" onMouseOver="this.src='/images/event02_vote_13_o.png'" onMouseOut="this.src='/images/event02_vote_13.png'" alt="选择"/>
            </a>
    	</div>
    </div>
    
    
    <div class="mainevent_btn">
    	<a href="/">
        	<img src="/images/btn_go_home.png" alt="go home 返回首页"/>
        </a>
    </div>
        
        
</div>



        
<?php  include_once('./_tail.php'); ?>
