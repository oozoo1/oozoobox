<?php
include_once('./cs_head.php');

//////////////////////////공지사항///////////////////////////////////////
$sql_faq = "SELECT * FROM `g5_write_buyerfaq` ORDER BY `g5_write_buyerfaq`.`wr_datetime` DESC LIMIT 0 , 10";
$faq = sql_query($sql_faq);



//////////////////////////공지사항///////////////////////////////////////
$sql = "SELECT * FROM `g5_write_notice` ORDER BY `g5_write_notice`.`wr_datetime` DESC LIMIT 0 , 5";
$result = sql_query($sql);

?>
            	<img src="/images/cs_main_title.png" alt="客户服务 1544-1234 AM 9:00 ~ PM 4:30 점심시간 PM 1:00 ~ PM 2:00
토/일/공휴일 휴무"/>
			</div>
            <dl class="inquiry-search">
                <dt>
                    <label for="inquirySearch">
                        자주찾는 문의
                    </label>
                </dt>
                <dd class="search-input" sizcache="5" sizset="49">
                    <p class="input-box">
                        <input name="" title="자주찾는 문의" class="txt" type="text" placeholder="문의사항을 입력하세요"/>
                    </p>
                    <a><button class="btn_search">검색</button></a>
                </dd>
            </dl>
            <!--s: CS_Main_FAQ-->
			<div class="cs_main_faq">
            	<h3 class="cs_main_title">FAQ</h3>
				<ul>
                    <?php for ($i=0; $row_faq=sql_fetch_array($faq); $i++){ $dr_memo = cut_str($row_faq[wr_subject],36);?>
                	<li>
                    	<a><p class="faq_subject"><?=$dr_memo?></p></a>
                        <p class="category">[<?=$row_faq[ca_name]?>]</p>
                    </li>
                    <? } ?>                 
                </ul>
            </div>
            <!--e: CS_Main_FAQ-->
            
            <div class="cs_main_etc">
                <!--s: CS_Main_Notice-->
                <div class="cs_main_notice">
                    <h3 class="cs_main_title">公告</h3>
                    <ul>
                        <?php for ($i=0; $row=sql_fetch_array($result); $i++){ $dr_memo = cut_str($row[wr_subject],16);?>
                        <li>
                            <a><p class="cs_subject"><?=$dr_memo?></p></a>
                            <p class="cs_category"><?=$row[wr_name]?></p>                    
                        </li>
                        <? } ?>                             
                    </ul>
                </div>
                <!--e: CS_Main_Notice-->
               
                <!--s: CS_1:1 상담신청-->
                    <div class="cs_box_counsel">
                        <h3 class="cs_main_title">申请<span class="blue">1:1</span>商谈服务</h3>
						<div class="explain">
                        	<p>广告、不文明用语、和其他网站的价格比较，与商品无关的内容，以及违反通信礼仪或违反OOZOOBOX规定的留言，将会被无通知删除。</p>
                        	<p class="attention">已经上传的商谈留言内容，将不能修改。1:1商谈全天24小时都可以进行申请，我们将尽快竭诚为您解答。</p>
                        </div>
                        <a class="btn_request">
                        	<button>1:1상담신청</button> <!-----------채팅창 생성------------------>
                        </a>
                    </div>
                <!--e: CS_1:1 상담신청--> 
                       
        
<?php  include_once('./cs_tail.php'); ?>
