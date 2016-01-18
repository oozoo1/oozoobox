<? 
	include_once('./_common.php');
echo $_POST[mb_10];
?>
<meta charset="utf-8">
<title>OOZOOBOX-注销</title>
<style>
html, body, div, p, h1, h2, h3, h4, h5, h6, ul, ol, li, dl, dt, dd, table, th, td, form, fieldset, legend, input, textarea, button, select{margin:0; padding:0;}
body, input, textarea, select, button, table{font:14px/1.5 "Microsoft YaHei",arial,"宋体","돋움",Dotum;}
img, fieldset{border:0;}
table{border-collapse:collapse; border:0 none;}

#My_leave_oz {font-family: "Microsoft YaHei",arial,"宋体","돋움",Dotum;;}
#layer_wrap {overflow:hidden;}
.My_leave {width:380px; height:530px; position:relative;}
.My_leave01 {width:360px; margin-left:20px;}
.My_leave01 .alert {width:100%; padding:15px 0; display:block; border-bottom:dashed 1px #ddd;}
.My_leave01 .alert .msg {display:block; background:url("/images/bg_msg.png") no-repeat; padding-left:10px;}
.My_leave01 .alert01 {width:100%; padding:15px 0; display:block;}
.alert01 table {display:inline-table; margin-top:15px; width:100%; border:1px solid #dadada;}
.alert01 table th {background-color:#f1f1f1; padding:5px 10px; text-align:left; border-right:1px solid #dadada;}
.alert01 table td {padding:5px 10px; text-align:left;}
.My_leave01 .alert01 .msg01 {width:100%; display:block; font-size:20px; text-align:center; font-weight:bold;}
.My_leave01 .ok_btn {display:block; width:100%; height:40px; text-align:center; }
.btnCheckSubmit {border:0; height:40px; margin:5px 5px;}

</style>
</head>

<body>
    <form id="My_leave_oz">
		<div class="My_leave" id="layer_wrap">
        	<div class="My_leave01">
            	<span class="alert">
					<img src="/images/My_leave_gloomy.png" alt="你注销很郁闷"/>
                </span>
                <span class="alert">
                	<span class="msg">탈퇴하실 경우 7일동안 재가입이 불가능하며 기존의 아이디로 재 등록할 수 없습니다.</span>
                    <span class="msg">탈퇴시 소멸한 포인트와 쿠폰은 복원되지 않습니다.</span>
                </span>
                <span class="alert01">
                	<span class="msg">
                    아래는 <!--회원ID-->**** 현재 보유하고 계신 쿠폰 및 포인트입니다.<br>
                    탈퇴 시 아래 쿠폰 및 포인트는 모두 소멸됩니다.</span>
                    <table>
                    	<colgroup>
                        	<col width="35%"/>
                            <col/>
                        </colgroup>
                        <tbody>
                            <tr style="border-bottom:1px solid #dadada;">
                                <th>포인트</th>
                                <td><span><!--포인트-->100</span>p</td>
                            </tr>
                            <tr>
                                <th>보유중 쿠폰</th>
                                <td><span><!--쿠폰-->2</span>장</td>
                            </tr>
                        </tbody>
                    </table>
                </span>
                <span class="alert01">
                	<span class="msg01">정말 탈퇴하시겠습니까?</span>
                </span>              
                <div class="ok_btn">
                	<a href="/shop/mypage01_4.php"><button class="btnCheckSubmit"><img src="/images/btn_My_leave_popup01.png" alt="确认"/></button></a>
                    <a href="/shop/mypage01_4.php"><button class="btnCheckSubmit"><img src="/images/btn_My_leave_popup02.png" alt="确认"/></button></a>
                </div>    
                
            </div>
            
        </div>
    </form>