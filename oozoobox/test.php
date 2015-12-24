<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>地址搜索</title>
</head>
<body>
<script type="text/javascript"  src="/js/jquery.min.js"></script>
<script type="text/javascript"  src="/js/ct.js"></script>  
<hr>
<?
$conn = mysql_connect('oozoobox.com','oozoobox','akstpeoqkr2015');
mysql_select_db('oozoobox');


$sqladd1="select * from destoon_area where arrchildid='$_POST[od_add1]'";
$sqlad1=mysql_query($sqladd1);
$add1=mysql_fetch_array($sqlad1);

$sqladd2="select * from destoon_area where arrchildid='$_POST[od_add2]'";
$sqlad2=mysql_query($sqladd2);
$add2=mysql_fetch_array($sqlad2);

$sqladd3="select * from destoon_area where arrchildid='$_POST[od_add3]'";
$sqlad3=mysql_query($sqladd3);
$add3=mysql_fetch_array($sqlad3);

?>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
        <form action="test.php" method="post">
            <div id="sel" style="width:400px;">
                <select onChange="getCity(this)" name="od_add1"></select> 
                <select onChange="getCity(this)" name="od_add2"></select> 
                <select onChange="getCity(this)" name="od_add3"></select> 
                <input type="submit" value="确认" />
            </div>
        </form>
    </td>
  </tr>
  <tr>
    <td>
    <? 
		if($add1[areaname]){ echo "$add1[areaname]";}
		if($add2[areaname]){ echo " - "; echo "$add2[areaname]";}
		if($add3[areaname]){ echo " - "; echo "$add3[areaname]";}
	?>
    </td>
  </tr>
</table>
</body>
</html>