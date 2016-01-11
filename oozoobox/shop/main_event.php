<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/mypage.php"));

// 쿠폰
$cp_count = 0;
$sql = " select cp_id
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '전체회원' )
              and cp_start <= '".G5_TIME_YMD."'
              and cp_end >= '".G5_TIME_YMD."' ";
$res = sql_query($sql);

for($k=0; $cp=sql_fetch_array($res); $k++) {
    if(!is_used_coupon($member['mb_id'], $cp['cp_id']))
        $cp_count++;
}

$mb_homepage = set_http(get_text(clean_xss_tags($member['mb_homepage'])));
$mb_profile = ($member['mb_profile']) ? conv_content($member['mb_profile'],0) : '';
$mb_signature = ($member['mb_signature']) ? apms_content(conv_content($member['mb_signature'], 1)) : '';



$g5['title'] = get_text($member['mb_name']).'님 마이페이지';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;
?>

<style>
#slideshow-wrap {display: block; height: 400px; min-width: 260px; max-width: 990px; margin: auto; margin-top: 20px; position: relative; }

#slideshow-inner {width: 100%; height: 100%; background-color: rgb(0,0,0); overflow: hidden; position: relative; }

#slideshow-inner>ul {list-style: none; height: 100%; width: 500%; overflow: hidden; position: relative; left: 0px; -webkit-transition: left .8s cubic-bezier(0.77, 0, 0.175, 1); -moz-transition: left .8s cubic-bezier(0.77, 0, 0.175, 1); -o-transition: left .8s cubic-bezier(0.77, 0, 0.175, 1); transition: left .8s cubic-bezier(0.77, 0, 0.175, 1); }

#slideshow-inner>ul>li {width: 20%; height: 400px; float: left; position: relative; }

#slideshow-inner>ul>li>img {margin: auto; height: 100%; width:100%; }

#slideshow-wrap input[type=radio] {position: absolute; left: 50%; bottom: 15px; z-index: 100; visibility: hidden; }

#slideshow-wrap label:not(.arrows):not(.show-description-label) {position: absolute; left: 50%; bottom: 10px; z-index: 100; width: 12px; height: 12px; background-color: rgba(255,255,255,1); -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; cursor: pointer; -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,.8); -moz-box-shadow: 0px 0px 3px rgba(0,0,0,.8); box-shadow: 0px 0px 3px rgba(0,0,0,.8); -webkit-transition: background-color .2s; -moz-transition: background-color .2s; -o-transition: background-color .2s; transition: background-color .2s; }

#slideshow-wrap label:not(.arrows):active { bottom: 10px }

#slideshow-wrap input[type=radio]#button-1:checked~label[for=button-1] { background-color: rgba(100,100,100,1) }
#slideshow-wrap input[type=radio]#button-2:checked~label[for=button-2] { background-color: rgba(100,100,100,1) }
#slideshow-wrap input[type=radio]#button-3:checked~label[for=button-3] { background-color: rgba(100,100,100,1) }
#slideshow-wrap input[type=radio]#button-4:checked~label[for=button-4] { background-color: rgba(100,100,100,1) }
#slideshow-wrap input[type=radio]#button-5:checked~label[for=button-5] { background-color: rgba(100,100,100,1) }

#slideshow-wrap label[for=button-1] { margin-left: -36px }
#slideshow-wrap label[for=button-2] { margin-left: -18px }
#slideshow-wrap label[for=button-4] { margin-left: 18px }
#slideshow-wrap label[for=button-5] { margin-left: 36px }

#slideshow-wrap input[type=radio]#button-1:checked~#slideshow-inner>ul { left: 0 }
#slideshow-wrap input[type=radio]#button-2:checked~#slideshow-inner>ul { left: -100% }
#slideshow-wrap input[type=radio]#button-3:checked~#slideshow-inner>ul { left: -200% }
#slideshow-wrap input[type=radio]#button-4:checked~#slideshow-inner>ul { left: -300% }
#slideshow-wrap input[type=radio]#button-5:checked~#slideshow-inner>ul { left: -400% }

label.arrows {font-family: 'WebSymbolsRegular'; font-size: 25px; color: rgb(255,255,240); position: absolute; top: 50%; margin-top: -25px; display: none; opacity: 0.7; cursor: pointer; z-index: 1000; background-color: transparent; -webkit-transition: opacity .2s; -moz-transition: opacity .2s; -o-transition: opacity .2s; transition: opacity .2s; text-shadow: 0px 0px 3px rgba(0,0,0,.8); }

label.arrows:hover { opacity: 1 }

label.arrows:active { margin-top: -23px }

input[type=radio]#button-1:checked~.arrows#arrow-2, input[type=radio]#button-2:checked~.arrows#arrow-3, input[type=radio]#button-3:checked~.arrows#arrow-4, input[type=radio]#button-4:checked~.arrows#arrow-5 {right: -55px; display: block; }

input[type=radio]#button-2:checked~.arrows#arrow-1, input[type=radio]#button-3:checked~.arrows#arrow-2, input[type=radio]#button-4:checked~.arrows#arrow-3, input[type=radio]#button-5:checked~.arrows#arrow-4 { left: -55px; display: block; -webkit-transform: scaleX(-1); -moz-transform: scaleX(-1); -ms-transform: scaleX(-1); -o-transform: scaleX(-1); transform: scaleX(-1); }

input[type=radio]#button-2:checked~.arrows#arrow-1 { left: -19px }

input[type=radio]#button-3:checked~.arrows#arrow-2 { left: -37px }

input[type=radio]#button-5:checked~.arrows#arrow-4 { left: -73px }

.description {
    position: absolute; top: 0; left: 0; width: 260px; font-family: 'Yanone Kaffeesatz'; z-index: 1000; }

.description input { visibility: hidden }

.description label {font-family: 'WebSymbolsRegular'; background-color: rgba(255,255,240,1); position: relative; left: -17px; top: 00px; width: 40px; height: 27px; display: inline-block; text-align: center; padding-top: 7px; border-bottom-right-radius: 15px; cursor: pointer; opacity: 0; -webkit-transition: opacity .2s; -moz-transition: opacity .2s; -o-transition: opacity .2s; transition: opacity .2s; z-index: 5; color: rgb(20,20,20); }

#slideshow-inner>ul>li:hover .description label { opacity: 1 }

.description input[type=checkbox]:checked~label { opacity: 1 }


</style>


<div id="MainEvent">
    <div id="slideshow-wrap">
        <input type="radio" id="button-1" name="controls" checked="checked"/>
        <label for="button-1"></label>
        <input type="radio" id="button-2" name="controls"/>
        <label for="button-2"></label>
        <input type="radio" id="button-3" name="controls"/>
        <label for="button-3"></label>
        <input type="radio" id="button-4" name="controls"/>
        <label for="button-4"></label>
        <input type="radio" id="button-5" name="controls"/>
        <label for="button-5"></label>
        <label for="button-1" class="arrows" id="arrow-1">></label>
        <label for="button-2" class="arrows" id="arrow-2">></label>
        <label for="button-3" class="arrows" id="arrow-3">></label>
        <label for="button-4" class="arrows" id="arrow-4">></label>
        <label for="button-5" class="arrows" id="arrow-5">></label>
        <div id="slideshow-inner">
            <ul>
                <li id="slide1">
                    <img src="/images/bn_event_main01.png" />
                </li>
                <li id="slide2">
                    <img src="/images/bn_event_main02.png" />
                </li>
                <li id="slide3">
                    <img src="/images/bn_event_main01.png" />
                </li>
                <li id="slide4">
                    <img src="/images/bn_event_main02.png" />
                </li>
                <li id="slide5">
                    <img src="/images/bn_event_main01.png" />
                </li>
            </ul>
        </div>
    </div>
    

    <div class="EventGoods">
        <a class="EventPic"><img src="/images/event01_goods_01.png" alt="SK_2"/></a>
        <div class="EventGood_info">
            <span class="price"></span><span class="like"></span>
            <a><span class="text">SK-2护肤面膜贴 SK-2化妆品 朴水保10片装</span></a>
        </div>
        <span class="Event_url_detail"><a><img src="/images/event01_url_01.png" alt="SK_2 자세히보기"/></a></span>
    </div>
        
        
        
        
</div>



        
<?php  include_once('./_tail.php'); ?>
