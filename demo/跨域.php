<?php
/**
 * 如果ajax不对跨域处理而进行跨域请求要添加的header头信息
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Request-Headers: Origin,No-Cache,Cache-Control,Expires,X-Requested-With, Content-Type, Accept, authorization");
header('Access-Control-Allow-Headers:x-requested-with,content-type,authorization');

//过滤客户端发送的OPTIONS 以YII2.0为例 如果跨域并且发生数据传输http会进行多次请求这时候就要过滤不是POST或要接收的请求
//如下要接收$this->data数据则要过滤掉OPTIONS请求
if (Yii::$app->getRequest()->getMethod() !== 'OPTIONS') {
    $redis = yii::$app->redis;
    $redis->select(11);
    $key = str_shuffle('9999999'.time());
    $redis->set($key, json_encode($this->data));
    unset($this->data);
    return $this->response($data);
}