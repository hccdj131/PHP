<?php
$stack = new SplStack();
// push操作向堆栈里面放入一个节点到top位置
$stack->push('a');
$stack->push('b');
$stack->push('c');
print_r($stack);

echo 'Bottom: ' . $stack->bottom()."\n";
echo 'Top: ' . $stack->top()."\n";

//堆栈的offset=0是Top所在的位置，offset=1是top位置节点靠近bottom位置的相邻节点，以此类推
$stack->offsetSet(0,'C');
print_r($stack);

// 双向链表的rewind和堆栈的rewind相反，堆栈的rewind使得当前指针指向Top所在的位置，而双向链表调用之后指向bottom所在位置
$stack->rewind();
echo 'current:'.$stack->current()."\n";

// 堆栈的next操作使指针指向靠近Bottom位置的下一个节点，而双向链表是靠近top的下一个节点
$stack->next();
echo 'current:'.$stack->current()."\n";

// 遍历堆栈
$stack->rewind();
while ($stack->valid()) {
    echo $stack->key()."=>".$stack->current()."\n";
    // next操作不从链表中删除元素
    $stack->next();
}

// 删除堆栈数据
// pop操作从堆栈里面提取出最后一个元素（top位置），同时在堆栈里面删除该节点
$popObj = $stack->pop();
echo 'Poped object: '. $popObj."\n";
print_r($stack);


?>