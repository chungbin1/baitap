$title = $html->find('h1', 0)->plaintext;
$price = $html->find('.slidecolor');
var_dump($price);
$params = $html->find('.fullparameter', 0)->outertext;;
$images = [];
// foreach($html->find('.owl-carousel .item img') as $img)  {
//   $urlArray = explode('/', $img->src);
//   $tmpPath = 'media/'.end($urlArray);
//   $tmpImg = file_get_contents($img->src);
//   file_put_contents($tmpPath, $tmpImg);
//   $images[] = $tmpPath;
// }

?>
<h1><?= $title ?></h1>
<p><?= $price; ?></p>
<div>
  <?= $params; ?>
</div>
<div>
<?php foreach ($images as $img) : ?>
  <img src="<?= $img ?>" alt="<?= $title ?>">
<?php endforeach; ?>
</div>