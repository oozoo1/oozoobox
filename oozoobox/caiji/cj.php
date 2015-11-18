<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "simple_html_dom.php";
?>

<?
	$html = file_get_html('https://www.doortodoor.co.kr/parcel/doortodoor.do?fsp_action=PARC_ACT_002&fsp_cmd=retrieveInvNoACT&invc_no='.$od[od_invoice].'');
	foreach($html->find('table[summary=상품상태 확인 표]') as $k => $element) {

	$content_1 = preg_replace( "@<form.*?>(.*?)@is","\$2",$element); //去A的正则表达
	$content_2 = preg_replace( "@<a.*?>(.*?)@is","\$2",$content_1); //去A的正则表达
	echo $content_2;
		
		
}
?>    <style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
-->
</style>