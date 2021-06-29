<?php

$urlAuth = "https://api-demo.poweroffice.net/OAuth/Token";

   $curlAuth = curl_init($urlAuth);
   curl_setopt($curlAuth, CURLOPT_URL, $urlAuth);
   curl_setopt($curlAuth, CURLOPT_POST, true);
   curl_setopt($curlAuth, CURLOPT_RETURNTRANSFER, true);

   $headersAuth = array(
      "Authorization: Basic ODQ1MDAwNzctYWEwOS00MWNlLTgxYTEtNTQzZDA2ODYxOTM2OjNiYjc4YWU4LTkwNzEtNDIzMC1iYzZhLTg0MTZmOTU2ZGMzNg==",
      "Content-Type: text/plain",
   );
   curl_setopt($curlAuth, CURLOPT_HTTPHEADER, $headersAuth);

   $dataAuth = "grant_type=client_credentials";

   curl_setopt($curlAuth, CURLOPT_POSTFIELDS, $dataAuth);

   //for debug only!
   curl_setopt($curlAuth, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($curlAuth, CURLOPT_SSL_VERIFYPEER, false);

   $respAuth = curl_exec($curlAuth);
   curl_close($curlAuth);
   var_dump($respAuth);

   // Convert JSON string to Object
   $tokenObject = json_decode($respAuth);
   // Access Object data
   $accessTokken = $tokenObject->access_token;

   // add_post_meta( $post->ID, 'Access Token', $accessTokken, true );

?>