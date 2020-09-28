<?php
//SplStack 堆栈 先进入堆栈的数据会最后出来 继承至SplDoublyLinkedList类
$stack = new SplStack();
$stack->push('a');//push操作向堆栈里面放入一个节点到top位置
$stack->push('b');
$stack->push('c');

print_r($stack);

echo "bottom: " . $stack->bottom() . "\n";
echo "top: " . $stack->top() . "\n";
//在堆栈中offset = 0 是top位置节点靠近bottom的位置的相邻节点
$stack->offsetSet(0,'C');
print_r($stack);

//双向链表中的rewind和堆栈的rewind相反,堆栈的rewind使得当前指针指向top所在位置,而双向链表调用之后指向bottom所在位置
$stack->rewind();
echo "current : " . $stack->current() . "\n";
//堆栈的next操作使指针指向靠近bottom位置的下一个节点,而双向链表是靠近top的下一个节点
$stack->next();
echo "current : " . $stack->current() . "\n";

//遍历堆栈
$stack->rewind();
while ($stack->valid()){
    echo $stack->key() . " => " . $stack->current() . "\n";
    $stack->next();//next操作不从链表中删除元素
}

//删除堆栈数据
$popObj = $stack->pop();//pop操作从堆栈里面提取出最后一个元素(top位置) 同时在堆栈里面删除该节点
echo "Poped object: " . $popObj . "\n";
print_r($stack);



