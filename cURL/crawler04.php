<?php
$data = 'username=17686531379&password=lhf123&remember=1&pwencode=1&browser_key=7c1c5646828a83223f2acfcd19f00a2f';
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"https://www.imooc.com/passport/user/login");//设置网页的网址
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);//执行之后不直接打印

//Cookie相关设置
date_default_timezone_set('UTC');//使用cookie时先设置时区
curl_setopt($curl,CURLOPT_COOKIESESSION,TRUE);
curl_setopt($curl,CURLOPT_COOKIE,"cookiefile");
curl_setopt($curl,CURLOPT_COOKIEJAR,"cookiefile");
curl_setopt($curl,CURLOPT_COOKIE,session_name(). '=' .session_id());
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);//让curl支持页面跳转
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;
        charset=utf-8",
    "Content-length: " . strlen($data)
));
curl_exec($curl);

curl_setopt($curl,CURLOPT_URL,"https://www.imooc.com/u/index/allcourses");
curl_setopt($curl,CURLOPT_POST,0);
curl_setopt($curl,CURLOPT_HTTPHEADER,array("Content-type: text/xml"));
$optput = curl_exec($curl);
curl_close($curl);
echo $optput;





















