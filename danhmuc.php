<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
require 'simple_html_dom.php';
require 'example.php';
require 'product.php';
// test commit
$link='http://pico.vn';
$html=file_get_html($link);

$data = array();
foreach($html->find('.menu-box .submenu-title') as $k => $links){
	$data[$k]['type'] = strip_tags($links->parent()->find("strong.submenu-title", 0)->outertext);
	foreach ($links->parent()->nextSibling()->find("a") as $ka => $a) {
		$data[$k]['data'][$ka]['type'] = $a->getAttribute("title");
		$data[$k]['data'][$ka]['data'] = getListProductByCategory($link.$a->href);
	}
	exit();
}

?>