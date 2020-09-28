<?php
header("Content-type: text/html; charset=utf-8");
$data = 'theCityName=上海';
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,'http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName');
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36");
curl_setopt($curl,CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;charset=utf-8", "Content-length: ".strlen($data)));
$rtn = curl_exec($curl);
if (!curl_errno($curl)){
//    $info = curl_getinfo($curl);
//    print_r($info);
    echo $rtn;
}else{
    echo 'Curl error: ' . curl_error($curl);
}
//var_dump($_SERVER);die;
curl_close($curl);