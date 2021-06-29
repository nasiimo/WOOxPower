<?php

$urlPro = "https://api-demo.poweroffice.net/product";

$curlPro = curl_init($urlPro);
curl_setopt($curlPro, CURLOPT_URL, $urlPro);
curl_setopt($curlPro, CURLOPT_POST, true);
curl_setopt($curlPro, CURLOPT_RETURNTRANSFER, true);

$headersPro = array(
   "Authorization: Bearer {$accessTokken}",
   "Content-Type: application/json",
);
curl_setopt($curlPro, CURLOPT_HTTPHEADER, $headersPro);

require_once plugin_dir_path( __FILE__ ) . '../../GoAPI/woo/woo_get_products.php';

$respWoo = json_decode($json);

$dataPro = <<<DATA
{
	"id": $respWoo->id,
	"name": $respWoo->name,
	"price": $dataTwo->salesPrice
}
DATA;

// $dataTwo = json_decode($json);
// {
// 	// API object values assignment
// 	"id": $dataTwo->id,
// 	"sku": $dataTwo->code,
// 	"name": $dataTwo->name,
// 	"price": $dataTwo->salesPrice
// }

curl_setopt($curlPro, CURLOPT_POSTFIELDS, $dataPro);

//for debug only!
curl_setopt($curlPro, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlPro, CURLOPT_SSL_VERIFYPEER, false);

$respPro = curl_exec($curlPro);
curl_close($curlPro);
var_dump($respPro);

add_post_meta( $post->ID, 'Products Response', $dataPro, true );

?>