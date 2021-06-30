<?php

$urlPro = "https://api-demo.poweroffice.net/product";

$curlPro = curl_init($urlPro);
curl_setopt($curlPro, CURLOPT_URL, $urlPro);
curl_setopt($curlPro, CURLOPT_POST, true);
curl_setopt($curlPro, CURLOPT_RETURNTRANSFER, true);

$headersPro = array(
    "Authorization: Bearer 123",
    "Content-Type: application/json",
);
curl_setopt($curlPro, CURLOPT_HTTPHEADER, $headersPro);

$json = file_get_contents('../../GoAPI/woo/response.json');

$respWoo = json_decode($json);

//$dataPro = <<<DATA
//{
//	"id": $respWoo[0]->id,
//	"name": $respWoo[0]->name,
//	"price": $dataTwo->salesPrice
//}
//DATA;
foreach ($respWoo as $item) {
    $dataPro[] = [
        'id' => $item->id,
        'name' => $item->name,
        'price' => 0
    ];

}
$dataPro = json_encode($dataPro);

echo "<pre>";
print_r($dataPro);
die;

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

add_post_meta($post->ID, 'Products Response', $dataPro, true);

?>