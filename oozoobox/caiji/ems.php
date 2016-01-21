<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "simple_html_dom.php";
?>

<?
	$html = file_get_html('https://service.epost.go.kr/trace.RetrieveDomRigiTraceList.comm?sid1='.$od[od_invoice].'&displayHeader=N');
	foreach($html->find('table[summary=배송 진행 현황표, 날짜, 시간 ,현재위치, 처리 현황 상세 표기]') as $k => $element) {

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