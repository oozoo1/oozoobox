<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "simple_html_dom.php";
?>

<?
	$html = file_get_html('http://www.ckd8.com/ems/?wd=eg622189335kr');
	foreach($html->find('div[class=result-list][id=show]') as $k => $element) {

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