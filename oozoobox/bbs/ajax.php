<?php
	header("Content-Type:text/html; charset=utf-8");
if($_SERVER['HTTP_HOST']=="localhost"){
	$conn = mysql_connect('oozoobox.com','oozoobox','akstpeoqkr2015');
}else{
	$conn = mysql_connect('localhost','oozoobox','akstpeoqkr2015');
}	
	mysql_select_db('oozoobox');
	if(isset($_POST['parentid'])){
		$sql = "select areaid,areaname,parentid,arrparentid,child,arrchildid,listorder  from  destoon_area  where parentid=".$_POST['parentid']."  order by  areaid asc ";
		$result = mysql_query($sql);
		$str="";
		while($rs = mysql_fetch_array($result)){
				$str.=$rs['arrchildid']."|".$rs['areaname']."-";	
		}
		echo $str;
	}
	
	if(isset($_POST['arrchildid'])){
		$arrchildid = $_POST['arrchildid'];
		$str="";
		$idarr=rtrim($arrchildid,",");
		$idarrs=explode(",",$idarr);
		$r=mysql_query("select areaid ,areaname , arrchildid from destoon_area where parentid=$idarrs[0] and areaid in (".$arrchildid.") order by areaid ");
		while($rs = mysql_fetch_array($r)){
			$str.=$rs['arrchildid']."|".$rs['areaname']."-";	
		}
		echo $str;
	}
?>