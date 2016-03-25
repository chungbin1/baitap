<?php
require 'simple_html_dom.php';
$link='http://pico.vn/';
$html = file_get_html($link);
// foreach($html->find('.menu-box strong') as $title ){
// 	echo $title->plaintext .'<br />';
// 	}
$title=[];
// $params = $html->find('.menu-box strong', 0)->outertext;;
foreach($html->find('.menu-box .submenu-title') as $param)  {
   $title[] = $param->plaintext;
}
$links=[];
 foreach($html->find('.menu-box .submenu-84 a') as $param)  {
    $links[] = $param->href;
 }		
 
?>
<table>
<?php
foreach($title as $param)
{
	echo $param ."<br />"; 
}

 foreach ($links as $items){
 	echo $items."<br />";
 }
?>


</table>
 