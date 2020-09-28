<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/11/1
 * Time: 下午3:51
 */

header("Content-type: text/html; charset=utf-8");
//加密解密
print_r(openssl_get_cipher_methods());
$foo = [ '10' => 'bar' ];
echo '<br>';
if ('10' == 012){
    echo $foo['10']; // "bar"
    echo $foo[10];   // "bar"
    echo $foo[012];  // "bar"
    echo $foo[0b1010]; // "bar"
}



//$data = "hello world!!!!!!!!";
//$key = uniqid();
//$method = "AES-128-CBC";
//$pass = openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,"1234567812345678");
//var_dump($pass);
//$pwd = openssl_decrypt($pass,$method,$key,OPENSSL_RAW_DATA,"1234567812345678");
//
//var_dump($pwd);

