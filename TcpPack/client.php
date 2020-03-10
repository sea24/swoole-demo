<?php
/**
 * Created by PhpStorm.
 * User: yanghailong
 * Date: 2020/3/10
 * Time: 10:37 AM
 */
$client = new swoole\Client(SWOOLE_SOCK_TCP);
//（fd+id）识别身份
//发数据
$client->connect('127.0.0.1', 9800);

//约定一个分隔符
//一次性发送多条数据
// for ($i=0;$i<10;$i++){
//     $client->send("123456\r\n");
// }

//一次发送大量的数据，拆分小数据
//$body=json_encode(str_repeat('a', 3));
$body = "peter";
//包头+包体
$data = pack("N", strlen($body)) . $body;

var_dump($data);
$client->send($data);
//echo $client->recv(); //接收消息没有接收

