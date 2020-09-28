<?php
//SplDoublyLinkedList 双向链表
$obj = new SplDoublyLinkedList();
$obj->push(1);//把新的节点数据添加到链表顶部(top
$obj->push(2);
$obj->push(3);

$obj->unshift(10);//把新的节点数据添加到链表底部(bottom
print_r($obj);
echo 'bottom : ' . $obj->bottom() . "\n";//获取链表底部元素 当前指针不变
echo 'top : ' .  $obj->top() . "\n";//湖区链表顶部元素 当前指针位置不变
$obj->rewind();//rewind操作用于把节点指针指向bottom节点

echo 'current: ' .$obj->current() . "\n";//获取节点指针指向的节点(当前节点

$obj->next();//是指针指向下一个节点
echo 'next node :' . $obj->current() . "\n";

$obj->next();
$obj->next();

$obj->prev();//是指针指向上一个节点
echo 'prev node :' . $obj->current() . "\n";

$obj->next();
$obj->next();
echo 'prev node :' . $obj->current() . "\n";

if ($obj->current())
    echo "Current node valid \n";
else
    echo "Current node invalid \n";

$obj->rewind();
//如果当前节点是有效节点,valid返回true
if ($obj->valid())
    echo "valid list \n";
else
    echo "invalid list \n";

echo "pop value: " . $obj->pop();
print_r($obj);
echo 'next node :' . $obj->current() . "\n";
$obj->next();
$obj->next();
$obj->pop();//把top位置的节点从链表中删除,并返回 如果current正好指向top位置,name调用pop之后current会失效
echo 'next node :' . $obj->current() . "\n";

$obj->shift();//把bottom位置的节点从链表中删除,并返回
print_r($obj);



