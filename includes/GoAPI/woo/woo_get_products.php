<?php

$urlWoo = "https://meraki-frisor.no/wp-json/wc/v3/products";

$curlWoo = curl_init($urlWoo);
curl_setopt($curlWoo, CURLOPT_URL, $urlWoo);
curl_setopt($curlWoo, CURLOPT_RETURNTRANSFER, true);

$headersWoo = array(
   "Accept: */*",
   "Authorization: Basic Y2tfYTZmZjgyOWM3ZGUyODk0NDQ3OTI2ODBjMGM1YzQ4ZmUwZTZjMWQ4Yjpjc18yNjc3NzQxYWE3ZDFiMDk5ZDlkNDUzNGMwN2ZjYjZjNGVkM2QwNzY0",
);
curl_setopt($curlWoo, CURLOPT_HTTPHEADER, $headersWoo);

//for debug only!
curl_setopt($curlWoo, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlWoo, CURLOPT_SSL_VERIFYPEER, false);

$respWoo = curl_exec($curlWoo);
curl_close($curlWoo);
var_dump($respWoo);

// add_post_meta( $post->ID, 'Products Response', $respWoo, true );

?>

