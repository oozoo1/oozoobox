<?php
include_once('./_common.php');

// 관심상품 출력
$num=rand(3,3);
$sqlmy = " select * from g5_shop_item where it_10 = '1' order by rand() limit $num";
$resultmy = sql_query($sqlmy);

?>
		<link rel="stylesheet" href="/css/oz_mh/oz_mh.css" type="text/css" media="screen" >
			<div class="oz_selection">
            	<div class="right_tit_bar"> 
            		<span class="light_orange">OOZOOBOX</span> 的跟单员为你量身推荐 
                    <a class="more_item" href="/mdhit.php">
                    	<span><i></i>换一组</span>
                    </a>                	
                </div>
                <div class="guess_like_content">
                	<div class="inner_content">
<!------------------------s: 반복------------------------>
												<? for ($i=0; $row_my=sql_fetch_array($resultmy); $i++){ ?>
                        <div class="selection_like_item">
                        	<div class="selection_pic">
                            	<a class="selection_pic_link" href="/shop/item.php?it_id=<?=$row_my[it_id]?>&ca_id=<?=$row_my[ca_id]?>">
                                 	<img src="http://data.oozoobox.com/data/item/<?=$row_my[it_img1]?>" alt="상품사진01"/>
                                </a>
                            </div>
                            <div class="selection_item">                       
                            	<a class="selection_tit" href="/shop/item.php?it_id=<?=$row_my[it_id]?>&ca_id=<?=$row_my[ca_id]?>"><?=$row_my[it_name]?></a>
                                <div class="md_selection">
                                    <img src="/images/md_selection_pic_01.png" alt="MD照片"/>
                                    <a class="selection_txt" href="/shop/item.php?it_id=<?=$row_my[it_id]?>&ca_id=<?=$row_my[ca_id]?>"><?=$row_my[it_basic]?></a>
                                </div>
                            </div>
                        </div>
                        <? } ?>
<!------------------------e: 반복------------------------>
                        
                                         
                    </div>
                </div>