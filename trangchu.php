<?php
include 'simple_html_dom.php';
$link='http://pico.vn/';
$html=file_get_contents($link);
$html = str_get_html($html);
$title = $html->find('#logo  a', 0)->plaintext;
// $images = [];
// foreach($html->find('#logo  img') as $img)  {
//   $urlArray = explode('/', $img->src);
//   $tmpPath = 'media/'.end($urlArray);
//   $tmpImg = file_get_contents($img->src);
//   file_put_contents($tmpPath, $tmpImg);
//   $images[] = $tmpPath;
// }
$images=$html->find('#logo  img',0)->src;

?>
<a href="<?= $link ?>"><img src="<?= $link.''.$images ?>" alt=""></a>

