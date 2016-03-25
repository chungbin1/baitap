<?php
function getProductDetail($link){

  $html = file_get_contents($link);
  // $html = str_replace('<aside', '<div', $html);
  // $html = str_replace('</aside', '</div', $html);
  $html = str_get_html($html);
  $title = $html->find('#Home_ContentPlaceHolder_Product_Control_head_Title', 0)->plaintext;
  $price = $html->find('.product-single-info .price', 0)->plaintext;
  $params = [];
  foreach($html->find('.iSpecial tr') as $param)  {
     $params[] = [$param->children(0)->plaintext, $param->children(1)->plaintext];
  }
  // $params = $html->find('.iSpecial', 0)->outertext;
  $images = [];
  foreach($html->find('#product-carousel img') as $img)  {
    $urlArray = explode('/', $img->src);
    $tmpPath = 'media/'.end($urlArray);
    $tmpImg = file_get_contents($img->src);
    file_put_contents($tmpPath, $tmpImg);
    $images[] = $tmpPath;
  }
  $arrReturn = array();
  $arrReturn['title'] = $title;
  $arrReturn['price'] = $price;
  $arrReturn['images'] = $images;
  $arrReturn['description'] = $params;
  return $arrReturn;
}

function writeData($data){
  $myfile = fopen("data/newfile.txt", "w") or die("Unable to open file!");
  fwrite($myfile, $data);
  fclose($myfile);
}

