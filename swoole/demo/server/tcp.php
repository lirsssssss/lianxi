<?php
//$serv = new swoole_server("127.0.0.1",9501);
$serv = new Swoole\Server("127.0.0.1", 9501);

$serv->set([
    'worker_num'=>4,//worker进程数
    'max_request'=>10000,//允许处理的最大用户数
]);

//监听连接进入事件
/**
 * $fd 客户端连接server端的唯一标识
 * $reactor_id 线程id
 */
$serv->on('Connect', function ($serv, $fd,$reactor_id) {
    echo "Client:{$reactor_id}-{$fd}-Connect.\n";
});

//监听数据接收事件
$serv->on('Receive', function ($serv, $fd, $reactor_id, $data) {
    echo $data;

    $serv->send($fd, "Server: {$reactor_id}-{$fd}" . $data);

});

//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$serv->start();










