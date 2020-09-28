<?php

$curlobj = curl_init();
curl_setopt($curlobj,CURLOPT_URL,"http://www.baidu.com");
curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
$output = curl_exec($curlobj);
curl_close($curlobj);
echo str_replace("百度","BAIDU",$output);