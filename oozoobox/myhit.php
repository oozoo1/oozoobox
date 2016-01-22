<?php
include_once('./_common.php');

// 관심상품 출력
$num=rand(5,6);
$sqlmy = " select * from g5_shop_item where it_9 = '1' order by rand() limit $num";
$resultmy = sql_query($sqlmy);

?>
		<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >
            <!--s: 猜你喜欢-->
			<div class="oz_guess_like">
            	<div class="right_tit_bar"> 
            		<span class="light_orange">OOZOOBOX</span> 猜你喜欢
                    <a class="more_item" href="/myhit.php">
                    	<span><i></i>换一组</span>
                    </a>                	
                </div>
                <div class="guess_like_content">
                	<div class="inner_content">
<!------------------------s: 반복------------------------>
												<? for ($i=0; $row_my=sql_fetch_array($resultmy); $i++){ ?>
                        <div class="guess_like_item">
                        	<div class="guess_pic">
                            	<a class="guess_pic_link" href="/shop/item.php?it_id=<?=$row_my[it_id]?>&ca_id=<?=$row_my[ca_id]?>" target="_parent">
                                 	<img src="http://data.oozoobox.com/data/item/<?=$row_my[it_img1]?>" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="guess_item">
                            	<a class="guess_tit" href="/shop/item.php?it_id=<?=$row_my[it_id]?>&ca_id=<?=$row_my[ca_id]?>" target="_parent"><?=$row_my[it_name]?></a>
                                <a class="guess_subtit" href="/shop/item.php?it_id=<?=$row_my[it_id]?>&ca_id=<?=$row_my[ca_id]?>" target="_parent"><?=$row_my[it_basic]?></a>
                                <span class="guess_price">¥<?php echo number_format($row_my['it_price'],2); ?></span>
                            </div>
                        </div>
                        <? } ?>
<!------------------------e: 반복------------------------>
                        
                                          
                    </div>
                </div>
            </div>           
            <!--e: 猜你喜欢-->