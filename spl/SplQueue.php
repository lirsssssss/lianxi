<?php
//splQueue 队列和堆栈相反 最先进入队列的元素会最先走出队列
//继承自SplDoublyLinkedList类

$obj = new SplQueue();
$obj->enqueue('a');//插入一个节点到队列里面的top位置
$obj->enqueue('b');
$obj->enqueue('c');

print_r($obj);

echo "bottom: " . $obj->bottom() . "\n";
echo "top: " . $obj->top() . "\n";

$obj->offsetSet(0,'A'); //队列里面offset=0是bottom所在位置 offset=1是top方向相邻的节点 以此类推
print_r($obj);
//队列的面rewind操作使得指针指向bottom所在位置的节点
$obj->rewind();
echo "current : " . $obj->current() . "\n";

while($obj->valid()){
    echo $obj->key() . " => " . $obj->current() . "\n";
    $obj->next();//next操作使得当前指针指向top方向的下一个节点
}
//dequeue操作从队列中提取bottom位置的节点,并返回 同时从队列里面删除该元素
echo "dequeue obj: ". $obj->dequeue() . "\n";
print_r($obj);









