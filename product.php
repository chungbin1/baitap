<?php 
function getListProductByCategory($link){
	$html=file_get_html($link);
	$link=[];
	foreach($html->find('.category-child .product') as $links )
	{	
		$link[]=$links->firstChild()->href;
	}
	$data = array();
	if(count($link)){
		foreach ($link as $k => $v) {
			$data[] = getProductDetail($v);
			if($k == 2){
				break;
			}
		}
	}
}
// writeData(json_encode($data));
?>